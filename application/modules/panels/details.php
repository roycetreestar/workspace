<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Groups module
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Groups
 */
 class Module_Panels extends Module
{

	public $version = '1.0.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Panels',
				
			),
			'description' => array(
				'en' => 'Fluorish user panels.',
				
			),
			'frontend' => true,
			'backend' => true,
			//'menu' => 'fl_tools',
			'shortcuts' => array(
				//~ array(
					//~ 'name' => 'panels:add_title',
					//~ 'uri' => 'panels/add',
					//~ 'class' => 'add'
				//~ ),
			)
		);
	}
	

 	public function admin_menu(&$menu)
    {
    // Do stuff with $menu here.
	$menu['Panels'] = 'panels';
    }
	
	public function install()
	{


		return true;
	}

	public function uninstall()
	{

		return true;
	}

	public function upgrade($old_version)
	{
		return true;
	}

}
