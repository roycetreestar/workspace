
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resources extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();

	  $this->load->helper('url');
	  $this->load->model('resources_m');
//	  $this->load->model('permission_test_m');
	  $this->load->library('session');
	}

	function index()
	{
	//   $this->load->view('partials/login_p');
	//   $this->load->view('partials/create_user_p');
		$this->load->view('landing_page_v');
	}
	
	function create_resource()
	{
		
	}
	
	
	
	
	
}//end class