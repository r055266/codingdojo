<?php
	session_start();
	
	function register($post)
	{
		foreach ($post as $key => $value)
		{
			if(empty($value) && $key != 'register')
			{
				$_SESSION['error'][$key] = 'Required fields must not be blank';
				continue;
			}
			if($key == 'email')
			{
					if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL))
					{
						$_SESSION['error'][$key] = 'Invalid email';
					}
					else
					{
						$_SESSION['user'][$key] = $value;
					}
			}
			elseif($key != 'submit' && $key != 'register')
			{
				$_SESSION['user'][$key] = $value;
			}
		}
	}

	function update_balance($post)
	{
		if(isset($_SESSION['user']['balance']))
		{
			$_SESSION['user']['balance'] = $_SESSION['user']['balance'] - $post['withdraw'];	
		}
		
	}

	if(isset($_GET['logout']))
	{
		session_destroy();
		$_SESSION[] = array();
		header('location: index.php');
		exit;
	}

	if(isset($_POST['account_withdraw']))
	{
		update_balance($_POST);
	}
	elseif(isset($_POST['register']))
	{
		register($_POST);
	}

	if(!isset($_SESSION['error']))
	{
		header('location: dashboard.php');
		exit;
	}
	else
	{
		header('location: index.php');
		exit;
	}

?>