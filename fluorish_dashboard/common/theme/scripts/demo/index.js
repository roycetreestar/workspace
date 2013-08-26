/* ==========================================================
 * Fluorish v1.0
 * index.js
 * 
 * http://www.fluorish.com
 * Copyright Fluorish 2013
 *
 * Built exclusively for Fluorish by Royce Cano
 * ========================================================== */ 

$(function()
{
	var n = notyfy({
		text: '<h4>Welcome to Fluorish</h4> <p>Would you like to take a tour?</p>',
		type: 'primary',
		layout: 'bottomLeft',
		closeWith: ['click']
	});
	
	// initialize charts
	if (typeof charts != 'undefined') 
		charts.initIndex();
});