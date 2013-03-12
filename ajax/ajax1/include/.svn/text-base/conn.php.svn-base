<?php
session_start();

	$db_host = '127.0.0.1';
	$db_user = 'root';
	$db_pass = 'Slalom#6';
	$db_name = 'prayise';

	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name) or die('Could not connect to database');

	function fetch_record($sql)
	{
		global $conn;

		$query = $conn->query($sql);
		$result = $query->fetch_assoc();

		return $result;
	} 

	function fetch_all($sql)
	{
		global $conn;

		$data = array();

		$query = $conn->query($sql);
		while($result = $query->fetch_assoc())
		{
			$data[] = $result;
		}

		return $data;
	}
?>