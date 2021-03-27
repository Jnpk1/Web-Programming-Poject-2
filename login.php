<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title></title>
    <link rel="stylesheet" href="maintheme.css">
  </head>

  <body>

    <main>
      <div id="righttext">
        <form action="" method="post" name="Login_Form">
          <div class="">
            <label for="Username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="Username" required>
          </div>

          <br>

          <div class="">
            <label for="Password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="Password" required>
          </div>

          <br>

          <input name="Submit" type="submit" value="Login" class="Button3">

      </form>

    </div>
    </main>

  </body>
</html>


<!-- Starts the session -->
<?php session_start();
  /* Check Login form submitted */
  if (isset($_POST['Submit'])) {

      /* Check and assign submitted Username and Password to new variable */
      $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
      $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
      $User = false;
      if (!empty($Username) && !empty($Password)) {
          $file_handle = fopen("Logins.txt", "r+");
          while (($line = fgets($file_handle)) != false) {
              $parts = explode(";", $line);
              if (trim($parts[0]) === $Username && trim($parts[1]) === $Password) {
                  $User = true;
                  fclose($file_handle);
                  break;
              }
          }

          /* Check Username and Password existence in defined array */
          if ($User == true) {
              /* Success: Set session variables and redirect to Protected page  */
              $_SESSION['UserData']['Username']= $Username;

              header("location:index.php");
              exit;
          } else {
              /*Unsuccessful attempt: Set error message */
              $msg="<span style='color:red'>Invalid Login Details</span> <a href='signup.php'>Sign-UP</a>";
              echo $msg;
          }
      }
  }
?>
