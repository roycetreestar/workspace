<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well" >
	<span id="new_species_result" ></span>
	<h3>Add a species</h3>
	<form action="<?=base_url()?>thesaurus/add_from_form" method="get" id="new_species_form">
		<input type="hidden" value="species" name="add_type"/>
		Species Name
		<input type="text" id="species_name" name="species_name" />
		
		<input type="submit" />
	</form>
</div>


<!-- the loading spinner gets placed in any partial that's waiting on ajax -->
<div id="load_spinner" style="display:none"><img src="<?=base_url()?>assets/img/loader.gif" id="loading_indicator"  /></div>


<script>
	$('#new_species_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#new_species_result').html($('#load_spinner').html());
		
//alert('submitted');
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/add_from_form?'+values ,
			type: 'get',
			success:function(msg)
			{
//alert(msg);				
		$('#new_species_result').html('New species saved').css('color', 'green');
		$('#species_alt_container').html('reloading now');
		reload_species_alts();
			},
			error: function (msg) 
			{ 
//alert(msg.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#new_species_result').html(error_div).css('color', 'red');
			}
		});
		
		

	});
	
function reload_species_alts()
{	
	//refresh the species_alternates_form if present		
	$('#species_alt_container').html($('#load_spinner').html());
	$.ajax(
	{
		url: '<?=base_url()?>thesaurus/get_species_alternates_form/ajax',
		type: 'get',
		success:function(msg)
		{
//alert(msg);				
			$('#species_alt_container').html(msg);
		},
		
		error: function (msg) 
			{ 
//alert(msg.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#species_alt_container').html(error_div).css('color', 'red');
			}
		
	});
}
</script>
