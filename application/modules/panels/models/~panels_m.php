<?php
Class Panels_m extends Resources_m
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

////////////////////////////////////////////////////////////////////////

	function create($data)
	{
		$this->db->trans_start();
		//
		
		
		$this->db->trans_complete();
		
		if($result)
			return $data['resource_id'];
		else
			return false;
		
	}
	
	
////////////////////////////////////////////////////////////////////////
	function read($id)
	{
		die('panels/models/panels_m.php/read() ain\'t a-warken');
	}
	
////////////////////////////////////////////////////////////////////////
	function read_user_panels($userid)
	{
		die('panels/models/panels_m.php/read_user_panels() ain\'t a-warken');
	}
	
	
////////////////////////////////////////////////////////////////////////
	function user_panels_array($userid)
	{
		die('panels/models/panels_m.php/user_panels_array() ain\'t a-warken');
	}
	
////////////////////////////////////////////////////////////////////////
	function read_all()
	{
		die('panels/models/panels_m.php/read_all() ain\'t a-warken');
	}
	
////////////////////////////////////////////////////////////////////////
	function update($id, $data)
	{
		die('panels/models/panels_m.php/update() ain\'t a-warken');
	}
	
	
////////////////////////////////////////////////////////////////////////
	function delete($resource_id)
	{
		die('panels/models/panels_m.php/resource_id() ain\'t a-warken');
	}
	
	
////////////////////////////////////////////////////////////////////////
	function hash_exists($hash)
	{
		die('panels/models/panels_m.php/hash_exists() ain\'t a-warken');
	}
	
	
}//end class
