<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//~// if you want to this class to extend some class from another module, require() the file first:
//~ require_once  APPPATH.'modules/membership/controllers/resources.php';
//~ require_once  APPPATH.'modules/membership/controllers/groups.php';
//~ require_once  APPPATH.'modules/membership/controllers/users.php';

class Howto extends Loggedin_Controller //MY_Controller //CI_Controller 
{
	
	public $userid ;
	//~ public $membership;
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	function __construct()
	{
	  parent::__construct();
	  //~ $this->load->model('cytometers_m');
	  	   $this->load->helper('url');
		//~ $membership_mod = $this->load->module('membership');
		$this->load_modules();
		//~ $this->users_model = $this->load->model('membership/users_m');
	
	// make checking if user is logged in a bit easier to type:	
		if(isset($this->session->userdata['logged_in']['userid']))
		{
			$this->userid = $this->session->userdata['logged_in']['userid'];
			//~ $this->membership = $this->load->module('membership');
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
		
		//~ $address_module = $this->load->module('addresses');
		
		
		$data['xml'] = $this->address_module->get_xml($addr_id); 
		$data['array'] = $this->address_module->get_array($addr_id); 
		$data['new'] = $this->address_module->edit(); 
		$data['edit'] = $this->address_module->edit($addr_id); 
		$data['display'] = $this->address_module->display($addr_id);
		
		
		$this->load->view('header_v'); 
		$this->load->view('howto/addresses_p', $data);
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function cytometers()
	{
		$cytometer_id = '26';
		//~ $cytometer_module = $this->load->module('cytometers');
		
		
		$data['xml'] = $this->cytometer_module->get_xml($cytometer_id); 
		$data['array'] = $this->cytometer_module->get_array($cytometer_id); 
		$data['new'] = $this->cytometer_module->edit(); 
		$data['edit'] = $this->cytometer_module->edit($cytometer_id); 
		$data['display'] = $this->cytometer_module->display($cytometer_id); 
		
		$this->load->view('header_v'); 
		$this->load->view('howto/cytometers_p', $data);
	}

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function inventory()
	{
		$inventory_id = '10';
		//~ $inventory_module = $this->load->module('inventory');
		
		
		//~ $data['xml'] = $inventory_module->get_xml($inventory_id); 
		//~ $data['array'] = $inventory_module->get_array($inventory_id); 
		
		$data['new'] = $this->inventory_module->my_inventories('form'); 
		$data['edit'] = $this->inventory_module->my_inventories('form'); 
//~ die('howto/inventory() $data:<textarea>'.print_r($data, true).'</textarea>');
	
		//~ $data['new'] = $this->inventory_module->edit(); 
		//~ $data['edit'] = $this->inventory_module->edit($inventory_id); 
		$data['display'] = $this->inventory_module->display($inventory_id);
		
		$data['show_fields'] = $this->inventory_module->get_form_show_fields();
		$data['add_manually'] = $this->inventory_module->get_form_add_item($inventory_id);
		$data['add_cat_num'] = $this->inventory_module->get_form_add_cat_num();
		$data['filter'] = $this->inventory_module->get_form_filter();
		
		$this->load->view('header_v'); 
		$this->load->view('howto/inventory_p', $data);
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function panels()
	{
		$panel_id = '14';
		//~ $panel_module = $this->load->module('panels');
		
		
		$data['xml'] = $this->panel_module->get_xml($panel_id); 
		$data['array'] = $this->panel_module->get_array($panel_id); 
		$data['new'] = $this->panel_module->edit(); 
		$data['edit'] = $this->panel_module->edit($panel_id); 
		$data['display'] = $this->panel_module->display($panel_id);
		
		
		$this->load->view('header_v'); 
		$this->load->view('howto/panels_p', $data);
	}

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////	
	function users()
	{
		$userid = $this->session->userdata['logged_in']['userid'];
		
		
	//load the membership/users controller	
		//~ $usermodule = $this->load->module('membership/users');
	//get the xml			
		$data['user_xml'] = $this->users_module->get_xml($userid);
	//get the array
		$data['user_arr'] = $this->users_module->get_array($userid);
		
	//basic display
		$data['display'] = $this->users_module->display($userid);
	//basic form
		$data['new'] = $this->users_module->edit();
		$data['form'] = $this->users_module->edit($userid);
	//registration form
		$data['registration_form'] = $this->users_module->my_account($userid);
		$data['login_form'] = $this->users_module->login_form();
	
		$this->load->view('header_v'); 
		$this->load->view('howto/users_p', $data);
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function groups()
	{
		$groupid = key($this->session->userdata['groups']);
		
		//~ $groupmodule = $this->load->module('membership/groups');
		
	//get the xml
		$data['group_xml'] = $this->groups_module->get_xml($groupid);
	//get the array
		$data['group_arr'] = $this->groups_module->get_array($groupid);
	//edit partial
		$data['create'] = $this->groups_module->edit('');
		$data['edit'] = $this->groups_module->edit($groupid);
	//display partial
		$data['display'] = $this->groups_module->display($groupid);
	//available groups
		$data['available'] = $this->groups_module->available_groups();
	//managed groups
		$data['labs_mgd'] = $this->groups_module->labs_managed();
		$data['cores_mgd'] = $this->groups_module->cores_managed();
	//joined groups
		$data['labs_joined'] = $this->groups_module->labs_joined();
		$data['cores_joined'] = $this->groups_module->cores_joined();
		
	//pending members
		$data['pending_members_div'] = $this->groups_module->pending_members($groupid);
	//current members
		$data['current_members'] = $this->groups_module->current_members($groupid);
	//group information
		$data['group_info'] = $this->groups_module->group_info($groupid);
		
		$this->load->view('header_v'); 
		$this->load->view('howto/groups_p', $data);
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function thesaurus()
	{
		//~ $thesaurus_module = $this->load->module('thesaurus');
	//the full page (all lookup partials)
		//~ $data['full'] = $thesaurus_module->index();
	//catalog header lookup partial
		$data['cat_head_lookup'] = $this->thesaurus_module->get_catalog_header_lookup_form();
		$data['cat_head_alt_form'] = $this->thesaurus_module->get_catalog_header_alternates_form();	
	
	//chromes 
		$data['chromes_lookup'] = $this->thesaurus_module->get_chrome_lookup_form();
		$data['add_chrome_form']= $this->thesaurus_module->get_chromes_form();	
		$data['add_chrome_alt_form']= $this->thesaurus_module->get_chromes_alternates_form();	
		
	//clones
		//~ $data['clones_lookup'] = $this->thesaurus_module->get_clone_lookup_form()
		$data['add_clone_form'] = $this->thesaurus_module->get_clones_form();	
		//~ $data['add_clone_alt_form'] = $this->thesaurus_module->get_clone_alternates_form();	
	//species
		$data['species_lookup'] = $this->thesaurus_module->get_species_lookup_form();
		$data['add_species_form'] = $this->thesaurus_module->get_species_form();	
		$data['add_species_alt_form'] = $this->thesaurus_module->get_species_alternates_form();	
	//targets
		$data['targets_lookup'] = $this->thesaurus_module->get_target_lookup_form();
		$data['add_target_form'] = $this->thesaurus_module->get_targets_form();	
		$data['add_target_alt_form'] = $this->thesaurus_module->get_targets_alternates_form();	
	
		$this->load->view('header_v'); 
		$this->load->view('howto/thesaurus_p', $data);
		
	}
	function catalog_headers()
	{
		//~ $thesaurus_module = $this->load->module('thesaurus');
		
		$add_alt = $this->thesaurus_module->get_catalog_header_alternates_form();	
		
		$header = $this->load->view('header_v', '', true); 
		echo $header.$add_alt;
	}
	function chromes()
	{
		//~ $thesaurus_module = $this->load->module('thesaurus');
		$add_chrome = $this->thesaurus_module->get_chromes_form();	
		$add_alt = $this->thesaurus_module->get_chromes_alternates_form();	
		
		$header = $this->load->view('header_v', '', true); 
		echo $header.$add_chrome.$add_alt;
	}
	function species()
	{
		//~ $thesaurus_module = $this->load->module('thesaurus');
		$add_species = $this->thesaurus_module->get_species_form();	
		$add_alt = $this->thesaurus_module->get_species_alternates_form();	
		
		$header = $this->load->view('header_v', '', true); 
		echo $header.$add_species.$add_alt;
	}
	function targets()
	{
		//~ $thesaurus_module = $this->load->module('thesaurus');
		$add_target = $this->thesaurus_module->get_targets_form();	
		$add_alt = $this->thesaurus_module->get_targets_alternates_form();	
		
		$header = $this->load->view('header_v', '', true); 
		echo $header.$add_target.$add_alt;
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	function search()
	{
		//~ $search_module = $this->load->module('catalog/search');
		//~ $thesaurus_module = $this->load->module('thesaurus');
		
		//~ $vendor_module = $this->load->module('catalog/vendors');
		//~ $catalog_module = $this->load->module('catalog');
		
		//~ $data['vendors'] = $this->vendors_module->get_all_vendors();
		$data['vendors'] = $this->vendors_module->get_current_vendors();
		
		$data['species_dd'] = $this->thesaurus_module->species_dropdown();
		
		$all_targets = $this->search_module->get_all_target_names();
		$data['targets'] = json_encode($all_targets);
		
		$all_chromes = $this->search_module->get_all_chrome_names();
		$data['chromes'] = json_encode($all_chromes);

		
		$all_clones = $this->search_module->get_all_clone_names();
		$data['clones'] = json_encode($all_clones);
		
		
//~ die('backstage/howto/search(): <br/>$data:<textarea style="width:90%; height:90%" >'.print_r($data, true).'</textarea>');		
		$header = $this->load->view('header_v', '', true); 
		$search_partial = '<div class="well">'. $this->search_module->get_search_form($data).'</div>';
		
		echo $header.$search_partial;
	}

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function edit_vendor($vendor_id)
	{
		//~ $thesaurus = $this->load->module('catalog/vendors');
		
		$vendor_form = $this->vendors_module->edit_vendor($vendor_id);


		$header = $this->load->view('header_v', '', true); 
		
		echo $header.$vendor_form;
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
}//end class
