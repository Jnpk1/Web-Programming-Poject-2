<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> bonk </title>
    <link rel="stylesheet" href="maintheme.css">
  </head>
  <body>

    <!-- Starts the session -->
    <?php
    session_start();
    /* Destroy started session */
    session_destroy();
    /* Redirect to login page */
    header("location:login.php");
    exit;
    ?>

  </body>
</html>
