<?php

class User_model extends CI_Model{

	public function authenticate()
	{
		$sql = "SELECT users.*, access.user_level
				FROM users 
				JOIN access ON users.access_id = access.id
				WHERE users.email = ? AND users.password = ?";

		return $this->db->query($sql, array($this->input->post('email'), md5($this->input->post('password'))))->result();
	}

	public function register($admin = FALSE)
	{
		$user_level = 2;

		if($admin)
		{
			$user_level = 1;
		}
		$sql = "INSERT INTO users (email, first_name, last_name, password, access_id, created_at, modified_at) VALUES(?, ?, ?, ?, $user_level, NOW(), NOW())";
		$this->db->query($sql, array('email' => $this->input->post('email'), 'first_name' => $this->input->post('first_name'), 'last_name' => $this->input->post('last_name'), 'password' => $this->input->post('password')));
	}

	public function user($id)
	{
		$sql = "SELECT users.*, access.user_level 
				FROM users
				JOIN access ON users.access_id = access.id 
				WHERE users.id = ?";

		return $this->db->query($sql, array($id))->result(); 
	}

	public function users()
	{
		$user_link_start = '<a href=\"' . base_url() . 'users/show/';
		$user_link_mid = '\">';

		$sql = "SELECT users.id ID, CONCAT('" . $user_link_start . "',users.id, '" . $user_link_mid . "',users.first_name,' ',users.last_name,'</a>') Name, users.email, DATE_FORMAT(created_at, '%b %D %Y') created_at, access.user_level 
				FROM users 
				JOIN access ON users.access_id = access.id";

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

		$sql = "SELECT users.id ID, CONCAT('" . $user_link_start . "',users.id, '" . $user_link_mid . "',users.first_name,' ',users.last_name,'</a>') Name, users.email, DATE_FORMAT(created_at, '%b %D %Y') created_at, access.user_level, CONCAT('" . $edit_link_start . "',users.id, '" . $edit_link_mid . "','edit</a>',' ','" . $remove_link_start . "',users.id, '" . $remove_link_mid . "','remove</a>') actions  
				FROM users 
				JOIN access ON users.access_id = access.id";

		return $this->db->query($sql);
	}

	public function show_user($id)
	{
		$sql = "SELECT messages.id message_id, messages.user_sent_id message_sender_id, messages.content message, messages.created_at message_created, comments.id comment_id, comments.users_id comment_recieved_id, comments.content comment, comments.display_flag display_comment, comments.created_at comment_created, users.first_name message_first_name, users.last_name message_last_name, u2.first_name comment_first_name, u2.last_name comment_last_name
				FROM users 
				LEFT JOIN messages ON users.id = messages.user_sent_id 
				LEFT JOIN comments ON messages.id = comments.messages_id
				LEFT JOIN users u2 ON comments.users_id = u2.id 
				WHERE messages.user_reciever_id = ?
				AND messages.display_flag = 1
				ORDER BY messages.id DESC, messages.created_at DESC, comments.created_at ASC";
		// die(htmlentities($sql));
		return $this->db->query($sql, array($id));
	}

	function update_user($id, $update, $admin = FALSE)
	{
		switch($update)
		{
			case 'info':
				$sql = "UPDATE users SET email = ?, first_name = ?, last_name = ?";
				$posts = array($this->input->post('email'), $this->input->post('first_name'), $this->input->post('last_name'));
				if($admin)
				{
					$sql .= ", user_level = ?";
					$posts[] = $this->input->post('user_level');
				}
				$posts[] = $id;
				$sql .= ", modified_at = NOW() WHERE id = ?";
				if(!$this->db->query($sql, $posts))
				{
					return FALSE;
				}
			break;
			case 'pass':
				$sql = "UPDATE users SET password = ?, modified_at = NOW()";
				if(!$this->db->query($sql, array($this->input->post('password'))))
				{
					return FALSE;
				}	
			break;
			case 'desc':
				$sql = "UPDATE users SET description = ?, modified_at = NOW()";
				if($this->db->query($sql, array($this->input->post('description'))))
				{
					return FALSE;
				}
			break;
		}

		return TRUE;
	}
}

?>