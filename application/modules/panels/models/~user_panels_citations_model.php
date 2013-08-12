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
class User_panels_citations_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	$this->load->database();
	}

	function create($data)
	{
		$this->db->set('panelid', $data['panelid']);
		$this->db->set('omip', $data['omip']);
		$this->db->set('pmid', $data['pmid']);
		$this->db->set('citationInformation', $data['citationInformation']);
		$this->db->insert('user_panels_citations');

		return $this->db->affected_rows();
	}

	function read($id)
	{
		$this->db->where('citationid', $id);
		$query = $this->db->get('user_panels_citations');

		return $query;
	}

	function readAll()
	{
		$query = $this->db->get('user_panels_citations');

		return $query;
	}

	function update($id, $data)
	{
		$this->db->where('citationid', $data['citationid']);
		$this->db->set('panelid', $data['panelid']);
		$this->db->set('omip', $data['omip']);
		$this->db->set('pmid', $data['pmid']);
		$this->db->set('citationInformation', $data['citationInformation']);
		$this->db->update('user_panels_citations');

		return $this->db->affected_rows();
	}

	function delete($id)
	{
		$this->db->where('citationid', $id);
		$this->db->delete('user_panels_citations');

		return $this->db->affected_rows();
	}

}