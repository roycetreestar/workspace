<div class="well">
	<h2>Catalog Header Thesaurus</h2>
	<h3><?=base_url('/thesaurus/get_catalog_header_canonical/searchterm')?> </h3>
	<h4>enter a catalog/inventory column name to find its canonical name</h4>

	<form action="" id="catalog_canonical_form" method="get">
		Your search term:<br/>
		<input type="text" name="search_string" id="catalog_header_search_string"/>
		<button class="btn" id="catalog_header_submit" >find catalog header canonical name</button>
	</form>
	
	<div class="thesaurus_results well" id="catalog_header_results">
	</div>
</div>

<!-- the loading spinner gets placed in any partial that's waiting on ajax -->
<div id="load_spinner" style="display:none"><img src="<?=base_url()?>assets/img/loader.gif" id="loading_indicator"  /></div>




<script>
	$('#catalog_header_submit').on('click', function(event)
	{
		event.preventDefault();
		$.ajax
		({
			type: "GET",
			url: "<?=base_url()?>thesaurus/get_catalog_header_canonical/"+$('#catalog_header_search_string').val(),
			success: function(msg)
			{
				$('#catalog_header_results').empty();
				$('#catalog_header_results').html(msg);
			}   
		});	
	});
</script>
