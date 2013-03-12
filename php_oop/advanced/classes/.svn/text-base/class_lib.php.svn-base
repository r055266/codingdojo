<?php
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/Los_Angeles');
class Main
{
	protected $db_host;
	protected $db_user;
	protected $db_pass;
	protected $db_name; 

	var $conn;

	function __construct($db_name = 'lead_gen_business_new')
	{
		$this->db_host = '127.0.0.1';
		$this->db_user = 'root';
		$this->db_pass = 'Slalom#6';
		$this->db_name = $db_name;

		$this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name) or die('Could not connect to database');
	}

	function title_fancy($explode_char, $title_ugly)
	{
		$title_fancy = str_replace($explode_char, ' ', $title_ugly); 
		$title_fancy = ucwords($title_fancy);

		return $title_fancy;
	}

	function fetch_record($sql)
	{
		$query = $this->conn->query($sql);
		$result = $query->fetch_assoc();

		return $result;
	} 

	function fetch_all($sql)
	{
		$data = array();
		$query = $this->conn->query($sql);
		while($result = $query->fetch_assoc())
		{
			$data[] = $result;
		}

		return $data;
	}

	function return_table($table_array)
	{
		$count = 0;
		$table_header = '<table>';
		$table_header .= '<thead>';
		$table_body = '</thead><tbody>';

		foreach($table_array as $row)
		{
			$row_class = ' class="odd_row"';
			
			if($count%2 == 0)
			{
				$row_class = ' class="even_row"';
			}

			$table_body .= '<tr' . $row_class . '>';

			foreach($row as $column_name => $column_value)
			{
				if($count == 0)
				{
					$table_header .= '<th>' . $this->title_fancy('_', $column_name) . '</th>';
				}

				$table_body .= '<td>' . $column_value . '</td>';
			}

			$table_body .= '</tr>';
			$count++;
		}

		$table_body .= '</tbody>';
		$table_body .= '</table>';

		$table_display = $table_header.$table_body;
		
		return $table_display;
	}

	function return_select($select_option, $option_value_key, $option_name_key, $select_array)
	{
		$select = '<select name="' . $option_value_key . '">';
		$select .= '<option value= "" selected>' . $select_option . '</option>';
		
		foreach($select_array as $option_value)
		{
				$select .= '<option value="' . $option_value[$option_value_key] .'">' . $option_value[$option_name_key] . '</option>';
		}

		$select .= '</select>';

		return $select;
	}
}

class Sites extends Main
{
	function get_all_sites()
	{
		$sql = "SELECT id site_id, domain_name site_name 
				FROM sites";
		$data = $this->fetch_all($sql);

		return $data;
	}

	function get_sites_select()
	{
		$data = $this->get_all_sites();

		$users_select = $this->return_select('Select Site', 'site_id', 'site_name', $data);
		
		return $users_select;
	}

	function get_sites_table()
	{
		$sql = "SELECT sites.id site_ID, sites.domain_name domain_name, DATE(sites.created_datetime) created_datetime, CONCAT(clients.first_name, ' ', clients.last_name) client_name, CONCAT('<a href=\"leads.php?site_id=', sites.id, '\">See All Leads') Actions
				FROM sites
				JOIN clients ON sites.client_id = clients.id
				ORDER BY sites.id";
		$data = $this->fetch_all($sql);

		return $this->return_table($data);
	}
}

class Users extends Main
{
	function get_all_users()
	{
		$sql = "SELECT id client_id, CONCAT(first_name, ' ', last_name) client_name
				FROM clients";
		$data = $this->fetch_all($sql);

		return $data;
	}

	function get_users_select()
	{
		$data = $this->get_all_users();

		$users_select = $this->return_select('Select Client', 'client_id', 'client_name', $data);
		
		return $users_select;
	}

	function get_users_table()
	{
		$sql = "SELECT id client_id, first_name, last_name, email, DATE(joined_datetime) joined_datetime, CONCAT('<a href=\"leads.php?client_id=', id, '\">View Leads') actions FROM clients";
		
		$data = $this->fetch_all($sql);

		return $this->return_table($data);
	}

}

class Leads extends Main
{
	private $client_id;
	private $site_id;
	private $start_date;
	private $end_date;
	private $add_query;

	function set_client_id($client_id)
	{
		$this->client_id = $client_id;
	}

	function get_client_id()
	{
		return $this->client_id;
	}

	function set_site_id($site_id)
	{
		$this->site_id = $site_id;
	}

	function get_site_id()
	{
		return $this->site_id;
	}

	function set_start_date($start_date)
	{
		$this->start_date = $start_date;
	}

	function get_start_date()
	{
		return $this->start_date;
	}

	function set_end_date($end_date)
	{
		$this->end_date = $end_date;
	}

	function get_end_date()
	{
		return $this->end_date;
	}

	function set_add_query($add_query)
	{
		$this->add_query = $add_query;
	}

	function get_add_query()
	{
		return $this->add_query;
	}

	function process_lead_search($posted_values)
	{
		$filter = false;
		$date = false;
		$this->add_query = '';
		
		if(!empty($posted_values['site_id']))
		{	
			$this->set_site_id($posted_values['site_id']);
			$filter = " site_id = " . $this->get_site_id();
		}
		else if(!empty($posted_values['client_id']))
		{
			$this->set_client_id($posted_values['client_id']);
			$filter = " client_id = " . $this->get_client_id();
		}

		if($filter)
		{
			$this->add_query = " WHERE" . $this->conn->real_escape_string($filter); 
		}

		if(!empty($posted_values['start_date']))
		{
			$this->set_start_date($posted_values['start_date']);
			
			if($filter)
			{
				$this->add_query .= " AND ";
			}
			else
			{
				$this->add_query .= " WHERE ";
			}
			$this->add_query .= "registered_datetime > '" . date('Y-m-d', strtotime($this->conn->real_escape_string($this->get_start_date()))) . "'";
		}

		if(!empty($posted_values['end_date']))
		{
			$this->set_end_date($posted_values['end_date']);
			$this->add_query .= " AND registered_datetime < '" . date('Y-m-d', strtotime($this->conn->real_escape_string($this->get_end_date()))) . "'";
		}
	}

	function get_leads_table()
	{
		$sql = "SELECT leads.id lead_id, leads.first_name lead_first_name, leads.last_name lead_last_name, DATE(leads.registered_datetime) registered_date, leads.email email_address, sites.domain_name site_name, clients.first_name client_first_name, clients.last_name client_last_name
				FROM leads
				JOIN sites ON sites.id = leads.site_id
				JOIN clients ON clients.id = sites.client_id";
		
		if($this->add_query)
		{
			$sql .= $this->add_query;
		}

		$data = $this->fetch_all($sql);

		return $this->return_table($data);
	}

}

?>