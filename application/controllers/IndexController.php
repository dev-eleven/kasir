<?php

class IndexController extends CI_Controller{
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('status') != 'login') {
			$this->session->set_flashdata('login_gagal','silakan login terlebih dahulu.');
			redirect(base_url());
		}
	}

	public function index(){
		$params = array();
		$params['suppliers'] = $this->index->suppliers();
		$params['members'] = $this->index->members();
		$params['menus'] = $this->index->menus();
		$params['products'] = $this->index->products();
		if (isset($_POST['Inventories'])) {
			$date = date("Y").'-'.$_POST['mont'];
			$params['in'] = $this->index->product_in($date);
			$params['out'] = $this->index->product_out($date);
			$params['borrowed'] = $this->index->product_borrowed($date);
			$params['returned'] = $this->index->product_returned($date);
			$params['broken'] = $this->index->product_broken($date);
			$params['lost'] = $this->index->product_lost($date);
			$this->load->view('index',$params);
		} else {
			$params['in'] = 0;
			$params['out'] = 0;
			$params['borrowed'] = 0;
			$params['returned'] = 0;
			$params['broken'] = 0;
			$params['lost'] = 0;
			$this->load->view('index',$params);
		}
	}
}
