<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	protected $view_data = array();
	protected $user_access = array();
	protected $admin = FALSE;
	protected $logged_in = FALSE;

	public function __construct()
	{
		parent::__construct();

		$this->view_data['session'] = $this->session->userdata('user_session');

		// set default meta and title for pages that
		// won't require their own.
		$this->view_data['title'] = 'EnergCloud';
		$this->view_data['meta'] = array(
							array('description', 'content' => 'Dedicated to making the world a sustainable place'),
							array('keywords', 'content' => 'Energy, Environment, Technology, Renewable')
							);
		// setting user access levels.
		// this is just a reference. Access levels
		// can only be added in the database.
		$this->user_access['admin'] = 1;
		$this->user_access['normal'] = 2;

		// check to see if user logged in has admin privleges
		if($this->view_data['session']['user_level'] == 'admin')
		{
			$this->admin = TRUE;
		}

		if($this->view_data['session']['logged_in'] === TRUE)
		{
			$this->logged_in = TRUE;
		}

		date_default_timezone_set('America/Los_Angeles');

		// enable this functin to debug mysql and see performace statistics.
		//$this->output->enable_profiler(true);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}

}
?>