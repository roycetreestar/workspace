<div class="well" id="upload_div">
	<?php 
	if(isset($response))
		echo $response;
	//	echo $response;
	?>

	
	<h3>Instructions:</h3>
	<div class="well" id="instructions_div">
		If you manage instruments in a core facility or a lab, please <a class="btn">Create a Fluorish Core </a> 
		and upload shared instruments to the Fluorish core so other users can access the instruments.
		<br/>

		<br/>
		<ul>
			<li>Ideally, the local core facility will upload and maintain the instrument configurations for their Fluorish Core.</li>
			<li>If the core is unwilling, or unable, to provide their configuration files in a Fluorish core, 
				or if you have a specific configuration that <u>just</u> you use, you can upload/create 
				configuration files and save them to your account.</li>
			<li><u>These will not be shared with anyone.</u></li>
			<li>Once saved to your account, they can be downloaded as XML files to send to colleagues or to upload to FlowRepository.</li>
		</ul>
	</div>
	
	
	
	
	
	
	
	<?php echo form_open_multipart('cytometers/do_upload');?>

<!-- 
	if they're a core manager they can choose to upload a file as an official config for that(those) core(s)
	or to upload it as a private configuration 
	else, they can only upload it as a private config
-->
	<?php 
//		if(IS_CORE_MANAGER) 
//		{	
			echo '<strong> Add to a Core You Manage? </strong>';
			echo $managed_cores_dd;
//		}
	?>
		<br/><br/>
		<strong>building / room number or special name?</strong>
		<br/>
		<input type="text" name="cytometerName"  />
		<br/>
		<br/>
		<input type="file" name="file" size="20" />
		<br/>
		<br/>

		<input type="submit" value="upload" />

	</form>
</div>