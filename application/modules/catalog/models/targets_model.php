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
class Targets_model extends CI_Model
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
	function create($name)
	{
				//	$this->db->set('vendorid', $data['vendorid']);
		$this->db->set('target_name', $name);
		
		$this->db->insert('targets');

		return $this->db->affected_rows();
	}

	function read($name)
	{
		$this->db->where('target_name', $name);
		
		$the_name = $this->db->get('targets');

		return $the_name;
	}

	function get_canonical($starts_with='')
	{
		if($starts_with !='')
			$this->db->like('target_name', $starts_with, 'after'); 
		$result = $this->db->get('targets')->result_array();
		
		return $result;
	}
	function get_all($starts_with='')
	{
		if($starts_with !='')
			$this->db->like('alternate_name', $starts_with, 'after'); 
		$this->db->where('is_exception', '0');
		$result = $this->db->get('targets_alternate_name')->result_array();
		
		return $result;
	}
	function update($name)
	{
		$this->db->where('target_name', $name);
		
		$this->db->set('target_name', $name);
				
		$this->db->update('targets');

		return $this->db->affected_rows();
	}

	function delete($name)
	{
		$this->db->where('target_name', $name);
		$this->db->delete('targets');

		return $this->db->affected_rows();
	}


}//end class
