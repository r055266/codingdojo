<?php
require('include/conn.php');

date_default_timezone_set('America/Los_Angeles');

function register($post)
{
	global $conn;

	foreach ($post as $key => $value) {
		
		if(empty($value))
		{
			$DATA['error'][$key] = 'Required fields must not be blank';
			continue;
		}

		switch($key)
		{
			case 'email':
				$email = $value;
				if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL))
				{
					$DATA['error'][$key] = 'Invalid email';
				}
			break;
			case 'birth_date':
				$date = explode('/', $value);
				if(!checkdate($date[0], $date[1], $date[2]))
				{
					$DATA['error'][$key] = 'Please put date in correct format MM/DD/YYYY.';
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
					$DATA['error'][$key] = 'Password must contain at least 6 characters.';
				}
			break;
			case 'confirm_password':
				if($value !== $password)
				{
					$DATA['error'][$key] = 'Password does not match.';
				}
			break;
			default;
				if(!preg_match('@^[a-zA-Z]+$@', $value) && ($key != 'submit') && ($key != 'register'))
				{
					$label = explode('_', $key);
					$label_name = ucfirst($label[0]) . ' ' . ucfirst($label[1]);
					
					$DATA['error'][$key] = $label_name . ' includes characters that are not allowed';
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

	if(!isset($DATA['error']))
	{	
		$sql = "INSERT INTO users (email_address, first_name, last_name, password, birth_date, created_at, modified_at) VALUES ('" . $conn->real_escape_string($email) . "','" . $conn->real_escape_string($first_name) . "','" . $conn->real_escape_string($last_name) . "','" . md5($conn->real_escape_string($password)) . "','" . $conn->real_escape_string($birth_date) . "',NOW(),NOW())";

		$reg_query = $conn->query($sql);
		
		if(!$reg_query)
		{
			$DATA['message'] = 'There was a problem submitting your information into the database. Please contact <a href="">technical support.</a>';
		}
		else
		{
			$DATA['message'] = 'Thank you for submitting your information. Please login to start using PRAYISE!';
		}
	}
	else
	{
		$DATA['message'] = 'One or more errors occured in the fields below. Please correct and re-submit.';
	}

	return $DATA;
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

		$DATA['user_id'] = $user_info['id'];
	}
	else
	{
		$DATA['error']['login'] = 'Incorrect email or password.';
	}

	return $DATA;

}

function message($post)
{
	global $conn;

	$new_message_sql = "INSERT INTO messages (user_sent_id, user_reciever_id, content, created_at, modified_at) VALUES(" . $conn->real_escape_string($_SESSION['id']) . "," . $conn->real_escape_string($post['profile_id']) . ", '" . $conn->real_escape_string($post['new_message']) . "', NOW(), NOW())";
	$new_message_query = $conn->query($new_message_sql);

	if(!$new_message_query)
	{
		$DATA['error'] = true;
		$DATA['message'] = 'There was a problem adding your message.';
	}
	else
	{
		$DATA['message'] = 'Your message has been posted!';
	}

	return $DATA;
}	

function delete_message($post)
{
	global $conn;

	$remove_message_sql = "UPDATE messages SET display_flag = 0 WHERE id = " . $conn->real_escape_string($post['message_id']);
	$remove_message_query = $conn->query($remove_message_sql);

	$remove_comment_sql = "UPDATE comments SET display_flag = 0 WHERE messages_id = " . $conn->real_escape_string($post['message_id']);
	$remove_comment_query = $conn->query($remove_comment_sql);

	if(!$remove_message_query && !$remove_comment_query)
	{
		$DATA['error'] = true;
		$DATA['message'] = 'There was a problem removing your message.';
	}
	else
	{
		$DATA['message'] = 'Your message has been removed.';
	}

	return $DATA;
}

function comment($post)
{
	global $conn;

	$new_comment_sql = "INSERT INTO comments (messages_id, users_id, content, created_at, modified_at) VALUES(" . $conn->real_escape_string($post['message_id']) . "," . $conn->real_escape_string($_SESSION['id']) . ", '" . $conn->real_escape_string($post['new_comment']) . "', NOW(), NOW())";
	$new_comment_query = $conn->query($new_comment_sql);

	if(!$new_comment_query)
	{
		$DATA['error'] = true;
		$DATA['message'] = 'There was a problem adding your comment.';
	}
	else
	{
		$DATA['message'] = 'Your comment has been posted!';
	}

	return $DATA;
}

function delete_comment($post)
{
	global $conn;

	$remove_comment_sql = "UPDATE comments SET display_flag = 0 WHERE id = " . $conn->real_escape_string($post['comment_id']);
	$remove_comment_query = $conn->query($remove_comment_sql);

	if(!$remove_comment_query)
	{
		$DATA['error'] = true;
		$DATA['message'] = 'There was a problem removing your comment.';
	}
	else
	{
		$DATA['message'] = 'Your comment has been removed.';
	}

	return $DATA;
}

if(isset($_POST['register']))
{
	echo json_encode(register($_POST));
}
elseif(isset($_POST['login']))
{
	echo json_encode(login($_POST));
}
elseif(isset($_POST['post_message']))
{
	echo json_encode(message($_POST));
}
elseif(isset($_POST['post_comment']))
{
	echo json_encode(comment($_POST));
}
elseif(isset($_POST['message_delete']))
{
	echo json_encode(delete_message($_POST));
}
elseif(isset($_POST['comment_delete']))
{
	echo json_encode(delete_comment($_POST));
}
	// header('location: index.php');
	// exit;
?>