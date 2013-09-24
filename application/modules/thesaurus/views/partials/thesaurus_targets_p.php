<div class="well">
	<h2>Targets Thesaurus</h2>
	<h4> <?=base_url('/thesaurus/get_target_canonical/searchterm')?></h4>
	<h3>Enter a target name to find its canonical name</h3>
	
	<form action="" id="targets_canonical_form" method="get">
		Your search term:<br/>
		<input type="text" name="search_string" id="target_search_string"/>
		<button class="btn" id="target_submit" >Find canonical name</button>		
	</form>
	
	<div class="thesaurus_results well" id="target_results">		
	</div>	
</div>




<script>
	$('#target_submit').on('click', function(event)
	{
		event.preventDefault();
		$.ajax
		({
			type: "GET",
			url: "<?=base_url()?>thesaurus/get_target_canonical/"+$('#target_search_string').val(),
			success: function(msg)
			{
				$('#target_results').empty();
				$('#target_results').html(msg);
			}   
		});	
	});
</script>
