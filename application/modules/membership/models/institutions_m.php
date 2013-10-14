<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Institutions_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_institution_by_id($institution_id)
	{
		$this->db->where('id', $institution_id);
		return $this->db->get('institutions')->row_array();
	}
	
	function get_institution_name_by_id($institution_id)
	{
		$this->db->select('institution_name');
		$this->db->where('id', $institution_id);
		$result = $this->db->get('institutions')->row_array();
		return $result['name'];
	}
	
	
	
	
}//end class
