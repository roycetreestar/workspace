<?php
 
/*
 * This form adds new alternate names for a chrome
 */
?>
<div class="well" id="new_cat_head_alternates_container">
	<span id="cat_head_alt_result" ></span>
	<h3>Add a catalog header alternate name</h3>
		
	<form action="<?=base_url()?>thesaurus/add_from_form" method="post" id="new_cat_head_alternates_form">
		<input type="hidden" value="cat_head_alt" name="add_type"/>
		Catalog Header Name
		<?=$cat_heads_dd?>
	<!--	<input type="text" id="chrome_name" name="chrome_name" />		-->
		<br/>
		Alternate Name
		<input type="text" id="alternate_name" name="alternate_name" />
		<br/>
		
		<input type="submit" id="chrome_alt_submit" value="submit me" />
	</form>
	
</div>



<script>
	$('#new_cat_head_alternates_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();		
		
		$('#cat_head_alt_result').html('');
alert('values:\n'+values);		
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/add_from_form?'+values ,
			type: 'get',
			success:function(msg)
			{
/*
alert(msg);
*/
				$('#cat_head_alt_result').html('New alternate name saved').css('color', 'green');
			},
			error: function (msg) 
			{ 
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#cat_head_alt_result').html(error_div).css('color', 'red');
			}
		});
	});
</script>
