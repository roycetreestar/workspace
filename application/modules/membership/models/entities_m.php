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

 
	
////////////////////////////////////////////////////////////////////////
	function create_entity($data)
	{
		$this->db->set('entity_name', $data['entity_name']);
		$this->db->set('email', $data['email']);
		if(isset($data['phone']))  $this->db->set('phone', $data['phone']);
//		$this->db->set('timestamp', $timestamp);
		
		$query = $this->db->insert('entities');
		
		if($this->db->affected_rows() === 1 )
			return $this->db->insert_id();
		else 
			return false;
	}
	
////////////////////////////////////////////////////////////////////////
	function read_entity($entityid)
	{
		$this->db->where('id', $entityid);
		$query = $this->db->get('entities');
		
		if($query->num_rows() > 0 )
			return $query->row_array(); //result();
		else
			return false;
	}
	
////////////////////////////////////////////////////////////////////////
	function update_entity($data)
	{
//~ die('entities_m/update_entity() $data:<textarea>'.print_r($data, true).'</textarea>');
		$this->db->where('id', $data['entity_id']);
		$this->db->set('entity_name', $data['entity_name']);
		$this->db->set('email', $data['email']);
		$this->db->set('phone', $data['phone']);
//		$this->db->set('timestamp', $timestamp);
		
		//~ $query =
		$result = $this->db->update('entities');

//~ die('entities_m/update_entity() affected_rows():<textarea>'.print_r($this->db->affected_rows(), true).'</textarea><br/>	'.$this->db->_error_message() );
		//~ if($result) //($this->db->affected_rows() > 0 )
//~ die('entities_m/update_entity() $result: '.$result);
			//~ return true;
		//~ else if($this->db->affected_rows() == 0 )
			//~ die($this->db->last_query() );
		//~ else	return false;
		return $result;
	}
	
////////////////////////////////////////////////////////////////////////
	function delete_entity($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('entities'); 
		
		if($this->db->affected_rows() === 1 )
			return true;
		else return false;
	}
	
	
	
}//end class
