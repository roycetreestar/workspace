<?php

/*
 * This form adds new alternate names for a chrome
 */
?>
<div class="well" id="new_chrome_alternates_container">
	<span id="chrome_alt_result" ></span>
	<h3>Add a fluorochrome alternate name</h3>
		
	<form action="<?=base_url()?>thesaurus/add_from_form" method="post" id="new_chrome_alternates_form">
		<input type="hidden" value="chrome_alt" name="add_type"/>
		Fluorochrome Name
		<?=$chromes_dd?>
	<!--	<input type="text" id="chrome_name" name="chrome_name" />		-->
		<br/>
		Alternate Name
		<input type="text" id="alternate_name" name="alternate_name" />
		<br/>
		
		<input type="submit" id="chrome_alt_submit" value="submit me" />
	</form>
	
</div>



<script>
	$('#new_chrome_alternates_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();		
		
		$('#chrome_alt_result').html('');
		
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/add_from_form?'+values ,
			type: 'get',
			success:function(msg)
			{
				$('#chrome_alt_result').html('New alternate name saved').css('color', 'green');
			},
			error: function (msg) 
			{ 
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#chrome_alt_result').html(error_div).css('color', 'red');
			}
		});
	});
</script>
