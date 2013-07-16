<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well" >
	<h3>create_user_p</h3>
	
	<div class="well " id="new_user_result" ></div>
	
	<form action="" method="post" id="new_user_form" >		
		<table class="">
<!--			<div class="well half_width">-->
				<tr><td>username:		</td><td>	<input type="text" name="username" />		</td></tr>
				<tr><td>password:		</td><td>	<input type="password" name="password" />	</td></tr>
				<tr><td>first_name:		</td><td>	<input type="text" name="first_name" />		</td></tr>
				<tr><td>last_name:		</td><td>	<input type="text" name="last_name" />		</td></tr>
				<tr><td>phone:			</td><td>	<input type="text" name="phone" />			</td></tr>
				<tr><td>email:			</td><td>	<input type="text" name="email" />			</td></tr>
<!--			</div>
			<div class="well half_width">-->
<!--				<tr><td>address_line_1:	</td><td>	<input type="text" name="address_line_1" />	</td></tr>
				<tr><td>address_line_2:	</td><td>	<input type="text" name="address_line_2" />	</td></tr>
				<tr><td>city:			</td><td>	<input type="text" name="city" />			</td></tr>
				<tr><td>state:			</td><td>	<input type="text" name="state" />			</td></tr>
				<tr><td>zipcode:		</td><td>	<input type="text" name="zipcode" />		</td></tr>
				<tr><td>country:		</td><td>	<input type="text" name="country" />		</td></tr>-->
			<!--</div>-->
			<tr><td ><input type="submit" />		</td></tr>
		</table>
	</form>
	
</div>






<script>
	$('#new_user_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#new_user_result').html('');
		
alert('submitted');
		$.ajax(
		{
			url: '<?=base_url('index.php/permission_test/users/create_user') ?>',
			type: 'post',
			data: values,
			success:function(msg)
			{
alert('form_user_p says \n'+ msg);				
		$('#new_user_result').html('New user created').css('color', 'green');
			},
			error: function (msg) 
			{ 
alert('form_user_p says \n'+ g.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#new_user_result').html(error_div).css('color', 'red');
//$('#new_user_result').html('Something went wrong!').css('color', 'red');
			}
		});
	});
</script>