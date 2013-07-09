
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resources extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();

	  $this->load->helper('url');
	  $this->load->model('resources_m');
//	  $this->load->model('permission_test_m');
	  $this->load->library('session');
	}

	function index()
	{
	//   $this->load->view('partials/login_p');
	//   $this->load->view('partials/create_user_p');
		$this->load->view('landing_page_v');
	}
	
////////////////////////////////////////////////////////////////////////////////
    
    function create_resource()
    {

	    if($this->input->post() )
	    {
//		    echo '<textarea>'.print_r($this->input->post(), true).'</textarea>' ;
		    $data = $this->input->post();


//		    if($this->permission_test_m->create_resource($data))
//			    echo 'success';
//		    else	    
//			    echo 'fail';
	    }
//$this->permission_test_m->create_resource($data);
$this->resources_m->create_resource($data);	    
//		else 
//		{
//			 $this->load->view('header_v');
//			 $this->load->view('partials/create_resource_p');
//		}

redirect('permission_test/index', 'refresh');

    }  
	
	
////////////////////////////////////////////////////////////////////////////////
	    function display_resource($resourceid)
    {
	   $data['rdata'] = $this->resources_m->get_resource_by_id($resourceid);
	   
	   $this->load->view('partials/display_resource_p', $data);
    }
	
	function update_resource()
	{
		$data = $this->resources_m->update_resource($data);
		redirect('permission_test/resources/display_resource', 'refresh');
	}
}//end class