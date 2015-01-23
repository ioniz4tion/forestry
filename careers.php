<?php
	namespace WebDesign;	

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	$functions = new Functions();
	$table = New Database("tb_careers");

	if (isset($_POST["save"])) {
		$table->save(array("position","description"));
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

<html>

	<head>

		<title>Available Positions - 

<?php require 'header.php'; ?>

	<?php if ($functions->login) { ?>

		<section>

				<span class="super-heading">Available Positions</span>

				<form method="post" action="careers.php">

					<button name="add" class="add">Add Position</button>
					<button class="save-all" name="save">Save All</button>

					<div>

						<h1>Table of Contents</h1>
						<div class="cool-link contents">
							<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>

								<a href="#<?= $table->ID[$i] ?>" class="scroll"><?= $table->position[$i] ?></a>

							<?php } ?>
						</div>
						
					</div>

					<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
							
						<!--<div class="download-div">-->
							<a id="<?= $table->ID[$i] ?>" name="<?= $table->ID[$i] ?>"></a>
							<h1><input type="text" class="edit" value="<?= $table->position[$i] ?>" name="<?= $table->tb ?>position<?= $table->ID[$i] ?>"></h1>
							<p><textarea class="edit" name="<?= $table->tb ?>description<?= $table->ID[$i] ?>"><?= $table->description[$i] ?></textarea></p>
							<button class="delete" name="delete<?= $table->ID[$i] ?>">Delete</button>
						<!--</div>-->

					<?php } ?>

				</form>

			</section>

	<?php } else { ?>

		<section>

			<span class="super-heading">Available Positions</span>

			<div>

				<h1>Table of Contents</h1>
				<div class="cool-link contents">
					<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>

						<a href="#<?= $table->ID[$i] ?>" class="scroll"><?= $table->position[$i] ?></a>

					<?php } ?>
				</div>
				
			</div>

			<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
					
					<div> 
						<a id="<?= $table->ID[$i] ?>" name="<?= $table->ID[$i] ?>"></a>
						<h1><?= $table->position[$i] ?></h1>
						<p><?= $table->description[$i] ?></p>
						<a href="application.php"><button>Apply</button></a>
					</div>

			<?php } ?>

		</section>

	<?php } ?>

<?php require 'footer.php'; ?>