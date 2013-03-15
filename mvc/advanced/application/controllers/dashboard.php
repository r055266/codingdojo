<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('main.php');

class Dashboard extends Main {
	
	protected $user_level = 'normal';
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('table');
		$this->load->model('User_model');
		

		$tmpl = array('table_open' => '<table class="table table-striped">');
		$this->table->set_template($tmpl);

		if(!$this->view_data['session']['logged_in'])
		{
			redirect(base_url('signin'));
		}
		elseif($this->view_data['session']['user_level'] == 'admin')
		{
			$this->user_level = 'admin';
		}
	}

	function index()
	{
		if($this->user_level == 'admin')
		{
			redirect(base_url('dashboard/admin'));
		}

		// Add meta tags for this page here 
		$this->view_data['meta'] = array(
									array('description', 'content' => 'User Dashboard'),
									array('keywords', 'content' => 'dashboard')
									);

		// Add title to be displayed in the browser tab. 
		
		$this->view_data['title'] = 'User Dashboard';

		// Add any additinoal stylesheets here.
		// $this->view_data['links'] = array(asset_url('css/style.css'));

		// Add any additional javascript files here.
		// $this->view_data['scripts'] = array(asset_url('js/sample_js.js'));

		$this->view_data['table'] = $this->table->generate($this->User_model->users());

		// load the view and pass the view data
		$this->load->view('dashboard', $this->view_data);

	}

	function admin()
	{
		if($this->user_level != 'admin')
		{
			redirect(base_url('dashboard'));
		}

		// Add meta tags for this page here 
		$this->view_data['meta'] = array(
									array('description', 'content' => 'Admin Dashboard'),
									array('keywords', 'content' => 'dashboard')
									);

		// Add title to be displayed in the browser tab. 
		
		$this->view_data['title'] = 'Admin Dashboard';

		// Add any additinoal stylesheets here.
		// $this->view_data['links'] = array(asset_url('css/style.css'));

		// Add any additional javascript files here.
		// $this->view_data['scripts'] = array(asset_url('js/sample_js.js'));

		$this->load->model('User_model');
		$this->view_data['table'] = $this->table->generate($this->User_model->admin_users());
		$this->view_data['admin'] = true;

		// load the view and pass the view data
		$this->load->view('dashboard', $this->view_data);
	}
}