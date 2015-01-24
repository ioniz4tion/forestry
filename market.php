<?php
	namespace WebDesign;	

	spl_autoload_register(function ($class){   		
   		$class .= ".class.php";
   		$class = str_ireplace('\\', "/", $class);   		
        if(is_file($class)&&!class_exists($class)) require_once $class;
    });

	$functions = new Functions();
	$table = New Database("tb_market","species");
	$text = New Database("tb_market_text");
	
	if (isset($_POST["save"])) {
		$table->save(array("species","q1","q2","q3","q4"));
		$text->save(array("text"));
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

		<title>Market Report - 

<?php require_once "header.php"; ?>

		<meta name="description" content="Compare market prices of various types of wood.">

	</head>

<?php require "header2.php" ?>

		<section>

			<span class="super-heading">Market Report</span>


<?php if($functions->login == true) { ?>

	<form method="post" action="market.php">

		<button name="add" class="add">Add Species</button>
		<button class="save-all" name="save">Save All</button>
		

		<table id="market-table">

			<tr>
				<th>Species</th>
				<th>Quarter 1</th>
				<th>Quarter 2</th>
				<th>Quarter 3</th>
				<th>Quarter 4</th>
			</tr>

				<?php for($i=0;$i < $table->rowNumber;$i++) { ?>
				
				<tr>
					<td><input name="<?= $table->tb ?>species<?= $table->ID[$i] ?>" class="edit" value="<?= $table->species[$i] ?>"></td>
					<td><input class="edit" name="<?= $table->tb ?>q1<?= $table->ID[$i] ?>" value="<?= $table->q1[$i] ?>"></td>
					<td><input class="edit" name="<?= $table->tb ?>q2<?= $table->ID[$i] ?>" value="<?= $table->q2[$i] ?>"></td>
					<td><input class="edit" name="<?= $table->tb ?>q3<?= $table->ID[$i] ?>" value="<?= $table->q3[$i] ?>"></td>
					<td><input class="edit" name="<?= $table->tb ?>q4<?= $table->ID[$i] ?>" value="<?= $table->q4[$i] ?>"></td>
					<td><button class="delete" name="delete<?= $table->ID[$i] ?>">Delete</button></td>

				</tr>

				<?php } ?>

		</table>

		<p><textarea class="edit" name="<?= $text->tb ?>text<?= $text->ID[0] ?>"><?= $text->text[0] ?></textarea></p>

	</form>

<?php } else { ?>

	<table id="market-table">
		<tr>
			<th>Species</th>
			<th>Quarter 1</th>
			<th>Quarter 2</th>
			<th>Quarter 3</th>
			<th>Quarter 4</th>
		</tr>

			<?php for($i=0;$i < $table->rowNumber;$i++) { ?>
			
			<tr>
				<td><?= $table->species[$i] ?></td>
				<td><?= $table->q1[$i] ?></td>
				<td><?= $table->q2[$i] ?></td>
				<td><?= $table->q3[$i] ?></td>
				<td><?= $table->q4[$i] ?></td>
			</tr>

			<?php } ?>

	</table>

	<p><?= $text->text[0] ?></p>

<?php } ?>

		</section>

<?php require_once "footer.php"; ?>