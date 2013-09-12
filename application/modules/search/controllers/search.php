<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends Loggedin_Controller //MY_Controller //CI_Controller 
{
	function __construct()
	{
	  parent::__construct();
	}

/**
 * This is the public theme page for Fluorish.
 */
function index()
	{
		$this->load->view('../../../../fluorish_dashboard/php/pages/search_home.php');
	}
	
}