<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once('entities.php');

require_once  APPPATH.'modules/membership/controllers/resources.php';

class Panels extends Resources //CI_Controller 
{

	
	function __construct()
	{
	  parent::__construct();
	  $this->load->model('panels_m');
	}
	
	
////////////////////////////////////////////////////////////////////////////////
	function create($data = NULL)
	{
		if($data === null)
			$data = $this->input->post();
				
		$this->db->trans_start();		
			$r = $this->resources_m->create_resource($data);
			$data['resource_id'] = $r;			
			$p = $this->panels_m->create($data);
		$this->db->trans_complete();
		
		if($r && $p)
			return true;
		else return false;
	}
	
////////////////////////////////////////////////////////////////////////////////
	function update($data = NULL)
	{
		if($data === null)
			$data = $this->input->post();
			
		$this->db->trans_start();
			$r = $this->resources_m->update_resource($data);
			$p = $this->panels_m->update($data);
		$this->db->trans_complete();
		
		if($r && $p)
			return true;
		else return false;
	}
	
////////////////////////////////////////////////////////////////////////////////
	function list_panels($entity_id)
	{
		$panels = $this->panels_m->get_by_entityid($entity_id);
		$panels = array();
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if($resource['resource_type'] == 'panel')
					$panel[] = $resource;
			}
		}
die('membership/panels/list_panels(): <textarea>'.print_r($panels, true).'</textarea>');
	}
	
////////////////////////////////////////////////////////////////////////////////
/**
 * returns an HTML string of the given resource's display partial
 */
	function display($resource_id)
	{
		//~ $panel_model = $this->load->model('panels_m');
		
		
		
		$p = $this->panels_m->get_panel_by_id($resource_id);
		$r = $this->resources_m->get_resource_by_id($resource_id);
		//~ 
		
		
		//~ foreach($this->session->userdata['groups'] as $group)
			//~ foreach($group['resources'] as $resource)
				//~ if($resource['id'] == $resource_id)
					//~ $r = $resource;
//~ 
		$data = array_merge($p, $r);

//~ die('<textarea>'.print_r($data, true).'</textarea>');	

		
		
		//~ $this->load->view('header_v');
		return $this->load->view('partials/display_panel_p', $data, true);
	}
	
	
////////////////////////////////////////////////////////////////////////////////
	function edit($resource_id = '')
	{
		$data = array();
		if($resource_id != '')
		{
			$p = $this->panels_m->get_panel_by_id($resource_id);
			$r = $this->resources_m->get_resource_by_id($resource_id);
			$data = array_merge($p, $r);
		//~ die('panels/panels/edit() says: <br/>$data:<textarea>'.print_r($data, true).'</textarea>');
		}
		
		return $this->load->view('partials/form_panel_p', $data, true);
	}
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
}//end class
