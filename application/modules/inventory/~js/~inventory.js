$(document).ready(function()
{
	
////////////////////////////////////////////////////////////////////////////////
//	MODAL 'SAVE' BUTTON SUBMITS FORM IN MODAL

	$('#modal_submit_btn').on('click', function(e)
	{
//		alert('submit was clicked');
		e.preventDefault();
//		$('#inventory_modal_body > form').css("border", "3px red double");
//$('#inventory_modal').modal('hide');
//$('#inventory_modal_body').contents().appendTo( $('#offscreen-storage') );
		$('#inventory_modal_body').slideUp('slow', function()
		{
			$('#inventory_modal_body').contents().hide();
			$('#inventory_modal_body').append("LOADING...");
		});
		$('#inventory_modal_body').slideDown('slow');
//$('#inventory_modal').modal('show');

		$('#inventory_modal_body form').submit();
	});
//	
////////////////////////////////////////////////////////////////////////////////
	

////////////////////////////////////////////////////////////////////////////////
//	
	$('#contactUs').on('click', function()
	{
		alert('This button will take you to a "contact us" form');
	});

//	
////////////////////////////////////////////////////////////////////////////////
	
	
////////////////////////////////////////////////////////////////////////////////
//	EDIT-AN-INVENTORY-ITEM BUTTON

	$(document).on('click', '[id^="edit_btn_"]', function(ev)
	{
		var ID = $(this).attr("id");
		var itemID = ID.substr(ID.lastIndexOf('_')+1);
		
	// fill the 'add-manually' form with this item's data
		$('#target').val( $('#target_'+itemID).html());
//		alert('target '+itemID+' value:\n\n' + $('#target_'+itemID).html() );
		
		
		
		
		
//		alert('edit btn clicked');
		ev.preventDefault();
		$('#add_reagent_instructions_div').hide();
		$('.modal-header h3').html('Edit Inventory');

		$('#inventory_modal_body').contents().appendTo( $('#offscreen-storage') );
//	put edit_reagent_p in the modal body
		$('#inventory_modal_body').append( $('#add_manually') );

		$('.modal-footer').show();
		$('#inventory_modal').modal('show');
	});

//	
////////////////////////////////////////////////////////////////////////////////
 
////////////////////////////////////////////////////////////////////////////////
//	RESIZE THE MODAL TO FIT ITS CONTENT WHEN .modal('show') IS CALLED
	
//	$('#inventory_modal_body').on('show', function () 
//	{
////		var modalwidth = $('#inventory_modal').css('width')
////		var hoffset = '0 0 0 '+(modalwidth / 2);
//		$('#inventory_modal').css({width:'auto', height:'auto', 'max-width':'80%' ,'max-height':'100%'});
////		alert('width='+$('#inventory_modal').css('width')+'\n\nheight= '+$('#inventory_modal').css('height')	);
//	});
//	
////////////////////////////////////////////////////////////////////////////////
	
	
////////////////////////////////////////////////////////////////////////////////
//	WHEN 'ADD AN ITEM' BUTTON IS CLICKED, 
//	OPEN THE SINGLE_ITEM FORM STARTER IN THE MODAL


	$('[id^="add_single_item_"]').on('click', function()
	{
		$('#inventory_modal_body').contents().appendTo( $('#offscreen-storage') );
		$('#inventory_modal_body').append( $('#single-item_start') );
		$('#inventory_modal').modal('show');
	});
	
	
	
//	WHEN 'CONTINUE' IS CLICKED IN THE ADD-ITEM STARTER, REPLACE IT IN THE MODAL WITH THE ADD_MANUALLY FORM
	$(document).on('click', '#continue', function(ev)
	{
		ev.preventDefault();

		$('.modal-header h3').html('Add a Reagent');
		$('#add_reagent_instructions_div').show();


//	copy company name and catalog number from add_single_item_p into add_manually_partial form	//

		$('#company').val($('#start_company').val() );
		$('#cat_num').val( $('#start_catnum').val() );
		
		$('#inventory_modal_body').contents().appendTo( $('#offscreen-storage') );
//	put add_manually_partial in the modal body
		$('#inventory_modal_body').append( $('#add_manually') );
//	copy company name and catalog number from add_single_item_p into add_manually_partial form	//
		$('form #company').val($('#start_company').val() );
		$('form #cat_num').val( $('#start_catnum').val() );
		$('.modal-footer').show();



	});
//
////////////////////////////////////////////////////////////////////////////////


	
	
////////////////////////////////////////////////////////////////////////////////
//	OPEN THE EDIT COLUMNS FORM WHEN BUTTON IS CLICKED

	$('.edit_columns').on('click', function()
	{
		$('.modal-header h3').html('Choose Which Columns to View');
		$('#inventory_modal_body').contents().appendTo( $('#offscreen-storage') );
		$('#inventory_modal_body').append( $('#change_show_fields') );
		$('#inventory_modal').modal('show');
		
	});
//
////////////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////////////
//	OPEN THE IMPORT-A-SPREADSHEET FORM WHEN BUTTON IS CLICKED

	$(document).on('click', '[id^="upload_spreadsheet_"]', function(ev)
	{
		var ID = $(this).attr("id");
		var itemID = ID.substr(ID.lastIndexOf('_')+1);
		
		
		$('.modal-header h3').html('Import a Spreadsheet with your Inventory');
		$('#inventory_modal_body').contents().appendTo( $('#offscreen-storage') );
		$('#inventory_modal_body').append( $('#import_form_div') );
		
		$('#import_form_labid').val(itemID);
		
		$('.modal-footer').hide();
		$('#inventory_modal').modal('show');
		
	});
//
////////////////////////////////////////////////////////////////////////////////











});//end  $(document).ready()

