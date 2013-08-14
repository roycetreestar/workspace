/* ==========================================================
 * Fluorish v1.0
 * charts.js
 * 
 * http://www.fluorish.com
 * Copyright Fluorish 2013
 * 
 * Built exclusively for Fluorish by Royce Cano
 * ========================================================== */ 

function masonryGallery()
{
	var $container = $('.gallery ul');
	$container
		.imagesLoaded( function(){
			$container.masonry({
				gutterWidth: 14,
		    	itemSelector : 'li',
		    	columnWidth: $('.gallery li:first').width()
		  	});
		});
}
$(function()
{
	masonryGallery();

	$(window).resize(function(e){
		masonryGallery();
	});
});