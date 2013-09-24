<?php //	PRINTS OUT ANY UPLOAD ERRORS	?>


<div class="well">
	<h3>There was a problem with the upload:</h3>
	Filename: <?= $errors['filename'] ?>
	<hr/>
	<?php 
		foreach ($errors['upload_errors'] as $error)
		{
			echo $error.'<br/>';
		}
	?>
</div>