<?php

class Model_register extends CI_Model {
	public function __construct()
        {
                parent::__construct();
        }
	public function register()
	{
		$user = $this->input->post('username');
		$pw = $this->input->post('password');
		$name = $this->input->post('name');
		$code = $this->input->post('code');
		if(strlen($code)!=11 or !ctype_digit($code) or strlen($user) < 3 or strlen($pw) < 5 or strlen($name) < 3)
		{
			return "invalid";
		}
		$sql = "SELECT * FROM kasutaja WHERE username = \"" . $user . "\";";
		$query = $this->db->query($sql);
		if($query->num_rows()==1)
			return "exists";
		$mdpw = md5($pw);
		$sql = "INSERT INTO kasutaja (Isikukood, Nimi, Valitud, Username, Password) VALUES (?,?,0,?,?);";
		$query = $this->db->query($sql,array($code,$name,$user,$mdpw));
		return "success";
	}
}

?>