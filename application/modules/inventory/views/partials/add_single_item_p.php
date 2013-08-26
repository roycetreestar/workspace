<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<div class='well ui-widget' id="single-item_start">
	Company (Supplier):
	<input class="company_name_input" type="text" id="start_company" data-provide="typeahead" data-items="4" />
	<br/>
	Catalog Number: 
	<input type="text" id="start_catnum"/>
	Don't know
	<input type="checkbox" />
	
	<input type="hidden" name='labid' value='' />
	<br/>
	<a class="btn" > Not Supplied By a Company </a>
	
	<button class="btn" id="continue"  > CONTINUE </button>

	


<!--<label style="color:red;" for="company">Company (Supplier) {bootstrap typeahead}:</label>
<input id="vendor_box" style="color:red;" type="text" name="company" data-provide="typeahead" data-items="4"  />-->

	<script>
		var vendornames = [<?= $vendor_list ?>];
		$('.company_name_input').typeahead({source: vendornames});

//		$(document).on('change', '.company_name_input', function(ev)
//		{
//			$(this).typeahead({source: vendornames});
//		});


	</script>

</div>





	