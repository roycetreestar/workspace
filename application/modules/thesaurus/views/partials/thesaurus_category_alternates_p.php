<div>
	<h4>Find product category alternate names</h4>
	<form id="find_category_alts" method="" action="">
		category name:
		<input type="text" name="search_string" />
		<input type="submit" />
	
	</form>

	<div id="find_category_alts_results" ></div>
</div>

<!-- the loading spinner gets placed in any partial that's waiting on ajax -->
<div id="load_spinner" style="display:none"><img src="<?=base_url()?>assets/img/loader.gif" id="loading_indicator"  /></div>


<script type="text/javascript">
	$('#find_category_alts').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#find_category_alts_results').html($('#load_spinner').html());
		
//alert('The Spinnie ... it works!');
		$.ajax(
		{
			url: '<?=base_url()?>thesaurus/get_category_alternate_names?'+values ,
			type: 'get',
			success:function(msg)
			{
//alert(msg);				
				$('#find_category_alts_results').html(msg).css('color', 'black');
			},
			error: function (msg) 
			{ 
//alert(msg.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#find_category_alts_results').html(error_div).css('color', 'red');
			}
		});
	});
</script>
