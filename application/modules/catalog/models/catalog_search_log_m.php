<?php

class Catalog_search_log_m extends CI_Model
{

	
	
////////////////////////////////////////////////////////////////////////	
	function __construct()
	{
		parent::__construct();
		$this->load->database();

		$this->db->set_dbprefix('');
		
		
		
	}




	function insert($data)
	{
		$this->db->set('species', $data['species_name']);
		$this->db->set('target', $data['target']);
		$this->db->set('format', $data['format']);
		$this->db->set('clone', $data['clone']);
		$this->db->set('vendors', serialize($data['vendors']) );
		$this->db->set('user_id', $data['userid']);
		$this->db->set('session_id', $data['session_id']);
		
		$result = $this->db->insert('catalog_search_log');
		
		if($this->db->affected_rows() >0)
		    return true;
	    else
		    return false;
		
	}




}//end class
