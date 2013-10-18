<?php
class Membership extends Loggedin_Controller //MY_Controller 
{
	//~ private $data = array();
	
////////////////////////////////////////////////////////////////////////////////
	function __construct()
    {
        parent::__construct();

	   $this->load->helper('url');
	   
	   $this->load->model('membership/membership_m');
	   $this->load->model('membership/resources_m');
	   $this->load->model('membership/groups_m');
	   $this->load->model('membership/users_m');
	   $this->load->model('addresses/addresses_m');

	   $this->load->model('panels/panels_m');

//~ echo 'membership/construct() <hr/>';
    }
////////////////////////////////////////////////////////////////////////////////
    
    function index()
    {
	//if not logged in, redirect to root level	
		if ( !$this->session->userdata('logged_in'))
        { 
//~ die('Not logged in, so membership/index() is redirecting to base_url() : '.base_url() );
            redirect(base_url());
        }        
//~ die('logged in, so proceeding with membership/index()');        
	    $this->data['users'] = $this->users_m->get_all_users();
	    
	// get all groups user is not a member of
	    $this->available_groups($this->session->userdata['logged_in']['userid']);
	//get user's groups
	    if(!empty($this->session->userdata['groups']))
	    {
		    foreach($this->session->userdata['groups'] as $this_group)
		    {
			    $this->data['my_groups'][$this_group['group_id']] = $this->groups_m->get_group_data($this_group['group_id']);
		    }		    
	    }
	    
	    $this->data = array_merge($this->data, $this->display_user($this->session->userdata['logged_in']['userid']) );
	    	    
	//load the primary views	    
	    $this->load->view('header_v');
	    $this->load->view('membership_v', $this->data);
    }
 
 
	/**
	 * Login
	 *
	 * A function to load the singular partial,
	 * the login form only
	 *
	 * @access	public
	 */
	 
	 function login()
	 {
		$this->load->view('partials/login_p');
	    
	 }
	 
 
 
//////////////////////////////////////////////////////////////////////////////////
/**
 *  builds the userdata part of the session array
 * 	 
 * 
 * returns array 
 */
	function get_session()
	{
		if(!isset($this->session->userdata['logged_in']))
		{
			redirect(base_url());
		}		
			$group_arr = array();
			$my_groups = $this->groups_m->my_groups_recursive($this->session->userdata['logged_in']['userid']);
			
			if($my_groups)
			{	
				foreach($my_groups as $group)
				{		
					$resources = $this->resources_m->get_resources_by_groupid($group['group_id']);
					$group['resources'] = $resources;
					
					$group_arr[$group['group_id']] = $group;					
				}
			}
//~ die('membership/get_session(): <pre>'.print_r($group_arr, true).'</pre>');
			return $group_arr;	
	}
//////////////////////////////////////////////////////////////////////////////////
//    

/**
 * returns an array of user data
 */
    function display_user($userid)
    {
	    $data['user'] = $this->users_m->get_user($userid);
	    $data['user_address'] = $this->addresses_m->get_addresses($userid);
	    
	    return $data;	 
	    //~ $this->load->view('partials/display_user_p', $data);   
    }
    
    

    
    
////////////////////////////////////////////////////////////////////////////////
/**
 * builds an array of groups that $userid does not belong to
 */
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

		return $this->data['available_groups'];
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
    
    
   /** get an array of a user's groups
    * parameter (optional): $userid - if no userid is passed in, uses the logged-in user's userid
    * 
    * returns array of groups and their resources
    */
    
    function get_groups_by_userid($userid = NULL) //$this->session->userdata['logged_in']['userid'])
    {
		if($userid === NULL && $this->session->userdata('logged_in') )
			return $this->session->userdata['groups'];
		else
		{
			$group_arr = array();
			$groups = $this->groups_m->my_groups_recursive($userid);
			
			if($groups)
			{	
				foreach($groups as $group)
				{		
					$resources = $this->resources_m->get_resources_by_groupid($group['group_id']);
					$group['resources'] = $resources;
					
					$group_arr[$group['group_id']] = $group;					
				}
			}
//~ die('membership/get_session(): <pre>'.print_r($group_arr, true).'</pre>');
			return $group_arr;	
		}
	}
    
    
	function institution_arr()
	{
		//die("the institution array:<textarea>". $this->entities_m->get_institution_arr()."</textarea>");
		return $this->entities_m->get_institution_arr();
	}
/**
 * returns an HTML <select> dropdown where <option value=$institution_id>$institution_name</option>
 */
    function institution_dropdown($institution_id = '')
    {
		$mem_module = $this->load->model('entities_m');
		$inst_arr = $this->entities_m->get_institution_arr();
		$dd = '<select name="institution" data-provide="typeahead" data-items="4">';
		
		foreach($inst_arr as $institution)
		{
			if($institution_id == $institution['id'])
				$selected = 'selected="selected"';
			else $selected = '';
			$dd .= '<option value="'.$institution['id'].'" '.$selected.' >'.$institution['institution_name'].'</option>';
		}
		
		$dd .= '</select>';
		return $dd;
	}
////////////////////////////////////////////////////////////////////////////////
	function get_institution_name($institution_id)
	{
		$this->load->model('institutions_m');
		$ins = $this->institutions_m->get_institution_by_id($institution_id);
		return $ins['institution_name'];
		
	}
}//end class
