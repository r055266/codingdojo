<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	protected $view_data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->view_data['session'] = $this->session->userdata('user_session');

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