<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class F extends Loggedin_Controller
{

	function __construct()
	{
	  parent::__construct();
	  
			$this->load->library('template');
			
			function css(){
				$path = base_URL().'themes/home/css/';
				return $path;
			}
			function js(){
				$path = base_URL().'themes/home/js/';
				return $path;
			}
			function img(){
				$path = base_URL().'themes/home/img/';
				return $path;
			}
	}

/**
 * This is the public theme pages for Fluorish.
 */
function index()
	{
		
		$this->template
			->prepend_metadata('<link type="text/css" rel="stylesheet" href="../css/bootstrap.css">')
			->prepend_metadata('<link type="text/css" rel="stylesheet" href="../css/bootstrap-responsive.css">')
			->prepend_metadata('<link type="text/css" rel="stylesheet" href="../css/flexslider.css">')
			->prepend_metadata('<link type="text/css" rel="stylesheet" href="../css/jquery.fancybox-1.3.4.css">')
			->prepend_metadata('<link type="text/css" rel="stylesheet" href="../css/style.css">')
			->set_partial('head', 'partials/home/head')
			->set_partial('header', 'partials/home/header')
			->set_partial('home', 'partials/home/home')
			->set_partial('main', 'partials/home/main')
			->set_partial('footer', 'partials/home/footer')
			->set_layout('default') 
			->build('modules/pages/page');
	}

}