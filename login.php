<?php
require "start.php";

if(isset($_SESSION["user"])) {
  header("Location: friends.php");
}

$errorMessage = "";
if(isset($_POST["login"])) {
  $username = $_POST["username"] ?? "";
  $password = $_POST["password"] ?? "";

  $loginValid = $service->login($username, $password);
  if($loginValid) {
    header("Location: friends.php");
    $_SESSION["user"] = $username;
  } else {
      $errorMessage = "Login-Daten sind falsch!";
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

  <body>
    <img src="./images/user.png" width="100" height="100" alt="" />
    <h1>Please sign in</h1>
    <form action="login.php" method="post">
      <fieldset class="formular">
        <legend>
          <label>Login</label>
        </legend>
        <label>Username</label>
        <input type="Username" placeholder="Username" name="username"/>
        <label>Password</label>
        <input type="password" placeholder="Password" name="password"/>
      </fieldset>
      <?php if (!empty($errorMessage)) {
          echo "<p style='color:red' class='center'>" . $errorMessage . "</p>";
      }
      ?>
      <div class="center">
        <a href="register.php" class="btn">register</a>
        <button type="submit" name="login" class="btn-blue">login</button>
      </div>
    </form>
    <script src="main.js"></script>

  </body>
</html>
