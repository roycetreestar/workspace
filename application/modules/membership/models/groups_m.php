<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Groups_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

 
////////////////////////////////////////////////////////////////////////////////  
/**
 * INSERTs a new group in the groups table.
 * Must be called after the new group is inserted as an entity and use the 
 * same entity_id as assigned by the entities table's auto-increment.
 * 
 * returns boolean
 * 
 */
    function create_group($data)
    {
//	   echo 'got to the model';
//~ die('$data:'.$data.'<br/>or:<br/><textarea>'.print_r($data, true).'</textarea>');
	    $this->db->set('entity_id', $data['entity_id']);
	    $this->db->set('group_type', $data['group_type']);
	    $this->db->set('group_name', $data['group_name']);
	    $this->db->set('long_group_name', $data['long_group_name']);
	    //~ $this->db->set('parent_group', $data['parent_group']);
	    $this->db->set('access', $data['access']);
	    $this->db->set('email', $data['email']);
	    if(isset($data['phone']))
			$this->db->set('phone', $data['phone']);
   	    $this->db->set('additional_information', $data['additional_information']);
	    
	    $this->db->insert('groups');
	    
	    if($this->db->affected_rows() >0)
		    return true;
	    else
		    return false;
	    
	    
	    
    }
	
////////////////////////////////////////////////////////////////////////////////
	function update($data)
	{
//	   echo 'got to the model';
//die(print_r($data));
	    $this->db->where('entity_id', $data['entity_id']);
	    $this->db->set('group_type', $data['group_type']);
	    $this->db->set('group_name', $data['group_name']);
	    $this->db->set('long_group_name', $data['long_group_name']);
	    //~ $this->db->set('parent_group', $data['parent_group']);
	    $this->db->set('access', $data['access']);
	    $this->db->set('email', $data['email']);
	    $this->db->set('phone', $data['phone']);
   	    $this->db->set('additional_information', $data['additional_information']);
	    
	    $this->db->update('groups');
	    
	    if($this->db->affected_rows() >0)
		    return true;
	    else
		    return false;
	    
		
	}
	
////////////////////////////////////////////////////////////////////////////////
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
		
		
		$this->db->where('entity_id NOT IN (SELECT group_id FROM entity_group WHERE entity_id = '.$userid.') AND access=1');
		$query = $this->db->get('groups');
//		die('<textarea>'.print_r($query, true).'</textarea>');
		return $query->result_array();
	}
	
////////////////////////////////////////////////////////////////////////////////
	function get_group_data($groupid)
	{
		$this->load->model('entities_m');
		$e_data = $this->entities_m->read_entity($groupid);
		
		$this->db->where('entity_id', $groupid);
		$g_data = $this->db->get('groups')->row_array();
//~ echo 'groups_m.php/get_group_data() debug:<br/>$e_data:<textarea>'.print_r($e_data, true).'</textarea><br/>$g_data:<textarea>'.print_r($g_data, true).'</textarea><hr/>';		
		if(is_array($e_data) && is_array($g_data))
			$groupdata = array_merge($e_data, $g_data);
		else $groupdata = '';

			return $groupdata;
	}
	

////////////////////////////////////////////////////////////////////////////////
	function join_group($data)
	{
//die('groups_m->join_group() $data:'.var_dump($data));
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
	
////////////////////////////////////////////////////////////////////////////////
	function current_members($group_id)
	{
		$this->db->where('group_id', $group_id);
		$this->db->where('status', 1);
		$result = $this->db->get('entity_group')->result_array();
		
		return $result;
	}
////////////////////////////////////////////////////////////////////////////////
/**
 *  returns an array of pending members for $group_id
 */
	function pending_members($group_id)
	{
		$this->db->where('group_id', $group_id);
		$this->db->where('status', 0);
		$result = $this->db->get('entity_group')->result_array();
		
		return $result;
	}
////////////////////////////////////////////////////////////////////////////////
	/**
	 * private groups have a pending status. New members to private groups
	 * must be accepted by a manager of that group before gaining access.
	 * This function sets the status of $userid to 1 (accepted) for $groupid 
	 * in the entity_group table.
	 */
	function accept_member($groupid, $userid)
	{
		$this->db->where('entity_id', $userid)
			->where('group_id', $groupid)
			->set('status' , 1);
		$result = $this->db->update('entity_group');
		
		return $result;
	}
////////////////////////////////////////////////////////////////////////////////
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
	
	
////////////////////////////////////////////////////////////////////////////////
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
	
////////////////////////////////////////////////////////////////////////////////
/**
 * 
 * @param type $entityid
 * @return boolean
 */
	function my_groups($entityid)
	{
		$returnable = array();
		
		$this->db->where ('entity_id', $entityid);
		$query1 = $this->db->get('entity_group')->result_array();		
		$gid; //groupid var for the loop
		$gd;	//group data var for the loop
		foreach($query1 as $q)
		{
			$gid = $q['group_id'];
			$returnable[$gid] = $q;
			
			$gd = $this->get_group_data($gid);

			$returnable[$gid] = array_merge( $returnable[$gid], $gd );
			
		}
		
		if(count($returnable) > 0)
			return $returnable;
		else 
			return false;
	}
	
////////////////////////////////////////////////////////////////////////////////
	
	function my_groups_recursive($entityid, $returnable = array())
	{
//echo 'got to my_groups_recursive()<br/>';
//			$returnable = array();
		
		$this->db->where ('entity_id', $entityid);
		$query1 = $this->db->get('entity_group')->result_array();		
		$gid; //groupid var for the loop
		$gd;	//group data var for the loop
		foreach($query1 as $q)
		{
			$gid = $q['group_id'];
			if(!array_key_exists($gid, $returnable))
			$returnable[$gid] = $q;
			
			$gd = $this->get_group_data($gid);
//~ die('var_dump($gd):'.var_dump($gd));
			$returnable[$gid] = array_merge( $returnable[$gid], $gd );
//echo 'sending back in gid:'.$gid.'<br/><textarea>'.print_r($returnable, true).'</textarea><hr/>';		
			
				$returnable = $this->my_groups_recursive($gid, $returnable);
		}
//die('$returnable: <br/><textarea>'.print_r($returnable, true).'</textarea>');	
		if(count($returnable) > 0)
			return $returnable;
		else 
			return false;
	}
	
////////////////////////////////////////////////////////////////////////////////	
	
//	function get_all_by_id($groupid)
//	{
//		$this->db->where('id', $groupid);
//		$query = $this->db->get(groups)->result_array();
//		
//		return $query;
//		
//	}
	
	
	
	
}//end class
