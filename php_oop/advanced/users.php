<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Users Page</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
<?php
	require_once('classes/class_lib.php');
?>
	</head>
	<body>
		<div id="main_content" class="wrapper">
			<ul id="tabs">
				<li class="selected">Users</li>
				<li class="not_selected"><a href="sites.php">Sites</a></li>
				<li class="not_selected"><a href="leads.php">Leads</a></li>
			</ul>
			<div id="tab_box">
				<div id="page_content">
				<?php
					$users_table = new Users();
					echo $users_table->get_users_table();
				?>
				</div><!-- end page_content -->
			</div><!-- end tab_box -->
		</div><!-- end main_content -->
	</body>
</html>