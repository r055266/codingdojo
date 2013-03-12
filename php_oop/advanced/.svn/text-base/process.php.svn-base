<?php
	require_once('classes/class_lib.php');

	$leads = new Leads();
	$leads->process_lead_search($_POST);

	echo json_encode($leads->get_leads_table());

?>