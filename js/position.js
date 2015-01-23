$(document).ready(function() {
	$('button').click(function(event) {
		var scroll = document.body.scrollTop;
		localStorage.setItem('scroll',scroll);
		localStorage.setItem('check',1);
	});

	function check() {					
		var scroll = localStorage.getItem('scroll');
		var check = localStorage.getItem('check');
		if (check == 1) {
			window.scrollTo(0,scroll);
			localStorage.setItem('check',0);			
		}
		
	}

	check();
});