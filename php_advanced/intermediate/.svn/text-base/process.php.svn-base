<?php
	session_start();

	foreach ($_POST as $key => $value) {
		
		if(empty($value))
		{
			$_SESSION['error'][$key] = 'Required fields must not be blank';
			continue;
		}

		switch($key)
		{
			case 'email':
				if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
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
				if(!preg_match('@^[a-zA-Z]+$@', $value) && ($key != 'submit'))
				{
					$label = explode('_', $key);
					$label_name = ucfirst($label[0]) . ' ' . ucfirst($label[1]);
					
					$_SESSION['error'][$key] = $label_name . ' includes characters that are not allowed';
				}
			break;
		}
	}

	if(!isset($_SESSION['error']))
	{
		$_SESSION['message'] = 'Thanks for submitting your information.';
	}
	else
	{
		$_SESSION['message'] = 'One or more errors occured in the fields below. Please correct and re-submit.';
	}

	header('location: index.php');
?>