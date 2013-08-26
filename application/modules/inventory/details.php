<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Groups module
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Groups
 */
 class Module_Inventory extends Module
{

	public $version = '1.0.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Inventory',
				
			),
			'description' => array(
				'en' => 'Inventory functionality for Fluorish labs.',
				
			),
			'frontend' => false,
			'backend' => true,
			//~ 'menu' => 'fl_tools',
			//~ 'shortcuts' => array(
				//~ array(
					//~ 'name' => 'groups:add_title',
					//~ 'uri' => 'admin/fl_groups/add',
					//~ 'class' => 'add'
				//~ ),
			//~ )
		);
	}
	
	public function admin_menu(&$menu)
    {
    // Do stuff with $menu here.
	$menu['Inventory'] = 'inventory';
    }


	public function install()
	{
		//~ $this->dbforge->drop_table('fl_groups');
//~ 
		//~ $tables = array(
			//~ 'fl_groups' => array(
				//~ 'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true,),
				//~ 'name' => array('type' => 'VARCHAR', 'constraint' => 100,),
				//~ 'description' => array('type' => 'VARCHAR', 'constraint' => 250, 'null' => true,),
			//~ ),
		//~ );
//~ 
		//~ if ( ! $this->install_tables($tables))
		//~ {
			//~ return false;
		//~ }
//~ 
		//~ $groups = array(
			//~ array('name' => 'core_manager', 'description' => 'Core Manager',),
			//~ array('name' => 'core_user', 'description' => 'Core User',),
			//~ array('name' => 'lab_manager', 'description' => 'Lab Manager',),
			//~ array('name' => 'lab_user', 'description' => 'Lab User',),
		//~ );
//~ 
		//~ foreach ($groups as $group)
		//~ {
			//~ if ( ! $this->db->insert('fl_groups', $group))
			//~ {
				//~ return false;
			//~ }
		//~ }

		return true;
	}

	public function uninstall()
	{
		//~ // This is a core module, lets keep it around.
		//~ $this->dbforge->drop_table('fl_groups');
		return true;
	}

	public function upgrade($old_version)
	{
		return true;
	}

}
