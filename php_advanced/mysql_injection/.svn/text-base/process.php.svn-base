<?php
require('include/conn.php');

date_default_timezone_set('America/Los_Angeles');

function register($post)
{
	global $conn;

	foreach ($post as $key => $value) {
		
		if(empty($value))
		{
			$_SESSION['error'][$key] = 'Required fields must not be blank';
			continue;
		}

		switch($key)
		{
			case 'email':
				$email = $value;
				if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL))
				{
					$_SESSION['error'][$key] = 'Invalid email';
				}
			break;
			case 'birth_date':
				$date = explode('/', $value);
				if(!checkdate($date[0], $date[1], $date[2]))
				{
					$_SESSION['error'][$key] = 'Please put date in correct format MM/DD/YYYY.';
				}
				else
				{
					$birth_date = date('Y-m-d', strtotime($value));
				}
			break;
			case 'password':
				$password = $value;
				if(strlen($value) < 7)
				{
					$_SESSION['error'][$key] = 'Password must contain at least 6 characters.';
				}
			break;
			case 'confirm_password':
				if($value !== $password)
				{
					$_SESSION['error'][$key] = 'Password does not match.';
				}
			break;
			default;
				if(!preg_match('@^[a-zA-Z]+$@', $value) && ($key != 'submit') && ($key != 'register'))
				{
					$label = explode('_', $key);
					$label_name = ucfirst($label[0]) . ' ' . ucfirst($label[1]);
					
					$_SESSION['error'][$key] = $label_name . ' includes characters that are not allowed';
				}
				if($key == 'first_name')
				{
					$first_name = $value;
				}
				else if($key == 'last_name') 
				{
					$last_name = $value;
				}
			break;
		}
	}

	if(!isset($_SESSION['error']))
	{	
		$sql = "INSERT INTO users (email_address, first_name, last_name, password, birth_date, created_at, modified_at) VALUES ('" . $conn->real_escape_string($email) . "','" . $conn->real_escape_string($first_name) . "','" . $conn->real_escape_string($last_name) . "','" . md5($conn->real_escape_string($password)) . "','" . $conn->real_escape_string($birth_date) . "',NOW(),NOW())";

		$reg_query = $conn->query($sql);
		
		if(!$reg_query)
		{
			$_SESSION['message'] = 'There was a problem submitting your information into the database. Please contact <a href="">technical support.</a>';
		}
		else
		{
			$_SESSION['message'] = 'Thank you for submitting your information. Please login to start using PRAYISE!';
		}
	}
	else
	{
		$_SESSION['message'] = 'One or more errors occured in the fields below. Please correct and re-submit.';
	}
}

function login($post)
{
	global $conn;

	$user_info = fetch_record("SELECT * FROM users WHERE users.email_address = '" . $conn->real_escape_string($post['email']) . "' AND users.password = '" . md5($conn->real_escape_string($post['password'])) . "'");

	if($user_info != NULL)
	{
		$_SESSION['id'] = $user_info['id'];
		$_SESSION['user_name'] = $user_info['first_name'] . ' ' . $user_info['last_name'];
		$_SESSION['birth_date'] = date('M d, Y', strtotime($user_info['email']));
		$_SESSION['logged_in'] = true;

		if($_SESSION['logged_in'] === true)
		{
			header('location: profile.php?id=' . $user_info['id']);
			exit;
		}
	}
	else
	{
		$_SESSION['error']['login'] = 'Incorrect email or password.';
	}

}

function message($post)
{
	global $conn;

	if(!$_SESSION['logged_in'])
	{
		$_SESSION['message'] = 'You must be logged in to post a message. Please log in or create a new account.';
		header('location: index.php');
		exit;
	}
	$new_message_sql = "INSERT INTO messages (user_sent_id, user_reciever_id, content, created_at, modified_at) VALUES(" . $conn->real_escape_string($_SESSION['id']) . "," . $conn->real_escape_string($post['profile_id']) . ", '" . $conn->real_escape_string($post['new_message']) . "', NOW(), NOW())";
	$new_message_query = $conn->query($new_message_sql);

	if(!$new_message_query)
	{
		$_SESSION['error'] = true;
		$_SESSION['message'] = 'There was a problem adding your message.';
	}
	else
	{
		$_SESSION['message'] = 'Your message has been posted!';
	}
	header('location: profile.php?id=' . $post['profile_id']);
	exit;
}	

function delete_message($post)
{
	global $conn;

	if(!$_SESSION['logged_in'])
	{
		$_SESSION['message'] = 'You must be logged in to delete a message.';
		header('location: index.php');
		exit;
	}

	$remove_message_sql = "UPDATE messages SET display_flag = 0 WHERE id = " . $conn->real_escape_string($post['message_id']);
	$remove_message_query = $conn->query($remove_message_sql);

	$remove_comment_sql = "UPDATE comments SET display_flag = 0 WHERE messages_id = " . $conn->real_escape_string($post['message_id']);
	$remove_comment_query = $conn->query($remove_comment_sql);

	if(!$remove_message_query && !$remove_comment_query)
	{
		$_SESSION['error'] = true;
		$_SESSION['message'] = 'There was a problem removing your message.';
	}
	else
	{
		$_SESSION['message'] = 'Your message has been removed.';
	}
	header('location: profile.php?id=' . $post['profile_id']);
	exit;
}

function comment($post)
{
	global $conn;

	if(!$_SESSION['logged_in'])
	{
		$_SESSION['message'] = 'Please log in to leave a comment.';
		header('location: index.php');
		exit;
	}
	$new_comment_sql = "INSERT INTO comments (messages_id, users_id, content, created_at, modified_at) VALUES(" . $conn->real_escape_string($post['message_id']) . "," . $conn->real_escape_string($_SESSION['id']) . ", '" . $conn->real_escape_string($post['new_comment']) . "', NOW(), NOW())";
	$new_comment_query = $conn->query($new_comment_sql);

	if(!$new_comment_query)
	{
		$_SESSION['error'] = true;
		$_SESSION['message'] = 'There was a problem adding your comment.';
	}
	else
	{
		$_SESSION['message'] = 'Your comment has been posted!';
	}
	header('location: profile.php?id=' . $post['profile_id']);
	exit;
}

function delete_comment($post)
{
	global $conn;

	if(!$_SESSION['logged_in'])
	{
		$_SESSION['message'] = 'You must be logged in to delete a comment.';
		header('location: index.php');
		exit;
	}
	$remove_comment_sql = "UPDATE comments SET display_flag = 0 WHERE id = " . $conn->real_escape_string($post['comment_id']);
	$remove_comment_query = $conn->query($remove_comment_sql);

	if(!$remove_comment_query)
	{
		$_SESSION['error'] = true;
		$_SESSION['message'] = 'There was a problem removing your comment.';
	}
	else
	{
		$_SESSION['message'] = 'Your comment has been removed.';
	}
	header('location: profile.php?id=' . $post['profile_id']);
	exit;
}

if(isset($_POST['register']))
{
	register($_POST);
}
elseif(isset($_POST['login']))
{
	login($_POST);
}
elseif(isset($_POST['post_message']))
{
	message($_POST);
}
elseif(isset($_POST['post_comment']))
{
	comment($_POST);
}
elseif(isset($_POST['message_delete']))
{
	delete_message($_POST);
}
elseif(isset($_POST['comment_delete']))
{
	delete_comment($_POST);
}
	header('location: index.php');
	exit;
?>