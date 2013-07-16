<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once('entities.php');

class Cytometers extends Resources //CI_Controller 
{

	
	function __construct()
	{
	  parent::__construct();
	  $this->load->model('cytometers_m');
	}
	
////////////////////////////////////////////////////////////////////////////////	
	function create_cytometer($data = null)
	{
		if($data === null)
			$data = $this->input->post();
				
		$r = $this->resources_m->create_resource($data);
		$data['resource_id'] = $r;
//die('<textarea>'.print_r($data, true).'</textarea>');		
		$c = $this->cytometers_m->create($data);
		
		if($r && $c)
			return true;
		else
			return false;
	}
	
	
	
////////////////////////////////////////////////////////////////////////////////
	
	function update_cytometer($data)
	{
		$r = $this->resources_m->update($data);
		$c = $this->cytometers_m->update($data);
		
		if($r && $c)
			return true;
		else
			return false;
	}
	
	
	
////////////////////////////////////////////////////////////////////////////////
	
	function list_cytometers($entity_id)
	{
		$cytometers = $this->cytometers_m->get_by_entityid($entity_id);
die('cytometers.php/list_cytometers(): '.print_r($cytometers));
	}
	
	
	
////////////////////////////////////////////////////////////////////////////////
	
	
	function display($resource_id)
	{
		$data = $this->cytometers_m->get_cytometer($resource_id);
		
		$this->load->view('header_v');
		$this->load->view('partials/form_cytometer_p', $data);
	}
	
	
////////////////////////////////////////////////////////////////////////////////
}//end class