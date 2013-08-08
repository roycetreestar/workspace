
<!-- button/tabs for my_instruments and core_instruments -->
<a class="btn" id="upload_btn">Upload</a>
<a class="btn" id="my_instruments_btn">My Instruments</a>
<!--<a class="btn" href="cytometers/core_instruments">Core Instruments</a>-->
 
	   
<?php 
// TABS / BUTTONS FOR EACH CORE //
$previous = '';
foreach($user_cytometers as $thisCytometer)
{
	if($thisCytometer['corename'] != $previous)
		echo '<a class="btn" id="trigger_'.$thisCytometer['coreid'].'">'.$thisCytometer['corename'].'</a>';

	$previous = $thisCytometer['corename'];
}



//	THE MY_INSTRUMENTS PRIVATE CYTOMETER CONFIGS	//
echo $template['partials']['my_instruments_p'];					// id="my_instruments_div"

//	THE UPLOAD CYTOMETER CONFIGS	//
echo $template['partials']['upload_cytometer_p'];					// id="my_instruments_div"



//	EACH CORE HAS A CONTAINER HOLDING ALL ITS CYTOMETERS' DATA	//

	$currentcore = '';	
		foreach($user_cytometers as $thisCytometer)
		{	

		// if it's another core, print out the core's name
			if($thisCytometer['coreid']!= $currentcore)
			{	
			// if it's another cytometer in the same core, close the previous cytometer's div
			// if it's the first time through the loop, don't close it, even though the cytometer name doesn't match the '' of default
				if($currentcore !='') 
				{ ?>
			</div> <!-- end coreContainer -->
<?php			} ?>

			
			<!-- start a core's cytometer readouts -->
			<div class="row-fluid coreContainer" id="coreContainer_<?= $thisCytometer['coreid']?>" >
				<h2>Core Name:		<?= $thisCytometer['corename']?>	</h2>
<?php		} ?>
				
								
				<div class="cytometerContainer " >
					
					<div class="span3 well cytometerConfigDiv_<?=$thisCytometer['cytometerid']?>" id="cytometer_<?= $thisCytometer['cytometerid'] ?>" >
					
						<h3>	<?= $thisCytometer['cytometerName']?>  </h3>
						<img src="addons/shared_addons/modules/cytometers/img/cytometers/<?=strtoupper(str_replace(' ', '',$thisCytometer['model']))?>.png" />

						<strong>manufacturer:</strong>
						<?= $thisCytometer['manufacturer']?>
						<br/>
						<strong>model:</strong>
						<?= $thisCytometer['model']?>
						<br/>

						<br/>
						<a class="btn" href="<?= base_url('cytometers/edit/'.$thisCytometer['cytometerid']) ?> ">edit</a> 
						<a class="btn" href="<?= base_url('cytometers/deleteCytometer/'.$thisCytometer['cytometerid']) ?> ">delete</a>
						<a class="btn" id="slide_laser_<?= $thisCytometer['cytometerid']?>">Slide Open</a>
						<a class="btn" id="modal_laser_<?= $thisCytometer['cytometerid']?>">Open In Modal</a>
					</div><!-- end cytometerConfigDiv -->
						
						
						
						
<?php	$cyt = new SimpleXMLElement($thisCytometer['cytometerConfigXML']);		// parse the XML	?>




					<div class="laserConfigDiv span3 well" id="laser_details_<?=$thisCytometer['cytometerid']?>" > 
	
<?php			// for each lightsource, print out it's detectors' data
							foreach($cyt->FlowCytometer->LightSource as $laser)
							{	?>								
								<span style="color:<?= $laser['type']?>;">	<?= $laser['type'].'('.$laser['wavelength']?>)</span>
								<br/>
								<br/>
<?php							foreach($laser->Detector as $detector)
								{
									$low = $detector['wavelength']-($detector['bandwidth']/2);
									$high = $detector['wavelength']+($detector['bandwidth']/2);?>
									
									<div>
										<span>  <?= $low ?>	  </span> 
										<span>  <?= $high ?>  </span>
									</div>
									<br/>
<?php							}
							}	?>	
					</div><!-- end laserConfigDiv -->
						
						
						
		</div>	<!-- end cytometerContainer -->
				
				<?php	$currentcore = $thisCytometer['coreid'];
		}//end foreach

?>



