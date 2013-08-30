<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//~// if you want to this class to extend some class from another module, require() the file first:
//~ require_once  APPPATH.'modules/membership/controllers/resources.php';
//~ require_once  APPPATH.'modules/membership/controllers/groups.php';
//~ require_once  APPPATH.'modules/membership/controllers/users.php';

class Backstage extends Loggedin_Controller //MY_Controller //CI_Controller 
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
		
		//~ $this->users_model = $this->load->model('membership/users_m');
	
	// make checking if user is logged in a bit easier to type:	
		if(isset($this->session->userdata['logged_in']['userid']))
		{
			$this->userid = $this->session->userdata['logged_in']['userid'];
			$this->membership = $this->load->module('membership');
		}
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	
	function index()
	{
		//~ die( 'got to backstage.php/index()');
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
		
//~ die('got to backstage/index()');
	}


////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		BACKSTAGE DEBUG			////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/**
 * george's original mass of partials
 */
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
			
			$this->load->view('membership/membership_v', $this->data);
	    
		}
    }
    
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		FLUORISH_GUI			////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/** 
 * redirects to the fluorish_gui module's dashboard_v
 */
	function dashboard()
	{
		$this->load->view('header_v'); 
		$this->load->view('dashboard_v');
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		USERS					////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/**
 * presents a membership/views/partials/display_user_p for $userid
 */
	function display_user($userid)
	{
		$head = $this->load->view('header_v', '', true);
		$body = modules::run('membership/users/display_user', $userid);
		
		echo $head.$body;
		
	}
////////////////////////////////////////////////////////////////////////
/**
 * presents a membership/views/profile_user_v for the logged-in user
 */	
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
/**
 * presents a membership/views/profile_group_v for the given $groupid
 */
	function group_profile($groupid)
	{
		$this->load->view('profile_group_v', $groupid);
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		GROUPS					////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/**
 * presents a membership/views/partials/available_groups_p for the given $userid
 * 
 */
	function show_available_groups($userid)
	{
		$this->load->view('header_v');
		$membership = $this->load->module('membership');
		
		$data['available_groups'] = $membership->available_groups($userid) ;
		
		$this->load->view('membership/partials/available_groups_p', $data);
		
	}



////////////////////////////////////////////////////////////////////////
/**
 * displays a membership/views/partials/display_group_p of the given $groupid
 */
	function display_group($groupid)
	{
		$head = $this->load->view('header_v', '', true);
		$widget = modules::run('membership/groups/display_group', $groupid);
		
		echo $head;
		echo $widget;
	}
////////////////////////////////////////////////////////////////////////
/**
 * lists all groups that $userid IS a member/manager of
 */
	function my_groups($userid)
	{
		$head = $this->load->view('header_v', '', true);
		$body = 'backstage/my_groups() isn\'t working yet';
		
		echo $head.$body;
	}
////////////////////////////////////////////////////////////////////////
/**
 * lists all groups that $userid is NOT a member/manager of
 * 
 */
	function available_groups($userid)
	{
		$head = $this->load->view('header_v', '', true);
		$body = 'backstage/available_groups() isn\'t working yet';
		
		echo $head.$body;
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		CYTOMETERS				////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		PANELS					////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/**
 * lists all panels for the logged in user
 * 
 */
	function list_panels()
	{
		$head = $this->load->view('header_v', '', true);
		$body;
		//~ $body = 'backstage/list_panels() isn\'t working yet';
		//~ $panel_divs =  modules::run('membership/panels/list_panels/'.$this->session->userdata['logged_in']['userid']);
		$panel_divs =  modules::run('panels/list_panels/'.$this->session->userdata['logged_in']['userid']);
//~ die('panel_divs:<textarea>'.var_dump($panel_divs, true).'</textarea>');
		if(count($panel_divs) > 0)
		{
			foreach($panel_divs as $pd)
			{
				$body.=$pd;
				echo $body.'<hr/>';
			}
		}
		else $body = "you have no panels accessible to you.";
		echo $head.$body;
	}

////////////////////////////////////////////////////////////////////////
/**
 * 
 */
	function display_panel($panelid = '')
	{
//~ $panel_c = $this->load->module('membership/panels');
$panel_c = $this->load->module('panels');
		$head = $this->load->view('header_v', '', true);
		if($panelid == '')
		{
			foreach($this->session->userdata['groups'] as $group)
			{
				foreach($group['resources'] as $resource)
				{
					if($resource['resource_type'] == 'panel')
						//~ $body = modules::run('membership/panels/display/'.$resource['id']);
						$body = $panel_c->display($resource['id']);
				}
			}
		}
		if($body == '')
			echo $head.'You have no panels to display';
		else 
			echo $head.$body;
		
	}
////////////////////////////////////////////////////////////////////////
	function edit_panel($panelid = '')
	{
//~ $panel_c = $this->load->module('membership/panels');
$panel_c = $this->load->module('panels');
		$head = $this->load->view('header_v', '', true);
		$body = '';
		if($panelid == '')
		{
			foreach($this->session->userdata['groups'] as $group)
			{
				foreach($group['resources'] as $resource)
				{
					if($resource['resource_type'] == 'panel')
						//~ $body = modules::run('membership/panels/display/'.$resource['id']);
						$body = $panel_c->edit($resource['id']);
				}
			}
		}
		else
			$body = $panel_c->edit($panelid);
		if($body == '')
			echo $head.'You have no panels to edit';
		else 
			echo $head.$body;
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		ADDRESSES				////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	
	function my_addresses()
	{
	// load the header
		$head = $this->load->view('header_v', '', true);
	//load the membership module's addresses controller
		$addr_c = $this->load->module('addresses');
		$body = '';
		
	// get my addresses from SESSION
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if ($resource['resource_type'] == 'address')
				{	
					$body .= $addr_c->display($resource['id']);
					//~ echo $body.'<hr/>';
				}
			}
		}
//~ die('<textarea>'.var_dump($body).'</textarea>');		
		echo $head.$body;
	}
	
////////////////////////////////////////////////////////////////////////
	function edit_address($address_id = '')
	{
		$addr_c = $this->load->module('addresses');
		$head = $this->load->view('header_v', '', true);
		$body = '';
		
		$body = $addr_c->edit($address_id);
	
		echo $head.$body;
	}
	
////////////////////////////////////////////////////////////////////////
	function display_address($address_id = '')
	{
	// load the header	
		$head = $this->load->view('header_v', '', true);
	//load the membership module's addresses controller
		$addr_c = $this->load->module('addresses');
		//~ $body = '';
		
		$body = $addr_c->display($address_id);
	
		echo $head.$body;
	}



////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		INVENTORIES				////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////







}
