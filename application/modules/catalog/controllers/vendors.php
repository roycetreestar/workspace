<?php
/**
 * The main controller of the catalog module
 * 
 * 
 *	needs the upload form's file field to have	name="file" 
 * 
 *	all errors along the way are stored in $this->data['errors']['error_type']
 *	At each step the process may abort and report errors
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Vendors extends Loggedin_Controller// Secure_Controller
{
	
	
	
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('vendors_model');
	}
	
////////////////////////////////////////////////////////////////////////
	function index()
	{
echo 'you got to the vendors controller ... CONTROL THEM VENDORS!';	
		
	}
	
////////////////////////////////////////////////////////////////////////
	function add_vendor()
	{
		//~ $this->load->view('header_v');
		return $this->load->view('partials/vendor_form_p', '', true);
	}
	
////////////////////////////////////////////////////////////////////////
	function edit_vendor($vendor_id)
	{
		//~ $this->load->view('header_v');
		$data = $this->vendors_model->read_by_id($vendor_id);
//~ die('catalog/vendors/edit_vendor() $data: <pre>'.print_r($data, true).'</pre>');
		return $this->load->view('partials/vendor_form_p', $data, true);
	}
	
////////////////////////////////////////////////////////////////////////
	function save_vendor($data = '')
	{
		if($data == '')
			$data = $this->input->post();	
//~ die('catalog/vendors/save_vendor() $data:<textarea>'.print_r($data, true).'</textarea>');	
		if($data['vendor_id'] == 0)
			$result = $this->vendors_model->insert($data);
		else
			$result = $this->vendors_model->update($data);
		
		if($result)
			//~ echo $this->edit_vendor($data['vendor_id']);
			echo 'success';
		else 
			echo 'failure';
	}
	
////////////////////////////////////////////////////////////////////////
	function get_vendor_name($vendor_id)
	{
		$vendor = $this->vendors_model->read_by_id($vendor_id);
		
		return $vendor['vendor_name'];
	}
////////////////////////////////////////////////////////////////////////
	function get_all_vendors()
	{
		$result = $this->vendors_model->read_all();
		if($result)
			return $result;
		else 
			return false;
	}
////////////////////////////////////////////////////////////////////////
	function get_current_vendors()
	{
		$result = $this->vendors_model->read_current();
		if($result)
			return $result;
		else 
			return false;
	}
////////////////////////////////////////////////////////////////////////
}//end class
