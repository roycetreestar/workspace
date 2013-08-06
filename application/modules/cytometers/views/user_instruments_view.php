
<ul>
<!-- button/tabs for my_instruments and core_instruments -->
<li class="btn" id="upload_btn">Upload</li>
<li class="btn" id="my_instruments_btn">My Instruments</li>
 
	   
<?php 
// TABS / BUTTONS FOR SWITCHING BETWEEN CORES' CYTOMETER VIEWS //
	$previous = '';
	foreach($user_cytometers as $thisCytometer)
	{
		if($thisCytometer['corename'] != $previous)
			echo '<li class="btn" id="trigger_'.$thisCytometer['coreid'].'">'.$thisCytometer['corename'].'</li>';

		$previous = $thisCytometer['corename'];
	}
?>
</ul>







<?php
//	THE MY_INSTRUMENTS PRIVATE CYTOMETER CONFIGS	//
echo $template['partials']['my_instruments_p'];					

//	THE UPLOAD CYTOMETER CONFIGS	//
echo $template['partials']['upload_cytometer_p'];					

//	INCLUDE THE CYTOMETER_DISPLAY_P PARTIALS IN THE VIEW	//
foreach($core_divs_names as $core_cyt)
{
	echo $template['partials'][$core_cyt];
}
?>




<div id="laserModal" class="modal hide fade">
	<div class="modal-header" id="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h3>Modal header</h3>
	</div>
	<div class="modal-body">
		<p>One fine body…</p>
	</div>
<!--	<div class="modal-footer">
		<a href="#" class="btn">Close</a>
		<a href="#" class="btn btn-primary">Save changes</a>
	</div>-->
</div>
