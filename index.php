<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <!-- Starts the session -->
    <?php session_start();
      if (!isset($_SESSION['UserData']['Username'])) {
          header("location:login.php");
          exit;
      }
    ?>

    Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.

  </body>
</html>
