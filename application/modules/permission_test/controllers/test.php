<?php
class Test extends LoggedIn 
{
	private $data = array();
	
////////////////////////////////////////////////////////////////////////////////
	function __construct()
    {
        parent::__construct();
	   
    }
    
    function index()
    {
	    echo 'this is test';
	    
	    echo 'is_logged_in()'.$this->is_logged_in();
    }
    
    
    
    
}//end class