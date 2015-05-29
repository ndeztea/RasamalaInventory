<?php  if (!defined('BASEPATH'))  exit('No direct script access allowed');

		/**
		* 
		*/
		class login extends MY_Controller
		{
			
			function __construct()
			{
				parent::__construct();
				$this->load->model('login');
			}

			function index(){
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');

				if($this->form_validation->run() == FALSE){
					$this->template->render('login/view');
				}
				else
				{
					$this->login->validation_login();
					print_r($this->session->all_userdata());
				}
			}
		}
