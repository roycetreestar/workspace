<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login 
{

	private $CI;
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('users_m');
		$this->CI->load->model('groups_m');
		$this->CI->load->model('resources_m');
	}
	
	
	
	
	function do_login($username, $password)
	{
//		$username = $this->input->post('username');
//		$password = $this->input->post('password');
		
		$result = $this->CI->users_m->login($username, $password);
		
		if( $result )
		{
			$session_array = array('userid' => $result['id'], 'username' => $result['user_name']);
			
			$this->CI->session->set_userdata('logged_in', $session_array);
//die(var_dump($this->session->userdata['logged_in']));			
////set up the groups session subarray		
			$this->refresh_session();
//			$group_arr = array();
////
//			foreach($this->groups_m->my_groups($result['id']) as $group)
//			{		
//				$resources = $this->resources_m->get_resources_by_groupid($group['group_id']);
//				$group['resources'] = $resources;
//				
//				$group_arr[$group['group_id']] = $group;
//				
//			}
//			$this->session->set_userdata('groups',$group_arr);
			
			 redirect('permission_test', 'refresh');
		}
		else
		{
			$data['message'] = 'Incorrect username or password';
			$this->load->view('partials/login_p', $data);
		}
	}
 
	function refresh_session()
	{
//		$this->session->set_userdata('groups', $this->groups_m->my_groups($result['userid']));
		if(!isset($this->CI->session->userdata['logged_in']))
		{
			redirect('permission_test/users');
		}
		//set up the groups session subarray			
			$group_arr = array();
//
		if($this->CI->groups_m->my_groups($this->CI->session->userdata['logged_in']['userid']))
			foreach($this->CI->groups_m->my_groups($this->CI->session->userdata['logged_in']['userid']) as $group)
			{		
				$resources = $this->CI->resources_m->get_resources_by_groupid($group['group_id']);
				$group['resources'] = $resources;
				
				$group_arr[$group['group_id']] = $group;
				
			}
			
//die('login/refresh_session: <br/>'.print_r($group_arr, true));
			$this->CI->session->set_userdata('groups',$group_arr);
			
	}
////////////////////////////////////////////////////////////////////////////////
	function logout()
	{
		$this->CI->session->unset_userdata('logged_in');
		$this->CI->session->sess_destroy();
//		$this->load->view('landing_page_v');
		redirect('permission_test', 'refresh');
		
		
	}
    
    
    
    
    
    
    
    
    
}/* End of file Someclass.php */