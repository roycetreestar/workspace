<?php
/**
 * The main controller of the catalog module
 * 
 * 
 *	needs the upload form's file field to have	name="file" 
 * 
 *	all errors along the way are stored in $this->data['errors']['error_type']
 *	At each step the process may abort and report errors
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Catalog_imports extends Loggedin_Controller// Secure_Controller
{
	private	$import_type = 'catalog'; // options: 'catalog', 'inventory' 
	private	$catalog_required_fields = array('catalog_number', 'target', 'format', 'clone', 'unit_size', 'price', 'product_url',  'target_species', 'applications', 'category' );
//	private	$inventory_required_fields ;

	private	$labid;
	
	private	$filename;
	private	$spreadsheet_arr ;
	private	$extension;
	private	$worksheetTitle ;
	private	$highestRow   ;
	private	$highestColumn; // e.g 'F' or 'AM'
	private	$highestColumnIndex;
	private	$nrColumns;
	
	private $vendor_id = 0;
	
	private	$column_headers = array();
	private	$validated_fields = array();					//correlates the column number (0, 1, 2, ...) with the canonical name of the column

	
	
	private	$uploads_folder = "uploads/catalog/";
	private	$allowedExts = array("xml", "txt", "csv", "xls", "xlsx");

//the $EXCLUDE array is keywords for products we won't carry, so any target 
//	or chrome that contains one of these keywords can be dropped.
//	eventually, we should have this in the database in an excluded-product-keywords table
	private 	$EXCLUDE = array('1S','2 Color','3 Color','AKP','Alkaline Phosphatase','Carrier-Free','cocktail','kit','Set','Solution','Buffer','ELISA','ELISA Std.','F(ab\')2','FIX','FluoroFix','Horseradish Peroxidase','HRP','HRP (Horseradish Peroxidase)','HRPO','Ig Fraction','legend','Lyophilized Supernatant','Misc Supplies','Monensin','Permeabilization','Propidium','RBC','recom','Serum','Solutions and Buffers','Supernatant','Support Products','TMB', 'Ig fraction','BGAL','BIMA','Lyophilized','Dual color', 'multitest','tritest','simultest','Quantibrite','Multi-Clone','Agarose','Imag','Lineage Panel','Trucount', 'kit','flowcytomix','elisa','module set','elispot','buffer','solution','recombinant','horseradish','hrp','beads','assay','lysate','2 color','3 color','fusion protein','panel','control cells','substrate','cocktail','ready-set-go!','permeabilization','western blot','whole blood staining','plate', 'serum','immobilized','Cocktail','Alkaline Phosphatase','BIMA','BGAL','Puraflow 8x Sheath Fluid','Caspase Inhibitor','Brefeldin','Flex Set','Bead','Particles','Standard','Tubes','Reagent Set','Multi-Check','retic','Bundle','FACSCount','Sheath Fluid','Detector','Zero Foam','Disinfectant','Streptavidin-BD Horizon V', 'Peroxidase', 'LINEAGE MIXTURE', 'Noxa', 'RIP3', 'p53NIDP1');
	
//	private $excluded_rows = array();						//stores product_numbers of rows that match $EXCLUDE so they won't be imported during do_insert();
	

//////////////////////////////////////////////////////////////////////////////////////////
	function __construct()
	{
		parent::__construct();

		$this->data['errors'] = array();
		
//		$this->load->model('catalog_field_names_m');
		$this->load->model('catalog_m');
		$this->load->model('vendors_model');
		$this->load->model('clones_model');
		
		$this->load->model('target_species_model');
		$this->load->model('product_species_model');
		
		$this->thesaurus_module = $this->load->module('thesaurus');
		$this->load->model('thesaurus/thesaurus_m');
		
		// load the thesaurus module to access its controller's functions
//		$this->load->module("thesaurus");								
		
		$this->load->library('PHPExcel');
		
		$this->data['errors']['upload_errors'] = array();
		$this->data['errors']['parse_errors'] = array();
		$this->data['errors']['unknown_fields'] = array();
		$this->data['errors']['bad_application'] = array();
		$this->data['errors']['missing_fields'] = array();
		$this->data['errors']['missing_targets'] = array();
		$this->data['errors']['missing_chromes'] = array();
		$this->data['errors']['missing_clones'] = array();
		$this->data['errors']['missing_species'] = array();
		
		
		$this->data['excluded_rows'] = array();
		
		$this->spreadsheet_arr = array();
		$this->data['userid'] = $this->session->userdata['logged_in']['userid'];	//$this->data['fl_user']['id'];
//		$this->labid = $this->input->post('labid');
//		$this->extension = end(explode(".", $_FILES["file"]["name"]));
		
		
		//catalogs can be big and imports can take a while, so bump up the max_execution_time for the duration of the import
		ini_set('max_execution_time', 300);
	}
 
////////////////////////////////////////////////////////////////////////////////
/**
 * 
 */
	function index()
	{
		
		if(isset($_FILES['file']))
		{
		//check the uploaded file for upload errors
			if( $this->validate_file() )
			{					
				switch($this->extension)
				{
					case 'csv':
						$this->parse_csv($_FILES['file']['tmp_name']);
						break;
					case 'ods':
						$this->parse_ods($_FILES['file']['tmp_name']);
						break;
					case 'xls':
						$this->parse_xls($_FILES['file']['tmp_name']);
						break;
					case 'xlsx':
						$this->parse_xls($_FILES['file']['tmp_name']);
						break;
					case 'xml':
						$this->parse_xml($_FILES['file']['tmp_name']);
						break;
				}
				
			//grab the vendor_id from the form dropdown
				if($this->vendor_id === 0)
					$this->vendor_id = $this->input->post('vendor_id_dd');
				
			//check the fieldnames against canonical names
				if( $this->validate_fieldnames() )
				{
					$this->missing_fields();
				}
				
			//do a dry-run (no insert/update) to find other errors
				if(count($this->data['errors']['missing_fields']) == 0 )
				{
					$this->validate_others();
				}
				
	
//~ die('catalog_imports/index()<br/>before saving, these are the errors found:<br/><textarea style="width:80%; height:80%;">'.print_r($this->data, true).'</textarea>');			
			//if error-free, do the insert with rollback
			// 'error-free' in this case doesn't care about unknown_fields, which won't be imported anyway
				if(	   count($this->data['errors']['upload_errors'])   == 0 
					&& count($this->data['errors']['missing_fields'])  == 0 
					&& count($this->data['errors']['missing_targets']) == 0 
					&& count($this->data['errors']['missing_chromes']) == 0 
					&& count($this->data['errors']['missing_species']) == 0 
					&& count($this->data['errors']['bad_application']) == 0	)
				{
					$this->do_insert();
				}
			//if there are errors, alert the user in the missing_X_p
				else 
				{	
					
					if(count($this->data['errors']['missing_chromes']) > 0)
					{
						$this->data['chromes_dd'] = $this->thesaurus->chromes_dropdown();
						
						$this->data['missing_chromes_p'] = $this->load->view( 'partials/missing_chromes_p', $this->data, true);
						$this->data['new_chromes_form_p'] = $this->load->view(  'thesaurus/partials/new_chrome_form_p', $this->data, true);
						$this->data['new_chrome_alternates_form_p'] = $this->load->view( 'thesaurus/partials/new_chrome_alternates_form_p', $this->data, true);
						$this->data['thesaurus_chrome_alternates_p'] = $this->load->view('thesaurus/partials/thesaurus_chrome_alternates_p', $this->data, true);
					}
					if(count($this->data['errors']['missing_targets']) > 0)
					{
						$this->data['targets_dd'] = $this->thesaurus->targets_dropdown();
						
						$this->data['missing_targets_p'] = $this->load->view('partials/missing_targets_p', $this->data, true);
						$this->data['new_targets_form_p'] = $this->load->view( 'thesaurus/partials/new_target_form_p', $this->data, true);
						$this->data['new_targets_alternates_form_p'] = $this->load->view( 'thesaurus/partials/new_target_alternates_form_p', $this->data, true);
						$this->data['thesaurus_target_alternates_p'] = $this->load->view('thesaurus/partials/thesaurus_target_alternates_p', $this->data, true);

					}
					if(count($this->data['errors']['missing_species']) > 0)
					{
						$this->data['species_dd'] = $this->thesaurus->species_dropdown();
						
						$this->data['missing_species_p'] = $this->load->view( 'partials/missing_species_p', $this->data, true);
						$this->data['new_species_form_p'] = $this->load->view( 'thesaurus/partials/new_species_form_p', $this->data, true);
						$this->data['new_species_alternates_form_p'] = $this->load->view( 'thesaurus/partials/new_species_alternates_form_p', $this->data, true);
						$this->data['thesaurus_species_alternates_p'] = $this->load->view('thesaurus/partials/thesaurus_species_alternates_p', $this->data, true);
					}
					if(count($this->data['errors']['missing_fields']) > 0)
					{
						$this->data['missing_fields_p'] = $this->load->view( 'partials/missing_fields_p', $this->data, true);
					}
					if(count($this->data['errors']['upload_errors']) > 0)
					{	
						$this->data['upload_errors_p'] = $this->load->view( 'partials/upload_errors_p', $this->data, true);
					}
					if(count($this->data['errors']['parse_errors']) > 0)
					{
						$this->data['parse_errors_p'] = $this->load->view( 'partials/parse_errors_p', $this->data, true);
					}
					if(count($this->data['errors']['bad_application']) > 0)
					{
						$this->data['unknown_applications_p'] = $this->load->view( 'partials/unknown_applications_p', $this->data, true);
						$this->data['new_application_alternates_form_p'] = $this->thesaurus_module->get_application_alternates_form();
						$this->data['new_applications_form_p'] = $this->load->view('thesaurus/partials/new_application_form_p', $this->data, true);
						$this->data['thesaurus_application_alternates_p'] = $this->load->view('thesaurus/partials/thesaurus_application_alternates_p', $this->data, true);
					}
				}
			}
			else//there were upload errors
			{
				$this->data['upload_errors_p'] = $this->load->view( 'partials/upload_errors_p', $this->data, true);
			}
		}//end if(file was submitted)		

		$this->data['vendor_id_dropdown'] = $this->vendor_id_dropdown();

	//prepare the views
		//~ $this->template
			//~ ->set_partial('upload_form_partial', 'partials/upload_form_partial', $this->data)
			//~ ->set_partial('choose_file_partial', 'partials/choose_file_partial', $this->data)			
			//~ ->set_partial('excluded_products_p', 'partials/excluded_products_p', $this->data)
			//~ ->set_partial('unknown_fields_p', 'partials/unknown_fields_p', $this->data)
//~ 
			//~ ->append_css('module::cat_import.css')
			//~ ->build('cat_import_view', $this->data);
			
			
/* if we're not processing a file yet, just show the upload_form_partial */			
if(!isset($_FILES['file']))			
{	
	$this->load->view('header_v', $this->data);

	$this->data['upload_form_partial'] = $this->load->view('partials/upload_form_partial', $this->data, true);
	$this->load->view('cat_import_view', $this->data);
}
/* if we ARE processing a form, load everything else*/
else
{
//~ $this->data['choose_file_partial'] = $this->load->view('partials/choose_file_partial', $this->data, true);
	$this->data['excluded_products_p'] = $this->load->view('partials/excluded_products_p', $this->data, true);
	$this->data['unknown_fields_p'] = $this->load->view('partials/unknown_fields_p', $this->data, true);
	$this->data['cat_heads_dd'] = $this->thesaurus->catalog_header_dropdown();
	$this->data['new_cat_head_alternates_form_p'] = $this->load->view('thesaurus/partials/new_catalog_headers_alternates_form_p', $this->data, true);
	$this->load->view('cat_import_results_view', $this->data);
}
//~ $this->load->view('cat_import_view', $this->data);
	}
	
////////////////////////////////////////////////////////////////////////////////
	
/**
 * Checks the uploaded file for filetype (by extension), for upload errors, 
 * and for filename (against other files in the uploads folder)
 * 
 * 
 * @return boolean
 */
	function validate_file()
	{
		$this->data['errors']['filename'] = $_FILES["file"]["name"];
		
	// first, make sure it's an allowed filetype	
		$this->extension = end(explode(".", $_FILES["file"]["name"]));
		
		if (!in_array($this->extension, $this->allowedExts))
		{
			$this->data['errors']['upload_errors'][] = "Invalid file type";
			return false;
		}		
		else
		{//next, make sure the upload worked properly	
			if ($_FILES["file"]["error"] > 0)
			{
				$this->data['errors']['upload_errors'][] = "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
			else
			{// avoid filename confusion 	
				if (file_exists($this->uploads_folder . $_FILES["file"]["name"]))
				{
					$this->data['errors']['upload_errors'][] =  $_FILES["file"]["name"] . "A file by this name already exists. ";
					return false;
				}
				else
				{
				// if no upload errors, pass the filename to read_xls() for processing by the phpExcel library
					$this->filename = $_FILES['file']['tmp_name'];
					return true;				
				}//end if(has new name) - else
			}//end if(upload errors)
		}//end if(allowed file type)
	}
	
////////////////////////////////////////////////////////////////////////////////
/**
 * list of canonical field names
 * list of spreadsheet column names
 * 
 * $this->validated_fields holds canonical field names with the array index of the matching spreadsheet column
 *	
 * 
 * foreach spreadsheet name, check each canonical name for a match.
 *	if found, insert into validated_columns array
 *		canonical => spreadsheet
 * 
 * @todo change first line of foreach to use thesaurus module service
 * 
 * 
 * @return boolean
 */
	function validate_fieldnames()
	{
		$errors = array();
		$col=0;
		
		foreach($this->column_headers as $column)
		{
			$result = $this->thesaurus_m->get_catalog_header_canonical($column);
			if($result)
			{	
				$this->validated_fields[$col] = $result;
			}
			else
				$this->data['errors']['unknown_fields'][] = 'Unrecognized Column Name: <strong>'.$column.'</strong><br/>';
			$col++;
		}
		if(count($errors) > 0)
			return false;
		else
			return true;

	}
////////////////////////////////////////////////////////////////////////////////
/**
 * Checks the required fields array against the pre-validated incoming spreadsheet's
 * column headers to make sure all required fields are present.
 * If any required fields are found to be missing, adds the missing field(s) to
 * $this->data['errors']['missing_fields']
 */
	function missing_fields()
	{
		foreach($this->catalog_required_fields as $field)
		{
			if(!in_array($field, $this->validated_fields))
			   $this->data['errors']['missing_fields'][] = $field;
		}
	}
////////////////////////////////////////////////////////////////////////////////
/**
 * checks each target, chrome, clone, and species against the thesaurus.
 * Missing clones are just added to the clones table without human review.
 * missing targets, chromes, and species are recorded in their own $this->data['errors']['missing_X'] array
 *	to be reviewed by the user and added to either the canonical names table or as alternate names
 */

	function validate_others()
	{
		$this->load->model('clone_exceptions_model');
		$catalog_number;
		$weblink;
		$application;
		$validateme = true; 	//if the product is not for Flow Cytometry applications, switch this to false to skip checks for exceptions

	//for each row...
		for($row=2; $row < $this->highestRow; $row++)		
		{
			$validateme = true;
	//for each column in the row, find the catalog number and weblink in case of exceptions	coming before the target, clone, or chrome column
			for($col=0; $col<$this->highestColumnIndex; $col++)
			{
				if(array_key_exists($col, $this->validated_fields ) )
				{
				//~ if($this->validated_fields[$col] === 'applications' && $this->spreadsheet_arr[$row][$col] !== 'FC')
					if($this->validated_fields[$col] === 'applications') //'Flow Cytometry')
					{
						if(	$this->thesaurus_m->exists_application($this->spreadsheet_arr[$row][$col])
							&& $this->thesaurus_m->get_applicationid($this->spreadsheet_arr[$row][$col]) !== '1'
							)
							$validateme = false;
					}
					if($this->validated_fields[$col] === 'catalog_number')
						$catalog_number = $this->spreadsheet_arr[$row][$col];
					if($this->validated_fields[$col] === 'product_url')
						$weblink =$this->spreadsheet_arr[$row][$col];
				}

			}
			if($validateme)
			{
			//for each column in the row find exceptions	
				for($col=0; $col<$this->highestColumnIndex; $col++)		
				{
					$this_item = $this->spreadsheet_arr[$row][$col];
					if(array_key_exists($col,$this->validated_fields))
					{
						switch($this->validated_fields[$col])
						{
							case 'applications':
								$this->validate_applications($this_item, $catalog_number, $weblink);
								break;
							case 'category':
								$this->validate_categories($this_item, $catalog_number, $weblink);
								break;
							case 'target':
								$this->validate_target($this_item, $catalog_number, $weblink);
								break;
							case 'format':
								$this->validate_chrome($this_item, $catalog_number, $weblink);
								break;
							case 'clone':
								$this->validate_clone($this_item, $catalog_number, $weblink);
								break;
							case 'target_species':		//fall-through so both species columns run the code here
							case 'source_species':
								$this->validate_species($this_item, $catalog_number, $weblink);
								break;
						}
					}
				}//end for column in row
			}//end if($validateme)
		}// end foreach row
		
	}//end function
	
////////////////////////////////////////////////////////////////////////////////
	function validate_applications($application, $catalog_number, $weblink)
	{
		$application = trim($application);
		$result = $this->thesaurus_m->exists_application($application);
		if(!$result)
		{
			if(!isset($this->data['errors']['bad_application'][$application]	)	)
				$this->data['errors']['bad_application'][$application] = "APPLICATIONS|".$application."|".$catalog_number."|".$weblink;
		}
	}
	function validate_categories($category, $catalog_number, $weblink)
	{
		$category = trim($category);
		$result = $this->thesaurus_m->exists_category($category);
		if(!$result)
		{
			if(!isset$this->data['errors']['bad_category'][$category]	)	)
				$this->data['errors']['bad_category'][$category] = "REAGENT_CATEGORY|".$category."|".$catalog_number."|".$weblink;
		}
	}
/**
 * Passes $target to exclude_product() to see if it contains any matches to $EXCLUDE.
 * If a match is not found, checks to see if we know about the chrome. If not, 
 * adds its catalog_number, and the product's weblink to $this->data['errors']['missing_targets']
 * so it can be reported to the user.
 * 
 * @param type $target
 * @param type $catalog_number
 * @param type $weblink
 */
	function validate_target($target, $catalog_number, $weblink)
	{
		$target = trim($target);
		if($target!= '' && !$this->exclude_product($target, 'target', $catalog_number, $weblink) )
		{
			$result = $this->thesaurus_m->exists_target($target);
			if(!$result)
			{
				if(!isset($this->data['errors']['missing_targets'][$target] ) )
					 $this->data['errors']['missing_targets'][$target] = "TARGET|".$target."|".$catalog_number."|".$weblink;
			}
		}
	}
////////////////////////////////////////////////////////////////////////////////
/**
 * Passes the chrome ("format") to exclude_product to see if it contains any matches to $EXCLUDE
 * If a match is not found, checks to see if we know about the chrome. If not, adds
 * its catalog_number, and the product's weblink to $this->data['errors']['missing_chromes']
 * so it can be reported to the user.
 * 
 * 
 * @param type $chrome
 * @param type $catalog_number
 * @param type $weblink
 */
	function validate_chrome($chrome, $catalog_number, $weblink)
	{
		$chrome = trim($chrome);
		//if it isn't an empty field AND it contains a $EXCLUDE keyword, it fails validation and is put in the excluded_rows array
		if($chrome!='' && !$this->exclude_product($chrome, 'chrome', $catalog_number, $weblink) )
		{
		//if we don't know about the chrome, add it to the missing_chromes array
			$result = $this->thesaurus_m->exists_chrome($chrome);
			if(!$result)
			{
			// don't duplicate entries. 
				if(!isset($this->data['errors']['missing_chromes'][$chrome] ) )
					 $this->data['errors']['missing_chromes'][$chrome] = "CHROME|".$chrome."|".$catalog_number."|".$weblink;
			}
		}
	}
////////////////////////////////////////////////////////////////////////////////
/**
 * Checks to see if $clone is in the clones table. If not, it adds the clone to 
 * $this->data['errors']['missing_clones'] and adds the clone to the clones table.
 * 
 * @param type $clone
 * @param type $catalog_number
 * @param type $weblink
 */
	function validate_clone($clone, $catalog_number, $weblink)
	{
		$clone=trim($clone);
		$result = $this->thesaurus_m->exists_clone($clone);
		if(!$result )
		{
			if( !isset( $this->data['errors']['missing_clones'][$clone] ) )
			{	
				$this->data['errors']['missing_clones'][$clone] = "CLONE|".$clone."|".$catalog_number."|".$weblink;
				$this->clones_model->insert($clone);
			}
		}
	}
////////////////////////////////////////////////////////////////////////////////
/**
 * Checks each species in $species (comma delimited) to see if we know about that
 * species name. If not, the species name, product catalog number, and weblink
 * for the product are added to $this->data['errors']['missing_species'] so 
 * it can be reported to the user as not found.
 * 
 * @param string $species
 * @param string $catalog_number
 * @param string $weblink
 */
	function validate_species($species, $catalog_number, $weblink)
	{
		$species_arr = explode(',', $species);
		foreach($species_arr as $this_species)
		{
			$this_species = trim($this_species);
			//~ $result = $this->thesaurus_m->exists_species( $this_species );	
			if($this_species!='' && !$this->thesaurus_m->exists_species( $this_species ))	//!$result)
			{
				if(!isset($this->data['errors']['missing_species'][$this_species] ) )
				{	
					$this->data['errors']['missing_species'][$this_species] = "SPECIES|".$this_species."|".$catalog_number."|".$weblink;
				}
			}
		}
	}
	
	
////////////////////////////////////////////////////////////////////////////////
/**
 * Checks to see if any word (space delimited) in $item matches any of the terms
 * in $this->EXCLUDE. If a match is found, the item is added to $this->data['excluded_rows']
 * so the product will not be inserted into the catalog table.
 * Returns true if the product should be excuded, false if it should be inserted
 * 
 * 
 * @param type $item
 * @param type $problem_field
 * @param type $catalog_number
 * @param type $weblink
 * @return boolean
 */
	
	function exclude_product($item, $problem_field, $catalog_number, $weblink)
	{
		$is_excludable = false;
		$str_arr = explode(' ', $item);
		foreach($str_arr as $word)
		{
			if( in_array($word, $this->EXCLUDE) )
			{
				$this->data['excluded_rows'][$catalog_number] = array('catalog_number'=>$catalog_number, 'problem_field'=>$problem_field, 'problem_string'=>$item, 'weblink'=>$weblink) ;
				$is_excludable = true;
			}

		}
		return $is_excludable;
	}
	
////////////////////////////////////////////////////////////////////////////////
/**
 * Inserts each row of $this->spreadsheet_arr into the catalog table.
 * If the catalog number for a row already exists in the catalog table, 
 *	the row is updated instead.
 * 
 * 
 */
	function do_insert()
	{
		$insert=true;
		$exclude_row = false;
		$data['vendor_id'] = $this->vendor_id;
		$data['vendor_name'] = $this->vendors_model->get_vendor_name($data['vendor_id']);
	
	//start transaction
		$this->db->trans_start();
		
	//for each row, 
		for($row=2; $row < $this->highestRow; $row++)
		{
			
		//for each column in the row 
			for($col=0; $col<$this->highestColumnIndex; $col++)		
			{
				$this_item = $this->spreadsheet_arr[$row][$col];
				if(array_key_exists($col,$this->validated_fields))
				{
					switch($this->validated_fields[$col])
					{
						case 'catalog_number':
							if(array_key_exists($this_item, $this->data['excluded_rows']))
							{
								$exclude_row = true;
							}
							else
							{
								$data['catalog_number'] = $this_item;
								if($this->catalog_m->exists($data['catalog_number']))
									$insert=false;
							}
							break;
						case 'target':
							$data['target'] = $this_item;
							break;
						case 'format':
							$data['format'] = $this_item;
							break;
						case 'clone':
							$data['clone'] = $this_item;
							break;
						case 'isotype':
							$data['isotype'] = $this_item;
							break;
						case 'unit_size':
							$data['unit_size'] = $this_item;
							break;
						case 'price':
							$data['price'] = trim(str_replace('$', '', $this_item));
							break;
						case 'product_url':
							$data['product_url'] = $this_item;
							break;
						case 'target_species':
							$data['target_species'] = $this_item;
							break;
						case 'regulatory_statusid':
							$data['regulatory_statusid'] = $this_item;
							break;
						case 'regulatory_status':
							$data['regulatory_status'] = $this_item;
							break;
						case 'source_species':
							$data['source_species'] = $this_item;
							break;
						case 'applications':
							$applicationid = $this->thesaurus_m->get_applicationid($this_item);
							$data['applicationid'] = $applicationid;
							break;
						case 'category':
							$categoryid = $this->thesaurus_m->get_categoryid($this_item);
							$data['categoryid'] = $categoryid;
							break;
						
						
					}
				}
			}
			if(!$exclude_row)
			{
				if($insert)
					$this->catalog_m->insert($data);
				else 
					$this->catalog_m->update($data);
				
				
			//check target_species to make sure we have this target to all its species
				$this->check_target_species($data['target'], $data['target_species']);
			//check product_species to make sure we have this product to each of its species
				$this->check_product_species($this->db->insert_id(), $data['target_species']);
			}
			$insert=true;
			$exclude_row = false;
		}
		
	//end transaction
		$this->db->trans_complete();
	//alert to success or failure of transaction
		if($this->db->trans_status() === TRUE)
		{
			$this->data['insert_success_p'] = $this->load->view( 'partials/insert_success_p', '', true);
		}
		else
		{
			
			$this->data['insert_failure_p'] = $this->load->view( 'partials/insert_failure_p', true);
		}
	}
	
////////////////////////////////////////////////////////////////////////////////
/**
 * Checks if each of the species in $target_species is connected to $product
 *	in the product_species database table
 * If any of the product --> species combinations does not exist there, it is inserted
 * 
 * @param type $productid
 * @param type $target_species
 */
	function check_product_species($productid, $target_species)
	{
		$species_arr = explode(',', $target_species) ;
		foreach($species_arr as $species)
		{
			if( !$this->product_species_model->exists($productid, trim($species) ) )
				$this->product_species_model->insert($productid, trim($species) );
		}
	}
	
////////////////////////////////////////////////////////////////////////////////
/**
 * Checks if each of the species in $target_species is connected to $target
 *	in the target_species database table
 * If any of the target --> species combiniations does not exist there, it is inserted
 * 
 * @param type $target
 * @param type $target_species
 */
	function check_target_species($target, $target_species)
	{
		$species_arr =  explode(',', $target_species) ;
		foreach($species_arr as $species)
		{
			if( !$this->target_species_model->exists($target, trim($species) ) )
				$this->target_species_model->insert($target, trim($species) );
		}
	}

////////////////////////////////////////////////////////////////////////////////
	/**
	 *	Creates a phpExcelObject object from the spreadsheet
	 *	and stores it in $this->data['objPHPExcel'].
	 *	Also peels out worksheet title, highestRow, highestColumn, highestColumnIndex, and number of columns
	 *	and stores them in class variables
	 * 
	 * @param string $filename
	 * @return type objReader object
	 */
	function parse_xls($filename)
	{
		
		$inputFileType = PHPExcel_IOFactory::identify($filename);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objReader -> setReadDataOnly(true);				//true if you don't need to write
		$this->data['objPHPExcel'] = $objReader->load($filename);
				
		$worksheet = $this->data['objPHPExcel']->getActiveSheet();
			$this->worksheetTitle     = $worksheet->getTitle();
			$this->highestRow         = $worksheet->getHighestRow(); // e.g. 10
			$this->highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
			$this->highestColumnIndex = PHPExcel_Cell::columnIndexFromString($this->highestColumn);
			$this->nrColumns = ord($this->highestColumn) - 64;
		
			
	// put it in a 2d array
		//for each row	
		for ($row = 1; $row <= $this->highestRow; ++ $row) 
		{
			//for each column
			for ($col = 0; $col < $this->highestColumnIndex;  $col++ ) 
			{
				$cell = $worksheet->getCellByColumnAndRow($col, $row);				
				$this->spreadsheet_arr[$row][$col] = $cell->getFormattedValue();
			}
		}

		//get the header names
		$this->column_headers = $this->spreadsheet_arr[1];
//die($this->debug_array($this->column_headers));
	}
////////////////////////////////////////////////////////////////////////////////
	function parse_xml($filename)
	{
	//put it in a 2d array
		libxml_use_internal_errors(true);
		$xml_obj = simplexml_load_file($filename); 
	//check for xml parsing errors	
		if ($xml_obj === false) 
		{
		    foreach(libxml_get_errors() as $error) 
			{
				$this->data['errors']['parse_errors'][] = "<p>". trim($error->message) .
													"<br/>  Line: $error->line" .
													"<br/>  Column: $error->column </p>";
			}
		}		
		else
		{		
		//get the header names
			$headers = array();
			$first_row = $xml_obj->product[0];
			$this->highestColumnIndex = 0;
			foreach($first_row as $key=>$value)
			{
				$this->column_headers[] = $key;
				$this->highestColumnIndex++;
			}
			if(!in_array('category', $this->column_headers))
			{
				$this->column_headers[] = 'category';
				
			}
			
		// make spreadsheet_arr so it matches the same format of xls files

			$this->spreadsheet_arr[1] = $this->column_headers;

			$row_count = 2;
			foreach($xml_obj->product as $row)
			{
				$children = (array)$row->children();
			//for each column
				for ($col = 0; $col < $this->highestColumnIndex;  $col++ ) 
				{
				// if a cell is empty, the array gets an empty simplexmlobject unless it's cast as a string
					$cell =	(string)$children[ $this->column_headers[$col] ];				
					$this->spreadsheet_arr[$row_count][$col] = $cell;
				}
if(!isset($children['category']))
	$this->spreadsheet_arr[$row_count][] = 'Antibody';
//die('<textarea>'.print_r($this->spreadsheet_arr, true).'</textarea>');
				$row_count++;
			}
		//store the $this->highestRow
			$this->highestRow = count($this->spreadsheet_arr);
		}
	}
	
////////////////////////////////////////////////////////////////////////////////
	
	
	/** 
	 * gets a list of vendors from get_vendors() and puts it in a
	 * 	<select>
	 * 		<option> value = "vendor_id" text = "name" </option>
	 * 		...
	 * 	</select>
	 */
	function vendor_id_dropdown()
	{
	
		$vendors = $this->vendors_model->read_current();
		
		$dd = '<select class="vendor_id_dropdown" id="vendor_id_dropdown" name="vendor_id_dd">
	<option value="-1">Select a Vendor</option>
		';
		foreach ($vendors as $v)
		{
			//~ $dd.= '<option value="'.$v['vendor_id'].'">'.$v['vendor_name'].'</option>
			$dd.= '<option value="'.$v['vendor_id'].'">'.$v['vendor_name'].'</option>
			';
		}
		$dd.='</select>';

		return $dd;
		
	}
	
	
////////////////////////////////////////////////////////////////////////////////	
/**
 * Takes a spreadsheet array ( pre-processed by parse_xls() ) and prints it to 
 * screen in the vendor-catalog xml format
 * 
 * 
 */	
	private function make_xml_from_xls()
	{
		$xml='<?xml version="1.0" encoding="utf-8"?>
<catalog>
	<company>'.$this->vendor_id.'</company>';
		

	//for each row, ...	
		for($row=2; $row < $this->highestRow; $row++)
		{
			$xml.='
	<product>	';
		//for each column in the row 
			for($col=0; $col<$this->highestColumnIndex; $col++)		
			{
				$this_item = $this->spreadsheet_arr[$row][$col];
				if(array_key_exists($col,$this->validated_fields))
				{
					switch($this->validated_fields[$col])
					{
						case 'catalog_number':
							$xml.='
		<product_number>'.$this_item.'</product_number>';
							break;
						case 'target':
							$xml.= '<target>'.$this_item.'</target>';
							break;
						case 'format':
							$xml.= '<format>'.$this_item.'</format>';
							break;
						case 'clone':
							$xml.= '<clone>'.$this_item.'</clone>';
							break;
						case 'isotype':
							$xml.= '<isotype>'.$this_item.'</isotype>';
							break;
						case 'amount':
							$xml.= '<size>'.$this_item.'</size>';
							break;
						case 'price':
							$xml.= '<price>'.$this_item.'</price>';
							break;
						case 'weblink':
							$xml.= '<product_URL>'.$this_item.'</product_URL>';
							break;
						case 'target_species':
							$xml.= '<target_species>'.$this_item.'</target_species>';
							break;
						case 'regulatory_statusid':
							$xml.= '<regulatory_statusid>'.$this_item.'</regulatory_statusid>';
							break;
						case 'regulatory_status':
							$xml.= '<regulatory_status>'.$this_item.'</regulatory_status>';
							break;
						case 'source_species':
							$xml.= '<source_species>'.$this_item.'</source_species>';
							break;
					}//end switch
				}//end if(array_key_exists)
			}//end column
			$xml.='
	</product>
				';
		}//end row
		$xml.='
</catalog>';
		
		die('<textarea>'.$xml.'</textarea>');
	}//end function
	
	
	
	
	
	
	
	function strip_price_symbol($price)
	{
		$symbols = '$';//array('$', '€', '¢', '£', '¥', '₩', '₪', '฿', '₫', '₴', '₹');
		
		$price = strstr($price, '$');
		return $price;
	}
	
	
	
	
}//end class
