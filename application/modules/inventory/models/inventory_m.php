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
class Inventory_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	//this table doesn't have the prefix, so set the prefix to ''
		//~ $this->db->set_dbprefix('');
	}

//////////////////////////////////////////////////////////////////////////////////////////
	function save($data)
	{
		
	}

/**
 * creates an item in an inventory resource
 * 
 */
	function create($data)
	{
		if(isset($data['resource_id']))				$this->db->set('resource_id', $data['resource_id']);
		if(isset($data['catalog_number']))			$this->db->set('catalog_number', $data['catalog_number']);
		if(isset($data['item_name']))				$this->db->set('item_name', $data['item_name']);
		if(isset($data['vendorid']))				$this->db->set('vendorid', $data['vendorid']);
		if(isset($data['vendor_name']))				$this->db->set('vendor_name', $data['vendor_name']);
		if(isset($data['target']))					$this->db->set('target', $data['target']);
		if(isset($data['target_canonical']))		$this->db->set('target_canonical', $data['target_canonical']);
		if(isset($data['format']))					$this->db->set('format', $data['format']);
		if(isset($data['format_canonical']))		$this->db->set('format_canonical', $data['format_canonical']);
		if(isset($data['clone']))					$this->db->set('clone', $data['clone']);
		if(isset($data['isotype']))					$this->db->set('isotype', $data['isotype']);
		if(isset($data['unit_size']))				$this->db->set('unit_size', $data['unit_size']);
		if(isset($data['package_size']))			$this->db->set('package_size', $data['package_size']);
		if(isset($data['price']))					$this->db->set('price', $data['price']);
		if(isset($data['product_url']))				$this->db->set('product_url', $data['product_url']);
		if(isset($data['source_species']))			$this->db->set('source_species', $data['source_species']);
		if(isset($data['target_species']))			$this->db->set('target_species', $data['target_species']);
		if(isset($data['regulatory_status_id']))	$this->db->set('regulatory_status_id', $data['regulatory_status_id']);
		if(isset($data['regulatory_status']))		$this->db->set('regulatory_status', $data['regulatory_status']);
		if(isset($data['application_id']))			$this->db->set('application_id', $data['application_id']);
		if(isset($data['category_id']))				$this->db->set('category_id', $data['category_id']);
		if(isset($data['category']))				$this->db->set('category', $data['category']);
		if(isset($data['date_created']))			$this->db->set('date_created', $data['date_created']);
		if(isset($data['date_updated']))			$this->db->set('date_updated', $data['date_updated']);
				//~ $this->db->set('edit_modified', $data['edit_modified']);
		if(isset($data['description']))				$this->db->set('description', $data['description']);
		if(isset($data['titration_amount']))		$this->db->set('titration_amount', $data['titration_amount']);
		if(isset($data['amount_per_test']))			$this->db->set('amount_per_test', $data['amount_per_test']);
		if(isset($data['amount_per_test_units']))	$this->db->set('amount_per_test_units', $data['amount_per_test_units']);
		if(isset($data['remaining_tests']))			$this->db->set('remaining_tests', $data['remaining_tests']);
		if(isset($data['amount_on_hand']))			$this->db->set('amount_on_hand', $data['amount_on_hand']);
		if(isset($data['threshold']))				$this->db->set('threshold', $data['threshold']);
		if(isset($data['lot_number']))				$this->db->set('lot_number', $data['lot_number']);
		if(isset($data['expiration_date']))			$this->db->set('expiration_date', $data['expiration_date']);
		if(isset($data['location']))				$this->db->set('location', $data['location']);		
//~ if(isset($data['resource_id']))		 $this->db->set('useridadd', $data['useridadd']);
//~ if(isset($data['resource_id']))		 $this->db->set('useridmod', $data['useridmod']);
		
		
		
		$this->db->insert('inventory');

		return $this->db->affected_rows();
	}

//////////////////////////////////////////////////////////////////////////////////////////

	//~ function create_inventory($data)
	//~ {
		//~ // create an inventory type resource
		//~ $data['group_id'] = $this->input->post('group_id')
		//~ $data['resource_name']
		//~ $data['resource_type']
		//~ $data['xml']
		//~ $data['size']
		//~ $data['hash']
		//~ 
		//~ $resource = $this->db->insert('resources');
		//~ $data['resource_id'] = $this->db->insert_id();
		//~ 
		//~ // attach it to a group
		//~ 
		//~ 
		//~ 
		//~ $r_g = $this->db->insert('resource_group');
		//~ 
	//~ }

	function read($resource_id, $field='', $comparison='', $comp_value='')
	{
//~ die('resource_id: '.$resource_id.'<br/>$field: '.$field.'<br/>$comparison:'.$comparison.'<br/>$comp_value: '.$comp_value);
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
		
		$this->db->where('resource_id', $resource_id);
		$query = $this->db->get('inventory');
//~ die('resource_id: '.$resource_id.'<br/>$field: '.$field.'<br/>$comparison:'.$comparison.'<br/>$comp_value: '.$comp_value.'<br/><textarea>'.print_r($query, true).'</textarea>');		
		//~ $query = $this->db->query("SELECT * FROM cores WHERE coreid=".$coreid);
		if($query)
			return $query->result_array();
		else return false;
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function readAll()
	{
		$query = $this->db->get('inventory');

		return $query;
	}

//////////////////////////////////////////////////////////////////////////////////////////

	function update($data)
	{
		$this->db->where('id', $data['inventory_id']);
		if(isset($data['resource_id']))				$this->db->set('resource_id', $data['resource_id']);
		if(isset($data['catalog_number']))			$this->db->set('catalog_number', $data['catalog_number']);
		if(isset($data['item_name']))				$this->db->set('item_name', $data['item_name']);
		if(isset($data['vendorid']))				$this->db->set('vendorid', $data['vendorid']);
		if(isset($data['vendor_name']))				$this->db->set('vendor_name', $data['vendor_name']);
		if(isset($data['target']))					$this->db->set('target', $data['target']);
		if(isset($data['target_canonical']))		$this->db->set('target_canonical', $data['target_canonical']);
		if(isset($data['format']))					$this->db->set('format', $data['format']);
		if(isset($data['format_canonical']))		$this->db->set('format_canonical', $data['format_canonical']);
		if(isset($data['clone']))					$this->db->set('clone', $data['clone']);
		if(isset($data['isotype']))					$this->db->set('isotype', $data['isotype']);
		if(isset($data['unit_size']))				$this->db->set('unit_size', $data['unit_size']);
		if(isset($data['package_size']))			$this->db->set('package_size', $data['package_size']);
		if(isset($data['price']))					$this->db->set('price', $data['price']);
		if(isset($data['product_url']))				$this->db->set('product_url', $data['product_url']);
		if(isset($data['source_species']))			$this->db->set('source_species', $data['source_species']);
		if(isset($data['target_species']))			$this->db->set('target_species', $data['target_species']);
		if(isset($data['regulatory_status_id']))	$this->db->set('regulatory_status_id', $data['regulatory_status_id']);
		if(isset($data['regulatory_status']))		$this->db->set('regulatory_status', $data['regulatory_status']);
		if(isset($data['application_id']))			$this->db->set('application_id', $data['application_id']);
		if(isset($data['category_id']))				$this->db->set('category_id', $data['category_id']);
		if(isset($data['category']))				$this->db->set('category', $data['category']);
		if(isset($data['date_created']))			$this->db->set('date_created', $data['date_created']);
		if(isset($data['date_updated']))			$this->db->set('date_updated', $data['date_updated']);
		//edit_modified ... ?
		if(isset($data['description']))				$this->db->set('description', $data['description']);
		if(isset($data['titration_amount']))		$this->db->set('titration_amount', $data['titration_amount']);
		if(isset($data['amount_per_test']))			$this->db->set('amount_per_test', $data['amount_per_test']);
		if(isset($data['amount_per_test_units']))	$this->db->set('amount_per_test_units', $data['amount_per_test_units']);
		if(isset($data['remaining_tests']))			$this->db->set('remaining_tests', $data['remaining_tests']);
		if(isset($data['amount_on_hand']))			$this->db->set('amount_on_hand', $data['amount_on_hand']);
		if(isset($data['threshold']))				$this->db->set('threshold', $data['threshold']);
		if(isset($data['lot_number']))				$this->db->set('lot_number', $data['lot_number']);
		if(isset($data['expiration_date']))			$this->db->set('expiration_date', $data['expiration_date']);
		if(isset($data['location']))				$this->db->set('location', $data['location']);
		

		
		//~ $this->db->set('useridadd', $data['useridadd']);
		//~ $this->db->set('useridmod', $data['useridmod']);
		
		
		
		$this->db->update('inventory');

		return $this->db->affected_rows();
	}

//////////////////////////////////////////////////////////////////////////////////////////
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('inventory');

		return $this->db->affected_rows();
	}

	
	
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	
	//~ function get_managed_cores($userid)
	//~ {
		//~ $cores_managed = array();
		//~ //pull coreid from cores_model where userid = logged_in_userid
		//~ $sql = 'SELECT * FROM core_user_link WHERE userid='.$userid.' AND manager=1';
		//~ $query = $this->db->query($sql);
//debug
//~ //echo '<br/>cores_model/get_managed_cores() $sql:'.$sql;
//end debug
		//~ foreach ($query->result() as $row)
		//~ {
			//~ $sql = 'SELECT corename FROM cores WHERE coreid ="'. $row->coreid.'"';
//~ 
			//~ $q = $this->db->query($sql);
			//~ $r = $q->row();
	//~ 
	//~ 
//debug:
//~ //print_r($row);
//~ //echo '<br/>cores_model/get_managed_cores() $sql:'.$sql.'<br/>';
//end debug
			//~ $cores_managed[] = array(
				//~ 'coreid'=>$row->coreid, 
				//~ 'corename'=>$r->corename, 
				//~ 'status'=>$row->status
			//~ );
	//~ 
		//~ }
		//~ return $cores_managed;
	//~ }
	
//////////////////////////////////////////////////////////////////////////////////////////
	
	//~ function get_joined_cores($userid)
	//~ {
		//~ $cores_joined = array();
		//~ //pull coreid from cores_model where userid = logged_in_userid
		//~ $query = $this->db->query('SELECT * FROM core_user_link WHERE userid='.$userid.' AND manager=0');
		//~ foreach ($query->result() as $row)
		//~ {
			//~ $q = $this->db->query('SELECT corename FROM cores WHERE coreid ="'. $row->coreid.'"');
			//~ $r = $q->row();
	//~ 
			//~ $cores_joined[] = array('coreid'=>$row->coreid, 'corename'=>$r->corename, 'status'=>$row->status);
	//~ 
		//~ }
		//~ return $cores_joined;
	//~ }//end get_joined_cores()
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	
	
	//~ 
	//~ 
	//~ 
	//~ 
	//~ function get_available_cores($fl_user)
	//~ {
		//~ 
		//~ 
		//~ $cores_available = array();
	//~ 
	//~ //debug:
		//~ //print_r($this->data);
	//~ //end debug
	//~ 
	//~ 
		//~ //$institutionid = $this->ion_auth->get_user()->company;
		//~ $institutionid = $this->ion_auth->get_user()->company;
	//~ 
		//~ $query = $this->db->query('SELECT * FROM cores WHERE institutionID ='.$fl_user['institutionID'].' AND coreid NOT IN(
				//~ SELECT coreid FROM core_user_link WHERE userid = "'.$fl_user['id'].'")');
	//~ 
		//~ foreach ($query->result() as $row)
		//~ {
			//~ $cores_available[] = array
			//~ (
				//~ 'coreid'=>$row->coreid, 
				//~ 'corename'=>$row->corename, 
				//~ 'institutionID'=>$row->institutionID, 
				//~ 'access'=>$row->access, 
				//~ 'email'=>$row->email,
				//~ 'phone'=>$row->phone, 
				//~ 'URL'=>$row->URL, 
				//~ 'address_line1'=>$row->address_line1, 
				//~ 'address_line2'=>$row->address_line2, 
				//~ 'city'=>$row->city, 
				//~ 'state'=>$row->state, 
				//~ 'zip'=>$row->zip, 
				//~ 'country'=>$row->country, 
				//~ 'additional_information'=>$row->additional_information,
				//~ 'whitelist'=>$row->whitelist, 
				//~ 'whitelist_domains'=>$row->whitelist_domains 
			//~ );
		//~ }
	//~ 
	//~ 
		//~ return $cores_available;
	//~ }//end get_available_cores()
	

//////////////////////////////////////////////////////////////////////////////////////////

	//~ function get_whitelist($coreid)
	//~ {
		//~ $query = $this->db->query('SELECT whitelist, whitelist_domains FROM cores WHERE coreid ='.$coreid  );
		//~ return $query->row();
	//~ }
	
	
//////////////////////////////////////////////////////////////////////////////////////////

/** 
 * $permitted is usually 1 (auto-accepted), but if core is private it 
 * may be 0 so they have to wait for acceptance 
 */
	//~ function add_to_core($userid, $coreid, $permitted = 1)		
	//~ {
		//~ //$this->db->db_debug = true;
		//~ 
		//~ $data = array(
		   //~ 'coreid' => $coreid ,
		   //~ 'userid' => $userid ,
		   //~ 'status' => $permitted,
		   //~ 'manager' => 0
		//~ );
//~ 
		//~ if($this->db->insert('core_user_link', $data))
		//~ {
			//~ return TRUE;
		//~ }
		//~ else
			//~ return FALSE;
//~ 
		//~ // Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')
	//~ }
	
	
//~ //////////////////////////////////////////////////////////////////////////////////////////
//~ 
	//~ function remove_from_core($userid, $coreid)
	//~ {
		//~ if(	$this->db->where('coreid', $coreid)->where('userid', $userid)->delete('core_user_link')		)
		//~ {
			//~ return TRUE;					//'successful deletion of user '.$userid.' from core '.$coreid;
		//~ }
		//~ else
			//~ return FALSE;					//' deletion of user '.$userid.' from core '.$coreid.' FAILED';
//~ 
		//~ // Produces:
		//~ // DELETE FROM mytable
		//~ // WHERE id = $id
	//~ }
	
	

	
	//~ function get_pending_members($coreid)
	//~ {
	//~ // first, get all members where status = 0 from core_user_link,
	//~ // then access the fluorish users table to get all those userids' data
		//~ $this->load->model('fl_users_model');
		//~ 
		//~ $query = $this->db->where('coreid', $coreid)->where('status', 0)->get('core_user_link');
		//~ 
		//~ $userids = array();
		//~ $pending_members= array();
//~ 
		//~ foreach ($query->result_array() as $row)
		//~ {
			//~ $user_query = $this->db->select('id, first_name, last_name, email, phone')->where('id', $row['userid'])->get('users');
			//~ 
			//~ $pending_members[] = $user_query->row_array();
		//~ }
		//~ 
		//~ return $pending_members;
			//~ 
	//~ }
	
	//~ 
	//~ function get_members($coreid)
	//~ {
	//~ // first, get all members where status = 1 from core_user_link,
	//~ // then access the fluorish users table to get all those userids' data
		//~ $this->load->model('fl_users_model');
		//~ 
		//~ $query = $this->db->where('coreid', $coreid)->where('status', 1)->get('core_user_link');
		//~ 
		//~ $userids = array();
		//~ $pending_members= array();
//~ 
		//~ foreach ($query->result_array() as $row)
		//~ {
			//~ $user_query = $this->db->select('id, first_name, last_name, email, phone')->where('id', $row['userid'])->get('users');
			//~ 
			//~ $pending_members[] = $user_query->row_array();
		//~ }
		//~ 
		//~ return $pending_members;
	//~ }
	
	
	
	
	
	
	
	
	
	
	
	
	
}//end class
