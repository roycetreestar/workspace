<?php //	PRINTS OUT EACH CHROME NAME MISSING FROM OUR DATABASE	?>


<div class="well">
	<h3>these fluorochromes were not found in our database:</h3>
	<hr/>
	<?php 
		$count=1;
		foreach ($errors['missing_chromes'] as $key=>$chrome)
		{
			echo $count.' -- '.$chrome.'<br/>';
			$count++;
		}
	?>
</div>