<html>
<head>
<link rel="stylesheet" href="maintheme.css">
</head>
<title> bonk </title>
<body>

<main>

<div id="righttext">
<?php
if(isset($_POST['submit1'])){
//Setup
$file = file_get_contents('hard.txt');
$allwords = explode(PHP_EOL, $file);
$wordcount = sizeof($allwords);
$chosen = $allwords[rand(0,($wordcount - 2))];
//echo $chosen;
$sep = explode(',',$chosen);
$word = $sep[0];
$hint = $sep[1];
$wordarr = str_split($word);
$blankarr = $wordarr;
for($i = 0; $i < sizeof($wordarr);$i++){
$blankarr[$i] = '_';
}
$blankword = implode("",$blankarr);
$text = $blankword.",".$word.",,0,5";
file_put_contents('badhangman.txt',$text);
header('Location:hangman.php');
//End Setup
}
?>


<form method="post">
<input type="submit" name="submit1" value="Submit1"/>
</form>

<br>
<br>

</div>

</main>

</body>
</html>