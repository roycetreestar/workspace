<?php
Class Panels_m extends Resources_m
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function create($data)
	{
//die('<textarea>'.print_r($data, true).'</textarea>');

		$this->db->set('resource_id', $data['resource_id'])
			->set('xml', $data['xml'])
			->set('user_id', $data['user_id'])
			->set('name', $data['name'])
//			->set('lab', $data['lab'])
			->set('description', $data['description'])
			->set('date', $data['date'])
			->set('investigator', $data['investigator'])
			->set('cytometer', $data['cytometer'])
			->set('species', $data['species'])
			->set('size', $data['size'])
			->set('sharingpref', $data['sharingpref'])
			->set('hash', $data['hash']);
//			->set('timestamp', $data['timestamp']);
			   
		$this->db->insert('panels');
	}
	
	function update($data)
	{
		$this->db->where('id', $data['id']);
		
		$this->db->set('xml', $data['xml'])
			->set('user_id', $data['user_id'])
			->set('name', $data['name'])
//			->set('lab', $data['lab'])
			->set('description', $data['description'])
			->set('date', $data['date'])
			->set('investigator', $data['investigator'])
			->set('cytometer', $data['cytometer'])
			->set('species', $data['species'])
			->set('size', $data['size'])
			->set('sharingpref', $data['sharingpref'])
			->set('hash', $data['hash'])
			->set('timestamp', $data['timestamp']);
		
		$this->db->update('panels');
			  
	}
	
	function get_panel_by_id($resourceid)
	{
		$this->db->where('resource_id', $resourceid);
		$panel = $this->db->get('panels')->row_array();
		
		return $panel;
			
	}
	
	
	function exists($resourceid)
	{
		$this->db->where('id', $resourceid);
		$result = $this->db->get('panels')->result_array();
		if(count($result) >0 )
			return true;
		else 
			return false;
	}
	
}