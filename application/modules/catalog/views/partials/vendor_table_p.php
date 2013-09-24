<div class="well">
	<h3>Manage Vendors</h3>
	<div id="edit_vendor_result"></div>
	<table class="table table-bordered" >
		<tr><td colspan="7" style="background-color:gray; text-align:center;"><h1> Add a New Vendor</h1></td></tr>
		<tr style="background-color:gray"><th></th><th>vendor_name</th><th>URL</th><th>current</th><th>if_contains</th><th>email</th><th>submit</th></tr>
		<tr style="background-color:gray">
			<form id="edit_vendor_form_0" action="<?=base_url()?>catalog/vendors/save_vendor" method="post" >
				<td>
					<input type="hidden" name="vendor_id" value="0" readonly /> <h4>Add a New Vendor:</h4>
				</td><td>
					<input type="text" name="vendor_name" value="" />
				</td><td>
					<input type="text" name="url" value="" />
				</td><td>
					<input type="checkbox" name="current"   />
				</td><td>
					<input type="text" name="if_contains" value="" />
				</td><td>
					<input type="text" name="email" value="" />
				</td><td>
					<input type="submit" />
				</td>
			
			</form>
		</tr>
		<tr><td colspan="7" style="background-color:gray"><h1> </h1></td></tr>
		<tr><td colspan="7"  style="text-align:center;"><h1> Edit Vendors </h1></td></tr>
		<tr><th>vendor_id</th><th>vendor_name</th><th>URL</th><th>current</th><th>if_contains</th><th>email</th><th>submit</th></tr>
		<?php
			foreach($vendors as $vendor) 
			{ ?>
				
			<tr>
				<form id="edit_vendor_form_<?=$vendor['vendor_id']?>" action="<?=base_url()?>catalog/vendors/update_vendor" method="post" >
					<td>
						<input type="text" name="vendor_id" value="<?=isset($vendor['vendor_id'])? $vendor['vendor_id'] : ''?>" readonly />
					</td><td>
						<input type="text" name="vendor_name" value="<?=isset($vendor['vendor_name'])? $vendor['vendor_name'] : ''?>" />
					</td><td>
						<input type="text" name="url" value="<?=isset($vendor['url'])? $vendor['url'] : ''?>" />
					</td><td>
						<input type="checkbox" name="current" <?php if(isset($vendor['current']) && $vendor['current'] == 1) echo 'checked' ?> />
					</td><td>
						<input type="text" name="if_contains" value="<?=isset($vendor['if_contains'])? $vendor['if_contains'] : ''?>" />
					</td><td>
						<input type="text" name="email" value="<?=isset($vendor['email'])? $vendor['email'] : ''?>" />
					</td><td>
						<input type="submit" />
					</td>
				
				</form>
			</tr>
				
				
		<?php
			} ?>
	</table>
</div>



<script>
	

	$('form[id^="edit_vendor_form_"]').submit( function(event)
	{
		var formid = $(this).attr("id");
		var id= formid.substr(formid.lastIndexOf("_")+1)
		
		
		event.preventDefault();				

		var values = $(this).serialize();	

		$('#edit_vendor_result').html('');
		

		$.ajax(
		{
			url: '<?=base_url()?>catalog/vendors/save_vendor',
			type: 'post',
			data: values,
			success:function(msg)
			{
/*
				$('#edit_vendor_form_0').find('input[type=text], input[type=checkbox]').val('');
*/
				window.location.reload();
				$(':input','#edit_vendor_form_0')
					 .not(':button, :submit, :reset, :hidden')
					 .val('')
					 .removeAttr('checked')
					 .removeAttr('selected');
 
/*				
alert('Save Successful\n ... reloading page ...');
*/				
//		$('#edit_vendor_result').html('Changes Saved<br/>'+msg).css('color', 'green');
			},
			error: function (msg) 
			{ 

				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#edit_vendor_result').html(error_div).css('color', 'red');
			}
		});
	});

</script>
