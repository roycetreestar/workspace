<?php
////////////////////////////////////////////////////////////////////////
//////////////	SET UP THE <TABLE>'S COLUMN HEADERS	////////////////////
////////////////////////////////////////////////////////////////////////
//		Sets the container div, the scripts, the css file,			  // 
//		the <table> tag, and the <th> row. 	Checks $show_fields		  //
//		to only load columns in the user's prefs set. 				  //
//		Then it loops through all items in $inv, displaying each	  //
//		as a <tr> or as a <form> in a <tr> depending on 			  //
//		the value of $widget_type 									  //
////////////////////////////////////////////////////////////////////////
?>
<div class=" well" id="inventory_table_div_<?= $resource_id ?>">
<!-- <h2>inventory/views/partials/inventory_table_p.php</h2> -->
<h2>
	<?= $group_name ?>
</h2>
	<?php
		if($permission == 1)
			echo '(You\'re a manager of this group)';
		else if ($permission == 0)
			echo '(You\'re a member of this group)';
	?> 

<script type="text/javascript" src="<?= base_url().'assets/js/inventory.js'?>" ></script>
<link rel="stylesheet" type="text/css" href="<?= base_url().'assets/css/inventory.css'?>" />

	<table class="table table-hover table-condensed table-bordered" id="inventory_table_<?= $resource_id ?>">
		<tr>

		 <?php if(strtolower($show_fields['id']['show']) == 'y' ) { ?>
			<th class="id"> item_id </th>
			
		<?php } if(strtolower($show_fields['resource_id']['show']) == 'y' ) { ?>
			<th class="resource_id"> resource_id </th>
			
		<?php } if(strtolower($show_fields['catalog_number']['show']) == 'y' ) { ?>
			<th class="catalog_number"> Catalog Number </th>
		
		<?php } if(strtolower($show_fields['item_name']['show']) == 'y' ) { ?>
			<th class="item_name"> item_name </th>
		
		<?php } if(strtolower($show_fields['vendor_name']['show']) == 'y' ) { ?>
			<th class="vendor_name"> Vendor </th>
			
		<?php } if(strtolower($show_fields['lot_number']['show']) == 'y' ) { ?>
			<th class="lot_number"> Lot Number </th>
		
		<?php } if(strtolower($show_fields['target']['show']) == 'y' ) { ?>
			<th class="target"> Target </th>
			
		<?php } if(strtolower($show_fields['target_canonical']['show']) == 'y' ) { ?>
			<th class="target_canonical"> Target (canonical name) </th>
		
		<?php } if(strtolower($show_fields['format']['show']) == 'y' ) { ?>
			<th class="format"> format </th>

		<?php } if(strtolower($show_fields['format_canonical']['show']) == 'y' ) { ?>
			<th class="format_canonocal"> Format (canonical name) </th>
		
		<?php } if(strtolower($show_fields['clone']['show']) == 'y' ) { ?>
			<th class="clone"> clone </th>			
		
		<?php } if(strtolower($show_fields['isotype']['show']) == 'y' ) { ?>
			<th class="isotype"> isotype </th>			
		
		<?php } if(strtolower($show_fields['unit_size']['show']) == 'y' ) { ?>
			<th class="unit_size"> unit_size </th>			
		
		<?php } if(strtolower($show_fields['package_size']['show']) == 'y' ) { ?>
			<th class="package_size"> package_size </th>			
		
		<?php } if(strtolower($show_fields['price']['show']) == 'y' ) { ?>
			<th class="price"> price </th>			
		
		<?php } if(strtolower($show_fields['product_url']['show']) == 'y' ) { ?>
			<th class="product_url"> product_url </th>			
		
		<?php } if(strtolower($show_fields['source_species']['show']) == 'y' ) { ?>
			<th class="source_species"> source_species </th>			
		
		<?php } if(strtolower($show_fields['target_species']['show']) == 'y' ) { ?>
			<th class="target_species"> target_species </th>			
		
		<?php } if(strtolower($show_fields['regulatory_status']['show']) == 'y' ) { ?>
			<th class="regulatory_status"> regulatory_status </th>			
		
		<?php } if(strtolower($show_fields['application_id']['show']) == 'y' ) { ?>
			<th class="application_id"> application_id </th>			
		
		<?php } if(strtolower($show_fields['category']['show']) == 'y' ) { ?>
			<th class="category"> category </th>			
		
		<?php } if(strtolower($show_fields['date_created']['show']) == 'y' ) { ?>
			<th class="date_created"> date_created </th>			
		
		<?php } if(strtolower($show_fields['date_updated']['show']) == 'y' ) { ?>
			<th class="date_updated"> date_updated </th>			
		
		<?php } if(strtolower($show_fields['edit_modified']['show']) == 'y' ) { ?>
			<th class="edit_modified"> edit_modified </th>			
		
		<?php } if(strtolower($show_fields['description']['show']) == 'y' ) { ?>
			<th class="description"> description </th>			
		
		<?php } if(strtolower($show_fields['titration_amount']['show']) == 'y' ) { ?>
			<th class="titration_amount"> titration_amount </th>			
		
		<?php } if(strtolower($show_fields['amount_per_test']['show']) == 'y' ) { ?>
			<th class="amount_per_test"> amount_per_test </th>			
		
		<?php } if(strtolower($show_fields['amount_per_test_units']['show']) == 'y' ) { ?>
			<th class="amount_per_test_units"> amount_per_test_units </th>			
		
		<?php } if(strtolower($show_fields['remaining_tests']['show']) == 'y' ) { ?>
			<th class="remaining_tests"> remaining_tests </th>			
		
		<?php } if(strtolower($show_fields['amount_on_hand']['show']) == 'y' ) { ?>
			<th class="amount_on_hand"> amount_on_hand </th>	
		
		<?php } if(strtolower($show_fields['threshold']['show']) == 'y' ) { ?>
			<th class="threshold"> threshold </th>			
		
		<?php } if(strtolower($show_fields['lot_number']['show']) == 'y' ) { ?>
			<th class="lot_number"> lot_number </th>			
		
		<?php } if(strtolower($show_fields['expiration_date']['show']) == 'y' ) { ?>
			<th class="expiration_date"> expiration_date </th>			
		
		<?php } if(strtolower($show_fields['location']['show']) == 'y' ) { ?>
			<th class="location"> location </th>			
		
		<?php } if(strtolower($show_fields['user_id_add']['show']) == 'y' ) { ?>
			<th class="user_id_add"> user_id_add </th>			
		
		<?php } if(strtolower($show_fields['user_id_mod']['show']) == 'y' ) { ?>
			<th class="user_id_mod"> user_id_mod </th>
			
		<?php } ?>
		
		<!--			
			<th class="edit" >Edit / Delete</th>
			<th>Add to Cart</th>
		-->				
	</tr>
	
	
	
	
	
<?php
////////////////////////////////////////////////////////////////////////
//////////////////	NOW LOOP THROUGH EACH ROW	////////////////////////
////////////////////////////////////////////////////////////////////////
if($widget_type == 'form')
{
	$this_item['show_fields'] = $show_fields;
		foreach($inv as $item)
		{
//~ die('$item:'.print_r($item));
		$this_item['item'] = $item;
			$table_row = $this->load->view('partials/inventory_item_form_p', $this_item, true);			
			
			echo $table_row;					
		}
}
else
{
	$this_item['show_fields'] = $show_fields;
		foreach($inv as $item)
		{
//~ die('$item:'.print_r($item));
		$this_item['item'] = $item;
			$table_row = $this->load->view('partials/inventory_item_display_p', $this_item, true);			
			
			echo $table_row;					
		}
		
}		
		?>
	</table>
</div>
