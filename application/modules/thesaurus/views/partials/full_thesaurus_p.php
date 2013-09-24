<div class="well">
	
	<h2>Full Thesaurus</h2>
	<h4>searches catalog_headers, targets, chromes, and species</h4>
	<h4>enter a search term to find its canonical name</h4>
	<h3><?=base_url('/thesaurus/get_full_canonical/searchterm')?> </h3>
	
	<form action="" id="full_canonical_form" method="get">
		Your search term:<br/>
		<input type="text" name="search_string" id="full_search_string"/>
		<button class="btn" id="full_submit" >give it a try</button>
	</form>
	
	<div class="thesaurus_results well" id="full_results">
	</div>
</div>


<script>
	$('#full_submit').on('click', function(event)
	{
		event.preventDefault();
		$.ajax
		({
			type: "GET",
			url: "<?=base_url()?>thesaurus/get_full_canonical/" + $('#full_search_string').val(),
			success: function(msg)
			{
				$('#full_results').empty();
				$('#full_results').html(msg);
			}   
		});
	});
</script>
