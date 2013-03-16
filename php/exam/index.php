<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Open a new account</title>
	<link rel="stylesheet" href="assets/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>

</head>
	<body>
	    <div class="container">
	        <!-- Main hero unit for a primary marketing message or call to action -->
	        <div class="hero-unit">		<h1>Open an account</h1>
				<form action="process.php" method="post">
					<?php 
						if(isset($_SESSION['error']['name']))
						{
							echo '<div class="alert alert-error">'  . $_SESSION['error']['name'] . '</div>';
						}
					 ?>
					<label for="name">Name:</label>
					<input type="text" name="name">
					<?php 
						if(isset($_SESSION['error']['email']))
						{
							echo '<div class="alert alert-error">'  . $_SESSION['error']['email'] . '</div>';
						}
					 ?>
					<label for="email" name="email">Email:</label>
					<input type="text" name="email">
					<label for="balance">Opening Balance:</label>
					<select name="balance">
						<option value="1000">1000</option>
						<option value="2000">2000</option>
						<option value="3000">3000</option>
						<option value="4000">4000</option>
						<option value="5000">5000</option>
					</select>
					<input type="hidden" name="register">
					<input class="btn" type="submit" name="submit" value="Open an account">
				</form>
			</div><!-- end hero-unit -->
		</div><!-- end container -->
	</body>
</html>
<?php
unset($_SESSION['error'], $_SESSION['user']);
?>