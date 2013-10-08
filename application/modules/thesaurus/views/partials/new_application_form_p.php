<div class="well" >
	<span id="new_application_result" ></span>
	<h4>Add a product application</h4>
	<form action="<?=base_url()?>thesaurus/add_from_form" method="get" id="new_application_form">
		<input type="hidden" value="application" name="add_type"/>
		Application Name
		<input type="text" id="application_name" name="application_name" />
		
		<input type="submit" />
	</form>
</div>


<!-- the loading spinner gets placed in any partial that's waiting on ajax -->
<div id="load_spinner" style="display:none"><img src="<?=base_url()?>assets/img/loader.gif" id="loading_indicator"  /></div>


<script>
	$('#new_application_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#new_application_result').html($('#load_spinner').html());
		
//alert('submitted');
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/add_from_form?'+values ,
			type: 'get',
			success:function(msg)
			{
//alert(msg);				
		$('#new_application_result').html('New application saved').css('color', 'green');
		reload_alts();
			},
			error: function (msg) 
			{ 
//alert(msg.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#new_application_result').html(error_div).css('color', 'red');
			}
		});
		
		

	});
	
function reload_alts()
{	
	//refresh the application_alternates_form if present		
	$('#application_alt_container').html($('#load_spinner').html());
	$.ajax(
	{
		url: '<?=base_url()?>thesaurus/get_application_alternates_form/ajax',
		type: 'get',
		success:function(msg)
		{
//alert(msg);				
			$('#application_alt_container').html(msg);
		}
		
	});
}
</script>
