<?php defined('BASEPATH') or exit('No direct script access allowed');
 
class Module_catalog_imports extends Module {
 
	public $version = '2.0';
	 
	public function info()
	{
		return array(
			'name' => array(
			'en' => 'Catalog Imports'
			),
			'description' => array(
				'en' => 'Import Vendor Catalogs'
			),
			'frontend' => TRUE,
			'backend' => TRUE,
			'menu' => 'fl_tools', // You can also place modules in their top level menu. For example try: 'menu' => 'Sample',
//			'sections' => array(
//					'items' => array(
//						'name' => 'cytometers.items', // These are translated from your language file
//						'uri' => 'cytometers',
//						'shortcuts' => array(
//							'create' => array(
//								'name' => 'cytometers.create',
//								'uri' => 'cytometers/create',
//								'class' => 'add'
//							)
//						)
//					)
//			)
		);
	}
	 
	 public function admin_menu(&$menu)
    {
    // Do stuff with $menu here.
	$menu['CatalogImports'] = 'catalog_imports';
    }
	 
	 public function install()
	 {
		 return true;
	 }
	 
/** the following database tables need to be installed when the module is installed:
 * user_cytometers
 * cytometers
 */	 
	public function installOLD()
	{
	
		
		// We made it!
		return TRUE;
	}
	 
	public function uninstall()
	{
		//~ $this->dbforge->drop_table('cytometers');
		//~ $this->db->delete('settings', array('module' => 'cytometers'));
		
		//~ $this->dbforge->drop_table('cytometers');
		//~ $this->db->delete('settings', array('module' => 'cytometers'));
		// Put a check in to see if something failed, otherwise it worked
		return TRUE;
	}
	 
	 
	public function upgrade($old_version)
	{
		// Your Upgrade Logic
		return TRUE;
	}
	 
	public function help()
	{
		// Return a string containing help info
		return "Here you can enter HTML with paragrpah tags or whatever you like";
		// You could include a file and return it here.
		return $this->load->view('help', NULL, TRUE); // loads modules/sample/views/help.php
	}
}
/* End of file details.php */
