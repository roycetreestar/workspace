
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
					switch($resource_type)
					{
						case 'address':
							$resource_class = "addresses";
							$function = 'display';
							break;
						case 'cytometer':
							$resource_class = "cytometers";
							$function = 'config';
							break;
						default:
							$resource_class = "resources";
							$function = 'display';
							break;
					}
					echo '<a href="'.base_url($resource_class.'/'.$function.'/'.$resource['id']).'" >'.$resource['resource_name'].'</a> <a href="'.base_url($resource_class.'/'.$function.'/'.$resource['id']).'" >edit</a><br/>';
				}
			}

		?>	
		</div>	
	<?php	
		}
	}
?>
</div>
