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
class Target_species_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();

		$this->db->set_dbprefix('');
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function create($target, $species)
	{
		$this->db->set('target_name', $target);
		$this->db->set('species_name', $species);		
		
		$this->db->insert('target_species');

		return $this->db->affected_rows();
	}

	function read_by_species($species)
	{
		$this->db->where('species_name', $species);
		
		$the_name = $this->db->get('target_species')->result_array();

		return $the_name;
	}

	function read_by_target($target)
	{
		$this->db->where('target_name', $target);
		
		$the_name = $this->db->get('target_species')->results_array();

		return $the_name;
	}
	
	function readAll()
	{

	}

	function update($data)
	{
		$this->db->where('target_name', $data['old_target_name']);
		$this->db->where('species_name', $data['old_species_name']);
		
		$this->db->set('target_name', $data['new_target_name']);
		$this->db->set('species_name', $data['new_species_name']);
				
		$this->db->update('target_species');

		return $this->db->affected_rows();
	}

	function delete($data)
	{
		$this->db->where('target_name', $data['old_target_name']);
		$this->db->where('species_name', $data['old_species_name']);

		$this->db->delete('target_species');
		return $this->db->affected_rows();
	}
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
	function exists($target, $species)
	{
		$this->db->where('target_name', $target);
		$this->db->where('species_name', $species);

		$query = $this->db->get('target_species');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}

	function insert($target, $species)
	{
		$this->db->set('target_name', $target);
		$this->db->set('species_name', $species);		
		
		$this->db->insert('target_species');

		return $this->db->affected_rows();
	}
}//end class
