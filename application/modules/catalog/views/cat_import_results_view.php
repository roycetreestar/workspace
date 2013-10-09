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
//			echo '<div class="row-fluid">';
//			echo '<div class="span12">'.$unknown_fields_p.'</div>';
//			echo '</div>';
//		}
	
		if(isset($insert_success_p))
		{
			echo '<div class="row-fluid errors_div">';
			echo $insert_success_p;
			echo '</div>';
		}
		if(count($errors['parse_errors']) > 0 )
		{
			echo '<div class="row-fluid errors_div">';
			echo $parse_errors_p;
			echo '</div>';
		}
	
		if(count($errors['missing_fields']) > 0 )
		{
			echo '<div class="row-fluid errors_div" style="background-color:gray; margin-top:20px; margin-bottom:20px;">';
			echo '<div class="span3">'. $missing_fields_p .'</div>';
			echo '<div class="span6">'. $unknown_fields_p .'</div>';
			echo '<div class="span3" id="cat_head_alt_container">'.$new_cat_head_alternates_form_p.'</div>';
			echo '</div>';
		}
		if(count($errors['bad_application']) > 0)
		{
			echo '<div class="row-fluid errors_div" style="background-color:gray; margin-top:20px; margin-bottom:20px;">';
			echo '<div class="span7">'. $unknown_applications_p .'</div>';
			echo '<div class="span3" id="application_form_container">'.$new_applications_form_p.'</div>';
			echo '<div class="span3" id="application_alt_form_container">'.$new_application_alternates_form_p.'</div>';
			echo '<div class="well span3" id="find_application_alts_container" >'.$thesaurus_application_alternates_p.'</div>';
			
			
			echo '</div>';
		}
		if(count($errors['bad_category']) > 0)
		{
			echo '<div class="row-fluid errors_div" style="background-color:gray; margin-top:20px; margin-bottom:20px;">';
			echo '<div class="span7">'. $unknown_category_p .'</div>';
			echo '<div class="span3" id="category_form_container">'.$new_category_form_p.'</div>';
			echo '<div class="span3" id="category_alt_form_container">'.$new_category_alternates_form_p.'</div>';
			echo '<div class="well span3" id="find_category_alts_container" >'.$thesaurus_category_alternates_p.'</div>';
			
			
			echo '</div>';
		}
		if(count($errors['missing_chromes']) > 0 )
		{
			echo '<div class="row-fluid errors_div" style="background-color:gray; margin-top:20px; margin-bottom:20px;">';
			echo '<div class="span7">'.$missing_chromes_p.'</div>';
			echo '<div class="span4">'.$new_chromes_form_p.'</div>';
			echo '<div class="span4" id="chrome_alt_container">'.$new_chrome_alternates_form_p.'</div>';
			echo '<div class="well span3" id="find_chrome_alts_container" >'.$thesaurus_chrome_alternates_p.'</div>';
			echo '</div>';
		}	
		if(count($errors['missing_species']) > 0 )
		{
			echo '<div class="row-fluid errors_div" style="background-color:gray; margin-top:20px; margin-bottom:20px;">';
			echo '<div class="span7">'.$missing_species_p.'</div>';
			echo '<div class="span4">'.$new_species_form_p.'</div>';
			echo '<div id="species_alt_container" class="span4">'.$new_species_alternates_form_p.'</div>';
			echo '<div class="well span4" id="find_species_alts_container" >'.$thesaurus_species_alternates_p.'</div>';
			echo '</div>';
		}
		if(count($errors['missing_targets']) > 0 )
		{
			echo '<div class="row-fluid errors_div" style="background-color:gray; margin-top:20px; margin-bottom:20px;">';
			echo '<div class="span7">'.$missing_targets_p.'</div>';
			echo '<div class="span4">'.$new_targets_form_p.'</div>';
			echo '<div id="target_alt_container" class="span4">'.$new_targets_alternates_form_p.'</div>';
			echo '<div class="well span4" id="find_target_alts_container" >'.$thesaurus_target_alternates_p.'</div>';
			echo '</div>';
		}
		if(count($errors['upload_errors']) > 0 )
		{
			echo '<div class="row-fluid errors_div" style="background-color:gray; margin-top:20px; margin-bottom:20px;">';
			echo '<div class="span6">'.$upload_errors_p.'</div>';
			echo '</div>';
		}
		if(count($excluded_rows) > 0 )
		{
//			echo '<textarea>'.print_r($excluded_rows, true).'</textarea>';
			echo '<div class="row-fluid">';
			echo '<div class="span12">'.$excluded_products_p.'</div>';
			echo '</div>';
		}
	?>

<!--	<div class="row-fluid" id="vendor_dropdown">
		<div class="span12">
			
-
			<div class="span4 well" id="choose_file_partial_container">


				<h3>choose_file_partial_container</h3>

				<? //= $choose_file_partial; ?>
			</div>



			<div class="span4 well" id="upload_partial_container">
				<? // = $upload_form_partial; ?>
				<a class="btn" href="catalog_imports/xml_upload" >upload a catalog</a>
			</div>


			
		</div>end span12 
	</div>end row-fluid -->


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
	<?= $html_table_partial; ?>
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




	<?//= $upload_form_partial; ?>



</div> <!--end .container -->
