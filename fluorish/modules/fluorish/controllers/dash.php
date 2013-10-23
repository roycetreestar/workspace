<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dash extends Loggedin_Controller
{
	public $data = array();
	
	function __construct()
	{
	  parent::__construct();
	  $this->load_modules();
	  $this->load->helper('array');
	  
	  defined('APP_NAME') || define('APP_NAME', 'Fluorish');
		defined('APP_VERSION') || define('APP_VERSION', 'v1.0');
		defined('APP_THEME') || define('APP_THEME', '../fluorish_dashboard/common/');
		// development / production
		defined('DEV') || define('DEV', true);
		// toggle google analytics code in head sectio
		defined('GA') || define('GA', false);
		// default level / used for getURL paths (should't be modified
		defined('LEVEL') || define('LEVEL', 0);
		// allow skin customization from the browser
		defined('SKIN_JS') || define('SKIN_JS', false);
		// 'fixed' or 'fluid'
		defined('LAYOUT_TYPE') || define('LAYOUT_TYPE', 'fixed');
		// MAIN stylesheet
		defined('STYLE') || define('STYLE', isset($_GET['style']) ? $_GET['style'] : 'style');
		// filename without extension (eg. "brown") or false for defaul
		defined('SKIN_CUSTOM') || define('SKIN_CUSTOM', false);
		// edit SKIN_CUSTOM abov
		defined('SKIN') || define('SKIN', SKIN_JS ? false : SKIN_CUSTOM);
		// function to allow url for Prototype and Live data in workflow
		function getURL(){
			$path = base_url().'fluorish_dashboard/common/'; 
			return $path;
			}
		function getAssets(){
			$path = base_url().'fluorish_dashboard/assets/'; 
			return $path;
			}
			
		function getTheme(){
			$path = base_url().'public/themes/fluorish2013/'; 
			return $path;
			}
		
		//$this->output->enable_profiler(TRUE);
	  
	}


function index(){

	echo $this->page_head();
	echo $this->dashboard_head();
	foreach($this->session->userdata['groups'] as $group)
	{
		echo $this->group_accordian($group['group_id']);
	}
	echo modules::run('catalog/search/index');
	echo '<div id="search_results" class=""></div>';
	
	echo $this->page_footer();
	
}

function my_account(){
	
		echo $this->page_head();
		
		$userid = $this->session->userdata['logged_in']['userid'];
		echo modules::run('membership/users/my_account', $userid);
		
		echo $this->page_footer();
}

function create(){
	
		echo $this->page_head();
		
		$userid = $this->session->userdata['logged_in']['userid'];
		echo modules::run('membership/groups/edit', $userid);
		
		echo $this->page_footer();
}
	
	
/*
 *
 * == Page Header ==
 *
 */	
function page_head(){
	$this->data = $this->session->userdata['logged_in'];
	$header = $this->load->view('../../../../fluorish_dashboard/php/pages/header.php',$this->data, true);
	return $header;
	
}
/*
 *
 * == Page Header ==
 *
 */	
function page_footer(){
	$footer = $this->load->view('../../../../fluorish_dashboard/php/pages/footer.php',$this->data, true);
	return $footer;
}
/*
 *
 * == Dashboard Head ==
 *
 */	
function dashboard_head(){
		$this->data = $this->session->userdata['groups'];
		$dashboard_head= $this->load->view('partials/global_account_header_p.php',$this->data, true);
		return $dashboard_head;
	
}
/*
 *
 * == Dashboard Accordian ==
 *
 */	
function group_accordian($group_id){
	
	//
	$this->data['groupid'] = $group_id;
	$this->head_accordian($group_id);
	$this->group_col1($group_id);
	$this->group_col2($group_id);
	$returnable = $this->load->view('acc',$this->data, true);
	 return $returnable;
}

function head_accordian($group_id){
	 //
	$this->accordian_head_left($group_id);
	$this->accordian_head_right($group_id);
	// return $data;
}

function accordian_head_left($group_id){
	$this->data['grouptype'] = $this->session->userdata['groups'][$group_id]['group_type'];
	$this->data['groupname']= $this->session->userdata['groups'][$group_id]['group_name'];
	$this->data['username'] = $this->session->userdata['logged_in']['first_name'].' '.$this->session->userdata['logged_in']['last_name'];
		//return $data;
	}

function accordian_head_right($group_id){
		$this_group = $this->session->userdata['groups'][$group_id];
		$group_type = $this_group['group_type'];
		if($group_type == 1 || $group_type == 2)
		{
			// this is a lab
			// permission 1=manager, 0=user
			if($this_group['permission'] == 1)
				// manager get icons - Meesgaes/Lab Prefs
				{
					$this->data['icons']= '
					<a data-original-title="Messages" data-placement="top" data-toggle="tooltip" class="icon-messages" href="messages/'.$group_id.'"></a>
					<a data-original-title="Preferences" data-placement="top" data-toggle="tooltip" class="icon-'.$group_type.'-preferences" href="preferences/'.$group_id.'"></a>';
					}
			}
		else	
		if($this_group['group_type'] == 3 && $this_group['permission'] == 1)
		{
			// My Fluorish
				// All Icons with id Account Setings / Panels / Cytomerets / Inventory / Orders
				// <a href="'.$group_id.'" class="icon-my-preferences" data-toggle="tooltip" data-placement="top" data-original-title="Account Settings"></a>
				$this->data['icons']='
				<a href="#" class="icon-panels" data-toggle="tooltip" data-placement="top" data-original-title="Panels"></a> 
				<a href="#" class="icon-core" data-toggle="tooltip" data-placement="top" data-original-title="Cores and Instruments"></a> 
				<a href="#" class="icon-lab" data-toggle="tooltip" data-placement="top" data-original-title="Labs and Inventory"></a> 
				<a href="#" class="icon-orders" data-toggle="tooltip" data-placement="top" data-original-title="Orders"></a>
				';
			}
		else
		$this->data = NULL;
			
			//return $data;
	}

/*
*
* @todo Create unique identifiers for 
* @todo multiple addresses to determine which is primary, secondary, etc
*
*/
function group_col1($group_id){
	//get group profile image and group profile address
	$image = NULL;
	foreach($this->session->userdata['groups'][$group_id]['resources'] as $resource)
	{
		if ($resource['resource_type'] == 'address')
			$address = $resource;
		if ($resource['resource_type'] == 'image')
			$image = $resource;
	}
	
	if (!isset ($image))
	{
		//$this->data['myimage'] = 'No Image Available <br><img width="125" height="91" src="'.getAssets().'images/no_image.png" alt="No Image">';
		$this->data['myimage'] = '
		<a data-original-title="Drop Picture Here" data-placement="top" data-toggle="tooltip" href="#">
		<img width="125" height="91" src="'.getAssets().'images/no_image.png" alt="No Image">
		</a>';
	}
	else
	$this->data['myimage'] = '<img src="'.$image['path'].'" width="100px" height="100px" alt="Image"/>';
	
	/*
	if (!isset ($address))
	{
		
		$this->data['display'] = 'No Address Availabel<br><a href="#">Add Address</a>';
	}
	else
	$this->data['display'] = $this->address_module->display($address['id']);
	*/
	
	
	$this->data['institution'] = $this->session->userdata['groups'][$group_id]['institution'];
	
	//$this->data['display'] = $this->address_module->display($this->data);
	//return $data;
	
}

function group_col2($group_id){
	
	foreach($this->session->userdata['groups'] as $group)
	{
		if($group['group_id'] == $group_id){
		$this->data['group_data'] = $this->session->userdata['groups'][$group_id]['additional_information'];
		$this->data['group_resources'] = $this->load->view('membership/partials/group_resources_p', $group, TRUE);
		}
	}
	
}
	
function group_col3($group_id){
	
}

}

/////
function my_account_view(){
	
		echo $this->page_head();
		
		echo $userid = $this->session->userdata['logged_in']['userid'];
		echo '<br>';
		echo $userid = $this->session->userdata['logged_in']['username'];echo '<br>';
		echo $userid = $this->session->userdata['logged_in']['first_name'];echo '<br>';
		echo $userid = $this->session->userdata['logged_in']['last_name'];echo '<br>';
		echo $userid = $this->session->userdata['logged_in']['phone'];echo '<br>';
		echo $userid = $this->session->userdata['logged_in']['status'];echo '<br>';
		echo $userid = $this->session->userdata['logged_in']['email'];echo '<br>';
		echo $userid = $this->session->userdata['logged_in']['institution'];echo '<br>';
		
		echo '<a href="my_account_edit" class="btn">edit</a>'; 
		
		echo $this->page_footer();
}
function my_account_edit(){
	
		echo $this->page_head();
		
		echo '<input type="text" value="'.$userid = $this->session->userdata['logged_in']['userid'].'">';echo '<br>';
		echo '<input type="text" value="'.$userid = $this->session->userdata['logged_in']['username'].'">';echo '<br>';
		echo '<input type="text" value="'.$userid = $this->session->userdata['logged_in']['first_name'].'">';echo '<br>';
		echo '<input type="text" value="'.$userid = $this->session->userdata['logged_in']['last_name'].'">';echo '<br>';
		echo '<input type="text" value="'.$userid = $this->session->userdata['logged_in']['phone'].'">';echo '<br>';
		echo '<input type="text" value="'.$userid = $this->session->userdata['logged_in']['status'].'">';echo '<br>';
		echo '<input type="text" value="'.$userid = $this->session->userdata['logged_in']['email'].'">';echo '<br>';
		echo '<input type="text" value="'.$userid = $this->session->userdata['logged_in']['institution'].'">';echo '<br>';
		
		echo '<a href="#" class="btn">save</a>'; 
		
		echo $this->page_footer();
}