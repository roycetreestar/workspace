

/**
 * 
 */
function addDetector(laserID) 
{

	//~ var detectorCount = $('.detectorDetails' + laserID ).length; 
	var detectorCount = $('#lightSource' + laserID+' [id^=detectorDetails]' ).length; 
	var detectorID = String(laserID + String(detectorCount + 1));
	
//~ alert('adding detector to laser '+laserID+'\ndetectorCount: '+detectorCount);		
	
	$('#detectorContainer'+laserID).append(
		'<div class="detectorDetails" style="padding:3px 0 3px 0 ;" id="detectorDetails'+detectorID+'">'
			+'Detection Range: '
			+'<input class="lowerRange" id="lowerRange'+detectorID+'" maxlength="3"  size="3" >'
			+'-'
			+'<input class="upperRange" id="upperRange'+detectorID+'"  maxlength="3" size="3" style="width:3;" >'
			+'<button type="button" class="btnDetectDelete" id="btnDetectDelete" name="btnDetectDelete" >'
				+'Remove Channel'
			+'</button>'
			+'<input type="hidden" id="detectorBandwidth'+detectorID+'" name="lightSource['+laserID+'][detector]['+detectorCount+'][bandwidth]"/>'
			+'<br/>'
			+'<input type="hidden" id="detectorWavelength'+detectorID+'" name="lightSource['+laserID+'][detector]['+detectorCount+'][wavelength]" />'
		+'</div>'
	);
	
	
}
////////////////////////////////////////////////////////////////////////
/**
 * 
 */
function deleteDetector(detectorID, laserID) 
{
	
	$('#detectorDetails'+detectorID).remove();								
}
////////////////////////////////////////////////////////////////////////

/**
 * 
 */
function calcWaveAndBand (upperRangeVal, detectorID)
{
	var getLowRange = $('#lowerRange'+detectorID).val();
	var upperRange = $.trim(upperRangeVal); 
	if(upperRange === 'LP' )
	{
		upperRange=820;
	}
	var upperRangeFinal = parseInt(upperRange);
	var lowRangeVal =  parseInt(getLowRange);
	var newBandwidth = Number(upperRange - lowRangeVal); 
	var newWavelength = lowRangeVal + (.5*newBandwidth);
	$('#detectorWavelength'+detectorID).val(newWavelength); 
	$('#detectorBandwidth'+detectorID).val(newBandwidth);
}



////////////////////////////////////////////////////////////////////////
	
	function calcBandwidth($upperrange, $lowerrange)
	{
		$bandwidth = $upperrange - $lowerrange;
		return $bandwidth; 
	}
////////////////////////////////////////////////////////////////////////
	function calcWavelength($upperrange, $lowerrange)
	{
		$bandwidth = $upperrange - $lowerrange;
		$wavelength = $lowerrange + (.5*$bandwidth);
		return $wavelength; 
	}

////////////////////////////////////////////////////////////////////////
function instruments_form(id) {
//	var cytometerid = $("#cytometerid").val();
//	alert("cytometerid = "+cytometerid);
    var url = window.location.href;
    var path = url.substring(0, url.lastIndexOf("/")+1);
	$.ajax({
		type: "POST",
		url: path+"instruments_ajax.php",
		data: "id="+id,
		async: false,
		success: function(data) {
			if(data.length > 0) {
//				alert(data);
				$("#configContainer").html(data);
				$("#configContainer").addClass("configContainer");
				$(".configureation-builder").slideDown();
				$("#model").chained("#manufacturer");	
			}
		}
	}); 
}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////



/**
 * 
 */

//function instruments_form(id) {
////	var cytometerid = $("#cytometerid").val();
////	alert("cytometerid = "+cytometerid);
//	$.ajax({
//		type: "POST",
//		url: "instruments_ajax.php",
//		data: "id="+id,
//		async: false,
//		success: function(data) {
//			if(data.length > 0) {
////				alert(data);
//				$("#configContainer").html(data);
//				$("#configContainer").addClass("configContainer");
//				$(".configureation-builder").slideDown();
//				$("#model").chained("#manufacturer");	
//			}
//		}
//	}); 
//}

/** 
 * the onready function
 * (all the dynamic javascript that needs to run after the page is loaded)
 */
$(document).ready(function()
{
	
//debug:
alert('cytometer_config.js loaded');	
/*		
 * shows the div for DIVA instructions
 */
 			$("#showDivaInstructions").click(function()
			{
				if($("#divaInstuctionsContainer").is(":visible") === false)
				{
					$("#divaInstuctionsContainer").slideDown(); 
					$("#showDivaInstructions strong").text("Hide Uploader"); 

				}
				else
				{
					$("#divaInstuctionsContainer").slideUp(); 
					$("#showDivaInstructions strong").text("Show Uploader");

				} 
			});
/*		
 * ajax panel details from database for specific panel id
 */
 			$(".showPanel").click( function()
			{	
				var id = $(this).attr("id");
				var str = $("#showPanel"+id).html();
				if(str === "")
				{
					$.ajax(
					{
						type: "GET",
						url: "displayPanel.php?panelIDs="+id,
						success: function(msg)
						{
							$("#showPanel"+id).slideDown('slow'); 
							$("#showPanel"+id).html(msg);
						}   
					});	
				}
				else {
					$("#showPanel"+id).slideDown('slow');
				}

		  });
			
//			$("#model").chained("#manufacturer");	
	
/*		
 * 
 */
			$(".collapse-cytometer").click( function(event)
			{
				 var id = $(this).attr("id");
				 $(".cytometer-container").fadeTo("slow", 1.0);
				 $("#cytometer-controls"+id).hide();
				 $("#show-cytometer"+id).slideUp(); 
				 $(".cytometer-container").css('cursor','pointer');
				 $(".configureation-builder").slideUp();
				 event.stopImmediatePropagation();
			});
			
/*		
 * ajax panel details from database for specific panel id
 */
 			$(".cytometer-container").click( function(event)
			{	
				var ID = $(this).attr("id");
				var curID = ID.substr(ID.lastIndexOf('-')+1);
				str = $("#show-cytometer"+curID).html();
				if (str === "")
				{
					$.ajax(
					{
						   type: "GET",
						   url: "displayPanel.php?cytometerIDs="+curID,
						   success: function(msg)
						   {
							   $("#cytometer-controls"+curID).show();
							   $("#show-cytometer"+curID).slideDown(); 
							   $("#show-cytometer"+curID).html(msg);
							   $("#"+ID).fadeTo("slow", 1.0);
							   $(".cytometer-container:not(#"+ID+")").fadeTo("slow", 0.30);
							   $(".show-cytometer:not(#show-cytometer"+curID+")").slideUp();
							   $(".cytometer-controls:not(#cytometer-controls"+curID+")").hide();
							   $(".cytometer-container:not(#"+ID+")").css('cursor','pointer');
							   $("#"+ID).css('background-color','');
							   $("#"+ID).css('cursor','default');
						   }   
					});	
				}
				else 
				{
					 $("#"+ID).fadeTo("slow", 1.0);
					 $(".cytometer-container:not(#"+ID+")").fadeTo("slow", 0.30);
					 $(".show-cytometer:not(#show-cytometer"+curID+")").slideUp();
					 $(".cytometer-controls:not(#cytometer-controls"+curID+")").hide();
					 $(".cytometer-container:not(#"+ID+")").css('cursor','pointer');
					 $("#show-cytometer"+curID).slideDown('slow');
					 $("#cytometer-controls"+curID).show();
					 $("#"+ID).css('background-color','');
				     $("#"+ID).css('cursor','default');
				}
		    });
/*		
 * 
 */			
			$(".cytometer-container").mouseenter(function()
			{
				var ID = $(this).attr("id");
				var curID = ID.substr(ID.lastIndexOf('-')+1);
				if($("#cytometer-controls"+curID).css("display") === "none")
				{
					 $("#cytometer-container-"+curID).css('background-color','rgba(200, 200, 200, 0.4)');
					 $("#cytometer-container-"+curID).css('cursor','pointer');
				}
			});	
/*		
 * 
 */				
			$(".cytometer-container").mouseleave(function() 
			{
				var ID = $(this).attr("id");
				var curID = ID.substr(ID.lastIndexOf('-')+1);
				$("#cytometer-container-"+curID).css('background-color','');
				$("#cytometer-container-"+curID).css('cursor','default');
			});	
		
/*		
 * shows or hides instrument configuration instructions
 */
 			$("#configInstructions").click( function()
			{
				if($(this).html() === 'Show Instructions')
				{
					$("#configureInstructionsContainer").slideDown(); 
					$(this).html('Hide Instructions'); 
				}
				else
				{
					$("#configureInstructionsContainer").slideUp(); 
					$(this).html('Show Instructions'); 
				}
			});
/*		
 * 
 */			
			$("#show-config-builder").click( function()
			{
				if($(".configureation-builder").is(":visible") === false)
				{
					$(".configureation-builder").slideDown(); 
					$('#show-config-builder strong').text('Hide Configuration Builder'); 
				}
				else
				{
					$(".configureation-builder").slideUp(); 
					$('#show-config-builder strong').text('Show Configuration Builder'); 
				}
			});
	
/*		
 * adds a new laser element to instrument configuration form
 */
 			$('#btnAddLaser').click( function() {
				var laserNum = $('.lightSource').length;	// how many "duplicatable" input fields we currently have
				var laserID = new String(Number(laserNum + 1));		// the numeric ID of the new input field being added
				$('#laserContainer').append(
					' <div id="lightSource'+laserID+'" style="background:#FFFFFF;" class="lightSource">'
						+'Laser Type:<input class="laserType required" name="lightSource['+laserID+'][type]" id="laser'+laserID+'"> '
						+' Wavelength:<input class="wavelengthy required" id="wavelength'+laserID+'"  name="lightSource['+laserID+'][wavelength]" maxlength="3"  size="3">'
						+'<br/>'
						+'<strong>Channels/Detectors:</strong> '
						+'<div id="detectorContainer'+laserID+'" class="detectorContainer"> '
							+'<div class="detectorDetails'+laserID+'" id="detectorDetails'+laserID+'">'
							+'</div>'
						+'</div>'
						+'<button type="button" class="btnDetectAdd" id="btnDetectAdd" name="btnDetectAdd"  >Add Channel</button> '
					+'</div>'
				); //TODO separate this into javascript and html

				// if laserNum is now 5 (or more), disable add-laser button
				if (laserNum >= 4)// was: //(newNum == 10)
				{	
					$('#btnAddLaser').prop('disabled', true);	//attr('disabled','disabled');
					$('#btnAddLaser').attr("class", "buttonBlue");
				}
				//if lasernum is now < 5, allow another laser
				if (laserNum < 4)	//new
				{	
					$('#btnAddLaser').prop('disabled', false);	//attr('disabled','');
					$('#btnAddLaser').attr("class", "button");
				}
				// if laser number is now >1, allow a laser to be deleted
				if(laserNum > 0)
				{	
					$('#btnDelLaser').prop('disabled', false);
					$('#btnDelLaser').attr("class", "button");
				}
				
			});
			
/* removes the newest (highest id number) lightsource element from configuration form 	*/
			$('#btnDelLaser').click( function() {
				var num	= $('.lightSource').length;	// how many "duplicatable" input fields we currently have
				$('#lightSource' + num).remove();		// remove the last element

				// if laser number is now 1, disable the "remove" button
				if (num === 1)
				{	
					$('#btnDelLaser').prop('disabled', true);	//attr('disabled','disabled');
					$('#btnDelLaser').attr("class", "buttonBlue");
				}
				// if laser number is now > 1, allow deleting another
				if(num>2) 
				{	
					$('#btnDelLaser').prop('disabled', false);	//attr('disabled','');	//new
					$('#btnDelLaser').attr("class", "button");
				}
				//if laser number is now < 5, allow another laser to be created
				if(num <6)
				{	
					$('#btnAddLaser').prop('disabled', false);
					$('#btnAddLaser').attr("class", "button");
				}
				
			});

/*		
 * handles the "upload a configuration" button
 */
			$("#buttonUpload").click( function(){
						if($(this).html() !== "Cancel"){
							$("#showPanelUpload").slideDown();
							$("#buttonUpload").html("Cancel");
						}
						else{
							$("#showPanelUpload").slideUp(); 
							$("#buttonUpload").html("Upload a Panel"); 
						}
						 
					});	
/*		
 * handles the "edit this cytometer config" button
 */
			$(".edit-cytometer").click( function(){
						var id = $(this).attr('id'); 
						inputs = $('#show-cytometer'+id).find('input').attr('disabled', false);
						$('#select-core').show();
						$(this).attr('class', 'save-cytometer');
						$('#show-cytometer'+id).add('<form>'); 
						$(this).html('Save configuration');
					}); 
			$(".save-cytometer").click( function(){
				var id = $(this).attr('id'); 
				$('#save-edited'+id).submit(); 
			}); 

/*	
 * calculates a detector's bandwidth and wavelength when .upperRange loses focus
 * @todo combine this functionality with the .lowerRange listener (below)
 */			
			$(document).on("blur", ".upperRange", function()
			{
				var id = $(this).attr("id"); 
				var val = $(this).val(); 
				var num = id.substring(10); 
				
				var getLowRange = $('#lowerRange'+num).val();
				var upperRange = $.trim(val); 
				if(upperRange === 'LP' )
				{
					upperRange=820;
				}
				var upperRangeFinal = parseInt(upperRange);
				var lowRangeVal =  parseInt(getLowRange);
				var newBandwidth = Number(upperRange - lowRangeVal); 
				var newWavelength = lowRangeVal + (.5*newBandwidth);
				$('#detectorWavelength'+num).val(newWavelength); 
				$('#detectorBandwidth'+num).val(newBandwidth);
		    });
			
/*	
 * calculates a detector's bandwidth and wavelength when .lowerRange loses focus 
 * @todo combine this functionality with the .upperRange listener (above)
 */
			$(document).on("blur", ".lowerRange", function()
			{
				var id = $(this).attr("id"); 
				var val = $(this).val(); 
				var num = id.substring(10); 
				
				var getLowRange = val;
				var upperRange = $('#upperRange'+num).val();
				var upperRange = $.trim(upperRange); 
				if(upperRange === 'LP' )
				{
					upperRange=820;
				}
				var upperRangeFinal = parseInt(upperRange);
				var lowRangeVal =  parseInt(getLowRange);
				var newBandwidth = Number(upperRange - lowRangeVal); 
				var newWavelength = lowRangeVal + (.5*newBandwidth);
				$('#detectorWavelength'+num).val(newWavelength); 
				$('#detectorBandwidth'+num).val(newBandwidth);
		    });
	  
		    
/* 
 * adds a detector sub-widget when "add channel" button is clicked 
 */
			$(document).on("click", ".btnDetectAdd", function()
			{
//~ //debug:
//~ alert('adding a detector to '+$(this).parent().attr("id"));
//~ //end debug			
				var laserID = $(this).parent().attr("id");
				laserID = laserID.replace('lightSource', '');			//strip the laserID down to its number
				//~ alert('.btnDetectAdd was clicked. adding detector to laser '+laserID);
				addDetector(laserID);
				
			});
				 	
/* 
 * deletes a  detector when "Remove Channel" button is clicked 
 */					
			$(document).on("click", ".btnDetectDelete", function()
			{
				var parentID = $(this).parent().attr("id");
				laserID = parentID.replace('detectorDetails', '');		//strip the detector id down to its number
				
				var detectorCount = $('.detectorDetails' + laserID ).length; 
				var detectorID = String(laserID + String(detectorCount));
				
				//alert('.btnDetectDelete was clicked. about to delete: '+parentID);
				
				//deleteDetector(detectorID, laserID);
				$('#'+parentID).remove();
			});
}); 


	
