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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!isset($_POST["msg"]) && !isset($_POST["to"])) {
		$service->friendRequest($_POST);
	}
}


$chatpartner = $_GET['friend'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="stylesheet.css" />
	<title>Document</title>
</head>

<body>
	<h2 id="chatHeader">Chat with <?php echo $chatpartner; ?></h2>

	<div class="fsc">
		<a href="friends.php">
			< Back</a>
				<span>|</span>
				<a href="profile.php?friend=<?php echo $chatpartner; ?>">Profile</a>
				<span>|</span>
				<form action="friends.php" method="POST">
					<input type="hidden" name="name" value="<?php echo $chatpartner; ?>">
					<button name="action" value="delete" class="red-link"
						style="background: none;padding: initial;font-size:16px;">Remove Friend</Button>
				</form>
	</div>

	<hr />

	<div class="chat" id="chat">

	</div>

	<hr />

	<form class="send-input-one">
		<input class="input-corner" type="text" name="" id="message-text" placeholder="New Message" />
		<button type="button" onclick="sendMessage()">Send</button>
	</form>
	<script src="main.js"></script>
	<script src="chat.js"></script>
</body>

</html>