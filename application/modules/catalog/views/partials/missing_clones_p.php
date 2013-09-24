<?php //	PRINTS OUT EACH CLONE NAME MISSING FROM OUR DATABASE	?>


<div class="well">
	<h1>These clones were not found in our database:</h1>
	<hr/>
	<?php 
		foreach ($clone_exceptions as $clone)
		{
			echo $clone;
		}
	?>
</div>