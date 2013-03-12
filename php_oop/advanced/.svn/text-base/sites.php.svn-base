<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sites Page</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<?php
			require_once('classes/class_lib.php');
		?>
	</head>
	<body>
		<div id="main_content" class="wrapper">
			<ul id="tabs">
				<li class="not_selected"><a href="users.php">Users</a></li>
				<li class="selected">Sites</li>
				<li class="not_selected"><a href="leads.php">Leads</a></li>
			</ul>
			<div id="tab_box">
				<div id="page_content">
					<?php
						$sites_table = new Sites();
						echo $sites_table->get_sites_table();
					?>
				</div><!-- end page_content -->
			</div><!-- tab_box -->
		</div><!-- end main_content -->
	</body>
</html>