<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('categories_model');
	}

	public function index()
	{
		$search=$this->input->get('search');
		$name=$this->input->get('name');
		$categories_id=$this->input->get('categories_id');
		$data['name']=$name;
		$data['search']=$search;
		$data['categories_id']=$categories_id;
		$condition=[];
		if(!empty($search)){
			if(!empty($name)){
				$condition['name']=array('$regex' => $name);
			}
			if(!empty($categories_id)){
				$condition['categorise']=$this->mongo_db->create_document_id($categories_id);
			}
		}
		$data['categories']=$this->categories_model->getAll();
		$data['product']=$this->products_model->findAll($condition);
		$this->load->view('layout/head');
		$this->load->view('layout/header');
		$this->load->view('products/content',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/foot');



	}
	public function create(){
		$data['categories']=$this->categories_model->getAll();
		$this->load->view('layout/head');
		$this->load->view('layout/header');
		$this->load->view('products/create/content',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/foot');
	}
	public function save()
	{
		$name=$this->input->post('name');
		$price=$this->input->post('price');
		$categorise=$this->input->post('categorise');
		
		$data =array(
			'name'=> $name,
			'price'=>$price,
			'categorise'=>$this->mongo_db->create_document_id($categorise),
		);
		$id=$this->products_model->insert($data);
		if(!empty($id)){
			
				$this->session->set_flashdata('msg', 'Products Added');
				redirect('products');
			}else
			echo "error";
	}
}
