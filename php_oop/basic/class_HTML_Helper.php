<?php

class HTML_Helper
{
	function print_table($table_array)
	{
		$count = 0;
		$table_header = '<table>';
		$table_header .= '<thead>';
		$table_body .= '</thead><tbody>';

		foreach($table_array as $row)
		{
			$table_body .= '<tr>';
			foreach($row as $column_name => $column_value)
			{
				if($count == 0)
				{
					$column_heading = explode('_', $column_name);
					$column_heading = ucfirst($column_heading[0]) . ' ' . ucfirst($column_heading[1]);

					$table_header .= '<th>' . $column_heading . '</th>';
				}

				$table_body .= '<td>' . $column_value . '</td>';
			}

			$table_body .= '</tr>';
			$count++;
		}

		$table_body .= '</tbody>';
		$table_body .= '</table>';

		$table_display = $table_header.$table_body;
		
		echo $table_display;
	}

	function print_select($state, $select_array)
	{
		$select = '<select name="state">';

		foreach($select_array as $option_value)
		{
			$select .= '<option value="' . $option_value .'">' . $option_value . '</option>';
		}

		$select .= '</select>';

		echo $select;
	}
}

?>