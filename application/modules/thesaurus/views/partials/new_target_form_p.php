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


<!-- the loading spinner gets placed in any partial that's waiting on ajax -->
<div id="load_spinner" style="display:none"><img src="<?=base_url()?>assets/img/loader.gif" id="loading_indicator"  /></div>

<script>
	$('#new_target_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#new_target_result').html($('#load_spinner').html());
		
//alert('submitted');
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/add_from_form?'+values ,
			type: 'get',
			success:function(msg)
			{
//alert(msg);				
		$('#new_target_result').html('New target saved').css('color', 'green');
		reload_alts();
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
	
	
	
//when the add form is successfully submitted, relaod the add-alternate-name partial so its dropdown has the new term
	function reload_alts()
	{	
	//refresh the targets_alternates_form if present		
		$('#target_alt_container').html($('#load_spinner').html());
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/get_targets_alternates_form/ajax',
			type: 'get',
			success:function(msg)
			{
	//alert(msg);				
				$('#target_alt_container').html(msg).css('color', 'green');
			}			
		});
	}
</script>
