<div class="row-fluid" >	<!-- start widget	-->

	<div id="upload_form" class="span8 well" style="height:250px;" >

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
	<div class="span2 well" id="status_update" style="height:250px; overflow:auto;">
		import status<hr/>
	</div>
	
	
	<div class="span1 well" id="timer_container" style="height:50px: " >
		timer here
	</div>
	
	
</div><!-- end widget -->
