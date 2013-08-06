<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div  id="my_instruments_div">
	<h2> My Instruments </h2>
	
	
	
<?php
	foreach($myinstruments as $thisCytometer)
	{
		echo $template['partials']['my_cyt_'.$thisCytometer['cytometerid']];
	}
?>	
	
	
</div>



