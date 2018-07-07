<?php

class InventorieController extends CI_Controller{
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('status') != 'login') {
			$this->session->set_flashdata('login_gagal','silakan login terlebih dahulu.');
			redirect(base_url());
		}
	}

	//Product In
	public function product_in(){
		$count = $this->inventories->count_product_in();
		$params = array();
		$limit 	= 10;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$jumlah_data = $count[0]['total'];
		$search = array();

		if (isset($_POST['search'])) {
			$search = [
				"product" => $_POST['product'],
				"price" => $_POST['price'],
				"quantity" => $_POST['quantity'],
				"date_in" => date("Y-m-d",strtotime($_POST['date_in']))
			];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->inventories->product_in($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->inventories->product_in($limit,$offset,$search);
			}

			$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';

	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';

	        $config['full_tag_open']    = '<ul class="pagination pagination-sm no-margin pull-right">';
	        $config['full_tag_close']   = '</ul>';

	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';

	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';

	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';

	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';

	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';

	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';

			$config['num_links'] = 2;
			$config['page_query_string'] = TRUE;
			$config['use_page_numbers'] = TRUE;
			$config['base_url'] = base_url().'product_in';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('inventories/product_in/index',$params);
	}
	public function product_in_add(){
		$params = array();
		$params['results'] = $this->inventories->get_product();
		$this->load->view('inventories/product_in/add',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->add($send);
		}
	}
	public function product_in_update($id){
		$params = array();
		$params['results'] = $this->inventories->view($id);
		$params['product'] = $this->inventories->get_product();
		$this->load->view('inventories/product_in/update',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->update($send,$id);
		}
	}
	public function delete_product_in($id){
		$params = $this->inventories->view($id);
		$get_stock = $this->inventories->get_stock($params[0]['product_id']);
		$delete_stock =  $get_stock[0]['stock'] - $params[0]['quantity'];
		$data =[
			"stock" => $delete_stock
		];
		$this->products->update($params[0]['product_id'],$data);
		$this->inventories->delete($id);
		redirect(base_url('product_in'));
	}

	//Product Out
	public function product_out(){
		$count = $this->inventories->count_product_out();
		$params = array();
		$limit 	= 10;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$jumlah_data = $count[0]['total'];
		$search = array();

		if (isset($_POST['search'])) {
			$search = [
				"product" => $_POST['product'],
				"price" => $_POST['price'],
				"quantity" => $_POST['quantity'],
				"date_out" => date("Y-m-d",strtotime($_POST['date_out']))
			];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->inventories->product_out($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->inventories->product_out($limit,$offset,$search);
			}

			$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';

	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';

	        $config['full_tag_open']    = '<ul class="pagination pagination-sm no-margin pull-right">';
	        $config['full_tag_close']   = '</ul>';

	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';

	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';

	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';

	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';

	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';

	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';

			$config['num_links'] = 2;
			$config['page_query_string'] = TRUE;
			$config['use_page_numbers'] = TRUE;
			$config['base_url'] = base_url().'product_out';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('inventories/product_out/index',$params);
	}

	function add($send){
		if ($send['status'] == 1) {
			$params = [
				"product_id" => $send['product_id'],
				"quantity" => $send['quantity'],
				"unit_type" => $send['unit_type'],
				"price" => $send['price'],
				"date_in" => date("Y-m-d",strtotime($send['date_in'])),
				"status" => $send['status'],
				"comment" => $send['comment']
			];
			$add = $this->inventories->add($params);
			if ($add) {
				$get_stock = $this->inventories->get_stock($send['product_id']);
				$add_stock = $send['quantity'] + $get_stock[0]['stock'];
				$data = [
					"stock" => $add_stock
				];
				$this->products->update($send['product_id'],$data);
				redirect(base_url('product_in'));
			}
		}
	}
	function update($send,$id){
		if ($send['status'] == 1){
			$params = [
				"product_id" => $send['product_id'],
				"quantity" => $send['quantity'],
				"unit_type" => $send['unit_type'],
				"price" => $send['price'],
				"date_in" => date("Y-m-d",strtotime($send['date_in'])),
				"status" => $send['status'],
				"comment" => $send['comment']
			];
			$this->inventories->update($id,$params);
			$get_stock = $this->inventories->get_stock($send['product_id']);
			$add_stock = $get_stock[0]['stock'] + $send['quantity'];
			$data = [
				"stock" => $add_stock
			];
			$this->products->update($send['product_id'],$data);
			redirect(base_url('product_in'));
			
		}
	}

}
