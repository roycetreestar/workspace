<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * API module
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\API
 */
class Module_thesaurus extends Module
{
	public $version = '1.0.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Thesaurus',
			),
			'description' => array(
				'en' => 'Thesaurus',
			),
			'frontend' => TRUE,
			'backend' => TRUE,
//			'menu' => 'utilities',
//			'sections' => array(
//				'overview' => array(
//					'name' => 'api:overview',
//					'uri' => 'admin/api',
//				),
//				'keys' => array(
//					'name' => 'api:keys',
//					'uri' => 'admin/api/keys',
//					'shortcuts' => array(
//						array(
//						    'name' => 'global:add',
//						    'uri' => 'admin/api/keys/create',
//						    'class' => 'add'
//						),
//					),
//				),
//			),
		);
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