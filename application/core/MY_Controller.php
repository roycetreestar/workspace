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


	protected static $address_module;//
	protected static $catalog_module;//
	protected static $cytometer_module;//
	protected static $groups_module;//
	protected static $inventory_module;//
	protected static $membership_module;
	protected static $panel_module;//
	protected static $search_module;
	protected static $thesaurus_module;//
	protected static $users_module;//
	protected static $vendors_module;




////////////////////////////////////////////////////////////////////////////////
	public function __construct() 
	{
//~ echo 'MY_Controller/construct()<hr/>';
        parent::__construct();
//        $this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');




	
	}
	
////////////////////////////////////////////////////////////////////////////////
	function debug_arr($array, $width='80%', $height='80%')
	{
		echo '<textarea style="width:'.$width.'; height:'.$height.';">'.print_r($array, true).'</textarea>';
	}
	
////////////////////////////////////////////////////////////////////////////////
/** any class that extends MY_Controller can call $this->load->modules() 
 * to have all modules accessible by "$this->modulename_module"
 */ 
	function load_modules()
	{
		$this->address_module = $this->load->module('addresses');
		$this->catalog_module= $this->load->module('catalog/catalog_imports');
		$this->cytometer_module = $this->load->module('cytometers');
		$this->groups_module= $this->load->module('membership/groups');
		$this->inventory_module= $this->load->module('inventory');
		$this->membership_module= $this->load->module('membership');
		$this->panel_module= $this->load->module('panels');
		$this->search_module= $this->load->module('catalog/search');
		$this->thesaurus_module= $this->load->module('thesaurus');
		$this->users_module= $this->load->module('membership/users');
		$this->vendors_module= $this->load->module('catalog/vendors');
	}
}//end class




