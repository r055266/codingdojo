<?php

class User extends DataMapper {

	public $has_many = array('time_record');
	
	public $error_prefix = '<div class="alert alert-error">';
	public $error_suffix = '</div>';

	public $validation = array(
        'email' => array(
            'label' => 'Email Address',
            'rules' => array('required', 'trim', 'valid_email')
        ),
        'password' => array(
            'label' => 'Password',
            'rules' => array('required', 'min_length' => 8, 'encrypt')
        ),
        'confirm_password' => array(
            'label' => 'Confirm Password',
            'rules' => array('required', 'encrypt', 'matches' => 'password')
        ),
        'first_name' => array(
        	'label' => 'First Name',
        	'rules' => array('required', 'trim', 'xss_clean')
        ),
        'last_name' => array(
        	'label' => 'Last Name',
        	'rules' => array('required', 'trim', 'xss_clean')
        )
    );

   function login()
   {
   		$u = new User();

   		$u->where('email', $this->email)->get();

   		$this->salt = $u->salt;

   		$this->validate()->get();

   		if(empty($this->id))
   		{
   			$this->error_message('login', 'Email or password invalid');

   			return FALSE;
   		}
   		else
   		{
   			return TRUE;
   		}
   }

   function _encrypt($field)
   {
   		if(!empty($this->{$field}))
   		{
   			if(empty($this->salt))
   			{
   				$this->salt = md5(uniqid(rand(), TRUE));
   			}

   			$this->{$field} = sha1($this->salt . $this->{$field});
   		}
   }
}

?>