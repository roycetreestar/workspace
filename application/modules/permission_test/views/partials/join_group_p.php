<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well">
	<h1>Join an entity to a group </h1>
	<div id="join_group_result"></div>
	
	<form action="" method="post" id="join_group_form" >
		entityid that is joining:<input type="text" name="entityid" /><br/>
		entity_type (try 0 for user, 1 for group):<input type="text" name="entity_type" /><br/>
		groupid to join:<input type="text" name="groupid" /><br/>
		permission to give entity in group (0=pending member, 1=accepted member, 2=manager):<input type="text" name="permission" /><br/>
		
		
		
		<input type="submit" />
		
		
	</form>
	
	
	
</div>



<script>
	$('#join_group_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#join_group_result').html('');
		
//alert('submitted:'+ $(this).serialize());
		$.ajax(
		{
			url: 'permission_test/join_group',
			type: 'post',
			data: values,
			success:function(msg)
			{
//alert('message: \n'+msg);
				if(msg == 'success')
					$('#join_group_result').html('Group joined\n'+msg).css('color', 'green');
				else
					$('#join_group_result').html(msg).css('color', 'red');
			},
//			error: function (msg) 
//			{ 
////alert(msg.responseText);
//				var the_error = msg.responseText;
//				var start = the_error.indexOf("<div");
//				var end = the_error.indexOf("</div>") + 7;
//				var error_div = the_error.substring(start, end);
//
//				$('#join_group_result').html(error_div).css('color', 'red');
////$('#new_group_result').html('Something went wrong!').css('color', 'violet');
//			}
		});
	});
</script>