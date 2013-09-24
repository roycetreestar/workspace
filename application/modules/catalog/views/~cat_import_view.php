<?php
	if(!isset($filename))
		$filename='';
?>
<div class="container-fluid" >
	
	<?php
//die('upload_errors:'.count($errors['upload_errors']).'<br/>
//	missing_chromes: '.count($errors['missing_chromes']).'<br/>
//	missing_targets: '.count($errors['missing_targets']).'<br/>
//	');
	
//debug:
//echo '<textarea>'.print_r($errors, true).'</textarea>';
//end debug
	
//		if(count($errors['unknown_fields']) > 0 )
//		{
//			echo '<div class="row">';
//			echo '<div class="span12">'.$template['partials']['unknown_fields_p'].'</div>';
//			echo '</div>';
//		}
	
		if(isset($template['partials']['insert_success_p']))
		{
			echo '<div class="row errors_div">';
			echo $template['partials']['insert_success_p'];
			echo '</div>';
		}
		if(count($errors['parse_errors']) > 0 )
		{
			echo '<div class="row errors_div">';
			echo $template['partials']['parse_errors_p'];
			echo '</div>';
		}
	
		if(count($errors['missing_fields']) > 0 )
		{
			echo '<div class="row errors_div">';
			echo '<div class="span6">'. $template['partials']['missing_fields_p'] .'</div>';
			echo '<div class="span6 offset1">'. $template['partials']['unknown_fields_p'] .'</div>';
			echo '</div>';
		}
		if(count($errors['missing_chromes']) > 0 )
		{
			echo '<div class="row errors_div">';
			echo '<div class="span7">'.$template['partials']['missing_chromes_p'].'</div>';
			echo '<div class="span3">'.$template['partials']['new_chromes_form_p'].'</div>';
			echo '<div class="span3">'.$template['partials']['new_chrome_alternates_form_p'].'</div>';
			echo '</div>';
		}	
		if(count($errors['missing_species']) > 0 )
		{
			echo '<div class="row errors_div">';
			echo '<div class="span7">'.$template['partials']['missing_species_p'].'</div>';
			echo '<div class="span3">'.$template['partials']['new_species_form_p'].'</div>';
			echo '<div class="span3">'.$template['partials']['new_species_alternates_form_p'].'</div>';
			echo '</div>';
		}
		if(count($errors['missing_targets']) > 0 )
		{
			echo '<div class="row errors_div">';
			echo '<div class="span7">'.$template['partials']['missing_targets_p'].'</div>';
echo '<div class="span3">'.$template['partials']['new_targets_form_p'].'</div>';
echo '<div class="span3">'.$template['partials']['new_targets_alternates_form_p'].'</div>';
			echo '</div>';
		}
		if(count($errors['upload_errors']) > 0 )
		{
			echo '<div class="row errors_div">';
			echo '<div class="span6">'.$template['partials']['upload_errors_p'].'</div>';
			echo '</div>';
		}
		if(count($excluded_rows) > 0 )
		{
//			echo '<textarea>'.print_r($excluded_rows, true).'</textarea>';
			echo '<div class="row">';
			echo '<div class="span12">'.$template['partials']['excluded_products_p'].'</div>';
			echo '</div>';
		}
	?>

<!--	<div class="row-fluid" id="vendor_dropdown">
		<div class="span12">
			
-
			<div class="span4 well" id="choose_file_partial_container">


				<h3>choose_file_partial_container</h3>

				<? //= $template['partials']['choose_file_partial']; ?>
			</div>



			<div class="span4 well" id="upload_partial_container">
				<? // = $template['partials']['upload_form_partial']; ?>
				<a class="btn" href="catalog_imports/xml_upload" >upload a catalog</a>
			</div>


			
		</div>end span12 
	</div>end row -->


<?php 
	if(isset($html_table))
	{
?>		
	<div class="row-fluid" id="html_table_partial_container">
<!--
		<div class="span12 well">
-->
		<h3>The first 10 lines of the catalog: </h3>
		<span>If everything looks properly lined up, click 'Submit Catalog'</span> 
		<form action="catalog_imports/save_catalog/" method="post">
			<input type="hidden" name="filename" value="<?= $filename ?>" />
			<input type="submit" />
		</form>
	<?= $template['partials']['html_table_partial']; ?>
<!--
		</div>
-->
	</div>
<?php 
	}
?>


<!--
<div class="row-fluid" id="debugdiv">
	<div class="span12">
		<h1>debug: $this->data: </h1>
		<textarea>
			<?php //print_r($data, true); ?>
		</textarea>
	</div>
</div>
-->




	<?= $template['partials']['upload_form_partial']; ?>



</div> <!--end .container -->
