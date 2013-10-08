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
		var values = $(this).serialize();	
		
/*
		$('#results_container').html('');
*/
		$('#results_container').html($('#load_spinner').html());
		
		
var fd = new FormData($(this)[0]);    
/*
fd.append( 'file', $('#file').files[0] );
alert('vendor dropdown has value: '+$('#vendor_id_dropdown').val() );
*/
if($('#vendor_id_dropdown').val() < 0 )
{
	$('#results_container').html('Please select a vendor from the dropdown').css('color', 'red');
}
else
{//start die
$.ajax({
  url: "<?=base_url().'catalog/catalog_imports' ?>",
  data: fd,
  async: false,
  cache: false,
  processData: false,
  contentType: false,
  type: 'POST',
  success: function(msg){
	  $('#results_container').html(msg).css('color', 'black');
//    alert(msg);
  },
			error: function (msg) 
			{ 
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#results_container').html(error_div).css('color', 'red');
			}
});

}//end die
	});	//end form.submit()

</script>
