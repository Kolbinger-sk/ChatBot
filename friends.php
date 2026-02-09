<?php
require "start.php";
use Model;

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $action = $_POST['action'] ?? '';

  if ($action == "accept" || $action == "reject") {
    $friendName = $_POST['friendName'] ?? '';

    if ($friendName) {
      $friend = new Model\Friend($friendName);
      if ($action === 'accept') {
        $friend->acceptFriend($service);
      } elseif ($action === 'reject') {
        $friend->rejectFriend($service);
      }
    }
  } else if ($action == "addFriend") {
    $username = $_POST['friendRequestName'] ?? "";

    if (!empty($username)) {
      $userLoaded = $service->loadUser($username);
      $service->friendRequest($userLoaded);
    }
  } else if ($action == "delete") {
    $username = $_POST['name'] ?? "";

    if (!empty($username)) {
      $service->removeFriend($username);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="stylesheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <h2>Friends</h2>
  <a href="logout.php">&#x3C Lougout</a>
  <b>|</b>
  <a href="settings.php">Settings</a>
  <hr>
  <ul id="friend-list">
  </ul>
  <hr>
  <h3>New Requests</h3>
  <ol id="friend-requests">

  </ol>
  <hr>
  <form class="send-input-one" method="POST">
    <input class="input-corner" type="text" name="friendRequestName" id="friend-request-name"
      placeholder="Add Friend to List" list="friend-selector" />
    <datalist id="friend-selector">
      <!-- wird mit JS gefüllt -->
    </datalist>
    <button name="action" value="addFriend">Add</button>
  </form>
  <script src="main.js"></script>
  <script src="friends.js">
  </script>
</body>

</html>