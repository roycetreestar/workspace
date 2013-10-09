<?php

class Catalog_import_log_m extends CI_Model
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
		$this->db->set('vendor_id', $data['vendor_id']);
		$this->db->set('log', $data['log']);
		$this->db->set('success', $data['success']);
		
		$result = $this->db->insert('catalog_import_log');
		
		if($this->db->affected_rows() >0)
		    return true;
	    else
		    return false;
		
	}




}//end class
