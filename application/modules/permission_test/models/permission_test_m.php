<?php
class Permission_test_m extends CI_Model
{
////////////////////////////////////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
	   $this->load->database();
    }
    
//////////////////////////////////////////////////////////////////////////////////
	
	
	
////////////////////////////////////////////////////////////////////////////////
//	function get_addresses($entityid)
//	{
//		$addresses = array();
//		
//		$this->db->where('entity_id', $entityid);
//		 $addr_entity = $this->db->get('address_entity')->result_array();
//		 
//		 if(count($addr_entity) > 0)
//		 {
//			 foreach($addr_entity as $a_e)
//			 {
//				 $this->db->where('id', $a_e['address_id']);
//				 $result = $this->db->get('addresses')->result_array();
//
//				 $addresses[$result[0]['id']] = $result;
//					  
//			 }
//		 }
//		return $addresses;
//	}
	

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