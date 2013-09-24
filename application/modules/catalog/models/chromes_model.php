<?php
/**
 * Fluorish Models
 *
 *
 * @package    	Fluorish
 * @category	Models
 * @author     	Royce Cano <royce@treestar.com>
 * @version    	0.1b
 */
class Chromes_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();

		$this->db->set_dbprefix('');
	}

//////////////////////////////////////////////////////////////////////////////////////////
/**
 * Creates a new vendors record
 *
 * @param $data - an array containing
 * 		'name' *required*,
 * 		'url',
 * 		'is_current' - 1 if a current partner, 0 otherwise
 * 		'if_contains - ???
 * 		'email' - *required*
 *			
 */
	function insert($data)
	{
		//	$this->db->set('vendorid', $data['vendorid']);
		$this->db->set('name', $data['name']);
		$this->db->set('excitation', $data['excitation']);
		$this->db->set('emission', $data['emission']);
		$this->db->set('category', $data['category']);
		$this->db->set('live_dead', $data['live_dead']);
		$this->db->set('20Efficiency', $data['20Efficiency']);
		$this->db->set('60Efficiency', $data['60Efficiency']);
		$this->db->set('80Efficiency', $data['80Efficiency']);
		$this->db->set('CAS', $data['CAS']);
		
		
		$this->db->insert('chromes');

		return $this->db->affected_rows();
	}

/**
 *	Returns an array representing the given row based on vendorid
 *
 * @param $vendorid
 * 
 */
	function read_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('chromes');

		return $query->row_array();
	}
/**
 *	Returns an array representing the given row based on vendor name
 *
 * @param $vendorid
 * 
 */
	function read_by_name($name)
	{
		$this->db->where('name', $name);
		$query = $this->db->get('chromes');

		return $query->row_array();
	}

/**
 * Reads all chromes
 *
 * returns a 2D array of all chromes
 * 
 */
	function read_all()
	{
		$query = $this->db->get('chromes');

		return $query->result_array();
	}
	function get_all()
	{
		return $this->read_all();
	}





/**
 * Update a chrome's data
 *
 * @param - $data - an array containing new chrome data
 *
 * 	returns
 * 		0 if update failed
 * 		1 if update succeeded
 */
	function update($data)
	{
		$this->db->where('id', $data['id']);
		
		$this->db->set('name', $data['name']);
		$this->db->set('excitation', $data['excitation']);
		$this->db->set('emission', $data['emission']);
		$this->db->set('category', $data['category']);
		$this->db->set('live_dead', $data['live_dead']);
		$this->db->set('20Efficiency', $data['20Efficiency']);
		$this->db->set('60Efficiency', $data['60Efficiency']);
		$this->db->set('80Efficiency', $data['80Efficiency']);
		$this->db->set('CAS', $data['CAS']);
		
		$this->db->update('chromes');

		return $this->db->affected_rows();
	}

/**
 * Deletes the vendor with the given vendorid
 *
 * @param $vendorid
 *
 * returns
 * 		0 if delete fails
 * 		1 if delete succeeds
 */	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('vendors');

		return $this->db->affected_rows();
	}

	
	
}//end class
