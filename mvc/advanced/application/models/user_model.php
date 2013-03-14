<?php

class User_model extends CI_Model{

	// public function authenticate()
	// {
	// 	$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
	// 	return $this->db->query($sql, array($this->input->post('email_login'), md5($this->input->post('password_login'))))->result();
	// }

	// public function register()
	// {
	// 	$sql = "INSERT INTO users (email, first_name, last_name, password, created, modified) VALUES(?, ?, ?, ?, NOW(), NOW())";
	// 	$this->db->query($sql, array('email' => $this->input->post('email'), 'first_name' => $this->input->post('first_name'), 'last_name' => $this->input->post('last_name'), 'password' => $this->input->post('password')));
	// }

	public function users()
	{
		$user_link_start = '<a href=\"' . base_url() . 'users/show/';
		$user_link_mid = '\">';

		$sql = "SELECT users.id ID, CONCAT('" . $user_link_start . "',users.id, '" . $user_link_mid . "',users.first_name,' ',users.last_name,'</a>') Name, users.email, DATE_FORMAT(created_at, '%b %D %Y') created_at, access.user_level FROM users JOIN access ON users.access_id = access.id";

		return $this->db->query($sql);
	}

	public function admin_users()
	{
		$user_link_start = '<a href=\"' . base_url() . 'users/show/';
		$user_link_mid = '\">';

		$edit_link_start = '<a href=\"' . base_url() . 'users/edit/';
		$edit_link_mid = '\">';

		$remove_link_start = '<a id="remove" href=\"' . base_url() . 'users/remove/';
		$remove_link_mid = '\">';

		$sql = "SELECT users.id ID, CONCAT('" . $user_link_start . "',users.id, '" . $user_link_mid . "',users.first_name,' ',users.last_name,'</a>') Name, users.email, DATE_FORMAT(created_at, '%b %D %Y') created_at, access.user_level, CONCAT('" . $edit_link_start . "',users.id, '" . $edit_link_mid . "','edit</a>',' ','" . $remove_link_start . "',users.id, '" . $remove_link_mid . "','remove</a>') actions  FROM users JOIN access ON users.access_id = access.id";

		return $this->db->query($sql);
	}
}

?>