$(document).ready(function()
{

	//~ alert('cat_import.js is loaded');
	$('#vendor_id_dropdown').change(function()
	{
		 //~ alert('vendor dropdown value: '+$('#vendor_id_dropdown').val());
		
		$.ajax(
		{
			type: "GET",
			url: "xml_catalog_imports/vendor_files_dropdown/"+$('#vendor_id_dropdown').val(),
			
			//~ data: values,
			success: function(result)
			{
				//~ alert("success: "+result);
				$('#files_dd_container').html(result);
				//~ $("#result").html('submitted successfully');
			},
			error:function()
			{
				alert("failure: "+result);
				//~ $("#result").html('there is error while submit');
			}   
		}); 
		
		
		
	});

})
