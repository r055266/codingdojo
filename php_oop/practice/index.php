<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OOP in PHP</title>

<?php 
	include('class_lib.php'); 
?>

</head>
<body>
<?php 
// Using our PHP objects in our PHP pages. 

$stefan = new person("Stefan Mischook"); 

echo "Stefan's full name: " . $stefan->get_name(); 

$james = new employee("Johnny Fingers"); 

echo "---> " . $james->get_name(); 

?>
</body>
</html>