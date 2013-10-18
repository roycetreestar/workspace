<script type="text/javascript" src="<?= base_url().'assets/cytometers/js/cytometer_config.js'?>" ></script>
<?php
//~ echo '$xml_obj:<br/><textarea>'.print_r($xml_obj, true).'</textarea><br/>';
?>

<textarea>
<?php die( print_r($xml_obj, true) ) ?>
</textarea>

<div  id="cytometerConfigBuilderDiv" class="well">
<!--			<form id="formCytometerConfig" method="post" action="cytometers/save_to_account/<?php //echo $cytometerid ?>">		-->
			<form id="formCytometerConfig" method="post" action="<?= base_url('cytometers/save_cytometer') ?>">
				
				<h1>Cytometer Configuration Builder</h1>
				<div id="flowCytometer" class="flowCytometer" >
						
					<label for="name"><strong>Building/room number or special name </strong></label>
					<input type="text" name="name" id="cytometerName" value="<? if(isset($xml_obj)) echo $xml_obj->attributes()->name ?>"/>
					
					<label for="manufacturer"><strong>Manufacturer</strong></label>
						<?php //echo $manufacturerDropdown ?>
						<?php //echo $cytometerModelDropdown ?>
					
						<select id="manufacturer">
							<option>I can't be dynamically derived </option>
							<option>from the database because</option>
							<option>I'm coming here from fred</option>
							<option>and fred can't talk to the db</option>
						</select>
						
					<label for="manufacturer"><strong>Model</strong></label>
						<select id="manufacturer">
							<option>I can't be dynamically derived </option>
							<option>from the database because</option>
							<option>I'm coming here from fred</option>
							<option>and fred can't talk to the db</option>
						</select>					
				</div>
					
				<div id="laserContainer">
<?php
//~ die(var_dump($xml_obj));
// if a cytometerid is passed in, populate the form from its config file 
					if(isset($xml_obj))				
					{	
						$lightNum = 1;	
						echo '<input type="text"  readonly name="group_id" value="'.$group_id.'" />
							<input type="text" readonly name="cytometerid" value="'.$resource_id.'" />';

//~ echo '$xml_obj[\'cyt\']:<br/><textarea>'.print_r($xml_obj['cyt'], true).'</textarea>';
//for each of the cytometer's light sources:
						foreach($xml_obj->FlowCytometer->LightSource as $laser)
						{	
//~ echo '$laser:<br/><textarea>'.print_r($laser, true).'</textarea>';
?>
									<div id="lightSource<?= $lightNum ?>" class="lightSource well">
								   
										<b> Laser Type:</b><input class="laserType required" name="lightSource[<?= $lightNum ?>][type]" type="text" id="laser<?= $lightNum ?>" 
											value="<?=$laser['type']?>">
										   
										<b> Wavelength:</b><input class="wavelengthy required" id="wavelength1" type="text" name="lightSource[<?= $lightNum ?>][wavelength]" maxlength="3"  size="3" value=<?=$laser['wavelength']?>><br/>
										<br/>
										<b> Channels/Detectors: </b><br/>
											
									
										<div id="detectorContainer<?= $lightNum ?>" class="detectorContainer">
<?php	//for each of the lightSource's Detectors:
										$detectorNum = 1;
										foreach($laser->Detector as $detector)
										{
											$wave = $detector['wavelength'];
											$band = $detector['bandwidth'];
											$low = $wave - ($band/2);
											$high = $wave + ($band/2);
?>								
											<div class="detectorDetails" style="padding:3px 0 3px 0 ;" id="detectorDetails<?= $lightNum ?><?= $detectorNum ?>">
												Detection Range: 
												<input class="lowerRange" id="lowerRange<?= $detectorNum ?>" maxlength="3"  size="3" value="<?=$low ?>">
												-
												<input class="upperRange" id="upperRange<?= $detectorNum ?>"  maxlength="3" size="3"  value="<?=$high ?>">
												<button type="button" class="btnDetectDelete" id="btnDetectDelete" name="btnDetectDelete" >
													Remove Channel
												</button>
												<input type="hidden" id="detectorBandwidth<?= $detectorNum ?>" name="lightSource[<?= $lightNum ?>][detector][<?= $detectorNum ?>][bandwidth]" value="<?= $band ?>" />
												<br/>
												<input type="hidden" id="detectorWavelength<?= $detectorNum ?>" name="lightSource[<?= $lightNum ?>][detector][<?= $detectorNum ?>][wavelength]" value="<?= $wave ?>"/>
											</div>

				<?php
											$detectorNum ++;
										}
				?>						</div><!-- end #detectorContainer{id} -->
										<button type="button" class="btnDetectAdd" id="btnDetectAdd" name="btnDetectAdd" >
											Add Channel
										</button>
										
									</div><!-- end .lightSource -->
				<?php		$lightNum++;
						}
						
					}
//if no cytometerid is passed in, provide a blank form					
	else			
	{
?>		
				<div id="lightSource1" class="lightSource">			   
					<b> Laser Type:</b><input class="laserType required" name="lightSource[1][type]" type="text" id="laser1" >					   
					<b> Wavelength:</b><input class="wavelengthy required" id="wavelength1" type="text" name="lightSource[1][wavelength]" maxlength="3"  size="3"><br/>
					<br/>
					<b> Channels/Detectors: </b><br/>
					<div id="detectorContainer1" class="detectorContainer">
						<div class="detectorDetails1">
						</div>
					</div>
					<button type="button" class="btnDetectAdd" id="btnDetectAdd" name="btnDetectAdd" >
						Add Channel
					</button>
				</div>
					
		
<?php
	}				
//end laser container and put in bottom-of-page buttons
?>				
						</div><!-- end #laserContainer -->
	
	
					<div>
						<button type="button" id="btnAddLaser" >Add Another Laser</button>
						<button type="button" id="btnDelLaser" >Remove Last Laser</button>
					</div>
<?php if(isset($managedGroupsDropdown))
			//~ echo form_dropdown('coreid', $cores_managed) 
			echo $managedGroupsDropdown;
?>
					<br/><br/>
					<button type="submit" id="saveCytometer" value="save" name="save">
						Save to Account
					</button> 

<!--						<button type="submit" id="downloadCytometer" value="download" name="download">Download</button>
-->

			<br/>
			<br/>
		</form>
</div><!-- end #cytometerConfigBuilderDiv -->
