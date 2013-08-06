<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(!isset($group))
	$group['entity_id'] = '';
?>

<div class="well " >
	
	<div class="well" id="new_group_result"></div>
	
	<form action="membership/groups/create_group" method="post" id="form_group_form" >
		<h1>form_group_p</h1>
		
		<table class="table">
			<tr><td>group_name:				</td><td>	<input type="text" name="group_name" />				</td></tr>
			<tr><td>long_group_name:			</td><td>	<input type="text" name="long_group_name" />			</td></tr>
			<tr><td>parent_group:			</td><td>	<input type="text" name="parent_group" value="<?=$group['entity_id']?>" readonly/>			</td></tr>
			<tr><td>access (0=public, 1=private):	</td><td>	<input type="text" name="access" />				</td></tr>
			<tr><td>group email address:		</td><td>	<input type="text" name="email" />					</td></tr>
			<tr><td>group phone number:		</td><td>	<input type="text" name="phone" />					</td></tr>
			<tr><td>additional information:	</td><td>	<textarea name="additional_information" ></textarea>	</td></tr>

			<tr><td>						</td><td>	<input type="submit" />							</td></tr>
		</table>
		
	</form>	
</div>





<script>
	$('#create_group_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#new_group_result').html('');
		
//alert('submitted:'+ $(this).serialize());
		$.ajax(
		{
			url: 'membership/groups/create_group',
			type: 'post',
			data: values,
			success:function(msg)
			{
//alert('message: \n'+msg);
				if(msg == 'success')
					$('#new_group_result').html('New group created\n'+msg).css('color', 'green');
				else
					$('#new_group_result').html(msg).css('color', 'red');
			},
			error: function (msg) 
			{ 
//alert(msg.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#new_group_result').html(error_div).css('color', 'red');
//$('#new_group_result').html('Something went wrong!').css('color', 'violet');
			}
		});
	});
</script>