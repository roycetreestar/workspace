<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// to extend another controller, you first need to require its file
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
	  $this->load->model('membership_m');
	  $this->load->model('resources_m');
	  $this->load->model('groups_m');
//	  $this->load->library('session');
	  
//	  $this->load->library('login');
	  
		if($this->session->userdata('logged_in'))
			$this->get_session();
		else
			redirect('fluorish_driver');
	}

////////////////////////////////////////////////////////////////////////
	function index()
	{
	//   $this->load->view('partials/login_p');
	//   $this->load->view('partials/create_user_p');
		//~ $this->load->view('landing_page_v');
		redirect('fluorish_driver');
	}
	
	
////////////////////////////////////////////////////////////////////////
    
    function create_user()
    {
//die('you got to register()');
	    if($this->input->post() )
	    {
//die('create_user() called');
			$this->db->trans_start();
			
			$this->data = $this->input->post();
//die('users->create_user():<br/><textarea>'.print_r($this->data, true).'</textarea>');
		//create the user entity
			$this->data['entity_name'] = $this->data['username'];
			$this->create_entity($this->data);
			$this->data['entityid'] = $this->db->insert_id();
			
		//create the user
			$this->users_m->create_user($this->data);
			
				

		//create default personal-resources group
		//create the group entity
			$this->data['entity_name'] = $this->data['entity_name'].'\'s personal resources';
			$this->create_entity($this->data);
			$this->data['entity_id'] = $this->db->insert_id();
			
		//create the group
			$this->data['group_name'] = $this->data['entity_name']; //.'\'s personal resources';
			$this->data['long_group_name'] = 'your private / shared personal resources';
			$this->data['parent_group'] = '';
			$this->data['access'] = 0;
			$this->data['additional_information'] = $this->data['username'].'\'s personal resources group';			
			$this->groups_m->create_group($this->data);	
		
		//create entity_group record of personal-resources group	
			$this->data['groupid'] = $this->data['entity_id'];		//$this->db->insert_id();
			
			$this->data['permission'] = 1;
			$this->data['entity_type'] = 1;
			$this->groups_m->join_group($this->data);
				
			$this->db->trans_complete();
//die('users->create_user()<br/><textarea>'.print_r($this->data, true).'</textarea>');		
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
	
////////////////////////////////////////////////////////////////////////
        function view_users()
    {
	    $this->data['users'] = $this->users_m->get_all_users();
	    
	    
    }
    
    
////////////////////////////////////////////////////////////////////////////////
    
    function display_user($userid)
    {
//	    echo 'view_user() not working yet';
	    $this->data['user'] = $this->users_m->get_user($userid);
//	    $this->data['user_address'] = $this->membership_m->get_addresses($userid);
	    
//	    $this->load->view('partials/display_user_p', $data);
	    
    }
    
////////////////////////////////////////////////////////////////////////
    function profile($userid)
    {
	    $data['user'] = $this->users_m->get_user($userid);
//die('users/profile: <br/><textarea>'.print_r($this->session->all_userdata(), true).'</textarea>');		
	    
	    $this->load->view('header_v');
	    $this->load->view('profile_user_v', $data);
    }
    


	
}//end class

?>

