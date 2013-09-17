<?php
	if(!isset($form_action))
		$form_action = 'addresses/save';
?>
<div>
		<div  id="edit_address_result"></div>
	
	<form action="" method="post" id="edit_address_form" >
		<h3>Add/Edit an Address</h3>
		
		
		<table class="table">
			
			<tr>
				<td>groupid: <input type="text" name="group_id" value="<?=isset($id) ? $id : '' ?>" readonly /></td>
				<td>resource_type: <input type="text" name="resource_type" value="address" readonly /></td>
				<td>resource_id: <input type="text" name="resource_id" value="<?=isset($resource_id) ? $resource_id : '' ?>" readonly /></td>
			</tr>

			<tr>
				<td colspan='4' >Address Name	<input type="text" name="resource_name" placeholder='Address name ("shipping address", "billing address", "street address", etc.)' />	</td>
			</tr>
			<tr>
				<td colspan='4' >Line 1	<input type="text" name="address_line_1" placeholder="Address Line 1" value="<?= isset($address_line_1)? $address_line_1 : '' ?>" />	</td>
			</tr>
			<tr>
				<td colspan='4'>Line 2	<input type="text" name="address_line_2" placeholder="Address Line 2" value="<?= isset($address_line_2)? $address_line_2 : '' ?>" />	</td>
			</tr>
			<tr>
				<td colspan='4'>Line 3	<input type="text" name="address_line_3" placeholder="Address Line 3" value="<?= isset($address_line_3)? $address_line_3 : '' ?>" />	</td>
			</tr>
			
			<tr>	
				<td>City	<input type="text" name="city" placeholder='City' value="<?=isset($city) ? $city : '' ?>" />			</td>
				<td>State	<input type="text" name="state" placeholder='State' value="<?=isset($state) ? $state : '' ?>" />			</td>
				<td>Zipcode	<input type="text" name="zipcode" placeholder='Postal Code' value="<?=isset($zipcode) ? $zipcode : '' ?>" />	</td>
				<td>Country	<input type="text" name="country" placeholder='Country' value="<?=isset($country) ? $country : '' ?>" />		</td>
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
<script>
	$('#edit_address_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#edit_address_result').html('');
		
		$.ajax(
		{
			url: "<?=base_url().$form_action?>",
			type: 'post',
			data: values,
			success:function(msg)
			{
				if(msg == 'success' || msg == 'successsuccess')
					$('#edit_address_result').html('Address Saved<br/>'+msg).css('color', 'green');
				else
					$('#edit_address_result').html(msg).css('color', 'red');
			},
			error: function (msg) 
			{ 

				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#edit_address_result').html(error_div).css('color', 'red');
			}
		});
	});
</script>
