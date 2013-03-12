<?
function add_states($states = array(), $loop_style = 'for')
{
	if($loop_style == 'for')
	{	
		for($i = 0; $i < count($states); $i++)
		{
			$option .= '<option name="state" value="' . $states[$i] . '">' . $states[$i] . '</option>';
		}
	}
	if($loop_style == 'foreach')
	{
		foreach($states as $state)
		{
			$option .= '<option name="state" value="' . $state . '">' . $state . '</option>';
		}
	}
	
	return $option;
}

function add_select($option)
{
	$select .= '<label for="state">State:</label>';
	$select .= '<select>';
	$select .= $option;
	$select .= '</select>';

	return $select;
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>php test</title>
		<meta charset="UTF-8" />
		<meta name="keywords" content="php test, php first doc" />
		<meta name="description" content="this is the first php assignment!" />
	</head>
	<div id="main_content">
			<form action="process.php" method="post">
				<label for="first_name">First Name:</label>
				<input type="text" name="first_name" />
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" />
				<label for="address">Address:</label>
				<input type="text" name="address" />
				<label for="city">City:</label>
				<input type="text" name="city" />
					<?php
						$states = array('CA', 'WA', 'VA', 'UT', 'AZ');
						$option = add_states($states);
						echo add_select($option);

						$states = array('CA', 'WA', 'VA', 'UT', 'AZ');
						$option = add_states($states, 'foreach');
						echo add_select($option);

						$states = array('CA', 'WA', 'VA', 'UT', 'AZ', 'NJ', 'NY', 'DE');
						$option = add_states($states);
						echo add_select($option);						
					?>
				<label for="zip">Zip:</label>
				<input type="text" name="zip" />
				<input type="submit" value="Submit" />
			</form>
	</div>
</html>