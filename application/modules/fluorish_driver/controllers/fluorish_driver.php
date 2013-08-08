<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//~// if you want to this class to extend some class from another module, require() the file first:
//~ require_once  APPPATH.'modules/membership/controllers/resources.php';
//~ require_once  APPPATH.'modules/membership/controllers/groups.php';
//~ require_once  APPPATH.'modules/membership/controllers/users.php';

class Fluorish_driver extends Loggedin_Controller //MY_Controller //CI_Controller 
{
	
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	function __construct()
	{
	  parent::__construct();
	  //~ $this->load->model('cytometers_m');
	  	   $this->load->helper('url');
		//~ $membership_mod = $this->load->module('membership');
		
		//~ $this->users_model = $this->load->model('membership/users_m');
		
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	
	function index()
	{
		//~ die( 'got to fluorish_driver.php/index()');
		if(isset($this->session->userdata['logged_in']))
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
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	 function debug_page()
    {
	    

/********** you can load another module and store it in a variable  **************/	  
	    $membership = $this->load->module('membership');
	    
/********** you can load a model from another module by passing  **************
 ********** the module_name/model_name to $this->load->model()   **************/	  	    
	    $users_model = $this->load->model('membership/users_m');
	    
	    
	    $this->data['users'] = $users_model->get_all_users();
	    
/********** get available groups from the membership module's available_groups() function **************/
	    $this->data['available_groups'] = $membership->available_groups($this->session->userdata['logged_in']['userid']);
	    
	    
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
