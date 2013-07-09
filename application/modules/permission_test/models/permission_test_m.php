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
//    function create_user($data)
//    {
////	    echo '<h1 style="color:green">From the model</h1>';
////	    echo '<textarea>'.print_r($data, true).'</textarea>';
//	    
//	    $this->db->set('user_name', $data['username']);
//	    $this->db->set('password', $data['password']);
//	    $this->db->set('first_name', $data['first_name']);
//	    $this->db->set('last_name', $data['last_name']);
//	    $this->db->set('phone', $data['phone']);
////	    $this->db->set('status', $data['status']);
//	    $this->db->set('email', $data['email']);
//	    
//	    $this->db->insert('users');
//	    
//	    if($this->db->affected_rows() >0)
//		    return true;
//	    else
//		    return false;
//
//    }
    
//////////////////////////////////////////////////////////////////////////////////  
//    function create_group($data)
//    {
////	   echo 'got to the model';
////die(print_r($data));
////	    $this->db->set('group_type', $data['group_type']);
//	    $this->db->set('group_name', $data['group_name']);
//	    $this->db->set('long_group_name', $data['long_group_name']);
//	    $this->db->set('parent_group', $data['parent_group']);
//	    $this->db->set('access', $data['access']);
//	    $this->db->set('email', $data['email']);
//	    $this->db->set('phone', $data['phone']);
//   	    $this->db->set('additional_information', $data['additional_information']);
//	    
//	    $this->db->insert('groups');
//	    
//	    if($this->db->affected_rows() >0)
//		    return true;
//	    else
//		    return false;
//	    
//	    
//	    
//    }
//////////////////////////////////////////////////////////////////////////////////    
//	function get_all_users()
//	{
//		$query = $this->db->get('users');
//		return $query->result_array();
//	}
//
//////////////////////////////////////////////////////////////////////////////////
//	function get_user($userid)
//	{
//		$this->db->where('id', $userid);
//		$query = $this->db->get('users');
//		
//		return $query->result_array();
//	}
    
//	function get_all_groups()
//	{
//		$query = $this->db->get('groups');
//		
//		return $query->result_array();
//	}
//	
//	function get_available_groups()
//	{
//// ?????
//		$this->db->join('entity_group', 'entity_group.group_id = groups.id');
//		$query = $this->db->get('groups');
//	}
//	
//////////////////////////////////////////////////////////////////////////////////
//	function get_group_data($groupid)
//	{
//		$this->db->where('id', $groupid);
//		$groupdata = $this->db->get('groups');
//		
//		if($groupdata)
//			return $groupdata->row_array();
//		else 
//			return false;
//	}
	
	
	
////////////////////////////////////////////////////////////////////////////////
	function get_addresses($entityid)
	{
		$addresses = array();
		
		$this->db->where('entity_id', $entityid);
		 $addr_entity = $this->db->get('address_entity')->result_array();
		 
		 if(count($addr_entity) > 0)
		 {
			 foreach($addr_entity as $a_e)
			 {
				 $this->db->where('id', $a_e['address_id']);
				 $result = $this->db->get('addresses')->result_array();

				 $addresses[$result[0]['id']] = $result;
					  
			 }
		 }
		return $addresses;
	}
	
	
//////////////////////////////////////////////////////////////////////////////////
//	function join_group($data)
//	{
//		$this->db->set('entity_id', $data['entityid']);
//		$this->db->set('group_id', $data['groupid']);
//		$this->db->set('permission', $data['permission']);
//		$this->db->set('entity_type', $data['entity_type']);
//
//		if( $this->in_group($data['entityid'], $data['groupid']) )
//			$this->db->update('entity_group');
//		else
//			$this->db->insert('entity_group');
////die( $this->db->_error_message() );
//
//		if($this->db->affected_rows() >0)
//			return true;
//		else
//			return false;		
//		
//	}
//	
////////////////////////////////////////////////////////////////////////////////////
////	
////	function create_resource($data)
////	{
//////die('got to permission_test_m->create_resource()<br/>$data:<textarea>'.print_r($data, true).'</textarea>');
//////	    $this->db->set('resourceid', $data['resourceid']);
////	    $this->db->set('group_id', $data['groupid']);
////	    $this->db->set('permission', $data['permission']);
////	    $this->db->set('resource_name', $data['resource_name']);
////   	    $this->db->set('resource_type', $data['resource_type']);
////	    $this->db->set('metadata', $data['metadata']);
////	    
////	    $this->db->insert('resources');
////	    
////	    $data['resourceid'] = $this->db->insert_id();
////	    $this->create_resource_group($data);
////	    
////	    
//////die('$data:'.print_r($data, true));
////	    if($this->db->affected_rows() >0)
////		    return true;
////	    else
////		    return false;	
////	}
////	
////	function create_resource_group($data)
////	{
////		$this->db->set('resource_id', $data['resourceid']);
////		$this->db->set('group_id', $data['groupid']);
////		$this->db->set('resource_type', $data['resource_type']);
////		
////		$this->db->insert('resource_group');
////		
////		if($this->db->affected_rows() >0)
////			return true;
////		else
////			return false;
////	}
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
	
	
	
	
	
	
	
	
	
/**
 * Is there an entry in entity_group table for $entityid matched to $groupid?
 * 
 * @param type $entityid
 * @param type $groupid
 * @return boolean
 */	
//	function in_group($entityid, $groupid)
//	{
//		$this->db->where('entity_id', $entityid);
//		$this->db->where ('group_id', $groupid);
//		$query = $this->db->get('entity_group');
//		
//		if($query->num_rows() > 0)
//			return true;
//		else 
//			return false;
//		
//	}
	
//	function my_groups($entityid)
//	{
//		$this->db->where ('entity_id', $entityid);
//		$query=$this->db->get('entity_group');
//		
//
//		if($query->num_rows() > 0)
//			return $query->result_array();
//		else 
//			return false;
//	}
}//end class