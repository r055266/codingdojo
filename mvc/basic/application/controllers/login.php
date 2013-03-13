<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('main.php');

class Login extends Main {

	public function process_login()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('email_login', 'Email', 'trim|required');
		$this->form_validation->set_rules('password_login', 'Password', 'trim|required');
		
		// enable this functin to debug mysql and see performace statistics.
		// $this->output->enable_profiler(true);

		$this->load->model('User_model');
		$result = $this->User_model->authenticate();
		
		if($this->form_validation->run() === false)
		{
			$this->load->view('user_login');
		}
		elseif(count($result) == 1)
		{
			$user = array('id' => $result[0]->id,
							'email' => $result[0]->email,
						  'first_name' => $result[0]->first_name,
						  'last_name' => $result[0]->last_name,
						  'login_status' => true);

			$this->session->set_userdata('user_session', $user);
			
			redirect(base_url('login/welcome'));
		}
		else
		{
			$this->view_data['login_error'] = 'Incorrect Login or Password';
			$this->load->view('user_login', $this->view_data);
		}
	}

	public function process_registration()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|md5');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	
		if($this->form_validation->run() === false)
		{
			$this->load->view('user_login');
		}
		else
		{
			$this->load->model('User_model');
			$this->User_model->register();
			$this->view_data['success'] = "You have successfully registered! Please login to see your page!";

			$this->load->view('user_login', $this->view_data);
		}
	}

	public function index()
	{
		$this->load->library('form_validation');

		$this->load->view('user_login');
	}

	public function welcome()
	{
		$this->load->view('welcome', $this->view_data);
	}
}

?>