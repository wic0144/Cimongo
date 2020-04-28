<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorise extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model');
		$this->load->model('products_model');

	}

	public function index($categoriesId)
	{
		$data['categories']=$this->categories_model->getAll();
		$condition=array(

		'categorise' => $this->mongo_db->create_document_id($categoriesId)

		);
		$data['product']=$this->products_model->findAll($condition);
		$this->load->view('layout/head');
		$this->load->view('layout/header');
		$this->load->view('categories/content',$data);
		$this->load->view('layout/left-menu');
		$this->load->view('layout/footer');
		$this->load->view('layout/foot');



	}
}
