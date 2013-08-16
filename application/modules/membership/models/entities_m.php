<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Entities_m extends CI_Model
{
	
	private $id;
	private $entity_name;
	private $phone;
	private $timestamp;
	
	
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

 
	
	function create_entity($data)
	{
		$this->db->set('entity_name', $data['entity_name']);
		$this->db->set('email', $data['email']);
		$this->db->set('phone', $data['phone']);
//		$this->db->set('timestamp', $timestamp);
		
		$query = $this->db->insert('entities');
		
		if($this->db->affected_rows() === 1 )
			return $this->db->insert_id();
		else 
			return false;
	}
	
	function read_entity($entityid)
	{
		$this->db->where('id', $entityid);
		$query = $this->db->get('entities');
		
		if($query->num_rows() > 0 )
			return $query->result();
		else
			return false;
	}
	
	function update_entity($data)
	{
		$this->where('id', $data['entity_id']);
		$this->db->set('entity_name', $data['entity_name']);
		$this->db->set('email', $data['email']);
		$this->db->set('phone', $data['phone']);
//		$this->db->set('timestamp', $timestamp);
		
		$query = $this->db->update('entities');
		
		if($this->db->affected_rows() === 1 )
			return true;
		else return false;
	}
	
	function delete_entity($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('entities'); 
		
		if($this->db->affected_rows() === 1 )
			return true;
		else return false;
	}
	
	
	
}//end class