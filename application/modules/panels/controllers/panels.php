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
 * 
 * the first parameter is the resource_id of the panel to be displayed
 * the second parameter determines wheter the display partial is echoed (for ajax calls)
 * 		or is returned (for variable storage) 
 */
	function display($resource_id, $not_ajax = true)
	{
//~ if($not_ajax)
//~ echo '$not_ajax is true<br/>';
//~ else echo '$not_ajax is false<br/>';
//~ die('panels/display() $resource_id:'.$resource_id.' $not_ajax:'.$not_ajax);	

$this->load->library('misc_functions');
		
		$panel_data = $this->panels_m->get_panel_by_id($resource_id);
//~ die('panels.php/display(): $panel_data:<textarea>'.print_r($panel_data, true).'</textarea>');
		$data['panel'] = $panel_data;
		$data['panel']['xml'] = 'erased';
		$data['panel']['panelXML'] = simplexml_load_string($panel_data['xml']);
//~ die('panels/display()<textarea>'.print_r($data['panel'], true).'</textarea>');
		if($not_ajax)
			return $this->load->view('partials/display_panel_p', $data, true);
		else			
			echo $this->load->view('partials/display_panel_p', $data, true);

			
		
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
	function get_array($resource_id)
	{
		$resource = $this->panels_m->get_panel_by_id($resource_id);
		
		return $resource;
	}
////////////////////////////////////////////////////////////////////////////////
	function get_xml($resource_id)
	{ return $this->xml($resource_id); }
	function xml($resource_id)
	{
		$resource = $this->panels_m->get_panel_by_id($resource_id);
		
		return $resource['xml'];
	}
	
	
	
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
	function download($resource_id)
	{
		$xml = $this->xml($resource_id);
		
        $this->output->set_header('Content-Type: application/force-download');
        $this->output->set_header('Content-Disposition: attachment; filename="'.str_replace(' ', '_', $this->get_resource_name($resource_id)).'.xml"');
        $this->output->set_content_type('text/xml')
                ->set_output($xml);		
		
	}
	
	
	function get_name($resource_id)
	{
		
	}
	

}//end class
