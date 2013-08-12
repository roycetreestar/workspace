<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');


// class Cytometers extends MY_Controller 
class Fluorish_gui extends Loggedin_Controller
//~ class Cytometers extends Secure_Controller 
{

	
////////////////////////////////////////////////////////////////////////
/**
 * 
 */
	function __construct()
	{
		parent::__construct();
		
		
		
	}
	
	
	
	
	function index()
	{
		//~ echo 'you got to fluorish_gui/index';	
		

		
		
		$this->load->view('fluorish_gui_header_v');		
		
		foreach( $this->session->userdata('groups') as $group)
		{
		// collect resource_types for this group's resources	
			$group['c'] = false;
			$group['p'] = false;
			$group['i'] = false;
			$group['a'] = false;
			foreach($group['resources'] as $resource)
			{
				if($resource['resource_type'] === 'cytometer')
					$group['c'] = true;
				if($resource['resource_type'] === 'panel')
					$group['p'] = true;
				if($resource['resource_type'] === 'inventory')
					$group['i'] = true;
				if($resource['resource_type'] === 'address')
					$group['a'] = true;
			}
			
		// load an accordian_p for this group	
			$this->load->view('partials/accordian_p', $group);
		}
		//~ $this->load->view('fluorish_dashboard_v', $this->session->userdata);		
		$this->load->view('fluorish_gui_footer_v');
		
	}
	
	function cytometer_links()
	{
		
	}
	
	
	function list_view($resource_type)
	{
		echo 'this is where you do stuff only to cytometers';
		$r= $this->load->view('', true);
		return $r;
	}
	
	function form_view($resource_type)
	{
		
	}
	
}//end class
