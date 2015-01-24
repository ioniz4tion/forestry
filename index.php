<?php
	namespace WebDesign;

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	$functions = new Functions();

	$tableImages = New Database("tb_index_images");
	$tableStatic = New Database("tb_index_static");
	$tableBenefits = New Database("tb_index_benefits");

	if (isset($_POST["save"])) {		
		$tableStatic->save(array("text"));
		$tableBenefits->save(array("benefit","name"));
	}

	if (isset($_POST["add"])) {
		$tableBenefits->add();
	}

	for ($i=1; $i < $tableBenefits->rowNumber + 1; $i++) { 		
		if (isset($_POST["delete" . $i])) {
			$tableBenefits->delete($i);
		}
	}

?>

<!doctype html>

<html lang="en-US">

	<head>

		<title>

<?php require "header.php" ?>

		<meta name="description" content="Rocky Mountain Forestry is the go-to timber business in North Idaho. We provide many logging services to our customers and we also have several job openings.">

	</head>

<?php require "header2.php" ?>

	<?php if ($functions->login) { ?>

		<form method="post" class="home" enctype="multipart/form-data" action="index.php">


		<table id="header">

			<!--<div class="max-width">-->

				<!--<div class="header-img">
					<img src="images/placeholder.png">
				</div>-->

			<!-- <div class="container">
				<div id="slides">
					<?php for ($i=0;$i < $tableImages->rowNumber;$i++) { ?>
						<div class="size" style="background: url(upload/<?= $image[$i] ?>) no-repeat 20% center;"></div>
						<img class="size" src="upload/<?= $tableImages->image[$i] ?>">
					<?php } ?>
				</div>
			
			</div> -->

			<tr>

				<td id="slide"><img src="images/placeholder.png"></td>

				<td id="text">
					<div class="content">

						<h1>What is Rocky Mountain Forestry?</h1>
						<p><textarea class="edit" name="<?= $tableStatic->tb ?>text1"><?= $tableStatic->text[0] ?></textarea></p>

						<div id="more"><a href="about.php">Learn More</a></div>

					</div>

				</td>

			</tr>

			<!--</div>-->
		<!--<button class="edit-slide"><a class="no-underline" href="slides.php">Edit Slideshow</a></button>-->

		</table>

		<section>

		<button class="save-all" name="save">Save All</button>

			<!--<div class="max-width">-->
			
			<h1>Benefits</h1>

			<div class="benefits">

			<button class="add" name="add">Add Benefit</button>

				<!--<ul>

				<?php for ($i = 0; $i < $tableBenefits->rowNumber; $i++) { ?>

				<li data-edit="li">

					<input type="text" class="edit edit-benefit" value="<?= $tableBenefits->benefit[$i] ?>" name="<?= $tableBenefits->tb ?>benefit<?= $tableBenefits->ID[$i] ?>">

					<button class="delete" name="delete<?= $tableBenefits->ID[$i] ?>">Delete</button>

				</li>

				<?php } ?>						

				</ul>-->

				<div class="flexbox">

				<?php for ($i = 0; $i < $tableBenefits->rowNumber; $i++) { ?>

					<div>
						<span><input type="text" class="edit" value="<?= $tableBenefits->name[$i] ?>" name="<?= $tableBenefits->tb ?>name<?= $tableBenefits->ID[$i] ?>"></span>
						<p><textarea class="edit edit-benefit" name="<?= $tableBenefits->tb ?>benefit<?= $tableBenefits->ID[$i] ?>"><?= $tableBenefits->benefit[$i] ?></textarea></p>
						<button class="delete" name="delete<?= $tableBenefits->ID[$i] ?>">Delete</button>
					</div>

				<?php } ?>
					
				</div>

			</div>

			<div class="testim">

				<p><input type="text" class="edit" value="<?= $tableStatic->text[1] ?>" name="<?= $tableStatic->tb ?>text2"></p>

				<div>
					<p><input type="text" class="edit" value="<?= $tableStatic->text[2] ?>" name="<?= $tableStatic->tb ?>text3"></p>
					<p><input type="text" class="edit" value="<?= $tableStatic->text[3] ?>" name="<?= $tableStatic->tb ?>text4"></p>
				</div>

			</div>

			<!--</div>-->

		</section>

	<?php } else { ?>

		<table id="header">

			<!--<div class="max-width">-->

				<!--<div class="header-img">
					<img src="images/placeholder.png">
				</div>-->

			<!-- <div class="container">
				<div id="slides">
					<?php for ($i=0;$i < $tableImages->rowNumber;$i++) { ?>
						<div class="size" style="background: url(upload/<?= $image[$i] ?>) no-repeat 20% center;"></div>
						<img class="size" src="upload/<?= $tableImages->image[$i] ?>">
					<?php } ?>
				</div>
			</div> -->

			<tr>

				<td id="slide"><img src="images/placeholder.png"></td>

				<td id="text">
					<div class="content">
						<h1>What is Rocky Mountain Forestry?</h1>
						<p><?= $tableStatic->text[0] ?></p>
						<div id="more"><a href="about.php">Learn More</a></div>
					</div>
				</td>

			</tr>

			<!--</div>-->

		</table>

		<section>

			<!--<div class="max-width">-->
			
			<h1>Benefits</h1>

			<div class="benefits">				

				<div class="flexbox">

				<?php for ($i = 0; $i < $tableBenefits->rowNumber; $i++) { ?>

					<div>
						<span><?= $tableBenefits->name[$i] ?></span>
						<p><?= $tableBenefits->benefit[$i] ?></p>
					</div>

				<?php } ?>
					
				</div>

			</div>

			<div class="testim">

				<p><?= $tableStatic->text[1] ?></p>

				<div>
					<p><?= $tableStatic->text[2] ?></p>
					<p><?= $tableStatic->text[3] ?></p>
				</div>

			</div>

			<!--</div>-->

		</section>

	<?php } ?>

<?php require "footer.php" ?>