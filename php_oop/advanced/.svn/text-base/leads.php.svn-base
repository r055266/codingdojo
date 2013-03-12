<?php
	require_once('classes/class_lib.php');
	$leads = new Leads();
	$sites = new Sites();
	$users = new Users();
	
	$get = false;
	if(!empty($_GET))
	{
		$leads->process_lead_search($_GET);
		$get = true;
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Leads Page</title>
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
		<script type="text/javascript">
			$(function(){
				var client_select = '#leads_filter select[name="client_id"]';
				var site_select = '#leads_filter select[name="site_id"]';

				$(client_select).change(function(){
					$(site_select).val($(site_select + " option:first").val());
					$('#leads_filter').submit();
				});
				$(site_select).change(function(){
					$(client_select).val($(client_select + " option:first").val());
					$('#leads_filter').submit();					
				});
				$('#leads_filter').submit(function(){
					$.post(
							$(this).attr('action'),
							$(this).serialize(),
							function(data){
								$('#start_date, #end_date').val('');
								console.log(data);
								$('#page_content').html(data);
							},
							"json"
						);
					return false;
				})
				$('#start_date, #end_date').datepicker();				
			})
		</script>
	</head>
	<body>
		<div id="main_content" class="wrapper">
			<ul id="tabs">
				<li class="not_selected"><a href="users.php">Users</a></li>
				<li class="not_selected"><a href="sites.php">Sites</a></li>
				<li class="selected">Leads</li>
			</ul>
			<div id="tab_box">
				<div id="header">
					<form id= "leads_filter" action="process.php" method="post">
						<h3>Filter: </h3>
						<div id="filter">
							<?php
								echo $users->get_users_select();
								echo '<span>OR</span>';
								echo $sites->get_sites_select();
							?>
						</div><!-- end filter -->
						<div id="select_date">
							<input type="text" name="start_date" id="start_date" placeholder="lead start date">
							<input type="text" name="end_date" id="end_date" placeholder="lead end date">
							<input type="submit" name="submit" value="Search Lead Dates">
						</div><!-- end select_date -->
					</form>
				</div><!-- end header -->	
				<div id="page_content">
					<? 
						echo $leads->get_leads_table();
					?>
				</div><!-- end page_content -->
			</div>
		</div><!-- end main_content -->
	</body>
</html>