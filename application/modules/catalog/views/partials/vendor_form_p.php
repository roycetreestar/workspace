<div class="well">
	<h3>Add or Edit a vendor</h3>
	<div id="edit_vendor_result"></div>
	<table class="table table-bordered">
		<tr><th>vendor_id</th><th>vendor_name</th><th>URL</th><th>current</th><th>if_contains</th><th>email</th><th>submit</th></tr>
		<tr>
			<form id="edit_vendor_form" action="<?=base_url()?>catalog/vendors/save_vendor" method="post" >
				<td>
					<input type="text" name="vendor_id" value="<?=isset($vendor_id)? $vendor_id : ''?>" readonly />
				</td><td>
					<input type="text" name="vendor_name" value="<?=isset($vendor_name)? $vendor_name : ''?>" />
				</td><td>
					<input type="text" name="url" value="<?=isset($url)? $url : ''?>" />
				</td><td>
					<input type="checkbox" name="current" <?php if(isset($current) && $current == 1) echo 'checked' ?> />
				</td><td>
					<input type="text" name="if_contains" value="<?=isset($if_contains)? $if_contains : ''?>" />
				</td><td>
					<input type="text" name="email" value="<?=isset($email)? $email : ''?>" />
				</td><td>
					<input type="submit" />
				</td>
			
			</form>
		</tr>
	</table>
</div>



<script>
	$('#edit_vendor_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#edit_vendor_result').html('');
		
//alert('submitted');
		$.ajax(
		{
			url: '<?=base_url()?>catalog/vendors/save_vendor',
			type: 'post',
			success:function(msg)
			{
//alert(msg);				
		$('#edit_vendor_result').html('Changes Saved<br/>'+msg).css('color', 'green');
			},
			error: function (msg) 
			{ 
//alert(msg.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#edit_vendor_result').html(error_div).css('color', 'red');
			}
		});
	});
</script>
