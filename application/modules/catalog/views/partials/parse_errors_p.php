<?php //	PRINTS OUT EACH ERROR ENCOUNTERED WHILE TRYING TO PARSE THE FILE	?>


<div class="well">
	<h3>These errors occurred while trying to parse the file:</h3>
	If you see <i>"EntityRef: expecting ';'"</i>, look for a <i>'&'</i> character that should be replaced with <i>'&amp;amp;'</i>. <br/>
	If you see <i>"StartTag: invalid element name"</i>, look for a <i>"<"</i> character that should be replaced with <i>"&amp;lt;"</i> on the offending line.
	<hr/>
	<?php 
		$count=1;
		foreach ($errors['parse_errors'] as $key=>$target)
		{
			echo $count.' -- '. $target.'<br/>';
			$count++;
		}
	?>
</div>