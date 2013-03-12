<?php
	include_once('class_HTML_Helper.php');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OOP Assignment 1</title>
	<meta name="keywords" value="OOP, PHP">
	<meta name="description" value="learning OOP and PHP">
</head>
	<body>
<?php
	$table_array = array(
					array('first_name' => 'Randall', 'last_name' => 'Frisk', 'nick_name' => 'White Dragon'),
					array('first_name' => 'Miles', 'last_name' => 'Fink', 'nick_name' => 'Blue Dragon'),
					array('first_name' => 'Jeremey', 'last_name' => 'Shoenig', 'nick_name' => 'Green Dragon'),
					array('first_name' => 'Michael', 'last_name' => 'Choi', 'nick_name' => 'Sensei')
					);
	$select_array = array('Wakeboarding', 'Golf', 'Basketball', 'Tennis', 'Football', 'Soccer');

	$html_helper = new HTML_Helper();
	$html_helper->print_table($table_array);
	$html_helper->print_select('favorite_sports', $select_array);

?>
	</body>
</html>