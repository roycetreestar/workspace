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
class Clone_exceptions_model extends CI_Model
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
		$this->db->set('exception_name', $alt_name);
		$this->db->set('clone_name', $name);
		
		
		$this->db->insert('clone_exceptions');

		return $this->db->affected_rows();
	}

	function read_by_name($name)
	{
		$this->db->where('clone_name', $name);
		
		$the_name = $this->db->get('clone_exceptions')->results_array();

		return $the_name;
	}

	function read_by_alternate($alt)
	{
		$this->db->where('exception_name', $alt);
		
		$result = $this->db->get('clone_exceptions')->results_array();

		return $result;
	}
	
	function read_by_both($name)
	{
		$this->db->where('exception_name', $name);
		$this->db->or_where('clone_name', $name);
		$result = $this->db->get('clone_exceptions');
		
		if($result->num_rows() > 0)
//			echo '<textarea>'.print_r( $result, true ).'</textarea><br/>';
			return($result->result_array());
		else return false;
	}

	function update($data)
	{
		$this->db->where('clone_name', $data['old_name']);
		$this->db->where('exception_name', $data['old_exception_name']);
		
		$this->db->set('clone_name', $data['new_name']);
		$this->db->set('exception_name', $data['new_exception_name']);
				
		$this->db->update('clone_exceptions');

		return $this->db->affected_rows();
	}

	function delete($name, $alt)
	{
		$this->db->where('clone_name', $name);
		$this->db->where('excpetion_name', $alt);
		$this->db->delete('clone_exceptions');

		return $this->db->affected_rows();
	}


}//end class
