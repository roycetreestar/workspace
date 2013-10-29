<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Code here is run before frontend controllers
class Public_Controller extends MY_Controller
{
        function Public_Controller()
        {
			parent::__construct();
			//$this->benchmark->mark('public_controller_start');
			Events::trigger('public_controller');
			
			// Enable profiler on local box
			//if( ENVIRONMENT == 'development' && $this->input->get('_debug') )
			//{
	  
			//}
			
		

		//$this->benchmark->mark('public_controller_end');
	}
}
