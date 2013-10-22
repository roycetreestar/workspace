<?php
/**
 * The main controller of the Inventory module
 * 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// class Thesaurus extends MY_Controller 
class Thesaurus extends Loggedin_Controller //Secure_Controller 
{

	public $data = array();
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	function __construct()
	{
		parent::__construct();
	
		$this->load->model('thesaurus_m');
		
	}// end __construct()
	
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	public function index() 
	{		
		$this->load->view('header_v');
		$this->load->view('partials/thesaurus_catalog_headers_p', $this->data);
		$this->load->view('partials/thesaurus_chromes_p', $this->data);
		$this->load->view('partials/thesaurus_species_p', $this->data);
		$this->load->view('partials/thesaurus_targets_p', $this->data);
				
	}
	
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
///////////////		LOOKUP FORMS		/////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
	function get_application_lookup_form()
	{
		return $this->load->view('partials/thesaurus_applications_p', $this->data, true);
	}
	function get_catalog_header_lookup_form()
	{
		return $this->load->view('partials/thesaurus_catalog_headers_p', $this->data, true);
	}
		function get_category_lookup_form()
	{
		return $this->load->view('partials/thesaurus_category_p', $this->data, true);
	}
	function get_chrome_lookup_form()
	{
		return $this->load->view('partials/thesaurus_chromes_p', $this->data, true);
	}
	function get_clone_lookup_form()
	{
		return $this->load->view('partials/thesaurus_clone_p', $this->data, true);
	}
	function get_species_lookup_form()
	{
		return $this->load->view('partials/thesaurus_species_p', $this->data, true);
	}
	function get_target_lookup_form()
	{
		return $this->load->view('partials/thesaurus_targets_p', $this->data, true);
	}
	
///////	ALTERNATES LOOKUP FORMS		/////////	
	function get_application_alternates_lookup_form()
	{
		return $this->load->view('partials/thesaurus_application_alternates_p', $this->data, true);
	}
	function get_catalog_header_alternates_lookup_form()
	{
		$this->data['cat_heads_dd'] = $this->catalog_header_dropdown();
		return $this->load->view('partials/thesaurus_catalog_header_alternates_p', $this->data, true);
	}
	function get_chrome_alternates_lookup_form()
	{
		$this->data['chromes_dd'] = $this->chromes_dropdown();		
		return $this->load->view('partials/thesaurus_chrome_alternates_p', $this->data, true);
	}
	 function get_clone_alternates_lookup_form()
	{
		$this->data['clones_dd'] = $this->clones_dropdown();
		return $this->load->view('partials/thesaurus_clone_alternates_p', $this->data, true);
	}
	function get_species_alternates_lookup_form()
	{
		$this->data['species_dd'] = $this->species_dropdown();
		return $this->load->view('partials/thesaurus_species_alternates_p', $this->data, true);
	}
	function get_target_alternates_lookup_form()
	{
		$this->data['targets_dd'] = $this->targets_dropdown();
		return $this->load->view('partials/thesaurus_target_alternates_p', $this->data, true);
	}
	function get_category_alternates_lookup_form()
	{
		$this->data['category_dd'] = $this->categories_dropdown();
		return $this->load->view('partials/thesaurus_category_alternates_p', $this->data, true);
	}
//////////////////////////////////////////////////////////////////////////////////////////
/**
 * if the second parameter, $return, is set true, the value will be returned.
 * if $return is left false, the result will be echoed
 */
	function lookup($searchterm='', $return=false)
	{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');

		$result = $this->thesaurus_m->get_all_canonical(trim($searchterm));
		
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
				echo $result;
		}
	}
	
	
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
////////////////		CANONICAL NAMES		/////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////
/**
 * if the second parameter, $return, is set true, the value will be returned.
 * if $return is left false, the result will be echoed
 */
	function get_full_canonical($searchterm='', $return=false)
	{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');

		$result = $this->thesaurus_m->get_all_canonical(trim($searchterm));
		
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
				echo $result;
		}
	}
//////////////////////////////////////////////////////////////////////////////////////////
/**
 * if the second parameter, $return, is set true, the value will be returned.
 * if $return is left false, the result will be echoed
 */
	function get_catalog_header_canonical($searchterm='', $return=false)
	{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');

		$result = $this->thesaurus_m->get_catalog_header_canonical(trim($searchterm));
		
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
				echo $result;
		}
	}
	
	function get_catalog_header_alternates($searchterm='', $return=false)
	{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');

		$result = $this->thesaurus_m->get_catalog_header_alternates($searchterm);
		
		if($return)
		{
			if($result)				return $result;
			else 					return $result;
		}
		else 
		{
			$returnable = 'Canonical Name: '.$result[0]['canonical_name'].'<br/>';
			foreach($result as $r)
			{
				$returnable.= '<br/>'.$r['alternate_name'];
			}
			if(!$result)			echo 'no results found';
			else					echo $result;
		}
	}
//////////////////////////////////////////////////////////////////////////////////////////
/**
 * if the second parameter, $return, is set true, the value will be returned.
 * if $return is left false, the result will be echoed
 */	
	function get_chrome_canonical($searchterm='', $return=false)
	{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');
//die('search_string: '.$searchterm);
		$result = $this->thesaurus_m->get_chromes_canonical(trim($searchterm));
		
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
				echo $result;
		}
	}
	function get_chrome_canonical_id($searchterm)
	{
		$result=$this->thesaurus_m->get_chromes_canonical_id(trim($searchterm));
		return $result;
	}
	
//////////////////////////////////////////////////////////////////////////////////////////
/**
 * if the second parameter, $return, is set true, the value will be returned.
 * if $return is left false, the result will be echoed
 */
	function get_species_canonical($searchterm='', $return=false)
	{
//make sure we have a value to look up
		if($searchterm === '')
//		if(!isset($searchterm))
			$searchterm = $this->input->get('search_string');
			
//look up that value in the database		
		$result = $this->thesaurus_m->get_species_canonical(trim($searchterm));

	
//return the proper response to the calling function/user
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
				echo $result;
		}
	}
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////
/**
 * Takes a string $searchterm  and optional boolean $return (default: false)
 * Searches target_alternate_names and returns the canonical name (if $return == true)
 *	or echoes the canonical name (if $return == false)
 * @param string $searchterm
 * @param boolean $return=false
 * @return string or echoes the string
 */	
	function get_target_canonical($searchterm='', $return=false)
	{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');

if(trim($searchterm)!='')
{		$result = $this->thesaurus_m->get_targets_canonical(trim($searchterm));
		
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
				echo $result;
		}
}
else return 0;
	}
	function get_target_canonical_id($searchterm)
	{
		$result=$this->thesaurus_m->get_targets_canonical_id($searchterm);
		return $result;
	}

/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
///////////////////		ALTERNATE NAMES		/////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
	function get_application_alternate_names($searchterm='', $return=false)
	{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');
//die('search_string: '.$searchterm);
		$result = $this->thesaurus_m->get_application_alternates(trim($searchterm));
		
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
			{
//~ die('thesaurus/get_chrome_alternates() got a result:<br/><textarea>'.print_r($result, true).'</textarea>');
				$returnable = '<strong>canonical name:</strong> '.$result[0]['name'].'<br/><br/><strong>alternate names:</strong>';
				foreach($result as $application)
					$returnable.= '<br/>'.$application['alternate_name'];
				echo $returnable;
			}
		}
	}
/////////////////////////////////////////////////////////////////////////
	function get_category_alternate_names($searchterm='', $return=false)
		{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');
//die('search_string: '.$searchterm);
		$result = $this->thesaurus_m->get_category_alternates(trim($searchterm));
		
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
			{
				$returnable = '<strong>canonical name:</strong> '.$result[0]['name'].'<br/><br/><strong>alternate names:</strong>';
				foreach($result as $category)
					$returnable.= '<br/>'.$category['alternate_name'];
				echo $returnable;
			}
		}
	}
/////////////////////////////////////////////////////////////////////////
	function get_target_alternates($searchterm)
	{
		$target = $this->get_target_canonical($searchterm, true);
		return $this->thesaurus_m->get_target_alternates($target);
	}

/////////////////////////////////////////////////////////////////////////
	function get_chrome_alternate_names_table($searchterm='', $return=false)
	{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');
//die('search_string: '.$searchterm);
		$result = $this->thesaurus_m->get_chrome_alternates(trim($searchterm));
		
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
			{
// // die('thesaurus/get_chrome_alternates() got a result:<br/><textarea>'.print_r($result, true).'</textarea>');
				//$returnable = '<strong>canonical name:</strong> '.$result[0]['chrome_name'].'<br/><br/><strong>alternate names:</strong>';
				//foreach($result as $chrome)
					//$returnable.= '<br/>'.$chrome['alternate_name'];
				//echo $returnable;
				//~ die('thesaurus/get_chrome_alternates() got a result:<br/><textarea>'.print_r($result, true).'</textarea>');
				
				
				
				$returnable = '<strong>canonical name:</strong> '.$result[0]['chrome_name'].'<br/><br/><strong>alternate names:</strong>';
				
				$returnable .= '<br/><table class="table table-bordered">
					<tr><th>alternate name</th><th>is exception</th></tr>
				';
				
				foreach($result as $chrome)
				{
					$returnable.= '<tr><td>'.$chrome['alternate_name'].'</td><td> '. ($chrome['is_exception']==1 ?  "yes" :  "") .'</td>	</tr>';
				}				
				$returnable.= '</table>';
				
				echo $returnable;
			}
		}
	}

/////////////////////////////////////////////////////////////////////////
	function get_species_alternate_names_table($searchterm='', $return=false)
	{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');
//die('search_string: '.$searchterm);
		$result = $this->thesaurus_m->get_species_alternates(trim($searchterm));
		
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
			{
//  //die('thesaurus/get_species_alternates() got a result:<br/><textarea>'.print_r($result, true).'</textarea>');
				//$returnable = '<strong>canonical name:</strong> '.$result[0]['species_name'].'<br/><br/><strong>alternate names:</strong>';
				//foreach($result as $species)
					//$returnable.= '<br/>'.$species['alternate_name'];
				//echo $returnable;
			//}
			
			
				$returnable = '<strong>canonical name:</strong> '.$result[0]['species_name'].'<br/>
							<br/><strong>alternate names:</strong>';
				
				$returnable .= '<br/><table class="table table-bordered">
					<tr><th>alternate name</th><th>is exception</th></tr>
				';
				
				foreach($result as $species)
				{
					$returnable.= '<tr><td>'.$species['alternate_name'].'</td><td> '. ($species['is_exception']==1 ?  "yes" :  "") .'</td>	</tr>';
				}				
				$returnable.= '</table>';
				
				echo $returnable;
			}
		}
	}
/////////////////////////////////////////////////////////////////////////
/**
 * returns a table of target alternate names/exceptions for the 
 * targets alternates lookup widget
 * 
 */
	function get_target_alternate_names_table($searchterm='', $return=false)
	{
		if($searchterm === '')
			$searchterm = $this->input->get('search_string');
//die('search_string: '.$searchterm);
		$result = $this->thesaurus_m->get_target_alternates(trim($searchterm));
		
		if($return)
		{
			if($result)
				return $result;
			else 
				return $result;
		}
		else 
		{
			if(!$result)
				echo 'no result found';
			else
			{
//~ die('thesaurus/get_chrome_alternates() got a result:<br/><textarea>'.print_r($result, true).'</textarea>');
				$returnable = '<strong>canonical name:</strong> '.$result[0]['target_name'].'<br/><br/><strong>alternate names:</strong>';
				
				$returnable .= '<br/><table class="table table-bordered">
					<tr><th>alternate name</th><th>is exception</th></tr>
				';
				
				foreach($result as $target)
				{
					$returnable.= '<tr><td>'.$target['alternate_name'].'</td><td> '. ($target['is_exception']==1 ?  "yes" :  "") .'</td>	</tr>';
				}				
				$returnable.= '</table>';
				
				echo $returnable;
			}
		}
	}
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
//////////	DO THINGS EXIST ?	/////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
	function exists_clone($term)
	{
		return $this->thesaurus_m->exists_clone(trim($term));
	}
	function exists_chrome($term)
	{
		return $this->thesaurus_m->exists_chrome(trim($term));
	}
	function exists_species($term)
	{
		return $this->thesaurus_m->exists_species(trim($term));
	}
	function exists_target($term)
	{
		return $this->thesaurus_m->exists_target(trim($term));
	}
	
////////////////////////////////////////////////////////////////////////////////
//////////	ADD NEW THINGS 	/////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
/**
 * the forms for adding canonical names and alternate_names
 */
	function show_form($formtype='all_forms')
	{
		switch($formtype)
		{
			case 'chrome':
				  return $this->get_chromes_form();
				  //~ $this->load->view('partials/new_chromes_form_p', $this->data);
				break;
			case 'chrome_alt':
				return $this->get_chrome_alternates_form();
				  //~ $this->load->view('partials/new_chrome_alternates_form_p', $this->data);
				break;
			case 'species':
				return $this->get_species_form();
				  //~ $this->load->view('partials/new_species_form_p', $this->data);
				break;
			case 'species_alt':
				return $this->get_species_alternates_form();
				  //~ $this->load->view('partials/new_species_alternates_form_p', $this->data);
				break;
			case 'target':
				return $this->get_targets_form();
				  //~ $this->load->view('partials/new_targets_form_p', $this->data);
				break;
			case 'target_alt':
				return $this->get_targets_alternate_form();
				//~ $this->data['targets_dd'] = $this->thesaurus->targets_dropdown();
				  //~ $this->load->view('partials/new_targets_alternates_form_p', $this->data);
				break;
			case 'all_forms':
				$returnable .= $this->get_catalog_header_alternates_form();
				$returnable  = $this->get_chromes_form();
				$returnable .= $this->get_chrome_alternates_form();
				$returnable .= $this->get_species_form();
				$returnable .= $this->get_species_alternates_form();
				$returnable .= $this->get_targets_form();
				$returnable .= $this->get_targets_alternate_form();
				
				return $returnable;
				
				//~ 
				  //~ $this->load->view('partials/new_chromes_form_p', $this->data);
				  //~ $this->load->view('partials/new_chrome_alternates_form_p', $this->data);
				  //~ $this->load->view('partials/new_species_form_p', $this->data);
				  //~ $this->load->view('partials/new_species_alternates_form_p', $this->data);
				  //~ $this->load->view('partials/new_targets_form_p', $this->data);
				  //~ $this->load->view('partials/new_targets_alternates_form_p', $this->data);
				break;
				
		}
	}
/**
 *  returns the form as a string of HTML
 */	
	//~ function get_catalog_header_form()
	//~ {
		//~ return $this->load->view('partials/new_catalog_headers_form_p', $this->data, true);
	//~ }
	function get_catalog_header_alternates_form()
	{
		return $this->load->view('partials/new_catalog_headers_alternates_form_p', $this->data, true);
	}
	function get_application_form()
	{
		return $this->load->view('partials/new_application_form_p', $this->data, true);
	}
	function get_application_alternates_form()
	{
		$this->data['applications_dd'] = $this->applications_dropdown();
		
		return $this->load->view('partials/new_applications_alternates_form_p', $this->data, true);
	}
	function get_category_form()
	{
		return $this->load->view('partials/new_category_form_p', '', true);
	}
	function get_category_alternates_form()
	{
		$this->data['categories_dd'] = $this->categories_dropdown();
		
		return $this->load->view('partials/new_category_alternates_form_p', $this->data, true);
	}
	function get_chromes_form()
	{
		return $this->load->view('partials/new_chrome_form_p', $this->data, true);
	}
	function get_chromes_alternates_form($return_type = 'return')
	{
		$this->data['chromes_dd'] = $this->chromes_dropdown();
		
		if($return_type == 'ajax')
			die( $this->load->view('partials/new_chrome_alternates_form_p', $this->data, true));
		else if($return_type == 'return')
			return  $this->load->view('partials/new_chrome_alternates_form_p', $this->data, true);
	}
	function get_clones_form()
	{
		return $this->load->view('partials/new_clone_form_p', $this->data, true);
	}
	function get_clones_alternates_form()
	{
		return $this->load->view('partials/new_clone_alternates_form_p', $this->data, true);
	}
	function get_species_form()
	{
		return $this->load->view('partials/new_species_form_p', $this->data, true);
	}
	function get_species_alternates_form($return_type = 'return')
	{
		$this->data['species_dd'] = $this->species_dropdown();
		if($return_type == 'ajax')
			die( $this->load->view('partials/new_species_alternates_form_p', $this->data, true));
		else if($return_type == 'return')
			return $this->load->view('partials/new_species_alternates_form_p', $this->data, true);
	}
	function get_targets_form()
	{
		return $this->load->view('partials/new_target_form_p', $this->data, true);
	}
	function get_targets_alternates_form($return_type = 'return')
	{
		$this->data['targets_dd'] = $this->targets_dropdown();
		if($return_type == 'ajax')
			die(  $this->load->view('partials/new_target_alternates_form_p', $this->data, true));
		else if($return_type == 'return')
			return  $this->load->view('partials/new_target_alternates_form_p', $this->data, true);
	}
/**
 * 
 * 
 * 
 */
	function add_from_form()
	{
//die("thesaurus/add_from_form()<br/>input:<textarea>".print_r($this->input->get(), true)."</textarea>");
		switch($this->input->get('add_type'))
		{
			case 'cat_head_alt':
				if($this->add_new_catalog_header_alternate() )
					echo 'success';
				else
					echo $this->db->_error_message() ;  
				break;
			case 'chrome':
				if($this->add_new_chrome() )
					echo 'success';
				else
					echo $this->db->_error_message() ;  
				break;
			case 'chrome_alt':
				if($this->add_new_chrome_alternate())
					echo 'success';
				else
					echo $this->db->_error_message() ;  
				break;
			case 'species':
				if($this->add_new_species() )
					echo 'success';
				else
					echo $this->db->_error_message();
				break;
			case 'species_alt':
				if($this->add_new_species_alternate())
					echo 'success';
				else
					echo $this->db->_error_message();
				break;			
			case 'target':
				if($this->add_new_target())
					echo 'success';
				else
					echo $this->db->_error_message() ;  
				break;
			case 'target_alt':
				if($this->add_new_target_alternate() )
					echo 'success';
				else
					echo $this->db->_error_message() ;  
				break;
			case 'application':
				if($this->add_new_application())
					echo 'success';
				else
					echo $this->db->_error_message() ;
				break;
			case 'applications_alt':
				if($this->add_new_application_alternate() )
					echo 'success';
				else
					echo $this->db->_error_message() ;  
				break;
			case 'category':
				if($this->add_new_category())
					echo 'success';
				else
					echo $this->db->_error_message() ;
				break;
			case 'category_alt':
				if($this->add_new_category_alternate() )
					echo 'success';
				else
					echo $this->db->_error_message() ;  
				break;
		}
	}
	
	function add_new_catalog_header_alternate($cat_head_name ='', $alternate_name='')
	{
		if($cat_head_name === '' && $alternate_name === '')
		{
			$data['canonical_name'] = trim($this->input->get('cat_head_name'));
			$data['alternate_name'] = trim($this->input->get('alternate_name'));
		}
		else 
		{
			$data['chrome_name'] = trim($cat_head_name);
			$data['alternate_name'] = trim($alternate_name);
		}
		$result = $this->thesaurus_m->insert_cat_head_alternate($data);
//		if($result)
			return $result;
//
//		else 
//			echo $this->db->_error_message() ;  
	}
	function add_new_chrome()
	{
		$data['chrome_name'] = trim($this->input->get('name'));
		$data['excitation'] =trim( $this->input->get('excitation'));
		$data['emission'] =trim( $this->input->get('emission'));
		$data['category'] = trim($this->input->get('category'));
		$data['live_dead'] = trim($this->input->get('live_dead'));
		$data['20efficiency'] = trim($this->input->get('20efficiency'));
		$data['60efficiency'] = trim($this->input->get('60efficiency'));
		$data['80efficiency'] = trim($this->input->get('80efficiency'));
		$cas = $this->input->get('cas');
		if( !empty( $cas) )
			$data['cas'] = $this->input->get('cas');
		
		$result= $this->thesaurus_m->insert_chrome($data);
		
		return $result;
		
	}
	
	function add_new_chrome_alternate($chrome_name ='', $alternate_name='', $is_exception=1)
	{
		if($chrome_name === '' && $alternate_name === '')
		{
			$data['chrome_name'] = trim($this->input->get('chrome_name'));
			$data['alternate_name'] = trim($this->input->get('alternate_name'));
			$data['is_exception'] = trim($this->input->get('is_exception'));
		}
		else 
		{
			$data['chrome_name'] = trim($chrome_name);
			$data['alternate_name'] = trim($alternate_name);
			$data['is_exception'] = trim($is_exception);
		}
		$result = $this->thesaurus_m->insert_chrome_alternate($data);
//		if($result)
			return $result;
//
//		else 
//			echo $this->db->_error_message() ;  
	}
	
	function add_new_species()	//($species_arr)
	{
		$data['species_name'] = trim($this->input->get('species_name'));
		
		$result = $this->thesaurus_m->insert_species($data);
		return $result;
		
	}
	
	function add_new_species_alternate()		//($species_name, $alternate_name)
	{
		$data['species_name'] = trim($this->input->get('species_name'));
		$data['alternate_name'] = trim($this->input->get('alternate_name'));
			$data['is_exception'] = trim($this->input->get('is_exception'));
		
		$result = $this->thesaurus_m->insert_species_alternate($data);
		return $result;
	}
	
//////////////////////////////////////////////////////////////////////////////////////////
	function add_new_target()			//($target_arr)
	{
		$data['target_name'] = trim($this->input->get('target_name'));
		
		$result = $this->thesaurus_m->insert_target($data);
		return $result;
	}
	
//////////////////////////////////////////////////////////////////////////////////////////
	function add_new_target_alternate()			//($target_name, $alternate_name)
	{
		$data['target_name'] = trim($this->input->get('target_name'));
		$data['alternate_name'] = trim($this->input->get('alternate_name'));
			$data['is_exception'] = trim($this->input->get('is_exception'));
		
		$result = $this->thesaurus_m->insert_target_alternate($data);
		return $result;
	}
	
//////////////////////////////////////////////////////////////////////////////////////////
	function add_new_application()
	{
		
		$data['name'] = trim($this->input->get('application_name'));
		
		$result = $this->thesaurus_m->insert_application($data);
		return $result;
	}
//////////////////////////////////////////////////////////////////////////////////////////
	function add_new_application_alternate()
	{
//die("got to add_new_application_alternate()");
		$data['application_id'] = trim($this->input->get('application_id'));
		$data['alternate_name'] = trim($this->input->get('alternate_name'));
		$data['is_exception'] = trim($this->input->get('is_exception'));
		
//die("thesaurus/add_new_application_alternates()<br/>DATA:<textarea>".print_r($data, true)."</textarea>");
		$result = $this->thesaurus_m->insert_applications_alternate($data);
		return $result;
	}
	
//////////////////////////////////////////////////////////////////////////////////////////
	function add_new_category()
	{
		
		$data['category'] = trim($this->input->get('category_name'));
		
		$result = $this->thesaurus_m->insert_category($data);
		return $result;
	}
//////////////////////////////////////////////////////////////////////////////////////////
	function add_new_category_alternate()
	{
		$data['category_id'] = trim($this->input->get('category_id'));
		$data['alternate_name'] = trim($this->input->get('alternate_name'));
		$data['is_exception'] = trim($this->input->get('is_exception'));
		
//die("thesaurus/add_new_category_alternate()<br/> category_id:". $data['category_id']."<br/>alternate_name:". $data['alternate_name']."<br/>is_exception: ".$data['is_exception']);
		$result = $this->thesaurus_m->insert_category_alternate($data);
if($result)
	die("insert success");
else
	die("insert failure");
		return $result;
	}
	
 
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
////////////	DROPDOWNS			 /////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

	function catalog_header_dropdown()
	{
		$cat_head_arr = $this->thesaurus_m->get_all_cat_heads();	// FYI: cat_heads are catalog_headers. cat_heads are funnier, though

		$dd = '<select name="cat_head_name">';
		foreach($cat_head_arr as $cat_head)
		{
			$dd.= '<option value="'.$cat_head['id'].'">'.$cat_head['canonical_name'].'</option>';
		}
		$dd .= '</select>';
		
		return $dd;
	}
	function applications_dropdown()
	{
		$applications_arr = $this->thesaurus_m->get_all_applications();
		
		$dd = '<select name="application_id">';
		foreach($applications_arr as $application)
		{
			$dd.= '<option value="'.$application['id'].'">'.$application['name'].'</option>';
		}
		$dd .= '</select>';
		
		return $dd;
	}
	function categories_dropdown()
	{
		$categories_arr = $this->thesaurus_m->get_all_categories();
		
		$dd = '<select name="category_id">';
		foreach($categories_arr as $category)
		{
			$dd.= '<option value="'.$category['category_id'].'">'.$category['category'].'</option>';
		}
		$dd .= '</select>';
		
		return $dd;
	}
	function chromes_dropdown()
	{
		$chromes_arr = $this->thesaurus_m->get_all_chromes();
		$dd = '<select name="chrome_name">';
		
		foreach($chromes_arr as $chrome)
		{
			$dd.= '<option value="'.$chrome['chrome_name'].'">'.$chrome['chrome_name'].'</option>';
		}
		$dd .= '</select>';
		
		return $dd;
	}
	function species_dropdown()
	{
		$species_arr = $this->thesaurus_m->get_all_species();
		$dd = '<select name="species_name">';
		$dd.= '<option></option>';
		$dd.= '<option value="human">Human</option>';
		$dd.= '<option value="mouse">Mouse</option>';
		$dd.= '<option></option>';
		foreach($species_arr as $species)
		{
			$dd.= '<option value="'.$species['species_name'].'">'.$species['species_name'].'</option>';
		}
		$dd .= '</select>';
		
		return $dd;
	}
	function targets_dropdown()
	{
		$target_arr = $this->thesaurus_m->get_all_targets();
		$dd = '<select name="target_name">';
		
		foreach($target_arr as $target)
		{
			$dd.= '<option value="'.$target['target_name'].'">'.$target['target_name'].'</option>';
		}
		$dd .= '</select>';
		
		return $dd;
	}
	function clones_dropdown()
	{
		$clone_arr = $this->thesaurus_m->get_all_clones();
		$dd = '<select name="clone_name">';
		
		foreach($clone_arr as $clone)
		{
			$dd.= '<option value="'.$clone['clone_name'].'">'.$clone['clone_name'].'</option>';
		}
		$dd .= '</select>';
		
		return $dd;
	}




//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

	
//////////////////////////////////////////////////////////////////////////////////////////
}// end class
