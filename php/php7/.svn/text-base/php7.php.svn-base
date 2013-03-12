<?php 
$users = array( 
   array('first_name' => 'Michael', 'last_name' => ' Choi '),
   array('first_name' => 'John', 'last_name' => 'Supsupin'),
   array('first_name' => 'Mark', 'last_name' => ' Guillen'),
   array('first_name' => 'KB', 'last_name' => 'Tonel'), 
   array('first_name' => 'Randall', 'last_name' => 'Frisk'),
   array('first_name' => 'Kaitlin', 'last_name' => 'Wade'),
   array('first_name' => 'Jerry', 'last_name' => 'Marcou'),
   array('first_name' => 'Brett', 'last_name' => 'Favre'),
   array('first_name' => 'Michael', 'last_name' => 'Jordan'),
   array('first_name' => 'Dwayne', 'last_name' => 'Wade'),
   array('first_name' => 'Larry', 'last_name' => 'Bird'),
   array('first_name' => 'Barack', 'last_name' => 'Obama'),
   array('first_name' => 'Tiger', 'last_name' => 'Woods'),
   array('first_name' => 'Ryan', 'last_name' => 'Davis')
);

$table_columns = array(
	'user' => 'User#',
	'first_name' => 'First Name',
	'last_name' => 'Last Name',
	'full_name' => 'Full Name',
	'full_name_upper' => 'Full Name in upper Case',
	'length_of_name' => 'Length of name'
);

$row = 0;
$table_header = '<thead><tr>';
$table_body = '<tbody>';

foreach($users as $user)
{
	$class = '';
	if(($row+1)%5 == 0)
	{
		$class = 'class="reverse"';
	}
	$table_body .= '<tr ' . $class . '>';
	$column = 0;
	foreach($table_columns as $column_key => $column_value)
	{
		if($row == 0)
		{
			$table_header .= '<th>' . $column_value . '</th>';
		}

		$first_name = trim($user['first_name']);
		$last_name = trim($user['last_name']);
		$full_name = $first_name . ' ' . $last_name;
		switch($column_key)
		{
			case 'user':
				$cell = $row+1;
			break;
			case 'first_name':
				$cell = $first_name;
			break;
			case 'last_name':
				$cell = $last_name;
			break;
			case 'full_name':
				$cell = $full_name;
			break;
			case 'full_name_upper':
				$cell = strtoupper($full_name);
			break;
			case 'length_of_name':
				$cell = strlen($full_name);
			break;
		}
		$table_body .= '<td>' . $cell . '</td>';
		$column++;
	}

	$table_body .= '</tr>';
	$row++;
}

$table_header .= '</tr></thead>';
$table_body .= '</tbody>';

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
			<table id="client_info">
				<?php
					echo $table_header.$table_body;
				?>
			</table>
		</div>
	</body>
</html>