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
class Vendors_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();

		$this->db->set_dbprefix('');
	}

//////////////////////////////////////////////////////////////////////////////////////////
/**
 * Creates a new vendors record
 *
 * @param $data - an array containing
 * 		'name' *required*,
 * 		'url',
 * 		'is_current' - 1 if a current partner, 0 otherwise
 * 		'if_contains - ???
 * 		'email' - *required*
 *			
 */
	function insert($data)
	{
//~ if($_POST)
//~ die('vendors_model/insert got $_POST:<pre>'.print_r($_POST, true).'</pre>');
//~ else die('vendors_model/insert NO $_POST');
//~ die('catalog/modules/vendors_module/insert() $data:<pre>'.print_r($data, true).'</pre>');
		//	$this->db->set('vendorid', $data['vendorid']);
		$this->db->set('vendor_name', $data['vendor_name']);
		$this->db->set('url', $data['url']);
		//~ $this->db->set('current', $data['current']);
		$this->db->set('if_contains', $data['if_contains']);
		$this->db->set('email', $data['email']);
		if(isset($data['current']))
			$this->db->set('current', 1);//$data['current']);
		//~ else
			//~ $this->db->set('current', 0);
		$this->db->insert('vendors');

//~ die('catalog/vendors_model/insert() sql:<br/>'.$this->db->last_query()		);
		return $this->db->affected_rows();
	}

/**
 *	Returns an array representing the given row based on vendorid
 *
 * @param $vendorid
 * 
 */
	function read_by_id($vendorid)
	{
		$this->db->where('vendor_id', $vendorid);
		$query = $this->db->get('vendors');

		return $query->row_array();
	}
/**
 *	Returns an array representing the given row based on vendor name
 *
 * @param $vendorid
 * 
 */
	function read_by_name($vendorname)
	{
		$this->db->where('vendor_name', $vendorname);
		$query = $this->db->get('vendors');

		return $query->row_array();
	}

/**
 * Reads all vendors
 *
 * returns a 2D array of all vendors
 * 
 */
	function read_all()
	{
		$query = $this->db->get('vendors');

		if($query)
			return $query->result_array();
		else 
			return false;
	}


/**
 * Reads all current vendors
 *
 * returns a 2D array of all current vendors
 * 
 */
	function read_current()
	{
		$this->db->where('current', 1);
		$query =$this->db->get('vendors');

		return $query->result_array();
	}




/**
 * Update a vendor's data
 *
 * @param - $data - an array containing
 * 				the 'vendorid' to update,
 * 				'name',
 * 				'current',
 * 				'if_contains',
 * 				'email'
 *
 * 	returns
 * 		0 if update failed
 * 		1 if update succeeded
 */
	function update($data)
	{
		
//~ die('catalog/vendor_model/update(): <textarea>'.print_r($data, true).'</textarea>');
		$this->db->where('vendor_id', $data['vendor_id']);
		
		$this->db->set('vendor_name', $data['vendor_name']);
		$this->db->set('url', $data['url']);
		$this->db->set('if_contains', $data['if_contains']);
		$this->db->set('email', $data['email']);
		if(isset($data['current']))
			$this->db->set('current', 1);//$data['current']);
		else
			$this->db->set('current', 0);
		
		$this->db->update('vendors');

		if($this->db->affected_rows() > 0)
			return true;
		else 
			return false;
		//~ return $this->db->affected_rows();
	}

/**
 * Deletes the vendor with the given vendorid
 *
 * @param $vendorid
 *
 * returns
 * 		0 if delete fails
 * 		1 if delete succeeds
 */	
	function delete($vendorid)
	{
		$this->db->where('vendor_id', $vendorid);
		$this->db->delete('vendors');

		return $this->db->affected_rows();
	}

	
	
}//end class
