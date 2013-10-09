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
		$this->db->set('user_id', $data['user_id']);
		$this->db->set('target', $data['target']);
		$this->db->set('clone', $data['clone']);
		$this->db->set('chrome', $data['chrome']);
		
		$result = $this->db->insert('catalog_search_log');
		
		if($this->db->affected_rows() >0)
		    return true;
	    else
		    return false;
		
	}




}//end class
