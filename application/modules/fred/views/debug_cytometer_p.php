<div>
	<h1>It's a cytometer config</h1>
	
<?php 
	?>
	
	
	<h3>File attributes:</h3>
	<ul>
	<?php
		//~ foreach($thisCytometer->attributes() as $key=>$value)
		//~ {
			//~ echo '<li>'. $key.' = '.$value.'</li>';
		//~ }
		echo '<li><strong>$thisCytometer->attributes()->type: </strong> '.$thisCytometer->attributes()->type.'</li>';
		echo '<li><strong>$thisCytometer->attributes()->name: </strong> '.$thisCytometer->attributes()->name.'</li>';
	?>
	</ul>
	
	General Info:
	<ul>
	<?php
		//~ foreach($thisCytometer->FlowCytometer->GeneralInfo->attributes() as $key=>$value)
		//~ {
			//~ echo '<li>'. $key.' = '.$value.'</li>';
		//~ }
		echo '<li><strong>$thisCytometer->FlowCytometer->GeneralInfo->attributes()->manufacturer: </strong> '.$thisCytometer->FlowCytometer->GeneralInfo->attributes()->manufacturer.'</li>';
		echo '<li><strong>$thisCytometer->FlowCytometer->GeneralInfo->attributes()->model: </strong> '.$thisCytometer->FlowCytometer->GeneralInfo->attributes()->model.'</li>';
	?>
	</ul>
	
	
	LightSource(s):
		<ul>
	<?php
		foreach($thisCytometer->FlowCytometer->LightSource as $laser)
		{
			echo '<ul>';		
				foreach($laser->attributes() as $key=>$value)
				{
					echo '<li>'. $key.' = '.$value.'</li>';
				}
			echo '<li>detectors:<ol>';
			foreach($laser->Detector as $detector)
			{
				echo '<li>wavelength: '.$detector->attributes()->wavelength.' - bandwidth: '.$detector->attributes()->bandwidth.'</li>';				
			}
			echo '</ol></li>';
			echo '</ul><br/>';
		}
	?>
	</ul>



<hr/><hr/>



</div>
<textarea><?=var_dump($thisCytometer)?></textarea>
<hr/>
