<?php
include_once('deck.php');
$draw = false;

if(isset($_POST['draw']))
{
	$draw = true;
	$you = new Deck;
	$your_card = $you->draw_card();
	$computer = new Deck;
	$computer_card = $computer->draw_card();
	$result = new Deck;
	$winner = $result->display_winner($your_card, $computer_card);
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div>
		<h1>Card Game:</h1>
		<p>You drew: <?php if($draw){ echo $you->display_card(); }?></p>
		<p>The computer drew: <?php if($draw){ echo $computer->display_card(); } ?></p>
		<h2><?php if($draw){ echo $result->display_winner($your_card, $computer_card); } ?></h2>
		<form action="index.php" method="post">
			<input type="hidden" name="draw" value="1">
			<input type="submit" value="Draw Cards">
		</form>
	</div>
</body>
</html>