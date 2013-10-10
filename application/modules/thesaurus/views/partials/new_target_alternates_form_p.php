<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well" >
		<span id="new_target_alternate_result" ></span>
	<h3>Add an alternate name for a target</h3>
	<form action="<?=base_url()?>thesaurus/add_from_form" method="get" id="new_target_alternate_form">
		<input type="hidden" value="target_alt" name="add_type"/>
		Target Name
		<?=$targets_dd?>
	<!--	<input type="text" name="target_name" id="target_name" />		-->
		<br/>
		Alternate Name
		<br/>
		<input type="text" name="alternate_name" id="alternate_name" />
		<br/>
		Is exception: <input type="radio" id="is_exception" name="is_exception" value="1" />
		<br/>
		Is alternate: <input type="radio" id="is_alternate" name="is_exception" value="0" checked />
		<br/>		
		<input type="submit" />
	</form>
</div>





<script>
	$('#new_target_alternate_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();		
		
		$('#new_target_alternate_result').html('');
		
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/add_from_form?'+values ,
			type: 'get',
			success:function(msg)
			{
				$('#new_target_alternate_result').html('New alternate name saved').css('color', 'green');
			},
			error: function (msg) 
			{ 
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#new_target_alternate_result').html(error_div).css('color', 'red');
			}
		});
	});
</script>
