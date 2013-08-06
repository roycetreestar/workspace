<?php
class Membership extends Loggedin_Controller //MY_Controller 
{
	//~ private $data = array();
	
////////////////////////////////////////////////////////////////////////////////
	function __construct()
    {
        parent::__construct();

//        $this->load->library('form_validation');
//        $this->form_validation->CI =& $this;
	   
	   $this->load->helper('url');
//	   $this->load->library('jquery');
	   
	   $this->load->model('membership/membership_m');
	   $this->load->model('membership/resources_m');
	   $this->load->model('membership/groups_m');
	   $this->load->model('membership/users_m');
	   $this->load->model('membership/addresses_m');
	   //~ $this->load->model('membership/cytometers_m');
	   $this->load->model('membership/panels_m');
	   
	   
	   if ( !$this->session->userdata('logged_in'))
        { 
            redirect('membership/users');
        }
//	   $this->get_session();
    }
////////////////////////////////////////////////////////////////////////////////
    
    function index()
    {
	    $this->data['users'] = $this->users_m->get_all_users();
	    
// get all groups
	    $this->available_groups($this->session->userdata['logged_in']['userid']);
//get user's groups

	    if(!empty($this->session->userdata['groups']))
	    {
		    foreach($this->session->userdata['groups'] as $this_group)
		    {
			    $this->data['my_groups'][$this_group['group_id']] = $this->groups_m->get_group_data($this_group['group_id']);
		    }
		    
	    }
	    
	    $this->display_user($this->session->userdata['logged_in']['userid']);
	    
	    
//load the primary views	    
	    $this->load->view('header_v');
	    $this->load->view('membership_v', $this->data);
	    
	    
    }
 
//////////////////////////////////////////////////////////////////////////////////
//    
    function display_user($userid)
    {
	    $this->data['user'] = $this->users_m->get_user($userid);
	    $this->data['user_address'] = $this->addresses_m->get_addresses($userid);
	    	    
    }
    
    

    
    
////////////////////////////////////////////////////////////////////////////////
    function available_groups($userid)
    {
	    $this->data['available_groups'] = array();

//	    $all_groups = $this->groups_m->get_all_groups();
	    $all_groups = $this->groups_m->get_available_groups($userid);

	    if(!empty($this->session->userdata['groups']) )
	    {
			foreach($all_groups as $this_group)
			{
			   $is_available = true;

				$groupid = $this_group['entity_id'];
			    foreach($this->session->userdata['groups'] as $sess_group)
			    {
//echo $this_group['group_name'].' group_type: '.$this_group['group_type'].'<br/>';				   
				    if($this_group['entity_id'] === $sess_group['group_id'] )
					    $is_available = false;
			    }
			    if($is_available)
			    {
				    $this->data['available_groups'][] = $this_group;
			    }
			}
	    }
	    else
		    $this->data['available_groups'] = $all_groups;

    }
    
 /**
  * retrieves all managed groups (permission == 1) from the session array
  * and returns a string containing the resulting <select> element
  */   
function managed_groups_dropdown()
{
	$dd = '<select id="managed_groups_dropdown" name="group_id" >';
	$dd.= '<option value="">choose from groups you manage</option>';
	foreach($this->session->userdata['groups'] as $group)
	{
		if($group['permission'] ==  1)
		{
//~ echo 'group_id '.$group['group_id'].' added to dropdown<br/>';
			$dd .= '<option value="'.$group['group_id'].'">'.$group['group_name'].'</option>';
		}
//~ else
//~ echo 'group_id '.$group['group_id'].' NOT added to dropdown<br/>';
	}
	$dd.='</select>';
//~ echo '<hr/>'.$dd.'<hr/>';
	return $dd;
}
    
////////////////////////////////////////////////////////////////////////////////
}//end class
