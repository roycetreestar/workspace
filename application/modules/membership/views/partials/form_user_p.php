<?php
//the default action="" value goes to membership/users/create_user
//to override this, for example, with a function in the GUI controller,
// pass in $data['form_action']='controllerName/functionName';
	if(!isset($form_action))
		$form_action = 'membership/users/save';
?>


<div class="well" >
	<?php
	if(isset($email))
		echo '<h3>Edit User '.$email.'</h3>';
	else
		echo '<h3>Register for Fluorish</h3>';
	?>
	
	<div class="well " id="edit_user_result" ></div>
	
	<form action="" method="post" id="edit_user_form" >		
		
		<table class="">
				<tr><td>email:			</td><td>	<input type="text" name="email" 		value="<?=isset($email)? $email : '' ?>" />			</td></tr>
				<tr><td>password:		</td><td>	<input type="password" name="password" 	value="<?=isset($password)? $password : '' ?>" />	</td></tr>
				<tr><td>first_name:		</td><td>	<input type="text" name="first_name" 	value="<?=isset($first_name)? $first_name : '' ?>"/>		</td></tr>
				<tr><td>last_name:		</td><td>	<input type="text" name="last_name" 	value="<?=isset($last_name)? $last_name : '' ?>"/>		</td></tr>
				<tr><td>institution		</td><td>	<input type="text" name="institution" 	value="<?=isset($institution)? $institution : '' ?>"/>	</td></tr>

					<input type="hidden" name="entity_id" 	value="<?=isset($id)		? $id 			: '' ?>" />
					<input type="hidden" name="id" 			value="<?=isset($id)		? $id 			: '' ?>" />	
					<input type="hidden" name="phone" 		value="<?=isset($phone)		? $phone 		: '' ?>" />	
					<input type="hidden" name="entity_name" value="<?=isset($entity_name)? $entity_name : '' ?>" />	

			<tr><td ><input type="submit" />		</td></tr>
		</table>
	</form>	
</div>






<script>
	$('#edit_user_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#edit_user_result').html('');
		

alert('about to save a user. the values are:\n'+values);

		$.ajax(
		{
			url: '<?=base_url().$form_action ?>',
			type: 'post',
			data: values,
			success:function(msg)
			{
				$('#edit_user_result').html(msg).css('color', 'green');
			},
			error: function (msg) 
			{ 
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#edit_user_result').html(error_div).css('color', 'red');
			}
		});
	});
</script>
