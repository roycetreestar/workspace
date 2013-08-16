<div class="well">
<strong>Name:</strong>	<?= $xml_obj->Experiment->attributes()->name ?><br/>
<strong>Created:</strong>	<?= $xml_obj->Experiment->attributes()->date ?><br/>
<strong>Lab:</strong>	<?= $xml_obj->Experiment->attributes()->lab ?><br/>
<strong>Investigator:</strong>	<?= $xml_obj->Experiment->attributes()->investigator ?><br/>
<strong>Description:</strong>	<?= $xml_obj->Experiment->attributes()->description ?><br/>
<strong>Citations:</strong>	 There is no citation info for this panel.<br/>

<br/><br/>
<strong>Cytometer Manufacturer:</strong>	<?= $xml_obj->FlowCytometer->GeneralInfo->attributes()->manufacturer ?><br/>
<strong>Cytometer Model:</strong>	<?= $xml_obj->FlowCytometer->GeneralInfo->attributes()->model ?><br/>



<?php
	foreach($xml_obj->FlowCytometer->LightSource as $laser)
	{
?>
		<h4><?= $laser->attributes()->type?> (<?=$laser->attributes()->wavelength?>)</h4>
		<table>
			<tr><td>Channel Range</td><td>Target</td><td>Format</td><td>Clone</td><td>Catalog Number</td><td>Recent Price</td><td>View Product</td></tr>
<?php
		foreach($laser->Detector as $detector)
		{
			//~ $da = $detector->attributes();
			if( $detector->attributes()->used == 1)
			//~ if($used === 1 )
			{
				echo '
				<tr>
					<td>'.$detector->attributes()->wavelength.'/'.$detector->attributes()->bandwidth .' </td> 
					<td>'.$detector->attributes()->target.'</td>
					<td>'.$detector->attributes()->chrome.'</td>
					<td> (clone) </td>
					<td> (Catalog Number) </td>
					<td> (Price) </td>
					<td> (View Product) </td>
				</tr>';
			}
		}
?>	
		</table>
<?php	
	}



?>














<hr/>
<textarea><?=var_dump($xml_obj)?></textarea>











</div>
