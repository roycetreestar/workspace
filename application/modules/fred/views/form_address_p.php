<?php
	if(isset($xml_obj))
	{
		$gid = $group_id;
		$rid = $resource_id;
		$addr_name = $xml_obj->attributes()->name;
		$line1 = $xml_obj->Line1;
		$line2 = $xml_obj->Line2;
		$line3 = $xml_obj->Line3;
		$city = $xml_obj->City;
		$state = $xml_obj->State;
		$zip = $xml_obj->Zipcode;
		$country = $xml_obj->Country;
	}
	else
	{
		$gid = $rid = $addr_name = $line1 = $line2 = $line3 = $city = $state = $zip = $country = '';
	}
?>
<div class="well">
	<h1>Add an Address</h1>
	<form action="<?=base_url('addresses/save')?>" method="post">
		
		
		
		<table class="table">
			<?php //$group_value =  isset($group) ?  $group_id :  '' ?>
			<tr><td>group:</td><td><input type="text" name="group_id" value="<?= $gid?>" readonly /></td></tr>
			<tr><td>resource_type:</td><td><input type="text" name="resource_type" value="address" readonly /></td></tr>
			<tr><td>resource_id:</td><td><input type="text" name="resource_id" value="<?= $rid?>" readonly /></td></tr>
			
		
			
			<tr><td colspan='4' >	<input type="text" name="resource_name" placeholder='Address name (shipping address, billing address, street address, etc.)' value="<?=$addr_name?>" />	</td></tr>
			<tr><td colspan='4' >	<input type="text" name="line1" placeholder='Address 1' value="<?=$line1?>" />	</td></tr>
			<tr><td colspan='4'>	<input type="text" name="line2" placeholder='Address 2' value="<?=$line2?>" />			</td></tr>
			<tr><td colspan='4'>	<input type="text" name="line3" placeholder='Address 3' value="<?=$line3?>" />			</td></tr>
			<tr>	
				<td>	<input type="text" name="city" placeholder='City' value="<?=$city?>" />			</td>
				<td>	<input type="text" name="state" placeholder='State' value="<?=$state?>" />			</td>
				<td>	<input type="text" name="zipcode" placeholder='Postal Code' value="<?=$zip?>" />	</td>
				<td>	<input type="text" name="country" placeholder='Country' value="<?=$country?>" />		</td>
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
