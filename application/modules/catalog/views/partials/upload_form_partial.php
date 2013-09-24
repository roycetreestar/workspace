

<!--<div>
	<textarea>
		<? //= $this_upload ?>
	</textarea>
</div>-->



<div id="upload_form" class="well">

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

	<input type="submit" value="upload" />

	</form>
</div>
