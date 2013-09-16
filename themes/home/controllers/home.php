<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends Loggedin_Controller
{
	function __construct()
	{
		parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('layouts/default');
			}
}