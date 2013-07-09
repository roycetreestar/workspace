
<?php
Class Resources_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

 
 
//    function create_resource($data)
//    {
//	    $this->db->set('group_id', $data['group_id']);
//	    $this->db->set('permission', $data['permission']);
//	    $this->db->set('resource_name', $data['resource_name']);
//	    $this->db->set('resource_type', $data['resource_type']);
//	    $this->db->set('metadata', $data['metadata']);
//	    
//	    $this->db->insert('resources');
//	    if($this->db->affected_rows() >0)
//		    return true;
//	    else
//		    return false;
//    } 
//    function create_resource_group($data)
//    {
//	    $this->db->set('group_id', $data['group_id']);
//	    $this->db->set('resource_id', $data['resource_id']);
//	    $this->db->set('resource_type', $data['resource_type']);
//	    
//	    $this->db->insert('resource_group');
//	    
//	    if($this->db->affected_rows() >0)
//		    return true;
//	    else
//		    return false;
//    }
// 
    
    
    ///////////////////////////////////////////////////////////////////////////////
	
	function create_resource($data)
	{
	    $this->db->set('group_id', $data['groupid']);
//	    $this->db->set('permission', $data['permission']);
	    $this->db->set('resource_name', $data['resource_name']);
   	    $this->db->set('resource_type', $data['resource_type']);
	    $this->db->set('metadata', $data['metadata']);
	    
	    $this->db->insert('resources');
	    
	    $data['resourceid'] = $this->db->insert_id();
	    $this->create_resource_group($data);
	    
	    if($this->db->affected_rows() >0)
		    return true;
	    else
		    return false;	
	}
	
	function create_resource_group($data)
	{
		$this->db->set('resource_id', $data['resourceid']);
		$this->db->set('group_id', $data['groupid']);
		$this->db->set('resource_type', $data['resource_type']);
		
		$this->db->insert('resource_group');
		
		if($this->db->affected_rows() >0)
			return true;
		else
			return false;
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
////////////////////////////////////////////////////////////////////////////////
    
    function get_resources_by_groupid($groupid)
    {
//die('groupid:'.$groupid);
	    $this->db->where('group_id', $groupid);
	    $resourceids = $this->db->get('resource_group')->result_array();
//die(print_r($resourceids));	    
	    $group_resources = array();
	    
	    foreach($resourceids as $rid)
	    {
		    $group_resources[$rid['resource_id']] = $this->get_resource_by_id($rid['resource_id']);
	    }
	    
//	    die('$group_resources:<textarea>'. $group_resources.'</textarea>');
	    
	    return $group_resources;
	    
    }
    
    function get_resource_by_id($resourceid)
    {
	    $this->db->where('id', $resourceid);
	    $rdata = $this->db->get('resources')->row_array();
	    
	    if($rdata)
		    return $rdata;
	    else
		    return false;
	    
    }
    
    
}
?>

