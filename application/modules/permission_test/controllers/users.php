
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
{

	
	private $userid;
	private $user_name;
	private $password;
	private $first_name;
	private $last_name;
	private $phone;
	private $email;
	private $address_arr = array();
	
	
	
	
	
	function __construct()
	{
	  parent::__construct();

	  $this->load->helper('url');
	  $this->load->model('users_m');
	  $this->load->model('permission_test_m');
	  $this->load->model('resources_m');
	  $this->load->library('session');
	}

	function index()
	{
	//   $this->load->view('partials/login_p');
	//   $this->load->view('partials/create_user_p');
		$this->load->view('landing_page_v');
	}
////////////////////////////////////////////////////////////////////////////////
	
	function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$result = $this->users_m->login($username, $password);
		
		if( $result )
		{
			$session_array = array('userid' => $result['id'], 'username' => $result['user_name']);
			
			$this->session->set_userdata('logged_in', $session_array);
			
//set up the groups session subarray			
			$group_arr = array();
//
			foreach($this->permission_test_m->my_groups($result['id']) as $group)
			{
//die('$group:<textarea>'.print_r($group, true).'</textarea>');			
				$resources = $this->resources_m->get_resources_by_groupid($group['group_id']);
				$group['resources'] = $resources;
				
				$group_arr[$group['group_id']] = $group;

			
//set up resources for the groups session subarray
				
				
			}
			$this->session->set_userdata('groups',$group_arr);
			
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
		$this->session->set_userdata('groups', $this->permission_test_m->my_groups($result['userid']));
	}
////////////////////////////////////////////////////////////////////////////////
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
//		$this->load->view('landing_page_v');
		redirect('permission_test', 'refresh');
		
		
	}
	
	
	
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

