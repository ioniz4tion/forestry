<?php
	namespace WebDesign;	

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	$functions = new Functions();
	$table = New Database("tb_about");

	if (isset($_POST["save"])) {
		$table->save(array("name","text"));
		$table->saveFile(array("image"),"upload/");
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

		<title>About Us - 

<?php require "header.php" ?>

	<?php if ($functions->login) { ?>

		<section>

			<span class="super-heading">About Us</span>

			<form method="post" enctype="multipart/form-data" action="about.php">

				<button name="add" class="add">Add Section</button>
				<button class="save-all" name="save">Save All</button>

				<?php for ($i = 0; $i < $table->rowNumber; $i++) { ?>

					<!--<div class="download-div">-->

						<h1><input type="text" class="edit" value="<?= $table->name[$i] ?>" name="<?= $table->tb ?>name<?= $table->ID[$i] ?>"></h1>						

						
						<p><textarea class="edit" name="<?= $table->tb ?>text<?= $table->ID[$i] ?>"><?= $table->text[$i] ?></textarea></p>

						<p class="current-file">Current file: <?= $table->image[$i] ?></p>
						<input type="file" class="browse" name="<?= $table->tb ?>image<?= $table->ID[$i] ?>">

						<div class="img-wide"><img src="upload/<?= $table->image[$i] ?>"></div>

						<button class="delete" name="delete<?= $table->ID[$i] ?>">Delete</button>

					<!--</div>-->

				<?php } ?>

			</form>

		</section>

	<?php } else { ?>

		<section>

			<span class="super-heading">About Us</span>

			<?php for ($i = 0; $i < $table->rowNumber; $i++) { ?>

				<div>

					<h1><?= $table->name[$i] ?></h1>

					<p><?= $table->text[$i] ?></p>

					<div class="img-wide"><img src="upload/<?= $table->image[$i] ?>"></div>

				</div>

			<?php } ?>
			
		</section>

	<?php } ?>		

<?php require "footer.php" ?>