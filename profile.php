<?php
require "start.php";


if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
	header("Location: login.php");
	exit();
}

if (!isset($_GET['friend']) || empty($_GET['friend'])) {
	header("Location: login.php");
	exit();
}
$user = $service->loadUser($_GET['friend']);


$chatpartner = $_GET['friend'];

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
	<div class="">
		<h2>Profile of <?php echo $chatpartner; ?></h2>
		<br>
		<div class="fsc">
		<a href="chat.php?friend=<?php echo $chatpartner; ?>">&lt; Back to Chat</a>
		|
		<form action="friends.php" method="POST">
			<input type="hidden" name="name" value="<?php echo $user->getUsername(); ?>">
			<button name="action" value="delete" class="red-link"
				style="background: none;padding: initial;font-size:16px;">Remove
				Friend</Button>
		</form>
		</div>
	</div>
	<div class="flex-profile">
		<img src="images/profile.png" alt="Profilbild" width="300" height="300" />
		<div>
			<dl>
				<p>
				<?php echo $user->getComment(); ?>
					
				</p>
				<dt>Coffee or Tea?</dt>
				<dd>
				<?php echo $user->getDrink(); ?>
					
				</dd>
				<dt>Name</dt>
				<dd>				<?php echo $user->getFirstname() ?? ""; ?>
</dd>
				<dt>Surname</dt>
				<dd>				<?php echo $user->getLastname() ?? ""; ?>
</dd>
			</dl>
		</div>
	</div>
	<script src="main.js"></script>

</body>

</html>