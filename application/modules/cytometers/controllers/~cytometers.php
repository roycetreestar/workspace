<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

//~ require_once('../membership/resources.php');
require_once  APPPATH.'modules/membership/controllers/resources.php';

// class Cytometers extends MY_Controller 
class Cytometers extends Resources
//~ class Cytometers extends Secure_Controller 
{


	//~ private $data = array();

	
//////////////////////////////////////////////////////////////////////////////////////////
/**
 * 
 */
	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		//~ $this->load->library('format');
		//~ $this->load->library('ion_auth');
		$this->load->helper('form');
		$this->load->helper('url');
		//~ $this->load->model('user_cytometers_model');
		//~ $this->load->model('cytometers_model');
		$this->load->model('cytometers_m');
		//~ $this->load->model('cores_model');
	
		
		//~ $this->get_session();
		
	}// end __construct()
	

//////////////////////////////////////////////////////////////////////////////////////////
/**
 * redirects the flow of control to $this->all_available_cytometers()
 */
	//~ function index()
	//~ {
			//~ echo 'this is cytometers.php/index()';
			//~ $this->load->view('membership/partials/session_array_p');
	//~ }
	
////////////////////////////////////////////////////////////////////////
/**
 * Builds the cytometer configuration tool
 * 
 * @param type $cytometerid
 */	
	function config($cytometerid = '')
	{
		if($cytometerid === '')
		{
			$this->data['cytometers_array']= $this->user_cytometers_model->get_user_cytometers($this->data['userid']);
			$this->data['cytometerModelDropdown'] = $this->cytometerModelDropdown();
			$this->data['manufacturerDropdown'] = $this->manufacturerDropdown();
			
			foreach($this->cores_model->get_managed_cores($this->data['userid']) as $arr)
			{
				$this->data['cores_managed'][$arr['coreid']] = $arr['corename'];	 
			}
		}
		else
		{
//~ $this->debug_arr($this->session->userdata('groups') );
			//echo 'You\'ve called up the cytometer config for cytometerid '.$cytometerid;
			//~ $this->data['thisCytometer'] = $this->user_cytometers_model->readToArray($cytometerid);
			$this->data['thisCytometer'] = $this->get_xml_from_session($cytometerid);
//~ die('<textarea>'.print_r($this->session->userdata('groups'), true).'</textarea>');
			$this->data['thisCytometer']['cyt'] =  new SimpleXMLElement($this->data['thisCytometer']['metadata']);
			
			$this->data['cytometerModelDropdown'] = $this->cytometerModelDropdown();
			$this->data['manufacturerDropdown'] = $this->manufacturerDropdown();
		}

		//~ $this->template
			//~ ->append_js('module::cytometer_config.js')
			//~ ->build('cytometer_config_view', $this->data);
		
		$this->load->view('header_v');	
		$this->load->view('cytometer_config_v', $this->data);
		
	}//end config()
	
	

////////////////////////////////////////////////////////////////////////
/**
 * Passes the cytometerid to user_cytometers_model->delete()
 * 
 * @param type $cytometerid
 */
	//~ function deleteCytometer($cytometerid)
	//~ {
		//~ $this->user_cytometers_model->delete($cytometerid);
		//~ $this->available_cytometers();
	//~ }
	
////////////////////////////////////////////////////////////////////////
	
/** 
 * 	constructs a string of the cytometerXML
 * 	passes it and all other data needed to the user_cytometers_model to be saved 
 */
	function saveme()
	{
		$postvars = $this->input->post(NULL, TRUE); 						// returns all POST items with XSS filter 

		$saveme = array();
		
		$cytometername = $postvars['cytometerName'];
		$manufacturer = $postvars['manufacturer'];
		$model = $postvars['model'];
		$cytometer_string = '';

		foreach ($postvars['lightSource'] as $node)
		{
			$cytometer_string .= '<LightSource type="'.stripslashes($node['type']).'"  wavelength="'.stripslashes($node['wavelength']).'">';
			
			if(isset($node['detector']) && is_array($node['detector']))
			{
				foreach($node['detector'] as $detector)
				{
					$cytometer_string .= '<Detector wavelength="'.stripslashes($detector['wavelength']).'"  bandwidth="'.stripslashes($detector['bandwidth']).'"/>';
				}
			}
			else
			{
				$cytometer_string .= '<Detector wavelength="'.stripslashes($detector['wavelength']).'"  bandwidth="'.stripslashes($detector['bandwidth']).'"/>';
			}
			
			$cytometer_string .='</LightSource>'; 	
		}
		
		$the_xml = '<?xml version="1.0" encoding="UTF-8"?><Panel xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.treestar.com/schemas/FlowJo/PanelWizard">
			<FlowCytometer  >
			 <GeneralInfo manufacturer="'.$manufacturer.'" model="'.$model.'"  />
			 '.$cytometer_string.'
			</FlowCytometer >
			</Panel>';

		$saveme['coreid'] = 				$postvars['coreid'];
		$saveme['manufacturer']=			$postvars['manufacturer'];
		$saveme['model']=					$postvars['model'];
		$saveme['cytometerConfigXML']=	$the_xml;
		$saveme['size']=					strlen($cytometer_string);
		$saveme['cytometerName']=			$postvars['cytometerName'];
		$saveme['timestamp']=				now();
	// TODO: determine if these fields in the db table need to be populated via this form 
		$saveme['hash']=					'';
		$saveme['uploaded_file_name']=	'';
		$saveme['serialnumber']=			'';
		if(isset($postvars['cytometerid']))
			$saveme['cytometerid'] = 		$postvars['cytometerid'];

die( '<textarea>'.print_r($saveme,true).'</textarea>');	
		$this->user_cytometers_model->push_to_db($saveme);
//		$this->all_available_cytometers();
		redirect('cytometers');
	}

////////////////////////////////////////////////////////////////////////
/**
 * All cytometers for all cores the user is part of on one page
 * 
 * 
 */
	function all_available_cytometers()
	{

		//~ $this->data['user_cytometers'] = $this->user_cytometers_model->get_user_cytometers($this->data['fl_user']['id']);
		$this->data['user_cytometers'] = $this->user_cytometers_model->get_user_cytometers($this->session->userdata['logged_in']['userid']);
		
		$this->my_instruments();
		
	//	PUT TOGETHER THE PARTIALS FOR EACH CORE'S CYTOMETERS	//	
	//	EACH CORE_CYTOMETERS_P HAS A BUNCH OF CYTOMETER_DISPLAY_P PARTIALS	//
		$cores = $this->cores_model->get_user_cores($this->data['fl_user']['id']);
		foreach($cores as $core)
		{
			$this->core_instruments($core['coreid'], $core['corename']);
		}
		
		
	//	SET UP THE MANAGED-CORES DROPDOWN	//	
		$this->data['managed_cores_dd'] = $this->managed_cores_dropdown();
		
	//	SET UP THE UPLOAD PARTIAL	//	
		$this->template->set_partial('upload_cytometer_p', 'partials/upload_cytometer_p', $this->data);

		$this->template
			->title($this->module_details['name'])
			->append_js('module::cytometers.js')
			->append_css('module::cytometers-tables.css')
			->build('user_instruments_view', $this->data);
	}

////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////

/**
 * Creates a form dropdown of cytometer model names
 * option value = model name
 * option class = manufacturer name
 * 
 * @return string
 */ 
	function cytometerModelDropdown()
	{
		$cytometers = $this->cytometers_model->readAll();
		$options = '';

		foreach($cytometers->result_array() as $row)
		{       		
			$options .= '<option value="'.$row['model'].'" class="'.$row['manufacturer'].'">'.$row['model'].'</option>';
		}
									
		return '<label for="model"><strong>Model</strong></label>
			<select  id="model" name="model">
				'.$options.'	
			</select>';
	}
	

////////////////////////////////////////////////////////////////////////
/**
 *	A hard-coded <select> dropdown of manufacturer names
 * 
 * @todo this dropdown could be dynamically created from the cytometers table (?)
 * @return string
 */
	function manufacturerDropdown()
	{
		return '
			<select id="manufacturer" name="manufacturer">
				<option>BD Biosciences</option>
				<option>Beckman Coulter</option>
				<option>Cytek</option>
				<option>Sony Biotechnology</option>
				<option>Life Technologies</option>
				<option>Miltenyi</option>
				<option>Millipore</option>
				<option>Partec</option>
				<option>Stratedigm</option>
				<option>Bio-Rad</option>
			</select>
			';
		
	}
	
////////////////////////////////////////////////////////////////////////	
	/**
	 * Creates a cytometer_display_p for each cytometer config assigned to user's userid
	 * Wraps them all in a my_instruments_p partial
	 * 
	 * 
	 */
		
	function my_instruments()
	{
		$this->data['myinstruments'] = $this->user_cytometers_model->get_my_cytometers($this->data['fl_user']['id']);

		foreach($this->data['myinstruments'] as $thisCytometer)
		{
			$this->template->set_partial('my_cyt_'.$thisCytometer['cytometerid'], 'partials/cytometer_display_p', $thisCytometer);
		}

		$this->template->set_partial('my_instruments_p', 'partials/my_instruments_p', $this->data);
	}
	
	////////////////////////////////////////////////////////////////////////	
	
/**
 * Creates a cytometer_display_p for each cytometer config assigned to the core 
 * whose coreid is passed in as a parameter
 * Wraps them all in a core_cytometers_p partial
 * 
 * @param type $coreid
 * @return type
 */		
	function core_instruments($coreid, $corename)
	{
		$data['corename'] = $corename;
		$data['coreid'] = $coreid;

		//	GET ALL CYTOMETERS ASSIGNED TO THE CORE	//
			$data['core_cytometers'] = $this->user_cytometers_model->get_core_cytometers($coreid);
						
		//	BUILD A CYTOMETER_DISPLAY_P FOR EACH CYTOMETER	//	
			foreach($data['core_cytometers'] as $thisCytometer)
			{
//				echo '<hr/>$thisCytometer';
//				var_dump($thisCytometer);
//				echo '<hr/>';
				
				$this->template->set_partial('core_cyt_'.$thisCytometer['cytometerid'], 'partials/cytometer_display_p', $thisCytometer);
				
			//	SET THE PARTIAL'S NAME IN THE $DATA ARRAY SO THEY CAN BE INCLUDED IN THE CORE'S VIEW	//	
				$data['cyt_display_divs'][$thisCytometer['cytometerid']] = 'core_cyt_'.$thisCytometer['cytometerid'];
			}
			
			
			
		//	BUILD A CORE_CYTOMETERS_P FOR THE CORE FROM ALL CYTOMETER_DISPLAY_Ps	//
			$this->template->set_partial('core_cytometers_p_'.$coreid, 'partials/core_cytometers_p', $data);
			$this->data['core_divs_names'][$coreid] = 'core_cytometers_p_'.$coreid;
//		return $core_cytometers;
		
	}
	
////////////////////////////////////////////////////////////////////////	
/**
 * Checks the uploaded file for correct filetype,
 *	filename doesn't exist in the uploads folder,
 *	the hash of the XML doesn't exist in the db table,
 *	then calls $this->parse_cytometer() to parse the file into the format required
 *	by user_cytometers_model->create()
 * 
 *	redirects to reload the page instead of returning
 */	

function do_upload()
{
	
//	 echo 'do_upload() is returning this.<br/><br/>We got:<br/><textarea>'.print_r($_FILES, true).'</textarea>';
	//~ 
	$uploads_folder = "uploads/cytometers/";
	$allowedExts = array("xml", "txt");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if (in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			$this->data['response'] = "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
			if (file_exists($uploads_folder . $_FILES["file"]["name"]))
			{
				$this->data['response'] =  $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{			
			// set up the data array for passing to user_cytometers_model for insertion into the db	
				$cytometer_arr = $this->parse_cytometer(file_get_contents($_FILES['file']['tmp_name']), $_FILES["file"]["name"]);
		
			//check if the user already has this cytometer in their account (via the hash)	
				if($this->user_cytometers_model->hash_exists($cytometer_arr['hash']) > 0)
				{

/* $todo connect the error message to pyro form error message functionality */
					$color='red';
					$this->data['response'] = '<h1 style="color:'.$color.'">This cytometer matches another cytometer in your account, so this cytometer has not been added.</h1>';
				}
				else
				{
//					echo 'hash doesn\'t exist. good to go!';
					$insert = $this->user_cytometers_model->create($cytometer_arr);
					
					$color = '';
					
					if($insert > 0)
					{	
						$color = 'green';
						$this->data['response'] = '<h1 style="color:'.$color.'">SUCCESS!!! your cytometer has been saved</h1>'; 
					}
					else 
					{
						$color = 'red';
						$this->data['response'] = '<h1 style="color:'.$color.'">FAILURE TO INSERT!!! your cytometer has NOT been saved</h1>';
					}					
				}
			}
		}
	}
	else
	{
		$this->data['response'] = "Invalid file type";
	}
	
//	$this->template->build('upload_cytometer_p', $this->data);
//	$this->my_instruments();
	redirect('cytometers');
}
	
  //////////////////////////////////////////////////////////////////////////
/**
 * Parses a cytometerXML string into fields for saving to the user_cytometers table in the database
 * 
 * @param type $file
 * @param type $filename
 * @param type $coreid
 * @return type
 */	
	function parse_cytometer($file, $filename)
	{		
//	echo '<textarea>'.print_r($file, true).'</textarea>';
//	echo '<textarea>'.print_r($this->data['fl_user'], true).'</textarea>';
		
		$cytometer_arr = array();
		$cytometer_arr['userid'] 			= $this->data['fl_user']['id'];			//????????????????????????????????????????
//		if($coreid !=='')
//			$cytometer_arr['coreid']			= $this->input->post('coreid');
		
	/* turn into string */	
		$cytometer_arr['cytometer_string']		= strval($file);						// this may already be done by file_get_contents() in do_upload()
		
	/* make the xml an xmlObject for easier parsing out of the db fields */
		$cytometer_arr['cytometerConfigXML'] 	= simplexml_load_string(trim($cytometer_arr['cytometer_string']));		
	
	/* mine the <GeneralInfo> tag */	

		$cytometer_arr['manufacturer']		= $cytometer_arr['cytometerConfigXML']->FlowCytometer->GeneralInfo['manufacturer'];
		$cytometer_arr['model']				= $cytometer_arr['cytometerConfigXML']->FlowCytometer->GeneralInfo['model'];

	/* ... and the other stuff */
		$cytometer_arr['cytometerName']		= $cytometer_arr['cytometerConfigXML']->ExpePanelriment['description'];
		$cytometer_arr['uploaded_file_name']	= $filename;
		$cytometer_arr['serialnumber']		= $cytometer_arr['cytometerConfigXML']->Panel['investigator'];
		

		$cytometer_arr['size']				= strlen($file);	
		$cytometer_arr['hash'] 				= md5($cytometer_arr['cytometer_string']);
		
	/* from $_POST: */	
		$cytometer_arr['cytometerName']		= $this->input->post('cytometerName');
		$cytometer_arr['coreid']				= $this->input->post('coreid');
	
		return $cytometer_arr;
	}
	
	
  //////////////////////////////////////////////////////////////////////////
/**
 * Builds a <select> dropdown of each of the cores managed
 *	by the logged in user
 * 
 * the first <option> is blank and has '' as it's value
 * each option's value is that core's coreid
 * each option's text is that core's corename
 * 
 * 
 * @return string
 */	
	function managed_cores_dropdown()
	{
		$this->load->model('cores_model');
		$managed_cores = $this->cores_model->get_managed_cores($this->data['fl_user']['id']);
		
		$dd = '<select id="managed_cores_dd" name="coreid">
			<option value=""></option>';
		foreach($managed_cores as $core)
		{
			$dd .= '<option value="'.$core['coreid'].'"> '.$core['corename'].' </option>';
		}
		$dd .= '</select>';

		return $dd;
	}
	
	
  //////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////
  /////////	new stuff as of 8/1/13	////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////
	function get_xml_from_session($cytometerid)
	{
		foreach ($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if($resource['id'] === $cytometerid)
				{
					$this_cytometer = $resource;
					$this_cytometer['permission'] = $group['permission'];
					
					return $this_cytometer;
				}
			}
		}
		
		return false;
	}
	
}//end class
