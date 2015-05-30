<?php

/**
* 
*/
class logins extends CI_Model
{
	private $tablename = "users";
	
	function __construct()
	{
		parent::__construct();
	}


	function validation_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$this->db->select("akses");
		$this->db->from($this->tablename);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->join('users_akses', 'users.id_akses = users_akses.id');
		$level = $this->db->get();

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get($this->tablename);

		foreach ($level->result() as $row) {
			$levels = $row->akses;
		}

		if($result->num_rows() > 0)
			{
				foreach ($result->result() as $row) {
					$data = array(
								  'username' => $row->username,
								  'password' => $row->password,
								  'id' => $row->id,
								  'level' => $levels
								  );
					$this->session->set_userdata($data);
				}
				return TRUE;
			}
		else
			{
				return FALSE;
			}
	}
}