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

	public function validation_level()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$this->db->select("akses");
		$this->db->from($this->tablename);
		$this->db->where($this->tablename.'username', $username);
		$this->db->where($this->tablename.'password', $password);
		$this->db->join('users_akses', 'users.id_akses = users_akses.id');

		return $level = $this->db->get()->result();
	}

	function validation_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get($this->tablename);

		foreach ($this->validation_level->level as $row) {
			$level = $row['akses'];
		}

		if($result->num_rows() > 1)
			{
				foreach ($result->row_array() as $row) {
					$data = array(
								  'username' => $row->username,
								  'password' => $row->password,
								  'id' => $row->id,
								  'level' => $level
								  );
				}

				$this->session->userdata($data);
			}
	}
}