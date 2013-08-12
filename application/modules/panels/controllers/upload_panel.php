<?php
/**
 *  ported from fluorish's /user/home.php
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// class Home extends MY_Controller {
class Upload_panel extends Secure_Controller 
{


	public $data = array();

	
//////////////////////////////////////////////////////////////////////////////////////////
	function __construct()
	{
		parent::__construct();
	
		// 		$this->load->database();
		// 		$this->load->helper('url');
	
		// 		$this->load->library('grocery_CRUD');
		
		$this->load->helper(array('form', 'url'));
		
      $this->load->model('user_panels_model');
      $this->load->model('user_panels_citations_model');
		
			//~ if($user = $this->ion_auth->get_user())
			//~ {
				//~ //echo '<h1 style=color:"green">Got ion_auth->get_user()</h1> userid:'.$user->id;
				//~ $this->data['userid'] = $user->id;
			//~ }
			
			

			
			
			
	}// end __construct()
	
//////////////////////////////////////////////////////////////////////////////////////////
	function index($response = '') 
	{
		$this->template
			//~ ->append_js('jquery-1.9.1.min.js')
			//~ ->append_js('jquery-ui.js')
			//~ ->append_js('bootstrap.js') 
			->append_js('module::panels.js') 
			//~ ->append_css('bootstrap.css')
			//~ ->append_css('jquery-ui.css')
			->append_css('module::panels.css')
			 
			;

		//~ $this->template->build('panels_view', $this->data);
		
		//~ return $this->load->view('upload_form_partial', $response);
		$this->template->build('upload_form_partial', array('error' => ' ' ));
	
	}
	

	//~ function do_upload()
	//~ {
//~ 
		//~ $config['upload_path'] = 'uploads/panels';
		//~ $config['allowed_types'] = 'xml|txt';
//~ 
//~ 
		//~ $this->load->library('upload', $config);
//~ 
		//~ if ( ! $this->upload->do_upload())
		//~ {
			//~ echo '! $this->upload->do_upload()';
			//~ $error = array('error' => $this->upload->display_errors());
//~ 
//~ echo $this->upload->display_errors();
//~ 
			//~ $this->template->build('upload_form_partial', $error);
		//~ }
		//~ else
		//~ {
			//~ $data = array('upload_data' => $this->upload->data());
//~ 
			//~ $this->template->build('upload_success_partial', $data);
		//~ }
	//~ }
	
	
	
	
	
	///////////////////////////////////////////////////////////////////
function do_upload()
{
	
	//~ echo 'do_upload() is returning this.<br/><br/>We got:<br/>'.var_dump($_FILES);
	//~ 
	$uploads_folder = "uploads/panels/";
	$allowedExts = array("xml", "txt");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if (in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			$data['uploadError'] = "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{

			
			//~ echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			//~ echo "Type: " . $_FILES["file"]["type"] . "<br>";
			//~ echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			//~ echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

			if (file_exists($uploads_folder . $_FILES["file"]["name"]))
			{
				$data['uploadError'] =  $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{			
			// set up the data array for passing to user_panels_model	
				$panel_arr = $this->parse_panel(file_get_contents($_FILES['file']['tmp_name']));
			
			//check if the user already has this panel in their account (via the hash)	
				if($this->user_panels_model->hash_exists($panel_arr['hash']) > 0)
				{
/* $todo connect the error message to pyro form error message functionality */
					$color='red';
					$data['response'] = '<h1 style="color:'.$color.'">This panel matches another panel in your account, so this panel has not been added.</h1>';
				}
				else
				{
					echo 'hash doesn\'t exist. good to go!';
					$insert = $this->user_panels_model->create($panel_arr);
					
					$color = '';
					
					if($insert > 0)
					{ $color = 'green';
						$data['response'] = '<h1 style="color:'.$color.'">SUCCESS!!! your panel has been saved</h1>'; 
					}
					else 
					{
						$color = 'red';
						$data['response'] = '<h1 style="color:'.$color.'">FAILURE TO INSERT!!! your panel has NOT been saved</h1>';
					}
					
					
				}
				$this->template->build('upload_form_partial', $data);
			}
		}
	}
	else
	{
		echo "Invalid file type";
	}
}
  //////////////////////////////////////////////////////////////////////////
	
	function parse_panel($file)
	{		
		$panel_arr = array();
		$panel_arr['userid'] 			= $this->data['fl_user']['id'];			//????????????????????????????????????????
		
	/* turn into string */	
		$panel_arr['panel_string']		= strval($file);
		
	/* make the xml an xmlObject for easier parsing out of the db fields */
		$panel_arr['panelXML'] 			= simplexml_load_string(trim($panel_arr['panel_string']));		
	
	/* mine the Experiment tag */	
		if($panel_arr['panelXML']->Experiment)
		{	
			$panel_arr['name'] 			= $panel_arr['panelXML']->Experiment['name'];
			$panel_arr['lab'] 			= $panel_arr['panelXML']->Experiment['lab'];
			$panel_arr['description'] 	= $panel_arr['panelXML']->Experiment['description'];
			$panel_arr['date'] 			= $panel_arr['panelXML']->Experiment['date'];
			$panel_arr['investigator']	= $panel_arr['panelXML']->Experiment['investigator'];
			$panel_arr['cytometer']		= $panel_arr['panelXML']->Experiment['cytoName'];
		}
	/* species is another tag in the xml */		
		$panel_arr['species']			= $panel_arr['panelXML']->Species;
		
	/* ... and the other stuff */
		$panel_arr['size']				= strlen($file);	
		$panel_arr['hash'] 				= md5($panel_arr['panel_string']);
		
	
		switch(stripslashes($this->input->post('sharingPref')) )
		{
			case 'private':
				$panel_arr['sharingpref'] 	= 0;
				break;
			case 'lab':
				$panel_arr['sharingpref'] 	= 1;
				break;
			case 'institution':
				$panel_arr['sharingpref'] 	= 2;
				break;
			case 'everyone':
				$panel_arr['sharingpref'] 	= 3;
				break;
			default: $panel_arr['sharingpref'] 	= 0;
		}
//		$panel_arr['sharingpref'] 		= stripslashes($this->input->post('sharingPref'));	
		
		
		
		return $panel_arr;
	}
	



	

}//end class
