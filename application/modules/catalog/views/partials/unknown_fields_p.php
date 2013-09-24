<?php //	THESE SPREADSHEET FIELDS COULDN'T BE MATCHED TO THE DATABASE FIELDS	?>


<div class="well">
	<h3>THESE SPREADSHEET FIELDS COULDN'T BE MATCHED TO THE DATABASE FIELDS:</h3>
	<hr/>
	<?php 
		foreach ($errors['unknown_fields'] as $column_name)
		{
			echo $column_name.'<br/>';
		}
	?>
</div>