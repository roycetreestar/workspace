<?php
class Permission_test extends MX_Controller 
{
	private $data = array();
	
////////////////////////////////////////////////////////////////////////////////
	function __construct()
    {
        parent::__construct();

//        $this->load->library('form_validation');
//        $this->form_validation->CI =& $this;
	   
	   $this->load->helper('url');
//	   $this->load->library('jquery');
	   $this->load->model('permission_test/permission_test_m');
	   $this->load->model('permission_test/resources_m');
	   $this->load->model('permission_test/groups_m');
	   $this->load->model('permission_test/users_m');
	   
	   if ( !$this->session->userdata('logged_in'))
        { 
            redirect('permission_test/users');
        }
	   
    }
////////////////////////////////////////////////////////////////////////////////
    
    function index()
    {
//	    echo '<h1 style="color:green">From the controller</h1>';
	    
//	    $this->data['users'] = $this->permission_test_m->get_all_users();
	    $this->data['users'] = $this->users_m->get_all_users();
	    
// get all groups
	    $this->available_groups();
//get user's groups
//		$this->data['my_groups'] = $this->my_groups($this->session->userdata['logged_in']['userid']);
//		$this->session->userdata['groups'] = $this->permission_test_m->my_groups($this->session->userdata['logged_in']['userid']);

	    if(!empty($this->session->userdata['groups']))
	    {
		    foreach($this->session->userdata['groups'] as $this_group)
		    {
			    $this->data['my_groups'][$this_group['group_id']] = $this->groups_m->get_group_data($this_group['group_id']);
		    }
		    
	    }
//die('<textarea>'.print_r($this->data, true).'</textarea>');
	    
	    $this->display_user($this->session->userdata['logged_in']['userid']);
	    
	    
//load the primary views	    
	    $this->load->view('header_v');
	    $this->load->view('permission_test_v', $this->data);
	    
	    
    }
    
//////////////////////////////////////////////////////////////////////////////////
//    
//    function create_user()
//    {
////die('you got to register()');
//	    if($this->input->post() )
//	    {
////die('create_user() called');
//			$this->db->trans_start();
//			
//			$this->data = $this->input->post();
////				$this->permission_test_m->create_user($this->data);
//				$this->users_m->create_user($this->data);
//				$this->data['entityid'] = $this->db->insert_id();
//				
//				$this->permission_test_m->create_address($this->data);
//				$this->data['addressid'] = $this->db->insert_id();
//				
//				$this->permission_test_m->create_address_entity($this->data);
//				$this->data['address_entity_id'] = $this->db->insert_id();
//				
//			$this->db->trans_complete();
//			
//			if ($this->db->trans_status() === FALSE)
//			{
//				echo '<h1> fail</h1>';
//			} 
//			else
//			{
//				echo '<h1> you\'re registered</h1>';
//			}
//		 		  
//	    }
//	    else 
//	    {
//		     $this->load->view('header_v');
//			$this->load->view('partials/create_user_p');
//	    }
//    }
    
//////////////////////////////////////////////////////////////////////////////////
//    
//    function create_group()
//    {
//
//	    if($this->input->post() )
//	    {
////		    echo '<textarea>'.print_r($this->input->post(), true).'</textarea>' ;
//			$this->db->trans_start();
//			
//			$data = $this->input->post();
//
//			$this->permission_test_m->create_group($data);
//			$data['entityid'] = $this->db->insert_id();
//		    
//			$this->permission_test_m->create_address($data);
//			$data['addressid'] = $this->db->insert_id();
////die(print_r($data, true));
//			$this->permission_test_m->create_address_entity($data);
//			$data['address_entity_id'] = $this->db->insert_id();
//		    
//		    
//			$this->db->trans_complete();
//		    if ($this->db->trans_status() === FALSE)
//			    echo 'failed';
//		    else	    
//			    echo 'success';
//	    }
//		else 
//		{
//			 $this->load->view('header_v');
//			 $this->load->view('partials/create_group_p');
//		}
//    }  
//////////////////////////////////////////////////////////////////////////////////
//    
//    function create_resource()
//    {
//
//	    if($this->input->post() )
//	    {
////		    echo '<textarea>'.print_r($this->input->post(), true).'</textarea>' ;
//		    $data = $this->input->post();
//
//
////		    if($this->permission_test_m->create_resource($data))
////			    echo 'success';
////		    else	    
////			    echo 'fail';
//	    }
////$this->permission_test_m->create_resource($data);
//$this->resources_m->create_resource($data);	    
////		else 
////		{
////			 $this->load->view('header_v');
////			 $this->load->view('partials/create_resource_p');
////		}
//
//redirect('permission_test/index', 'refresh');
//
//    }  
////////////////////////////////////////////////////////////////////////////////
    function view_users()
    {
	    $this->data['users'] = $this->permission_test_m->get_all_users();
	    
	    
    }
    
    
////////////////////////////////////////////////////////////////////////////////
    
    function display_user($userid)
    {
//	    echo 'view_user() not working yet';
	    $this->data['user'] = $this->users_m->get_user($userid);
	    $this->data['user_address'] = $this->permission_test_m->get_addresses($userid);
	    
//	    $this->load->view('partials/display_user_p', $data);
	    
    }
    
    

    
    
////////////////////////////////////////////////////////////////////////////////
    function available_groups()
    {
	    $this->data['available_groups'] = array();
//	    $all_groups = $this->permission_test_m->get_all_groups();
	    $all_groups = $this->groups_m->get_all_groups();
//die('$all_groups:<br/><textarea>'.print_r($all_groups, true).'</textarea>');	 
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
//die('all groups:<br/><textarea>'.print_r($all_groups, true).'</textarea>
//	<hr/>
//	my groups<textarea>'.print_r($this->session->userdata['groups'], true).'</textarea>
//	<hr/>
//	available groups<textarea>'.print_r($this->data['available_groups'], true).'</textarea>');
	    
	    
//	    $this->data['available_groups'] = $this->permission_test_m->get_all_groups();
    }
    
    
    
////////////////////////////////////////////////////////////////////////////////
/**
 * 
 * @param type $entityid
 * @param type $groupid
 * @param type $permission
 * @param type $entity_type
 */
    function join_group($entityid='', $groupid='', $permission='', $entity_type='')
    {
	    $from_form = false;

			$data['entityid'] = $entityid;
			$data['groupid'] = $groupid;
			$data['permission'] = $permission;
			$data['entity_type'] = $entity_type;

if($this->groups_m->in_group($entityid, $groupid))
	   die( 'You\'re already in this group' );
//pass values to the model		
		if($this->groups_m->join_group($data))
		{
//update the session array
$this->session->set_userdata('groups', $this->groups_m->my_groups($entityid));	
			
			if($from_form)
				echo 'success';

			else

				echo 'success';
		}
		else
		{
			if($from_form)
				echo 'failure';
			else
				echo 'failure';
		}
		
    }

    /**
     * checks entity_group table for $entityid. if found, sets an array
     * 
     * @param type $entityid
     * 
     * 
     */
//    function my_groups($entityid)
//    {
//	    $my_groups = $this->permission_test_m->my_groups($entityid);
//	    if($my_groups)
//		    return $my_groups;
//	    else 
//		    return false;
	    
//    }
    
    
//	function my_resources($entityid)
//	{
//		$resource_arr = array();
//		foreach( $this->session->userdata['groups'] as $group)
//		{
//			
//		}
//	    
//	    
//	    
//	}
    
    
//    function display_resource($resourceid)
//    {
//	   $data['rdata'] = $this->resources_m->get_resource_by_id($resourceid);
//	   
//	   $this->load->view('partials/display_resource_p', $data);
//    }

    
    
//    function remove_from_group($entityid, $groupid)
//    {
//	    //YOU'RE HERE!!!
//    }
    
    
////////////////////////////////////////////////////////////////////////////////
}//end class