<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Products extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->products = "products";
	}

	function getProducts()
	{
		$query = $this->db->get($this->products);
		$query = $query->result_array();
		return $query;
    }
}