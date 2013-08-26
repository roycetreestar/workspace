<tr>
<?php				
//~ die('inventory_item_display_p:<br/>$item:<textarea>'.print_r($show_fields, true).'</textarea>');
			if(strtolower($show_fields['id']['show']) == 'y' ) {?>
				<td id="id_<?=$item['id']?>" class="id"><?=$item['id']?></td>
				
			<?php } if(strtolower($show_fields['resource_id']['show']) == 'y' ) { ?>
				<td id="resource_id<?=$item['id']?>" class="resource_id"><?=$item['resource_id']?></td>
				
			<?php } if(strtolower($show_fields['catalog_number']['show']) == 'y' ) { ?>
				<td id="catalog_number_<?=$item['id']?>" class="catalognumber"><?=$item['catalog_number']?></td>
				
			<?php } if(strtolower($show_fields['item_name']['show']) == 'y' ) { ?>
				<td id="item_name_<?=$item['id']?>" class="item_name"><?=$item['item_name']?></td>
				
			<?php } if(strtolower($show_fields['vendor_name']['show']) == 'y' ) { ?>
				<td id="vendorname_<?=$item['id']?>" class="vendorname"><?=$item['vendor_name']?></td>
				
			<?php } if(strtolower($show_fields['lot_number']['show']) == 'y' ) { ?>
				<td id="lot_number_<?=$item['id']?>" class="lot_number"><?=$item['lot_number']?></td>
				
			<?php } if(strtolower($show_fields['target']['show']) == 'y' ) { ?>
				<td id="target_<?=$item['id']?>" class="target"><?=$item['target']?></td>
				
			<?php } if(strtolower($show_fields['target_canonical']['show']) == 'y' ) { ?>
				<td id="target_canonical_<?=$item['id']?>" class="target"><?=$item['target_canonical']?></td>
				
			<?php } if(strtolower($show_fields['format']['show']) == 'y' ) { ?>
				<td id="format_<?=$item['id']?>" class="format"><?=$item['format']?></td>	
				
			<?php } if(strtolower($show_fields['format_canonical']['show']) == 'y' ) { ?>
				<td id="format_canonical_<?=$item['id']?>" class="format_canonical"><?=$item['format_canonical']?></td>	
				
			<?php } if(strtolower($show_fields['clone']['show']) == 'y' ) { ?>
				<td id="clone_<?=$item['id']?>" class="clone"><?=$item['clone']?></td>		
				
			<?php } if(strtolower($show_fields['isotype']['show']) == 'y' ) { ?>
				<td id="isotype_<?=$item['id']?>" class="isotype"><?=$item['isotype']?></td>		
				
			<?php } if(strtolower($show_fields['unit_size']['show']) == 'y' ) { ?>
				<td id="unit_size_<?=$item['id']?>" class="unit_size"><?=$item['unit_size']?></td>
				
			<?php } if(strtolower($show_fields['package_size']['show']) == 'y' ) { ?>
				<td id="package_size_<?=$item['id']?>" class="package_size"><?=$item['package_size']?></td>
				
			<?php } if(strtolower($show_fields['price']['show']) == 'y' ) { ?>
				<td id="price_<?=$item['id']?>" class="price"><?=$item['price']?></td>
				
			<?php } if(strtolower($show_fields['product_url']['show']) == 'y' ) { ?>
				<td id="product_url_<?=$item['id']?>" class="product_url"><?=$item['product_url']?></td>
				
			<?php } if(strtolower($show_fields['source_species']['show']) == 'y' ) { ?>
				<td id="source_species_<?=$item['id']?>" class="source_species"><?=$item['source_species']?></td>
				
			<?php } if(strtolower($show_fields['target_species']['show']) == 'y' ) { ?>
				<td id="target_species_<?=$item['id']?>" class="target_species"><?=$item['target_species']?></td>
				
			<?php } if(strtolower($show_fields['regulatory_status']['show']) == 'y' ) { ?>
				<td id="regulatory_status_<?=$item['id']?>" class="regulatory_status"><?=$item['regulatory_status']?></td>
				
			<?php } if(strtolower($show_fields['application_id']['show']) == 'y' ) { ?>
				<td id="application_id_<?=$item['id']?>" class="application_id"><?=$item['application_id']?></td>
				
			<?php } if(strtolower($show_fields['category']['show']) == 'y' ) { ?>
				<td id="category_<?=$item['id']?>" class="reagent_category"><?=$item['category']?></td>
				
			<?php } if(strtolower($show_fields['date_created']['show']) == 'y' ) { ?>
				<td id="date_created_<?=$item['id']?>" class="date_created"><?=$item['date_created']?></td>
				
			<?php } if(strtolower($show_fields['date_updated']['show']) == 'y' ) { ?>
				<td id="date_updated_<?=$item['id']?>" class="date_updated"><?=$item['date_updated']?></td>
				
			<?php } if(strtolower($show_fields['edit_modified']['show']) == 'y' ) { ?>
				<td id="edit_modified_<?=$item['id']?>" class="edit_modified"><?=$item['edit_modified']?></td>
				
			<?php } if(strtolower($show_fields['description']['show']) == 'y' ) { ?>
				<td id="description_<?=$item['id']?>" class="description"><?=$item['description']?></td>
				
			<?php } if(strtolower($show_fields['titration_amount']['show']) == 'y' ) { ?>
				<td id="titration_amount_<?=$item['id']?>" class="titration_amount"><?=$item['titration_amount']?></td>
				
			<?php } if(strtolower($show_fields['amount_per_test']['show']) == 'y' ) { ?>
				<td id="amount_per_test_<?=$item['id']?>" class="amount_per_test"><?=$item['amount_per_test']?></td>
				
			<?php } if(strtolower($show_fields['amount_per_test_units']['show']) == 'y' ) { ?>
				<td id="amount_per_test_units_<?=$item['id']?>" class="amount_per_test_units"><?=$item['amount_per_test_units']?></td>
				
			<?php } if(strtolower($show_fields['remaining_tests']['show']) == 'y' ) { ?>
				<td id="remaining_tests_<?=$item['id']?>" class="remaining_tests"><?=$item['remaining_tests']?></td>
				
			<?php } if(strtolower($show_fields['amount_on_hand']['show']) == 'y' ) { ?>
				<td id="amount_on_hand_<?=$item['id']?>" class="amount_on_hand"><?=$item['amount_on_hand']?></td>
				
				
			<?php } if(strtolower($show_fields['threshold']['show']) == 'y' ) { ?>
				<td id="threshold_<?=$item['id']?>" class="threshold"><?=$item['threshold']?></td>
				
			<?php } if(strtolower($show_fields['lot_number']['show']) == 'y' ) { ?>
				<td id="lot_number_<?=$item['id']?>" class="lot_number"><?=$item['lot_number']?></td>
				
			<?php } if(strtolower($show_fields['expiration_date']['show']) == 'y' ) { ?>
				<td id="expiration_date_<?=$item['id']?>" class="expiration_date"><?=$item['expiration_date']?></td>
				
			<?php } if(strtolower($show_fields['location']['show']) == 'y' ) { ?>
				<td id="location_<?=$item['id']?>" class="location"><?=$item['location']?></td>
				
			<?php } if(strtolower($show_fields['user_id_add']['show']) == 'y' ) { ?>
				<td id="user_id_add_<?=$item['id']?>" class="user_id_add"><?=$item['user_id_add']?></td>
				
			<?php } if(strtolower($show_fields['user_id_mod']['show']) == 'y' ) { ?>
				<td id="user_id_mod_<?=$item['id']?>" class="user_id_mod"><?=$item['user_id_mod']?></td>
				
			<?php } ?>	
				



			<!--		
				<th class="edit" ><a id="edit_btn_<?php //$item['id']?>" class="btn" >Edit</a><a class="btn" href="">Delete</a> </th>
				<th class="cart"><a class="btn" href="" >Add to Cart</a></th>
			-->

</tr>	










<!--
<table>
<tr>
	<td id="catalog_number_<?php //$item_id?>">		<?php //$catalog_number?>	</td>
	<td id="item_name_<?php //$item_id?>">			<?php //$item_name?>			</td>
	<td id="vendor_<?php //$item_id?>">				<?php //$vendor?>			</td>
	<td id="target_<?php //$item_id?>">				<?php //$target?>			</td>
	<td id="format_<?php //$item_id?>">				<?php //$format?>			</td>
	<td id="clone_<?php //$item_id?>">				<?php //$clone?>				</td>
	<td id="isotype_<?php //$item_id?>">				<?php //$isotype?>			</td>
	<td id="unit_size_<?php //$item_id?>">			<?php //$unit_size?>			</td>
	<td id="package_size_<?php //$item_id?>">		<?php //$package_size?>		</td>
	<td id="price_<?php //$item_id?>">				<?php //$price?>				</td>
	<td id="product_url_<?php //$item_id?>">			<?php //$product_url?>		</td>
	<td id="source_species_<?php //$item_id?>">		<?php //$source_species?>	</td>
	<td id="target_species_<?php //$item_id?>">		<?php //$target_species?>	</td>
	<td id="regulatory_status_<?php //$item_id?>">	<?php //$regulatory_status?>	</td>
	<td id="application_id_<?php //$item_id?>">		<?php //$application_id?>	</td>
	<td id="category_<?php //$item_id?>">			<?php //$category?>			</td>
	<td id="date_created_<?php //$item_id?>">		<?php //$date_created?>		</td>
	<td id="date_updated_<?php //$item_id?>">		<?php //$date_updated?>		</td>
	<td id="edit_modified_<?php //$item_id?>">		<?php //$edit_modified?>		</td>
	<td id="description_<?php //$item_id?>">			<?php //$description?>		</td>
</tr>
</table>
-->
