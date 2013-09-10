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
		$body = modules::run('membership/users/display', $userid);
		
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
 * presents a membership/views/profile_user_v for the logged-in user
 */	
	function edit_user($user_id = '')
	{
	//load the navbar with bootstrap and jquery 
		$head = $this->load->view('header_v', '', true);
	//load the membership/users controller	
		$usermodule = $this->load->module('membership/users');
	//initialize $body
		$body = $usermodule->edit($user_id);
		
		echo $head.$body;		
	}
	
////////////////////////////////////////////////////////////////////////
	function get_user_array($userid)
	{
	//load the navbar with bootstrap and jquery 
		$head = $this->load->view('header_v', '', true);
	//load the membership/users controller	
		$usermodule = $this->load->module('membership/users');
	//initialize $body
		$body = '';	
		
		$user_arr = $usermodule->get_array($userid);
		
		$body = '<textarea style="width:100%; height:500px;">'.print_r($user_arr, true).'</textarea>';
		
		echo $head.$body;
	}
	
////////////////////////////////////////////////////////////////////////
	function get_user_xml($userid)
	{
	//load the navbar with bootstrap and jquery 
		$head = $this->load->view('header_v', '', true);
	//load the membership/users controller	
		$usermodule = $this->load->module('membership/users');
	//initialize $body
		$body = '';	
		
		$user_arr = $usermodule->get_xml($userid);
		
		$body = '<textarea style="width:100%; height:500px;">'.print_r($user_arr, true).'</textarea>';
		
		echo $head.$body;
		
	}

////////////////////////////////////////////////////////////////////////
	function my_account()
	{
		//load the navbar with bootstrap and jquery 
		$head = $this->load->view('header_v', '', true);
	//load the membership/users controller	
		$usermodule = $this->load->module('membership/users');
		
		
		$userid = $this->session->userdata['logged_in']['userid'];
		
		$body = $usermodule->my_account($userid);
		
		
		
		echo $head.$body;
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
		$widget = modules::run('membership/groups/display', $groupid);
		
		echo $head;
		echo $widget;
	}
	
////////////////////////////////////////////////////////////////////////
/**
 * lists all groups that $userid IS a member/manager 
 * 
 * loops through the SESSION and runs membership/groups/display_group for each group_id
 * 
 */
	function my_groups($userid)
	{
	//load the navbar with bootstrap and jquery 
		$head = $this->load->view('header_v', '', true);
	//initialize $body
		$body = '';	
	//collect a display_group_p view for each of the user's groups
		foreach($this->session->userdata['groups'] as $group)
		{
			$groupid = $group['group_id'];
			
			$body .= modules::run('membership/groups/display', $groupid);
			$body .= '<hr/>';
		}
		
	// ship the views to the browser
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
/**
 * presents a membership/views/profile_group_v for the given $groupid
 */
	function group_profile($groupid)
	{
		$this->load->view('profile_group_v', $groupid);
	}
	
	
////////////////////////////////////////////////////////////////////////
	function get_group_array($groupid)
	{
	//load the navbar with bootstrap and jquery 
		$head = $this->load->view('header_v', '', true);
	//load the membership/groups controller	
		$groupmodule = $this->load->module('membership/groups');
	//initialize $body
		$body = '';	
		
		$group_arr = $groupmodule->get_array($groupid);
		
		$body = '<textarea style="width:100%; height:500px;">'.print_r($group_arr, true).'</textarea>';
		
		echo $head.$body;
	}
	
////////////////////////////////////////////////////////////////////////
	function get_group_xml($groupid)
	{
	//load the navbar with bootstrap and jquery 
		$head = $this->load->view('header_v', '', true);
	//load the membership/groups controller	
		$groupmodule = $this->load->module('membership/groups');
	//initialize $body
		$body = '';	
		
		$group_arr = $groupmodule->get_xml($groupid);
		
		$body = '<textarea style="width:100%; height:500px;">'.print_r($group_arr, true).'</textarea>';
		
		echo $head.$body;
	}
////////////////////////////////////////////////////////////////////////
	function edit_group($groupid = '')
	{
	//load the navbar with bootstrap and jquery 
		$head = $this->load->view('header_v', '', true);
	//load the membership/users controller	
		$groupmodule = $this->load->module('membership/groups');
	//initialize $body
		$body = $groupmodule->edit($groupid);
		
		echo $head.$body;
	}


////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		CYTOMETERS				////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	
/** 
 * loads the cytometers module
 * loads the backstage menu bar
 * loops through logged-in user's groups' resources
	* calls 'cytometers->edit($cytometer_id)' for each resource where resource_type is 'cytometer'
	* concatenates all strings returned from cytometers->edit() loop
 * 
 * echoes the menubar and the concatenated string of partials
 */
	function my_cytometers()
	{
	//load the membership module's cytometers controller
		$cytometers_c = $this->load->module('cytometers');
	// load the header
		$head = $this->load->view('header_v', '', true);
		$body = '';
		
	// get my cytometers from SESSION
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if ($resource['resource_type'] == 'cytometer')
				{	
					//~ echo 'group_id:'.$group['group_id'].' -_- resource_id:'.$resource['id'].'<br/>';
					$body .= $cytometers_c->display($resource['id']);
					//~ echo $body.'<hr/>';
				}
			}
		}
//~ die('<textarea>'.var_dump($body).'</textarea>');		
		echo $head.$body;
	}
	
////////////////////////////////////////////////////////////////////////
/** 
 * loads the cytometers module
 * loads the backstage menu bar
 * calls 'cytometers->edit($cytometers_id)' 
 * echoes the menu bar and the form
 * 
 * pass in no parameter for empty form (create a new cytometer)
 */
	function edit_cytometer($cytometer_id = '')
	{
		$head = $this->load->view('header_v', '', true);
		$cytometers_c = $this->load->module('cytometers');
		
		$body = '';
		
		$body = $cytometers_c->edit($cytometer_id);
	
		echo $head.$body;
	}
	
////////////////////////////////////////////////////////////////////////
/**
 * loads the cytometers module
 * loads the backstage menu bar
 * calls cytometers->display() 
 * 
 * echoes the menu bar and the display <table>
 * 
 */
	function display_cytometer($cytometer_id = '')
	{
	//load the cytometers module controller
		$cytometers_c = $this->load->module('cytometers');
	// load the header	
		$head = $this->load->view('header_v', '', true);
		//~ $body = '';
		
		$body = $cytometers_c->display($cytometer_id);
	
		echo $head.$body;
	}
////////////////////////////////////////////////////////////////////////
/**
 * loads the cytometers module
 * loads the backstage menu bar
 * calls cytometers->xml() 
 * 
 * echoes the menu bar and a <textarea> filled with the cytometer's XML (so you can see the structure in your browser)
 * 
 */
	function cytometer_xml($resource_id)
	{
	//load the module
		$cytometers_c = $this->load->module('cytometers');
		
	// load the header	
		$head = $this->load->view('header_v', '', true);
		
		$cytometer_xml = $cytometers_c->xml($resource_id);
		
		echo $head.'<textarea style="width:90%; height:500px;">'.$cytometer_xml.'</textarea>';
	}

////////////////////////////////////////////////////////////////////////
/**
 * loads the cytometers module
 * loads the backstage menu bar
 * calls cytometers->array() 
 * 
 * echoes the menu bar and a <textarea> filled with the cytometer's array (so you can see the structure in your browser)
 * 
 */
	function cytometer_array($resource_id)
	{
	//load the module
		$cytometers_c = $this->load->module('cytometers');
		
	// load the header	
		$head = $this->load->view('header_v', '', true);
		
		$cytometer_array = $cytometers_c->get_array($resource_id);
		
		echo $head.'<textarea style="width:90%; height:500px;">'.print_r($cytometer_array, true).'</textarea>';
	}


////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		PANELS					////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/**
 * lists all panels for the logged in user
 * 
 */
	function my_panels()
	{
	//load the panel module's controller
		$panel_c = $this->load->module('panels');
	// load the header
		$head = $this->load->view('header_v', '', true);
		$body = '';
		
	// get my panels from SESSION
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if ($resource['resource_type'] == 'panel')
				{	
					//~ echo 'group_id:'.$group['group_id'].' -_- resource_id:'.$resource['id'].'<br/>';
					$body .= $panel_c->display($resource['id']);
					//~ echo $body.'<hr/>';
				}
			}
		}
//~ die('<textarea>'.var_dump($body).'</textarea>');		
		echo $head.$body;
		
	}

////////////////////////////////////////////////////////////////////////
/**
 * 
 */
	function display_panel($panelid = '', $not_ajax=true)
	{
	//load the panel module's controller
		$panel_c = $this->load->module('panels');
	// load the header
		$head = $this->load->view('header_v', '', true);
	
	//if no panelid, pick one from the user's SESSION	
		if($panelid == '')
		{
			foreach($this->session->userdata['groups'] as $group)
			{
				foreach($group['resources'] as $resource)
				{
					if($resource['resource_type'] == 'panel')
						//~ $body = modules::run('membership/panels/display/'.$resource['id']);
						$body = $panel_c->display($resource['id'], $not_ajax);
				}
			}
		}
		else
			$body = $panel_c->display($panelid, $not_ajax);
		
		
		if($body == '')
			echo $head.'You have no panels to display';
			//~ echo $head.'$body == \'\'';
		else 
			echo $head.$body;
			//~ echo $head.'$body != \'\'';
		
	}
////////////////////////////////////////////////////////////////////////
	function edit_panel($panelid = '')
	{
//~ $panel_c = $this->load->module('membership/panels');
$panel_c = $this->load->module('panels');
		$head = $this->load->view('header_v', '', true);
		$body = '';
	
	//~ //if no panelid passed in, pick one from the user's SESSION
		//~ if($panelid == '')
		//~ {
			//~ foreach($this->session->userdata['groups'] as $group)
			//~ {
				//~ foreach($group['resources'] as $resource)
				//~ {
					//~ if($resource['resource_type'] == 'panel')
						//~ //$body = modules::run('membership/panels/display/'.$resource['id']);
						//~ $body = $panel_c->edit($resource['id']);
				//~ }
			//~ }
		//~ }
		//~ else
			$body = $panel_c->edit($panelid);
		//~ if($body == '')
			//~ echo $head.'You have no panels to edit';
		//~ else 
			echo $head.$body;
	}
/**
 * loads the panels module
 * loads the backstage menu bar
 * calls panels->xml() 
 * 
 * echoes the menu bar and a <textarea> filled with the panel's XML (so you can see the structure in your browser)
 * 
 */
	function panel_xml($resource_id)
	{
	//load the module
		$panel_c = $this->load->module('panels');
		
	// load the header	
		$head = $this->load->view('header_v', '', true);
		
		$panel_xml = $panel_c->xml($resource_id);
		
		echo $head.'<textarea style="width:90%; height:500px;">'.$panel_xml.'</textarea>';
	}
////////////////////////////////////////////////////////////////////////
/**
 * loads the panels module
 * loads the backstage menu bar
 * calls panels->array() 
 * 
 * echoes the menu bar and a <textarea> filled with the panel's array (so you can see the structure in your browser)
 * 
 */
	function panel_array($resource_id)
	{
	//load the module
		$panel_c = $this->load->module('panels');
		
	// load the header	
		$head = $this->load->view('header_v', '', true);
		
		$panel_array = $panel_c->get_array($resource_id);
		
		echo $head.'<textarea style="width:90%; height:500px;">'.print_r($panel_array, true).'</textarea>';
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		ADDRESSES				////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	
/** 
 * loads the addresses module
 * loads the backstage menu bar
 * loops through logged-in user's groups' resources
	* calls 'addresses->edit($address_id)' for each resource where resource_type is 'address'
	* concatenates all strings returned from addresses->edit() loop
 * 
 * echoes the menubar and the concatenated string of partials
 */
	function my_addresses()
	{
	//load the membership module's addresses controller
		$addr_c = $this->load->module('addresses');
	// load the header
		$head = $this->load->view('header_v', '', true);
		$body = '';
		
	// get my addresses from SESSION
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if ($resource['resource_type'] == 'address')
				{	
					//~ echo 'group_id:'.$group['group_id'].' -_- resource_id:'.$resource['id'].'<br/>';
					$body .= $addr_c->display($resource['id']);
					//~ echo $body.'<hr/>';
				}
			}
		}
//~ die('<textarea>'.var_dump($body).'</textarea>');		
		echo $head.$body;
	}
	
////////////////////////////////////////////////////////////////////////
/** 
 * loads the addresses module
 * loads the backstage menu bar
 * calls 'addresses->edit($address_id)' 
 * echoes the menu bar and the form
 * 
 * pass in no parameter for empty form (create a new address)
 */
	function edit_address($address_id = '')
	{
		$addr_c = $this->load->module('addresses');
		$head = $this->load->view('header_v', '', true);
		$body = '';
		
		$body = $addr_c->edit($address_id);
	
		echo $head.$body;
	}
	
////////////////////////////////////////////////////////////////////////
/**
 * loads the addresses module
 * loads the backstage menu bar
 * calls addresses->display() 
 * 
 * echoes the menu bar and the display <table>
 * 
 */
	function display_address($address_id = '')
	{
	//load the membership module's addresses controller
		$addr_c = $this->load->module('addresses');
	// load the header	
		$head = $this->load->view('header_v', '', true);
		//~ $body = '';
		
		$body = $addr_c->display($address_id);
	
		echo $head.$body;
	}
////////////////////////////////////////////////////////////////////////
/**
 * loads the addresses module
 * loads the backstage menu bar
 * calls addresses->xml() 
 * 
 * echoes the menu bar and a <textarea> filled with the address's XML (so you can see the structure in your browser)
 * 
 */
	function address_xml($resource_id)
	{
	//load the module
		$addr_c = $this->load->module('addresses');
		
	// load the header	
		$head = $this->load->view('header_v', '', true);
		
		$addr_xml = $addr_c->xml($resource_id);
		
		echo $head.'<textarea style="width:90%; height:500px;">'.$addr_xml.'</textarea>';
	}
////////////////////////////////////////////////////////////////////////
/**
 * loads the addresses module
 * loads the backstage menu bar
 * calls addresses->array() 
 * 
 * echoes the menu bar and a <textarea> filled with the address's array (so you can see the structure in your browser)
 * 
 */
	function address_array($resource_id)
	{
	//load the module
		$addr_c = $this->load->module('addresses');
		
	// load the header	
		$head = $this->load->view('header_v', '', true);
		
		$addr_array = $addr_c->get_array($resource_id);
		
		echo $head.'<textarea style="width:90%; height:500px;">'.print_r($addr_array, true).'</textarea>';
	}

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////		INVENTORIES				////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

/** 
 * loads the inventory module
 * loads the backstage menu bar
 * loops through logged-in user's groups' resources
	* calls 'inventory->edit($inventory_id)' for each resource where resource_type is 'inventory'
	* concatenates all strings returned from inventory->edit() loop
 * 
 * echoes the menubar and the concatenated string of partials
 */
	function my_inventories()
	{
	//load the membership module's addresses controller
		$inv_c = $this->load->module('inventory');
	// load the header
		$head = $this->load->view('header_v', '', true);
		$body = '';
		
	// get my inventories from SESSION
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if ($resource['resource_type'] == 'inventory')
				{	
					echo 'group_id:'.$group['group_id'].' -_- resource_id:'.$resource['id'].'<br/>';
					$body .= $inv_c->display($resource['id']);
					//~ echo $body.'<hr/>';
				}
			}
		}
//~ die('<textarea>'.var_dump($body).'</textarea>');		
		echo $head.$body;
	}
	
	
////////////////////////////////////////////////////////////////////////
	/**
	 *  show the form that creates an inventory type resource and resource_group
	 * 
	 */
	 function create_inventory_form()
	 {
		 
		$inventory_c = $this->load->module('inventory');
		$head = $this->load->view('header_v', '', true);
		
		$body= $inventory_c->create_inventory_form();
		
		echo $head.$body;
	 }
////////////////////////////////////////////////////////////////////////
/** 
 * loads the addresses module
 * loads the backstage menu bar
 * calls 'addresses->edit($address_id)' 
 * echoes the menu bar and the form
 * 
 * pass in no parameter for empty form (create a new address)
 */
	function edit_inventory($inventory_id = '')
	{
		$inventory_c = $this->load->module('inventory');
		$head = $this->load->view('header_v', '', true);
		$body = '';
		
		$body = $inventory_c->edit($inventory_id);
	
		echo $head.$body;
	}
	
////////////////////////////////////////////////////////////////////////
/**
 * loads the inventory module
 * loads the backstage menu bar
 * calls inventory->display() 
 * 
 * echoes the menu bar and the display <table>
 * 
 */
	function display_inventory($inventory_id = '')
	{
	//load the membership module's inventory controller
		$inventory_c = $this->load->module('inventory');
	// load the header	
		$head = $this->load->view('header_v', '', true);
		//~ $body = '';
		
		$body = $inventory_c->display($inventory_id);
	
		echo $head.$body;
	}
////////////////////////////////////////////////////////////////////////
/**
 * loads the inventory module
 * loads the backstage menu bar
 * calls inventory->xml() 
 * 
 * echoes the menu bar and a <textarea> filled with the address's XML (so you can see the structure in your browser)
 * 
 */
	function inventory_xml($resource_id)
	{
	//load the module
		$inventory_c = $this->load->module('inventory');
		
	// load the header	
		$head = $this->load->view('header_v', '', true);
		
		$inventory_xml = $inventory_c->xml($resource_id);
		
		echo $head.'<textarea style="width:90%; height:500px;">'.$inventory_xml.'</textarea>';
	}





}
