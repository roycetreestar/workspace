<?php defined('BASEPATH') or exit('No direct script access allowed');
 
class Module_Cytometers extends Module {
 
	public $version = '2.0';
	 
	public function info()
	{
		return array(
			'name' => array(
			'en' => 'Cytometers'
			),
			'description' => array(
				'en' => 'Create, edit, and view cytometer configuration files.'
			),
			'frontend' => TRUE,
			'backend' => TRUE,
			//'menu' => 'fl_tools', // You can also place modules in their top level menu. For example try: 'menu' => 'Sample',
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
	$menu['Cytometers'] = 'cytometers';
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
		$this->dbforge->drop_table('cytometers');
		$this->db->delete('settings', array('module' => 'cytometers'));
		
		//~ $this->dbforge->drop_table('cytometers');
		//~ $this->db->delete('settings', array('module' => 'cytometers'));
		 
	
		 
		//~ $cytometers = array(
			//~ 'id' => array(				'type' => 'INT',		'constraint' => '11',	'auto_increment' => TRUE	),
			//~ 'model' => array(			'type' => 'VARCHAR',	'constraint' => '45'			),
			//~ 'manufacturer' => array(	'type' => 'VARCHAR',	'constraint' => '45'			),
			//~ 'cytometerConfigXML' => array(		'type' => 'VARCHAR',	'constraint' => '5000'			),
			//~ 'fixed' => array(			'type' => 'INT',		'constraint' => '10'			),
			//~ 'cyto_order' => array(		'type' => 'INT',		'constraint' => '10'			),
			//~ 'link' => array(			'type' => 'VARCHAR',	'constraint' => '200'			),
			//~ 'slug' => array(			'type' => 'VARCHAR',	'constraint' => '100'			),
		//~ );
		 //~ 
		//~ $cytometers_setting = array(
			//~ 'slug' => 'cytometers_setting',
			//~ 'title' => 'Cytometers Settings',
			//~ 'description' => 'A Yes or No option for the Cytometers module',
			//~ '`default`' => '1',
			//~ '`value`' => '1',
			//~ 'type' => 'select',
			//~ '`options`' => '1=Yes|0=No',
			//~ 'is_required' => 1,
			//~ 'is_gui' => 1,
			//~ 'module' => 'sample'
		//~ );
		
		$cytometers = array(
			'cytometerid' => array(			'type' => 'INT',		'constraint' => '32',	'auto_increment' => TRUE	),
			'coreid' => array(				'type' => 'INT',		'constraint' => '11',	'null' => TRUE	),
			'userid' => array(				'type' => 'INT',		'constraint' => '32',	'null' => TRUE	),
			'manufacturer' => array(		'type' => 'VARCHAR',	'constraint' => '32',	'null' => TRUE	),
			'model' => array(				'type' => 'VARCHAR',	'constraint' => '50',	'null' => TRUE	),
			'uploaded_file_name' => array(	'type' => 'VARCHAR',	'constraint' => '200',	'null' => TRUE	),
			'cytometerName' => array(		'type' => 'VARCHAR',	'constraint' => '32',	'null' => TRUE	),
			'cytometerConfigXML' => array(	'type' => 'VARCHAR',	'constraint' => '5000',	'null' => TRUE	),
			'config_name_1' => array(		'type' => 'VARCHAR',	'constraint' => '32',	'null' => TRUE	),
			'size' => array(				'type' => 'INT',		'constraint' => '32',	'null' => TRUE	),
			//~ 'timestamp' => array(
				//~ 'type' => 'TIMESTAMP'
			//~ ),
			'timestamp' => array(			'type' => 'INT', 		'constraint' => '11',	'null' => TRUE	),
			'hash' => array(				'type' => 'VARCHAR',	'constraint' => '32',	'null' => TRUE	),
			'cytometerConfigXML_2' => array('type' => 'VARCHAR',	'constraint' => '5000',	'null' => TRUE	),
			'config_name_2' => array(		'type' => 'VARCHAR',	'constraint' => '32',	'null' => TRUE	),
			'hash_2' => array(				'type' => 'VARCHAR',	'constraint' => '32',	'null' => TRUE	),
			'cytometerConfigXML_3' => array('type' => 'VARCHAR',	'constraint' => '5000',	'null' => TRUE	),
			'config_name_3' => array(		'type' => 'VARCHAR',	'constraint' => '32',	'null' => TRUE	),
			'hash_3' => array(				'type' => 'VARCHAR',	'constraint' => '32',	'null' => TRUE	),
			'cytometerConfigXML_4' => array('type' => 'VARCHAR',	'constraint' => '5000',	'null' => TRUE	),
			'config_name_4' => array(		'type' => 'VARCHAR',	'constraint' => '32',	'null' => TRUE	),
			'hash_4' => array(				'type' => 'VARCHAR',	'constraint' => '32',	'null' => TRUE	),
			'fixed' => array(				'type' => 'INT',		'constraint' => '10',	'null' => TRUE	),			//
			'cyto_order' => array(			'type' => 'INT', 		'constraint' => '10',	'null' => TRUE	),
			'link' => array(				'type' => 'VARCHAR',	'constraint' => '200',	'null' => TRUE	),
			'is_default' =>array(			'type' => 'INT',		'constraint' => '1'	,	'default' => 0	),			// is it a manufacturer supplied default configuration? 0=no, 1=yes
			'slug' => array(				'type' => 'VARCHAR',	'constraint' => '100',	'null' => TRUE	),
		);
		 
		







/** @todo  settings for the cytometer configurator module	*/
			//~ $user_cytometers_setting = array(
			//~ 'slug' => 'cytometers_setting',
			//~ 'title' => 'Cytometers Setting',
			//~ 'description' => 'A Yes or No option for the Cytometers module',
			//~ '`default`' => '1',
			//~ '`value`' => '1',
			//~ 'type' => 'select',
			//~ '`options`' => '1=Yes|0=No',
			//~ 'is_required' => 1,
			//~ 'is_gui' => 1,
			//~ 'module' => 'cytometer'
		//~ );
		
		
		//~ $this->dbforge->add_field($cytometers);
		//~ $this->dbforge->add_key('id', TRUE);
		
		$this->dbforge->add_field($cytometers);
		$this->dbforge->add_key('cytometerid', TRUE);
		 
		// Let's try running our DB Forge Table and inserting some settings
		//~ if ( ! $this->dbforge->create_table('cytometers') OR ! $this->db->insert('settings', $sample_setting))
		//~ {
			//~ return FALSE;
		//~ }
		if ( ! $this->dbforge->create_table('cytometers') )//OR ! $this->db->insert('settings', $cytometers_setting))
		{
			//~ echo 'debug: failed - - $this->dbforge->create_table(\'cytometers\')';
			return FALSE;
		}
		// No upload path for our module? If we can't make it then fail
		if ( ! is_dir($this->upload_path.'cytometers') AND ! @mkdir($this->upload_path.'cytometers',0777,TRUE))
		{
			//~ echo 'debug: failed - - is_dir($this->upload_path.\'cytometers\') AND ! @mkdir($this->upload_path.\'cytometers\',0777,TRUE)';
			return FALSE;
		}
		
		
		
		
		
		// set up the manufacturers' default settings configs
						$default_configs = array(
									array('model' =>'FACSCanto', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACSCanto"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'10', 'link' =>'http://www.bdbiosciences.com/instruments/facscanto/index.jsp', 'is_default' => '1'),
									
									array('model' =>'FACSCanto II', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACSCanto II"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
							</FlowCytometer>
							', /*'fixed'=>'',*/ 'cyto_order'=>'11', 'link' =>'http://www.bdbiosciences.com/instruments/facscanto/index.jsp', 'is_default' => '1'),
									
									array('model' =>'LSR I', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="LSR I"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="575" bandwidth="26"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="800" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="405" type="Violet Laser">
									<Detector wavelength="450" bandwidth="50"/>
									<Detector wavelength="525" bandwidth="50"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'13', 'is_default' => '1'/*'link' =>''*/),
									
									array('model' =>'LSR II', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="LSR II"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="575" bandwidth="26"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="800" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'', */'cyto_order'=>'14', 'is_default' => '1'/*, 'link' =>''*/),
									
									array('model' =>'LSRFortessa', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="LSRFortessa"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="575" bandwidth="26"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="800" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'', */'cyto_order'=>'15', 'link' =>'http://www.bdbiosciences.com/instruments/lsr/index.jsp', 'is_default' => '1'),
									
									array('model' =>'FACSAria', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACSAria"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'', */'cyto_order'=>'7', 'link' =>'http://www.bdbiosciences.com/instruments/facsaria/index.jsp', 'is_default' => '1'),
									
									array('model' =>'FACSAria II', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACSAria II"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'', */'cyto_order'=>'8', 'link' =>'http://www.bdbiosciences.com/instruments/facsaria/index.jsp', 'is_default' => '1'),
									
									array('model' =>'FACSAria III', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACSAria III"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="575" bandwidth="26"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="800" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'9', 'link' =>'http://www.bdbiosciences.com/instruments/facsaria/index.jsp', 'is_default' => '1' ),
									
									array('model' =>'SH800', 'manufacturer' =>'Sony Biotechnology', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://www.sony.net/Products/fcm/products/sh800/index.html', 'is_default' => '1' ),
									
									array('model' =>'FACSVantage', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACSVantage"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="582" bandwidth="42"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="405" type="Violet Laser">
									<Detector wavelength="450" bandwidth="50"/>
									<Detector wavelength="525" bandwidth="50"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'5', 'link' =>'', 'is_default' => '1' ),
									
									array('model' =>'Influx', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="Influx"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="575" bandwidth="26"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="800" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'16', 'link' =>'http://www.bdbiosciences.com/instruments/influx/index.jsp', 'is_default' => '1' ),
									
									array('model' =>'FACScan', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACScan"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="650" bandwidth="LP"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'2', 'link' =>'', 'is_default' => '1' ),
									
									array('model' =>'FACSCalibur 1 Laser', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACSCalibur 1 Laser"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="670" bandwidth="LP"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'3', 'link' =>'http://www.bdbiosciences.com/instruments/facscalibur/index.jsp', 'is_default' => '1' ),
									
									array('model' =>'FACSCalibur 2 Laser', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACSCalibur 2 Laser"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="670" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="661" bandwidth="16"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'4', 'link' =>'http://www.bdbiosciences.com/instruments/facscalibur/index.jsp', 'is_default' => '1' ),
									
									array('model' =>'EPICS XL 3', 'manufacturer' =>'Beckman Coulter', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Beckman Coulter" model="EPICS XL 3"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="20"/>
									<Detector wavelength="580" bandwidth="30"/>
									<Detector wavelength="670" bandwidth="30"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'1', 'link' =>'http://www.coulterflow.com/bciflow/instrumentsus.php', 'is_default' => '1' ),
									
									array('model' =>'EPICS XL 4', 'manufacturer' =>'Beckman Coulter', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Beckman Coulter" model="EPICS XL 4"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="40"/>
									<Detector wavelength="580" bandwidth="30"/>
									<Detector wavelength="620" bandwidth="30"/>
									<Detector wavelength="670" bandwidth="30"/>
								</LightSource>

							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'2', 'link' =>'http://www.coulterflow.com/bciflow/instrumentsus.php', 'is_default' => '1' ),
									
									array('model' =>'EPICS Elite', 'manufacturer' =>'Beckman Coulter', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Beckman Coulter" model="EPICS Elite"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="40"/>
									<Detector wavelength="580" bandwidth="30"/>
									<Detector wavelength="620" bandwidth="30"/>
									<Detector wavelength="670" bandwidth="30"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="670" bandwidth="30"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'3', 'link' =>'', 'is_default' => '1' ),
									
									array('model' =>'FC500', 'manufacturer' =>'Beckman Coulter', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Beckman Coulter" model="FC500"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="40"/>
									<Detector wavelength="580" bandwidth="30"/>
									<Detector wavelength="620" bandwidth="30"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="670" bandwidth="30"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'4', 'link' =>'http://www.coulterflow.com/bciflow/instrumentsus.php', 'is_default' => '1' ),
									
									array('model' =>'MoFlo XDP', 'manufacturer' =>'Beckman Coulter', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Beckman Coulter" model="MoFlo XDP"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="40"/>
									<Detector wavelength="580" bandwidth="30"/>
									<Detector wavelength="620" bandwidth="30"/>
									<Detector wavelength="670" bandwidth="30"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="670" bandwidth="30"/>
									<Detector wavelength="700" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="354" type="UV Laser">
									<Detector wavelength="450" bandwidth="34"/>
									<Detector wavelength="530" bandwidth="40"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'7', 'link' =>'http://www.beckmancoulter.com/wsrportal/wsr/research-and-discovery/products-and-services/flow-cytometry/cell-sorters/moflo-xdp/index.htm', 'is_default' => '1' ),
									
									array('model' =>'Gallios', 'manufacturer' =>'Beckman Coulter', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Beckman Coulter" model="Gallios"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="525" bandwidth="40"/>
									<Detector wavelength="575" bandwidth="30"/>
									<Detector wavelength="620" bandwidth="30"/>
									<Detector wavelength="695" bandwidth="30"/>
									<Detector wavelength="755" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="755" bandwidth="LP"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'5', 'link' =>'http://www.beckmancoulter.com/wsrportal/wsr/research-and-discovery/products-and-services/flow-cytometry/flow-cytometers/gallios/index.htm', 'is_default' => '1' ),
									
									array('model' =>'DxP6', 'manufacturer' =>'Cytek', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Cytek" model="DxP6"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="661" bandwidth="16"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'3', 'link' =>'http://www.cytekdev.com/categories/Cytometer/', 'is_default' => '1' ),
									
									array('model' =>'Cyan ADP 7 Color', 'manufacturer' =>'Beckman Coulter', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Beckman Coulter" model="Cyan ADP 7 color"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="40"/>
									<Detector wavelength="575" bandwidth="24"/>
									<Detector wavelength="613" bandwidth="20"/>
									<Detector wavelength="680" bandwidth="30"/>
									<Detector wavelength="750" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="665" bandwidth="20"/>
									<Detector wavelength="750" bandwidth="LP"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'9', 'link' =>'http://www.beckmancoulter.com/wsrportal/wsr/research-and-discovery/products-and-services/flow-cytometry/flow-cytometers/cyan-adp-analyzer/index.htm', 'is_default' => '1' ),
									
									array('model' =>'Cyan ADP 9 Color', 'manufacturer' =>'Beckman Coulter', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Beckman Coulter" model="Cyan ADP 9 color"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="40"/>
									<Detector wavelength="575" bandwidth="24"/>
									<Detector wavelength="613" bandwidth="20"/>
									<Detector wavelength="680" bandwidth="30"/>
									<Detector wavelength="750" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="665" bandwidth="20"/>
									<Detector wavelength="750" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="405" type="Violet Laser">
									<Detector wavelength="450" bandwidth="50"/>
									<Detector wavelength="530" bandwidth="40"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'10', 'link' =>'http://www.beckmancoulter.com/wsrportal/wsr/research-and-discovery/products-and-services/flow-cytometry/flow-cytometers/cyan-adp-analyzer/index.htm', 'is_default' => '1' ),
									
									array('model' =>'Guava easyCyte 5', 'manufacturer' =>'Millipore', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Millipore" model="easyCyte 5"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="525" bandwidth="30"/>
									<Detector wavelength="583" bandwidth="26"/>
									<Detector wavelength="680" bandwidth="30"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'1', 'link' =>'http://www.millipore.com/flowcytometry/flx4/flow_cytometry_guava#tab2=2', 'is_default' => '1' ),
									
									array('model' =>'Guava easyCyte 6', 'manufacturer' =>'Millipore', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Millipore" model="easyCyte 6"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="525" bandwidth="30"/>
									<Detector wavelength="583" bandwidth="26"/>
									<Detector wavelength="680" bandwidth="30"/>
									<Detector wavelength="485" bandwidth="70"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'2', 'link' =>'http://www.millipore.com/flowcytometry/flx4/flow_cytometry_guava#tab2=2', 'is_default' => '1' ),
									
									array('model' =>'Guava easyCyte 6/2L', 'manufacturer' =>'Millipore', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Millipore" model="easyCyte 6/2L"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="525" bandwidth="30"/>
									<Detector wavelength="583" bandwidth="26"/>
									<Detector wavelength="680" bandwidth="30"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="661" bandwidth="19"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'3', 'link' =>'http://www.millipore.com/flowcytometry/flx4/flow_cytometry_guava#tab2=2', 'is_default' => '1' ),
									
									array('model' =>'Guava easyCyte 8', 'manufacturer' =>'Millipore', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Millipore" model="easyCyte 8"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="525" bandwidth="30"/>
									<Detector wavelength="583" bandwidth="26"/>
									<Detector wavelength="680" bandwidth="30"/>
									<Detector wavelength="785" bandwidth="70"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="661" bandwidth="19"/>
									<Detector wavelength="785" bandwidth="70"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'4', 'link' =>'http://www.millipore.com/flowcytometry/flx4/flow_cytometry_guava#tab2=2', 'is_default' => '1' ),
									
									array('model' =>'MoFlo Astrios', 'manufacturer' =>'Beckman Coulter', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Beckman Coulter" model="MoFlo Astrios"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="40"/>
									<Detector wavelength="580" bandwidth="30"/>
									<Detector wavelength="620" bandwidth="30"/>
									<Detector wavelength="670" bandwidth="30"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="670" bandwidth="30"/>
									<Detector wavelength="700" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="354" type="UV Laser">
									<Detector wavelength="450" bandwidth="34"/>
									<Detector wavelength="530" bandwidth="40"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'8', 'link' =>'http://www.beckmancoulter.com/wsrportal/wsr/research-and-discovery/products-and-services/flow-cytometry/cell-sorters/moflo-astrios/index.htm', 'is_default' => '1' ),
									
									array('model' =>'Accuri C6', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="Accuri C6"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="40"/>
									<Detector wavelength="670" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="675" bandwidth="26"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'1', 'link' =>'http://www.bdbiosciences.com/instruments/accuri/index.jsp', 'is_default' => '1' ),
									
									array('model' =>'MACSQuant', 'manufacturer' =>'Miltenyi', 'cytometerConfigXML' => '<FlowCytometer>

								<GeneralInfo manufacturer="Miltenyi" model="MACSQuant"/>

								<LightSource type="Violet"  wavelength="405">
									<Detector wavelength="450"  bandwidth="50"/>
									<Detector wavelength="580"  bandwidth="50"/>
								</LightSource>

								<LightSource type="Blue"  wavelength="488">
									<Detector wavelength="525"  bandwidth="50"/>
									<Detector wavelength="615"  bandwidth="70"/>
									<Detector wavelength="692.5"  bandwidth="75"/>
									<Detector wavelength="785"  bandwidth="70"/>
								</LightSource>

								<LightSource type="Red"  wavelength="635">
									<Detector wavelength="692.5"  bandwidth="75"/>
									<Detector wavelength="785"  bandwidth="70"/>
								</LightSource>

							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'0', 'link' =>'https://www.miltenyibiotec.com/Products-and-Services/MACS-Flow-Cytometry/Instruments/MACSQuant-Analyzers/MACSQuant-Analyzers.aspx', 'is_default' => '1' ),
									
									array('model' =>'Amnis ImageStream', 'manufacturer' =>'Millipore', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Amnis" model="ImageStream"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="575" bandwidth="40"/>
									<Detector wavelength="628" bandwidth="66"/>
									<Detector wavelength="700" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="30"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="405" type="Violet Laser">
									<Detector wavelength="450" bandwidth="50"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'2', 'link' =>'https://www.amnis.com/imagestream.html', 'is_default' => '1' ),
									
									array('model' =>'DxP8', 'manufacturer' =>'Cytek', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Cytek" model="DxP8"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="661" bandwidth="16"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="405" type="Violet Laser">
									<Detector wavelength="450" bandwidth="50"/>
									<Detector wavelength="545" bandwidth="30"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'4', 'link' =>'http://www.cytekdev.com/categories/Cytometer/', 'is_default' => '1' ),
									
									array('model' =>'xP4', 'manufacturer' =>'Cytek', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Cytek" model="xP4"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="668" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="666" bandwidth="27"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'1', 'link' =>'http://www.cytekdev.com/categories/Cytometer/', 'is_default' => '1' ),
									
									array('model' =>'xP5', 'manufacturer' =>'Cytek', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Cytek" model="xP5"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="668" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="666" bandwidth="27"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'2', 'link' =>'http://www.cytekdev.com/categories/Cytometer/', 'is_default' => '1' ),
									
									array('model' =>'DxP10', 'manufacturer' =>'Cytek', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Cytek" model="DxP10"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="42"/>
									<Detector wavelength="695" bandwidth="40"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="661" bandwidth="16"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="405" type="Violet Laser">
									<Detector wavelength="450" bandwidth="50"/>
									<Detector wavelength="545" bandwidth="30"/>
								</LightSource>
								
							</FlowCytometer>', 'fixed'=>'1', 'cyto_order'=>'5', 'link' =>'http://www.cytekdev.com/categories/Cytometer/', 'is_default' => '1' ),
									
									array('model' =>'Attune (Violet/Blue Laser System)', 'manufacturer' =>'Life Technologies', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Life Technologies" model="Attune (Violet/Blue Laser System)"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="574" bandwidth="26"/>
									<Detector wavelength="640" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="405" type="Violet Laser">
									<Detector wavelength="450" bandwidth="40"/>
									<Detector wavelength="522" bandwidth="30"/>
									<Detector wavelength="603" bandwidth="48"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://products.invitrogen.com/ivgn/product/4445315', 'is_default' => '1' ),
									
									array('model' =>'CyFlow ML', 'manufacturer' =>'Partec', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://www.partec.com/cms/front_content.php?idcat=13', 'is_default' => '1' ),
									
									array('model' =>'CyFlow Space', 'manufacturer' =>'Partec', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://www.partec.com/instrumentation/products.html?&tx_cyclosproductfinder_cyc_pf_display[product]=1026&tx_cyclosproductfinder_cyc_pf_display[action]=show&tx_cyclosproductfinder_cyc_pf_display[contro', 'is_default' => '1' ),
									
									array('model' =>'CyFlow SL', 'manufacturer' =>'Partec', 'cytometerConfigXML' => '', 'fixed'=>'1', 'cyto_order'=>'0', 'link' =>'http://www.partec.com/instrumentation/products.html?&tx_cyclosproductfinder_cyc_pf_display[product]=1022&tx_cyclosproductfinder_cyc_pf_display[action]=show&tx_cyclosproductfinder_cyc_pf_display[contro', 'is_default' => '1' ),
									
									array('model' =>'CyFlow Cube 8', 'manufacturer' =>'Partec', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://www.partec.com/instrumentation/products.html?&tx_cyclosproductfinder_cyc_pf_display[product]=1025&tx_cyclosproductfinder_cyc_pf_display[action]=show&tx_cyclosproductfinder_cyc_pf_display[contro', 'is_default' => '1' ),
									
									array('model' =>'EC800', 'manufacturer' =>'Sony Biotechnology', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://www.sonybiotechnology.com/ec800_overview.php', 'is_default' => '1' ),
									
									array('model' =>'SY3200 Biosafety', 'manufacturer' =>'Sony Biotechnology', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://www.sonybiotechnology.com/sy3200_overview.php', 'is_default' => '1' ),
									
									array('model' =>'S1000', 'manufacturer' =>'Stratedigm', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://stratedigm.com/?instrumentation/why/PBs', 'is_default' => '1' ),
									
									array('model' =>'FACSVerse', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACSVerse"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="585" bandwidth="40"/>
									<Detector wavelength="670" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="675" bandwidth="26"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'12', 'link' =>'http://www.bdbiosciences.com/instruments/facsverse/index.jsp', 'is_default' => '1' ),
									
									array('model' =>'MACSQuant VYB', 'manufacturer' =>'Miltenyi', 'cytometerConfigXML' => '<FlowCytometer>

								<GeneralInfo manufacturer="Miltenyi" model="MACSQuant VYB"/>

								<LightSource type="Violet"  wavelength="405">
									<Detector wavelength="450"  bandwidth="50"/>
									<Detector wavelength="580"  bandwidth="50"/>
								</LightSource>

								<LightSource type="Yellow"  wavelength="561">
									<Detector wavelength="586"  bandwidth="16"/>
									<Detector wavelength="615"  bandwidth="20"/>
									<Detector wavelength="661"  bandwidth="20"/>
									<Detector wavelength="785"  bandwidth="70"/>
								</LightSource>

								<LightSource type="Blue"  wavelength="488">
									<Detector wavelength="525"  bandwidth="50"/>
									<Detector wavelength="614"  bandwidth="50"/>
								</LightSource>

							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'https://www.miltenyibiotec.com/Products-and-Services/MACS-Flow-Cytometry/Instruments/MACSQuant-VYB/MACSQuant-VYB.aspx', 'is_default' => '1' ),
									
									array('model' =>'Legacy MoFlo', 'manufacturer' =>'Beckman Coulter', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Beckman Coulter" model="MoFlo Astrios"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="40"/>
									<Detector wavelength="580" bandwidth="30"/>
									<Detector wavelength="620" bandwidth="30"/>
									<Detector wavelength="670" bandwidth="30"/>
									<Detector wavelength="740" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="670" bandwidth="30"/>
									<Detector wavelength="700" bandwidth="LP"/>
								</LightSource>
								
								<LightSource wavelength="354" type="UV Laser">
									<Detector wavelength="450" bandwidth="34"/>
									<Detector wavelength="530" bandwidth="40"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'6', 'link' =>'', 'is_default' => '1' ),
									
									array('model' =>'Amnis FlowSight', 'manufacturer' =>'Millipore', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Amnis" model="FlowSight"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="575" bandwidth="40"/>
									<Detector wavelength="628" bandwidth="66"/>
									<Detector wavelength="700" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="640" type="Red Laser">
									<Detector wavelength="660" bandwidth="30"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="405" type="Violet Laser">
									<Detector wavelength="450" bandwidth="50"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'1', 'link' =>'https://www.amnis.com/flowsight.html', 'is_default' => '1' ),
									
									array('model' =>'Attune (Blue/Red Laser System)', 'manufacturer' =>'Life Technologies', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="Life Technologies" model="Attune (Blue/Red Laser System)"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="30"/>
									<Detector wavelength="574" bandwidth="26"/>
									<Detector wavelength="690" bandwidth="50"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
								<LightSource wavelength="633" type="Red Laser">
									<Detector wavelength="660" bandwidth="20"/>
									<Detector wavelength="780" bandwidth="60"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://products.invitrogen.com/ivgn/product/4469120', 'is_default' => '1' ),
									
									array('model' =>'FACSJazz', 'manufacturer' =>'BD Biosciences', 'cytometerConfigXML' => '<FlowCytometer>
								
								<GeneralInfo manufacturer="BD Biosciences" model="FACSJazz"/>
								
								<LightSource wavelength="488" type="Blue Laser">
									<Detector wavelength="530" bandwidth="40"/>
									<Detector wavelength="585" bandwidth="29"/>
									<Detector wavelength="692" bandwidth="40"/>
									<Detector wavelength="750" bandwidth="LP"/>
								</LightSource>
								<LightSource wavelength="642" type="Red Laser">
									<Detector wavelength="670" bandwidth="30"/>
									<Detector wavelength="750" bandwidth="LP"/>
								</LightSource>
								
							</FlowCytometer>', /*'fixed'=>'',*/ 'cyto_order'=>'16', 'link' =>'http://www.bdbiosciences.com/instruments/facsjazz/index.jsp', 'is_default' => '1' ),
									
									array('model' =>'S3 Cell Sorter', 'manufacturer' =>'Bio-Rad', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://www.bio-rad.com/prd/en/US/adirect/biorad?ts=1&cmd=BRCatgProductDetail&vertical=LSR&catID=MC3PU4E8Z', 'is_default' => '1' ),
									
									array('model' =>'S1000EX', 'manufacturer' =>'Stratedigm', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://stratedigm.com/?instrumentation/why/zBaPBs', 'is_default' => '1' ),
									
									array('model' =>'SE500', 'manufacturer' =>'Stratedigm', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://stratedigm.com/?instrumentation/why/xBaxl', 'is_default' => '1' ),
									
									array('model' =>'CyFlow Cube 6', 'manufacturer' =>'Partec', 'cytometerConfigXML' => '', /*'fixed'=>'',*/ 'cyto_order'=>'0', 'link' =>'http://www.partec.com/instrumentation/products.html?&tx_cyclosproductfinder_cyc_pf_display[product]=1024&tx_cyclosproductfinder_cyc_pf_display[action]=show&tx_cyclosproductfinder_cyc_pf_display[contro', 'is_default' => '1')
		);
		
	//insert the manufacturer settings configs
		foreach ($default_configs as $config)
		 {
			if ( ! $this->db->insert('cytometers', $config))
			{
				return false;
			}
		 }


		
		
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
