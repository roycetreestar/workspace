<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loggedin_Controller extends MY_Controller {


	public $data = array();
	public $userid;
	
	

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('membership/resources_m');
		$this->load->model('membership/groups_m');
		$this->load->model('membership/users_m');
	
		//if user is logged in, refresh their session array
		if(isset($this->session->userdata['logged_in']))
		{	
			$this->get_session();
			$this->userid = $this->session->userdata['logged_in']['userid'];
		}

	}
	
////////////////////////////////////////////////////////////////////////////////
	function index()
	{
		if(!$this->is_logged_in() )
		{	
			redirect('fluorish/dash');		}	
		else
		{	$this->get_session();		}
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

    function do_login($success_path= 'fluorish/dash', $fail_path='' )//($username, $password)
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
if( !empty($email)|| !empty($password) )
{
		$this->membership_module = $this->load->module('membership');
//compare email/password to the database
		$result = $this->users_m->login($email, $password);
		
		if( $result )
		{
			$session_array = array(
					'userid' => $result['entity_id'],
					'username' => $result['user_name'],
					'first_name'=>$result['first_name'],
					'last_name'=>$result['last_name'],
					'phone'=>$result['phone'],
					'status'=>$result['status'],
					'email'=>$result['email'],
					'institution_id'=>$result['institution'],
					'institution'=> $this->membership_module->get_institution_name($result['institution'])
					);
							
			$this->session->set_userdata('logged_in', $session_array);
	
			$this->get_session();
		//successful login
			redirect(base_url().$success_path);
		}
}
		//else
		//{
			//$data['message'] = 'Incorrect email address or password';
			//$this->load->view('partials/login_p', $data);
		//}
	//failed login
		redirect(base_url().$fail_path);
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

	
////////////////////////////////////////////////////////////////////////////////
/**
 * Logs the user out by unsetting the session's userdata and destroying 
 * the session's array then redirecting the user to the dashboard page.
 */
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();

		redirect('fluorish/dash', 'refresh');
		
		
	}
    

}//end class

