<div class="span12 well" id="add_by_cat_num">
	<div class="btn close_add_cat">X</div>
	<h3>Add a reagent by its catalog number</h3>
<!-- ----------------------------- -->	
<h4 style="color:red; background-color:yellow;" >NOTE: This form won't work properly until we have the catalog working in george</h4>
<!-- ----------------------------- -->	
	<ol>
		<li>Please enter the reagent information in the fields provided below and then click the Add Reagent button.</li>
		<li>*Company (Supplier) and *Catalog Number are required. All other fields are optional.</li>
		<li>If we are missing a catalog number for a product from one of our partners, please let us know so we can update the database!</li>
	</ol>

	<form id="addReagentByCatNum" action='inventory/addReagent' method="post">
		
<?php // TODO: make this <select> dropdown dynamically populated from the database instead of hard coded // ?>
		<label for="vendor_name_dropdown"><span class="required">*</span>Company (Supplier):</label>
		<select id="vendor_name_dropdown" >
			<option value="vendor1_id" >vendor1</option>
			<option value="vendor2_id" >vendor2</option>
			<option value="vendor3_id" >vendor3</option>
			<option value="vendor4_id" >vendor4</option>
			<option value="vendor5_id" >vendor5</option>
		</select>
		
		
		<label for="cat_num" ><span class="required">*</span>Catalog Number:</label>
		<input type="text" name="cat_num" id="cat_num" />
		
		<li class="btn contactUs"  >Are we missing something?</li>
		
		<label for="lot_num" >Lot Number:</label>
		<input type="text" name="lot_num" id="lot_num" />
		
<?php // TODO: make this <select> dropdown dynamically populated from the database instead of hard coded // ?>
		<label for="category" >Category (Reagent Application):</label>
		<select id="category"  name="category">
			<option value="antibody" >antibody</option>
			<option value="dye" >Fluorescent Dye or Stain (unconjugated)</option>
			<option value="streptavidin" >Streptavidin Conjugate</option>
			<option value="buffer" >Buffers and Solutions</option>
			<option value="general" >General Lab Supply/Reagents</option>
			<option value="kit" >Kits and Reagent Combinations</option>
		</select>
		
		<label for="amount" >Amount (ul):</label>
		<input type="text" name="amount" id="amount" />	
		
		<label for="location" >Location:</label>
		<input type="text" name="location" id="location" />	
		
		<label for="description" >Description:</label>
		<textarea name="description" id="description" ></textarea>
		
		<input type="submit" value="Add Reagent" />	
	</form>
</div>
