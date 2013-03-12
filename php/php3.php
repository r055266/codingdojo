<?php

$coin_flip = array('heads', 'tails');

for($c = 1; $c <= 5000; $c++)
{
	
	$i = rand(0,1);
	$result = $coin_flip[$i];
	if($result == 'heads')
	{
		$heads++;
	}
	else
	{
		$tails++;
	}
	echo 'Flip # ' . $c . ' : Flipping Coin!';
	echo ' .... ';
	echo 'It\'s a '  . $result . '!';
	echo ' Got ' . $heads . ' head(s) and ' . $tails . ' tail(s) so far<br><br>';
}	
echo 'End of Program! Thank you!';
?>