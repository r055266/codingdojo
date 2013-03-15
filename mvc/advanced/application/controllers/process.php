<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('main.php');

class Process extends Main {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
	}

	public function login()
	{
		// $this->form_validation->set_rules('email', 'Email', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		// enable this functin to debug mysql and see performace statistics.
		// $this->output->enable_profiler(true);

		$result = $this->User_model->authenticate();
		
		if($this->form_validation->run() === false)
		{
			$this->view_data['meta'] = array(
									array('description', 'content' => 'Signin Page'),
									array('keywords', 'content' => 'signin')
									);

			$this->view_data['title'] = 'Login Failed';
			$this->load->view('signin', $this->view_data);
		}
		elseif(count($result) == 1)
		{
			$this->view_data['meta'] = array(
									array('description', 'content' => 'Dashboard Page to locate users'),
									array('keywords', 'content' => 'dashbboard, users')
									);

			$this->load->view('signin');

			$user = array('id' => $result[0]->id,
							'email' => $result[0]->email,
						  'first_name' => $result[0]->first_name,
						  'last_name' => $result[0]->last_name,
						  'user_level' => $result[0]->user_level,
						  'logged_in' => true);

			$this->session->set_userdata('user_session', $user);
			
			$login_redirect = 'dashboard';
			if($result[0]->user_level == 'admin')
			{
				$login_redirect = 'dashboard/admin';
			}

			redirect(base_url($login_redirect));
		}
		else
		{
			$this->view_data['meta'] = array(
						array('description', 'content' => 'Signin Page'),
						array('keywords', 'content' => 'signin')
						);
			$this->view_data['title'] = 'Login Failed';
			$this->view_data['login_error'] = 'Incorrect Login or Password';
			$this->load->view('signin', $this->view_data);
		}
	}

	public function registration()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		
		$this->view_data['meta'] = array(
									array('description', 'content' => 'Registration Page'),
									array('keywords', 'content' => 'register')
									);	

		if($this->form_validation->run() === false)
		{		
			$this->view_data['title'] = 'Registration Failed';
			$this->load->view('register', $this->view_data);
		}
		else
		{
			$this->User_model->register();
			
			$this->view_data['title'] = 'Registration Success';
			$this->view_data['success'] = "You have successfully registered! Please login to see your page!";

			$this->load->view('register', $this->view_data);
		}
	}

	function edit_information($id)
	{
		if($this->form_validation->run('edit_information') === false)
		{	
			$this->view_data['meta'] = array(
									array('description', 'content' => 'Editing Users Page'),
									array('keywords', 'content' => 'editing users')
									);
			$this->view_data['title'] = 'User Edit Failed';
			$this->view_data['user'] = $this->User_model->user($id);
			$this->load->view('edit', $this->view_data);
		}
		else
		{
			$admin = FALSE;
			if($this->view_data['session']['user_level'] == 'admin')
			{
				$admin = TRUE;
			}

			$this->view_data['success'] = "You have successfully update your information.";

			$this->load->view('users/edit/'.$id, $this->view_data);
		}

	}
}

?>