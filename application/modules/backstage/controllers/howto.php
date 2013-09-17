<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//~// if you want to this class to extend some class from another module, require() the file first:
//~ require_once  APPPATH.'modules/membership/controllers/resources.php';
//~ require_once  APPPATH.'modules/membership/controllers/groups.php';
//~ require_once  APPPATH.'modules/membership/controllers/users.php';

class Howto extends Loggedin_Controller //MY_Controller //CI_Controller 
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
	function index()
	{
		$this->load->view('header_v'); 
		$this->load->view('howto/howto_p');
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function addresses()
	{
		$addr_id = '23';
		
		$addr_module = $this->load->module('addresses');
		
		
		$data['xml'] = $addr_module->get_xml($addr_id); 
		$data['array'] = $addr_module->get_array($addr_id); 
		$data['new'] = $addr_module->edit(); 
		$data['edit'] = $addr_module->edit($addr_id); 
		$data['display'] = $addr_module->display($addr_id);
		
		
		$this->load->view('header_v'); 
		$this->load->view('howto/addresses_p', $data);
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function cytometers()
	{
		$cytometer_id = '19';
		$cytometer_module = $this->load->module('cytometers');
		
		
		$data['xml'] = $cytometer_module->get_xml($cytometer_id); 
		$data['array'] = $cytometer_module->get_array($cytometer_id); 
		$data['new'] = $cytometer_module->edit(); 
		$data['edit'] = $cytometer_module->edit($cytometer_id); 
		$data['display'] = $cytometer_module->display($cytometer_id); 
		
		$this->load->view('header_v'); 
		$this->load->view('howto/cytometers_p', $data);
	}

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function inventory()
	{
		$inventory_id = '10';
		$inventory_module = $this->load->module('inventory');
		
		
		//~ $data['xml'] = $inventory_module->get_xml($inventory_id); 
		//~ $data['array'] = $inventory_module->get_array($inventory_id); 
		
		$data['new'] = $inventory_module->my_inventories('form'); 
		$data['edit'] = $inventory_module->my_inventories('form'); 
//~ die('howto/inventory() $data:<textarea>'.print_r($data, true).'</textarea>');
	
		//~ $data['new'] = $inventory_module->edit(); 
		//~ $data['edit'] = $inventory_module->edit($inventory_id); 
		$data['display'] = $inventory_module->display($inventory_id);
		
		$data['show_fields'] = $inventory_module->get_form_show_fields();
		$data['add_manually'] = $inventory_module->get_form_add_item($inventory_id);
		$data['add_cat_num'] = $inventory_module->get_form_add_cat_num();
		$data['filter'] = $inventory_module->get_form_filter();
		
		$this->load->view('header_v'); 
		$this->load->view('howto/inventory_p', $data);
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function panels()
	{
		$panel_id = '20';
		$panel_module = $this->load->module('panels');
		
		
		$data['xml'] = $panel_module->get_xml($panel_id); 
		$data['array'] = $panel_module->get_array($panel_id); 
		$data['new'] = $panel_module->edit(); 
		$data['edit'] = $panel_module->edit($panel_id); 
		$data['display'] = $panel_module->display($panel_id);
		
		
		$this->load->view('header_v'); 
		$this->load->view('howto/panels_p', $data);
	}

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////	
	function users()
	{
		$userid = $this->session->userdata['logged_in']['userid'];
		
		
	//load the membership/users controller	
		$usermodule = $this->load->module('membership/users');
	//get the xml			
		$data['user_xml'] = $usermodule->get_xml($userid);
	//get the array
		$data['user_arr'] = $usermodule->get_array($userid);
		
	//basic display
		$data['display'] = $usermodule->display($userid);
	//basic form
		$data['form'] = $usermodule->edit($userid);
	//registration form
		$data['registration_form'] = $usermodule->my_account($userid);
		$data['login_form'] = $usermodule->login_form();
	
		$this->load->view('header_v'); 
		$this->load->view('howto/users_p', $data);
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function groups()
	{
		$groupid = key($this->session->userdata['groups']);
		
		$groupmodule = $this->load->module('membership/groups');
		
	//get the xml
		$data['group_xml'] = $groupmodule->get_xml($groupid);
	//get the array
		$data['group_arr'] = $groupmodule->get_array($groupid);
	//edit partial
		$data['create'] = $groupmodule->edit('');
		$data['edit'] = $groupmodule->edit($groupid);
	//display partial
		$data['display'] = $groupmodule->display($groupid);
	//available groups
		$data['available'] = $groupmodule->available_groups();
	//managed groups
		$data['labs_mgd'] = $groupmodule->labs_managed();
		$data['cores_mgd'] = $groupmodule->cores_managed();
	//joined groups
		$data['labs_joined'] = $groupmodule->labs_joined();
		$data['cores_joined'] = $groupmodule->cores_joined();
		
	//pending members
		$data['pending_members_div'] = $groupmodule->pending_members($groupid);
	//current members
		$data['current_members'] = $groupmodule->current_members($groupid);
	//group information
		$data['group_info'] = $groupmodule->group_info($groupid);
		
		$this->load->view('header_v'); 
		$this->load->view('howto/groups_p', $data);
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
}//end class
