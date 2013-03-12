<?php
include_once('include/header.php');

	if($_SESSION['logged_in'])
	{
		header('location: profile.php?id=' . $_SESSION['id']);
	}

	$error = false;

	if(isset($_SESSION['error']))
	{
		$error = true;
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Account Registration</title>
	<link rel="stylesheet" href="css/style.css">
</head>
	<body>
		<div id="main_content">
			<div id="header">
				<div id="header_bar" class="wrapper">
					<img src="images/prayise_big.gif" alt="Prayise Logo">
					<?php echo display_login(); ?>
					<div class="clear"></div>
				</div>
			</div>
			<div id="page_content" class="wrapper">
				<h1>Create a Prayise Account!</h1>
				<img src="images/prayer-hands.gif" alt="Prayer Hands">
					<?php
						if(isset($_SESSION['message']))
						{
							$class = 'success';
							if($error)
							{
								$class = 'error';
							}
							echo '<h3 class="' . $class . '">' . $_SESSION['message'] . '</h3>';
						}
					?>
				<p>Please fill out the form below to register.</p>
				<div id="form">
					<p><span 
						<? 
							if($error)
							{
								echo ' class="required"';
							}
						?>
						>&#42;</span> Required Fields</p>
					<form action="process.php" method="post" id="registration">
						<?php
							$entry_array = array('email', 'first_name', 'last_name', 'password', 'confirm_password', 'birth_date');
							$entry_builder = '';

							foreach($entry_array as $entry) 
							{
								$field_error = '';
								$entry_class = '';

								if(isset($_SESSION['error'][$entry]))
								{
									$entry_class = ' entry_error'; 
									$field_error = 'class="required"';
									$entry_builder .= '<p class="error_message">' . $_SESSION['error'][$entry] . '</p>';
								}

								$entry_builder .= '<div class="form_entry' . $entry_class . '">';
								$entry_builder .= '<label for="' . $entry . '">';
								$label = explode('_', $entry);
								$label_name = ucfirst($label[0]);
								
								if($label[1])
								{
									$label_name .= ' ' . ucfirst($label[1]);
								}

								$entry_builder .= '<span ';
								$entry_builder .= $field_error;
								$entry_builder .= '>&#42;</span>' . $label_name . ':';
								$entry_builder .= '</label>';
								
								$type = 'text';

								if($entry == 'password' || $entry == 'confirm_password')
								{
									$type = 'password';
								}

								$entry_builder .= '<input type="' . $type . '" name="' . $entry . '">';
								$entry_builder .= '</div>';
							}

							$entry_builder .='<input type="hidden" name="register" value="1">';
							$entry_builder .= '<input type="submit" name="submit" value="Create Account">';
							echo $entry_builder;
						?>
					</form>
				</div><!-- end form -->
			</div><!-- end page_content -->
			<div class="clear"></div>
		</div><!-- end main_content -->
	</body>
</html>
<?php
	$_SESSION = array();
?>