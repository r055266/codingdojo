<?

function even_or_odd($value)
{
	$class = 'odd';

	if($value%2 == 0)
	{
		$class = 'even';
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
		<div id="main_content">
			<table id="mult">
				<thead>
				<?
					$i = 0;
					$table_builder = '';
					for($i = 0; $i <= 9; $i++)
					{
						if($i == 1)
						{
							$table_builder .= '<tbody>';
						}

						$table_builder .= '<tr class=' . even_or_odd($i) . '>';

						$s = 0;
						for($s = 0; $s <= 9; $s++)
						{
							if($i == 0)
							{
								$header_multiple = $s;
								$header_class = 'class="multiplier_cell"';
								if($s == 0)
								{
									$header_multiple = '';
								}
								$table_builder .= '<th ' . $header_class . '>' . $header_multiple . '</th>';
							}
							else
							{
								$multiple = $i*$s;
								$class = '';
								if($s == 0)
								{
									 $multiple = $i;
									 if($s == 0)
									 $class = 'class="multiplier_cell"';
								}

								$table_builder .= '<td ' . $class . '>' . $multiple . '</td>';
							}

						}

						$table_builder .= '</tr>';

						if($i == 0)
						{
							$table_builder .= '</thead>';
						}
						else if($i == 1)
						{
							$table_builder .= '</tbody>';
						}
					}
					echo $table_builder;
				?>
			</table>
		</div>
	</body>
</html>