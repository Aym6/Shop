<?php

class ProductsModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function count()
	{
		return $this->db->query('SELECT id FROM products')->num_rows();
	}
	public function getAll()
	{
		return $this->db->select('id, name, description, price')
						 ->from('products')
						 ->order_by('price')
						 ->get()
						 ->result();
	}
}