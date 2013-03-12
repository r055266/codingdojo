<?php
include_once('include/header.php');

	if(isset($_SESSION['logged_in']))
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
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#login_form, #registration').submit(function(){
				$.post(
						$(this).attr('action'),
						$(this).serialize(),
						function(data){
							$('.error_message, .error, .success').remove();
							$('.entry_error').removeClass('entry_error');
							error = false;
							login_error = false;
							if(typeof data.error != 'undefined'){
								error = true;
								for (var name in data.error){
									console.log(name);
									if(name == 'login'){
										login_error = true;
										$('#login_form').before('<p class="error_message">' + data.error.login + '</p>');
									}else{
										console.log($('#registration input[name=' + name + ']').parent().addClass('entry_error').before('<p class="error_message">' + data.error[name] + '</p>'));
									}
								}

							}
							else if(typeof data.user_id != 'undefined'){
								document.location.href='profile.php?id=' + data.user_id;
							}
							if(!login_error){
								if(error){
									$('#page_content img').after('<h3 class="error">' + data.message + '</h3>');
								}
								else{
									$('#page_content img').after('<h3 class="success">' + data.message + '</h3>');
								}
							}

						},
						"json"
					);
				return false;
			})
		})
	</script>
</head>
	<body>
		<div id="main_content">
			<div id="header">
				<div id="header_bar" class="wrapper">
					<img src="images/prayise_big.gif" alt="Prayise Logo">
					<? echo display_login(); ?>
					<div class="clear"></div>
				</div>
			</div>
			<div id="page_content" class="wrapper">
				<h1>Create a Prayise Account!</h1>
				<img src="images/prayer-hands.gif" alt="Prayer Hands">
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
								$entry_builder .= '<div class="form_entry">';
								$entry_builder .= '<label for="' . $entry . '">';
								$label = explode('_', $entry);
								$label_name = ucfirst($label[0]);
								
								if($label[1])
								{
									$label_name .= ' ' . ucfirst($label[1]);
								}

								$entry_builder .= '<span>&#42;</span>' . $label_name . ':';
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