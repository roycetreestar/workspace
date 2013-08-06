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
class User_cytometers_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	
		//this table doesn't have the prefix, so set the prefix to ''
		$this->db->set_dbprefix('');
		
	}

////////////////////////////////////////////////////////////////////////

/** 
 * creates a new user_cytometers record	
 * 
 * @param null $data
 * @return type
 */
	function create($data)
	{
		if(!array_key_exists('coreid', $data) || $data['coreid']== '')
			$data['coreid'] = NULL;
		
		$this->db->set('coreid', $data['coreid']);
		$this->db->set('userid', $data['userid']);
		$this->db->set('manufacturer', $data['manufacturer']);
		$this->db->set('model', $data['model']);
		$this->db->set('cytometerConfigXML', $data['cytometer_string']);	//$data['cytometerConfigXML']);
		$this->db->set('size', $data['size']);
		$this->db->set('cytometerName', $data['cytometerName']);
		$this->db->set('timestamp', date("Y-m-d H:i:s")); /*$data['timestamp']);*/
		$this->db->set('hash', $data['hash']);
		$this->db->set('uploaded_file_name', $data['uploaded_file_name']);
//		$this->db->set('serialnumber', $data['serialnumber']);
		//~ $this->db->insert('user_cytometers');
		$this->db->insert('user_cytometers');

		return $this->db->affected_rows();
	}

////////////////////////////////////////////////////////////////////////

/**
 * Returns the cytometer with the passed-in $cytometerid 
 * 
 * @param type $cytometerid
 * @return type
 */
	function read($cytometerid)
	{
		$this->db->where('cytometerid', $cytometerid);
		$query = $this->db->get('user_cytometers');
		//~ $query = $this->db->get('cytometers');

		return $query;
	}

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
	
////////////////////////////////////////////////////////////////////////

/**
 * returns all rows from user_cytometers table
 * 
 * @return type
 */
	function readAll()
	{
		$query = $this->db->get('user_cytometers');
		return $query;
	}

////////////////////////////////////////////////////////////////////////

/**
 * updates the user_cytometers record where cytometerid = $id
 * 
 * @param type $id
 * @param type $data
 * @return type
 */
	function update($id, $data)
	{
		$this->db->where('cytometerid', $data['cytometerid']);
		$this->db->set('coreid', $data['coreid']);
		$this->db->set('manufacturer', $data['manufacturer']);
		$this->db->set('model', $data['model']);
		$this->db->set('cytometerConfigXML', $data['cytometerConfigXML']);
		$this->db->set('size', $data['size']);
		$this->db->set('cytometerName', $data['cytometerName']);
		//~ $this->db->set('timestamp', $data['timestamp']);
		$this->db->set('hash', $data['hash']);
		$this->db->set('uploaded_file_name', $data['uploaded_file_name']);
//		$this->db->set('serialnumber', $data['serialnumber']);
		//~ $this->db->update('user_cytometers');
		$this->db->update('user_cytometers');

		return $this->db->affected_rows();
	}

////////////////////////////////////////////////////////////////////////

/** 
 * Deletes the user_cytometers row where cytometerid = $id
 * 
 * @param type $id
 * @return type
 */
	function delete($id)
	{
		$this->db->where('cytometerid', $id);
		//~ $this->db->delete('user_cytometers');
		$this->db->delete('cytometers');

		return $this->db->affected_rows();
	}


////////////////////////////////////////////////////////////////////////

/** 
 * Returns an array of cytometers accessible to the user whose userid = $userid
 * 
 * TODO: translate to active record syntax
 * @todo : get permissions working so we can distinguish a user's cytometers from the mob of other cytometers 
 */
	function get_user_cytometers($userid)
	{
		
	// this is the old-fluorish sql for this function:	
		 $q = "SELECT a.*, c.corename
			FROM user_cytometers a, core_user_link b, cores c
			-- FROM default_cytometers a, core_user_link b, cores c
			WHERE a.coreid = c.coreid
			AND (b.userid = ".$userid."
			AND b.coreid = a.coreid)
			AND b.status=1
			GROUP BY a.cytometerid
			ORDER BY a.coreid, a.manufacturer, a.model";
			
	
	//this temporarily returns all cytometers. permissions will change this to be more like the old-fluorish sql above
		//~ $q = "select * from cytometer	GROUP BY cytometerid ORDER BY coreid, manufacturer, model";
		$result = $this->db->query($q)->result_array();
		
//~ echo $q;
//~ print_r($result);

		return $result;
		
	}


////////////////////////////////////////////////////////////////////////
/**
 * 
 * @param type $coreid
 * @return type
 */
function get_core_cytometers($coreid)
{
	$this->db->where('coreid', $coreid);
	$query = $this->db->get('user_cytometers');

	return $query->result_array();

}

////////////////////////////////////////////////////////////////////////
/**
 * 
 * @param type $userid
 * @return type
 */
function get_my_cytometers($userid)
{
	$this->db->where('userid', $userid);
	$query = $this->db->get('user_cytometers');


	return $query->result_array();
}


////////////////////////////////////////////////////////////////////////

/** 
 * checks if the unique row id is present in the $data array. 
 * 	if present, updates the row
 * 	if not present, inserts a new row
 * 
 * @param null $data
 * @return boolean
 */


	function push_to_db($data)
	{
		if(!empty($data['cytometerid']))
		{	
//echo 'attempting to update ...<br/>';
			if($data['coreid'] == '')
				$data['coreid'] = null;
			
			$this->update($data['cytometerid'], $data);
			
			if($this->db->affected_rows() > 0)
				echo '<h1 style="color:green;">config updated</h1>';
			else 
				echo '<h1 style="color:red;">config update failed</h1>';
		}
		else
		{	
//~ echo 'attempting to insert ...<br/>';
			$this->create($data);
			
			if($this->db->affected_rows() > 0)
			{	echo '<h1 style="color:green;">config created (inserted)</h1>';
				return true;
			}
			else
			{	echo '<h1 style="color:red;">config creation failed</h1>';
				return $this->db->_error_message();
			}
		}
	}//end function

////////////////////////////////////////////////////////////////////////
/**
 * 
 * @param type $hash
 * @return boolean
 */
	function hash_exists($hash)
	{
		//~ $q = "SELECT * FROM user_panels WHERE hash=".$hash ;
//		$query = 
			   $this->db->where('hash', $hash);
		$query = $this->db->get('user_cytometers');
		
		
		//~ echo '<h1 style="color:red">hash_exists num_rows: '.$query->num_rows().'</h1>';
		
		if($query->num_rows() >0)
			return true;
		else return false;
	}
	
	
	
////////////////////////////////////////////////////////////////////////
	
	
	
	
	
}//end class
