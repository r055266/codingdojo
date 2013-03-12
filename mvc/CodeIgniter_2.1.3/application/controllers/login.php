<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// public function login()
	// {
	// 	$this->load->view('login');
	// }

	// public function process_new_account()
	// {
	// 	$this->load->library('form_validation');

	// 	$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[8]|xss_clean');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
	// 	$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
	// 	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

	// 	if($this->form_validation->run() === false)
	// 	{
	// 		echo validation_errors();
	// 	}
	// 	else
	// 	{
	// 		$user = array('id' => 1,
	// 					'email' =? 'friskslalom6@gmail.com',
	// 					'login_status' => true
	// 					);

	// 		$this->session->set_userdata('user_session', $user);
	// 		redirect(base_url('/user/profile'));
	// 	}
	// }

	// public function profile()
	// {
	// 	echo "Hello " . $this->user_session->['email'];
	// }

	// public function logout()
	// {
	// 	$this->session->sess_destroy();
	// 	redirect(base_url('/user/login'));
	// }
	public function process_login()
	{
		$this->db->get_where('users', array('email' => $this->input->post('email')));

		$this->session->set_userdata('user_session', $user);
	$this->session->set_userdata('user_session', $user);
	}

	public function process_registration()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	
		if($this->form_validation->run() === false)
		{
			$this->load->view('user_login');
		}
	}

	public function index()
	{
		$this->load->library('form_validation');

		$this->load->view('user_login');
	}


	public function welcome()
	{
		$this->load->view('welcome');
	}
}

?>