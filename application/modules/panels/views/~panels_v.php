
<div class="container">
<!-- <input type="button"  href="<?= base_url('panels/upload_panel') ?>" value="Upload A Panel"	/> -->
<a class="btn" href="<?= base_url('panels/upload_panel') ?>">Upload A Panel</a>

<!-- <button id="toggleModal">Toggle 'Modal'</button> -->
<?php 
$count = 1;
	foreach($panelsArr as $panel)
	{
?>		
	<!-- debug: -->
<!--		<div class="row-fluid" style="border:solid red 3px;"><textarea><?php var_dump($panel, true) ?></textarea></div>			-->
	<!-- end debug -->
		<div class="row-fluid">	
			<div class="panelContainer">
				<div class="span5 ">
					<!--<h3>panelid:<?= $panel->panelid ?></h3>	-->
					
					<h2><strong>Lab name: </strong><?= $panel->lab ?>	</h2>
					<h3><strong>panel name: </strong><?= $panel->name ?>	</h3>
					<strong>date: </strong><?= $panel->date ?>	<br/>
					<strong>Investigator: </strong><?= $panel->investigator ?>	<br/>
					<strong>Cytometer: </strong><?= $panel->cytometer ?>	<br/>
					<strong>Species: </strong><?= $panel->species ?>	<br/>
					<strong>Size: </strong><?= $panel->size ?>	<br/>
					<strong> Dyes: </strong> <?= $panel->panelXML->Dyes ?>	<br/>
					<strong> Channels: </strong> <?= $panel->panelXML->Channels ?>	<br/>
					<strong>description: </strong><?= $panel->description ?>	<br/>
					

				</div>
				<div class="centered">
					<ul>
						<li class="thingy btn" id="expand_<?=$panel->panelid?>">Expand</li>
						<!-- <li class="thingy btn" id="collapse_<?//=$panel->panelid?>">collapse</li> -->
	<!--					<li class="thingy" id="download_<?=$panel->panelid?>">download</li>		-->
						<li class="thingy" id="download_<?=$panel->panelid?>">
								<a class="showPanel btn" title="Download Panel" href="panels/panels/download_panel/<?=$panel->panelid?>">
								Download
								</a>
						</li>
						<li class="thingy btn" id="delete_<?=$panel->panelid?>">
							<a class="deletePanel" title="Delete Panel" href="panels/panels/delete_panel/<?=$panel->panelid?>">
								Delete
							</a>
						</li>
						<li class="thingy btn" id="addPubmed_<?=$panel->panelid?>">add pubmed id</li>
						<li class="thingy btn" id="addOmip_<?=$panel->panelid?>">add omip</li>
					</ul>
				</div>
			</div>

			<div class="span12 channelContainer" id="channelContainer_<?= $panel->panelid ?>">
				<h3>Channels</h3>
	<?php
			foreach($panel->panelXML->Channels->Channel as $channel)
			{
	?>			
				<div class="span2">
					<strong>target:</strong><?=$channel['target'] ?>	<br/>
					<strong>fluor:</strong><?=$channel['fluor'] ?>	<br/>
					<strong>vendor:</strong><?=$channel['vendor'] ?>	<br/>
					<strong>catalog:</strong><?=$channel['catalog'] ?>	<br/>
					<strong>amount:</strong><?=$channel['amount'] ?>	<br/>
					<strong>price:</strong><?=$channel['price'] ?>	<br/>
					<strong>clone:</strong><?=$channel['clone'] ?>	<br/>
					<strong>alternates:</strong><?=$channel['alternates'] ?>	<br/>
		
		
				</div>
<?php 	
			}//end foreach(channel)
?>
			</div><!-- end .channelsContainer -->
		</div><!-- end .row-fluid -->
		
<?php		
	}//end foreach(panel)

//~ print_r($panelWidgets);


?>


<div id="tempModal" >
	<div>
		<button class="button" id="hide_tempModal">X</button>
	</div>
<!-- this will temporarily hold the upload-a-panel form and its response -->
	<div id="tempModalContent"></div>

</div>

</div>