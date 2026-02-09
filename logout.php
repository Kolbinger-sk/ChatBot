<?php
require "start.php";
session_unset();
session_destroy();
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
    <img src="images/logout.png" width="200" height="200" />
    <br />
    <div class="center logout">
      <h1>Logged out...</h1>
      <p>See u!</p>
      <a href="login.php">Login again</a>
    </div>
    <script src="main.js"></script>

  </body>
</html>
