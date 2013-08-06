<?php
Class Cytometers_m extends Resources_m
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function create($data)
	{
		$this->db->set('resource_id', $data['resource_id'])
			->set('user_id', $data['user_id'])
			->set('manufacturer', $data['manufacturer'])
			->set('model', $data['model'])
			->set('xml', $data['xml'])
			->set('size', $data['size'])
			->set('name', $data['name'])
			->set('uploaded_file_name', $data['uploaded_file_name']);
		$result = $this->db->insert('cytometers');
		
		if($result)
			return $this->db->insert_id();
		else return false;
		
	}
	
	function update($data)
	{
		$this->db->where('resource_id', $data['id']);
		$this->db->set('user_id', $data['user_id'])
			->set('manufacturer', $data['manufacturer'])
			->set('model', $data['model'])
			->set('xml', $data['xml'])
			->set('size', $data['size'])
			->set('name', $data['name'])
			->set('uploaded_file_name', $data['uploaded_file_name']);
		$this->db->update('cytometers');
			  
	}
	
	function get_cytometer($resourceid)
	{
		$this->db->where('resource_id', $resourceid);
		$cytometer = $this->db->get('cytometers');
		
		return $cytometer;
			
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
	
}