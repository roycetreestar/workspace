<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(!isset($group))
	$group['entity_id'] = '';
	
	if(!isset($form_action))
		$form_action = 'membership/groups/save';
?>

<div class="well " >
	
	<div class="well" id="edit_group_result"></div>
	
	<form action="" method="post" id="edit_group_form" >
	<!--	<h3>form_group_p</h3>		-->
		
		<input type="text" name="entity_id" value="<?= isset($entity_id)? $entity_id : '' ?>" readonly />
		<table class="table">
			<tr><td>group_name:				</td><td>	<input type="text" name="group_name" value="<?= isset($group_name)? $group_name : ''?>" />				</td></tr>
			<tr><td>group_type:				</td><td>	
							<select name="group_type">
								<option value="3">Personal Resources Group</option>
								<option value="1">Lab</option>
								<option value="2">Core</option>
							</select></td>
			</tr>
			<tr><td>long_group_name:			</td><td>	<input type="text" name="long_group_name" value="<?= isset($long_group_name)? $long_group_name : ''?>" />			</td></tr>
	<!--		<tr><td>parent_group:			</td><td>	<input type="text" name="parent_group" value="<?php //$group['entity_id']?>" readonly/>			</td></tr>	-->
			<tr><td>access:	</td><td>	
							<select name="access">
								<option value="0" <?=isset($access) && $access==0 ? 'selected="selected"': '' ?> >Public</option>
								<option value="1" <?=isset($access) && $access==1 ? 'selected="selected"': '' ?> >Private</option>
							</select></td>
			</tr>
			<tr><td>group email address:	</td><td>	<input type="text" name="email"			value="<?= isset($email)? $email : ''?>" />					</td></tr>
			<tr><td>group phone number:		</td><td>	<input type="text" name="phone" 		value="<?= isset($phone)? $phone : ''?>" />					</td></tr>
			<tr><td>additional information:	</td><td>	<textarea name="additional_information"	 ><?= isset($additional_information)? trim($additional_information) : ''?></textarea>	</td></tr>

			<tr><td>						</td><td>	<input type="submit" />							</td></tr>
		</table>
		
	</form>	
</div>





<script>
	$('#edit_group_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#edit_group_result').html('');
		
		$.ajax(
		{
			url: "<?=base_url().$form_action?>",
			type: 'post',
			data: values,
			success:function(msg)
			{
				if(msg == 'success' || msg == 'successsuccess')
					$('#edit_group_result').html('Group Saved<br/>'+msg).css('color', 'green');
				else
					$('#edit_group_result').html(msg).css('color', 'red');
			},
			error: function (msg) 
			{ 

				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#edit_group_result').html(error_div).css('color', 'red');
			}
		});
	});
</script>
