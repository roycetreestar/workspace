/**
 * cytometers.js
 * 
 * functionality for 
 *	user_instruments_view.php
 *	core_cytometers_p.php
 *	cytometer_display_p.php
 *	my_instruments_p.php
 *	upload_cytometer_p.php
 * 
 */

$(document).ready(function()
{

	
//	FIRST, HIDE EVERYTHING BUT MY_INSTRUMENTS	//	
	$('.laserConfigDiv').show(); //hide();
	$('.coreContainer').show(); //hide();
	$('#upload_div').show(); //hide();

	
// OPEN LASER DETAILS DIV WHEN 'SLIDE OPEN' BUTTON IS CLICKED	//
	$("[id^='slide_laser_']").on('click', function()
	{
		var ID = $(this).attr("id");
		var id = ID.substr(ID.lastIndexOf('_')+1);
		
		if($('#laser_details_'+id).is(':visible'))
		{
			$('#laser_details_'+id).hide("slide", { direction: "left" }, 500);
		}
		else
		{
			$('#laser_details_'+id).show("slide", { direction: "left" }, 500);
		}
	});
	
	
// OPEN LASER DETAILS IN THE MODAL WHEN 'OPEN-IN-MODAL' BUTTON IS CLICKED	//
	$("[id^='modal_laser_']").on('click', function()
	{
		var ID = $(this).attr("id");
		var id = ID.substr(ID.lastIndexOf('_')+1);
				
		$('#modal-header h3').html('Laser Details');
		$('.modal-body p').html( $('#laser_details_'+id).html() );
		$('#laserModal').modal('show');
	});
	
////////////////////////////////////////////////////////////////////////////////	
	//	LISTENERS FOR NAV BUTTONS	//	
////////////////////////////////////////////////////////////////////////////////

	// OPEN CORE CYTOMETERS DIV WHEN CORE-NAME  BUTTON IS CLICKED	//
	$("[id^='trigger']").on('click', function()
	{
		$('.coreContainer').slideUp();
		$('#my_instruments_div').slideUp();
		$('#upload_div').slideUp();
		
		var ID = $(this).attr("id");
		var id = ID.substr(ID.lastIndexOf('_')+1);
		
		$('#coreContainer_'+id).slideToggle();
	});


	//	OPEN THE MY_INSTRUMENTS DIV	//
	$('#my_instruments_btn').on('click', function()
	{
		$('.coreContainer').slideUp();
		$('#upload_div').slideUp();
		$('#my_instruments_div').show();
	});
	
	
	//	OPEN THE 	UPLOAD-A-PANEL DIV	//	
	$('#upload_btn').on('click', function()
	{
		$('.coreContainer').slideUp();
		$('#my_instruments_div').slideUp();
		$('#upload_div').slideDown();
	});
	
//	END OF LISTENERS FOR NAV BUTTONS	//	
	
	

	
	
	
	
});// end $(document).ready()
