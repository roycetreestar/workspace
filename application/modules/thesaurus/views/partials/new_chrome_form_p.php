<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well">
	<span id="new_chromes_result" ></span>
	<h3>Add a fluorochrome</h3>
		
		
	<form action="<?=base_url()?>thesaurus/add_from_form" method="get" id="new_chromes_form">
		<input type="hidden" value="chrome" name="add_type"/>
		Name
		<input type="text" id="name" name="name" />
		<br/>
		Excitation
		<input type="text" id="excitation" name="excitation" />
		<br/>
		Emission
		<input type="text" id="emission" name="emission" />
		<br/>
		Category
		<input type="text" id="category" name="category" />
		<br/>
		live_dead
		<input type="text" id="live_dead" name="live_dead" />
		<br/>
		20Efficiency
		<input type="text" id="20efficiency" name="20efficiency" />
		<br/>
		60Efficiency
		<input type="text" id="60efficiency" name="60efficiency" />
		<br/>
		80Efficiency
		<input type="text" id="80efficiency" name="80efficiency" />
		<br/>
		CAS
		<input type="text" id="cas" name="cas" />
		<br/>
		
		<input type="submit" value="GO!" />
	</form>
</div>



<!-- the loading spinner gets placed in any partial that's waiting on ajax -->
<div id="load_spinner" style="display:none"><img src="<?=base_url()?>assets/img/loader.gif" id="loading_indicator"  /></div>

<script>
	$('#new_chromes_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#new_chromes_result').html($('#load_spinner').html());
		
//alert('The Spinnie ... it works!');
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/add_from_form?'+values ,
			type: 'get',
			success:function(msg)
			{
//alert(msg);				
		$('#new_chromes_result').html('New fluorochrome saved').css('color', 'green');
			},
			error: function (msg) 
			{ 
//alert(msg.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#new_chromes_result').html(error_div).css('color', 'red');
			}
		});
		
		
		
		
		
//refresh the chrome_alternates_form if present		
$('#chrome_alt_container').html($('#load_spinner').html());
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/get_chromes_alternates_form',
			type: 'get',
			success:function(msg)
			{
/*
alert(msg);				
*/
		$('#chrome_alt_container').html(msg);
			}
			
		});
		
		
		
	});
</script>
