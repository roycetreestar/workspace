<div class=" well ui-widget" id="add_manually">
<!--	<div class="btn close_add_man">X</div>-->
<!--	<h3>Add a reagent manually</h3>-->
<h4>Instructions</h4>
	<div id='add_reagent_instructions_div'>
		<ol>
			<li>Fill in all applicable fields for this reagent and press the Add Reagent button.</li>
			<li>Fields for *Target (Specificity) and *Format (Fluorochrome) are required. All other fields are optional.</li>
			<li>You are required to select an autocomplete selection for the *Target (Specificity) and *Format (Fluorochrome) fields in order for Inventory Items to work properly in the Panel Design Tool. If an option you are looking for is not available or you would like us to add an alternate name for a target or fluorochrome,<a href="#">please let us know</a> and we can update the database immediately!</li>
			<li>The Target (Specificity) options for unconjugated fluorochromes (e.g. GFP, CFSE, 7AAD, PI) can relate to a specific application. If entering a target for an unconjugated fluorophore, please consider the following options (or leave it as Unconjugated): Fluorescent Protein, Calcium, DNA (Cell Cycle), Proliferation Dye, Mitochondria (Membrane Potential Apoptosis), Dead Cells (Viability), Membrane Lipids (Apoptosis), DNA (Apoptosis)</li>
			<li>if we need to add others <a href="#">please let us know</a></li>
		</ol>
	</div>





	<form id="addReagentManually" action="<?=base_url().'inventory/addReagent'?>" method="post" >
		<input type="hidden" name="resource_id" value="<?=$resource_id?>" />
		<table>
			
			<tr>
				<td><strong ><span class="required">*</span>Catalog Number:</strong></td>
				<td><input type="text" name="catalog_number" id="catalog_number" /></td>
			</tr><tr>
				<td><strong >Item Name:</strong></td>
				<td><input type="text" name="item_name" id="item_name" /></td>
			</tr><tr>
				<td><strong>Vendor:</strong></td>
				<td><input  class="company_name_input" id="vendor_name" type="text" name="vendor_name" data-provide="typeahead" data-items="4"  /></td>
			</tr><tr>
				<td>	<strong><span class="required">*</span>Target (Specificity):</strong></td>
				<td>	<input type="text" name="target" id='target'/></td>
			</tr><tr>
				<td>	<strong><span class="required">*</span>Format (Fluorochrome):</strong></td>
				<td><input type="text" name="format" class="chrome_name" id='chrome' /></td>
			</tr><tr>
				<td><strong> Clone:</strong></td>
				<td><input type="text" name="clone" class="clone_name" id='clone'/></td>
			</tr><tr>	
				<td><strong> Isotype:</strong></td>
				<td><input type="text" name="isotype" id='isotype'/></td>
			</tr><tr>
				<td><strong >Unit Size:</strong></td>
				<td><input type="text" name="unit_size" id="unit_size" />	</td>
			
			</tr><tr>
				<td><strong>Package Size (units per package):</strong></td>
				<td><input type="text" name="lot_num" id="lot_num" /></td>	
			</tr><tr>
				<td><strong>Price:</strong></td>
				<td><input type="text" name="price" id="price" /></td>	
			</tr><tr>
				<td><strong>Product URL:</strong></td>
				<td><input type="text" name="product_url" id="product_url" /></td>
			</tr><tr>
				<td><strong><span class="required">*</span>Target Species:</strong></td>
				<td><select id="target_species"  name="target_species">
					<option>target_species here</option>
				</select></td>
			</tr><tr>
				<td><strong  >Source Species:</strong></td>
				<td><select id="source_species"  name="source_species">
					<option>source_species here</option>
				</select></td>	
			</tr><tr>
				<td><strong> Regulatory Status:</strong></td>
				<td><select id="regulatory_status"  name="regulatory_status">
					<option>reg_status here</option>
				</select></td>
			</tr><tr>
				<td><strong> Applications:</strong></td>
				<td><select id="applications"  name="applications">
					<option>applications here</option>
				</select></td>
			</tr><tr>
				<td><strong> Category:</strong></td>
				<td><select id="category"  name="category">
					<option>applications here</option>
				</select></td>				
			</tr><tr>
				<td><strong> Description:</strong></td>
				<td><textarea name="description" id="description" ></textarea></td>	
			</tr><tr>
				<td><strong> Titration Amount:</strong></td>
				<td><input type="text" name="titration_amount" id="titration_amount" /></td>	
			</tr><tr>
				<td><strong> Amount Per Test:</strong></td>
				<td><input type="text" name="amount_per_test" id="amount_per_test" /></td>
			</tr><tr>
				<td><strong> Amount Per Test Units (ul, ml, etc):</strong></td>
				<td><input type="text" name="amount_per_test_units" id="amount_per_test_units" /></td>
			</tr><tr>
				<td><strong> Amount On Hand:</strong></td>
				<td><input type="text" name="amount_on_hand" id="amount_on_hand" /></td>	
			</tr><tr>
			</tr><tr>
				<td><strong> Reorder Threshold:</strong></td>
				<td><input type="text" name="threshold" id="threshold" /></td>	
			</tr><tr>
				<td><strong> Lot Number:</strong></td>
				<td><input type="text" name="lot_number" id="lot_number" /></td>	
			</tr><tr>
				<td><strong> Expiration Date:</strong></td>
				<td><input type="text" name="expiration_date" id="expiration_date" /></td>	
			</tr><tr>
				<td><strong> Location:</strong></td>
				<td><input type="text" name="location" id="location" /></td>	

			</tr>
			<tr>
				<td><input class="btn" type="submit" value="Save" />	</td>
			</tr>
<!--			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cancel</button>-->
		</table>
	</form>
</div>
