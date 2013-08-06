<?php

class Cores_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	$this->load->database();
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function create($data)
	{
		$this->db->set('corename', $data['corename']);
		$this->db->set('institutionID', $data['institutionID']);
		$this->db->set('access', $data['access']);
		$this->db->set('email', $data['email']);
		$this->db->set('phone', $data['phone']);
		$this->db->set('URL', $data['URL']);
		$this->db->set('address_line1', $data['address_line1']);
		$this->db->set('address_line2', $data['address_line2']);
		$this->db->set('city', $data['city']);
		$this->db->set('state', $data['state']);
		$this->db->set('zip', $data['zip']);
		$this->db->set('country', $data['country']);
		$this->db->set('additional_information', $data['additional_information']);
		$this->db->set('whitelist', $data['whitelist']);
		$this->db->set('whitelist_domains', $data['whitelist_domains']);
		$this->db->insert('cores');

		return $this->db->affected_rows();
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function read($coreid)
	{
		$this->db->where('coreid', $coreid);
		$query = $this->db->get('cores');

		return $query->row_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function readAll()
	{
		$query = $this->db->get('cores');

		return $query;
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function update($id, $data)
	{
		$this->db->where('coreid', $data['coreid']);
		$this->db->set('corename', $data['corename']);
		$this->db->set('institutionID', $data['institutionID']);
		$this->db->set('access', $data['access']);
		$this->db->set('email', $data['email']);
		$this->db->set('phone', $data['phone']);
		$this->db->set('URL', $data['URL']);
		$this->db->set('address_line1', $data['address_line1']);
		$this->db->set('address_line2', $data['address_line2']);
		$this->db->set('city', $data['city']);
		$this->db->set('state', $data['state']);
		$this->db->set('zip', $data['zip']);
		$this->db->set('country', $data['country']);
		$this->db->set('additional_information', $data['additional_information']);
		$this->db->set('whitelist', $data['whitelist']);
		$this->db->set('whitelist_domains', $data['whitelist_domains']);
		$this->db->update('cores');

		return $this->db->affected_rows();
	}

//////////////////////////////////////////////////////////////////////////////////////////
	
	function delete($id)
	{
		$this->db->where('coreid', $id);
		$this->db->delete('cores');

		return $this->db->affected_rows();
	}

	
	
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	
	function get_managed_cores($userid)
	{
		$cores_managed = array();
		//pull coreid from cores_model where userid = logged_in_userid
		$query = $this->db->query('SELECT * FROM core_user_link WHERE userid='.$userid.' AND manager=1');
		foreach ($query->result() as $row)
		{
			$q = $this->db->query('SELECT corename FROM cores WHERE coreid ="'. $row->coreid.'"');
			$r = $q->row();
	
			$cores_managed[] = array(
				'coreid'=>$row->coreid, 
				'corename'=>$r->corename, 
				'status'=>$row->status
			);
	
		}
		return $cores_managed;
	}
	
//////////////////////////////////////////////////////////////////////////////////////////
	
	function get_joined_cores($userid)
	{
		$cores_joined = array();
		//pull coreid from cores_model where userid = logged_in_userid
		$query = $this->db->query('SELECT * FROM core_user_link WHERE userid='.$userid.' AND manager=0');
		foreach ($query->result() as $row)
		{
			$q = $this->db->query('SELECT corename FROM cores WHERE coreid ="'. $row->coreid.'"');
			$r = $q->row();
	
			$cores_joined[] = array('coreid'=>$row->coreid, 'corename'=>$r->corename, 'status'=>$row->status);
	
		}
		return $cores_joined;
	}//end get_joined_cores()
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
	
	
	function get_available_cores($userid)
	{
		$cores_available = array();
	
		$institutionid = $this->ion_auth->user()->row()->institutionID;
	
		$query = $this->db->query('SELECT * FROM cores WHERE institutionID ='.$institutionid.' AND coreid NOT IN(
				SELECT coreid FROM core_user_link WHERE userid = "'.$userid.'")');
	
		foreach ($query->result() as $row)
		{
			$cores_available[] = array(
				'coreid'=>$row->coreid, 
				'corename'=>$row->corename, 
				'institutionID'=>$row->institutionID, 
				'access'=>$row->access, 
				'email'=>$row->email,
				'phone'=>$row->phone, 
				'URL'=>$row->URL, 
				'address_line1'=>$row->address_line1, 
				'address_line2'=>$row->address_line2, 
				'city'=>$row->city, 
				'state'=>$row->state, 
				'zip'=>$row->zip, 
				'country'=>$row->country, 
				'additional_information'=>$row->additional_information,
				'whitelist'=>$row->whitelist, 
				'whitelist_domains'=>$row->whitelist_domains );
		}
	
	
		return $cores_available;
	}//end get_available_cores()
	

//////////////////////////////////////////////////////////////////////////////////////////
	function get_user_cores($userid)
	{
		$user_cores = $this->get_joined_cores($userid);
		
		$managed = $this->get_managed_cores($userid);
		foreach($managed as $mgd)
			array_push($user_cores, $mgd);

		return $user_cores;		
	}
	
//////////////////////////////////////////////////////////////////////////////////////////

	function get_whitelist($coreid)
	{
		$query = $this->db->query('SELECT whitelist, whitelist_domains FROM cores WHERE coreid ='.$coreid  );
		return $query->row();
	}
	
	
//////////////////////////////////////////////////////////////////////////////////////////

/** $permitted is usually 1 (auto-accepted), but if private may be 0 to wait for acceptance */
	function add_to_core($userid, $coreid, $permitted = 1)		
	{
		//$this->db->db_debug = true;
		
		$data = array(
		   'coreid' => $coreid ,
		   'userid' => $userid ,
		   'status' => $permitted,
		   'manager' => 0
		);

		if($this->db->insert('core_user_link', $data))
		{
			return TRUE;
		}
		else
			return FALSE;

		// Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')
	}
	
	
//////////////////////////////////////////////////////////////////////////////////////////

	function remove_from_core($userid, $coreid)
	{
		if($this->db->where('coreid', $coreid)
			->where('userid', $userid)
			->delete('core_user_link'))
		{
			return TRUE;					//'successful deletion of user '.$userid.' from core '.$coreid;
		}
		else
			return FALSE;					//' deletion of user '.$userid.' from core '.$coreid.' FAILED';

		// Produces:
		// DELETE FROM mytable
		// WHERE id = $id
	}
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}//end class
