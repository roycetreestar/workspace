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
class Inventory_show_fields_m extends CI_Model
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
		$this->db->set('userid', $data['userid']);
		$this->db->set('name', $data['name']);
		$this->db->set('show', $data['show']);
		$this->db->set('order', $data['order']);
			
		$this->db->insert('inventory_show_fields');

		return $this->db->affected_rows();
	}
	function new_user($userid)
	{
		
		
		$this->db->set('userid', $userid)->set('field_name', 'catalog_number' )			->set('show', 'y')->set('order', 1)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'item_name' )				->set('show', 'y')->set('order', 2)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'vendor_name' )			->set('show', 'y')->set('order', 3)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'target' )					->set('show', 'y')->set('order', 4)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'format' )					->set('show', 'y')->set('order', 5)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'clone' )					->set('show', 'y')->set('order', 6)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'isotype' )				->set('show', 'y')->set('order', 7)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'unit_size' )				->set('show', 'y')->set('order', 8)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'package_size' )			->set('show', 'y')->set('order', 9)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'price' )					->set('show', 'y')->set('order', 10)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'product_url' )			->set('show', 'y')->set('order', 11)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'source_species' )			->set('show', 'y')->set('order', 12)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'target_species' )			->set('show', 'y')->set('order', 13)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'regulatory_status' )		->set('show', 'n')->set('order', 14)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'applications' )			->set('show', 'n')->set('order', 15)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'category' )				->set('show', 'n')->set('order', 16)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'date_created' )			->set('show', 'n')->set('order', 17)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'date_updated' )			->set('show', 'n')->set('order', 18)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'edit_modified' )			->set('show', 'n')->set('order', 19)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'description' )			->set('show', 'y')->set('order', 20)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'amount_per_test' )		->set('show', 'y')->set('order', 21)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'amount_per_test_units' )	->set('show', 'y')->set('order', 22)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'remaining_tests' )		->set('show', 'y')->set('order', 23)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'threshold' )				->set('show', 'y')->set('order', 24)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'lot_number' )				->set('show', 'n')->set('order', 25)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'expiration_date' )		->set('show', 'n')->set('order', 26)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'location' )				->set('show', 'y')->set('order', 27)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'titration_amount' )		->set('show', 'y')->set('order', 28)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'id' )						->set('show', 'n')->set('order', 29)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'format_canonical' )		->set('show', 'y')->set('order', 30)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'application_id' )			->set('show', 'n')->set('order', 31)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'user_id_add' )			->set('show', 'y')->set('order', 32)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'user_id_mod' )			->set('show', 'y')->set('order', 33)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'resource_id' )			->set('show', 'y')->set('order', 34)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'target_canonical' )		->set('show', 'y')->set('order', 35)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'remaining_tests' )		->set('show', 'n')->set('order', 36)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'user_id_add' )			->set('show', 'n')->set('order', 37)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'user_id_mod' )			->set('show', 'n')->set('order', 38)->insert('inventory_show_fields');
		$this->db->set('userid', $userid)->set('field_name', 'amount_on_hand' )			->set('show', 'y')->set('order', 39)->insert('inventory_show_fields');
		

		
		
	}
//////////////////////////////////////////////////////////////////////////////////////////

	function read_by_labid($labid)
	{
		$this->db->where('labid', $labid);
		$query = $this->db->get('inventory_show_fields');
		
		//~ $query = $this->db->query("SELECT * FROM cores WHERE coreid=".$coreid);
		
		return $query->results_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function read_by_userid($userid)
	{
		$this->db->where('userid', $userid);
		$query = $this->db->get('inventory_show_fields');
		
		//~ $query = $this->db->query("SELECT * FROM cores WHERE coreid=".$coreid);
		
		return $query->result_array();
	}
	
//////////////////////////////////////////////////////////////////////////////////////////

	function readAll()
	{
		$query = $this->db->get('inventory_show_fields');

		return $query;
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function update($data)
	{
	
		//~ $this->db->where('custom_reagent_id', $data['id']);
	
		$this->db->where('userid', $data['userid']);
		$this->db->where('field_name', $data['field_name']);
		$this->db->set('show', $data['show']);
		$this->db->set('order', $data['order']);
			
		$this->db->update('inventory_show_fields');
		
		return $this->db->affected_rows();
	}

//////////////////////////////////////////////////////////////////////////////////////////
	
	function delete_userid($userid)
	{
		$this->db->where('userid', $userid);
		$this->db->delete('inventory_show_fields');

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
