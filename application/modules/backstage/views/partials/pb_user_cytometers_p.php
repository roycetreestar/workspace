<div >
	userCytometers()<br/>
	takes a single parameter :(int) userid<br/>
	returns a text string of XML for each cytometer config that user has access to<br/>
	<br/>
	userid:
	<input type="text" name="userid" id="userid" />
	<a class="btn" id="userCytometers_submit">get cytometer XML</a>
	<textarea id="cytometers_pre"></textarea>
</div>




<img src="<?=base_url()?>assets/img/loader.gif" id="loading_indicator" style="display:none;  left:50%; top:50%;" />









<script>

	$('#userCytometers_submit').click( function(event)
	{
/*
		event.preventDefault();				
*/
		var values = $('#userid').val(); //$(this).serialize();	
		
		$('#cytometers_pre').html('');
/* */
alert('about to send search query. values:'+values);

$('#loading_indicator').show();
		$.ajax(
		{
			url: "<?=base_url().'catalog/search/userCytometers?'?>"+values,
			type: 'get',
			//data: values,
			success:function(msg)
			{
/*
alert('search came back SUCCESS\n msg:'+msg);
*/
$('#loading_indicator').hide();
					$('#cytometers_pre').html(msg);

			},
			error: function (msg) 
			{ 

$('#loading_indicator').hide();
/*
alert('search came back FAILURE');
*/
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#cytometers_pre').html(error_div).css('color', 'red');
			}
		});
	});

</script>

