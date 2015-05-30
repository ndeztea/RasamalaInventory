<?php
	
		/**
		* 
		*/
		class logout extends MY_Controller
		{
			
			function __construct()
			{
				parent::__construct();
			}

			function index()
			{
				$this->session->sess_destroy();
				redirect(site_url('/login'));
			}
		}