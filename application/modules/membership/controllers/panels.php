<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once('entities.php');

class Panels extends Resources //CI_Controller 
{

	
	function __construct()
	{
	  parent::__construct();
	  $this->load->model('panels_m');
	}
	
	
////////////////////////////////////////////////////////////////////////////////
	function create_panel($data = NULL)
	{
		if($data === null)
			$data = $this->input->post();
						
		$r = $this->resources_m->create_resource($data);
		$data['resource_id'] = $r;
		
		$p = $this->panels_m->create($data);
		
		if($r && $p)
			return true;
		else return false;
	}
	
////////////////////////////////////////////////////////////////////////////////
	function update_panel($data)
	{
		if($data === null)
			$data = $this->input->post();
		return $this->panels_m->update($data);
	}
	
////////////////////////////////////////////////////////////////////////////////
	function list_panels($entity_id)
	{
		$panels = $this->panels_m->get_by_entityid($entity_id);
die('panels.php/list_panels(): '.print_r($panels));
	}
	
////////////////////////////////////////////////////////////////////////////////
	function display($resource_id)
	{
		$p = $this->panels_m->get_panel_by_id($resource_id);

		$r = $this->resources_m->get_resource_by_id($resource_id);
		
		$data = array_merge($p, $r);
//die('<textarea>'.print_r($data, true).'</textarea>');	

		
		
		$this->load->view('header_v');
		$this->load->view('partials/display_panel_p', $data);
	}
	
	
////////////////////////////////////////////////////////////////////////////////

	function panel_form($resource_id = NULL)
	{
		if($resource_id !== NULL)
		{
			
		}
	}
////////////////////////////////////////////////////////////////////////////////
}//end class