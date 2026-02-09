<?php
require "start.php";
$errorMessage = "";

if(isset($_POST["register"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $passwordRep = $_POST["passwordRep"];

  $dataValid = true;

  if($username === "" || strlen($username) < 3) {
    $dataValid = false;
  }

  if($service->userExists($username)) {
    $dataValid = false;
  }

  if(empty($password) || strlen($password) < 8) {
    $dataValid = false;
  }

  if($password !== $passwordRep) {
    $dataValid = false;
  }

  if($dataValid) {
    if($service->register($username, $password)) {
      $_SESSION["user"] = $username;
      header("Location: friends.php");
    } else {
      $errorMessage = "Bei der Registrierung ist irgendwas schiefgelaufen";
    }
  } else {
      $errorMessage = "Die Registrierungsdaten sind fehlerhaft";
  }

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
  <body class="register">
    <img src="./images/user.png" width="100" height="100" alt="" />
    <h1>Register yourself</h1>
    <form action="register.php" id="register-form" method="post" onsubmit="return checkForm()">
      <fieldset class="formular">
        <legend>Register</legend>
        <label for="">Username</label>
        <input type="text" id="username" name="username" placeholder="Username" onchange="checkUsername()"/>
        <label for="">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" onchange="checkPassword()"/>
        <label for="">Confirm Password</label>
        <input type="password" id="repeatPassword" name="passwordRep" placeholder="Confirm Password" onchange="checkRepeatPassword()"/>
      </fieldset>
      <?php
      if(!empty($errorMessage)) {
        echo "<p style='color:red' class='center'>" . $errorMessage . "</p>";
      }
      ?>
      <div class="center">
        <a class="btn" href="login.php">Cancel</a>
        <button class="btn-blue" type="submit" name="register">Create Account</button>
      </div>
    </form>
    <script src="main.js"></script>
    <script src="register.js"></script>
  </body>
</html>
