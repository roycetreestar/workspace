<div id="insert_success">

	<h3>Your file was successfully uploaded!</h3>
	products inserted: <?=$insert_num?><br/>
	products updated: <?=$update_num?><br/>
	products matching $EXCLUDE: <?=$exclude_num?><br/>
	<br/>
	total products imported: <?php echo ($insert_num+$update_num+$exclude_num) ?>
</div>
