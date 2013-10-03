<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//~// if you want to this class to extend some class from another module, require() the file first:
//~ require_once  APPPATH.'modules/membership/controllers/resources.php';
//~ require_once  APPPATH.'modules/membership/controllers/groups.php';
//~ require_once  APPPATH.'modules/membership/controllers/users.php';

class Fluorish extends Loggedin_Controller //MY_Controller //CI_Controller 
{
	
	public $userid ;
	public $membership;
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	function __construct()
	{
	  parent::__construct();
	  	//~ $this->load->model('cytometers_m');
		$this->load->helper('url');
		//~ $membership_mod = $this->load->module('membership');
		//$this->load_modules();
		//~ $this->users_model = $this->load->model('membership/users_m');
	
		// make checking if user is logged in a bit easier to type:	
		
		if(isset($this->session->userdata['logged_in']['userid']))
		{
			$this->userid = $this->session->userdata['logged_in']['userid'];
			$this->membership = $this->load->module('membership');
		}
		
		$this->load->library('template');
		
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
		// function to allow url for Prototype and Live data in workflow
		function getURL(){
			$path = base_url().'fluorish_dashboard/common/'; 
			return $path;
			}
			
		function getTheme(){
			$path = base_url().'public/themes/fluorish2013/'; 
			return $path;
			}
}

/**
 * This is the public theme pages for Fluorish.
 */
function index()
	{
		$this->load->view('../../../../public/themes/fluorish2013/views/layouts/default.php');
	}
	
/**
 * This is the register page for Fluorish.
 */	
function register(){
	
	$this->load->view('../../../../public/themes/fluorish2013/views/layouts/register.php');
	
}

function reset_pass(){
	
	echo '<h1>Need partial to submit email and a hook to fire the email with new password or password reset page.</h1>';
	
}

function dashboard()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			//~ $this->load->view('fluorish_gui_header_v.php');	
			$this->load->view('../../../../fluorish_dashboard/php/pages/header.php');
			$this->load->view('partials/global_account_header_p.php');
			
			if(isset($this->session->userdata['logged_in']))		
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
		
			else 
			{
				$mem_module = $this->load->module('membership');
				$data['dd']['institution_dd'] = $mem_module->institution_dropdown();
				$this->load->view('backstage/landing_page_v', $data);	
			}
				$this->load->view('../../../../fluorish_dashboard/php/pages/footer.php');
			}
			else
			$this->index();
		}
}//end class
