<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('main.php');

class Users extends Main {
	
	function __construct()
	{
		parent::__construct();

		$this->load->library('table');
		
		$tmpl = array('table_open' => '<table class="table table-striped">');
		$this->table->set_template($tmpl);
	}

	function index()
	{
		$this->load->view('login', $this->view_data);
	}

	function register()
    {
	    if(!empty($_POST))
	    {
	        $u = new User();

	        $u->email = $this->input->post('email');
	        $u->first_name = $this->input->post('first_name');
	        $u->last_name = $this->input->post('last_name');
	        $u->password = $this->input->post('password');
	        $u->confirm_password = $this->input->post('confirm_password');
	        $current_time = date('Y-m-d H:i:s', time());
	        $u->created_at = $current_time;
	        $u->modified_at = $current_time;

	        // Attempt to save the user into the database
	        if ($u->save())
	        {
	            $user = array('email' => $u->email,
						            'first_name' => $u->first_name,
						            'last_name' => $u->last_name,
						            'password' => $u->password,
						            'confirm_password' => $u->confirm_password,
						            'logged_in' => TRUE
						            );

				$this->session->set_userdata('user_session', $user);

				$this->view_data['success'] = 'You have successfully created your account!';
				redirect(base_url('dashboard'));
	        }
	        else
	        {
	            // Show all error messages
	            $errors = array('email' => $u->error->email,
					            'first_name' => $u->error->first_name,
					            'last_name' => $u->error->last_name,
					            'password' => $u->error->password,
					            'confirm_password' => $u->error->confirm_password
					            );
	            $this->view_data['error'] = $errors;
	            $this->load->view('register', $this->view_data);
	       }
	    }
	    else
	    {
	    	$this->load->view('register', $this->view_data);
	    }
    }

	function login()
	{
		if(!empty($_POST))
		{
			$u = new User();
			$u->email = $this->input->post('email');
			$u->password = $this->input->post('password');

			if($u->login())
			{
				redirect(base_url('dashboard'));
			}
			else
			{
				
				$this->view_data['error'] = $u->error->string;

				$this->load->view('login', $this->view_data);
			}
		}
		else
		{
			$this->load->view('login', $this->view_data);
		}
	}

	function dashboard()
	{
		$u = new User();	
		$u->select_func('DATE_FORMAT', array('@time_record/log_in', '[,]','%b %D %Y %l:%i %p'), 'time_record_time_in');
		$u->select_func('CONCAT', array('[DATE_FORMAT(`time_records`.`log_out`, \'%b %D %Y %l:%i %p\')]','[,]',' ','[,]','(','[,]','[DATE_FORMAT(`time_records`.`log_in`, \'%b %D %Y\')]','[,]',')'),'time_record_time_out');
		$u->order_by('time_record_log_in', 'desc');
		$u->include_related('time_record');
		$u->where("`time_records`.`log_in` IS NOT NULL AND `time_records`.`log_out` IS NOT NULL");
		$result = $u->get()->all_to_array(array('first_name','last_name','time_record_time_in', 'time_record_time_out', 'time_record_notes'));
		$this->table->set_heading(array('First Name', 'Last Name', 'Time In', 'Time Out', 'Notes'));
		$this->view_data['table'] = $this->table->generate($result);
		$this->load->view('dashboard', $this->view_data);
	}
}

?>