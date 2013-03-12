<?php
	function get_max_and_min($number_array)
	{
		$output = array('max' => max($number_array), 'min' => min($number_array));

		return $output;
	}

	$number_array = array(rand(50, 1000), rand(50, 1000), rand(50, 1000), rand(50, 1000), rand(50, 1000));
	var_dump($number_array);
	$max_and_min = get_max_and_min($number_array);
	var_dump($max_and_min);
?>