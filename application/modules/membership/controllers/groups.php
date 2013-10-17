<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends Loggedin_Controller 
{

	
	private $groupid;
	private $group_type;
	private $group_name;
	private $long_group_name;
	private $parent_group;
	private $access;
	private $email;
	private $phone;
	private $additional_information;
	
	private $resources = array();
	
	
	
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('groups_m');
		$this->load->model('entities_m');
		$this->load->model('membership_m');

		
		$this->get_session();
		$this->load_modules();
	}
////////////////////////////////////////////////////////////////////////	
	function index()
	{
		echo 'groups->index()';
	}
	
////////////////////////////////////////////////////////////////////////
	function build_group($groupid)
	{
		$this_group = $this->groups_m->get_group_data($groupid);
		
		$this->groupid = $groupid;
		$this->group_type = $this_group['group_type'];
		$this->group_name = $this_group['group_name'];
		$this->long_group_name = $this_group['long_group_name'];
		$this->parent_group = $this_group['parent_group'];
		$this->access = $this_group['access'];
		$this->email = $this_group['email'];
		$this->phone = $this_group['phone'];
		$this->additional_information = $this_group['additional_information'];

die('<textarea>'.print_r($this_group, true).'</textarea>');
		
	}

////////////////////////////////////////////////////////////////////////////////
/**
 * Returns an HTML string of the group's display partial
 * 
 * must be echoed to display
 */
    function display($groupid)
    {
		
		foreach($this->session->userdata['groups'] as $group)
		{
			if($group['group_id'] == $groupid)
			{	
				$data['group'] = $group;
				return $this->load->view('partials/display_group_p', $data, true) ;
			
			}
		}
	}
////////////////////////////////////////////////////////////////////////
    //function edit($data=NULL)
    //~ function create_group($data = NULL)  
    function save($data = NULL)  
    {
//die("got to groups/save()");
	//first, make sure $data contains any parameters or $_POST values
	    if($data == NULL  )
	    {
		    $data = $this->input->post();
	    }
	    
	//next, either save the data or load the form partial
	    if($data != NULL)
	    {

		// if entity_id is set, do UPDATEs
		    if(isset($data['entity_id']) && $data['entity_id'] != '')
		    {
				$data['entity_name'] = $data['group_name'];	
//~ die('groups/save() about to update<br/>$data:<textarea>'.print_r($data, true).'</textarea>');
						
				$this->db->trans_start();
					$this->entities_m->update_entity($data);
					$this->groups_m->update($data);					
				$this->db->trans_complete();
				
				if ($this->db->trans_status() === FALSE)
					echo 'failed';
				else	    
					echo 'success';
			}
		    
		//if entity_id is NOT set, do INSERTs
		    else
		    {
				$data['entity_name'] = $data['group_name'];	

//~ die('groups/save() about to insert<br/>$data:<textarea>'.print_r($data, true).'</textarea>');
				$this->db->trans_start();
				//create the group-entity and get its id
					$data['entity_id'] = $this->entities_m->create_entity($data);									
				//create the group
					$data['group_result'] = $this->groups_m->create_group($data);				
				//add creator to group as manager				
					$data['join_result'] = $this->join_group($this->session->userdata['logged_in']['userid'], $data['entity_id'], 1, 1);
//die("data['join_result'] (meaning the success of join_group) is: ".$data['join_result']);
				$this->db->trans_complete();
			
			// now reload the session array so the new group is accessible

				
				if ($this->db->trans_status() === FALSE)
				{
				// now reload the session array so the new group is accessible
					$this->get_session();
					//echo 'failed';
					echo $data['entity_id'].'<hr/>'.$data['group_result'].'<hr/>'.$data['join_result'];
				}
				else	    
					echo 'success';
			}
	    }
		else 
		{
			 $this->load->view('partials/form_group_p');
		}
    }  
    
////////////////////////////////////////////////////////////////////////
    function edit($groupid = '')
    {
		$data = $this->groups_m->get_group_data($groupid);
		
		return $this->load->view('partials/form_group_p', $data, true);
	}

////////////////////////////////////////////////////////////////////////

    function available_groups()
    {
	    $this->data['available_groups'] = array();
	    $all_groups = $this->groups_m->get_all_groups();
	     
	    if(!empty($this->session->userdata['groups']) )
	    {
			foreach($all_groups as $this_group)
			{
			   $keepit = true;

				$groupid = $this_group['entity_id'];
			    foreach($this->session->userdata['groups'] as $sess_group)
			    {
				    if($this_group['entity_id'] === $sess_group['group_id'] || $this_group['group_type'] === '3')
					    $keepit = false;
			    }
			    if($keepit)
			    {
				    $this->data['available_groups'][] = $this_group;
			    }
			}
	    }
	    else
		    $this->data['available_groups'] = $all_groups;

		//~ return $this->data['available_groups'];
		return $this->load->view('partials/available_groups_p', $this->data, true);
    }
    
    
    
////////////////////////////////////////////////////////////////////////////////
    
    function join_group($entityid='', $groupid='', $permission='', $entity_type='')
    {
//~ die('you\'re trying to join groupid '.$groupid.' and your userid is '.$entityid);
	    $from_form = false;

			$data['entityid'] = $entityid;
			$data['groupid'] = $groupid;
			$data['permission'] = $permission;
			$data['entity_type'] = $entity_type;
//		}
		if($this->groups_m->in_group($entityid, $groupid))
			   die( 'You\'re already in this group' );
//pass values to the model		
		if($this->groups_m->join_group($data))
		{
//update the session array
			$this->get_session();
			
			if($from_form)
				echo 'success';
//				redirect('/membership', 'refresh');
			else
				return true;
				//echo 'success';
		}
		else
		{
			if($from_form)
				echo 'failure';
//				redirect('/membership', 'refresh');
			else
//				return false;
				echo 'failure';
		}
		
    }
////////////////////////////////////////////////////////////////////////////////
/**
 * returns a partial of users with a record in entity_groups table for the given groupid
 * where status = 0 (pending)
 * 
 * @param (int) $group_id - the entity_id of the group whose pending members will be shown in the returned partial
 * 
 */
	function pending_members($group_id)
	{
		$data['group'] = $this->get_array($group_id);
		$data['pending_members'] = array();
		//$users_module = $this->load->module('membership/users');
		$pending_members = $this->groups_m->pending_members($group_id);
		foreach ($pending_members as $user)
		{
			$user_arr = $this->users_module->get_array($user['entity_id']);
			$data['pending_members'][] = array_merge($user, $user_arr);
		}		
//die("groups/pending_members() DATA:<textarea>".print_r($data, true)."</textarea>");
		return $this->load->view('partials/group_pending_members_p', $data, true);
	}
////////////////////////////////////////////////////////////////////////////////
	function current_members($group_id)
	{		
		$data['group'] = $this->get_array($group_id);
		$data['current_members'] = array();
		//$usermodule = $this->load->module('membership/users');
		$current_members = $this->groups_m->current_members($group_id);
		foreach ($current_members as $user)
		{
			$user_arr = $this->users_module->get_array($user['entity_id']);
			//$user_arr = $usermodule->get_array($user['entity_id']);
			$data['current_members'][] = array_merge($user, $user_arr);
		}		
		return $this->load->view('partials/group_members_p', $data, true);
	}
////////////////////////////////////////////////////////////////////////////////
/**
 * if a user has joined a private (access=0) group, they must be accepted by a manager of that group
 * This function sets the entity_group 'status' field from 0 (pending) to 1 (accepted as member)
 * 
 * 
 */
   function accept_member($groupid, $userid)
   {
		return $this->groups_m->accept_member($groupid, $userid);
   }
////////////////////////////////////////////////////////////////////////////////
    
    function remove_from_group($entityid, $groupid)
    {
//	$this->load->library('login');
	
	    if($this->groups_m->remove_from_group($entityid, $groupid))
		{
	//update the session array
//			$this->session->set_userdata('groups', $this->groups_m->my_groups($entityid));
		    $this->get_session();
			echo 'success';
			//return true;
		}
		else 
			echo 'failure';
			//return false;

    }
    

////////////////////////////////////////////////////////////////////////
    function profile($groupid)
	{	
	    $data['group'] = $this->session->userdata['groups'][$groupid];
	    
		$this->load->view('header_v');
		$this->load->view('profile_group_v', $data);
	}
    
////////////////////////////////////////////////////////////////////////////////
/**
 * returns a php array of the given group's data
 * 
 * @param (int) $groupid - the entity_id of the group
 */
    function get_array($groupid)
    {
		$this_group = $this->groups_m->get_group_data($groupid);
		
		return $this_group;
	}
	
////////////////////////////////////////////////////////////////////////////////
/**
 * returns a string of XML  containing the given group's data
 * 
 * $param (int) $groupid - the entity_id of the group
 */
	function get_xml($groupid)
	{
		$this_group = $this->groups_m->get_group_data($groupid);
		
		$xml = '<?xml version="1.0" encoding="UTF-8"?>
	<group>
		<entity_id>'.$this_group['entity_id'].'</entity_id>
		<group_name>'.$this_group['group_name'].'</group_name>
		<long_group_name>'.$this_group['long_group_name'].'</long_group_name>
		<group_type>'.$this_group['group_type'].'</group_type>
		<phone>'.$this_group['phone'].'</phone>
		<email>'.$this_group['email'].'</email>
		<date_created>'.$this_group['timestamp'].'</date_created>
		<access>'.$this_group['access'].'</access>
		<additional_information>'.$this_group['additional_information'].'
		</additional_information>
	</group>';
		
		return $xml;
	}
	
/**
 * Gets a user's groups by their user_id, as opposed to getting groups for the logged-in user
 * 
 */
	function get_user_groups($userid)
	{
		$groups = $this->groups_m->my_groups_recursive($userid);
		return $groups;
	}
	
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
	function labs_managed($userid=''){return $this->groups_managed('lab', $userid);}		//redirects to groups_managed()
	function cores_managed($userid=''){return $this->groups_managed('core', $userid);}		//redirects to groups_managed()
	
	function groups_managed($group_type = '', $userid='')
	{
		$groups_mgd = array();
	//straighten out the group_type input	
		if($group_type == 'lab' || $group_type == 1)
		{
			$group_type_num = 1;
			$group_type_str = 'lab';
		}
		else if($group_type == 'core' || $group_type == 2)
		{
			$group_type_num = 2;
			$group_type_str = 'core';
		}
		else if($group_type == 'personal' || $group_type == 3)
		{
			$group_type_num = 3;
			$group_type_str = 'personal';
		}
		
		$data['group_type_str'] = $group_type_str;
		
		$userid = $this->session->userdata['logged_in']['userid'];
			
	//collect the user's groups of the proper type	
		if($group_type == '')
			$groups_mgd = $this->session['groups'];
		else
		{
			foreach($this->session->userdata['groups'] as $group)
			{
//~ die('membership/groups/groups_managed() $group:<textarea>'.print_r($group, true).'</textarea>');
				if($group['group_type'] == $group_type_num && $group['permission'] == 1)
				{
					$groups_mgd[$group['group_id']] = array("group_id" => $group['group_id'], "group_name" => $group['group_name'] , "permission" => $group['permission']);
				}
			}
		}
			$data['my_groups'] = $groups_mgd;
			$partial = $this->load->view('partials/groups_managed_p', $data, true);

			return $partial;

	}
	
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
	function labs_joined($userid=''){return $this->groups_joined('lab', $userid);}		//redirects to groups_managed()
	function cores_joined($userid=''){return $this->groups_joined('core', $userid);}	//redirects to groups_managed()

	function groups_joined($group_type='')
	{
		$groups_joined = array();
	//straighten out the group_type input	
		if($group_type == 'lab' || $group_type == 1)
		{
			$group_type_num = 1;
			$group_type_str = 'lab';
		}
		else if($group_type == 'core' || $group_type == 2)
		{
			$group_type_num = 2;
			$group_type_str = 'core';
		}
		else if($group_type == 'personal' || $group_type == 3)
		{
			$group_type_num = 3;
			$group_type_str = 'personal';
		}
		
		$data['group_type_str'] = $group_type_str;
		
		$userid = $this->session->userdata['logged_in']['userid'];
			
	//collect the user's groups of the proper type	
		if($group_type == '')
			$groups_joined = $this->session['groups'];
		else
		{
			foreach($this->session->userdata['groups'] as $group)
			{
				if($group['group_type'] == $group_type_num)
				{
					$groups_joined[$group['group_id']] = array("group_id" => $group['group_id'], "group_name" => $group['group_name'], "permission"=>$group['permission'], "status" => $group['status'] );
					
				}
			}
		}
			$data['my_groups'] = $groups_joined;
			$partial = $this->load->view('partials/groups_joined_p', $data, true);

			return $partial;

	}
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
	function groups_available($group_type='')
	{
		
	}
////////////////////////////////////////////////////////////////////////////////
	function group_info($group_id)
	{
		$data['group_data'] = $this->groups_m->get_group_data($group_id);
//~ die('membership/groups.php group_data:<textarea>'.print_r($data['group_data'], true).'</textarea>');	
		return $this->load->view('partials/group_information_p', $data, true);
	}
////////////////////////////////////////////////////////////////////////////////
}//end class
