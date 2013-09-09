<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Resources_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


    
    
    ///////////////////////////////////////////////////////////////////////////////
	
	/** if resource_id exists, update it. otherwise create it in the db */
	function save_resource($data)
	{
		if($this->resource_exists($data['resource_id']))
			return $this->update_resource($data);
		else
			return $this->create_resource($data);
	}
	
	
	function create_resource($data)
	{
		$this->db->set('group_id', $data['group_id']);
		//	    $this->db->set('permission', $data['permission']);
		$this->db->set('resource_name', $data['resource_name']);
		$this->db->set('resource_type', $data['resource_type']);
		//~ if(isset($data['xml']))
		$this->db->set('xml', $data['xml']);
		$this->db->set('size', strlen($data['xml']));
		$this->db->set('hash', md5($data['xml']));
		$this->db->set('date_created', date('Y-m-d H:i:s'));
		
		$this->db->insert('resources');

		$data['resource_id'] = $this->db->insert_id();
		$this->create_resource_group($data);

		if($this->db->affected_rows() >0)
		//		    return true;
			return $data['resource_id'];
		else
			return false;	
	}
	
	
	function update_resource($data)
	{
		$this->db->where('id', $data['resource_id']);
		//~ $this->db->where('group_id', $data['group_id']);
		//	    $this->db->set('permission', $data['permission']);
		$this->db->set('resource_name', $data['resource_name']);
		$this->db->set('resource_type', $data['resource_type']);
		//~ if(isset($data['xml']))
			$this->db->set('xml', $data['xml']);
		$this->db->set('size', strlen($data['xml']));
		$this->db->set('hash', md5($data['xml']));
	    
		$result = $this->db->update('resources');


		//~ if($this->db->affected_rows() >0)
		if($result)
		//		    return true;
			return $data['resource_id'];
		else
			return false;	
			//~ die( 'error message: '.$this->db->_error_message() );
	}
	
	
	function delete($resource_id)
	{
			
		$this->db->or_where('id', $resource_id);
		$result = $this->db->delete('resources');
		
		return $result;
	}
	function delete_resource_group($resource_id)
	{
		$this->db->where('resource_id', $resource_id);
		$result = $this->db->delete('resource_group');
		return $result ;
	}
////////////////////////////////////////////////////////////////////////////////
/**
 * Creates a record in the resource_group link table
 */
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
//~ die('groupid:'.$groupid);
	    $this->db->where('group_id', $groupid);
	    $resourceids = $this->db->get('resource_group')->result_array();
//~ die('<pre>'.print_r($resourceids, true).'</pre>');	    
	    $group_resources = array();
	    
	    foreach($resourceids as $rid)
	    {
		    $group_resources[$rid['resource_id']] = $this->get_resource_by_id($rid['resource_id']);
//~ die('<pre>'.print_r($group_resources, true).'</pre>');
		    switch($group_resources[$rid['resource_id']]['resource_type'])
		    {
				case 'address':
					
					break;
				case 'cytometer':
					//~ $cytometer_xml = $this->db->where('resource_id', $rid['resource_id'])->get('cytometers')->row_array();
					$cytometer_xml = $this->db->where('id', $rid['resource_id'])->get('resources')->row_array();
					$group_resources[$rid['resource_id']]['xml'] = $cytometer_xml['xml'];
					break;
				case 'panel':
					
					break;
				case 'file':
					
					break;
				
			}
	    }
	    
	    //~ die('$group_resources:<textarea>'. print_r($group_resources, true).'</textarea>
			//~ $cytometer_xml:<textarea>'. print_r($cytometer_xml, true).'</textarea>
	    //~ ');
	    
	    return $group_resources;
	    
    }
    
    function get_resource_by_id($resourceid)
    {
	    $this->db->where('id', $resourceid);
	    $rdata = $this->db->get('resources')->row_array();
//~ die('resourceid:'.$resourceid.'<br/><pre>'.print_r($rdata, true).'</pre>');	    
	    if($rdata)
		    return $rdata;
	    else
		    return false;
	    
    }
    /** an alias function to get_resource_by_id() */
    function resource_exists($resourceid)
    {
		if($this->get_resource_by_id($resourceid))
			return true;
		else 
			return false;
	}

	function get_name($resource_id)
	{
		$r = $this->db->where('id', $resource_id)->get('resources')->row_array();
		
		return $r['resource_name'];
	}

}//end class
