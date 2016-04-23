<?php

class Model_login extends CI_Model {
	public function __construct()
        {
                parent::__construct();
        }
	public function login()
	{
		$user = $this->input->post('username');
		$pw = $this->input->post('password');
		$user = preg_replace('/[^A-Za-z0-9\. -]/', '', $user);
		$pw = preg_replace('/[^A-Za-z0-9\. -]/', '', $pw);
		$sql = "SELECT * FROM kasutaja WHERE username = \"" . $user . "\";";
		$query = $this->db->query($sql);
		if($query->num_rows()!=1)
			return false;
		$result = $query->result();
		
		if($result[0]->Password == md5($pw))
		{
			$result[0]->Password="";
			$this->session->set_userdata('user',$result[0]);
			return true;
		}
		echo "Wrong credentials";
		return false;
	}
}

?>