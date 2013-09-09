<?php
Class Cytometers_m extends Resources_m
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

/** 
 * create() runs an INSERT 
 * takes an array of cytometer details
 * 
 * successful: returns the insert_id (the resource_id of the new resource)
 * unsuccessful: returns FALSE
 * 
 */	
	function create($data)
	{
//~ die('cytometers_m/create($data)<br/>$data:<textarea>'.print_r($data, true).'</textarea>');
		$data['resource_type'] = 'cytometer';
		$data['resource_name'] = $data['resource_name'];
		if(isset($data['core_id']))
			$data['group_id'] = $data['core_id'];

		$this->db->trans_start();
			//~ $data['resource_id'] = parent::create_resource($data);
			$data['resource_id'] = parent::create_resource($data);

//	uncomment this to add 'save to cytometers table' functionality	//			
			//~ $this->db->set('resource_id', $data['resource_id'])
				//~ ->set('user_id', $data['user_id'])
				//~ ->set('manufacturer', $data['manufacturer'])
				//~ ->set('model', $data['model'])
				//~ ->set('xml', $data['xml'])
				//~ ->set('size', $data['size'])
				//~ ->set('name', $data['name'])
				//~ ->set('uploaded_file_name', $data['uploaded_file_name']);
			//~ $result = $this->db->insert('cytometers');
		$this->db->trans_complete();

//if accessed via the website, we want to reload the configurator form, 
// so we need to return the resource_id if successful 			
		if($result)
			return $data['resource_id'];//true;
		else return false;
		
	}
	
	
	function get_cytometer($resourceid)
	{
		$this->db->where('resource_id', $resourceid);
		$cytometer = $this->db->get('cytometers');
		
		return $cytometer;
			
	}
/**an alternative to get_cytometer(), 
 * but the name matches other resource types
 * and it grabs data from both the cytometers table and the resources table
 */
	function get_cytometer_by_id($resource_id)
	{
		$this->db->where('resource_id', $resource_id);
		$cdata = $this->db->get('cytometers')->row_array();
		
		$this->db->where('id', $resource_id);
	    $rdata = $this->db->get('resources')->row_array();
	    
	    $data = array_merge($rdata, $cdata);
		
		return $data;
	}
	
	function exists($resourceid)
	{
		$this->db->where('resource_id', $resourceid);
		$result = $this->db->get('cytometers')->result_array();
		if(count($result) >0 )
			return true;
		else 
			return false;
	}
	
	
	function read_defaults()
	{
		$result = $this->db->get('cytometers_default');
		
		if(count($result) >0 )
			return $result->result_array();
		else 
			return false;
	}
	
	
	
	
	
	
	
	
	
	
/** 
 * takes a $_POST array of cytometer details
 * 
 * checks if the unique row id is present in the $data array. 
 * 	if present, updates the row
 * 	if not present, inserts a new row
 * 
 * @param null $data
 * @return boolean
 */


	function push_to_db($data )
	{
// if $data['cytometerid'] is NOT empty, it's an edit of an existing
// config, so update that config
		if(!empty($data['resource_id']))
		{	
			if($data['coreid'] == '')
				$data['coreid'] = null;
			
			parent::update_resource($data);
			//~ $this->update($data);
			
			if($this->db->affected_rows() > 0)
				return true;
			else 
				return false;
		}
		else
		{	
			$result = parent::create_resource($data);
			//~ $result = $this->create($data);
			if($result)
			{	return $result;
				//~ return true;
			}
			else
			{	return '<h1 style="color:red;">config creation failed</h1>'.$this->db->_error_message().'<br/><pre>'.print_r($data, true).'</pre>' ;
				//~ return $this->db->_error_message();
			}
		}
	}//end function
	
	
	function update($data)
	{	
		
		$this->db->where('resource_id', $data['cytometerid']);
		$this->db->set('user_id', $data['user_id'])
			->set('core_id', $data['coreid'])
			->set('manufacturer', $data['manufacturer'])
			->set('model', $data['model'])
			->set('xml', $data['xml'])
			->set('size', $data['size'])
			->set('name', $data['name'])
			->set('hash', $data['hash'])
			->set('uploaded_file_name', $data['uploaded_file_name']);
		$this->db->update('cytometers');
			  
			if($this->db->affected_rows() > 0)
				return true;
			else 
				return false;
	}
	
	
	
	function delete($resource_id)
	{
		$this->db->where('resource_id', $resource_id);
		$result =$this->delete('cytometers');
		return $result;
	}
	
}//end class
