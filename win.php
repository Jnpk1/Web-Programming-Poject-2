<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GameOver</title>
    <link rel="stylesheet" href="maintheme.css">
  </head>
  <body>

    <div id="righttext">
      <p> <a href="logout.php">Click here to logout</a></p>
      <br><br><br>
      <h1>YOU WIN</h1>
      <br><br>
      <form method="post">
      <input type="submit" name="submit" value="Restart"/>
      </form>
      <br><br>
    </div>

  </body>
</html>

<?php
  if (isset($_POST['submit'])) {
    header("location:prepare.php");
    exit;
  }
 ?>
