<?php

class User_model extends CI_Model{

	public function authenticate()
	{
		$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
		return $this->db->query($sql, array($this->input->post('email_login'), md5($this->input->post('password_login'))))->result();
	}

	public function register()
	{
		$sql = "INSERT INTO users (email, first_name, last_name, password, created, modified) VALUES(?, ?, ?, ?, NOW(), NOW())";
		$this->db->query($sql, array('email' => $this->input->post('email'), 'first_name' => $this->input->post('first_name'), 'last_name' => $this->input->post('last_name'), 'password' => $this->input->post('password')));
	}
}

?>