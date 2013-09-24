<?php
/**
 * Fluorish Models
 *
 *
 * @package    	Fluorish
 * @category	Models
 * @author     
 * @version    	0.1b
 */
class Regulatory_status_model extends CI_Model
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
	function create($data)
	{
		$this->db->set('regulatory_status_name', $alt_name);

		$this->db->insert('regulatory_status');

		return $this->db->affected_rows();
	}

	function read($id)
	{

	}

	function read_by_name($name)
	{
		$this->db->where('regulatory_status_name', $name);
		
		$the_name = $this->db->get('regulatory_status')->results_array();

		return $the_name;
	}
	
	function readAll()
	{
		$results = $this->db->get('regulatory_status')->results_array();

		return $results;
	}

	function update($id, $name)
	{
		$this->db->where('regulatory_status_id', $id);
		
		
		$this->db->set('regulatory_status_name', $name);
				
		$this->db->update('regulatory_status');

		return $this->db->affected_rows();
	}

	function delete($id)
	{
		$this->db->where('regulatory_status_id', $id);
		$this->db->delete('species_alternate_name');

		return $this->db->affected_rows();		
	}


}//end class
