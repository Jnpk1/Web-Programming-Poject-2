<html>
<head>
<link rel="stylesheet" href="maintheme.css">
</head>
<title> bonk </title>
<body>
<main>

<div id="righttext">
<p> <a href="logout.php">Click here to logout</a></p>
<br><br><br>
<p>

<?php session_start();

if($_SESSION['loggedIn']) {
  //Round Setup
  $file = file_get_contents('badhangman.txt');
  $infoArr = explode(',', $file);
  $gameboard = $infoArr[0];
  $word = $infoArr[1];
  $guesses = $infoArr[2];
  $lives = $infoArr[3];
  $wordSize = strlen($word);

  if (isset($_POST['submit1']) && $_POST['guess'] != "") {
      $wordBroke = str_split($word);
      $boardBroke = str_split($gameboard);
      $got = false;
      for ($i = 0; $i < count($wordBroke);$i++) {
          if ($wordBroke[$i] == $_POST['guess']) {
              $got = true;
              $boardBroke[$i] = $wordBroke[$i];
              if (implode("", $boardBroke) == implode("", $wordBroke)) {
                  header('Location:win.php');
              }
          }
      }
      if ($got == false) {
          $guesses .= "|".$_POST['guess'];
          if ($lives-1 == 0) {
              header('Location:gameover.php');
          } else {
              $lives = $lives - 1;
          }
      }
      $gameboard = implode("", $boardBroke);
      $newInfo = $gameboard.",".$word.",".$guesses.",".$lives;
      file_put_contents('badhangman.txt', $newInfo);
  }


  echo "<p>".$gameboard."</p>";
  echo "<p> Length of word: ".$wordSize."</p>";
  echo "<p>Incorrect guesses: ".$guesses."</p>";
  echo "<p>Number of guesses left: ".$lives."</p>";


  echo "<br>";



  if (isset($_POST['submit1']) && $_POST['guess'] == "") {
      echo "<p>You didn't give me a letter >:(</p>";
  } else if (!empty($_POST['guess'])) {
      echo "<p>Your letter is: ".$_POST['guess']."</p>";
  }
} else {
  header('location:login.php');
  exit;
}

?>
</p>

<form method="post">
  <div class="sub">
<p id="guess">Enter in your guess below:</p>
<input type="text" name="guess" size="6" maxlength="1" />
<input type="submit" name="submit1" value="Submit"/>
</form>

<br>
<br>
</div>
</div>

</main>

</body>

</html>
