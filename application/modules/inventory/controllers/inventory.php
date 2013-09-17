<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once  APPPATH.'modules/membership/controllers/resources.php';
// class Home extends MY_Controller {
//~ class Inventory extends Secure_Controller 
class Inventory extends Resources //Loggedin_Controller 
{

	
//////////////////////////////////////////////////////////////////////////////////////////
	function __construct()
	{
		parent::__construct();
		
		$this->data['title'] = "Fluorish | Labs and Cores";
		$this->data['labs'] = array();
		
		$this->load->model('inventory_m');
		$this->load->model('inventory_show_fields_m');

		$this->load->model('membership/groups_m');
		//~ $this->load->model('labs_and_cores/lab_user_link_model');
		
		if(isset($this->session->userdata['logged_in']))
		{
		//~ $this->data['labs'] = $this->lab_user_link_model->read_by_userid($this->data['fl_user']['id']);
			foreach($this->session->userdata['groups'] as $group)
				//~ if($group['group_type'] == 1 || $group['group_type'] == 3)	//if it's a lab or a personal resources group
					//~ $this->data['labs'][] = $group;
			{
				foreach($group['resources'] as $resource)
				{
					//if it has an inventory (and it hasn't yet been added to $data['labs']), it's considered another 'lab'
					if($resource['resource_type'] == 'inventory' && !array_key_exists($group['group_id'], $this->data['labs']))
					{
						$this->data['labs'][] = $group;
					}
				}
				
			}
			$this->data['show_fields'] = $this->setup_show_fields();
		}
	}// end __construct()
	
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////
/**
 * 
 * @param string $widget_type [optional] - is the table an editable 'form' or a read-only 'display' (default)
 * 
 * 
 */
	public function index($widget_type = 'display') 
	{	
		$field=$this->input->post('dbfield');
		$comparison = $this->input->post('comparison');
		$comp_value = $this->input->post('comp_value');
		
	// load the navbar/header view	
		//~ $this->load->view('header_v');
		
		foreach($this->data['labs'] as $lab)
		{
			$this->data['inventories'][$lab['group_id']]['labname'] = $lab['group_name'];
			$this->data['inventories'][$lab['group_id']]['labid'] = $lab['group_id'];
			foreach($lab['resources'] as $resource)
			{
				if($resource['resource_type'] == 'inventory')
					$this->get_inventory_table($resource['id'], $widget_type, $field, $comparison, $comp_value);
			}
		}


		// get lists for autocomplete
			$this->data['vendor_list'] = $this->get_vendor_list();
			$this->data['target_list'] = $this->get_target_list();
			$this->data['chrome_list'] = $this->get_chrome_list();
			$this->data['clone_list'] = $this->get_clone_list();
//			$this->data['isotype_list'] = $this->get_isotype_list();
			$this->data['src_species_list'] = $this->get_source_species_list();
			

				
				
			
			//~ $this->load->view('partials/filter_inventory_p', $this->data);
			//~ $this->load->view( 'partials/add_by_cat_num_partial', $this->data);
			//~ $this->load->view( 'partials/add_manually_partial', $this->data);
			//~ $this->load->view( 'partials/inventory_container_partial', $this->data);
			//~ $this->load->view( 'partials/show_fields_partial', $this->data);
			//~ $this->load->view(  'partials/add_single_item_p', $this->data);
			//~ $this->load->view( 'partials/import_form_p', $this->data);
			//~ $this->load->view('inventory_view', $this->data);
		
	}
	
////////////////////////////////////////////////////////////////////////////////
/** 
 * creates an inventory resource to hold inventory items
 * 
 *	parameters
		$data['group_id'] 
		$data['resource_name']
		$data['resource_type']
		$data['xml']
		$data['size']
		$data['hash']
 */
	function create_inventory($data = NULL)
	{
		if($data === null)
			$data = $this->input->post();
		
		$resource = $this->resources_m->create_resource($data);
		
		if($resource)
			return true;
		else
			return false;
	}
	/**
	 * loads the form to create an inventory resource
	 * this form submits to $this->create_inventory()
	 */
	function create_inventory_form()
	{
		$data['managed_groups_dropdown'] = '<select name="group_id" id="group_id"><option>some group id</option><option>some other group id</option></select>';
	
		return $this->load->view('partials/create_inventory_form_p', $data, true);
	}
////////////////////////////////////////////////////////////////////////////////
	function edit()
	{
		//~ $this->index('form');
		$this->my_inventories('form');
	}
////////////////////////////////////////////////////////////////////////////////
	function display($resource_id)
	{
		$this->index('display');
	}
	//~ function edit_item($item_id, $is_ajax = FALSE)
	//~ {
		//~ $this_item['show_fields'] = $this->data['show_fields'];
		//~ $this_item['item'] = 
		//~ 
		//~ if($is_ajax)
			//~ $item_form = $this->load->view('inventory_item_form_p', $this_item, true );
		//~ else
			//~ $this->load->view('inventory_item_form_p', $this_item );
		//~ 
		//~ //$table_row = $this->load->view('partials/inventory_item_display_p', $this_item, true);	
	//~ }
	
	
////////////////////////////////////////////////////////////////////////////////
	function my_inventories($widget_type = 'display')
	{
	//if the user has defined filters to limit which columns are shown, store them in variables
		$field=$this->input->post('dbfield');
		$comparison = $this->input->post('comparison');
		$comp_value = $this->input->post('comp_value');
		
		foreach($this->session->userdata['groups'] as $group) 
		{
			if($group['group_type'] == 1 || $group['group_type'] == 3)
			{	
				$this->data['inventories'][$group['group_id']]['labname'] = 	$group['group_name'];
				$this->data['inventories'][$group['group_id']]['labid'] = 	$group['group_id'];		
				foreach($group['resources'] as $resource)
					if($resource['resource_type'] == 'inventory')
						$this->data['inventories'][$group['group_id']]['table'] =  	$this->get_inventory_table($resource['id'], $widget_type, $field, $comparison, $comp_value);
			}
		}
//~ die('<textarea>'.print_r($this->data['inventories'], true).'</textarea>');
			$this->data['vendor_list'] = $this->get_vendor_list();
			$this->data['target_list'] = $this->get_target_list();
			$this->data['chrome_list'] = $this->get_chrome_list();
			$this->data['clone_list'] = $this->get_clone_list();
//			$this->data['isotype_list'] = $this->get_isotype_list();
			$this->data['src_species_list'] = $this->get_source_species_list();
			

		
			//~ $this->load->view('header_v');
			

			return $this->load->view('inventory_view', $this->data, true);
	}
	
	
	
////////////////////////////////////////////////////////////////////////////////
/**
 * Pulls an array of inventory field preferences from custom_reagents_show_fields table
 * 
 * 
 * @return array 
 */	
	function setup_show_fields()
	{
		$this->load->model('inventory_show_fields_m');
		$arr = $this->inventory_show_fields_m->read_by_userid($this->session->userdata['logged_in']['userid']);
		$show_fields = array();
//~ die('invenotry/setup_show_fields() $arr:<br/><textarea>'.print_r($arr, true).'</textarea>');		
		foreach($arr as $item)
		{
			$show_fields[$item['field_name']]['show'] = $item['show'];
			$show_fields[$item['field_name']]['order'] = $item['order'];
		}
		
		return $show_fields;
		
	}
	
////////////////////////////////////////////////////////////////////////////////
	function get_form_show_fields()
	{
		//~ $this->load->view('header_v');
		
		return $this->load->view( 'partials/show_fields_p', $this->data, true);
		
		//~ $the_form = $this->load->view( 'partials/show_fields_partial', $this->data, true);
		//~ return $the_form;
	}


////////////////////////////////////////////////////////////////////////////////
/**
 * Constructs an HTML <table> of the given lab's inventory
 * 
 * @param type $resource_id
 * 
 * @param string $widget_type [optional] determines if the table rows are 'display' (default) or 'form'
 * @param type $field		[optional] used to filter 
 * @param type $comparison	[optional] used to filter 
 * @param type $comp_value	[optional] used to filter 
 * 
 * @return string	the text of the html <table>
 */
	function get_inventory_table($resource_id, $widget_type='display', $field='', $comparison='', $comp_value=''  )
	{
		
		$data['userid'] = $this->session->userdata['logged_in']['userid'];
		$data['resource_id'] = $resource_id;
		$data['widget_type'] = $widget_type;
		$data['group_name'] = $this->get_group_name_from_resource_id($resource_id);
		$data['permission'] = $this->get_resource_permission($resource_id);
		//~ $inv = $this->custom_reagents_model->read($resource_id, $field, $comparison, $comp_value);
		$data['inv'] = $this->inventory_m->read($resource_id, $field, $comparison, $comp_value);
//~ var_dump($inv);
//~ die('inventory/get_inventory_table():<br/>$resource_id: '.$resource_id.'<br/>$inv:<textarea>'.print_r($data['inv'], true).'</textarea>');
		//~ echo 'custom_reagents_show_fields for user '.$userid.':<textarea>'.print_r($this->data['show_fields'], true).'</textarea>';
		$data['show_fields'] = $this->data['show_fields'];
	
		return $this->load->view('partials/inventory_table_p', $data, true);
		
	}

////////////////////////////////////////////////////////////////////////////////
/**
 * takes the $_POST from the show_fields_partial 
 * updates all custom_reagents_show_fields rows for the current userid
 * 
 */	
	function update_show_fields()
	{
		//~ echo 'inventory/update_show_fields() was called';
		$post_arr = $this->input->post(NULL, TRUE); 					// returns all POST items with XSS filter 
		$data = array();
		//~ echo '<textarea>'.print_r($post_arr, true).'</textarea>';
		
		//~ $data['userid'] = $this->data['fl_user']['id'];
		$data['userid'] = $this->session->userdata['logged_in']['userid'];
				
		foreach($this->data['show_fields'] as $key => $value)
		{
			//~ echo '<hr/>$key: '.$key.' ||| $value: '.print_r($value, true).'<br/><br/>';
			
			$data['field_name'] = $key;
			$data['order'] = $value['order'];
			
			if(isset($post_arr[$key]))
				$data['show']  = 'y';
			else $data['show'] = 'n';			
			
			$this->inventory_show_fields_m->update($data);

		}
		
		redirect('inventory');
		
	}
	
	
	
	
////////////////////////////////////////////////////////////////////////////////
/**
 *  parses the "add a reagent by catalog number" and "add a reagent manually"
 * form data and inserts it into custom_reagents table
 */
	 function addReagent()
	 {
//~ die('$POST:<textarea>'.print_r($this->input->post(), true).'</textarea>');
		 //~ echo 'inventory/addReagent() called';
		 $data = $this->input->post();
		 $result = $this->inventory_m->create($data);
		 
		 if($result > 0)
			$this->index();
			//~ return true;
		else 
			die( 'addReagent() failed');
			//~ return false;
	 }
	
////////////////////////////////////////////////////////////////////////////////
	function save_item()
	{
		$data = $this->input->post();
		$result = $this->inventory_m->save($data);
		 
		if($result > 0)
			redirect($this->index('form'));
			//return true;
		else return false;
	}
	
////////////////////////////////////////////////////////////////////////////////
//	get data for autocomplete form elements
/**
 * 
 * @return string
 */	
	function get_vendor_list()
	{
		//~ $this->load->model('vendor_dashboard/vendors_m');
		//~ $vendors = $this->vendors_m->read_all();
		//~ $list = '';
		//~ foreach($vendors as $vendor)
		//~ {
			//~ $list.='"'.$vendor['Name'].'", ';
		//~ }
		
// until the catalog module comes into george, we'll do this:
			$list = '"BD", "e-bio", "Tonbo", "Life Tech", "some other vendor", "some other other vendor"';
		
		return $list;
	}
	
	
////////////////////////////////////////////////////////////////////////////////
	function get_target_list()
	{
		//~ $this->load->model('targets_m');
		//~ $targets= $this->targets_m->read_all();
		//~ $list = '';
		//~ foreach($targets as $target)
		//~ {
			//~ $list.='"'.$target['name'].'", ';
		//~ }
	$list = '"target1", "target2", "target3",';	
		
		return $list;
		
	}

////////////////////////////////////////////////////////////////////////////////

	function get_chrome_list()
	{
		//~ $this->load->model('chromes_m');
		//~ $chromes= $this->chromes_m->read_all();
		//~ $list = '';
		//~ foreach($chromes as $chrome)
		//~ {
			//~ $list.='"'.$chrome['Name'].'", ';
		//~ }
	$list = '"chrome1", "chrome2", "chrome3",';	
		return $list;
	}
	
////////////////////////////////////////////////////////////////////////////////
	function get_clone_list()
	{
		//~ $this->load->model('clones_m');
		//~ $clones= $this->clones_m->read_all();
		//~ $list = '';
		//~ foreach($clones as $clone)
		//~ {
			//~ $list.='"'.$clone['name'].'", ';
		//~ }
	$list = '"clone1", "clone2", "clone3"';
		return $list;
	}
		
	
////////////////////////////////////////////////////////////////////////////////
//	function get_isotype_list()
//	{
//				$this->load->model('vendor_dashboard/vendors_m');
//		$targets= $this->targets_model->read_all();
//		$list = '';
//		foreach($vendors as $vendor)
//		{
//			$list.='"'.$vendor['Name'].'", ';
//		}
//		
//		return $list;
//	}
	
	function get_source_species_list()
	{
		//~ $this->load->model('species_m');
		//~ $species= $this->species_m->read_all();
		//~ $list = '';
		//~ foreach($species as $specie)
		//~ {
			//~ $list.='"'.$specie['species_name'].'", ';
		//~ }
	$list = '"species1", "species2", "species3"';	
		return $list;
	}

	
////////////////////////////////////////////////////////////////////////////////
/**
 * 
 */
	function do_upload()
	{
		$labid = $this->input->post('labid');
		
	//	 echo 'do_upload() is returning this.<br/><br/>We got:<br/><textarea>'.print_r($_FILES, true).'</textarea>';
		//~ 
		$uploads_folder = "uploads/inventory/";
		$allowedExts = array("xml", "txt", "csv", "xls");
		$extension = end(explode(".", $_FILES["file"]["name"]));
	
	// first, make sure it's an allowed filetype	
		if (!in_array($extension, $allowedExts))
		{
			$this->data['response'] = "Invalid file type";
		}
		
		else
		{
		//next, make sure the upload worked properly	
			if ($_FILES["file"]["error"] > 0)
			{
				$this->data['response'] = "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
			else
			{
			// avoid filename confusion 	
				if (file_exists($uploads_folder . $_FILES["file"]["name"]))
				{
					$this->data['response'] =  $_FILES["file"]["name"] . "A file by this name already exists. ";
				}
				else
				{			
				
//							$contents = $this->parse_from_xls($_FILES['file']['tmp_name'] );
					$filename = $_FILES['file']['tmp_name'];
					
					$this->load->library('PHPExcel');
					$inputFileType = PHPExcel_IOFactory::identify($filename);
	echo '<br/>inputFiletype:'.$inputFileType.'<br/>';
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objReader -> setReadDataOnly(true);				//true if you don't need to write
					$objPHPExcel = $objReader->load($filename);
					
					
					foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) 
					{
						$worksheetTitle     = $worksheet->getTitle();
						$highestRow         = $worksheet->getHighestRow(); // e.g. 10
						$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
						$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
						$nrColumns = ord($highestColumn) - 64;

						$table= '<caption>importing into labid '.$labid.' <table class="table table-hover table-bordered" ><tr>';
						for ($row = 1; $row <= $highestRow; ++ $row) 
						{

							if($row==1)
								$table.= '<tr class="success"><td>'.$row.'</td>';
							else
								$table.= '<tr><td>'.$row.'</td>';
							for ($col = 0; $col < $highestColumnIndex; ++ $col) {
								$cell = $worksheet->getCellByColumnAndRow($col, $row);
								$val = $cell->getValue();

								$table.= '<td>' . $val . '</td>';
							}
							$table.= '</tr>';
						}
						$table.= '</table>';

//						return $table;
						echo $table;

					}//end foreach
					
					
					
					
					
				}//end if(has new name)
			}//end if(upload errors)
		}//end if(allowed file type)


	//	$this->template->build('upload_cytometer_p', $this->data);
	//	$this->my_instruments();
		redirect('inventory');
	}
	

////////////////////////////////////////////////////////////////////////////////
	function get_form_add_item($resource_id)
	{
//~ die('resource_id: '.$resource_id);
$data['resource_id'] = $resource_id;
		//~ $this->load->view('header_v');
		return $this->load->view('partials/add_manually_p', $data, true);
		
	}		
		
////////////////////////////////////////////////////////////////////////////////	
	function get_form_add_cat_num()
	{
		//~ $this->load->view('header_v');
		return $this->load->view('partials/add_by_cat_num_p', '', true);
		
	}
	

////////////////////////////////////////////////////////////////////////////////
	function get_form_filter()
	{
		//~ $this->load->view('header_v');
		return $this->load->view('partials/filter_inventory_p', '', true);
	}
	
	function form_inventory_item()
	{
		//~ $this->load->view('header_v');
		return $this->load->view('partials/inventory_item_form_p', '', true);
	}
	
	
	
}//end class
