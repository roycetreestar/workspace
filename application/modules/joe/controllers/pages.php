<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends Loggedin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->stencil->slice(array('head', 'header', 'sidebar'));
		$this->stencil->layout('subpage_layout');
	}

  	function index()
 	{
		switch ($this->uri->segment(1)) 
		{
			// for quick static pages without routing
			case 'terms-of-service' :
				$this->stencil->title('License');
				$data['subpage_text'] = 'MIT License';
				$this->stencil->data($data);
				$this->stencil->paint('license_view');
				break;
			
			default :
				$this->output->set_status_header('404');
				
				$this->stencil->title('404 Page Not Found');
				$data['subpage_text'] = '404 Page Does not Exist!';
				$this->stencil->data($data);
				$this->stencil->paint('404_view');
				break;
		}
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */