<?php
require "start.php";


if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}

$user = $service->loadUser($_SESSION["user"]);

if(isset($_POST["save"])) {
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$drink = $_POST["drink"];
	$comment = $_POST["comment"];
	$chatlayout = $_POST["chatlayout"];

	$user->setFirstname($firstName);
	$user->setLastname($lastName);
	$user->setDrink($drink);
	$user->setComment($comment);
	$user->setLayout($chatlayout);

	$service->saveUser($user);
	
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="stylesheet.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
</head>

<body>
	<h2>Profile Settings</h2>
	<form method="POST">
		<fieldset class="formular">
			<legend>Base Data</legend>
			<label for="firstName">First Name</label>
			<input type="text" id="firstName" name="firstName" placeholder="Your name" value="<?= $user->getFirstname() ?>"/>
			<label for="lastName">Last Name</label>
			<input type="text" id="lastName" name="lastName" placeholder="Your surname" value="<?= $user->getLastname() ?>"/>
			<label for="drink">Coffee or Tea?</label>
			<select name="drink" id="drink">
				<option value="coffee" <?= $user->getDrink() === "coffee" ? "selected" : "" ?>>coffee</option>
				<option value="tea" <?= $user->getDrink() === "tea" ? "selected" : "" ?>>tea</option>
				<option value="neitherNor" <?= $user->getDrink() === "neitherNor" ? "selected" : "" ?>>Neither nor</option>
			</select>
		</fieldset>
		<fieldset class="formular-area">
			<legend>Tell Something About You</legend>
			<textarea id="comment" name="comment" placeholder="Leave a comment here"><?= $user->getComment() ?></textarea>
		</fieldset>
		<fieldset class="formular-radio">
			<legend>Prefered Chat Layout</legend>
			<div>
				<input type="radio" id="oneLine" name="chatlayout" value="oneLine" <?= $user->getLayout() === "oneLine" ? "checked" : "" ?>/>
				<label for="oneLine">Username and message in one line</label>
			</div>
			<div>
				<input type="radio" id="separatedLine" name="chatlayout" value="separatedLine" <?= $user->getLayout() === "separatedLine" ? "checked" : "" ?>/>
				<label for="separatedLine">Username and message in separated lines</label>
			</div>
		</fieldset>
		<div class="center">
			<a class="btn" href="friends.php">Cancel</a>
			<button type="submit" class="btn-blue" name="save">Save</button>
		</div>
	</form>
	<script src="main.js"></script>

</body>

</html>