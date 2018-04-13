<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index()
	{

		$data['products'] = $this->M_Products->getProducts();
		// var_dump($data);die();
		$this->load->view('products',$data);
	}
	public function insertProduct($data)
	{

		
	}
}
