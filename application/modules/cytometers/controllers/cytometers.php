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
		 
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('xml');
		
		$this->load->model('cytometers_m');
	
		
		$this->get_session();
		
	}// end __construct()
	
	
	
	/**
 * Builds the cytometer configuration tool
 * 
 * @param type $cytometerid
 */	
	function edit($cytometerid = '', $message = '')
	{
		if( $message !== '')
		$this->data['message'] = $message;
		
		if($cytometerid === '')
		{
			//~ $this->data['cytometers_array']= $this->user_cytometers_model->get_user_cytometers($this->data['userid']);
			$this->data['cytometerModelDropdown'] = $this->cytometerModelDropdown();
			$this->data['manufacturerDropdown'] = $this->manufacturerDropdown();
			
$membership = $this->load->module("membership");
			
			$this->data['managedGroupsDropdown'] = $membership->managed_groups_dropdown();
//~ die($this->data['managedGroupsDropdown'].'<br/><textarea>'.print_r($this->session->userdata, true).'</textarea>');
			//~ 
			//~ foreach($this->cores_model->get_managed_cores($this->data['userid']) as $arr)
			//~ {
				//~ $this->data['cores_managed'][$arr['coreid']] = $arr['corename'];	 
			//~ }
		}
		else
		{
//~ die('get_xml_from_session():<br/><textarea>'.print_r($this->get_xml_from_session($cytometerid), true).'</textarea>
	//~ <textarea>'.print_r($this->session, true).'</textarea>');
			$this->data['thisCytometer'] = $this->get_xml_from_session($cytometerid);

			$this->data['thisCytometer']['cyt'] =  new SimpleXMLElement($this->data['thisCytometer']['xml']);
			
			$this->data['cytometerModelDropdown'] = $this->cytometerModelDropdown();
			$this->data['manufacturerDropdown'] = $this->manufacturerDropdown();
		}

		//~ $this->template
			//~ ->append_js('module::cytometer_config.js')
			//~ ->build('cytometer_config_view', $this->data);
		
		$this->load->view('header_v');	
		$this->load->view('cytometer_config_v', $this->data);
		
	}//end config()
	

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


  //////////////////////////////////////////////////////////////////////////
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
		$cytometers = $this->cytometers_m->read_defaults();
		$options = '';

		foreach($cytometers as $row)
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



	
/** 
 * 	constructs a string of the cytometerXML
 * 	passes it and all other data needed to the user_cytometers_model to be saved 
 */
	function save_cytometer()
	{
		$postvars = $this->input->post(NULL, TRUE); 						// returns all POST items with XSS filter 
//~ die(print_r($postvars));
		$saveme = array();
		
		$cytometername = $postvars['name'];
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
//~ die('cytometers.php/save_cytometer()<br/>$this_xml:<br/><textarea>'.$the_xml.'</textarea>');



		$saveme['user_id'] = 				$this->session->userdata['logged_in']['userid'];
		//~ if(isset($postvars['coreid']))
			//~ $saveme['coreid'] = 			$postvars['coreid'];
		if(isset($postvars['group_id']))
			$saveme['group_id'] = 			$postvars['group_id'];			
		$saveme['resource_type']=			'cytometer';
		$saveme['manufacturer']=			$postvars['manufacturer'];
		$saveme['model']=					$postvars['model'];
		$saveme['xml']=						$the_xml;
		$saveme['size']=					strlen($cytometer_string);
		$saveme['resource_name']=					$postvars['name'];
		//~ $saveme['timestamp']=				now();
		$saveme['hash']=					md5($the_xml)		;
		$saveme['uploaded_file_name']=	'';
		$saveme['serialnumber']=			'';
		if(isset($postvars['cytometerid']))
			$saveme['resource_id'] = 		$postvars['cytometerid'];

//~ die( '<textarea>'.print_r($saveme,true).'</textarea>
//~ <textarea>'.print_r($this->session->userdata,true).'</textarea>');	

		$resource_id = $this->cytometers_m->push_to_db($saveme);
		//~ $resource_id = $this->resources_m->save_resource($saveme);
		
if($resource_id)
	redirect('cytometers/edit/'.$resource_id.'/saved');
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
		$this->load->view('header_v');
		$myinstruments = $this->get_my_cytometers();
		
		foreach($myinstruments as $thisCytometer)
		{
			//~ $xml_arr = $this->parse_cytometer_xml($thisCytometer);
			$data['xml'] = new SimpleXMLElement($thisCytometer['xml']);
			$data['cytometerName'] = $thisCytometer['resource_name'];
			$data['cytometerid'] = $thisCytometer['id'];
			
			$this->load->view('partials/cytometer_display_p', $data);
		}

		//~ $this->load->view( 'partials/my_instruments_p', $this->data);
	}
	
	
// creates a cytometer_display_p for the resource passed in
	function display($cytometerid)
	{
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if($resource['id'] == $cytometerid)
				{
					$data['xml'] = new SimpleXMLElement($resource['xml']);
					$data['cytometerName'] = $resource['resource_name'];
					$data['cytometerid'] = $resource['id'];
					
					//~ return $this->load->view('partials/cytometer_display_p', $data, true);
					$this->load->view('header_v');
					$this->load->view('partials/cytometer_display_p', $data);
				}
			}
		}
	}
	////////////////////////////////////////////////////////////////////////	
	
	function get_my_cytometers()
	{
		//~ $userid = $this->session->userdata['logged_in']['userid'];
		$cyt_arr = array();
		
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if($resource['resource_type'] == 'cytometer')
				$cyt_arr[] = $resource;
			}			
		}
		return $cyt_arr;
	}
	
	
	
	function delete($cytometerid)
	{
		$this->db->trans_start();
			//delete from entity_resource table
			//~ $this->resource_group_m->delete($cytometerid);
			//delete from cytometers table
			$c = $this->cytometers_m->delete($cytometerid);
			//delete from resources table
			$r = parent::delete_resource($cytometerid);
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
			return false;
		else 
		//~ if($c && $r)
			return true;
		//~ else
			//~ return false;
	}
	
	
	
//~ ////////////////////////////////////////////////////////////////////////
	//~ function parse_cytometer_xml($cytometer)
	//~ {
		//~ $xml = $cytometer['xml'];
		//~ $obj = new SimpleXMLElement($xml);
//~ 
		//~ $arr['model'] = ''.$obj->FlowCytometer->GeneralInfo['model'][0]	;
		//~ $arr['manufacturer'] = ''.$obj->FlowCytometer->GeneralInfo['manufacturer'][0];
		//~ $arr['cytometerName'] = $cytometer['resource_name'];
		//~ $arr['cytometerid'] = $cytometer['id'];
		//~ 
//~ die('from parse_cytometer_xml():<br/>
//~ $obj:<br/><textarea>'.print_r($obj, true).'</textarea><br/>
//~ $arr:<br/><textarea>'.print_r($arr, true).'</textarea><br/>
//~ $cytometer:<br/><textarea>'.print_r($cytometer, true).'</textarea><br/>
//~ $groups:<br/><textarea>'.print_r($this->session->userdata['groups'], true).'</textarea><br/>');		
	//~ }
	
}//end class
