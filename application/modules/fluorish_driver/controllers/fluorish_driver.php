<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//~// if you want to this class to extend some class from another module, require() the file first:
//~ require_once  APPPATH.'modules/membership/controllers/resources.php';
//~ require_once  APPPATH.'modules/membership/controllers/groups.php';
//~ require_once  APPPATH.'modules/membership/controllers/users.php';

class Fluorish_driver extends Loggedin_Controller //MY_Controller //CI_Controller 
{
	
	public $userid ;
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	function __construct()
	{
	  parent::__construct();
	  //~ $this->load->model('cytometers_m');
	  	   $this->load->helper('url');
		//~ $membership_mod = $this->load->module('membership');
		
		//~ $this->users_model = $this->load->model('membership/users_m');
	
	// make checking if user is logged in a bit easier to type:	
		if(isset($this->session->userdata['logged_in']['userid']))
			$this->userid = $this->session->userdata['logged_in']['userid'];
		
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	
	function index()
	{
		//~ die( 'got to fluorish_driver.php/index()');
		if(isset($this->userid))
		{
			$this->user_profile();
			//~ $this->debug_page();
		}
		else
		{
			$this->load->view('header_v'); 
			$this->load->view('landing_page_v');
			
		}
		
//~ die('got to fluorish_driver/index()');
	}

/////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	function howto()
	{

/* ********* check if user is logged in (userid is stashed in a class variable in the constructor)  
 * 		if not logged in, switch to a different function							**************/	  
		//~ if(!isset($this->userid))
		if(!$this->is_logged_in() )
		{
die('not logged in');
			//~ $this->index();
		}
		else
		{
			echo 'logged in<hr/>';
/* ************ to load (or rebuild) the Session array:***********************************************/
			$this->get_session();
			
			echo 'verifying that we have (re)loaded the session with "$this->get_session();"<br/>
				using <br/><strong>"echo \'&lt;textarea&gt;\'.print_r($this->session->userdata, true).\'&lt;/textarea&gt;\';" </strong>:<br/>';
			echo '<textarea>'.print_r($this->session->userdata, true).'</textarea><hr/>';
			
			
/* ************ loading the membership module:***********************************************/
			echo 'to make use of a module\'s models, you can load them directly:<br/>
				<strong>$this->load->model("[module name]/[model name]");</strong><br/>
				and then use them normally:<br/>
				<strong>$this->[model name]->[function name]</strong>
				<br/>';
			echo 'You can also load a whole module into a variable:<br/>
				<strong>$membership = $this->load->module("membership");</strong><br/>
				and then access the module\'s controller(s)  with $variable->[function_name]';
			echo '<hr/>';
			$membership = $this->load->module('membership');
			
/* ************ loading the logged-in user's groups array: ***********************************************/	
			echo '<h3>load a user\'s groups from the membership module:</h3>
				$groups = $membership->get_groups_by_userid();';
			$groups = $membership->get_groups_by_userid();
			echo 'debug the returned array with<br/>
			<strong>$groups:<br/>&lt;textarea&gt;\'.print_r($groups, true).\'&lt;/textarea&gt;</strong><br/>';
			echo '$groups:<br/><textarea>'.print_r($groups, true).'</textarea>';
		}
	
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	 function debug_page()
    {
	    if(!isset($this->userid))
			$this->index();
		else
		{

	/********** you can load another module and store it in a variable  **************/	  
			$membership = $this->load->module('membership');
			
	/********** you can load a model from another module by passing  **************
	 ********** the module_name/model_name to $this->load->model()   **************/	  	    
			$users_model = $this->load->model('membership/users_m');
			
			
			$this->data['users'] = $users_model->get_all_users();
			
	/********** get available groups from the membership module's available_groups() function **************/
			$this->data['available_groups'] = $membership->available_groups($this->userid);
			
			
	//get user's groups
			if(!empty($this->session->userdata['groups']))
			{
				foreach($this->session->userdata['groups'] as $this_group)
				{
					$this->data['my_groups'][$this_group['group_id']] = $this->groups_m->get_group_data($this_group['group_id']);
				}
				
			}
			
	/********** if the other module's function returns an array that you  **********
	 **********	want to add to $this->data, you can do it thusly: 	****************/	    
			$this->data = array_merge($this->data, $membership->display_user($this->session->userdata['logged_in']['userid']));
			

	//load the primary views	    
			$this->load->view('header_v');
			$this->load->view('membership/membership_v', $this->data);
	    
		}
    }
    
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	
	function user_profile()
	{
		//~ $membership = $this->load->module('membership');
		
		$this->load->model('membersip/users_m');
		$this->data['user'] = $this->users_m->get_user($this->session->userdata['logged_in']['userid']);
		$this->load->view('header_v'); 
			//~ $this->load->view('dashboard_v');
			$this->load->view('profile_user_v', $this->data);
	}


////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	
	function dashboard()
	{
		$this->load->view('header_v'); 
		$this->load->view('dashboard_v');
	}
	
}
