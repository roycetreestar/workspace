
<?php
Class Groups_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

 
	////////////////////////////////////////////////////////////////////////////////  
    function create_group($data)
    {
//	   echo 'got to the model';
//die(print_r($data));
//	    $this->db->set('group_type', $data['group_type']);
	    $this->db->set('group_name', $data['group_name']);
	    $this->db->set('long_group_name', $data['long_group_name']);
	    $this->db->set('parent_group', $data['parent_group']);
	    $this->db->set('access', $data['access']);
	    $this->db->set('email', $data['email']);
	    $this->db->set('phone', $data['phone']);
   	    $this->db->set('additional_information', $data['additional_information']);
	    
	    $this->db->insert('groups');
	    
	    if($this->db->affected_rows() >0)
		    return true;
	    else
		    return false;
	    
	    
	    
    }
	
	
	function get_all_groups()
	{
		$query = $this->db->get('groups');
		
		return $query->result_array();
	}
	
////////////////////////////////////////////////////////////////////////////////
	function get_available_groups($userid)
	{
//// ?????
//		$this->db->join('entity_group', 'entity_group.group_id != groups.id');
//		$query = $this->db->get('groups');
		
		
		$this->db->select('*')->where('id NOT IN (SELECT group_id FROM entity_group WHERE entity_id = '.$userid.')');
		$query = $this->db->get('groups');
//		die(var_dump($query));
		return $query->result_array();
	}
	
////////////////////////////////////////////////////////////////////////////////
	function get_group_data($groupid)
	{
		$this->db->where('id', $groupid);
		$groupdata = $this->db->get('groups');
		
		if($groupdata)
			return $groupdata->row_array();
		else 
			return false;
	}
	
	
	
	
	
	////////////////////////////////////////////////////////////////////////////////
	function join_group($data)
	{
		$this->db->set('entity_id', $data['entityid']);
		$this->db->set('group_id', $data['groupid']);
		$this->db->set('permission', $data['permission']);
		$this->db->set('entity_type', $data['entity_type']);

		if( $this->in_group($data['entityid'], $data['groupid']) )
			$this->db->update('entity_group');
		else
			$this->db->insert('entity_group');
//die( $this->db->_error_message() );

		if($this->db->affected_rows() >0)
			return true;
		else
			return false;		
		
	}
	
	function remove_from_group($entity_id, $group_id)
	{
		$this->db->where('entity_id', $entity_id);
		$this->db->where('group_id', $group_id);
		
		$this->db->delete('entity_group');
		
		
		if($this->db->affected_rows() > 0)
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
	function in_group($entityid, $groupid)
	{
		$this->db->where('entity_id', $entityid);
		$this->db->where ('group_id', $groupid);
		$query = $this->db->get('entity_group');
		
		if($query->num_rows() > 0)
			return true;
		else 
			return false;
		
	}
	
/**
 * 
 * @param type $entityid
 * @return boolean
 */
	function my_groups($entityid)
	{
		$this->db->where ('entity_id', $entityid);
		$query=$this->db->get('entity_group');
		
//die('<textarea>'.print_r($query->result_array(), true).'</textarea>');
		if($query->num_rows() > 0)
			return $query->result_array();
		else 
			return false;
	}
	
	
	
//	function get_all_by_id($groupid)
//	{
//		$this->db->where('id', $groupid);
//		$query = $this->db->get(groups)->result_array();
//		
//		return $query;
//		
//	}
	
	
	
	
}//end class