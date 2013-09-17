<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loggedin_Controller extends MY_Controller {


	public $data = array();

	public function __construct() 
	{
		parent::__construct();
//		if (is_logged_in() == FALSE) 
//		{
//			$this->session->set_userdata('return_to', uri_string());
//			$this->session->set_flashdata('message', 'You need to log in.');
//			redirect('/home');
//		}
//		$this->load->library('session');
		$this->load->model('membership/resources_m');
		$this->load->model('membership/groups_m');
		$this->load->model('membership/users_m');
		
		//if user is logged in, refresh their session array
		if(isset($this->session->userdata['logged_in']))
			$this->get_session();

	}
	
////////////////////////////////////////////////////////////////////////////////
	function index()
	{
		if(!$this->is_logged_in() )
		{
				//~ $this->load->view('landing_page_v') ;
			redirect('backstage');
		}	
		else
		{
			$this->get_session();
		}
	}
	
	
////////////////////////////////////////////////////////////////////////////////
    function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true)
			return false;
        else return true;
    }
    
////////////////////////////////////////////////////////////////////////////////

    function do_login()//($username, $password)
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

//compare username/password to the database
		$result = $this->users_m->login($username, $password);
		
		if( $result )
		{
			$session_array = array('userid' => $result['entity_id'], 'username' => $result['user_name']);
			
			$this->session->set_userdata('logged_in', $session_array);
	
			$this->get_session();

	
//die('login/get_session: <br/><textarea>'.print_r($this->session->userdata, true).'</textarea>');			
//			 redirect('membership', 'refresh');
			//~ redirect('membership/users/profile/'.$result['entity_id'], 'refresh');
			//~ redirect("/");
			redirect(base_url());
		}
		else
		{
			$data['message'] = 'Incorrect username or password';
			$this->load->view('partials/login_p', $data);
		}
	}
 
////////////////////////////////////////////////////////////////////////////////
/**
 * 	**get_session() functionality lives in the membership module **
 * 	
 * sets the session->userdata array with the logged-in user's
 * groups and resources
 * 
 * does not return values (directly sets the session array)
 */
function get_session()
{
	$membership = $this->load->module('membership');
	$this->session->set_userdata('groups', $membership->get_session());
}
	//~ function get_session()
	//~ {
//~ //		$this->session->set_userdata('groups', $this->groups_m->my_groups($result['userid']));
		//~ if(!isset($this->session->userdata['logged_in']))
		//~ {
			//~ redirect('membership/users');
		//~ }
		//~ //set up the groups session subarray			
			//~ $group_arr = array();
//~ //
//~ //		$my_groups = $this->groups_m->my_groups($this->session->userdata['logged_in']['userid']);
			//~ $my_groups = $this->groups_m->my_groups_recursive($this->session->userdata['logged_in']['userid']);
//~ //echo '<hr/>$my_groups: <br/><textarea>'.print_r($my_groups, true).'</textarea><hr/>';		
		//~ if($my_groups)
			//~ foreach($my_groups as $group)
			//~ {		
				//~ $resources = $this->resources_m->get_resources_by_groupid($group['group_id']);
				//~ $group['resources'] = $resources;
				//~ 
				//~ $group_arr[$group['group_id']] = $group;
				//~ 
			//~ }
			//~ 
//~ //die('login/get_session: <br/><textarea>'.print_r($group_arr, true).'</textarea>');
			//~ $this->session->set_userdata('groups',$group_arr);
//~ //die('login/get_session: <br/><textarea>'.print_r($this->session->userdata, true).'</textarea>');		
	//~ }
	
////////////////////////////////////////////////////////////////////////////////

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
//		$this->load->view('landing_page_v');
		//~ redirect('backstage', 'refresh');
		redirect('fluorish_gui', 'refresh');
		
		
	}
    

}//end class

