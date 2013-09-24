<div class="well">
	
	<h2>Fluorochrome Thesaurus</h2>
	<h3><?=base_url('/thesaurus/get_chrome_canonical/searchterm')?> </h3>
	<h4>Enter a fluorochrome name to find its canonical name</h4>
	
	<form action="" id="chrome_canonical_form" method="get">
		Your search term:<br/>
		<input type="text" name="search_string" id="chrome_search_string"/>
		<button class="btn" id="chrome_submit" >Find canonical name</button>		
	</form>
	
	<div class="thesaurus_results well" id="chrome_results">		
	</div>
	
	
	
</div>




<script>
	$('#chrome_submit').on('click', function(event)
	{
		event.preventDefault();
		$.ajax
		({
			type: "GET",
			url: "<?=base_url()?>thesaurus/get_chrome_canonical/"+$('#chrome_search_string').val(),
			success: function(msg)
			{
				$('#chrome_results').empty();
				$('#chrome_results').html(msg);
			}   
		});			
	});
</script>
