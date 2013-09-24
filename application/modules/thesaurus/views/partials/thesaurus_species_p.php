<div class="well">
	<h2>Species Thesaurus</h2>
	<h3><?=base_url('/thesaurus/get_species_canonical/searchterm')?></h3>
	<h4>Enter a species name to find its canonical name</h4>
	
	<form action="" id="species_canonical_form" method="get">
		Your search term:<br/>
		<input type="text" name="search_string" id="species_search_string"/>
		<button class="btn" id="species_submit" >Find canonical name</button>
		
	</form>
	
	<div class="thesaurus_results well" id="species_results">
		
	</div>
	
	
	
</div>




<script>
	$('#species_submit').on('click', function(event)
	{
		event.preventDefault();
		$.ajax
		({
			type: "GET",
			url: "<?=base_url()?>thesaurus/get_species_canonical/"+$('#species_search_string').val(),
			success: function(msg)
			{
				$('#species_results').empty();
				$('#species_results').html(msg);
			}   
		});	
	});
</script>
