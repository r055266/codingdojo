<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo asset_url('css/style.css'); ?>">
</head>
<body>
	<p>Login</p>
	<div id="login">
		<?php echo form_open('login/process_login'); ?>
			<label for="email">Email</label>
			<input type="text" name="email">
			<label for="">Password</label>
			<input type="password" name="password">
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
	<p>Register</p>
	<div id="registration">
		<?php echo form_open('login/process_registration'); ?>
			<label for="email">Email:</label>
			<?php echo form_error('email'); ?>
			<input type="text" name="email">
			<label for="first_name">First Name:</label>
			<?php echo form_error('first_name'); ?>
			<input type="text" name="first_name">
			<label for="last_name">Last Name:</label>
			<?php echo form_error('last_name'); ?>
			<input type="text" name="last_name">
			<label for="password">Password:</label>
			<?php echo form_error('password'); ?>
			<input type="password" name="password">
			<label for="passconf">Confirm Password:</label>
			<?php echo form_error('passconf'); ?>
			<input type="password" name="passconf">
			<input type="submit" name="submit" value="Register">
		</form>
	</div>
</body>
</html>