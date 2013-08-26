<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Inventory model
 *
 * @author 		
 * @website		http://www.fluorish.com
 * @package 	Fluorish
 * @subpackage 	Vendors
 * @copyright 	2013 Fluorish
 */
class Inventory_m extends CI_Model {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	
		//this table doesn't have the prefix, so set the prefix to ''
		$this->db->set_dbprefix('');
		
	}
	
//////////////////////////////////////////////////////////////////////////////////////////

	function create($data)
	{
		if(isset($data['labid']))
			$this->db->set('labid', $data['labid']);

		if(isset($data['target']))
			$this->db->set('target', $data['target']);
		if(isset($data['fluorochrome']))
			$this->db->set('fluorochrome', $data['fluorochrome']);
		if(isset($data['clone']))
			$this->db->set('clone', $data['clone']);
		if(isset($data['target_species']))
			$this->db->set('target_species', $data['target_species']);
		if(isset($data['vendorid']))
			$this->db->set('vendorid', $data['vendorid']);
		//~ $this->db->set('vendorname', $data['vendorname']);
		if(isset($data['catalognumber']))
			$this->db->set('catalognumber', $data['catalognumber']);
		if(isset($data['lot_number']))
			$this->db->set('lot_number', $data['lot_number']);
		if(isset($data['isotype']))
			$this->db->set('isotype', $data['isotype']);
		if(isset($data['source_species']))
			$this->db->set('source_species', $data['source_species']);
		if(isset($data['reagent_category']))
			$this->db->set('reagent_category', $data['reagent_category']);
		if(isset($data['description']))
			$this->db->set('description', $data['description']);
		if(isset($data['amount']))
			$this->db->set('amount', $data['amount']);
		if(isset($data['regulatory_status']))
			$this->db->set('regulatory_status', $data['regulatory_status']);

		if(isset($data['expiration_date']))
			$this->db->set('expiration_date', $data['expiration_date']);
		if(isset($data['location']))
			$this->db->set('location', $data['location']);
		if(isset($data['concentration']))
			$this->db->set('concentration', $data['concentration']);
		if(isset($data['amount_per_test']))
			$this->db->set('amount_per_test', $data['amount_per_test']);
		if(isset($data['amount_per_test_units']))
			$this->db->set('amount_per_test_units', $data['amount_per_test_units']);
		if(isset($data['remaining_tests']))
			$this->db->set('remaining_tests', $data['remaining_tests']);
		if(isset($data['threshold']))
			$this->db->set('threshold', $data['threshold']);

		
		$this->db->set('date_added', time() );
		$this->db->set('date_modified', time() );
		
		$this->db->set('useridadd', $data['userid']);
		$this->db->set('useridmod', $data['userid']);
		
		$this->db->insert('inventory');

		return $this->db->affected_rows();
	}
	
//////////////////////////////////////////////////////////////////////////////////////////

	function read($inventoryid, $field='', $comparison='', $comp_value='')
	{
	//optionally filter by a field
		if($field!==''&& $comparison!=='' && $comp_value!=='')
		{
			
			switch($comparison)
			{	
				case 'where':
					$this->db->where($field, $comp_value);
					break;
				case 'like':
					$this->db->like($field, $comp_value);
					break;
				case 'greaterthan':
					$this->db->where($field.' >', $comp_value);
					break;
				case 'lessthan':
					$this->db->where($field.' <', $comp_value);
					break;				
			}			
		}
		
		$this->db->where('inventory_id', $inventoryid);
		$query = $this->db->get('inventory');
		
		//~ $query = $this->db->query("SELECT * FROM cores WHERE coreid=".$coreid);
die('inventory_m/read() result: <textarea>'.print_r($query->result_array(), true).'</textarea>' );
		return $query->result_array();
	}
	
}//end class
