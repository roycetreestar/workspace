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
class Catalog_field_names_m extends MY_Model {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	
		//this table doesn't have the prefix, so set the prefix to ''
		$this->db->set_dbprefix('');
		
	}
	

////////////////////////////////////////////////////////////////////////	
	function read_all()
	{
		$query = $this->db->get('catalog_field_names');
		$result = $query->result_array();
		
		return $result;
		
	}
	
//	function validate_inventory_fields()
//	{
//		$canonicals = $this->canonical_names();
//		
//		
//	}
	
	function get_canonical($lookup_term)
	{
		$this->db->where('alternate_name', $lookup_term);
		$result = $this->db->get('catalog_field_names');
		
		return $result->result_array();
	}
	
	
	function canonical_names()
	{
		$this->db->distinct('canonical_name');
		$result = $this->db->get('catalog_field_names');
		
		return $result->result_array();
		
	}
	
}//end class