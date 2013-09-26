<div class="row-fluid">
	<?=$search_partial?>
</div>


<div class="row-fluid">
	<?=$search_results?>
</div>





<script>

	$('#search_form').submit( function(event)
	{
		event.preventDefault();				
		var values = $(this).serialize();	
		
		$('#search_results').html('');
/*
alert('about to send search query');
*/
		$.ajax(
		{
			url: "<?=base_url().'catalog/search/results?'?>"+values,
			type: 'post',
			data: values,
			success:function(msg)
			{
/*
alert('search came back SUCCESS\n msg:'+msg);
*/
/*				if(msg == 'success' || msg == 'successsuccess')
				{
					$('#search_results').html('');
*/
					$('#search_results').html(msg);
/*				}

				else
					$('#search_results').html(msg).css('color', 'red');
*/
			},
			error: function (msg) 
			{ 

/*
alert('search came back FAILURE');
*/
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#search_results').html(error_div).css('color', 'red');
			}
		});
	});

</script>
