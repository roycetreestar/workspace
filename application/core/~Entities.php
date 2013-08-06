<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Entities extends Loggedin_Controller //CI_Controller 
{

	
	private $entityid;
	private $entity_name;
	private $email;
	private $phone;
	private $timestamp;

	
	
	
	
	
	function __construct()
	{
	  parent::__construct();
	  
	  $this->load->model('entities_m');
	  
	}
	
	
	
	function create_entity($data)
	{
		return $this->entities_m->create_entity($data);
	}
	
	
	
	function get_entity_data($entityid)
	{
		$entity = $this->entities_m->read_entity($entityid);
		
		$this->entityid = $entityid;
		$this->entity_name = $entity->entity_name;
		$this->email = $entity->email;
		$this->phone = $entity->phone;
		$this->timestamp = $entity->timestamp;
		
	}
	
	
	
	function update_entity($data)
	{
		return $this->entities_m->update_entity($data);
	}
	
}// end class