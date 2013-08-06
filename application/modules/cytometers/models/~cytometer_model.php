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
class Cytometer_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	$this->load->database();
	}

	function create($data)
	{
		$this->db->set('model', $data['model']);
		$this->db->set('manufacturer', $data['manufacturer']);
		$this->db->set('cytometerML', $data['cytometerML']);
		$this->db->set('fixed', $data['fixed']);
		$this->db->set('cyto_order', $data['cyto_order']);
		$this->db->set('link', $data['link']);
		$this->db->insert('cytometer');

		return $this->db->affected_rows();
	}

	function read($id)
	{
		$this->db->where('model', $id);
		$this->db->where('manufacturer', $id);
		$query = $this->db->get('cytometer');

		return $query;
	}

	function readAll()
	{
		$query = $this->db->get('cytometer');

		return $query;
	}

	function update($id, $data)
	{
		$this->db->where('model', $data['model']);
		$this->db->where('manufacturer', $data['manufacturer']);
		$this->db->set('cytometerML', $data['cytometerML']);
		$this->db->set('fixed', $data['fixed']);
		$this->db->set('cyto_order', $data['cyto_order']);
		$this->db->set('link', $data['link']);
		$this->db->update('cytometer');

		return $this->db->affected_rows();
	}

	function delete($id)
	{
		$this->db->where('model', $id);
		$this->db->where('manufacturer', $id);
		$this->db->delete('cytometer');

		return $this->db->affected_rows();
	}

}