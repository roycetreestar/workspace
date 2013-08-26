<div class="well" id="import_form_div">
	<?php 
	if(isset($response))
		echo $response;
	//	echo $response;
	?>


	
	
	
	
	
	<?php //echo form_open_multipart('inventory/import_inventory');?>
		<form action="inventory/import_inventory" method="post">

			<br/><br/>
			<strong>Upload an XML, CSV, or xls file <span id="labname">to </span></strong>
			<br/>
			<input type="text" name="labid" id="import_form_labid" />
			<br/>
			<br/>
			<input type="file" name="file" size="20" />
			<br/>
			<br/>

			<input type="submit" value="upload" />

		</form>
</div>
