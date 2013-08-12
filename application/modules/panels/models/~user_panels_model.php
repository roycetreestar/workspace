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
class User_panels_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	
		//this table doesn't have the prefix, so set the prefix to ''
		$this->db->set_dbprefix('');
	}

////////////////////////////////////////////////////////////////////////

	function create($data)
	{
		$this->db->set('panelXML',		$data['panel_string']);
		$this->db->set('userid', 		$data['userid']);
		$this->db->set('name', 			$data['name']);
		$this->db->set('lab', 			$data['lab']);
		$this->db->set('description',	$data['description']);
		$this->db->set('date', 			$data['date']);
		$this->db->set('investigator', 	$data['investigator']);
		$this->db->set('cytometer', 	$data['cytometer']);
		$this->db->set('species', 		$data['species']);
		$this->db->set('size', 			$data['size']);
		$this->db->set('sharingpref', 	$data['sharingpref']);
		$this->db->set('hash', 			$data['hash']);
		//~ $this->db->set('timestamp', 	$data['timestamp']);
		$this->db->insert('user_panels');

		return $this->db->affected_rows();
	}

////////////////////////////////////////////////////////////////////////

	function read($id)
	{
		$this->db->where('panelid', $id);
		$query = $this->db->get('user_panels');

		return $query;
	}
	
////////////////////////////////////////////////////////////////////////

	function read_user_panels($userid)
	{
		$this->db->where('userid', $userid);
		$query = $this->db->get('user_panels');

		return $query->result();
	}
	
////////////////////////////////////////////////////////////////////////
/** returns an array of panels where userid == $userid
 * 
 */
	function user_panels_array($userid)
	{
		$thePanels = $this->read_user_panels($userid);

		foreach($thePanels as $thisPanel)
		{
			//$thisPanel = $this->read($panelid)->row_array();

			//~ echo $thisCytometer[0]['cytometerConfigXML'];
			//~ $panel = new SimpleXMLElement($thisPanel->panelXML);
			$panel = simplexml_load_string($thisPanel->panelXML);
			//~ $thisPanel->panelobj = $panel;
			$thisPanel->panelXML = $panel;
		}


//~ echo '<h2>Panel:</h2><textarea style="color:white; background-color:green; width:100%; height:500px;">';
	//~ print_r($thePanels);
//~ echo '</textarea>';
		return $thePanels;
		//~ return $thisPanel;
	}
////////////////////////////////////////////////////////////////////////

	function readAll()
	{
		$query = $this->db->get('user_panels');

		return $query;
	}
	
////////////////////////////////////////////////////////////////////////

	function update($id, $data)
	{
		$this->db->where('panelid', $data['panelid']);
		$this->db->set('panelXML', $data['panelXML']);
		$this->db->set('userid', $data['userid']);
		$this->db->set('name', $data['name']);
		$this->db->set('lab', $data['lab']);
		$this->db->set('description', $data['description']);
		$this->db->set('date', $data['date']);
		$this->db->set('investigator', $data['investigator']);
		$this->db->set('cytometer', $data['cytometer']);
		$this->db->set('species', $data['species']);
		$this->db->set('size', $data['size']);
		$this->db->set('sharingpref', $data['sharingpref']);
		$this->db->set('hash', $data['hash']);
		$this->db->set('timestamp', $data['timestamp']);
		$this->db->update('user_panels');

		return $this->db->affected_rows();
	}
	
////////////////////////////////////////////////////////////////////////

	function delete($id)
	{
		$this->db->where('panelid', $id);
		$this->db->delete('user_panels');

		return $this->db->affected_rows();
	}

////////////////////////////////////////////////////////////////////////

	function hash_exists($hash)
	{
		//~ $q = "SELECT * FROM user_panels WHERE hash=".$hash ;
		$query = $this->db->where('hash', $hash);
		$query = $this->db->get('user_panels');
		
		
		//~ echo '<h1 style="color:red">hash_exists num_rows: '.$query->num_rows().'</h1>';
		
		if($query->num_rows() >0)
			return true;
		else return false;
	}

}//end class
