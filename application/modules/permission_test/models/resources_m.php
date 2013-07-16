
<?php
Class Resources_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


    
    
    ///////////////////////////////////////////////////////////////////////////////
	
	function create_resource($data)
	{
		$this->db->set('group_id', $data['group_id']);
		//	    $this->db->set('permission', $data['permission']);
		$this->db->set('resource_name', $data['resource_name']);
		$this->db->set('resource_type', $data['resource_type']);
		if(isset($data['metadata']))
			$this->db->set('metadata', $data['metadata']);
	    
		$this->db->insert('resources');

		$data['resource_id'] = $this->db->insert_id();
		$this->create_resource_group($data);

		if($this->db->affected_rows() >0)
		//		    return true;
			return $data['resource_id'];
		else
			return false;	
	}
	
	
	
	
	function create_resource_group($data)
	{
		$this->db->set('resource_id', $data['resource_id']);
		$this->db->set('group_id', $data['group_id']);
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
    
//    	function get_addresses($resource_id)
//	{
//		$addresses = array();
//		
//		$this->db->where('resource_id', $resource_id);
//		 $resource = $this->db->get('resource_group')->result_array();
//		 
//		 if(count($resource) > 0)
//		 {
//			 foreach($resource as $r)
//			 {
//				 if($r['resource_type'] == 'address')
//				 {
//					$this->db->where('resource_id', $r['resource_id']);
//					$result = $this->db->get('addresses')->result_array();
//
//					$addresses[$result[0]['resource_id']] = $result;
//				 }
//					  
//			 }
//		 }
//		return $addresses;
//	}
//	
//	
//	function create_address($data)
//	{
//		$this->db->set('resource_id', $data['resource_id'])
//			   ->set('address_line_1', $data['address_line_1'])
//			   ->set('address_line_2', $data['address_line_2'])
//			   ->set('address_line_3', $data['address_line_3'])			   
//			   ->set('city', $data['city'])
//			   ->set('state', $data['state'])
//			   ->set('zipcode', $data['zipcode'])
//			   ->set('country', $data['country']);
//		$this->db->insert('addresses');
//		
//		if($this->db->affected_rows() >0)
//			return true;
//		else
//			return false;
//	}
//	
	
}//end class
?>

