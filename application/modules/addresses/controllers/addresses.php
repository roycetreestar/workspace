<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//~ require_once('resources.php');
require_once  APPPATH.'modules/membership/controllers/resources.php';

class Addresses extends Resources //CI_Controller 
{

	
	function __construct()
	{
	  parent::__construct();
	  $this->load->model('addresses_m');
	  $this->load->model('resources_m');
	}
	
	
////////////////////////////////////////////////////////////////////////////////
	function save($data = NULL)
	{
		if($data === NULL)
			$data = $this->input->post();
//~ die('addresses/save() $data:<br/><pre>'.print_r($data, true).'</pre>');
		$data['xml'] = '<?xml version="1.0" encoding="UTF-8"?>
	<Address type="xml/addr" name="'.$data['resource_name'].'">
		<Line1>'.$data['address_line_1'].'</Line1>
		<Line2>'.$data['address_line_2'].'</Line2>
		<Line3>'.$data['address_line_3'].'</Line3>
		<City>'.$data['city'].'</City>
		<State>'.$data['state'].'</State>
		<Zipcode>'.$data['zipcode'].'</Zipcode>
		<Country>'.$data['country'].'</Country>
	</Address>
		';
		$data['size'] = strlen($data['xml']);
		$data['hash'] = md5($data['xml']);
			
		//~ return $this->resources_m->save($data);
			//~ 
		if($data['resource_id'] > 0)
			return $this->update_address($data);
		else
			return $this->create_address($data);
	}
	
	
////////////////////////////////////////////////////////////////////////////////
	function create_address($data = NULL)
	{
		if($data === NULL)
			$data = $this->input->post();
			
		$this->db->trans_start();
			$r = $this->resources_m->create_resource($data);
			$data['resource_id'] = $r;
			$a = $this->addresses_m->create_address($data);
		$this->db->trans_complete();
		if($r && $a)
		{
			$this->get_session();
			echo 'success';
//			return true;
		}
		else
			echo 'failure';
//			return false;
	}
	
////////////////////////////////////////////////////////////////////////////////
	function update_address($data)
	{
//~ die('oh, no! you hit update_address()!');
//~ die('<textarea>'.print_r($data, true).'</textarea>');
		$r = $this->resources_m->save_resource($data);
		$a = $this->addresses_m->update($data);
	
		if($r && $a)
			//~ return true;
			echo 'Address Updated';
		else
		{
			$response = 'UPDATE failed<br/>';
			if(!$r)
				$response .= 'Could not update the resources table - its response:'.$r.'<br/>';
			if(!$a)
				$response .= 'Could not update the addresses table';
			echo $response;
				
		}
	}
	
////////////////////////////////////////////////////////////////////////////////
	function list_addresses($entity_id)
	{
		$addresses = $this->addresses_m->get_by_entityid($entity_id);
die('addresses.php/list_addresses(): '.print_r($cytometers));
	}
	
////////////////////////////////////////////////////////////////////////////////
	function display($resource_id = NULL)
	{
		if($resource_id !== NULL)
			$data = $this->addresses_m->get_address_by_id($resource_id);
		else $data = '';
//~ die('<textarea>'.print_r($data, true).'</textarea>');
		//~ $this->load->view('header_v');
		
		$addr_display =  $this->load->view('partials/display_address_p', $data, true);
//~ die('<h2>$addr_display:</h2>'.$addr_display);
		return $addr_display;
	}
	
////////////////////////////////////////////////////////////////////////////////
	function edit($resource_id = NULL)
	{
		if($resource_id !== NULL)
			$data = $this->addresses_m->get_address_by_id($resource_id);
		else $data = '';
//~ die('<textarea>'.print_r($data, true).'</textarea>');
		//~ $this->load->view('header_v');
		return $this->load->view('partials/form_address_p', $data, true);
	}
////////////////////////////////////////////////////////////////////////////////
	function get_xml($resource_id)
	{ 	return $this->xml($resource_id); }
	function xml($resource_id)
	{
		$resource = $this->addresses_m->get_address_by_id($resource_id);
		
		return $resource['xml'];
		
	}
////////////////////////////////////////////////////////////////////////////////

	function get_array($resource_id)
	{
		$resource = $this->addresses_m->get_address_by_id($resource_id);
		
		return $resource;
		
	}
	
}//end class
