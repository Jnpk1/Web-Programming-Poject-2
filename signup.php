<!-- Starts the session -->
<?php session_start();
  /* Check Login form submitted */
  if (isset($_POST['Submit'])) {

      /* Check and assign submitted Username and Password to new variable */
      $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
      $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
      $Existing = false;
      $User = "";

      //check if Username and Password are set
      if (!empty($Username) && !empty($Password)) {

          //open file for reading & writing
          $file_handle = fopen("Logins.txt", "r+");

          //go line by line to determine if username is already in database
          //if so, set $Existing to true and break from loop to display "username taken" message
          while (($line = fgets($file_handle)) != false) {
              $parts = explode(";", $line);
              if ($parts[0] == $Username) {
                  fclose($file_handle);
                  $Existing = true;
                  break;
              }
          }

          //username not already taken, add username;password to end of file, send to login page
          if (!$Existing) {
              $file = "Logins.txt";
              file_put_contents($file, $Username.";".$Password.PHP_EOL, FILE_APPEND);
              header("location:login.php");
              exit;
          } else {
              /*Unsuccessful attempt: Set error message */
              $msg="<span style='color:red'>Username Already Taken</span>";
          }
      } else {
          $msg="<span style='color:red'>Invalid Username/Password</span>";
      }
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> bonk </title>
    <link rel="stylesheet" href="maintheme.css">
  </head>
  <body>

  <div id="righttext">
      <form action="" method="post" name="Login_Form">
      <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
      <tr>
        <td colspan="2" align="left" valign="top"><h3>Sign-Up</h3></td>
      </tr>
      <tr>
        <td align="right" valign="top">Username</td>
        <td><input name="Username" type="text" class="Input"></td>
      </tr>
      <tr>
        <td align="right">Password</td>
        <td><input name="Password" type="password" class="Input"></td>
      </tr>
      <tr>
        <td> </td>
        <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
      </tr>
    </table>
    </form>

    <?php
    echo isset($msg) ? $msg: '';
     ?>
    <br>
    <br>
  </div>

  </body>
</html>
