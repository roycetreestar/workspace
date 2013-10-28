<div class="row-fluid" >	<!-- start widget	-->

	<div id="upload_form" class="span5 well" style="height:250px;" >

		<?php 	if(isset($error) && $error !== '')
				{
					foreach($error as $txt)
						echo $txt;				
				}
		?>

		<?php //echo form_open_multipart('xml_cat_imports/upload/do_upload');?>
	<form id="uploadPanelForm"  action="<?=base_url().'catalog/catalog_imports' ?>" method="post" enctype="multipart/form-data">
		
		<?php echo $vendor_id_dropdown ?>
		<br/><br/>
		<input type="file" name="file" size="20" />
		
		<br /><br />
logid:<input type="text" id="logid" name="logid" size="5" readonly />
<br/>
		<input type="submit" value="upload" />

		</form>
	</div><!-- end #upload_form -->





<!-- an import status container -->	
	<div class="span5 well" id="status_update" style="height:250px; overflow:auto;">
		import status<hr/>
	</div>
	
<!-- the client-side timer -->		
	<div class="span2"  style="height:50px: " >
		<div class="row-fluid" >
			<div class="span12 well" id="timer_container">
				timer here
			</div>
<!--
			<div class="span12 well" id="time_interval_container" >
				time_interval_container here<br/>
				<div class="ui-spinner" >
					<input type="text" style="width:50px" id="spinner" />
				</div>
			</div>
-->
		</div>
	</div>
	
	
</div><!-- end widget -->


