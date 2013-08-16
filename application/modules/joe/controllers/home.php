<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Loggedin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->stencil->slice('head');
		$this->stencil->slice('header');
		$this->stencil->slice('footer');
		
		
		
	}

	public function index()
	{
		$this->stencil->title('Welcome');
		$this->stencil->layout('home_layout');
		$this->stencil->css('font-awesome');
		$this->stencil->data('welcome_text', 'Welcome to Fluorish!');
		$this->stencil->paint('home_view');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */