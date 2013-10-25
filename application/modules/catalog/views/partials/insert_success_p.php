<div class="row-fluid" id="insert_success" >
	<div class="span5 well">
		<h3>Your file was successfully uploaded!</h3>
		products inserted: <?=$insert_num?><br/>
		products updated: <?=$update_num?><br/>
		products matching $EXCLUDE: <?=$exclude_num?><br/>
		<br/>
		total products imported: <?php echo ($insert_num+$update_num+$exclude_num) ?>
		<br/><br/>
		
		elapsed time: <?=$elapsed_time?> seconds
	</div>
	<div class="span4  well" style="height:500px; overflow:auto;">
		<p>these products were updated instead of inserted:</p>

		<?php
//echo 'presort type: '.gettype($products_updated).'<br/><textarea>'.print_r($products_updated, true).'</textarea><hr/>';

array_multisort($products_updated, SORT_ASC, SORT_REGULAR);
//echo 'postsort type: '.gettype($products_updated).'<br/><textarea>'.print_r($products_updated, true).'</textarea>';
		//$products_updated = sort($products_updated);
		foreach($products_updated as $product)
		{
			echo $product.'<br/>';
		}
//
		//?>
	
	</div>
	<div class="span2  well" >
		elapsed time: <?=$elapsed_time?> seconds
	</div>
	
</div>
