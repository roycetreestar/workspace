<?php
/**
 *	all cytometer_display_p partials for a given core are combined in this partial
 * 
 */	
?>

<!-- start a core's cytometer readouts -->

<div class="row-fluid coreContainer" id="coreContainer_<?= $coreid?>" >
	<h2>	<?= $corename ?>	</h2>
	

<!--	<textarea style="background-color:green; color:white">
<?php // echo print_r($core_cyt_names, true); ?>
	</textarea>		-->
		
	
	
	
<?php
//	PRINT OUT EACH CYTOMETER_DISPLAY_P FOR THIS CORE	//
	foreach($cyt_display_divs as $cyt)
	{
	//load the cytometer_display_p
		echo $template['partials'][$cyt];
	}

?>
	
</div>