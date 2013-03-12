<?php

class User_model extends CI_Model{

	public function get_users()
	{
		return $this->db->query("SELECT * FROM users")->result();
	}
}

?>