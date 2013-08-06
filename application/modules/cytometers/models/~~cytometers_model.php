<?php
class Cytometers_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	$this->load->database();
	}

////////////////////////////////////////////////////////////////////////

	function create($data)
	{
		$this->db->set('model', $data['model']);
		$this->db->set('manufacturer', $data['manufacturer']);
		$this->db->set('cytometerML', $data['cytometerML']);
		$this->db->set('fixed', $data['fixed']);
		$this->db->set('cyto_order', $data['cyto_order']);
		$this->db->set('link', $data['link']);
		$this->db->insert('cytometers');

		return $this->db->affected_rows();
	}

////////////////////////////////////////////////////////////////////////

	function read($id)
	{
		$this->db->where('model', $id);
		$this->db->where('manufacturer', $id);
		$query = $this->db->get('cytometers');

		return $query;
	}

////////////////////////////////////////////////////////////////////////

	function readAll()
	{
		$query = $this->db->get('cytometers');

		return $query;
	}

////////////////////////////////////////////////////////////////////////

	function update($id, $data)
	{
		$this->db->where('model', $data['model']);
		$this->db->where('manufacturer', $data['manufacturer']);
		$this->db->set('cytometerML', $data['cytometerML']);
		$this->db->set('fixed', $data['fixed']);
		$this->db->set('cyto_order', $data['cyto_order']);
		$this->db->set('link', $data['link']);
		$this->db->update('cytometers');

		return $this->db->affected_rows();
	}

////////////////////////////////////////////////////////////////////////

	function delete($id)
	{
		$this->db->where('model', $id);
		$this->db->where('manufacturer', $id);
		$this->db->delete('cytometers');

		return $this->db->affected_rows();
	}


////////////////////////////////////////////////////////////////////////

	//~ function getUserCytometers($userid)
	//~ {
		 //~ $q = "SELECT a.*, c.corename
			//~ FROM user_cytometers a, core_user_link b, cores c
			//~ WHERE a.coreid = c.coreid
			//~ AND (b.userid = ".$userid."
			//~ AND b.coreid = a.coreid)
			//~ AND b.status=1
			//~ GROUP BY a.cytometerid
			//~ ORDER BY a.coreid, a.manufacturer, a.model";
			//~ 
		//~ return $this->db->query($q)->result();
		//~ 
	//~ }




//~ function saveCytometer($form_data)
//~ {
	//~ return ("cytometer saved");
//~ 
	//~ 
//~ }

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////	new (8/1)	////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/**
 * returns the cytometer with the passed-in $cytometerid 
 * with the xml parsed into a simpleXMLElement object
 */
	function readToArray($cytometerid)
	{
		$thisCytometer = $this->read($cytometerid)->row_array();

		$cyt = new SimpleXMLElement($thisCytometer['cytometerConfigXML']);
		$thisCytometer['cyt'] = $cyt;

		return $thisCytometer;
	}

}//end class
