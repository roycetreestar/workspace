<?php //	THESE CATEGORIES COULDN'T BE MATCHED TO THE DATABASE FIELDS	?>


<div class="well">
	<h4>These product categories in the spreadsheet couldn't be found in the database:</h4>
	<hr/>
	<?php 
		$count = 1;
		foreach ($errors['bad_category'] as $category_name)
		{
			echo $count.' -- '.$category_name.'<br/>';
			$count++;
		}
	?>
</div>
