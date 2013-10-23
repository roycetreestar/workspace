<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resources extends Loggedin_Controller //CI_Controller 
{

	function __construct()
	{
	  parent::__construct();

	  $this->load->helper('url');
	  $this->load->model('resources_m');
//	  $this->load->model('membership_m');
//	  $this->load->library('session');
	}

////////////////////////////////////////////////////////////////////////////////
	function index()
	{
	//   $this->load->view('partials/login_p');
	//   $this->load->view('partials/create_user_p');
		//~ $this->load->view('landing_page_v');
			redirect('backstage');
	}
	
////////////////////////////////////////////////////////////////////////////////
    
	function create_resource($data=NULL)
	{
		if($data == NULL && $this->input->post() )
		{
			$data = $this->input->post();

		}

		//create_resource returns resource_id or FALSE
		return $this->resources_m->create_resource($data);	    
		//redirect('membership/index', 'refresh');

	}  
////////////////////////////////////////////////////////////////////////////////
	function create_address()
	{
		$data = $this->input->post();

		$data['resource_id'] = $this->create_resource($data);
//die($this->debug_arr($data));	
		$data['address_success'] = $this->resources_m->create_address($data);
		
		die($this->debug_arr($data));


	}
	
////////////////////////////////////////////////////////////////////////////////
	    function display($resourceid)
    {
	   $data['rdata'] = $this->resources_m->get_resource_by_id($resourceid);
	   
	   $this->load->view('partials/display_resource_p', $data);
    }
	
////////////////////////////////////////////////////////////////////////////////
	function update_resource()
	{
		$data = $this->resources_m->update_resource($data);
		redirect('membership/resources/display_resource', 'refresh');
	}
	
////////////////////////////////////////////////////////////////////////////////
	function delete_resource($resource_id)
	{
		$result = $this->resources_m->delete($resource_id);
		
		return $result;
		
	}
	
////////////////////////////////////////////////////////////////////////////////
	function get_group_name_from_resource_id($resource_id)
	{
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if($resource_id === $resource['id'])
					return $group['group_name'];
			}
		}
		
	}
	
////////////////////////////////////////////////////////////////////////////////
	function get_resource_permission($resource_id)
	{
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if($resource_id === $resource['id'])
					return $group['permission'];
			}
		}
	}
	
////////////////////////////////////////////////////////////////////////////////
	function get_resource_name($resource_id)
	{
		return $this->resources_m->get_name($resource_id);
	}
}//end class
