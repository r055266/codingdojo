<?php
function odd_or_even($row, $column)
{
	$even_column = false;
	$class = '';
	if($column%2 == 0)
	{
		$even_column = true;
	}
	
	$even_row = false;

	if($row%2 == 0)
	{
		$even_row = true;
	}

	if(($even_column && $even_row) || (!$even_column && !$even_row))
	{
		$class='class="even"';
	}

	return $class;
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>php test</title>
		<meta charset="UTF-8" />
		<meta name="keywords" content="php table, multiplication" />
		<meta name="description" content="this document will display a multiplication table with colorful rows" />
		<link rel="stylesheet" type="text/css" href="css/table_style.css">
	</head>
	<body>
		<div>
			<table id="checkerboard">
				<?php
					$row = 0;
					$checker_board = '';
					for($r = 0; $r < 8; $r++)
					{
						$checker_board .= '<tr>';
						$column = 0;

						for($c = 0; $c < 8; $c++)
						{
							$checker_board .= '<td ' . odd_or_even($r,$c) .'></td>';
						}

						$checker_board .= '</tr>';
					}
					echo $checker_board;
				?>
			</table>
		</div>
	</body>
</html>
