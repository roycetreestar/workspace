<?php

//~ echo '<textarea>'.print_r($xml_obj, true).'</textarea><hr/>';
//	WHICH IMAGE TO USE?	//
$img_src = base_url().'assets/cytometers/img/cytometers/'.strtoupper(str_replace(' ', '',$xml_obj->GeneralInfo['model'])).'.png';

//	DOES THE CYTOMETER HAVE A CYTOMETERNAME?	//
if(!isset($cytometerName) || $cytometerName == '' )
	$cytometerName = $xml_obj->attributes()->name;//'unnamed cytometer';
?>

<script type="text/javascript" src="<?=base_url().'assets/cytometers/js/cytometers.js'?>"></script>

<!-- MAIN CONTAINER	-->						
<div class="cytometerContainer" >
					
	
	
	
				
		
	
	
	
<!-- PICTURE AND BASIC DATA					-->	
	<div class="span3 well cytometerConfigDiv_<?=$resource_id//$cytometerid?>" id="cytometer_<?= $resource_id//$cytometerid ?>" >

		<h3>	<?= $cytometerName ?>  </h3>	
		<img src="<?=$img_src?>" />
		<br/>
		<strong>manufacturer:</strong>
			<?= $xml_obj->GeneralInfo['manufacturer']?>
		<br/>
		<strong>model:</strong>
			<?= $xml_obj->GeneralInfo['model']?>
		<br/>
<!-- BUTTONS	-->
		<br/>
		<a class="btn" href="<?= base_url('cytometers/edit/'.$resource_id)//$cytometerid) ?> ">edit</a> 
<!--		<a class="btn" href="<?= base_url('cytometers/delete/'.$cytometerid) ?> ">delete</a>	-->
		<a class="btn" id="slide_laser_<?= $resource_id//$cytometerid?>">Slide Open</a>
		<a class="btn"	 role="button" data-toggle="#laserModal" id="modal_laser_<?= $resource_id//$cytometerid?>">Open In Modal</a>
<!-- END BUTTONS	-->

	</div><!-- end cytometerConfigDiv -->
<!-- END PICTURE AND BASIC DATA	-->	
						
	



						
<?php
//	PARSE THE XML INTO A STRING	//
	//~ $cyt = new SimpleXMLElement($cytometerConfigXML);	
?>





<!-- LASER / DETECTOR SPECIFICS DIV 	-->

	<div class="laserConfigDiv span3 well" id="laser_details_<?=$resource_id?>" > 

<?php // for each lightsource, print out it's detectors' data
		foreach($xml_obj->LightSource as $laser)
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
