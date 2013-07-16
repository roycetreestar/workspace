
<div class="well">
	<h1>my_resources_p</h1>
	
<?php
	if(!empty($this->session->userdata['groups']))
	{
		foreach( $this->session->userdata['groups'] as $group)
		{
	?>
		<div class="well">
			<h3><a href="<?= base_url('index.php/permission_test/groups/profile/'.$group['group_id'])?>"><?=$group['group_name'] ?></a></h3>Group # <?=$group['group_id']?><hr/>
		<?php
			if(!isset($group['resources']) || count($group['resources']) === 0)
				echo 'No Resources for group id '.$group['group_id'];

			else
			{
				foreach($group['resources'] as $resource)
				{
					$resource_type = $resource['resource_type'];
					switch($resource_type)
					{
						case 'address':
							$resource_class = "addresses";
							break;
						case 'cytometer':
							$resource_class = "cytometers";
							break;
						default:
							$resource_class = 'resources';
							break;
					}
					echo '<a href="'.base_url('index.php/permission_test/'.$resource_class.'/display/'.$resource['id']).'" >'.$resource['resource_name'].'</a><br/>';
				}
			}

		?>	
		</div>	
	<?php	
		}
	}
?>
</div>