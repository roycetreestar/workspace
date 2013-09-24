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
class Clones_model extends CI_Model
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
	function insert($name)
	{
		$this->db->set('name', $name);		
		
		$this->db->insert('clones');

		return $this->db->affected_rows();
	}

	function read_by_name($name)
	{
		$this->db->where('name', $name);
		
		$the_name = $this->db->get('clones')->results_array();

		return $the_name;
	}
	function get_all()
	{
		return $this->db->get('clones')->result_array();
	}

	function update($old_name, $new_name)
	{

	}

	function delete($name)
	{
		$this->db->where('name', $name);
		$this->db->delete('clones');

		return $this->db->affected_rows();
	}


}//end class
