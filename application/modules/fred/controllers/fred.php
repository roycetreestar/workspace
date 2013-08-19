<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

//~ require_once('../membership/resources.php');
//~ require_once  APPPATH.'modules/membership/controllers/resources.php';

 class Fred extends Loggedin_Controller 
//~ class Fred extends Resources
//~ class Fred extends Secure_Controller 
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
		
	
		if(isset($this->session->userdata['logged_in']))
			$this->get_session();
		
	}// end __construct()
	
	
	
	function index()
	{
		
		echo 'this is fred/index()';
		
	}
	
	
	function create_resource($data_array)
	{
		//takes in an array of the data required to create a resource item
		//
	}
	
	function get_resource_array($resource_id)
	{
		//get the resource from the database via resources_m
		
		//make sure it's in the standard functional format (array)
		
		//return the resource array
		
	}
	
	function get_resource_xml($resource_id)
	{
		//takes in a resource_id and returns the ['xml'] field 
	}
	
	function xml_to_array($xml)
	{
		//takes in an XML string and returns an array
	}
	
	function array_to_xml($array)
	{
		//takes in an array and returns an XML string
	}
	
	function list_view($resource_id)
	{
		//takes a resource_id and returns the list_view_p partial (a string of HTML, possibly a <table> element) for that resource_type
	}
	
	function form_view($resource_id)
	{
		//takes a resource_id and returns the form_view_p partial (a string of HTML, probably a <form> element) for that resource_type
	}
	

	
	
	
	
	
}//end class
