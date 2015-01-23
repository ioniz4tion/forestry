<?php
	namespace WebDesign;	

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	$functions = new Functions();
	$table = New Database("tb_index_images");
	
	if (isset($_POST["save"])) {		
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

		<title>

<?php require 'header.php'; ?>

	<?php if ($functions->login) { ?>

		<section>
		
			<span class="super-heading">Slides</span>

			<form method="post" enctype="multipart/form-data" action="slides.php">

				<button name="add">Add Slide</button>
				<button class="save-all" name="save">Save All</button>

				<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
						
					<div class="download-div">
						
						<h1>Slide #<?= ($i + 1) ?></h1>						
						<p class="current-file">Current file: <?= $table->image[$i] ?></p>
						<input type="file" class="browse" name="<?= $table->tb ?>image<?= $table->ID[$i] ?>">
						<div class="img-small">
							<img src="upload/<?= $table->image[$i] ?>">
						</div>

						<button class="delete" name="delete<?= $table->ID[$i] ?>">Delete</button>

					</div>

				<?php } ?>

			</form>

		</section>

	<?php } ?>	

<?php require 'footer.php'; ?>