<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Test extends Loggedin_Controller
{
	function __construct()
	{
		parent::__construct();
		
		defined('APP_NAME') || define('APP_NAME', 'Fluorish');
		defined('APP_VERSION') || define('APP_VERSION', 'v1.0');
		defined('APP_THEME') || define('APP_THEME', '../fluorish_dashboard/common/');
		// development / production
		defined('DEV') || define('DEV', true);
		// toggle google analytics code in head sectio
		defined('GA') || define('GA', false);
		// default level / used for getURL paths (should't be modified
		defined('LEVEL') || define('LEVEL', 0);
		// allow skin customization from the browser
		defined('SKIN_JS') || define('SKIN_JS', false);
		// 'fixed' or 'fluid'
		defined('LAYOUT_TYPE') || define('LAYOUT_TYPE', 'fixed');
		// MAIN stylesheet
		defined('STYLE') || define('STYLE', isset($_GET['style']) ? $_GET['style'] : 'style');
		// filename without extension (eg. "brown") or false for defaul
		defined('SKIN_CUSTOM') || define('SKIN_CUSTOM', false);
		// edit SKIN_CUSTOM abov
		defined('SKIN') || define('SKIN', SKIN_JS ? false : SKIN_CUSTOM);
		
		function getURL(){
			$path = '../fluorish_dashboard/common/'; 
			return $path;
			}
		
		}
		
	function index()
	{
	
		$this->load->view('../../../../fluorish_dashboard/php/pages/header.php');
		$this->load->view('partials/global_account_header_p.php');
		
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
			
			$this->load->view('partials/accordian_p', $group);
		}
	
	
	$this->load->view('../../../../fluorish_dashboard/php/pages/footer.php');
		
	}
	
}//end class
