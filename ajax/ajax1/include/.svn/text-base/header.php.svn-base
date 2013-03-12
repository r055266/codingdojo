<?
include_once('conn.php');
date_default_timezone_set('America/Los_Angeles');

function display_login()
{
	$display_login  = '<div id="login">';
	$display_login .= 	'<p>Already have an account?</p>';
	$display_login .= 	'<div id="login_box">';

	// if(isset($_SESSION['error']['login']))
	// {
	// 	$display_login .=		'<p class="error_message">' . $_SESSION['error']['login'] . '</p>';
	// }

	$display_login .= 		'<form id="login_form" action="process.php" method="post">';
	$display_login .= 			'<div class="user_login">';
	$display_login .= 				'<label for="email">Email:</label>';
	$display_login .= 				'<input type="text" name="email">';
	$display_login .= 			'</div>';
	$display_login .= 			'<div class="user_login">';
	$display_login .= 				'<label for="password">Password:</label>';
	$display_login .= 				'<input type="password" name="password">';
	$display_login .= 			'</div>';
	$display_login .= 			'<input type="hidden" name="login" value="1">';
	$display_login .= 			'<input class="login" type="submit" name="submit" value="Log In">';
	$display_login .= 		'</form>';
	$display_login .= 	'</div>';
	$display_login .= '</div>';

	return $display_login;
}

function display_profile($id)
{
	

	$display_profile = '<div id="profile">';

	$user_info = fetch_record("SELECT * FROM users WHERE id = " . $id);

	if($_SESSION['id'] == $id)
	{
		$display_profile .= 	'<p>Welcome ' . $user_info['first_name'] . '! (<a href="logout.php?id=' . $_SESSION['id'] . '">Log Out</a>)</p>';
	}
	$display_profile .=		'<h1>' . $user_info['first_name'] . ' ' . $user_info['last_name'] . '</h1>';
	$display_profile .= 	'<img class="profile" src="images/blank_user.jpg" alt="">';
	$display_profile .=		'<h2>Born ' . date('M d, Y', strtotime($user_info['birth_date'])) . '</h2>';
	$users = fetch_all("SELECT id, first_name, last_name FROM users");

	foreach($users as $user)
	{
		$display_profile .= '<h3><a href="profile.php?id=' . $user['id'] . '">' . $user['first_name'] . ' ' . $user['last_name'] . '</a></h3>';
	}
	$display_profile .= '</div>';

	return $display_profile;
}

?>