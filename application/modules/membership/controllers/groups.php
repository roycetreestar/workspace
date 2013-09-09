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
	//first, make sure $data contains any parameters or $_POST values
	    if($data == NULL  )
	    {
		    $data = $this->input->post();
	    }
	    
	//next, either save the data or load the form partial
	    if($data != NULL)
	    {
		// if entity_id is set, do UPDATEs
		    if(isset($data['entity_id']))
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
						
				$this->db->trans_start();
				//create the group-entity and get its id
					$data['entity_id'] = $this->entities_m->create_entity($data);									
				//create the group
					$this->groups_m->create_group($data);				
				//add creator to group as manager				
					$this->join_group($this->session->userdata['logged_in']['userid'], $data['entity_id'], 1, 0);
				$this->db->trans_complete();
				
				if ($this->db->trans_status() === FALSE)
					echo 'failed';
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

				$groupid = $this_group['id'];
			    foreach($this->session->userdata['groups'] as $sess_group)
			    {
				    if($this_group['id'] === $sess_group['group_id'])
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

    }
    
    
    
////////////////////////////////////////////////////////////////////////////////
    
    function join_group($entityid='', $groupid='', $permission='', $entity_type='')
    {

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
//				return true;
				echo 'success';
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
    function get_array($groupid)
    {
		$this_group = $this->groups_m->get_group_data($groupid);
		
		return $this_group;
	}
	
////////////////////////////////////////////////////////////////////////////////
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
	
	
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
}//end class
