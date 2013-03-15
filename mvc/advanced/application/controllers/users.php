<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('main.php');

class Users extends Main {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	private function _comment_form($id, $message_id)
	{	
		$comment_form = '<form id="new_comments" name="new_comments" action="process.php" method="post">';
		$comment_form .= '<div class="row">';
		$comment_form .= '<div class="span9">';
		$comment_form .= '<textarea class="span8 offset1" name="new_comment" id="comment" placeholder="leave a comment"></textarea>';
		$comment_form .= '</div>';
		$comment_form .= '<input type="hidden" name="message_id" value="'. $message_id .'">';
		$comment_form .= '<input type="hidden" name="profile_id" value="' . $id .'">';
		$comment_form .= '<input type="hidden" name="post_comment" value="1">';
		$comment_form .= '<div class="row">';
		$comment_form .= '<div class="span1 offset8">';
		$comment_form .= '<button class="btn btn-success" type="submit" name="submit">Post Comment</button>';
		$comment_form .= '</div>';
		$comment_form .= '</div>';
		$comment_form .= '</form>';

		return $comment_form;
	}

	private function _post_form($query, $id)
	{
		$previous_message = '';
		$count = $query->num_rows-1;
		$i = 0;

		$this->view_data['posts'] = '<form name="new_messages" action="process.php" method="post">';
		$this->view_data['posts'] .= '<div class="row">';
		$this->view_data['posts'] .= '<div class="span9">';
		$this->view_data['posts'] .= '<textarea class="span9" name="new_message" id="message" placeholder="leave a message..."></textarea>';
		$this->view_data['posts'] .= '</div>';
		$this->view_data['posts'] .= '</div>';
		$this->view_data['posts'] .= '<input type="hidden" name="profile_id" value="' . $id . '">';
		$this->view_data['posts'] .= '<input type="hidden" name="post_message" value="1">';
		$this->view_data['posts'] .= '<div class="row">';
		$this->view_data['posts'] .= '<div class="span1 offset8">';
		$this->view_data['posts'] .= '<button class="btn btn-success" type="submit">Post</button>';
		$this->view_data['posts'] .= '</div>';
		$this->view_data['posts'] .= '</div>';
		$this->view_data['posts'] .= '</form>';

		foreach($query->result() as $result)
		{
			if($result->message_id != $previous_message)
			{
				if($previous_message != '')
				{
					$this->view_data['posts'] .= $this->_comment_form($id, $previous_message);
					$this->view_data['posts'] .= '</div>';
				}
				
				$this->view_data['posts'] .= '<div class="message">';
				$this->view_data['posts'] .= '<div class="message_content">';
				$this->view_data['posts'] .= 	'<h4><a href="' . base_url('users/show/' . $result->message_sender_id) . '">' . $result->message_first_name . ' ' . $result->message_last_name . '</a> wrote ' . date('M d, Y H:i', strtotime($result->message_created)) . '</h4>';
				
				if($this->view_data['session']['id'] == $result->message_sender_id)
				{
					$this->view_data['posts'] .= '<form name="remove_message" action="process.php" method="post">';
					$this->view_data['posts'] .= '<input type="hidden" name="message_delete" value="1">';
					$this->view_data['posts'] .= '<input type="hidden" name="message_id" value="'. $result->message_id .'">';
					$this->view_data['posts'] .= '<input type="hidden" name="profile_id" value="' . $id .'">';
					$this->view_data['posts'] .= '<button class="btn btn-danger" type="submit" name="submit">Delete Message</button>';
					$this->view_data['posts'] .= '</form>';
				}
				$this->view_data['posts'] .= 	'<p>' . $result->message . '</p>';
				$this->view_data['posts'] .= '</div>';
			}

			if($result->comment != NULL && $result->display_comment == 1)
			{
				$this->view_data['posts'] .= '<div class="comment_content">';
				$this->view_data['posts'] .= '<h5><a href="' . base_url('users/show/' . $result->comment_recieved_id)  . '">' .$result->comment_first_name . ' ' . $result->comment_last_name . '</a> commented on ' . $result->message_first_name . ' ' . $result->message_last_name . '\'s message at ' . date('M d', strtotime($result->comment_created)) . '</h5>';
				if($this->view_data['session']['id'] == $result->comment_recieved_id)
				{
					$this->view_data['posts'] .= '<form name="remove_comment" action="process.php" method="post">';
					$this->view_data['posts'] .= '<input type="hidden" name="comment_delete" value="1">';
					$this->view_data['posts'] .= '<input type="hidden" name="comment_id" value="'. $result->comment_id .'">';
					$this->view_data['posts'] .= '<input type="hidden" name="profile_id" value="' . $id .'">';
					$this->view_data['posts'] .= '<button type="submit" class="btn btn-danger" name="submit">Delete Comment</button>';
					$this->view_data['posts'] .= '</form>';
				}
				$this->view_data['posts'] .= '<p>' . $result->comment .'</p>';
				$this->view_data['posts'] .= '</div>';
			}

			if($count == $i)
			{
				$this->view_data['posts'] .= $this->_comment_form($id, $result->message_id);
				$this->view_data['posts'] .= '</div>';
			}

			$previous_message = $result->message_id;
			$i++;
		}
	}

	function show($id='')
	{
		// Add meta tags for this page here 
		$this->view_data['meta'] = array(
									array('description', 'content' => 'Site User Profile'),
									array('keywords', 'content' => 'user, information')
									);

		// Add title to be displayed in the browser tab. 
		
		$this->view_data['title'] = 'User Information';

		// Add any additinoal stylesheets here.
		// $this->view_data['links'] = array(asset_url('css/style.css'));

		// Add any additional javascript files here.
		// $this->view_data['scripts'] = array(asset_url('js/sample_js.js'));

		$query = $this->User_model->show_user($id);
		$this->_post_form($query, $id);
		$this->view_data['user'] = $this->User_model->user($id);

		// load the view and pass the view data
		$this->load->view('users', $this->view_data);
	}

	function edit($id)
	{
				// Add meta tags for this page here 
		$this->view_data['meta'] = array(
									array('description', 'content' => 'Edit User Profile'),
									array('keywords', 'content' => 'user, edit, information')
									);

		// Add title to be displayed in the browser tab. 
		
		$this->view_data['title'] = 'Edit User Information';

		// Add any additinoal stylesheets here.
		// $this->view_data['links'] = array(asset_url('css/style.css'));

		// Add any additional javascript files here.
		// $this->view_data['scripts'] = array(asset_url('js/sample_js.js'));

		$query = $this->User_model->show_user($id);
		$this->_post_form($query, $id);
		$this->view_data['user'] = $this->User_model->user($id);

		// load the view and pass the view data
		$this->load->view('edit', $this->view_data);
	}
}