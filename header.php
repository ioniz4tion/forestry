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

	</head>

	<body class="cbp-spmenu-push">

		<!--<div class="loading">-->

			<!--<div class="preload-juggle">
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
  			</div>-->

  			<!--<div class="spinner"></div>-->

  			<!--<div class="loader">Loading</div>-->

  		<!--</div>-->

  		<!-- temporarily disbaled until we can fic the loading glitch with the service navigation -->
		<!--<div id="page-wrap">-->

			<!--<nav>

				<div class="max-width">

					<a href="index.php" id="logo">
						<img src="images/placeholder.png">
						<p>Rocky Mountain Forestry</p>
					</a>

					<div id="nav">

						<div id="nav-services">
							<p>Services</p>
							<ul>
								<li><a href="services.php">All Services</a></li>
								<li><a href="services.php#reforestation">Reforestation</a></li>
								<li><a href="services.php#taxes">Forest Tax Plans</a></li>
								<li><a href="services.php#harvest">Timber Harvest/Thinning &amp; Markings</a></li>
								<li><a href="services.php#management">Forest Management Plans</a></li>
								<li><a href="services.php#cruising">Timber Cruising/Appraisals</a></li>
								<li><a href="services.php#trespass">Timber Trespass</a></li>
								<li><a href="services.php#fire">Wildland Fire Protection</a></li>
								<li><a href="services.php#health">Forest Health Management</a></li>
								<li><a href="services.php#fish">Fish Passage</a></li>
								<li><a href="services.php#bridges">Bridges &amp; Culvert Design</a></li>
							</ul>
						</div>

						<div>
							<a href="market.php">Market Report</a>
						</div>

						<div id="nav-about">
							<p>About Us</p>
							<ul>
								<li><a href="">People</a></li>
								<li><a href="">History</a></li>
								<li><a href="">Education</a></li>
								<li><a href="">Experience</a></li>
								<li><a href="">Current Projects</a></li>
							</ul>
						</div>

						<div>
							<a href="contact.php">Contact</a>
						</div>

						<div>
							<a href="faq.php">FAQs</a>
						</div>

						<div>
							<a href="careers.php">Careers</a>
						</div>

						<div>
							<a href="downloads.php">Downloads</a>
						</div>

						<div>
							<a href="testimonials.php">Testimonials</a>
						</div>

						<div>
							<a href="login.php">Login</a>
						</div>

					</div>

				</div>

			</nav>-->

			<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">

				<h3>Rocky Mountain Forestry</h3>

				<a href="index.php">Home</a>

				<div class="dropdown">

					<p>Services<span class="arrow"></span></p>
					
					<?php if (basename($_SERVER["SCRIPT_FILENAME"]) == "services.php") { ?>

					<ul id="services-list">

						<li><a href="services.php" class="scroll">All Services</a></li>

						<?php for ($i=0; $i < $tablenav->rowNumber; $i++) { ?>
							
							<li><a href="services.php#<?= $tablenav->ID[$i] ?>" class="scroll"><?= $tablenav->service[$i] ?></a></li>
						

						<?php } ?>

					</ul>

					<?php } else { ?>

					<ul id="services-list">

						<li><a href="services.php" class="">All Services</a></li>

						<?php for ($i=0; $i < $tablenav->rowNumber; $i++) { ?>
							
							<li><a href="services.php#<?= $tablenav->ID[$i] ?>" class=""><?= $tablenav->service[$i] ?></a></li>
						

						<?php } ?>

					</ul>

					<?php } ?>



				</div>




				<a href="market.php">Market Report</a>

				<div class="dropdown">

					<p>About Us<span class="arrow"></span></p>

					<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="people.php">Employees</a></li>
					</ul>

				</div>				
				
				<a href="contact.php">Contact Us</a>

				<a href="faqs.php">FAQs</a>

				<div class="dropdown">

					<p>Careers<span class="arrow"></span></p>

					<ul>
						<li><a href="careers.php">Available Positions</a></li>
						<li><a href="application.php">Application Forms</a></li>
					</ul>

				</div>

				<a href="downloads.php">Downloads</a>

				<a href="testimonials.php">Testimonials</a>

				<?php if ($functions->login){?>
					<a href="logout.php">Logout</a>
				<?php }else {?>
					<a href="login.php">Login</a>
				<?php }?>

			</nav>

			<button id="showLeft" data-parent="nav">
				<!--<span class="glyphicon glyphicon-chevron-up"></span>-->
				<div class="lines" id="arrow"></div>
			</button>

			<header>

				<a href="index.php"><img src="images/Logo_BW2.gif"></a>

				<div>
					<p>Rocky Mountain Forestry</p>
				</div>

			</header>