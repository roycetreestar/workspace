<?php
/**
 * provides two divs: 
 * one with a cytometer picture, manufacturer and model data, and buttons to edit, delete, and show the other div
 * the other div holds laser/detector data and is opened/closed with a button in the first div
 */

//~ echo '<textarea>'.print_r($xml, true).'</textarea><hr/>';
//	WHICH IMAGE TO USE?	//
$img_src = base_url().'assets/cytometers/img/cytometers/'.strtoupper(str_replace(' ', '',$xml->FlowCytometer->GeneralInfo['model'])).'.png';

//	DOES THE CYTOMETER HAVE A CYTOMETERNAME?	//
if($cytometerName == '')
	$cytometerName = 'unnamed cytometer';
?>

<script type="text/javascript" src="<?=base_url().'assets/cytometers/js/cytometers.js'?>"></script>

<!-- MAIN CONTAINER	-->						
<div class="cytometerContainer" >
					
	
	
	
				
		
	
	
	
<!-- PICTURE AND BASIC DATA	-->					
	<div class="span3 well cytometerConfigDiv_<?=$cytometerid?>" id="cytometer_<?= $cytometerid ?>" >
		<h3>	<?= $cytometerName ?>  </h3>	
		<img src="<?=$img_src?>" />
		<br/>
		<strong>manufacturer:</strong>
			<?= $xml->FlowCytometer->GeneralInfo['manufacturer']?>
		<br/>
		<strong>model:</strong>
			<?= $xml->FlowCytometer->GeneralInfo['model']?>
		<br/>
<!-- BUTTONS	-->
		<br/>
		<a class="btn" href="<?= base_url('cytometers/edit/'.$cytometerid) ?> ">edit</a> 
		<a class="btn" href="<?= base_url('cytometers/deleteCytometer/'.$cytometerid) ?> ">delete</a>
		<a class="btn" id="slide_laser_<?= $cytometerid?>">Slide Open</a>
		<a class="btn"	 role="button" data-toggle="#laserModal" id="modal_laser_<?= $cytometerid?>">Open In Modal</a>
<!-- END BUTTONS	-->

	</div><!-- end cytometerConfigDiv -->
<!-- END PICTURE AND BASIC DATA	-->	
						
	



						
<?php
//	PARSE THE XML INTO A STRING	//
	//~ $cyt = new SimpleXMLElement($cytometerConfigXML);	
?>





<!-- LASER / DETECTOR SPECIFICS DIV 	-->

	<div class="laserConfigDiv span3 well" id="laser_details_<?=$cytometerid?>" > 

<?php // for each lightsource, print out it's detectors' data
		foreach($xml->FlowCytometer->LightSource as $laser)
		{	?>								
			<span style="color:<?= $laser['type']?>;">	<?= $laser['type'].'('.$laser['wavelength']?>)</span>
			<br/>
			<br/>
<?php		foreach($laser->Detector as $detector)
			{
				$low = $detector['wavelength']-($detector['bandwidth']/2);
				$high = $detector['wavelength']+($detector['bandwidth']/2);?>

				<div>
					<span>  <?= $low ?>	  </span> 
					<span>  <?= $high ?>  </span>
				</div>
				<br/>
<?php		}
		}	?>	
	</div><!-- end .laserConfigDiv -->
	
<!-- END LASER SPECIFICS	-->





</div>	<!-- end cytometerContainer -->
				
