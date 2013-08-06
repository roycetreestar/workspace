<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//~ require_once  APPPATH.'modules/membership/controllers/resources.php';
//~ require_once  APPPATH.'modules/membership/controllers/groups.php';
//~ require_once  APPPATH.'modules/membership/controllers/users.php';

class Fluorish_driver extends Loggedin_Controller //MY_Controller //CI_Controller 
{

	
	function __construct()
	{
	  parent::__construct();
	  //~ $this->load->model('cytometers_m');
	  	   $this->load->helper('url');
		//~ $membership_mod = $this->load->module('membership');
	}
	
	
	function index()
	{
		//~ echo 'got to fluorish_driver.php/index()';
		$this->load->view('header_v'); 
		$this->load->view('landing_page_v');
//~ die('got to fluorish_driver/index()');
	}
	
	
}
