<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dash extends Loggedin_Controller
{
	function __construct()
	{
	  parent::__construct();
	  $this->load_modules();
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
	  
	}

function index(){
	$groupid = 103;
	echo $this->page_head();
	
	foreach($this->session->userdata['groups'] as $group)
	{
		echo '<div class="span9 well">'.$this->group_accordian($group['group_id']).'</div>';
	}
	
}
	
function page_head(){
	$data = $this->session->userdata['logged_in'];
	$header = $this->load->view('../../../../fluorish_dashboard/php/pages/header.php',$data, true);
	$header.= $this->load->view('partials/global_account_header_p.php','',true);	
	return $header;
	
}

function group_accordian($groupid){
	
	//
	$head_accordian = $this->head_accordian($groupid);
	
	//
	$group_col1 = $this->group_col1($groupid);
	 //
	$group_col2 = $this->group_col2();
	 //
	 //group_col3($groupid);
	 
	 $returnable = '<div class="span12">'.$head_accordian.'</div><br>
	 <div class="span6">'.$group_col1.'</div>
	 <div class="span6">'.$group_col2.'</div>';
	 
	 return $returnable;
}

function head_accordian($groupid){
	 //
	 $data = '<div>'.$this->accordian_head_left($groupid).'</div><div>'.$this->accordian_head_right($groupid).'</div>';
	 return $data;
}

function accordian_head_left($groupid){
		$data= $this->session->userdata['groups'][$groupid]['group_name'];
		$data.= $this->session->userdata['logged_in']['first_name'];
		return $data;
	}

function accordian_head_right($groupid){
		$this_group = $this->session->userdata['groups'][$groupid];
		$group_type = $this_group['group_type'];
		if($group_type == 1 || $group_type == 2)
		{
			// this is a lab
			// permission 1=manager, 0=user
			if($this_group['permission'] == 1)
				// manager get icons - Meesgaes/Lab Prefs
				{
					$data= '
					<a data-original-title="Messages" data-placement="top" data-toggle="tooltip" class="icon-messages" href="messages/'.$groupid.'"></a>
					<a data-original-title="Preferences" data-placement="top" data-toggle="tooltip" class="icon-'.$group_type.'-preferences" href="preferences/'.$groupid.'"></a>';
					}
			}
		else	
		if($this_group['group_type'] == 3 && $this_group['permission'] == 1)
		{
			// My Fluorish
				// All Icons with id Account Setings / Panels / Cytomerets / Inventory / Orders
				$data='
				<div class="span4 right">
				<a href="#" class="icon-my-preferences" data-toggle="tooltip" data-placement="top" data-original-title="Account Settings"></a> 
				<a href="#" class="icon-panels" data-toggle="tooltip" data-placement="top" data-original-title="Panels"></a> 
				<a href="#" class="icon-core" data-toggle="tooltip" data-placement="top" data-original-title="Cores and Instruments"></a> 
				<a href="#" class="icon-lab" data-toggle="tooltip" data-placement="top" data-original-title="Labs and Inventory"></a> 
				<a href="#" class="icon-orders" data-toggle="tooltip" data-placement="top" data-original-title="Orders"></a>
				</div>';
			}
		else
		$data = NULL;
			
			return $data;
	}

/*
*
* @todo Create unique identifiers for 
* @todo multiple addresses to determine which is primary, secondary, etc
*
*/
function group_col1($groupid){
	//get group profile image and group profile address
	$image = NULL;
	foreach($this->session->userdata['groups'][$groupid]['resources'] as $resource)
	{
		if ($resource['resource_type'] == 'address')
			$address = $resource;
		if ($resource['resource_type'] == 'image')
			$image = $resource;
	}
	
	if (!isset ($address))
	{
		$data['display'] = 'No Address Availabel<br><a href="#">Add Address</a>';
	}
	else
	$data['display'] = $this->address_module->display($address['id']);
	
	if (!isset ($image))
	{
		$data['myimage'] = 'No Image Availabel<br><a href="#">Add Image</a>';
	}
	else
	$data['myimage'] = '<img src="'.$image['path'].'" width="100px" height="100px" alt="No Image"/>';
	
	return '<div class="span3">'.$data['myimage'].'<br>'.$data['display'].'</div>';
	
}

function group_col2(){
	return '<div class="span3" style="background:blue"></div>';
}
	
function group_col3($groupid){
	
}

}