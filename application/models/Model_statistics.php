<?php

class Model_statistics extends CI_Model {
	public function __construct()
        {
                parent::__construct();
        }
	public function getCandidates()
	{
		$sql = "SELECT * FROM kandidaat ORDER BY Partei ASC;";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function getVotes()
	{
		$sql = "SELECT DISTINCT(Partei) as Partei FROM kandidaat ORDER BY Partei ASC";
		$query = $this->db->query($sql);
		$parteiarray = array();
		$retarray = array();	
		$result=$query->result();
		foreach($result as $row) 
		{
			array_push($parteiarray,$row->Partei);
		}
		foreach($parteiarray as $val)
		{
			$sql = "SELECT COUNT(*) AS C FROM kandidaat JOIN kasutaja ON kandidaat.ID = kasutaja.Valitud WHERE Partei = '" . $val . "';";
			$query = $this->db->query($sql);
			$count=$query->result();
			array_push($retarray,array('Partei' => $val, 'Votes' => $count[0]->C));
		}
		return $retarray;
	}
	public function vote()
	{
		$id = $this->input->post('candidate');
		$userid=$this->session->userdata['user']->Valitud;
		if($userid==0)
			$this->session->userdata['user']->Valitud = $id;
		else
			$this->session->userdata['user']->Valitud= 0;
		$sql = "UPDATE kasutaja SET Valitud = " . $this->session->userdata['user']->Valitud . " WHERE ID = " . $this->session->userdata['user']->ID . ";";
		$this->db->query($sql);
	}
}

?>