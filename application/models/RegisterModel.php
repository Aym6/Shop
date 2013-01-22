<?php

class RegisterModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function pseudoDispo($pseudo)
	{
		return $this->db->get_where('accounts',  array('username' => $pseudo))->num_rows() == 0;
	}
}	