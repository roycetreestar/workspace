<div class="well">
	<h1>Add an Address</h1>
	<form action="<?=base_url('index.php/permission_test/addresses/create_address')?>" method="post">
		
		
		
		<table class="table">
			
			<tr><td>groupid:</td><td><input type="text" name="group_id" value="<?=$group['entity_id']?>" readonly/></td>
			<td>resource_type:</td><td><input type="text" name="resource_type" value="address" readonly/></td></tr>
			
<!--			<tr><td>address_line_1:			</td><td>	<input type="text" name="address_line_1" />			</td></tr>
			<tr><td>address_line_2:			</td><td>	<input type="text" name="address_line_2" />			</td></tr>
			<tr><td>address_line_3:			</td><td>	<input type="text" name="address_line_3" />			</td></tr>
			<tr><td>city:					</td><td>	<input type="text" name="city" />					</td></tr>
			<tr><td>state:					</td><td>	<input type="text" name="state" />					</td></tr>
			<tr><td>zipcode:				</td><td>	<input type="text" name="zipcode" />				</td></tr>
			<tr><td>country:				</td><td>	<input type="text" name="country" />				</td></tr>
			<tr><td>						</td><td>	<input type="submit" />							</td></tr>	-->
			
			
			<tr><td colspan='4' >	<input type="text" name="resource_name" placeholder='Address name (shipping address, billing address, street address, etc.)' />	</td></tr>
			<tr><td colspan='4' >	<input type="text" name="address_line_1" placeholder='Address 1' />	</td></tr>
			<tr><td colspan='4'>	<input type="text" name="address_line_2" placeholder='Address 2'/>			</td></tr>
			<tr><td colspan='4'>	<input type="text" name="address_line_3" placeholder='Address 3'/>			</td></tr>
			<tr>	
				<td>	<input type="text" name="city" placeholder='City'/>			</td>
				<td>	<input type="text" name="state" placeholder='State'/>			</td>
				<td>	<input type="text" name="zipcode" placeholder='Postal Code'/>	</td>
				<td>	<input type="text" name="country" placeholder='Country'/>		</td>
			</tr>
			<tr><td></td><td></td><td></td><td>	<input type="submit" value="Save"/>	</td></tr>
		</table>
		
	</form>
	
</div>




<style>
	input
	{
		width:100%;
	}
</style>