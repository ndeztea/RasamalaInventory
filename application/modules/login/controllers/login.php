<?php  
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
* 
*/
class login extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('logins');
	}

	public function index(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE){
			$this->template->render('login/view');
		}
		else
		{
			$this->logins->validation_login();
			print_r($this->session->all_userdata());
		}
	}
}
