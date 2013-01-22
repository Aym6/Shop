<?php

class home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('parser');
		$this->load->library('session');
		$this->load->model('AccountsModel', 'AccountsManager');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu');
	}
	public function logout()
	{
		if($this->session->userdata('pseudo'))
		{
			$this->session->sess_destroy();
		}
		redirect('home');
	}
	public function login()
	{
		$post = $this->input->post();//test
		if(isset($post['ndc']))
		{
			$this->AccountsManager->connect(htmlspecialchars($post['ndc']), htmlspecialchars($post['mdp']));
		}
		redirect('home');
	}





}