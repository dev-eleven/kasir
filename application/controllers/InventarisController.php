<?php

class InventarisController extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('inventaris');
		$this->load->library('pagination');
	}

	public function index(){
		$params = array();
		$params['products'] = $this->inventaris->new_products();
		$params['hot'] = $this->inventaris->hot_drinks();
		$params['cold'] = $this->inventaris->cold_drinks();
		$params['food'] = $this->inventaris->food();
		$this->load->view('index',$params);
	}
}
