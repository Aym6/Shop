<?php

class register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('AccountsModel', 'AccountsManager');
		$this->load->model('RegisterModel', 'RegisterManager');
		$this->load->database();
	}
	public function index()
	{
		$this->load->view('register/form');
	}
	public function trait()
	{
		$post = $this->input->post();
		if(isset($post['register']))
		{
			$ndc = htmlspecialchars($post['ndc']);
			$mdp = htmlspecialchars($post['password']);
			$mdp2 = htmlspecialchars($post['password2']);
			$cap = htmlspecialchars($post['cap']);
			if($mdp != $mdp2)
			{
				echo 'Mots de passes différents.';
			}
			else if($ndc == $mdp)
			{
				echo 'Choisissez un mot de passe différent du nom de compte !';
			}
			else if($cap != $this->session->userdata('captcha'))
			{
				echo 'Captcha incorrect.';
			}
			else if(!$this->RegisterManager->pseudoDispo($ndc))
			{
				echo 'Nom de compte déjà pris.';
			}
			else
			{
				$this->AccountsManager->create($ndc, $mdp);
				echo 'Compte créé';
			}
		}
		else
		{
			redirect('home');
		}
	}




}