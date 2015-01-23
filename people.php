<?php
	namespace WebDesign;	

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	$functions = new Functions();
	$table = New Database("tb_people");
	
	if (isset($_POST["save"])) {
		$table->save(array("name","education","experience","history"));
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

		<title>Employees - 

<?php require "header.php" ?>

	<?php if ($functions->login) { ?>

		<section>

			<span class="super-heading">Employees</span>

			<form method="post" enctype="multipart/form-data" action="people.php">

				<button name="add" class="add">Add Person</button>
				<button class="save-all" name="save">Save All</button>

				<?php for ($i = 0; $i < $table->rowNumber; $i++) { ?>

					<!--<div class="download-div">-->

						<h1><input type="text" class="edit" value="<?= $table->name[$i] ?>" name="<?= $table->tb ?>name<?= $table->ID[$i] ?>"></h1>

						<div class="portrait">
							<img src="upload/<?= $table->image[$i] ?>">
						</div>
						<p class="current-file">Current file: <?= $table->image[$i] ?></p>
						<input type="file" class="browse" name="<?= $table->tb ?>image<?= $table->ID[$i] ?>">

						<table class="person">

							<tr>
								<th>Education:</th>
								<td><textarea class="edit" name="<?= $table->tb ?>education<?= $table->ID[$i] ?>"><?= $table->education[$i] ?></textarea></td>
							</tr>

							<tr>
								<th>Experience:</th>
								<td><textarea class="edit" name="<?= $table->tb ?>experience<?= $table->ID[$i] ?>"><?= $table->experience[$i] ?></textarea></td>
							</tr>

							<tr>
								<th>History:</th>
								<td><textarea class="edit" name="<?= $table->tb ?>history<?= $table->ID[$i] ?>"><?= $table->history[$i] ?></textarea></td>
							</tr>

						</table>

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

					<div class="portrait">
						<img src="upload/<?= $table->image[$i] ?>">
					</div>

					<table class="person">

						<tr>
							<th>Education:</th>
							<td><?= $table->education[$i] ?></td>
						</tr>

						<tr>
							<th>Experience:</th>
							<td><?= $table->experience[$i] ?></td>
						</tr>

						<tr>
							<th>History:</th>
							<td><?= $table->history[$i] ?></td>
						</tr>

					</table>

				</div>

			<?php } ?>
			
		</section>

	<?php } ?>		

<?php require "footer.php" ?>