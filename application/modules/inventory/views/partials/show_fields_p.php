<script>
/* CHECK ALL AND UNCHECK ALL BUTTONS */

	$(document).on('click', '#checkall', function(ev)
	{
		$('.show_fields_check').prop('checked', true);
	});
	$(document).on('click', '#uncheckall', function(ev)		
	{
		$('.show_fields_check').prop('checked', false);
	});

</script>

<div class='well' id="change_show_fields">
	<!--<div class="btn close_edit_columns">X</div>-->
	<!--<h3> Turn inventory columns on and off here </h3>-->
	<form action="inventory/update_show_fields/" method="post">

		<a class="btn" id="checkall" >Check All</a>
		<a class="btn" id="uncheckall" > Uncheck All </a>
		<br/>
		
<!-- ID	-->		
		 <input class="show_fields_check" type="checkbox" name="id" 
			<?php if(strtolower($show_fields['id']['show']) == 'y')
					echo 'checked';
			?>/>
		 <strong> ID (item, not inventory id) 	</strong>
		 <br/>
		
<!-- RESOURCE_ID	-->		
		 <input class="show_fields_check" type="checkbox" name="resource_id" 
			<?php if(strtolower($show_fields['resource_id']['show']) == 'y')
					echo 'checked';
			?>/>
		 <strong> Resource ID (inventory, not item id)	</strong>
		 <br/>
		
<!-- CATALOG_NUMBER		-->	
		<!--<label for="catalognumber"> catalognumber </label>-->
		<input class="show_fields_check" type="checkbox" name="catalog_number" 
		<?php if(strtolower($show_fields['catalog_number']['show']) == 'y')
				echo 'checked';
		?> />
		<strong> Catalog Number </strong>
		<br/>
		
<!-- ITEM_NAME		-->	
		<!--<label for="catalognumber"> catalognumber </label>-->
		<input class="show_fields_check" type="checkbox" name="item_name" 
		<?php if(strtolower($show_fields['item_name']['show']) == 'y')
				echo 'checked';
		?> />
		<strong> Item Name </strong>
		<br/>
		
<!-- VENDOR NAME		-->	
		<!--<label for="vendor"> vendor </label>-->
		<input class="show_fields_check" type="checkbox" name="vendor_name" 
		<?php if(strtolower($show_fields['vendor_name']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Vendor Name</strong>
		<br/>
		
<!--	TARGET	-->		
		 <input class="show_fields_check" type="checkbox" name="target" 
			<?php if(strtolower($show_fields['target']['show']) == 'y')
					echo 'checked';
			?>/>
		 <strong> Target (custom name)	</strong>
		 <br/>
		
<!--	TARGET_CANONICAL	-->		
		 <input class="show_fields_check" type="checkbox" name="target_canonical" 
			<?php if(strtolower($show_fields['target_canonical']['show']) == 'y')
					echo 'checked';
			?>/>
		 <strong> Target (canonical name) 	</strong>
		 <br/>
		 
<!--	FORMAT / FLUOROCHROME	-->	
		<!--<label for="format"> format </label>-->
		<input class="show_fields_check" type="checkbox" name="format" 
			<?php if(strtolower($show_fields['format']['show']) == 'y')
					echo 'checked';
			?> />
		<strong> Fluorochrome </strong>
		<br/>
		
<!--	FORMAT / FLUOROCHORME CANONICAL	-->	
		<!--<label for="format"> format </label>-->
		<input class="show_fields_check" type="checkbox" name="format_canonical" 
			<?php if(strtolower($show_fields['format_canonical']['show']) == 'y')
					echo 'checked';
			?> />
		<strong> Format (canonical name) </strong>
		<br/>
		
<!-- CLONE	-->	
		<!--<label for="clone"> clone </label>-->
		<input class="show_fields_check" type="checkbox" name="clone" 
			<?php if(strtolower($show_fields['clone']['show']) == 'y')
					echo 'checked';
			?>/>
		<strong>Clone</strong>
		<br/>
		
<!-- ISOTYPE		-->	
		<!--<label for="isotype"> isotype </label>-->
		<input class="show_fields_check" type="checkbox" name="isotype" 
		<?php if(strtolower($show_fields['isotype']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Isotype </strong>
		<br/>
		
<!-- UNIT_SIZE		-->		
		<!--<label for="package_size"> package_size </label>-->
		<input class="show_fields_check"  type="checkbox" name="unit_size" 
		<?php if(strtolower($show_fields['unit_size']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Unit Size </strong>
		<br/>
		
<!-- PACKAGE_SIZE		-->		
		<!--<label for="package_size"> package_size </label>-->
		<input class="show_fields_check"  type="checkbox" name="package_size" 
		<?php if(strtolower($show_fields['package_size']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Package Size </strong>
		<br/>
	
<!-- PRICE		-->		
		<input class="show_fields_check"  type="checkbox" name="price" 
		<?php if(strtolower($show_fields['price']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Price </strong>
		<br/>
	
<!-- PRODUCT_URL		-->		
		<input class="show_fields_check"  type="checkbox" name="product_url" 
		<?php if(strtolower($show_fields['product_url']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Product URL </strong>
		<br/>
	
<!-- SOURCE_SPECIES		-->	
		<!--<label for="source_species"> source_species </label>-->
		<input class="show_fields_check"  type="checkbox" name="source_species" 
		<?php if(strtolower($show_fields['source_species']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Source Species </strong>
		<br/>
		
<!-- TARGET SPECIES		-->	
		<input class="show_fields_check" type="checkbox" name="target_species" 
		<?php if(strtolower($show_fields['target_species']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Target Species </strong>
		<br/>
	
<!-- REGULATORY_STATUS		-->	
		<!--<label for="regulatory_status"> regulatory_status </label>-->
		<input class="show_fields_check" type="checkbox" name="regulatory_status" 
		<?php  if(strtolower($show_fields['regulatory_status']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Regulatory Status </strong>
		<br/>

<!-- APPLICATION_ID		-->	
		<!--<label for="regulatory_status"> regulatory_status </label>-->
		<input class="show_fields_check" type="checkbox" name="application_id" 
		<?php  if(strtolower($show_fields['application_id']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Application ID </strong>
		<br/>

<!-- CATEGORY		-->	
		<input class="show_fields_check" type="checkbox" name="category" 
		<?php if(strtolower($show_fields['category']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Reagent Category </strong>
		<br/>

<!-- DATE_CREATED		-->	
		<input class="show_fields_check" type="checkbox" name="date_created" 
		<?php if(strtolower($show_fields['date_created']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Date Created </strong>
		<br/>
		
<!-- DATE_UPDATED	-->	
		<input class="show_fields_check" type="checkbox" name="date_updated"
		<?php if(strtolower($show_fields['date_updated']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Date Updated </strong>
		<br/>
		
<!-- EDIT_MODIFIED		-->	
		<input class="show_fields_check" type="checkbox" name="edit_modified" 
		<?php if(strtolower($show_fields['edit_modified']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Edit Modified </strong>
		<br/>
	
<!-- DESCRIPTION	-->	
		<input class="show_fields_check" type="checkbox" name="description" 
		<?php if(strtolower($show_fields['description']['show']) == 'y')
				echo 'checked';
		?> />	
		<strong> Description </strong>
		<br/>
	
<!-- TITRATION_AMOUNT	-->	
		<input class="show_fields_check" type="checkbox" name="titration_amount" 
		<?php if(strtolower($show_fields['titration_amount']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Titration Amount </strong>
		<br/>
		
<!-- AMOUNT_PER_TEST	-->	
		<input class="show_fields_check" type="checkbox" name="amount_per_test" 
		<?php if(strtolower($show_fields['amount_per_test']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Amount Per Test </strong>
		<br/>
		
<!-- AMOUNT_PER_TEST_UNITS	-->	
		<input class="show_fields_check" type="checkbox" name="amount_per_test_units" 
		<?php if(strtolower($show_fields['amount_per_test_units']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Amount Per Test Units</strong>
		<br/>
		
<!-- REMAINING_TESTS	-->	
		<input class="show_fields_check" type="checkbox" name="remaining_tests" 
		<?php if(strtolower($show_fields['remaining_tests']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Remaining Tests</strong>
		<br/>
		
		
<!-- AMOUNT_ON_HAND	-->	
		<input class="show_fields_check" type="checkbox" name="amount_on_hand" 
		<?php if(strtolower($show_fields['amount_on_hand']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Amount On Hand</strong>
		<br/>
		
<!-- Threshold	-->	
		<input class="show_fields_check" type="checkbox" name="threshold" 
		<?php if(strtolower($show_fields['threshold']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Threshold</strong>
		<br/>
		
<!-- LOT_NUMBER		-->	
		<!--<label for="lot_number"> lot_number </label>-->
		<input class="show_fields_check" type="checkbox" name="lot_number" 
		<?php if(strtolower($show_fields['lot_number']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Lot Number </strong>
		<br/>

<!-- EXPIRATION_DATE	-->	
		<input class="show_fields_check" type="checkbox" name="expiration_date" 
		<?php if(strtolower($show_fields['expiration_date']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Expiration Date</strong>
		<br/>
		
<!-- LOCATION	-->	
		<input class="show_fields_check" type="checkbox" name="location" 
		<?php if(strtolower($show_fields['location']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> Location</strong>
		<br/>
		
<!-- USER_ID_ADD	-->	
		<input class="show_fields_check" type="checkbox" name="user_id_add" 
		<?php if(strtolower($show_fields['user_id_add']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> User ID who added this item</strong>
		<br/>
		
<!-- USER_ID_MOD	-->	
		<input class="show_fields_check" type="checkbox" name="user_id_mod" 
		<?php if(strtolower($show_fields['user_id_mod']['show']) == 'y')
				echo 'checked';
		?>/>
		<strong> User ID who last modified this item</strong>
		<br/>
		
		

		
		


		
		


<!--
		<label for="location"> location </label>
		<input type="checkbox" name="location" 
		<?php //if($show_fields['location']['show'] == 'y')
			//	echo 'checked';
		?>/>
-->







	<input type="submit" value="update my chosen fields" />

	</form>
	
</div>
