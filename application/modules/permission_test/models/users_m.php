
<?php
Class Users_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

 
 
	function login($username, $password)
	{
		$this -> db -> select('id, user_name, password');
		$this -> db -> from('users');
		$this -> db -> where('user_name', $username);
		$this -> db -> where('password', $password);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
 

	function get_user($userid)
	{
		$this->db->where('id', $userid);
		$user = $this->db->get('users');
		
		if($user->num_rows() > 0)
		{
			return $user->row_array();
		}
		else 
			return false;
		
	}
 

	
	
	
	
	
	
}//end class
?>

