<?php
	function draw_stars($array)
	{
		foreach ($array as $value)
		{
			$count = $value;
			$char = '*';
			if(!is_numeric($value))
			{
				$count = strlen($value);
				$char = substr(strtolower($value), 0, 1);
			}

			for($i = 0; $i < $count; $i++)
			{
				$display .= $char;
			}
			$display .= "<br>";
		}
		return $display;
	}

	$array = array(rand(5, 25), "Mary", rand(5, 25), "Coding", rand(5, 25), "Dragons");
	echo draw_stars($array);
?>