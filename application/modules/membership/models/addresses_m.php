
<?php
Class Addresses_m extends Resources_m//CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


    
    
    ///////////////////////////////////////////////////////////////////////////////


	function create_address($data)
	{
		$this->db->set('resource_id', $data['resource_id'])
			   ->set('address_line_1', $data['address_line_1'])
			   ->set('address_line_2', $data['address_line_2'])
			   ->set('address_line_3', $data['address_line_3'])			   
			   ->set('city', $data['city'])
			   ->set('state', $data['state'])
			   ->set('zipcode', $data['zipcode'])
			   ->set('country', $data['country']);
		$this->db->insert('addresses');
		
		if($this->db->affected_rows() >0)
			return true;
		else
			return false;
	}

    
    ///////////////////////////////////////////////////////////////////////////////
    function get_address_by_id($resourceid)
    {
	    $this->db->where('resource_id', $resourceid);
	    $rdata = $this->db->get('addresses')->row_array();
	    
	    if($rdata)
		    return $rdata;
	    else
		    return false;
	    
    }
    
    ///////////////////////////////////////////////////////////////////////////////
    	function get_addresses($resource_id)
	{
		$addresses = array();
		
		$this->db->where('resource_id', $resource_id);
		 $resource = $this->db->get('resource_group')->result_array();
		 
		 if(count($resource) > 0)
		 {
			 foreach($resource as $r)
			 {
				 if($r['resource_type'] == 'address')
				 {
					$this->db->where('resource_id', $r['resource_id']);
					$result = $this->db->get('addresses')->result_array();

					$addresses[$result[0]['resource_id']] = $result;
				 }
					  
			 }
		 }
		return $addresses;
	}
}
    ///////////////////////////////////////////////////////////////////////////////
?>

