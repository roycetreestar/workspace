<div class="well" >
	<span id="new_category_result" ></span>
	<h4>Add a product category</h4>
	<form action="<?=base_url()?>thesaurus/add_from_form" method="get" id="new_category_form">
		<input type="hidden" value="category" name="add_type"/>
		Category Name
		<input type="text" id="category_name" name="category_name" />
		
		<input type="submit" />
	</form>
</div>


<!-- the loading spinner gets placed in any partial that's waiting on ajax -->
<div id="load_spinner" style="display:none"><img src="<?=base_url()?>assets/img/loader.gif" id="loading_indicator"  /></div>


<script>
	$('#new_category_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#new_category_result').html($('#load_spinner').html());
		
//alert('submitted');
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/add_from_form?'+values ,
			type: 'get',
			success:function(msg)
			{
//alert(msg);				
		$('#new_category_result').html('New category saved').css('color', 'green');
		reload_alts();
			},
			error: function (msg) 
			{ 
//alert(msg.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#new_category_result').html(error_div).css('color', 'red');
			}
		});
		
		

	});
	
function reload_alts()
{	
	//refresh the category_alternates_form if present		
	$('#category_alt_container').html($('#load_spinner').html());
	$.ajax(
	{
		url: '<?=base_url()?>thesaurus/get_category_alternates_form/ajax',
		type: 'get',
		success:function(msg)
		{
//alert(msg);				
			$('#category_alt_container').html(msg);
		}
		
	});
}
</script>
