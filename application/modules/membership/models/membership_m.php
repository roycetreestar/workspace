<?php
class Membership_m extends CI_Model
{
////////////////////////////////////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
	   $this->load->database();
    }
    
//////////////////////////////////////////////////////////////////////////////////
	
	
////////////////////////////////////////////////////////////////////////////////
	function create_address($data)
	{
		$this->db->set('address_line_1', $data['address_line_1']);
		$this->db->set('address_line_2', $data['address_line_2']);
		$this->db->set('city', $data['city']);
		$this->db->set('state', $data['state']);
		$this->db->set('zipcode', $data['zipcode']);
		$this->db->set('country', $data['country']);
		
		$this->db->insert('addresses');

		if($this->db->affected_rows() >0)
			return true;
		else
			return false;
	}
	
	
////////////////////////////////////////////////////////////////////////////////
	
	function create_address_entity($data)
	{
		$this->db->set('address_id', $data['addressid']);
		$this->db->set('entity_id', $data['entityid']);
		
		$this->db->insert('address_entity');

		if($this->db->affected_rows() >0)
			return true;
		else
			return false;		
	}
	
	
	
	
	
	
	
	
	

}//end class