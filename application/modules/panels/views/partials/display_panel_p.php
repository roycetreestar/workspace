<?php
					// HEY YOU!!! //
//
// This partial uses the wavelength_color() function from the misc_functions.php library.	//
// Make sure your controller function loads the library so we can find wavelength_color()!	//
//
//
?>
<div class="container">
 <input type="button"  href="<?= base_url('panels/upload_panel') ?>" value="Upload A Panel"	/> 

 </div>
<?php 

//~ function wavelength_color($wavelength)
//~ {
	//~ if($wavelength < 450)
		//~ $color = 'violet';
	//~ else if($wavelength >= 450 && $wavelength < 495)
		//~ $color = 'blue';
	//~ else if($wavelength >= 495 && $wavelength < 570)
		//~ $color = 'green';
	//~ else if($wavelength >= 570 && $wavelength < 590)
		//~ $color = 'yellow';
	//~ else if($wavelength >= 590 && $wavelength < 620)
		//~ $color = 'orange';
	//~ else if($wavelength >= 620 )
		//~ $color = 'red';

	//~ return $color;
//~ }
?>		

		<div class="row-fluid">	
			<div class="panelContainer">
				<div class="span5 ">
					<!--<h3>panelid:<?= $panel->id ?></h3>	-->
<!-- <Experiment> attributes: -->					
					<h2><strong>Lab name: </strong><?= $panel['panelXML']->Experiment->attributes()->lab ?>	</h2>
					<h3><strong>panel name: </strong><?= $panel['panelXML']->Experiment->attributes()->name ?>	</h3>
					<strong>date: </strong><?= $panel['panelXML']->Experiment->attributes()->date ?>	<br/>
					<strong>Investigator: </strong><?= $panel['panelXML']->Experiment->attributes()->investigator ?>	<br/>
					<strong>Cytometer: </strong><?= $panel['cytometer'] ?>	<br/>
					<strong>Species: </strong><?= $panel['species'] ?>	<br/>
					<strong>Size: </strong><?= $panel['size'] ?>	<br/>
					<strong> Dyes: </strong> <?= $panel['panelXML']->Dyes ?>	<br/>
					<strong> Channels: </strong> <?= $panel['panelXML']->Channels ?>	<br/>
					<strong>description: </strong><?= $panel['description'] ?>	<br/>
					

				</div>
				<div class="centered">
					<ul>
						<li class="btn" id="expand_<?=$panel['id']?>">Expand</li>
						<li class="btn" id="collapse_<?=$panel['id']?>">collapse</li> 
						<li class="btn" id="download_<?=$panel['id']?>">Download</li>
					<!--	<li class="btn" id="delete_<?=$panel['id']?>">Delete</li>		-->
						<li class="btn" id="addPubmed_<?=$panel['id']?>">add pubmed id</li>
						<li class="btn" id="addOmip_<?=$panel['id']?>">add omip</li>
					</ul>
				</div>
			</div>

			<div class="span12 channelContainer" id="channelContainer_<?=$panel['id']?>">
				<h3>Channels</h3>
			<?php
			foreach($panel['panelXML']->FlowCytometer->LightSource as $lightsource)
			{
				$wavelength = $lightsource->attributes()->wavelength;
				$type = $lightsource->attributes()->type;
				
				$color = $this->misc_functions->wavelength_color($wavelength);

			?>
				<table class="table">
					<tr><th>	<?= '<div class="wavelengthColor inline" style="background-color:'.$color.'; width:10px; height:15px; float:left;"></div> '.$type.'  - wavelength:'.$wavelength	?>	</th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
					<tr><th></th><th>Channel Range</th>	<th>Target</th>	<th>Format</th>	<th>Clone</th>	<th>Catalog Number</th>	<th>Recent Price</th>	<th>View Product</th>	</tr>
					<?php 
						foreach($lightsource->Detector as $detector)
						{
							if($detector->attributes()->used == 0)
								echo '<tr><td></td><td><span style="background-color:'.$this->misc_functions->wavelength_color($detector->attributes()->wavelength ).';">'.$detector->attributes()->wavelength .'/'.$detector->attributes()->bandwidth .'</span></td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
							else
							{								
								foreach($panel['panelXML']->Channels->Channel as $channel)
								{
									if(trim($channel['target']) == trim($detector->attributes()->target) )
									{										
										echo '<tr><td></td>
											<td><span style="background-color:'.$this->misc_functions->wavelength_color($detector->attributes()->wavelength ).';">'.$detector->attributes()->wavelength .'/'.$detector->attributes()->bandwidth .'</span></td>
											<td>'.$channel['target'].'</td>
											<td>'.$channel['chrome'].'</td>
											<td>'.$channel['clone'].'</td>
											<td>'.$channel['catalog'].'</td>
											<td>'.$channel['price'].'</td>
											<td>'.$channel['vendor'].'</td>
										</tr>';
									}
								}
							}
						}
					?>
				</table>				
				<hr/>
			<?php				
			}
			?>
			</div><!-- end .channelsContainer -->
		</div><!-- end .row-fluid -->

</div>






<script>
	$(document).ready(function()
	{
		$('.channelContainer').slideUp();
	});// end $(document).ready()

//expand		
		$("[id^='expand_']").click(function()
		{
			var buttonid = $(this).attr("id");
			var id = buttonid.substring(buttonid.lastIndexOf("_")+1);
			$("#channelContainer_"+id).slideDown();
		});
//collapse		
		$("[id^='collapse_']").click(function()
		{
			var buttonid = $(this).attr("id");
			var id = buttonid.substring(buttonid.lastIndexOf("_")+1);
			$("#channelContainer_"+id).slideUp();
		});
//download
		$("[id^='download_']").click(function()
		{
			var buttonid = $(this).attr("id");
			var id = buttonid.substring(buttonid.lastIndexOf("_")+1);
			
/*
document.preventDefault();
*/
document.location.href = "<?=base_url().'/panels/download/'?>"+id
		});
//delete
		$("[id^='delete_']").click(function()
		{
			var buttonid = $(this).attr("id");
			var id = buttonid.substring(buttonid.lastIndexOf("_")+1);
			alert('you\'d be downloading this panel (id='+id+') now');
		});
//add pubmed id
		$("[id^='addPubmed_']").click(function()
		{
			var buttonid = $(this).attr("id");
			var id = buttonid.substring(buttonid.lastIndexOf("_")+1);
			alert('you\'d be adding a PubMed id for this panel (id='+id+') now');
		});
//add omip		
		$("[id^='addOmip_']").on('click', (function()
		{
			var buttonid = $(this).attr("id");
			var id = buttonid.substring(buttonid.lastIndexOf("_")+1);
			alert('you\'d be adding an OMIP for this panel (id='+id+') now');
		}) );
		
		
		
		
						
	


</script>
