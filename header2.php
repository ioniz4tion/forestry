	<body class="cbp-spmenu-push">

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