<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard page</title>

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
	        <div class="hero-unit">
	        	<a class="pull-right" href="process.php?logout=true">log out</a>
				<h1>Dashboard</h1>
				<div class="row">
					<div class="span9">
					<?php
						if(isset($_SESSION['user']))
						{
							foreach($_SESSION['user'] as $key => $value)
							{
								if($key == 'balance')
								{
									$key = 'Account Balance';
									$value = '$'.$value;
								}
								$key = ucwords($key);

								echo '<p>'.$key.' : '.$value.'</p>';
							}
						}
					?>
					</div>
				</div>
				<div class="row">
					<div class="span9">
						<h2>Withdraw</h2>
						<form action="process.php" method="post">
							<select name="withdraw">
								<option value="100">$100</option>
								<option value="200">$200</option>
								<option value="300">$300</option>
							</select>
							<input type="hidden" name="account_withdraw">
							<input type="submit" name="submit" value="Withdraw">
						</form>
					</div>
				</div>
			</div><!-- end hero-unit -->
		</div><!-- end container -->
	</body>
</html>