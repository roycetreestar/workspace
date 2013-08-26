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
class Custom_reagents_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	//this table doesn't have the prefix, so set the prefix to ''
		$this->db->set_dbprefix('');
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function create($data)
	{
		$this->db->set('labid', $data['labid']);
		$this->db->set('useridadd', $data['useridadd']);
		$this->db->set('useridmod', $data['useridmod']);
		$this->db->set('target', $data['target']);
		$this->db->set('fluorochrome', $data['fluorochrome']);
		$this->db->set('clone', $data['clone']);
		$this->db->set('species', $data['species']);
		$this->db->set('vendorid', $data['vendorid']);
		//~ $this->db->set('vendorname', $data['vendorname']);
		$this->db->set('catalognumber', $data['catalognumber']);
		$this->db->set('lot_number', $data['lot_number']);
		$this->db->set('isotype', $data['isotype']);
		$this->db->set('source_species', $data['source_species']);
		$this->db->set('reagent_category', $data['reagent_category']);
		$this->db->set('description', $data['description']);
		$this->db->set('amount', $data['amount']);
		$this->db->set('regulatory_status', $data['regulatory_status']);
		$this->db->set('date_added', $data['date_added']);
		$this->db->set('date_modified', $data['date_modified']);
		$this->db->set('expiration_date', $data['expiration_date']);
		$this->db->set('location', $data['location']);
		$this->db->set('concentration', $data['concentration']);
		$this->db->set('amount_per_test', $data['amount_per_test']);
		$this->db->set('amount_per_test_units', $data['amount_per_test_units']);
		$this->db->set('remaining_tests', $data['remaining_tests']);
		$this->db->set('threshold', $data['threshold']);

		
		
		
		
		$this->db->insert('custom_reagents');

		return $this->db->affected_rows();
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function read($labid, $field='', $comparison='', $comp_value='')
	{
	//optionally filter by a field
		if($field!==''&& $comparison!=='' && $comp_value!=='')
		{
			
			switch($comparison)
			{	
				case 'where':
					$this->db->where($field, $comp_value);
					break;
				case 'like':
					$this->db->like($field, $comp_value);
					break;
				case 'greaterthan':
					$this->db->where($field.' >', $comp_value);
					break;
				case 'lessthan':
					$this->db->where($field.' <', $comp_value);
					break;				
			}			
		}
		
		$this->db->where('labid', $labid);
		$query = $this->db->get('custom_reagents');
		
		//~ $query = $this->db->query("SELECT * FROM cores WHERE coreid=".$coreid);
		
		return $query->result_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function readAll()
	{
		$query = $this->db->get('custom_reagents');

		return $query;
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function update($data)
	{
	
		$this->db->where('custom_reagent_id', $data['id']);
	
		$this->db->set('labid', $data['labid']);
		$this->db->set('useridadd', $data['useridadd']);
		$this->db->set('useridmod', $data['useridmod']);
		$this->db->set('target', $data['target']);
		$this->db->set('fluorochrome', $data['fluorochrome']);
		$this->db->set('clone', $data['clone']);
		$this->db->set('species', $data['species']);
		$this->db->set('vendorid', $data['vendorid']);
		//~ $this->db->set('vendorname', $data['vendorname']);
		$this->db->set('catalognumber', $data['catalognumber']);
		$this->db->set('lot_number', $data['lot_number']);
		$this->db->set('isotype', $data['isotype']);
		$this->db->set('source_species', $data['source_species']);
		$this->db->set('reagent_category', $data['reagent_category']);
		$this->db->set('description', $data['description']);
		$this->db->set('amount', $data['amount']);
		$this->db->set('regulatory_status', $data['regulatory_status']);
		$this->db->set('date_added', $data['date_added']);
		$this->db->set('date_modified', $data['date_modified']);
		$this->db->set('expiration_date', $data['expiration_date']);
		$this->db->set('location', $data['location']);
		$this->db->set('concentration', $data['concentration']);
		$this->db->set('amount_per_test', $data['amount_per_test']);
		$this->db->set('amount_per_test_units', $data['amount_per_test_units']);
		$this->db->set('remaining_tests', $data['remaining_tests']);
		$this->db->set('threshold', $data['threshold']);
			
		$this->db->update('custom_reagents');
		return $this->db->affected_rows();
	}

//////////////////////////////////////////////////////////////////////////////////////////
	
	function delete($id)
	{
		$this->db->where('custom_reagent_id', $id);
		$this->db->delete('custom_reagents');

		return $this->db->affected_rows();
	}

	
	
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	
	function get_managed_cores($userid)
	{
		$cores_managed = array();
		//pull coreid from cores_model where userid = logged_in_userid
		$sql = 'SELECT * FROM core_user_link WHERE userid='.$userid.' AND manager=1';
		$query = $this->db->query($sql);
//~ //debug
//~ echo '<br/>cores_model/get_managed_cores() $sql:'.$sql;
//~ //end debug
		foreach ($query->result() as $row)
		{
			$sql = 'SELECT corename FROM cores WHERE coreid ="'. $row->coreid.'"';

			$q = $this->db->query($sql);
			$r = $q->row();
	
	
//~ //debug:
//~ print_r($row);
//~ echo '<br/>cores_model/get_managed_cores() $sql:'.$sql.'<br/>';
//~ //end debug
			$cores_managed[] = array(
				'coreid'=>$row->coreid, 
				'corename'=>$r->corename, 
				'status'=>$row->status
			);
	
		}
		return $cores_managed;
	}
	
//////////////////////////////////////////////////////////////////////////////////////////
	
	function get_joined_cores($userid)
	{
		$cores_joined = array();
		//pull coreid from cores_model where userid = logged_in_userid
		$query = $this->db->query('SELECT * FROM core_user_link WHERE userid='.$userid.' AND manager=0');
		foreach ($query->result() as $row)
		{
			$q = $this->db->query('SELECT corename FROM cores WHERE coreid ="'. $row->coreid.'"');
			$r = $q->row();
	
			$cores_joined[] = array('coreid'=>$row->coreid, 'corename'=>$r->corename, 'status'=>$row->status);
	
		}
		return $cores_joined;
	}//end get_joined_cores()
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
	
	
	function get_available_cores($fl_user)
	{
		
		
		$cores_available = array();
	
	//debug:
		//~ print_r($this->data);
	//end debug
	
	
		//~ $institutionid = $this->ion_auth->get_user()->company;
		$institutionid = $this->ion_auth->get_user()->company;
	
		$query = $this->db->query('SELECT * FROM cores WHERE institutionID ='.$fl_user['institutionID'].' AND coreid NOT IN(
				SELECT coreid FROM core_user_link WHERE userid = "'.$fl_user['id'].'")');
	
		foreach ($query->result() as $row)
		{
			$cores_available[] = array
			(
				'coreid'=>$row->coreid, 
				'corename'=>$row->corename, 
				'institutionID'=>$row->institutionID, 
				'access'=>$row->access, 
				'email'=>$row->email,
				'phone'=>$row->phone, 
				'URL'=>$row->URL, 
				'address_line1'=>$row->address_line1, 
				'address_line2'=>$row->address_line2, 
				'city'=>$row->city, 
				'state'=>$row->state, 
				'zip'=>$row->zip, 
				'country'=>$row->country, 
				'additional_information'=>$row->additional_information,
				'whitelist'=>$row->whitelist, 
				'whitelist_domains'=>$row->whitelist_domains 
			);
		}
	
	
		return $cores_available;
	}//end get_available_cores()
	

//////////////////////////////////////////////////////////////////////////////////////////

	function get_whitelist($coreid)
	{
		$query = $this->db->query('SELECT whitelist, whitelist_domains FROM cores WHERE coreid ='.$coreid  );
		return $query->row();
	}
	
	
//////////////////////////////////////////////////////////////////////////////////////////

/** 
 * $permitted is usually 1 (auto-accepted), but if core is private it 
 * may be 0 so they have to wait for acceptance 
 */
	function add_to_core($userid, $coreid, $permitted = 1)		
	{
		//$this->db->db_debug = true;
		
		$data = array(
		   'coreid' => $coreid ,
		   'userid' => $userid ,
		   'status' => $permitted,
		   'manager' => 0
		);

		if($this->db->insert('core_user_link', $data))
		{
			return TRUE;
		}
		else
			return FALSE;

		// Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')
	}
	
	
//////////////////////////////////////////////////////////////////////////////////////////

	function remove_from_core($userid, $coreid)
	{
		if(	$this->db->where('coreid', $coreid)->where('userid', $userid)->delete('core_user_link')		)
		{
			return TRUE;					//'successful deletion of user '.$userid.' from core '.$coreid;
		}
		else
			return FALSE;					//' deletion of user '.$userid.' from core '.$coreid.' FAILED';

		// Produces:
		// DELETE FROM mytable
		// WHERE id = $id
	}
	
	

	
	function get_pending_members($coreid)
	{
	// first, get all members where status = 0 from core_user_link,
	// then access the fluorish users table to get all those userids' data
		$this->load->model('fl_users_model');
		
		$query = $this->db->where('coreid', $coreid)->where('status', 0)->get('core_user_link');
		
		$userids = array();
		$pending_members= array();

		foreach ($query->result_array() as $row)
		{
			$user_query = $this->db->select('id, first_name, last_name, email, phone')->where('id', $row['userid'])->get('users');
			
			$pending_members[] = $user_query->row_array();
		}
		
		return $pending_members;
			
	}
	
	
	function get_members($coreid)
	{
	// first, get all members where status = 1 from core_user_link,
	// then access the fluorish users table to get all those userids' data
		$this->load->model('fl_users_model');
		
		$query = $this->db->where('coreid', $coreid)->where('status', 1)->get('core_user_link');
		
		$userids = array();
		$pending_members= array();

		foreach ($query->result_array() as $row)
		{
			$user_query = $this->db->select('id, first_name, last_name, email, phone')->where('id', $row['userid'])->get('users');
			
			$pending_members[] = $user_query->row_array();
		}
		
		return $pending_members;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}//end class
