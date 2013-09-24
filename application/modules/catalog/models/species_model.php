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
class Species_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();

		$this->db->set_dbprefix('');
	}

//////////////////////////////////////////////////////////////////////////////////////////
/**
 * Creates a new targets record
 *
 * @param $data - an array containing
 * 		'name' *required*,
 * 		
 *			
 */
	function create($name, $alt_name)
	{
		$this->db->set('species_name', $alt_name);		
		
		$this->db->insert('species');

		return $this->db->affected_rows();
	}

	function read_by_name($name)
	{
		$this->db->where('species_name', $name);
		
		$the_name = $this->db->get('species')->results_array();

		return $the_name;
	}
	
	function get_all()
	{
		return $this->db->get('species')->result_array();
	}
	



	function update($old_name, $new_name)
	{
		$this->db->where('species_name', $old_name);
		$this->db->set('species_name', $name);				
		$this->db->update('species');

		return $this->db->affected_rows();
	}

	function delete($name)
	{
		$this->db->where('species_name', $name);
		$this->db->delete('species');

		return $this->db->affected_rows();
	}


}//end class
