<div class="row">
	<div class="span12">

		<div class="well">
			<?php if(isset( $response)) echo $response; ?>
		<form id="uploadPanelForm"  action="<?php echo  'panels/upload_panel/do_upload/' ?>" method="post" enctype="multipart/form-data">		
	
			<label for="file">Choose a file to open:</label>
			<input type="file" name="file" id="file" ><br>
			
			
			
			<strong>Others may benefit from your panel. Would you like to share it?</strong><br/>
			
			<input type="radio" name="sharingPref" id="private" value="private" checked="checked" />
			<label for="private">No, just me</label>
			
			<br/>
			<input type="radio" name="sharingPref" id="lab" value="lab" />
			<label for="lab" >Share with lab</label>
			
			<br/>
			<input type="radio" name="sharingPref" id="institution" value="institution" />
			<label for="institution">Share with lab and institution:</label>
			
			<br/>
			<input type="radio" name="sharingPref" id="everyone" value="everyone" />
			<label for="everyone">Share with everyone</label>
			
			<br/><br/>
			<input type="submit" name="submit" value="Submit">
			
		<!--	<a id="submit-upload" class="btn" >Submit Upload Now</a>	-->
		</form>
		</div>
	
	</div>
</div>