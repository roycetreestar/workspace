<div class="well">
	
	<h2>Product Category Thesaurus</h2>
	<h3><?=base_url('/thesaurus/get_category_canonical/searchterm')?> </h3>
	<h4>Enter a category name to find its canonical name</h4>
	
	<form action="" id="category_canonical_form" method="get">
		Your search term:<br/>
		<input type="text" name="search_string" id="category_search_string"/>
		<button class="btn" id="category_submit" >Find canonical name</button>		
	</form>
	
	<div class="thesaurus_results well" id="category_results">		
	</div>
	
	
	
</div>




<script>
	$('#category_submit').on('click', function(event)
	{
		event.preventDefault();
		$.ajax
		({
			type: "GET",
			url: "<?=base_url()?>thesaurus/get_category_canonical/"+$('#category_search_string').val(),
			success: function(msg)
			{
				$('#category_results').empty();
				$('#category_results').html(msg);
			}   
		});			
	});
</script>
