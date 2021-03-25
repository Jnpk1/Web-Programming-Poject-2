<html>
<head>
<link rel="stylesheet" href="maintheme.css">
</head>
<title> bonk </title>
<body>
<main>

<div id="righttext">
<p>

<?php
$file = file_get_contents('badhangman.txt');
$infoArr = explode(',',$file);
$gameboard = $infoArr[0];
$word = $infoArr[1];
$guesses = $infoArr[2];
$score = $infoArr[3];
$lives = $infoArr[4];

if(isset($_POST['submit1']) && $_POST['guess'] != ""){
$lives = $lives - 1;
$newInfo = $gameboard.",".$word.",".$guesses.",".$score.",".$lives;
file_put_contents('badhangman.txt',$newInfo);
}



//Round Setup

echo "<p>".$gameboard." ".$word." ".$guesses." ".$score." ".$lives."</p>";



//$file = file_get_contents('hard.txt');
//$allwords = explode(PHP_EOL, $file);
//$wordcount = sizeof($allwords);
//$chosen = $allwords[rand(0,($wordcount - 2))];

//$sep = explode(',',$chosen);
//$word = $sep[0];
//$hint = $sep[1];
//$wordarr = str_split($word);
//$blankarr = $wordarr;
//for($i = 0; $i < sizeof($wordarr);$i++){
//$blankarr[$i] = '_';
//}

echo "<br>";

if(isset($_POST['submit1']) && $_POST['guess'] == ""){
echo "<p>You didn't give me a letter >:(</p>";
}
else{
echo "<p>Your letter is: ".$_POST['guess']."</p>";
}


?>
</p>

<form method="post">
Guess:
<input type="text" name="guess" size="6" maxlength="1" />
<input type="submit" name="submit1" value="Submit1"/>
</form>

<br>
<br>
<p> Sup guys </p>

</div>

</main>

</body>
</html>                                                                                                                       