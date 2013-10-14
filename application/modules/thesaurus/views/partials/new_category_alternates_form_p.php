<?php

/*
 * This form adds new alternate names for a product's categorys
 */
?>
<div class="well" id="new_category_alternates_container">
	<span id="category_alt_result" ></span>
	<h3>Add a product category alternate name</h3>
		
	<form action="<?=base_url()?>thesaurus/add_from_form" method="post" id="new_category_alternates_form">
		<input type="hidden" value="category_alt" name="add_type"/>
		Product category Name
		<?=$categories_dd?>
	<!--	<input type="text" id="chrome_name" name="chrome_name" />		-->
		<br/>
		Alternate Name
		<input type="text" id="alternate_name" name="alternate_name" />
		<br/>
		Is exception: <input type="radio" id="is_exception" name="is_exception" value="1" />
		<br/>
		Is alternate: <input type="radio" id="is_alternate" name="is_exception" value="0" checked />
		<br/>
		<input type="submit" id="category_alt_submit" value="submit me" />
	</form>
	
</div>



<script>
	$('#new_category_alternates_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();		
		
		$('#category_alt_result').html('');
		
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/add_from_form?'+values ,
			type: 'get',
			success:function(msg)
			{
/*				$('#category_alt_result').html(msg).css('color', 'violet');

*/				$('#category_alt_result').html('New alternate name saved').css('color', 'green');

			},
			error: function (msg) 
			{ 
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#categorys_alt_result').html(error_div).css('color', 'red');
			}
		});
	});
</script>
