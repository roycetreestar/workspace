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
class Product_species_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();

		$this->db->set_dbprefix('');
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function create($productid, $species)
	{
		$this->db->set('species', $species);
		$this->db->set('product_id', $productid);		
		
		$this->db->insert('products_species');

		return $this->db->affected_rows();
	}

	function read_by_species($species)
	{
		$this->db->where('species', $species);
		
		$the_name = $this->db->get('products_species')->results_array();

		return $the_name;
	}

	function read_by_productid($id)
	{
		$this->db->where('product_id', $id);
		
		$the_name = $this->db->get('products_species')->results_array();

		return $the_name;
	}
	
	function readAll()
	{
		return false;
	}

	function update($data)
	{
		$this->db->where('species', $data['old_species']);
		$this->db->where('product_id', $data['old_product_id']);
		
		$this->db->set('species', $data['new_species']);
		$this->db->set('product_id', $data['new_product_id']);
				
		$this->db->update('products_species');

		return $this->db->affected_rows();
	}

	function delete($data)
	{
		$this->db->where('species', $data['species']);
		$this->db->where('product_id', $data['product_id']);

		$this->db->delete('products_species');
		return $this->db->affected_rows();
	}

	function exists($productid, $species)
	{
		$this->db->where('product_id', $productid);
		$this->db->where('species', $species);

		$query = $this->db->get('products_species');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}
/**
 * Redirects to create() function
 * 
 * @param type $productid
 * @param type $species
 * @return type
 */	
	function insert($productid, $species)
	{
		return $this->create($productid, $species);
	}
}//end class
