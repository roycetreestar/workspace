/** 
 * Javascript for the panels module
 */

//for debugging js paths
	$(document).ready( function()
	{
	$('.channelContainer').hide();
	$('[id^=expand]').html('Expand');
	

//~ alert('loaded');

	$('.thingy').on('click', function(event)
	{

		var ID = $(this).attr("id");
		var id = ID.substr(ID.lastIndexOf('_')+1);

		//~ alert('a thingy called "'+ $(this).html() +'" was clicked');

		switch($(this).html())
		{
			case 'Expand':
				$('#channelContainer_'+id).slideDown();
				$(this).html('Collapse'); 					//attr('display', 'block'); 
				//~ alert('"expand" was clicked');
				break;
			case 'Collapse':
				//~ alert('"collapse" was clicked');
				//~ $('#channelContainer_'+id).attr('display', 'none'); 
				$('#channelContainer_'+id).slideUp();
				$(this).html('Expand'); 
				break;
			case 'download':
				alert('"download" was clicked');
				break;
			case 'delete':
				//~ alert('"delete" was clicked');
			// center the upload div
				//~ $('#tempModal').css('left', '25%');
				
				if(confirm("This will permanently delete this panel from your account. Are you sure you want to do this?"))
				{
					$('#tempModalContent').html("deleting panel "+id+" from your account. please wait.");

					//load the delete function
					$.ajax({
						url:"panels/delete_panel/"+id,
						success:function(result){
						// center the upload div
							$('#tempModal').css('left', '25%');
							//~ alert('result: '+result);
							$("#tempModalContent").html(result);
						}
					}); 
				}
				//~ else //close the 'modal'
					//~ $('#tempModal').css('left', '-200%');
				break;
			case 'add pubmed id':
				alert('"add pubmed id" was clicked');
				break;
			case 'add omip':
				alert('"add omip" was clicked');
				break;
		}
	});
/* */		//end thingy

/* open the 'upload a panel' div */
	$('#toggleModal').on('click', function()
	{
		// center the upload div
		$('#tempModal').css('left', '25%');

		//load the upload form
		$.ajax({
			url:"panels/upload_panel",
			success:function(result){
				//~ alert('opening upload_panel');
				$("#tempModalContent").html(result);
			}
		}); 
	});


/* hide the 'upload a panel' div */
	$('#hide_tempModal').on('click', function()
	{
		$('#tempModal').css('left', '-200%');
	});



/* submit the 'upload a panel' form when button is clicked */
/*	$('#uploadPanelForm').submit(function(e)
	//~ $('#submit-upload').on('click',function()
	{	e.preventDefault();
		alert('about to call upload_panel/do_upload()');
		//~ $.ajax({
			//~ type:'post',										//$(this).attr('method'),
			//~ url:'do_upload/',				//$(this).attr('submit-location'),
			//~ data: $('#uploadPanelForm').serialize(),
			//~ 
			//~ success:function(result){
				//~ alert('value returned from do_upload(): '+result);
				//~ $("#tempModalContent").html(result);
			//~ }
			//~ 
		//~ }); 
	});

*/




























});//end document.ready()



