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
	function get_catalog_header_lookup_form()
	{
		return $this->load->view('partials/thesaurus_catalog_headers_p', $this->data, true);
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

		$result = $this->thesaurus_m->get_targets_canonical(trim($searchterm));
		
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
///////////////////		ALTERNATE NAMES		/////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
	function get_target_alternates($searchterm)
	{
		$target = $this->get_target_canonical($searchterm, true);
		return $this->thesaurus_m->get_targets_alternates($target);
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
	function get_chromes_form()
	{
		return $this->load->view('partials/new_chrome_form_p', $this->data, true);
	}
	function get_chromes_alternates_form()
	{
		$this->data['chromes_dd'] = $this->chromes_dropdown();
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
	function get_species_alternates_form()
	{
		$this->data['species_dd'] = $this->species_dropdown();
		return $this->load->view('partials/new_species_alternates_form_p', $this->data, true);
	}
	function get_targets_form()
	{
		return $this->load->view('partials/new_target_form_p', $this->data, true);
	}
	function get_targets_alternates_form()
	{
		$this->data['targets_dd'] = $this->targets_dropdown();
		return  $this->load->view('partials/new_target_alternates_form_p', $this->data, true);
	}
/**
 * 
 * 
 * 
 */
	function add_from_form()
	{
		switch($this->input->get('add_type'))
		{
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
		}
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
	
	function add_new_chrome_alternate($chrome_name ='', $alternate_name='')
	{
		if($chrome_name === '' && $alternate_name === '')
		{
			$data['chrome_name'] = trim($this->input->get('chrome_name'));
			$data['alternate_name'] = trim($this->input->get('alternate_name'));
		}
		else 
		{
			$data['chrome_name'] = trim($chrome_name);
			$data['alternate_name'] = trim($alternate_name);
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
		
		$result = $this->thesaurus_m->insert_species_alternate($data);
		return $result;
	}
	
	function add_new_target()			//($target_arr)
	{
		$data['target_name'] = trim($this->input->get('target_name'));
		
		$result = $this->thesaurus_m->insert_target($data);
		return $result;
	}
	
	function add_new_target_alternate()			//($target_name, $alternate_name)
	{
		$data['target_name'] = trim($this->input->get('target_name'));
		$data['alternate_name'] = trim($this->input->get('alternate_name'));
		
		$result = $this->thesaurus_m->insert_target_alternate($data);
		return $result;
	}
	
	

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
////////////	DROPDOWNS			 /////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

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





//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

	
//////////////////////////////////////////////////////////////////////////////////////////
}// end class
