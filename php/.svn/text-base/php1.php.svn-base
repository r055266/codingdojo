
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>php test</title>
		<meta charset="UTF-8" />
		<meta name="keywords" content="php test, php first doc" />
		<meta name="description" content="this is the first php assignment!" />

	</head>
<?php
	for($i = 1; $i<=100; $i++)
	{
		$score = rand($i,100);
?>
	<div id="main_content">
		<h1>Your Score: <?php echo $score; ?>/100</h1>
			<?php 
				if($score >= 90 && $score <=100)
				{
					$grade = "A";
				}
				elseif($score < 90 && $score >=80)
				{
					$grade = "B";
				}
				elseif($score < 80 && $score >=70)
				{
					$grade = "C";
				}
				else
				{
					$grade = "D";
				}
			?>
		<h2>Your Grade is: <?php echo $grade; ?></h2>
	</div>
<?php
	}
?>
</html>