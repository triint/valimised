<?php

class Pages extends CI_Controller 
{
	public function view($page = 'home')
	{
		
		$this->load->library('session');
		$this->load->library('user_agent');
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
			show_404();
        }
		include "lang.php";
		$data['title'] = ucfirst($page); 
		
		switch($page)
		{
			case "addcandidate":
				$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
				if(!isset($this->session->userdata['user']))
					redirect(base_url());
				$this->load->model('Model_statistics');
				if($this->Model_statistics->isCandidate($this->session->userdata['user']->Isikukood))
					redirect(base_url()."index.php/candidates");
				
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('area', 'Area', 'required');
				$this->form_validation->set_rules('party', 'Party', 'required');
				$data['areas'] = $this->Model_statistics->getAreas();
				$data['parties'] = $this->Model_statistics->getParties();
				if ($this->form_validation->run() === FALSE)
				{
					$this->load->view('pages/addcandidate', $data);
				}
				else
				{
					$this->Model_statistics->addCandidate($this->session->userdata['user']->Isikukood);
					redirect(base_url() . "index.php/candidates");
				}
				break;
			case "candidates":
				$this->load->view('templates/header', $data);
				$this->load->view('templates/menu', $data);
				$this->load->model('Model_statistics');
				$data['areas'] = $this->Model_statistics->getAreas();
				$data['parties'] = $this->Model_statistics->getParties();
				$data['query'] = $this->Model_statistics->getCandidates($this->input->get('name',true),$this->input->get('party',true),$this->input->get('area',true));
				//echo $this->input->get('txt');
				if(isset($this->session->userdata['user']))
				{
					$this->load->helper('form');
					$this->load->library('form_validation');
					$this->form_validation->set_rules('candidate', 'Candidate', 'required');
					
					
					$data['iscandidate'] = $this->Model_statistics->isCandidate($this->session->userdata['user']->Isikukood);
					if ($this->form_validation->run() === FALSE)
					{
						$this->load->view('pages/candidates', $data);
					}
					else
					{
						$this->Model_statistics->vote();
						redirect(base_url() . "index.php/candidates");
					}
				}
				else
				{
					//$data['query'] = $this->Model_statistics->getCandidates();
					$data['iscandidate']=-1;
					$this->load->view('pages/'.$page, $data);
				}
				break;
			case "statistics":
				$this->load->view('templates/header', $data);
				$this->load->view('templates/menu', $data);
				$this->load->model('Model_statistics');
				$data['query'] = $this->Model_statistics->getVotes();
				$this->load->view('pages/'.$page, $data);
				break;
			case "statistics2":
				$this->load->model('Model_statistics');
				$data['query'] = $this->Model_statistics->getVotes();
				//$data['areavotes'] = $this->Model_statistics->getAreaVotes(array('Keskerakond','Eestimaa Rohelised'));
				$data['areavotes'] = $this->Model_statistics->getAreaVotes($this->Model_statistics->getParties());
				$data['areas'] = $this->Model_statistics->getAreas();
				$this->load->view('pages/statistics2', $data);
				break;
			case "login":
				$this->load->view('templates/header', $data);
				$this->load->view('templates/menu', $data);
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				if ($this->form_validation->run() === FALSE)
				{
					$this->load->view('pages/login', $data);
				}
				else
				{
					$this->load->model('Model_login');
					$result = $this->Model_login->login();
					if($result)
						redirect(base_url());
					else
						$this->load->view('pages/login', $data);
				}
				break;
			case "register":
			$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('username', $str_username[$lang], 'required');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[64]');
				$this->form_validation->set_rules('password2', 'Password', 'required|matches[password]');
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('code', 'Code', 'required|min_length[11]|max_length[11]');
				
				if ($this->form_validation->run() === FALSE)
				{
					$this->load->view('pages/register', $data);
				}
				else
				{
					$this->load->model('Model_register');
					$result = $this->Model_register->register();
					if($result=="success")
						redirect(base_url() . "index.php/login");
					elseif($result=="exists")
					{
						$data['errormsg'] = "Username already taken";
						$this->load->view('pages/register', $data);
					}
					elseif($result=="invalid")
					{
						$data['errormsg'] = "Invalid input";
						$this->load->view('pages/register', $data);
					}
					else
					{
						$data['errormsg'] = "Error";
						$this->load->view('pages/register', $data);
					}
				}
				break;
			case "logout":
				$this->session->unset_userdata('user');
				redirect(base_url());
				break;
			case "home":
				$this->load->model('Model_statistics');
				if(isset($this->session->userdata['user']))
					$data['iscandidate'] = $this->Model_statistics->isCandidate($this->session->userdata['user']->Isikukood);
				else
					$data['iscandidate']=-1;
				$this->load->view('templates/header', $data);
				$this->load->view('templates/menu', $data);
				$this->load->view('pages/'.$page, $data);
				break;
			default:
			
			$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
				$this->load->view('pages/'.$page, $data);
				break;
		}
       
		
        
        
		
        $this->load->view('templates/footer', $data);
	}
}