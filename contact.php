<?php

	if (isset($_POST["submit"])) {

		$name = $_POST["fname"] . " " . $_POST["lname"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$comment = $_POST["comment"];

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: rockymountainforestry' . "\r\n";			

		$emailTo = "Zwforester@gmail.com,Stignix@yahoo.com";

		$subject = "Rocky Mountain Forestry Contact";

		$message = "Name: " . $name . "<br/>" . "Email: " . $email . "<br/>" . "Phone: " . $phone . "<br/>" . "Address: " . $address . "<br/>" . "Comment:" . $comment;
		
		mail($emailTo, $subject, $message, $headers);
	}



?>

<!doctype html>

<html lang="en-US">

	<head>

		<title>Contact Us - 

<?php require "header.php" ?>

		<meta name="description" content="Get in touch with staff at Rocky Mountain Forestry. Submit a question or comment and we will respond in a timely manner.">

	</head>

<?php require "header2.php" ?>

		<section>

			<span class="super-heading">Contact Us</span>

			<form action="contact.php" method="post" class="not-edit">

				<table>

					<tr>
						<td><span>First Name &ast;</span></td>
						<td><input name="fname" id="username" type="text" required="true"></td>
					</tr>

					<tr>
						<td><span>Last Name &ast;</span></td>
						<td><input name="lname" type="text" required="true"></td>
					</tr>

					<tr>
						<td><span>Email Address &ast;</span></td>
						<td><input name="email" id="username" type="email" required="true"></td>
					</tr>

					<tr>
						<td><span>Phone Number</span></td>
						<td><input name="phone" type="tel"></td>
					</tr>

					<tr>
						<td colspan="2">
							<span>Address</span>
							<input name="address" type="text">
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<span>Questions &amp; Comments &ast;</span>
							<textarea name="comment" required="true"></textarea>
						</td>
					</tr>

					<tr>
						<td><span>&ast; - required fields</span></td>
						<td><button name="submit">Submit</button></td>
					</tr>

				</table>

			</form>

		</section>

<?php require "footer.php" ?>