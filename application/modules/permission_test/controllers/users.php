<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('entities.php');

class Users extends Entities //CI_Controller 
{

	
	private $userid;
	private $user_name;
	private $password;
	private $first_name;
	private $last_name;
	private $phone;
	private $email;
	
	private $address_arr = array();
	
	private $groups = array();
	
	
	
	function __construct()
	{
	  parent::__construct();

	  $this->load->helper('url');
	  $this->load->model('users_m');
	  $this->load->model('permission_test_m');
	  $this->load->model('resources_m');
	  $this->load->model('groups_m');
	  $this->load->library('session');
	  
	  $this->load->library('login');
	}

	function index()
	{
	//   $this->load->view('partials/login_p');
	//   $this->load->view('partials/create_user_p');
		$this->load->view('landing_page_v');
	}
	
	
		////////////////////////////////////////////////////////////////////////////////
    
    function create_user()
    {
//die('you got to register()');
	    if($this->input->post() )
	    {
//die('create_user() called');
			$this->db->trans_start();
			
			$this->data = $this->input->post();
//				$this->permission_test_m->create_user($this->data);
				$this->users_m->create_user($this->data);
				$this->data['entityid'] = $this->db->insert_id();
				
//				$this->permission_test_m->create_address($this->data);
//				$this->data['addressid'] = $this->db->insert_id();
//				
//				$this->permission_test_m->create_address_entity($this->data);
//				$this->data['address_entity_id'] = $this->db->insert_id();
				
			$this->db->trans_complete();
			
			if ($this->db->trans_status() === FALSE)
			{
				echo '<h1> fail</h1>';
			} 
			else
			{
				echo '<h1> you\'re registered</h1>';
			}
		 		  
	    }
	    else 
	    {
		     $this->load->view('header_v');
			$this->load->view('partials/create_user_p');
	    }
    }
	
        function view_users()
    {
	    $this->data['users'] = $this->users_m->get_all_users();
	    
	    
    }
    
    
////////////////////////////////////////////////////////////////////////////////
    
    function display_user($userid)
    {
//	    echo 'view_user() not working yet';
	    $this->data['user'] = $this->users_m->get_user($userid);
	    $this->data['user_address'] = $this->permission_test_m->get_addresses($userid);
	    
//	    $this->load->view('partials/display_user_p', $data);
	    
    }
    
////////////////////////////////////////////////////////////////////////////////
	function do_login()
	{
		
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->login->do_login($username, $password);
	}
	function refresh_session()
	{
		$this->login->refresh_session();
	}
	function logout()
	{
		$this->login->logout();
	}
//	function do_login()
//	{
//		$username = $this->input->post('username');
//		$password = $this->input->post('password');
//		
//		$result = $this->users_m->login($username, $password);
//		
//		if( $result )
//		{
//			$session_array = array('userid' => $result['id'], 'username' => $result['user_name']);
//			
//			$this->session->set_userdata('logged_in', $session_array);
////die(var_dump($this->session->userdata['logged_in']));			
//////set up the groups session subarray		
//			$this->refresh_session();
////			$group_arr = array();
//////
////			foreach($this->groups_m->my_groups($result['id']) as $group)
////			{		
////				$resources = $this->resources_m->get_resources_by_groupid($group['group_id']);
////				$group['resources'] = $resources;
////				
////				$group_arr[$group['group_id']] = $group;
////				
////			}
////			$this->session->set_userdata('groups',$group_arr);
//			
//			 redirect('permission_test', 'refresh');
//		}
//		else
//		{
//			$data['message'] = 'Incorrect username or password';
//			$this->load->view('partials/login_p', $data);
//		}
//	}
// 
//	function refresh_session()
//	{
////		$this->session->set_userdata('groups', $this->groups_m->my_groups($result['userid']));
//		
//		
//		//set up the groups session subarray			
//			$group_arr = array();
////
//			foreach($this->groups_m->my_groups($this->session->userdata['logged_in']['userid']) as $group)
//			{		
//				$resources = $this->resources_m->get_resources_by_groupid($group['group_id']);
//				$group['resources'] = $resources;
//				
//				$group_arr[$group['group_id']] = $group;
//				
//			}
//			$this->session->set_userdata('groups',$group_arr);
//			
//	}
//////////////////////////////////////////////////////////////////////////////////
//	function logout()
//	{
//		$this->session->unset_userdata('logged_in');
//		$this->session->sess_destroy();
////		$this->load->view('landing_page_v');
//		redirect('permission_test', 'refresh');
//		
//		
//	}
	
	

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//	function get_user_data($userid)
//	{
//		$user_arr = $this->users_m->get_user($userid);
//	
//	$this->userid = $user_arr['id'];
//	$this->user_name = $user_arr['user_name'];
//	$this->password = $user_arr['password'];
//	$this->first_name = $user_arr['first_name'];
//	$this->last_name = $user_arr['last_name'];
//	$this->status = $user_arr['status'];
//	$this->phone = $user_arr['phone'];
//	$this->email = $user_arr['email'];
//	
//die('id:'.$this->userid.'<br/>
//	user_name: '.$this->user_name.'<br/>
//	password: '.$this->password.'<br/>
//		first_name: '.$this->first_name.'<br/>
//			last_name: '.$this->last_name.'<br/>
//				')	;
////	$this->address_arr = array();
//	}
	
	

	
}//end class

?>

