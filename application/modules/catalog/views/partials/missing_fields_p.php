<?php //	THESE REQUIRED FIELDS WERE NOT FOUND	?>


<div class="well span6">
	<h3>These required fields were not found in your spreadsheet:</h3>
	<hr/>
	<?php 
		foreach ($errors['missing_fields'] as $column_name)
		{
			echo $column_name.'<br/>';
		}
	?>
</div>


<?php //	THESE SPREADSHEET FIELDS COULDN'T BE MATCHED TO THE DATABASE FIELDS	?>
<!--<div class="well span6">
	<h3>These column names were not found in our database:</h3>
	<?php 
//		foreach ($errors['unknown_fields'] as $column_name)
//		{
//			echo $column_name.'<br/>';
//		}
	?>
</div>-->
