<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// to extend another controller, you first need to require its file
require_once('entities.php');

class Users extends Entities //CI_Controller 
{

	
	private $userid;
	//~ private $user_name;
	private $password;
	private $first_name;
	private $last_name;
	private $phone;
	private $email;
	
	private $address_arr = array();
	
	private $groups = array();
	
	
	
////////////////////////////////////////////////////////////////////////
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
	  
		//~ if($this->session->userdata('logged_in'))
			//~ $this->get_session();
		//~ else
			//~ redirect('backstage');
	}

////////////////////////////////////////////////////////////////////////
	function index()
	{
	//   $this->load->view('partials/login_p');
	//   $this->load->view('partials/create_user_p');
		//~ $this->load->view('landing_page_v');
		
		if($this->session->userdata('logged_in'))
			$this->get_session();
		else
			redirect('backstage');
		//~ redirect('backstage');
	}
	
	
////////////////////////////////////////////////////////////////////////
    
    function save($data = NULL)
    {
	//first, make sure $data contains any parameters or $_POST values
	    if($data == NULL  )
	    {
		    $data = $this->input->post();
	    }
	// if it's an edit of a current user, update that user's entries in users table and entities table 	    
	    if(isset($data['id']) && $data['id'] != '')
	    {
			$data['entity_name'] = $data['first_name'].' '.$data['last_name'];
		//try to update the entities table and the users table	
			$this->db->trans_start();
				$e_update = $this->entities_m->update_entity($data);
				$u_update = $this->users_m->update($data);		
			$this->db->trans_complete();
			
			if($e_update && $u_update)
			{	echo '<h1> Update Successful </h1>';	}
			else
			{	echo '<h1 style="color:red;"> Update Failed</h1>';			} 
		}
	//if it's a new user (no userid passed in), create a new user (in entities table and users table) and their personal resources group
	    else
	    {
		//insert the new user into each table within a single transaction so if any one INSERT fails, they all revert 
			$this->db->trans_start();
			
				$this->data = $this->input->post();

			//create the user entity
				$this->data['entity_name'] = $this->data['first_name'].' '.$this->data['last_name']; //$this->data['username'];
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
				$this->data['group_type'] = 3;								 //the personal resources group_type is 3
				$this->data['parent_group'] = '';
				$this->data['access'] = 0;
				$this->data['additional_information'] =$this->data['entity_name'].'\'s personal resources group';		
				$this->groups_m->create_group($this->data);	
			
			//create entity_group record of personal-resources group	
				$this->data['groupid'] = $this->data['entity_id'];		//$this->db->insert_id();
				
				$this->data['permission'] = 1;
				$this->data['entity_type'] = 1;
				$this->groups_m->join_group($this->data);
				
			$this->db->trans_complete();
		
			if (!$this->db->trans_status())
			{
				echo '<h1> fail</h1>';
			} 
			else
			{
				echo '<h1> you\'re registered</h1>';
			}
		 		  
	    }
	    //~ else 
	    //~ {
		    //~ //~// $data = $user_id;
			//~ return $this->load->view('partials/form_user_p', '', true);
	    //~ }
    }
	
////////////////////////////////////////////////////////////////////////
        function view_users()
    {
	    $this->data['users'] = $this->users_m->get_all_users();
	    
	    
    }
    
    
////////////////////////////////////////////////////////////////////////////////
    
    function display($userid)
    {
//	    echo 'view_user() not working yet';
	    $data['user'] = $this->users_m->get_user($userid);
	     
//	    $this->data['user_address'] = $this->membership_m->get_addresses($userid);
	    
	    $this->load->view('partials/display_user_p', $data);
	    
    }
    
////////////////////////////////////////////////////////////////////////
    function profile($userid)
    {
	    $data['user'] = $this->users_m->get_user($userid);
//die('users/profile: <br/><textarea>'.print_r($this->session->all_userdata(), true).'</textarea>');		
	    
	    $this->load->view('header_v');
	    $this->load->view('profile_user_v', $data);
    }
    


////////////////////////////////////////////////////////////////////////
	function edit($userid = '')
	{
		
		$data = $this->users_m->get_user($userid);
		
//~ die('$data:<textarea>'.print_r($data, true).'</textarea>');
		
		return $this->load->view('partials/form_user_p', $data, true);
	}
	
////////////////////////////////////////////////////////////////////////
	function get_array($userid)
	{
		$user_arr = $this->users_m->get_user($userid);
//~ die('$user_arr:<textarea>'.print_r($user_arr, true).'</textarea>');
		return $user_arr;
	}
	
////////////////////////////////////////////////////////////////////////
	function get_xml($userid)
	{
		$user_arr = $this->users_m->get_user($userid);

//~ die('$user_arr:<textarea>'.print_r($user_arr, true).'</textarea>');
		
		$xml = '<?xml version="1.0" encoding="UTF-8"?>
	<User>
		<entity_id>'.$user_arr['entity_id'].'</entity_id>
		<user_name>'.$user_arr['user_name'].'</user_name>
		<password>'.$user_arr['password'].'</password>
		<first_name>'.$user_arr['first_name'].'</first_name>
		<last_name>'.$user_arr['last_name'].'</last_name>
		<phone>'.$user_arr['phone'].'</phone>
		<email>'.$user_arr['email'].'</email>
		<institution>'.$user_arr['institution'].'</institution>
		<date_joined>'.$user_arr['timestamp'].'</date_joined>
		<status>'.$user_arr['status'].'</status>
	</User>';
		
		return $xml;
	}
////////////////////////////////////////////////////////////////////////
}//end class

?>

