<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * species model
 *
 * @author 		
 * @website		http://www.fluorish.com
 * @package 	Fluorish
 * @subpackage 	Vendors
 * @copyright 	2013 Fluorish
 */
class Species_m extends MY_Model {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	
		//this table doesn't have the prefix, so set the prefix to ''
		$this->db->set_dbprefix('');
		
	}
	
////////////////////////////////////////////////////////////////////////
	function read_by_id($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('species');

		return $query->result_array();

	}

////////////////////////////////////////////////////////////////////////	
	function read_all()
	{
		$query = $this->db->get('species');
		$result = $query->result_array();
		
		return $result;
		
	}
	
	
	
}//end class