
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends CI_Controller 
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
		$this->load->model('permission_test_m');

		

		
	}
	
	function index()
	{
		echo 'groups->index()';
	}
	
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
    
    function create_group()
    {

	    if($this->input->post() )
	    {
//		    echo '<textarea>'.print_r($this->input->post(), true).'</textarea>' ;
			$this->db->trans_start();
			
			$data = $this->input->post();

			$this->groups_m->create_group($data);
			$data['entityid'] = $this->db->insert_id();
		    
			$this->permission_test_m->create_address($data);
			$data['addressid'] = $this->db->insert_id();
//die(print_r($data, true));
			$this->permission_test_m->create_address_entity($data);
			$data['address_entity_id'] = $this->db->insert_id();
		    
		    
			$this->db->trans_complete();
		    if ($this->db->trans_status() === FALSE)
			    echo 'failed';
		    else	    
			    echo 'success';
	    }
		else 
		{
			 $this->load->view('header_v');
			 $this->load->view('partials/create_group_p');
		}
    }  
    


//////////////////////////////////////////////////////////////////////////////////
//    function available_groups()
//    {
//	    $this->data['available_groups'] = array();
////	    $all_groups = $this->permission_test_m->get_all_groups();
//	    $all_groups = $this->groups_m->get_all_groups();
////die('$all_groups:<br/><textarea>'.print_r($all_groups, true).'</textarea>');	    
//	    foreach($all_groups as $this_group)
//	    {
//		  $keepit = true;
//		  
//		    $groupid = $this_group['id'];
//		   foreach($this->session->userdata['groups'] as $sess_group)
//		   {
//			   if($this_group['id'] === $sess_group['group_id'])
//				   $keepit = false;
//		   }
//		   if($keepit)
//		   {
//			   $this->data['available_groups'][] = $this_group;
//		   }
//	    }
////die('all groups:<br/><textarea>'.print_r($all_groups, true).'</textarea>
////	<hr/>
////	my groups<textarea>'.print_r($this->session->userdata['groups'], true).'</textarea>
////	<hr/>
////	available groups<textarea>'.print_r($this->data['available_groups'], true).'</textarea>');
//	    
//	    
////	    $this->data['available_groups'] = $this->permission_test_m->get_all_groups();
//    }
    
    
    
////////////////////////////////////////////////////////////////////////////////
    
        function join_group($entityid='', $groupid='', $permission='', $entity_type='')
    {
		   $this->load->library('login');
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
//$this->session->set_userdata('groups', $this->groups_m->my_groups($entityid));
			$this->login->refresh_session();
			
			if($from_form)
				echo 'success';
//				redirect('/index.php/permission_test', 'refresh');
			else
//				return true;
				echo 'success';
		}
		else
		{
			if($from_form)
				echo 'failure';
//				redirect('/index.php/permission_test', 'refresh');
			else
//				return false;
				echo 'failure';
		}
		
    }

   
////////////////////////////////////////////////////////////////////////////////
    
    function remove_from_group($entityid, $groupid)
    {
	$this->load->library('login');
	
	    if($this->groups_m->remove_from_group($entityid, $groupid))
		{
	//update the session array
//			$this->session->set_userdata('groups', $this->groups_m->my_groups($entityid));
		    $this->login->refresh_session();
			return true;
		}
		else 
			return false;

    }
    
    
    
    
////////////////////////////////////////////////////////////////////////////////
    
}//end class