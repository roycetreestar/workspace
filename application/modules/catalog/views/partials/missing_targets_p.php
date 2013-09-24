<?php //	PRINTS OUT EACH TARGET NAME MISSING FROM OUR DATABASE	?>


<div class="well">
	<h3>these targets were not found in our database:</h3>
	<hr/>
	<?php 
		$count=1;
		foreach ($errors['missing_targets'] as $key=>$target)
		{
			echo $count.' -- '. $target.'<br/>';
			$count++;
		}
	?>
</div>