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
//Round Setup
$file = file_get_contents('badhangman.txt');
$infoArr = explode(',',$file);
$gameboard = $infoArr[0];
$word = $infoArr[1];
$guesses = $infoArr[2];
$score = $infoArr[3];
$lives = $infoArr[4];

if(isset($_POST['submit1']) && $_POST['guess'] != ""){

$wordBroke = str_split($word);
$boardBroke = str_split($gameboard);
$got = false;
for($i = 0; $i < count($wordBroke);$i++){
if($wordBroke[$i] == $_POST['guess']){
$got = True;
$boardBroke[$i] = $wordBroke[$i];
if(implode("",$boardBroke) == implode("",$wordBroke)){
header('Location:prepare.php');
}
}
}
if($got == false){
$guesses .= "|".$_POST['guess'];
if($lives-1 == 0){
header('Location:prepare.php');
}
else{
$lives = $lives - 1;
}
}
$gameboard = implode("",$boardBroke);
$newInfo = $gameboard.",".$word.",".$guesses.",".$score.",".$lives;
file_put_contents('badhangman.txt',$newInfo);
}





echo "<p>".$gameboard." ".$word." ".$guesses." ".$score." ".$lives."</p>";


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
  <div class="sub">
<p id="guess">Enter in your guess below:</p>
<input type="text" name="guess" size="6" maxlength="1" />
<input type="submit" name="submit1" value="Submit1"/>
</form>

<br>
<br>
<p> Sup guys </p>
</div>
</div>

</main>

</body>
</html>                                                                                                                       
