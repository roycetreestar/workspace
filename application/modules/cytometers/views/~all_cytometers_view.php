
<!-- button/tabs for my_instruments and core_instruments -->
<a class="btn" href="cytometers/my_instruments">My Instruments</a>
<!--<a class="btn" href="cytometers/core_instruments">Core Instruments</a>-->
 
	   
<?php 
// tabs/buttons at top of page
$previous = '';
foreach($user_cytometers as $thisCytometer)
{
	if($thisCytometer['corename'] != $previous)
		echo '<a class="btn" id="trigger_'.$thisCytometer['coreid'].'">'.$thisCytometer['corename'].'</a>';

	$previous = $thisCytometer['corename'];
}


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
					
					
<?php $img_src = 'addons/shared_addons/modules/cytometers/img/cytometers/'.strtoupper(str_replace(' ', '',$thisCytometer['model'])).'.png'; ?>					
					
					
						<div class="span3 well cytometerConfigDiv_<?=$thisCytometer['cytometerid']?>" id="cytometer_<?= $thisCytometer['cytometerid'] ?>" >
								<img src="<?=$img_src?>" />
								  <h4>	<?= $thisCytometer['cytometerName']?>  </h4>
<!--								  <strong>cytometerid:</strong>
								  <?= $thisCytometer['cytometerid']?>
								  <br/>
								  <strong>coreid:</strong>
								  <?= $thisCytometer['coreid']?>
								  <br/>
-->								  <strong>manufacturer:</strong>
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
						
						
						
						
<?php	// parse the XML
		$cyt = new SimpleXMLElement($thisCytometer['cytometerConfigXML']);
?>




						<div class="laserConfigDiv span3 well" id="laser_details_<?=$thisCytometer['cytometerid']?>" > 
<!--							manufacturer:	<?= $cyt->FlowCytometer->GeneralInfo['manufacturer']?>					<br/>
								model:			<?= $cyt->FlowCytometer->GeneralInfo['model']?>							<br/>
-->		<?php					
						// for each lightsource, print out it's detectors' data
								foreach($cyt->FlowCytometer->LightSource as $laser)
								{
		?>								<span style="color:<?= $laser['type']?>;">	<?= $laser['type'].'('.$laser['wavelength']?>)</span>
										<br/>
										<br/>
		<?php							foreach($laser->Detector as $detector)
										{
												$low = $detector['wavelength']-($detector['bandwidth']/2);
												$high = $detector['wavelength']+($detector['bandwidth']/2);
		?>										<div>
													<span>  <?= $low ?>	  </span> 
													<span>  <?= $high ?>  </span>
												</div>
												<br/>
		<?php							}
								}
		?>	
						</div><!-- end laserConfigDiv -->
						
						
						
		</div>	<!-- end cytometerContainer -->
				
				<?php	$currentcore = $thisCytometer['coreid'];
		}//end foreach

?>



