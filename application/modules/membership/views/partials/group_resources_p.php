		<div class="well">
			<h3><a href="<?= base_url('membership/groups/profile/'.$group_id)?>"><?=$group_name ?></a></h3>
			Group # <?=$group_id?>
			<hr/>
		<?php
			if(!isset($resources) || count($resources) === 0)
				echo 'No Resources for group id '.$group_id;

			else
			{
				foreach($resources as $resource)
				{
					$resource_type = $resource['resource_type'];
					$config_function = 'edit';
					$display_function = 'display';
					
					switch($resource_type)
					{
						case 'address':
							$resource_class = "membership/addresses";
							//~ $config_function = 'edit_address';
							//~ $display_function = 'display_address';
							break;
						case 'cytometer':
							$resource_class = "cytometers";
							//~ $config_function = 'edit_cytometer';
							//~ $display_function = 'display_cytometer';
							break;
						case 'panel':
							$resource_class = "panel";
							//~ $config_function = 'edit_panel';
							//~ $display_function = 'display_panel';
							break;
						case 'inventory':
							$resource_class = "inventory";
							//~ $config_function = 'edit_inventory';
							//~ $display_function = 'display_inventory';
							break;
						default:
							$resource_class = "resources";
							//~ $config_function = 'edit';
							//~ $display_function = 'display';
							break;
					}
//~ $my_xml = new SimpleXMLElement($this->session->userdata['groups'][$group_id]['resources'][$resource['id']]['xml']);
//~ die('$my_xml:<br/>'.$my_xml->asXML());
//~ die('<hr/>serialized resource id '.$resource['id'].':<br/>'.serialize($my_xml).'<hr/>');		
	
					echo $resource['resource_name'];
					echo '<a class="btn" href="'.base_url($resource_class.'/'.$config_function.'/'.$resource['id']).'" >edit</a>';
					//~ echo '<a class="btn" href="'.base_url('fred/xml_to_html/form/'.htmlspecialchars($my_xml).'/'.$resource['id'].'/'. $group_id).'" >edit</a>';
					
					
					echo '<a class="btn" href="'.base_url($resource_class.'/'.$display_function.'/'.$resource['id']).'" > view </a>';
					echo '<br/>';
				}
			}

		?>	
		</div>	
