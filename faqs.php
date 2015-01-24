<?php
	namespace WebDesign;	

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	$functions = new Functions();
	$table = New Database("tb_faqs");

	if (isset($_POST["save"])) {
		$table->save(array("question","answer"));
	}

	if (isset($_POST["add"])) {
		$table->add();
	}

	for ($i=1; $i < $table->rowNumber + 1; $i++) { 		
		if (isset($_POST["delete" . $i])) {
			$table->delete($i);
		}
	}

?>


<!doctype html>

<html lang="en-US">

	<head>

		<title>FAQs - 

<?php require 'header.php';?>

		<meta name="description" content="">

	</head>

<?php require "header2.php" ?>

	<?php if ($functions->login) { ?>

		<section>

			<span class="super-heading">FAQs</span>

			<form method="post" action="faqs.php">

				<button name="add" class="add">Add FAQ</button>
				<button class="save-all" name="save">Save All</button>

				<div>

					<h1>Table of Contents</h1>
					<div class="cool-link contents">
						<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
							<a href="#<?= $table->ID[$i] ?>" class="scroll"><?= $table->question[$i] ?></a>
						<?php }	?>
					</div>

				</div>

				<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>

					<!--<div class="download-div">-->
						<a id="<?= $table->ID[$i] ?>" name="<?= $table->ID[$i] ?>"></a>
						<h1><input type="text" class="edit" value="<?= $table->question[$i] ?>" name="<?= $table->tb ?>question<?= $table->ID[$i] ?>"></h1>
						<p><textarea class="edit" name="<?= $table->tb ?>answer<?= $table->ID[$i] ?>"><?= $table->answer[$i] ?></textarea></p>
						<button class="delete" name="delete<?= $i ?>">Delete</button>
					<!--</div>-->

				<?php } ?>

			</form>		

		</section>		

	<?php } else { ?>

		<section>

			<span class="super-heading">FAQs</span>

			<div>

				<h1>Table of Contents</h1>
				<div class="cool-link contents">
					<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
						<a href="#<?= $table->ID[$i] ?>" class="scroll"><?= $table->question[$i] ?></a>
					<?php }	?>
				</div>

			</div>

			<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
				<div>
					<a id="<?= $table->ID[$i] ?>" name="<?= $table->ID[$i] ?>"></a>
					<h1><?= $table->question[$i] ?></h1>
					<p><?= $table->answer[$i] ?></p>
				</div>
			<?php } ?>
		</section>		

	<?php } ?>

<?php require 'footer.php';?>