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
	/*public function callonce($areas, $parties)
	{
		$firstnames = array("Kristjan", "Martin", "Mart", "Toomas", "Kadi", "Kadri", "Anna", "Peeter", "Joonas", "Vello", "Kati", "Mari-Ann", "Artur", "Henri", "Henrik", "Villu", "Jaak", "Jaanus", "Ants", "Rein", "Kaur", "Kauri", "Kristofer", "Kiur", "Lauri", "Evert", "Joosep", "Mari", "Lidia", "Vello", "Kertu");
		$lastnames = array("Tamm", "Pihlak", "Aed", "Taevas", "Goldberg", "Goldstein", "Schmit", "Saar", "Sepp", "Kask", "Kukk", "Rebane", "Ilves", "Koppel", "Petrov", "Pavlov", "Hansen", "Petersen", "Salo", "Weber", "Schulz", "Wagner", "Becker", "Hoffmann");
		$code = 00000000001;
		echo print_r($areas);
		for($i=0;$i<150;$i++)
		{
			//119-218
			$code = $code+1;
			$name = $firstnames[rand(0,count($firstnames)-1)] .  $lastnames[rand(0,count($lastnames)-1)];
			$party = $parties[rand(0,count($parties)-1)];
			$pw = "null";
			$sql = "INSERT INTO kasutaja (Isikukood, Valitud, Nimi, Username, Password) VALUES (?,?,?,?,?);";
			$query = $this->db->query($sql,array($code,rand(119,218),$name,$name,$pw)); 
		}
	}*/
}

?>