<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

require_once  APPPATH.'modules/membership/controllers/resources.php';

// class Home extends MY_Controller {
class Panels extends Resources//Secure_Controller 
{


	public $data = array();

	
//////////////////////////////////////////////////////////////////////////////////////////
	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		
      //~ $this->load->model('user_panels_model');
      //~ $this->load->model('user_panels_citations_model');
		
			
die('panels.php in the panel module');
	}// end __construct()
	
//////////////////////////////////////////////////////////////////////////////////////////
	function index($x='') 
	{
		
die('panels.php in the panel module');
		
		$this->data['announcement'] = $x;//'<h1>You\'ve gotten to controllers/panels.php</h1>';
	

		$this->data['panelsArr'] = $this->user_panels_model->user_panels_array($this->data['fl_user']['id']);

		
	
			
		$this->data['panelModal'] = $this->panel_modal();
		
		$this->load->view('panels_v', $this->data);
	} 
	


	private function panel_widget($panel)
	{
		$arr = $this->xml_to_array($panel['panelXML']);
		
		$returnable = '<div><textarea>'.print_r($panel, true).'</textarea></div>';
		
		return $returnable;
	}
	
    
////////////////////////////////////////////////////////////////////////
	private function panel_modal($content = 'no content ...')
	{
		$modal = '
			<!-- <a href="#panelModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
			-->
			<button type="button" data-toggle="modal" data-target="panelModal">Launch Modal</button>
			
			<div class="modal hide fade" id="panelModal">
		
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Modal header</h3>
				</div>
				
				<div class="modal-body">
					<p>'.$content.'</p>
				</div>
				
				<div class="modal-footer">
					<a href="#" class="btn">Close</a>
					<a id="modal_save" href="#" class="btn btn-primary">Save changes</a>
				</div>
				
			</div>';
			
		return $modal;
		
	}

////////////////////////////////////////////////////////////////////////

	function delete_panel($panelid)
	{
		//echo 'panel '.$panelid.' would be deleted now';
		$result=$this->user_panels_model->delete($panelid);
		//~ echo 'delete_panel() returned --'.$result.'--';
		if($result > 0)
			$response= "panel deleted";
		else  $response = "There was an error. Panel not deleted.";
		
		$this->index($response);
	}


////////////////////////////////////////////////////////////////////////

	function download_panel($panelid)
	{
		$thePanel = $this->user_panels_model->read($panelid)->row_array();
		
		$panelSize = $thePanel['size'];
		$panelName = $thePanel['name'];
		$panel = trim($thePanel['panelXML']);
		
		
		
		header("Content-length: $panelSize)");
		header("Content-type: application/xml  charset=UTF-8");
		header("Content-Disposition: attachment; filename=\"".$panelName.".wiz\"");
		header("Content-Description: file transfer");
		echo $panel;
	}






}//end class

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
?>
