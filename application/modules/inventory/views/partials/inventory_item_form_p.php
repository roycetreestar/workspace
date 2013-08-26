<style>
/*
	input
	{
		width:80%;
	}
*/
</style>

<tr id="inventory_tr_<?=$item['id']?>">
	<form method="post" action="<?=base_url().'inventory/save_item/'?>">
		<input type="hidden" name="id" value="<?=$item['id']?>" />
<?php				
//~ die('inventory_item_display_p:<br/>$item:<textarea>'.print_r($item, true).'</textarea>');

			if(strtolower($show_fields['id']['show']) == 'y' ){ ?>
				<td id="id_<?=$item['id']?>" class="id">
				<!--	<input type="text" name="id" value="<?php //$item['id']?>" /> -->
				<?=$item['id']?>
				</td>
				
			<?php } 
			if(strtolower($show_fields['resource_id']['show']) == 'y' ){ ?>
				<td id="resource_id<?=$item['id']?>" class="resource_id">
				<!--	<input type="text" name="resource_id" value="<?php //$item['resource_id']?>" /> -->
				<?=$item['resource_id']?>
				</td>
				
			<?php } 
			if(strtolower($show_fields['catalog_number']['show']) == 'y' ){ ?>
				<td id="catalog_number_<?=$item['id']?>" class="catalognumber">
					<input type="text" name="catalog_number" value="<?=$item['catalog_number']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['item_name']['show']) == 'y' ){ ?>
				<td id="item_name_<?=$item['id']?>" class="item_name">
					<input type="text" name="item_name" value="<?=$item['item_name']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['vendor_name']['show']) == 'y' ){ ?>
				<td id="vendorname_<?=$item['id']?>" class="vendorname">
					<input type="text" name="vendor_name" value="<?=$item['vendor_name']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['lot_number']['show']) == 'y' ){ ?>
				<td id="lot_number_<?=$item['id']?>" class="lot_number">
					<input type="text" name="lot_number" value="<?=$item['lot_number']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['target']['show']) == 'y' ){ ?>
				<td id="target_<?=$item['id']?>" class="target">
					<input type="text" name="target" value="<?=$item['target']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['target_canonical']['show']) == 'y' ){ ?>
				<td id="target_canonical_<?=$item['id']?>" class="target">
					<input type="text" name="target_canonical" value="<?=$item['target_canonical']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['format']['show']) == 'y' ){ ?>
				<td id="format_<?=$item['id']?>" class="format">
					<input type="text" name="format" value="<?=$item['format']?>" />
				</td>	
				
			<?php } 
			if(strtolower($show_fields['format_canonical']['show']) == 'y' ){ ?>
				<td id="format_canonical_<?=$item['id']?>" class="format_canonical">
					<input type="text" name="format_canonical" value="<?=$item['format_canonical']?>" />
				</td>	
				
			<?php } 
			if(strtolower($show_fields['clone']['show']) == 'y' ){ ?>
				<td id="clone_<?=$item['id']?>" class="clone">
					<input type="text" name="clone" value="<?=$item['clone']?>" />
				</td>		
				
			<?php } 
			if(strtolower($show_fields['isotype']['show']) == 'y' ){ ?>
				<td id="isotype_<?=$item['id']?>" class="isotype">
					<input type="text" name="isotype" value="<?=$item['isotype']?>" />
				</td>		
				
			<?php } 
			if(strtolower($show_fields['unit_size']['show']) == 'y' ){ ?>
				<td id="unit_size_<?=$item['id']?>" class="unit_size">
					<input type="text" name="unit_size" value="<?=$item['unit_size']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['package_size']['show']) == 'y' ){ ?>
				<td id="package_size_<?=$item['id']?>" class="package_size">
					<input type="text" name="package_size" value="<?=$item['package_size']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['price']['show']) == 'y' ){ ?>
				<td id="price_<?=$item['id']?>" class="price">
					<input type="text" name="price" value="<?=$item['price']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['product_url']['show']) == 'y' ){ ?>
				<td id="product_url_<?=$item['id']?>" class="product_url">
					<input type="text" name="product_url" value="<?=$item['product_url']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['source_species']['show']) == 'y' ){ ?>
				<td id="source_species_<?=$item['id']?>" class="source_species">
					<input type="text" name="source_species" value="<?=$item['source_species']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['target_species']['show']) == 'y' ){ ?>
				<td id="target_species_<?=$item['id']?>" class="target_species">
					<input type="text" name="target_species" value="<?=$item['target_species']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['regulatory_status']['show']) == 'y' ){ ?>
				<td id="regulatory_status_<?=$item['id']?>" class="regulatory_status">
					<input type="text" name="regulatory_status" value="<?=$item['regulatory_status']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['application_id']['show']) == 'y' ){ ?>
				<td id="application_id_<?=$item['id']?>" class="application_id">
					<input type="text" name="application_id" value="<?=$item['application_id']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['category']['show']) == 'y' ){ ?>
				<td id="category_<?=$item['id']?>" class="reagent_category">
					<input type="text" name="category" value="<?=$item['category']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['date_created']['show']) == 'y' ){ ?>
				<td id="date_created_<?=$item['id']?>" class="date_created">
					<input type="text" name="date_created" value="<?=$item['date_created']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['date_updated']['show']) == 'y' ){ ?>
				<td id="date_updated_<?=$item['id']?>" class="date_updated">
					<input type="text" name="date_updated" value="<?=$item['date_updated']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['edit_modified']['show']) == 'y' ){ ?>
				<td id="edit_modified_<?=$item['id']?>" class="edit_modified">
					<input type="text" name="edit_modified" value="<?=$item['edit_modified']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['description']['show']) == 'y' ){ ?>
				<td id="description_<?=$item['id']?>" class="description">
					<input type="text" name="description" value="<?=$item['description']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['titration_amount']['show']) == 'y' ){ ?>
				<td id="titration_amount_<?=$item['id']?>" class="titration_amount">
					<input type="text" name="titration_amount" value="<?=$item['titration_amount']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['amount_per_test']['show']) == 'y' ){ ?>
				<td id="amount_per_test_<?=$item['id']?>" class="amount_per_test">
					<input type="text" name="amount_per_test" value="<?=$item['amount_per_test']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['remaining_tests']['show']) == 'y' ){ ?>
				<td id="remaining_tests_<?=$item['id']?>" class="remaining_tests">
					<input type="text" name="remaining_tests" value="<?=$item['remaining_tests']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['amount_on_hand']['show']) == 'y' ){ ?>
				<td id="amount_on_hand_<?=$item['id']?>" class="amount_on_hand">
					<input type="text" name="amount_on_hand" value="<?=$item['amount_on_hand']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['threshold']['show']) == 'y' ){ ?>
				<td id="threshold_<?=$item['id']?>" class="threshold">
					<input type="text" name="threshold" value="<?=$item['threshold']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['lot_number']['show']) == 'y' ){ ?>
				<td id="lot_number_<?=$item['id']?>" class="lot_number">
					<input type="text" name="lot_number" value="<?=$item['lot_number']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['expiration_date']['show']) == 'y' ){ ?>
				<td id="expiration_date_<?=$item['id']?>" class="expiration_date">
					<input type="text" name="expiration_date" value="<?=$item['expiration_date']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['location']['show']) == 'y' ){ ?>
				<td id="location_<?=$item['id']?>" class="location">
					<input type="text" name="location" value="<?=$item['location']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['user_id_add']['show']) == 'y' ){ ?>
				<td id="user_id_add_<?=$item['id']?>" class="user_id_add">
					<input type="text" name="user_id_add" value="<?=$item['user_id_add']?>" />
				</td>
				
			<?php } 
			if(strtolower($show_fields['user_id_mod']['show']) == 'y' ){ ?>
				<td id="user_id_mod_<?=$item['id']?>" class="user_id_mod">
					<input type="text" name="user_id_mod" value="<?=$item['user_id_mod']?>" />
				</td>
				
			<?php } ?>	



					
				<th class="edit" >
					<input type="submit" id="submit_<?=$item['id']?>" class="btn" value="Save" />
					<a class="btn" href="">Delete</a> 
				</th>
				<th class="cart"><a class="btn" href="" >Add to Cart</a></th>

	</form>
</tr>	








<!--<form>	
<tr>
	<td class="catalog_number_<?php //$item_id?>">		<input type="text" name="catalog_number" 		value="<?php //$catalog_number?>" />		</td>
	<td class="item_name_<?php //$item_id?>">			<input type="text" name="item_name" 			value="<?php //$item_name?>" />			</td>
	<td class="vendor_<?php //$item_id?>">				<input type="text" name="vendor" 				value="<?php //$vendor?>" />				</td>
	<td class="target_<?php //$item_id?>">				<input type="text" name="target" 				value="<?php //$target?>" />				</td>
	<td class="format_<?php //$item_id?>">				<input type="text" name="format" 				value="<?php //$format?>" />				</td>
	<td class="clone_<?php //$item_id?>">				<input type="text" name="clone" 				value="<?php //$clone?>" />				</td>
	<td class="isotype_<?php //$item_id?>">				<input type="text" name="isotype" 				value="<?php //$isotype?>" />			</td>
	<td class="unit_size_<?php //$item_id?>">			<input type="text" name="unit_size"				value="<?php //$unit_size?>" />			</td>
	<td class="package_size_<?php //$item_id?>">			<input type="text" name="package_size" 			value="<?php //$package_size?>" />		</td>
	<td class="price_<?php //$item_id?>">				<input type="text" name="price" 				value="<?php //$price?>" />				</td>
	<td class="product_url_<?php //$item_id?>">			<input type="text" name="product_url" 			value="<?php //$product_url?>" />		</td>
	<td class="source_species_<?php //$item_id?>">		<input type="text" name="source_species" 		value="<?php //$source_species?>" />		</td>
	<td class="target_species_<?php //$item_id?>">		<input type="text" name="target_species" 		value="<?php //$target_species?>" />		</td>
	<td class="regulatory_status_<?php //$item_id?>">	<input type="text" name="regulatory_status" 	value="<?php //$regulatory_status?>" />	</td>
	<td class="application_id_<?php //$item_id?>">		<input type="text" name="application_id" 		value="<?php //$application_id?>" />		</td>
	<td class="category_<?php //$item_id?>">				<input type="text" name="category" 				value="<?php //$category?>" />			</td>
	<td class="date_created_<?php //$item_id?>">			<input type="text" name="date_created" 			value="<?php //$date_created?>" />		</td>
	<td class="date_updated_<?php //$item_id?>">			<input type="text" name="date_updated" 			value="<?php //$date_updated?>" />		</td>
	<td class="edit_modified_<?php //$item_id?>">		<input type="text" name="edit_modified"			value="<?php //$edit_modified?>" />		</td>
	<td class="description_<?php //$item_id?>">			<input type="text" name="description" 			value="<?php //$description?>" />		</td>
	<td class="item_id">							<input type="text" name="item_id" 				value="<?php //$item_id?>" readonly />	</td>
</tr>
</form>
-->
