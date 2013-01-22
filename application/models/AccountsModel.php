<?php

class AccountsModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function updatePoints($newvalue, $accountid)
	{
		$query = '
		UPDATE `accounts`
		SET `points` = ?
		WHERE `id` = ?
		';
		$data = array($newvalue, $accountid);
		$this->db->query($query, $data);
	}
	public function connect($ndc, $mdp)
	{
		$q = $this->db->get_where('accounts', array('username' => $ndc,  'password' => $mdp))->num_rows();
		if($q == 1)
		{
			$fields = $this->db->query('SELECT username, points FROM accounts WHERE username = ?', array($ndc))->row();
			$this->session->set_userdata('pseudo', $fields->username);
			$this->session->set_userdata('points', $fields->points);
		}
	}
	public function create($username, $password)
	{
		$query = '
		INSERT INTO accounts(username, password, points)
		VALUES
		(?, ?, 0)
		';
		$this->db->query($query, array($username,$password));
	}
	public function getField($field, $accountid)
	{
		return $this->db->select($field)
						->from('accounts')
						->where('id', $accountid)
						->get()
						->result();
	}
	public function delete($accountid)
	{
		$this->db->query('DELETE FROM accounts WHERE id = ?', array($accountid));
	}
}