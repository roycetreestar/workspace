<div class="row-fluid" id="insert_success" >
	<div class="span5 well">
		<h3>Your file was successfully uploaded!</h3>
		products inserted: <?=$insert_num?><br/>
		products updated: <?=$update_num?><br/>
		products matching $EXCLUDE: <?=$exclude_num?><br/>
		<br/>
		total products imported: <?php echo ($insert_num+$update_num+$exclude_num) ?>
	</div>
	<div class="span4 offset1 well" style="height:500px; overflow:auto;">
		<p>these products were updated instead of inserted:</p>
		<?php
		foreach($products_updated as $product)
		{
			echo $product.'<br/>';
		}
		?>
	</div>
	
</div>
