<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	protected $view_data = array();
	protected $user_session = NULL;

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->user_session = $this->session->user_data('user_session');
	// }

	public function login()
	{
		$this->load->view('login', $this->view_data);
	}

	public function users()
	{
		$this->load->model('User_model');
		$this->view_data['users'] = $this->User_model->get_users();

		$this->load->view('users', $this->view_data);
	}
}
?>