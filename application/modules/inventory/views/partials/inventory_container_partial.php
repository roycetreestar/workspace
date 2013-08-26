<?php
/** 
 * Each lab the user is a member of gets a <div> holding that lab's inventory <table>
 */
 

 
	foreach($inventories as $lab)
	{
 //~ die('inventory_container_partial.php <br/>$lab:<br/><textarea>'.print_r($lab, true).'</textarea>');
 ?>


<div class="span12 well">		
	<div id="inventory_header_labname"><?=$lab['labname']?>
	</div>
	<div id="inventory_header_buttons">
			<a class="btn edit_columns">Edit Columns</a>
	<!--		<a class="btn add_reagent_manually">Add Reagent Manually</a>
			<a class="btn add_reagent_cat_num">Add Reagent By Catalog Number</a>-->
			<a class="btn" id="add_single_item_<?=$lab['labid']?>">Add Reagent/Item</a>
			<a class="btn" id="upload_spreadsheet_<?=$lab['labid']?>"> Import a Spreadsheet</a>
	</div>	
		
		<?= $lab['table']?>
</div>
<?php
	}
?>




