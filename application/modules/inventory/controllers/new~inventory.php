<?php
/**
 * The main controller of the Inventory module
 * 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// class Home extends MY_Controller {
//~ class Inventory extends Secure_Controller 
class Inventory extends Loggedin_Controller 
{

	
//////////////////////////////////////////////////////////////////////////////////////////
	function __construct()
	{
		parent::__construct();
		
		$this->data['title'] = "Fluorish | Labs and Cores";

		
		$this->load->model('inventory_m');
		$this->load->model('inventory_show_fields_m');

		$this->load->model('membership/groups_m');
		//~ $this->load->model('labs_and_cores/lab_user_link_model');
		
		
		//~ foreach($this->session->userdata['groups'] as $group)
			//~ if($group['group_type'] == 1 || $group['group_type'] == 3)	//if it's a lab or a personal resources group
				//~ $this->data['labs'][] = $group;
		
		$this->data['show_fields'] = $this->setup_show_fields();
		
	}// end __construct()
	
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	public function index() 
	{	
		
		die('inventory/index()<br/>$this->data:<br/><textarea>'.print_r($this->data, true).'</textarea>');
	}
	
	
////////////////////////////////////////////////////////////////////////////////
/**
 * Pulls an array of inventory field preferences from custom_reagents_show_fields table
 * 
 * 
 * @return array 
 */	
	function setup_show_fields()
	{
		$this->load->model('inventory_show_fields_m');
		$arr = $this->inventory_show_fields_m->read_by_userid($this->session->userdata['logged_in']['userid']);
		$show_fields = array();
		
		foreach($arr as $item)
		{
			$show_fields[$item['field_name']]['show'] = $item['show'];
			$show_fields[$item['field_name']]['order'] = $item['order'];
		}
		
		return $show_fields;
		
	}
	
	
	function edit($resource_id = '')
	{		
		//$resource_id is the collected inventory
		
		//if $resource_id isn't filled, 
		//		construct an inventory_p with one blank inventory_reagent_p
		
		//else search through george.inventory for all reagents where inventory_id == $inventory_id
		
		//construct an inventory_v:
		//foreach reagent 
		//		grab its george.inventory record
		//		pass the record to an inventory_reagent_p
		
		
	}
}//end class
