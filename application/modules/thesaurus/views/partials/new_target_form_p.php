<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well" >
		<span id="new_target_result" ></span>
	<h3>Add a target</h3>
	<form action="<?=base_url()?>thesaurus/add_from_form" method="get" id="new_target_form">
		<input type="hidden" value="target" name="add_type"/>
		Target Name
		<input type="text" id="target_name" name="target_name" />
		
		<input type="submit" />
	</form>
</div>



<script>
	$('#new_target_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#new_target_result').html('');
		
//alert('submitted');
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/add_from_form?'+values ,
			type: 'get',
			success:function(msg)
			{
//alert(msg);				
		$('#new_target_result').html('New target saved').css('color', 'green');
			},
			error: function (msg) 
			{ 
//alert(msg.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#new_target_result').html(error_div).css('color', 'red');
			}
		});
	});
</script>
