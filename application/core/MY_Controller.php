<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MY_Controller Class
 *
 *
 * @package Project Name
 * @subpackage  Controllers
 */


/* ************************************************************************** */
/* ************************************************************************** */
/* ************************************************************************** */



class MY_Controller extends MX_Controller //CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();
//        $this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
	}
	
	function debug_arr($array)
	{
		echo '<textarea>'.print_r($array, true).'</textarea>';
	}
	
	
}




/* ************************************************************************** */
/* ************************************************************************** */
/* ************************************************************************** */
/* ************************************************************************** */
/* ************************************************************************** */




//class LoggedIn extends MY_Controller {
//
//	public function __construct() 
//	{
//		parent::__construct();
////		if (is_logged_in() == FALSE) 
////		{
////			$this->session->set_userdata('return_to', uri_string());
////			$this->session->set_flashdata('message', 'You need to log in.');
////			redirect('/home');
////		}
////		$this->load->library('session');
//		$this->load->model('resources_m');
//		$this->load->model('groups_m');
//		
//if(isset($this->session->userdata['logged_in']))
//	$this->get_session();
//	}
////////////////////////////////////////////////////////////////////////////////
//    function is_logged_in()
//    {
//        $is_logged_in = $this->session->userdata('is_logged_in');
//        if(!isset($is_logged_in) || $is_logged_in != true)
//        {
//            echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';    
//            die();      
//        }       
//    }
    
////////////////////////////////////////////////////////////////////////////////
//    	function do_login()//($username, $password)
//	{
//		$username = $this->input->post('username');
//		$password = $this->input->post('password');
//
////compare username/password to the database
//		$result = $this->users_m->login($username, $password);
//		
//		if( $result )
//		{
//			$session_array = array('userid' => $result['entity_id'], 'username' => $result['user_name']);
//			
//			$this->session->set_userdata('logged_in', $session_array);
//	
//			$this->get_session();
//
//	
////die('login/refresh_session: <br/><textarea>'.print_r($this->session->userdata, true).'</textarea>');			
////			 redirect('membership', 'refresh');
//			redirect('membership/users/profile/'.$result['entity_id'], 'refresh');
//		}
//		else
//		{
//			$data['message'] = 'Incorrect username or password';
//			$this->load->view('partials/login_p', $data);
//		}
//	}
 
////////////////////////////////////////////////////////////////////////////////
//	function refresh_session()
//	{
////		$this->session->set_userdata('groups', $this->groups_m->my_groups($result['userid']));
//		if(!isset($this->session->userdata['logged_in']))
//		{
//			redirect('membership/users');
//		}
//		//set up the groups session subarray			
//			$group_arr = array();
////
//		$my_groups = $this->groups_m->my_groups($this->session->userdata['logged_in']['userid']);
//		
//		if($my_groups)
//			foreach($my_groups as $group)
//			{		
//				$resources = $this->resources_m->get_resources_by_groupid($group['group_id']);
//				$group['resources'] = $resources;
//				
//				$group_arr[$group['group_id']] = $group;
//				
//			}
//			
////die('login/refresh_session: <br/><textarea>'.print_r($group_arr, true).'</textarea>');
//			$this->session->set_userdata('groups',$group_arr);
////die('login/refresh_session: <br/><textarea>'.print_r($this->session->userdata, true).'</textarea>');		
//	}
////////////////////////////////////////////////////////////////////////////////
//	function logout()
//	{
//		$this->session->unset_userdata('logged_in');
//		$this->session->sess_destroy();
////		$this->load->view('landing_page_v');
//		redirect('membership', 'refresh');
//		
//		
//	}
//    
//    
//}//end class


/* ************************************************************************** */
/* ************************************************************************** */
/* ************************************************************************** */
/* ************************************************************************** */
/* ************************************************************************** */


//class Entities extends Loggedin_Controller //CI_Controller 
//{
//
//	
//	private $entityid;
//	private $entity_name;
//	private $email;
//	private $phone;
//	private $timestamp;
//
//	
//	
//	
//	
//	
//	function __construct()
//	{
//	  parent::__construct();
//	  
//	  $this->load->model('entities_m');
//	  
//	}
//	
//	
//	
//	function create_entity($data)
//	{
//		return $this->entities_m->create_entity($data);
//	}
//	
//	
//	
//	function get_entity_data($entityid)
//	{
//		$entity = $this->entities_m->read_entity($entityid);
//		
//		$this->entityid = $entityid;
//		$this->entity_name = $entity->entity_name;
//		$this->email = $entity->email;
//		$this->phone = $entity->phone;
//		$this->timestamp = $entity->timestamp;
//		
//	}
//	
//	
//	
//	function update_entity($data)
//	{
//		return $this->entities_m->update_entity($data);
//	}
//	
//}// end class


/* ************************************************************************** */
/* ************************************************************************** */
/* ************************************************************************** */
/* ************************************************************************** */
/* ************************************************************************** */

//class Resources extends Loggedin_Controller //CI_Controller 
//{
//
//	function __construct()
//	{
//	  parent::__construct();
//
//	  $this->load->helper('url');
//	  $this->load->model('resources_m');
////	  $this->load->model('membership_m');
////	  $this->load->library('session');
//	}
//
//	function index()
//	{
//	//   $this->load->view('partials/login_p');
//	//   $this->load->view('partials/create_user_p');
//		$this->load->view('landing_page_v');
//	}
//	
//////////////////////////////////////////////////////////////////////////////////
//    
//	function create_resource($data=NULL)
//	{
//		if($data == NULL && $this->input->post() )
//		{
//			$data = $this->input->post();
//
//		}
//
//		//create_resource returns resource_id or FALSE
//		return $this->resources_m->create_resource($data);	    
//		//redirect('membership/index', 'refresh');
//
//	}  
//	function create_address()
//	{
//		$data = $this->input->post();
//
//		$data['resource_id'] = $this->create_resource($data);
////die($this->debug_arr($data));	
//		$data['address_success'] = $this->resources_m->create_address($data);
//		
//		die($this->debug_arr($data));
//
//
//	}
//	
//////////////////////////////////////////////////////////////////////////////////
//	    function display_resource($resourceid)
//    {
//	   $data['rdata'] = $this->resources_m->get_resource_by_id($resourceid);
//	   
//	   $this->load->view('partials/display_resource_p', $data);
//    }
//	
//	function update_resource()
//	{
//		$data = $this->resources_m->update_resource($data);
//		redirect('membership/resources/display_resource', 'refresh');
//	}
//	
//}
/* End of file  */
/* Location: ./application/core/ */
