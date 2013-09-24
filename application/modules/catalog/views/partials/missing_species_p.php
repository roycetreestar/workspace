<?php //	PRINTS OUT EACH SPECIES NAME MISSING FROM OUR DATABASE	?>


<div class="well">
	<h3>These species were not found in our database:</h3>
	<hr/>
	<?php 
		$count=1;
		foreach ($errors['missing_species'] as $key=>$species)
		{
			echo ($count).' -- '.$species.'<br/>';
			$count++;
		}
	?>
</div>