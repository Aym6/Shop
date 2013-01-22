<?php

class products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('ProductsModel', 'ProductsManager');
		$this->load->library(array('session', 'pagination', 'parser'));
	}
	public function index()
	{
		$this->view();
	}
	public function view($page = 1)
	{
		//echo $this->ProductsManager->count();
		$data = array(
		'products' => $this->ProductsManager->getAll(),
		'count' => $this->ProductsManager->count()
		);
		$this->parser->parse('products/view', $data);
	}
}