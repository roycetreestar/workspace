<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MY_Controller Class
 *
 *
 * @package Project Name
 * @subpackage  Controllers
 ***********************************************************************
 ***********************************************************************
 ***********************************************************************/
class MY_Controller extends MX_Controller //CI_Controller 
{
	public function __construct() 
	{
        parent::__construct();
		  	$this->load->library('profiler');
			$this->load->library('console');
			$this->output->enable_profiler(true);
			Console::log(debug_backtrace());
	}
	

}//end class




