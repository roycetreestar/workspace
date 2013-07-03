<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well">
	<h1>my_resources_p</h1>
	
<?php
	foreach( $this->session->userdata['groups'] as $group)
	{
?>
	<div class="well">
		<h3>Group # <?=$group['group_id']?></h3>
	<?php
		if(!isset($group['resources']) || count($group['resources']) === 0)
			echo 'No Resources for group id '.$group['group_id'];

		else
		{
			foreach($group['resources'] as $resource)
			{
				echo '<a href="permission_test/display_resource/'.$resource['id'].'" >'.$resource['resource_name'].'</a><br/>';
			}
		}
		
	?>	
	</div>	
<?php	
	}
?>
</div>