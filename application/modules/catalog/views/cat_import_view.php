<?php
	if(!isset($filename))
		$filename='';
?>
<div class="container-fluid" >
	<?= $upload_form_partial; ?>

	<div class="row-fluid well" id="results_container">
	</div>
</div> <!--end .container -->

<!-- the loading spinner gets placed in any partial that's waiting on ajax -->
<div id="load_spinner" style="display:none"><img src="<?=base_url()?>assets/img/loader.gif" id="loading_indicator"  /></div>



<script>
	$('#uploadPanelForm').submit( function(event)
	{
		event.preventDefault();		
		var keep_checking = true;		
		var logid = get_logid();
		$('#logid').val(logid);
		
		var values = $(this).serialize();	
				

		$('#results_container').html($('#load_spinner').html());		
		$('#status_update').html();
		
		
var fd = new FormData($(this)[0]);    



if($('#vendor_id_dropdown').val() < 0 )
{
	$('#results_container').html('Please select a vendor from the dropdown').css('color', 'red');
}
else
{//start die

	$.ajax({
		url: "<?=base_url().'catalog/catalog_imports' ?>",
		data: fd,
		async: true,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function(msg)
		{
			  $('#results_container').html(msg).css('color', 'black');
			 
			keep_checking = false;
//			clearInterval(the_timer);
//		 alert('finished!\n\nkeep_checking: '+keep_checking);
		 //    alert(msg);
		  },
		error: function (msg) 
		{
			keep_checking=false; 
			var the_error = msg.responseText;
			var start = the_error.indexOf("<div");
			var end = the_error.indexOf("</div>") + 7;
			var error_div = the_error.substring(start, end);

			$('#results_container').html(error_div).css('color', 'red');
//			clearInterval(the_timer);
//			alert('finished, but poorly');
		}
	});
	
//check for import updates	
	var the_time = 1;
	var interval = 2000;
	
		var the_timer = setInterval(
			function()
			{

				if(!keep_checking) 
					clearInterval(the_timer);
												$.ajax({
													url: "<?=base_url().'catalog/catalog_imports/log_get_status/' ?>"+logid,
													async: true,
													type: 'GET',
													success: function(msg)
													{
														  $('#status_update').html(msg).css('color', 'black');
													//	keep_checking = false;
													},
													error: function (msg) 
													{
													//	keep_checking=false; 
														var the_error = msg.responseText;
														var start = the_error.indexOf("<div");
														var end = the_error.indexOf("</div>") + 7;
														var error_div = the_error.substring(start, end);

														$('#status_update').html(error_div).css('color', 'red');
													}
												});
						$("#timer_container").html(the_time+" seconds");
					
				the_time+=2;
			},
			interval //2000
		);//end setInterval()

	
}//end die
	});	//end form.submit()


function get_logid()
{
/*alert("got to get_logid()");*/


	var the_logid = "XXXX";
	$.ajax(
		{
			url: '<?=base_url()?>catalog/catalog_imports/log_start' ,
			async: false,
			type: 'get',
			success:function(msg)
			{
				the_logid = msg;
				//$('#status_update').html('logid == '+msg);
			}, 
			error: function (msg) 
			{ 
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#status_update').html(error_div).css('color', 'red');
			}
		});
	return the_logid;
}



</script>







