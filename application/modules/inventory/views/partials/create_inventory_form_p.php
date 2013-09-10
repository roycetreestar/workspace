<?php
		//~ $data['group_id'] 
		//~ $data['resource_name']
		//~ $data['resource_type']
		//~ $data['xml']
		//~ $data['size']
		//~ $data['hash']
?>
<div class="well" >
	<form method="post" action="<?=base_url().'inventory/create_inventory'?>" >
		<label for="group_id" >Attach to which group?</label>
		<?= $managed_groups_dropdown ?>
		<br/>
		<label for="resource_name" >name your inventory</label>
		<input type="text" id="resource_name" name="resource_name" />
		<br/>
		resource_type:
		<input type="text" readonly id="resource_type" name="resource_type" value="inventory" />
		<br/>
		<input type="submit" />

	</form>
</div>
