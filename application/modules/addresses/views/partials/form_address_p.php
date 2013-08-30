<div class="well">
	<h1>Add an Address</h1>
	<form action="<?=base_url('addresses/save')?>" method="post">
		
		
		
		<table class="table">
			
			<tr>
				<td>groupid: <input type="text" name="group_id" value="<?=isset($group['entity_id']) ? $group['entity_id'] : '' ?>" readonly/></td>
				<td>resource_type: <input type="text" name="resource_type" value="address" readonly/></td>
				<td>resource_id: <input type="text" name="resource_id" value="<?=isset($resource_id) ? $resource_id : '' ?>" readonly/></td>
			</tr>

			<tr>
				<td colspan='4' >	<input type="text" name="resource_name" placeholder='Address name ("shipping address", "billing address", "street address", etc.)' />	</td>
			</tr>
			<tr>
				<td colspan='4' >	<input type="text" name="address_line_1" placeholder="Address Line 1" value="<?= isset($address_line_1)? $address_line_1 : '' ?>" />	</td>
			</tr>
			<tr>
				<td colspan='4'>	<input type="text" name="address_line_2" placeholder="Address Line 2" value="<?= isset($address_line_2)? $address_line_2 : '' ?>" />	</td>
			</tr>
			<tr>
				<td colspan='4'>	<input type="text" name="address_line_3" placeholder="Address Line 3" value="<?= isset($address_line_3)? $address_line_3 : '' ?>" />	</td>
			</tr>
			<tr>	
				<td>	<input type="text" name="city" placeholder='City' value="<?=isset($city) ? $city : '' ?>" />			</td>
				<td>	<input type="text" name="state" placeholder='State' value="<?=isset($state) ? $state : '' ?>" />			</td>
				<td>	<input type="text" name="zipcode" placeholder='Postal Code' value="<?=isset($zipcode) ? $zipcode : '' ?>" />	</td>
				<td>	<input type="text" name="country" placeholder='Country' value="<?=isset($country) ? $country : '' ?>" />		</td>
			</tr>
			<tr><td colspan="3"></td><td>	<input type="submit" value="Save"/>	</td></tr>
		</table>
		
	</form>
	
</div>




<style>
	input
	{
		width:100%;
	}
</style>
