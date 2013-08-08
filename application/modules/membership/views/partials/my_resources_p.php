
<div class="well">
	<h1>my_resources_p</h1>
	
<?php
	if(!empty($this->session->userdata['groups']))
	{
		foreach( $this->session->userdata['groups'] as $this_group)
		{
	?>
		<div class="well">
			<h3><a href="<?= base_url('membership/groups/profile/'.$this_group['group_id'])?>"><?=$this_group['group_name'] ?></a></h3>Group # <?=$this_group['group_id']?><hr/>
		<?php
			if(!isset($this_group['resources']) || count($this_group['resources']) === 0)
				echo 'No Resources for group id '.$this_group['group_id'];

			else
			{
				foreach($this_group['resources'] as $resource)
				{
					$resource_type = $resource['resource_type'];
					$config_function = 'edit';
					$display_function = 'display';
					
					switch($resource_type)
					{
						case 'address':
							$resource_class = "addresses";
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
					
					
					echo $resource['resource_name'];
					//~ echo '<a class="btn" href="'.base_url($resource_class.'/'.$function.'/'.$resource['id']).'" >'.$resource['resource_name'].'</a> ';
					echo '<a class="btn" href="'.base_url($resource_class.'/'.$config_function.'/'.$resource['id']).'" >edit</a>';
					echo '<a class="btn" href="'.base_url($resource_class.'/'.$display_function.'/'.$resource['id']).'" > view </a>';
					echo '<br/>';
				}
			}

		?>	
		</div>	
	<?php	
		}
	}
?>
</div>
