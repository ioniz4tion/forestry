<?php
	namespace WebDesign;	

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	$functions = new Functions();
	$table = New Database("tb_downloads");
	
	if (isset($_POST["save"])) {
		$table->save(array("name","description"));
		$table->saveFile(array("file"),"upload/");
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

		<title>Downloads - 

<?php require 'header.php';?>

		<meta name="description" content="Files provided by Rocky Mountain Forestry that are available to download.">

	</head>

<?php require "header2.php" ?>


	<?php if ($functions->login) {?>

		<section>

			<form method="post" enctype="multipart/form-data" action="downloads.php" name="download">

			<span class="super-heading">Downloads</span>

			<button name="add" class="add">Add Download</button>
			<button class="save-all" name="save">Save All</button>

			<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
					
				<!--<div class="download-div">-->
					<h1><input type="text" class="edit" value="<?= $table->name[$i] ?>" name="<?= $table->tb ?>name<?= $table->ID[$i] ?>"></h1>
					<p><textarea class="edit" name="<?= $table->tb ?>description<?= $table->ID[$i] ?>"><?= $table->description[$i] ?></textarea></p>
					<p class="current-file">Current file: <?= $table->file[$i] ?></p>
					<input type="file" class="browse" name="<?= $table->tb ?>file<?= $table->ID[$i] ?>" value="Choose New File">
					<button class="delete" name="delete<?= $table->ID[$i] ?>">Delete</button>
				<!--</div>-->

			<?php } ?>

			</form>
			
		</section>		

	<?php } else { ?>

		<section>

			<span class="super-heading">Downloads</span>

			<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
					
				<div>
					<h1><?= $table->name[$i] ?></h1>
					<p><?= $table->description[$i] ?></p>
					<a href="upload/<?= $table->file[$i] ?>" target="_blank">
						<button>Download</button>
					</a>
				</div>

			<?php } ?>
			
		</section>
		
	<?php } ?>

<?php require 'footer.php';?>