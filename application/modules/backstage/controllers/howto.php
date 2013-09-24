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
		$addr_id = '13';
		
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
		$data['new'] = $usermodule->edit();
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
	function thesaurus()
	{
		$thesaurus_module = $this->load->module('thesaurus');
	//the full page (all lookup partials)
		//~ $data['full'] = $thesaurus_module->index();
	//catalog header lookup partial
		$data['cat_head_lookup'] = $thesaurus_module->get_catalog_header_lookup_form();
		$data['cat_head_alt_form'] = $thesaurus_module->get_catalog_header_alternates_form();	
	
	//chromes 
		$data['chromes_lookup'] = $thesaurus_module->get_chrome_lookup_form();
		$data['add_chrome_form']= $thesaurus_module->get_chromes_form();	
		$data['add_chrome_alt_form']= $thesaurus_module->get_chromes_alternates_form();	
		
	//clones
		//~ $data['clones_lookup'] = $thesaurus_module->get_clone_lookup_form()
		$data['add_clone_form'] = $thesaurus_module->get_clones_form();	
		//~ $data['add_clone_alt_form'] = $thesaurus_module->get_clone_alternates_form();	
	//species
		$data['species_lookup'] = $thesaurus_module->get_species_lookup_form();
		$data['add_species_form'] = $thesaurus_module->get_species_form();	
		$data['add_species_alt_form'] = $thesaurus_module->get_species_alternates_form();	
	//targets
		$data['targets_lookup'] = $thesaurus_module->get_target_lookup_form();
		$data['add_target_form'] = $thesaurus_module->get_targets_form();	
		$data['add_target_alt_form'] = $thesaurus_module->get_targets_alternates_form();	
	
		$this->load->view('header_v'); 
		$this->load->view('howto/thesaurus_p', $data);
		
	}
	function catalog_headers()
	{
		$thesaurus_module = $this->load->module('thesaurus');
		
		$add_alt = $thesaurus_module->get_catalog_header_alternates_form();	
		
		$header = $this->load->view('header_v', '', true); 
		echo $header.$add_alt;
	}
	function chromes()
	{
		$thesaurus_module = $this->load->module('thesaurus');
		$add_chrome = $thesaurus_module->get_chromes_form();	
		$add_alt = $thesaurus_module->get_chromes_alternates_form();	
		
		$header = $this->load->view('header_v', '', true); 
		echo $header.$add_chrome.$add_alt;
	}
	function species()
	{
		$thesaurus_module = $this->load->module('thesaurus');
		$add_species = $thesaurus_module->get_species_form();	
		$add_alt = $thesaurus_module->get_species_alternates_form();	
		
		$header = $this->load->view('header_v', '', true); 
		echo $header.$add_species.$add_alt;
	}
	function targets()
	{
		$thesaurus_module = $this->load->module('thesaurus');
		$add_target = $thesaurus_module->get_targets_form();	
		$add_alt = $thesaurus_module->get_targets_alternates_form();	
		
		$header = $this->load->view('header_v', '', true); 
		echo $header.$add_target.$add_alt;
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	function search()
	{
		$search_module = $this->load->module('catalog/search');
		$thesaurus_module = $this->load->module('thesaurus');
		
		$vendor_module = $this->load->module('catalog/vendors');
		//~ $catalog_module = $this->load->module('catalog');
		
		//~ $data['vendors'] = $vendor_module->get_all_vendors();
		$data['vendors'] = $vendor_module->get_current_vendors();
		
		$data['species_dd'] = $thesaurus_module->species_dropdown();
		
		$all_targets = $search_module->get_all_target_names();
		$data['targets'] = json_encode($all_targets);
		
		$all_chromes = $search_module->get_all_chrome_names();
		$data['chromes'] = json_encode($all_chromes);

		
		$all_clones = $search_module->get_all_clone_names();
		$data['clones'] = json_encode($all_clones);
		
		
//~ die('backstage/howto/search(): <br/>$data:<textarea style="width:90%; height:90%" >'.print_r($data, true).'</textarea>');		
		$header = $this->load->view('header_v', '', true); 
		$search_partial = '<div class="well">'. $search_module->get_search_form($data).'</div>';
		
		echo $header.$search_partial;
	}

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function edit_vendor($vendor_id)
	{
		$thesaurus = $this->load->module('catalog/vendors');
		
		$vendor_form = $thesaurus->edit_vendor($vendor_id);


		$header = $this->load->view('header_v', '', true); 
		
		echo $header.$vendor_form;
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
}//end class
