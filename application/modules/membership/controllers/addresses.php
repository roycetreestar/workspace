<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('resources.php');

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
		
		$data['xml'] = '<?xml version="1.0" encoding="UTF-8"?>
	<Address type="xml/addr" name="test address">
		<Line1>'.$data['line1'].'</Line1>
		<Line2>'.$data['line2'].'</Line2>
		<Line3>'.$data['line3'].'</Line3>
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
		if(isset($data['resource_id']))
			return $this->update_address($data);
		else
			return $this->create_address($data);
	}
	
	
////////////////////////////////////////////////////////////////////////////////
	function create_address($data = NULL)
	{
		if($data === NULL)
			$data = $this->input->post();
		$r = $this->resources_m->create_resource($data);
		$data['resource_id'] = $r;
		$a = $this->addresses_m->create_address($data);
		
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
		$r = $this->resources_m->save_resource($data);
		$a = $this->addresses_m->update($data);
		
		if($r && $a)
			return true;
		else
			return false;
	}
	
////////////////////////////////////////////////////////////////////////////////
	function list_addresses($entity_id)
	{
		$addresses = $this->addresses_m->get_by_entityid($entity_id);
die('addresses.php/list_addresses(): '.print_r($cytometers));
	}
	
////////////////////////////////////////////////////////////////////////////////
	function display($resource_id)
	{
		$data = $this->addresses_m->get_address_by_id($resource_id);
//die('<textarea>'.print_r($data, true).'</textarea>');
		$this->load->view('header_v');
		$this->load->view('partials/display_address_p', $data);
	}
	
	function edit($resource_id)
	{
		die('you go to membership/addresses/edit()');
	}
////////////////////////////////////////////////////////////////////////////////
}//end class
