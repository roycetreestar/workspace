/* ==========================================================
 * Fluorish v1.0
 * fluorish.js
 * 
 * http://www.fluorish.com
 * Copyright Fluorish 2013
 *
 * Built exclusively for Fluorish by Royce Cano
 * ========================================================== */ 


$(function()
{
	
	// institutions array
	$("#institutions").select2({tags:["UC Davis Lab", "UCSF Cancer Lab", "Berkley Aids Labratory", "USC", "Ostrat Lab", "UCSF Flow Core"]});
	
	// institutions autocomplete select
	$('.institutions').typeahead({source:["Tree Star","Fluorish","UCSF","Berkley"],items:[6]})
		
});