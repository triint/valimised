<?php

class Model_statistics extends CI_Model {
	public function __construct()
        {
                parent::__construct();
        }
	public function getCandidates($name="",$party="",$area="")
	{
		$sql = "SELECT * FROM kandidaat WHERE LCASE(nimi) LIKE ? AND LCASE(partei) LIKE ? AND  LCASE(piirkond) LIKE ? ORDER BY Partei ASC, Nimi ASC;";
		$query = $this->db->query($sql,array("%".strtolower($name)."%","%".strtolower($party)."%","%".strtolower($area)."%"));
		$result = $query->result();
		//echo print_r($result);
		//array_push($result,array("Votes"=>$this->getCandidateVotes($result['ID'])));
		for($i = 0;$i<count($result);$i++)
		{
			//$result[$i]['Votes']=0;
			$votes = $this->getCandidateVotes($result[$i]->ID);
			$result[$i]->Votes=$votes[0]->C;
			//array_push($result,array("Votes"=>$this->getCandidateVotes($result['ID'])));
		}
		return $result;
		
	}
	public function getParties()
	{
		$parties = array("Keskerakond","Reformierakond","Isamaa ja Res Publica Liit","Eesti Konservatiivne Rahvaerakond","Sotsiaaldemokraatlik Erakond","Eesti Iseseisvuspartei", "Eestimaa Ühendatud Vasakpartei","Eestimaa Rohelised","Eesti Vabaduspartei – Põllumeeste Kogu","Eesti Vabaerakond","Rahva Ühtsuse Erakond");
		return $parties;
	}
	public function getAreas()
	{
		$areas = array("Tallinn", "Tartu");
		return $areas;
	}
	public function isCandidate($code)
	{
		$sql = "SELECT * FROM kandidaat WHERE isikukood=" . $code . ";";
		$query = $this->db->query($sql);
		if($query->num_rows()==1)
			return true;
		return false;
	}
	public function addCandidate($code)
	{
		if($this->isCandidate($code))
			return false;
		$area = $this->input->post('area');
		$party = $this->input->post('party');
		$sql = "INSERT INTO kandidaat (Isikukood, Nimi, Partei, Piirkond) VALUES (" . $code . ", \"" . $this->session->userdata['user']->Nimi . "\",\"" . $party . "\", \"" . $area . "\");";
		$query = $this->db->query($sql);
		$sql = "SELECT ID FROM kandidaat WHERE Isikukood=" . $code . ";";
		$query = $this->db->query($sql);
		$result = $query->result();
		$this->session->userdata['user']->Valitud = $result[0]->ID;
		$sql = "UPDATE kasutaja SET Valitud = " . $this->session->userdata['user']->Valitud . " WHERE ID = " . $this->session->userdata['user']->ID . ";";
		$this->db->query($sql);
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
	public function getCandidateVotes($candidate)
	{
		$sql = "SELECT COUNT(*) AS C FROM kandidaat JOIN kasutaja ON ?= kasutaja.Valitud AND kandidaat.ID=?";
		$query = $this->db->query($sql,array($candidate,$candidate));
		$count=$query->result();
		return $count;
	}
	public function getCandidatesVotes()
	{
		/*$sql = "SELECT COUNT(*) AS C, kandidaat.Nimi AS N FROM kandidaat JOIN kasutaja ON kandidaat.ID = kasutaja.Valitud ORDER BY kandidaat.Nimi ASC";
		$query = $this->db->query($sql);
		$count=$query->result();
		return $count;*/
		$sql = "SELECT * FROM kandidaat ORDER BY kandidaat.Nimi ASC;";
		$query = $this->db->query($sql);
		$names=$query->result();
		$arr = array();
		foreach($names as $name)
		{
			$sql = "SELECT COUNT(*) AS C FROM kandidaat JOIN kasutaja ON ?= kasutaja.Valitud AND kandidaat.ID=?;";
			$query = $this->db->query($sql,array(/*$name['ID']*/$name->ID,$name->ID));
			$count = $query->result();
			array_push($arr,array('N' => $name->Nimi,'C'=>$count[0]->C));
		}
		return $arr;
	}
	public function getAreaVotes($parties)
	{
		$partyarray = array();
		foreach($parties as $party)
		{
			$sql = "SELECT ID from kandidaat WHERE Partei=?";
			$query = $this->db->query($sql,array($party));
			$result = $query->result();
			
			$areavotes = array();
			foreach($result as $candidate)
			{
				$sql = "SELECT COUNT(*) AS C, kandidaat.Piirkond AS P FROM kandidaat,kasutaja WHERE kasutaja.Valitud  = ? AND kandidaat.ID = ?";
				$query = $this->db->query($sql,array($candidate->ID,$candidate->ID));
				$res = $query->result();
				$area = $res[0]->P;
				$count = $res[0]->C;
				$go = true;
				foreach($areavotes as $areas)
				{
					if($areas['Area']==$area)
					{
						$go=false;
						break;
					}
				}
				if($go)
				{
					array_push($areavotes,array('Area'=>$area,'Votes'=>$count));
				}
				else
				{
					$i=0;
					foreach($areavotes as $temparea)
					{
						if($temparea['Area']==$area)
						{
							$areavotes[$i]['Votes']+=$count;
						}
						$i++;
					}
				}
			}
			$temparr = array();
			foreach($areavotes as $temparea)
			{
				$temparr[$temparea['Area']] = $temparea['Votes'];
			}
			array_push($partyarray,array('Partei'=>$party, 'Data'=>$temparr));
		}
		return $partyarray;
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