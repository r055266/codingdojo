<?php
session_start();

require_once('conn.php');

if(isset($_POST))
{
	echo '<pre>' . var_dump($_SESSION);
	print_r($_POST);
	print_r($_GET). '</pre>'; 

	$check_user = $conn->query("SELECT * FROM clients WHERE user_name = '" . $_POST['user_name'] . "' AND password ='" . $_POST['password'] . "'");
	if($check_user->num_rows == 1)
	{
		$result = $check_user->fetch_assoc();
		$_SESSION['login'] = true;
		$_SESSION['user_name'] = $result['user_name'];
	}

} 

if($_SESSION['login'] == true)
{
	echo "Welcome " . $_SESSION['user_name'] . "!";
}
else
{
	echo "You are not logged in.";
}
?>