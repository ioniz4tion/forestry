<?php
	namespace WebDesign;	

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	$functions = new Functions();
	$table = New Database("tb_testimonials");

	if (isset($_POST["save"])) {
		$table->save(array("description","name","location"));
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

		<title>Testimonials - 

<?php require "header.php";?>

	<?php if ($functions->login) { ?>

		<section>

			<span class="super-heading">Testimonials</span>

			<form method="post" action="testimonials.php">

				<button name="add" class="add">Add Testimonial</button>
				<button class="save-all" name="save">Save All</button>

				<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>

					<!--<div class="download-div">-->
						<div class="testim">
							<p><textarea class="edit" name="<?= $table->tb ?>description<?= $table->ID[$i] ?>"><?= $table->description[$i] ?></textarea></p>

							<div>
								<p><input type="text" class="edit" value="<?= $table->name[$i] ?>" name="<?= $table->tb ?>name<?= $table->ID[$i] ?>"></p>
								<p><input type="text" class="edit" value="<?= $table->location[$i] ?>" name="<?= $table->tb ?>location<?= $table->ID[$i] ?>"></p>
							</div>
							<button class="delete delete-testimonials" name="delete<?= $table->ID[$i] ?>">Delete</button>
						</div>
					<!--</div>-->

				<?php } ?>

			</form>
			
		</section>

	<?php } else { ?>

		<section>

			<span class="super-heading">Testimonials</span>

			<?php for ($i=0; $i < $table->rowNumber; $i++) { ?>			

				<div class="testim">
					<p><?= $table->description[$i] ?></p>

					<div>
						<p><?= $table->name[$i] ?></p>
						<p><?= $table->location[$i] ?></p>
					</div>
				</div>

			<?php } ?>
			
		</section>

	<?php } ?>		

<?php require "footer.php";?>