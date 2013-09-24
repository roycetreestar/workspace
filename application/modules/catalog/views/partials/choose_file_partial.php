
	<div>
		<form id="choose_file_form" action="upload.php" method="post" enctype="multipart/form-data">
			
						
			<h3>1. Choose a vendor:</h3>
			<?=$vendor_id_dropdown?>
				
			<br/>
			<?php //echo get_vendor_dirs_dropdown() ?>
			
			<div id="files_dd_container"></div>
			
<!--
			<?= $uploads_folder ?>
			<select id="files_select" >
				<option>first, choose a vendor from above</option>
			</select>
-->
			
			<br/><br/>
			<input type="submit" name="submit" value="Submit">
		</form>
		
		
		<div id="partial_extra" style="background-color:green; color:violet"> choose a file from the uploads folder: </div>
	</div>
