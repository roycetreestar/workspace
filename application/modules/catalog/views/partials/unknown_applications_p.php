<?php //	THESE APPLICATIONS COULDN'T BE MATCHED TO THE DATABASE FIELDS	?>


<div class="well">
	<h3>These applications in the spreadsheet couldn't be found in the database:</h3>
	<hr/>
	<?php 
	$count = 1;
		foreach ($errors['bad_application'] as $application_name)
		{
			echo $count.' -- '.$application_name.'<br/>';
			$count++;
		}
	?>
</div>
