<?php
	namespace WebDesign;

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	if(!isset($functions)) {
		require_once "WebDesign/Functions.class.php";
		$functions = New Functions();
	}

	$tablenav = New Database("tb_services");

?>

Rocky Mountain Forestry</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="icon" type="image/png" href="images/favicon.gif">
		
		<style>
			#slides {
				display: none;
			}
		</style>
		
		

		<!-- temporarily disbaled until we can fic the loading glitch with the service navigation -->
		<!--<link rel="stylesheet" type="text/css" href="css/load.css">-->
		<!--<link rel="stylesheet" type="text/css" href="css/styles2.css">-->
		<link rel="stylesheet" type="text/css" id="styles" href="css/base.css">
		<link rel="stylesheet" type="text/css" id="styles1" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/test.css">
		<link rel="stylesheet" type="text/css" href="css/temporary.css">
		<link rel="stylesheet" type="text/css" href="fonts/fonts.css">
		<link rel="stylesheet" type="text/css" href="css/glyphs.css">
		<!--<link rel="stylesheet" type="text/css" href="css/nav.css">
		<link rel="stylesheet" type="text/css" href="css/nav-side.css">-->
		<link href="css/jquery.bxslider.css" rel="stylesheet">

		<script src="js/jquery-2.1.1.js"></script>
		<!-- temporarily disbaled until we can fic the loading glitch with the service navigation -->
		<!--<script src="js/load.js"></script>-->
		<script src="js/modernizr.custom.js"></script>

		<script>
			
			window.onload = (function() {	

				// look for a mobile user agent
				var uA = {

					Android: function() {
						return navigator.userAgent.match(/Android/i);
					},

					BlackBerry: function() {
						return navigator.userAgent.match(/BlackBerry/i);
					},

					iOS: function() {
						return navigator.userAgent.match(/iPhone|iPad|iPod/i);
					},

					Opera: function() {
						return navigator.userAgent.match(/Opera Mini/i);
					},

					Windows: function() {
						return navigator.userAgent.match(/IEMobile/i);
					},

					any: function() {
						return (uA.Android() || uA.BlackBerry() || uA.iOS() || uA.Opera() || uA.Windows());
					}

				};

				if (uA.any()) {
					document.getElementById('styles1').href = 'css/mobile.css';					
				};

			});
			
		</script>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-58903130-1', 'auto');
		  ga('send', 'pageview');

		</script>