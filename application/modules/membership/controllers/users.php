<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// to extend another controller, you first need to require its file
require_once('entities.php');

class Users extends Entities //CI_Controller 
{

	
	public $userid;
	//~ private $user_name;
	private $password;
	private $first_name;
	private $last_name;
	private $phone;
	private $email;
	
	private $address_arr = array();
	
	private $groups = array();
	
//set $reset_pw_email_path to the place that will send a "reset my password" email to the user
	private $reset_pw_email_path = '';
	
	
	
////////////////////////////////////////////////////////////////////////
	function __construct()
	{
	  parent::__construct();

	  $this->load->helper('url');
	  $this->load->model('users_m');
	  $this->load->model('membership_m');
	  $this->load->model('resources_m');
	  $this->load->model('groups_m');
	  
	  $this->load->database();

	}

////////////////////////////////////////////////////////////////////////
	function index()
	{
		if($this->session->userdata('logged_in'))
die('membership/users/index() would now be going for the get_session() function<hr/>');
			//~ $this->get_session();
		else
die('membership/users/index() would now be redirecting to backstage');
			redirect('backstage');
		//~ redirect('backstage');
	}
	
function set_groups()
{
	
}	
function get_groups()
{
	return $this->groups;
}
////////////////////////////////////////////////////////////////////////
    
    function save($data = NULL) 
    {
	//first, make sure $data contains any parameters or $_POST values
	    if($data === NULL  )
	    {
		    $data = $this->input->post();
	    }
	    //if($data === NULL  )
	    //{
		    //$data = $_POST;
	    //}
//die("membership/users/save()<br/>DATA: <textarea>".print_r($data, true)."</textarea>");
	// if it's an edit of a current user, update that user's entries in users table and entities table 	    
	    if(isset($data['entity_id']) && $data['entity_id'] != '')
	    {
			$data['entity_name'] = $data['first_name'].' '.$data['last_name'];
		//try to update the entities table and the users table	
			$this->db->trans_start();
				$e_update = $this->entities_m->update_entity($data);
				$u_update = $this->users_m->update($data);	
if(isset($data['password1']))
				$pw_update = $this->update_password($data);	
else $pw_update = 'No PW Update Needed';
			$this->db->trans_complete();
//die('users/save() <br/>$u_update message: '.$u_update.'<br/>$e_update: '.$e_update);	

						if($e_update && $u_update) 
						{	echo ' Update Successful ';	}
						else
						{	echo 'Update Failed';			
						} 
		}
	//if it's a new user (no userid passed in), create a new user (in entities table and users table) and their personal resources group
	    else
	    {
				$this->data = $this->input->post();
		// make sure the user isn't re-registering
			if($this->users_m->email_exists($data['email']) )
			{
				echo 'This email address is already in use<br/><a href="'.$this->reset_pw_email_path.'">Click here to reset your password</a>.';
			}
			else
			{	
			//insert the new user into each table within a single transaction so if any one INSERT fails, they all revert 
				$this->db->trans_start();				

				//create the user entity
					$this->data['entity_name'] = $this->data['first_name'].' '.$this->data['last_name']; //$this->data['username'];
					$this->create_entity($this->data);
					$this->data['entityid'] = $this->db->insert_id();
					
				//create the user
					$this->users_m->create_user($this->data);
					
				//create default personal-resources group
				//create the group entity
					//$this->data['entity_name'] = $this->data['entity_name'].'\'s personal resources';
					$this->data['entity_name'] = 'My Fluorish';
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
				
								
				//create the user preferences entries in inventory_show_fields table	
					$this->load->module('inventory');
					$this->inventory->create_show_fields($this->data['entityid']);
					
					
				$this->db->trans_complete();
			
				if (!$this->db->trans_status())
				{
					echo 'You have failed to register.';
				} 
				else
				{
					echo 'You have registered, please login.';
				}
			}//end else - new user inserts


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
	    
	    return $this->load->view('partials/display_user_p', $data, true);
	    
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
	function create()
	{
		return $this->edit();
	}
	function edit($userid = '')
	{
		$mem_module = $this->load->module('membership/membership');		//for grabbing the institution dropdown
		
		$data = $this->users_m->get_user($userid);
		$data['institution_dd'] = $mem_module->institution_dropdown();		
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
	function my_account($userid = '' )
	{
		$mem_module = $this->load->module('membership');
		$data = $this->users_m->get_user($userid);
		$data['institution_dd'] = $mem_module->institution_dropdown();
		$data['institution_arr'] = $mem_module->institution_arr();
//die("membership/users/my_account()<br/><textarea>".print_r($data, true)."</textarea>");		
		return $this->load->view('partials/form_my_account_p', $data, true);
	}

////////////////////////////////////////////////////////////////////////

	function login_form($success_path='', $fail_path='')
	{
		$data['success_path'] = $success_path;
		$data['fail_path'] = $fail_path;
		return $this->load->view('partials/login_p', $data , true);
	}

	function update_password($data)
	{
		if(isset($data['old_password']) && isset($data['password1']) && isset($data['password2'])
			&& $data['old_password']!= '' && $data['password1']!= '' && $data['password2']!= '' 
			&& $data['password1']===$data['password2'])
		{
			$result = $this->users_m->update_password($data);
			if($result)
				return true;
		}
		return false;
	}
////////////////////////////////////////////////////////////////////////
}//end class
