<?php
	namespace WebDesign;	

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	$functions = new Functions();
	$table = New Database("tb_services");
	
	if (isset($_POST["save"])) {
		$table->save(array("description"));
		$table->saveFile(array("image"),"upload/");
	}

?>

<!doctype html>

<html>

	<head>	

		<title>Services - 

<?php require 'header.php'; ?>

	<?php if ($functions->login) { ?>

		<section>
		
			<span class="super-heading">Services</span>

			<form method="post" enctype="multipart/form-data" action="services.php" name="services">

				<button class="save-all" name="save">Save All</button>

				<div>

					<h1>Table of Contents</h1>
					<div class="cool-link contents">
						<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
							<a href="#<?= $table->ID[$i] ?>" class="scroll"><?= $table->service[$i] ?></a>
						<?php }	?>
					</div>

				</div>

				<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
						
					<!--<div class="download-div">-->

						<a id="<?= $table->ID[$i] ?>" name="<?= $table->ID[$i] ?>"></a>

						<h1><?= $table->service[$i] ?></h1>

						<p><textarea spellcheck="true" class="edit" name="<?= $table->tb ?>description<?= $table->ID[$i] ?>"><?= $table->description[$i] ?></textarea></p>
						
						<p class="current-file">Current file: <?= $table->image[$i] ?></p>
						
						<input type="file" class="browse" name="<?= $table->tb ?>image<?= $table->ID[$i] ?>">
						
						<div class="img-wide">
							<img src="upload/<?= $table->image[$i] ?>">
						</div>

					<!--</div>-->

				<?php } ?>

			</form>

		</section>

	<?php } else { ?>

		<section>
		
			<span class="super-heading">Services</span>

			<div>

				<h1>Table of Contents</h1>
				<div class="cool-link contents">
					<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>
						<a href="#<?= $table->ID[$i] ?>" class="scroll"><?= $table->service[$i] ?></a>
					<?php }	?>
				</div>

			</div>

			<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>				

				<a id="<?= $table->ID[$i] ?>" name="<?= $table->ID[$i] ?>"></a>

				<h1><?= $table->service[$i] ?></h1>

				<p><?= $table->description[$i] ?></p>	

				<div class="img-wide">
					<img src="upload/<?= $table->image[$i] ?>">
				</div>

			<?php } ?>

		</section>

	<?php } ?>

<?php require 'footer.php'; ?>