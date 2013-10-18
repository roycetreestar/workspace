<?php
//the default action="" value goes to membership/users/create_user
//to override this, for example, with a function in the GUI controller,
// pass in $data['form_action']='controllerName/functionName';
	if(!isset($form_action))
		$form_action = 'membership/users/save';
?>


<?php if(isset($email)) echo '<h2 id="page_title" class="page-title">Edit User '.$email.'</h2>'; else echo '<h2 id="page_title" class="page-title">Register for Fluorish</h2>'; ?>
<form action="" method="post" id="edit_user_form" accept-charset="utf-8" >
	<label>Email Address</label>
	<input type="text" name="email" 		value="<?=isset($email)? $email : '' ?>" class="span5"/>
	<label>Password</label>
	<input type="password" name="password" 	value="<?=isset($password)? $password : '' ?>" class="span5"/>
	<label>First Name</label>
	<input type="text" name="first_name" 	value="<?=isset($first_name)? $first_name : '' ?>" class="span5"/>
	<label for="last_name">Last Name</label>
	<div class="input">
		<input type="text" name="last_name" 	value="<?=isset($last_name)? $last_name : '' ?>" class="span5"/>
	</div>
	<label for="">Institution</label>
	<div class="input">
		<?=$institution_dd?>
	</div>
	<input type="hidden" name="entity_id" 	value="<?=isset($id)		? $id 			: '' ?>" />
	<input type="hidden" name="id" 			value="<?=isset($id)		? $id 			: '' ?>" />
	<input type="hidden" name="phone" 		value="<?=isset($phone)		? $phone 		: '' ?>" />
	<input type="hidden" name="entity_name" value="<?=isset($entity_name)? $entity_name : '' ?>" />
	<div class="" id="edit_user_result" ></div>
	<input type="submit" value="Register" name="btnLogin" class="btn span5" id="login_nav" style="width:50%">

	</li>
	</ul>
</form>

<script>
	$('#edit_user_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#edit_user_result').html('');
		

//alert('about to save a user. the values are:\n'+values);

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
