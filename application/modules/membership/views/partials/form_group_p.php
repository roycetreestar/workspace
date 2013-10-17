<?php
/*
 * The form to create or edit a group
 */
if(!isset($group))
	$group['entity_id'] = '';
	
	if(!isset($form_action))
		$form_action = 'membership/groups/save';
?>

 
 
 
<div class="widget "  id="form_group_<?= isset($entity_id)? $entity_id : '' ?>" > 
	<div class="" id="edit_group_result_<?= isset($entity_id)? $entity_id : '' ?>" ></div> 
	<form action="" method="post" id="edit_group_form_<?= isset($entity_id)? $entity_id : '' ?>" >
		<input class="id_container" type="text" name="entity_id" value="<?= isset($entity_id)? $entity_id : '' ?>" readonly />
		group_name:
			<input type="text" name="group_name" value="<?= isset($group_name)? $group_name : ''?>" />			
	
		group_type:		
			<select name="group_type">
				<option value="3">Personal Resources Group</option>
				<option value="1">Lab</option>
				<option value="2">Core</option>
				<option value="4">Other</option>
			</select>
		
		long_group_name:
			<input type="text" name="long_group_name" value="<?= isset($long_group_name)? $long_group_name : ''?>" />			

		access:
			<select name="access">
				<option value="0" <?=isset($access) && $access==0 ? 'selected="selected"': '' ?> >Public</option>
				<option value="1" <?=isset($access) && $access==1 ? 'selected="selected"': '' ?> >Private</option>
			</select>
			
		group email address:	
			<input type="text" name="email"			value="<?= isset($email)? $email : ''?>" />					
	
		group phone number:			
			<input type="text" name="phone" 		value="<?= isset($phone)? $phone : ''?>" />					
	
		additional information:		
			<textarea name="additional_information"	 ><?= isset($additional_information)? trim($additional_information) : ''?></textarea>	

		<input type="submit" />		
	</form>	

</div><!-- end .widget	-->





<script>

	$('#edit_group_form_<?= isset($entity_id)? $entity_id : '' ?>').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#edit_group_result_<?= isset($entity_id)? $entity_id : '' ?>').html('Processing...');		

		$.ajax(
		{
			url: "<?=base_url().$form_action?>",
			type: 'post',
			data: values,
			success:function(msg)
			{
				if(msg == 'success' || msg == 'successsuccess')
					$('#edit_group_result_<?= isset($entity_id)? $entity_id : '' ?>').html('Group Saved').css('color', 'green');
				else
					$('#edit_group_result_<?= isset($entity_id)? $entity_id : '' ?>').html(msg).css('color', 'red');
			},
			error: function (msg) 
			{ 
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#edit_group_result_<?= isset($entity_id)? $entity_id : '' ?>').html(error_div).css('color', 'red');
			}
		});
/* */
	});

</script>
