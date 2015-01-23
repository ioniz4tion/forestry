$(document).ready(function() {

	$(".loading").fadeIn(0300);

});

$(window).load(function(){

	$(".loading").delay(0300).fadeOut(0300);
	$("#page-wrap").delay(0300).fadeIn(0300);

});