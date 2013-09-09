<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Users_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

 
 
	function login($email, $password)
	{
		$this->db->select('entity_id, user_name, password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query -> num_rows() == 1)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
	
	
 ////////////////////////////////////////////////////////////////////////////////
    function create_user($data)
    {
//	    echo '<h1 style="color:green">From the model</h1>';
//	    echo '<textarea>'.print_r($data, true).'</textarea>';
	    $this->db->set('entity_id', $data['entityid']);
//	    $this->db->set('user_name', $data['username']);
	    $this->db->set('password', $data['password']);
	    $this->db->set('first_name', $data['first_name']);
	    $this->db->set('last_name', $data['last_name']);
//	    $this->db->set('phone', $data['phone']);
//	    $this->db->set('status', $data['status']);
	    $this->db->set('email', $data['email']);
		$this->db->set('institution', $data['institution']);
		
	    $this->db->insert('users');
	    
	    if($this->db->affected_rows() >0)
		    return true;
	    else
		    return false;

    }

    function update($data)
    {
//	    echo '<h1 style="color:green">From the model</h1>';
//	    echo '<textarea>'.print_r($data, true).'</textarea>';
	    $this->db->where('entity_id', $data['entity_id']);
//	    $this->db->set('user_name', $data['username']);
//	    $this->db->set('password', $data['password']);
	    $this->db->set('first_name', $data['first_name']);
	    $this->db->set('last_name', $data['last_name']);
//	    $this->db->set('phone', $data['phone']);
//	    $this->db->set('status', $data['status']);
	    $this->db->set('email', $data['email']);
		$this->db->set('institution', $data['institution']);
	    
	    $this->db->update('users');
	    
	    if($this->db->affected_rows() >0)
		    return true;
	    else
		    return false;
	}
	
	function update_password($data)
	{
		$this->db->where('entity_id', $data['entityid'])
			->set('password', $data['password']);
		$this->db->update('users');
		
	    if($this->db->affected_rows() >0)
		    return true;
	    else
		    return false;		
	}
////////////////////////////////////////////////////////////////////////////////    
	function get_all_users()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}

////////////////////////////////////////////////////////////////////////////////
	function get_user($userid)
	{
		$this->load->model('entities_m');
		$e_data = $this->entities_m->read_entity($userid);
		
		$this->db->where('entity_id', $userid);
		$u_data = $this->db->get('users')->row_array();
		
		if(is_array($e_data) && is_array($u_data))
			$user_array=array_merge($e_data, $u_data);
		else $user_array = '';
		return $user_array;
	}
    
    
    
    
    
    
 ////////////////////////////////////////////////////////////////////////////////
//	function get_user($userid)
//	{
//		$this->db->where('id', $userid);
//		$user = $this->db->get('users');
//		
//		if($user->num_rows() > 0)
//		{
//			return $user->row_array();
//		}
//		else 
//			return false;
//		
//	}
 

	
	
	
	
	
	
}//end class
