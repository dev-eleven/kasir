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
	public function product_in_delete($id){
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
	public function product_out_add(){
		$params = array();
		$params['results'] = $this->inventories->get_product();
		$this->load->view('inventories/product_out/add',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->add($send);
		}
	}
	public function product_out_update($id){
		$params = array();
		$params['results'] = $this->inventories->view($id);
		$params['product'] = $this->inventories->get_product();
		$this->load->view('inventories/product_out/update',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->update($send,$id);
		}
	}
	public function product_out_delete($id){
		$params = $this->inventories->view($id);
		$get_stock = $this->inventories->get_stock($params[0]['product_id']);
		$delete_stock =  $get_stock[0]['stock'] + $params[0]['quantity'];
		$data =[
			"stock" => $delete_stock
		];
		$this->products->update($params[0]['product_id'],$data);
		$this->inventories->delete($id);
		redirect(base_url('product_out'));
	}

	//Product Borrowed
	public function product_borrowed(){
		$count = $this->inventories->count_product_borrowed();
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
				"date_lent" => date("Y-m-d",strtotime($_POST['date_lent']))
			];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->inventories->product_borrowed($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->inventories->product_borrowed($limit,$offset,$search);
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
			$config['base_url'] = base_url().'product_borrowed';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('inventories/product_borrowed/index',$params);
	}
	public function product_borrowed_add(){
		$params = array();
		$params['results'] = $this->inventories->get_product();
		$this->load->view('inventories/product_borrowed/add',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->add($send);
		}
	}
	public function product_borrowed_update($id){
		$params = array();
		$params['results'] = $this->inventories->view($id);
		$params['product'] = $this->inventories->get_product();
		$this->load->view('inventories/product_borrowed/update',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->update($send,$id);
		}
	}
	public function product_borrowed_delete($id){
		$this->inventories->delete($id);
		redirect(base_url('product_borrowed'));
	}

	//Product Returned
	public function product_returned(){
		$count = $this->inventories->count_product_returned();
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
				"date_back" => date("Y-m-d",strtotime($_POST['date_back']))
			];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->inventories->product_returned($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->inventories->product_returned($limit,$offset,$search);
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
			$config['base_url'] = base_url().'product_returned';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('inventories/product_returned/index',$params);
	}
	public function product_returned_add(){
		$params = array();
		$params['results'] = $this->inventories->get_product();
		$this->load->view('inventories/product_returned/add',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->add($send);
		}
	}
	public function product_returned_update($id){
		$params = array();
		$params['results'] = $this->inventories->view($id);
		$params['product'] = $this->inventories->get_product();
		$this->load->view('inventories/product_returned/update',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->update($send,$id);
		}
	}
	public function product_returned_delete($id){
		$this->inventories->delete($id);
		redirect(base_url('product_returned'));
	}

	//Product Broken
	public function product_broken(){
		$count = $this->inventories->count_product_broken();
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
				"date_broken" => date("Y-m-d",strtotime($_POST['date_broken']))
			];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->inventories->product_broken($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->inventories->product_broken($limit,$offset,$search);
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
			$config['base_url'] = base_url().'product_broken';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('inventories/product_broken/index',$params);
	}
	public function product_broken_add(){
		$params = array();
		$params['results'] = $this->inventories->get_product();
		$this->load->view('inventories/product_broken/add',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->add($send);
		}
	}
	public function product_broken_update($id){
		$params = array();
		$params['results'] = $this->inventories->view($id);
		$params['product'] = $this->inventories->get_product();
		$this->load->view('inventories/product_broken/update',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->update($send,$id);
		}
	}
	public function product_broken_delete($id){
		$params = $this->inventories->view($id);
		$get_stock = $this->inventories->get_stock($params[0]['product_id']);
		$delete_stock =  $get_stock[0]['stock'] + $params[0]['quantity'];
		$data =[
			"stock" => $delete_stock
		];
		$this->products->update($params[0]['product_id'],$data);
		$this->inventories->delete($id);
		redirect(base_url('product_broken'));
	}

	//Product Broken
	public function product_lost(){
		$count = $this->inventories->count_product_lost();
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
				"date_lost" => date("Y-m-d",strtotime($_POST['date_lost']))
			];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->inventories->product_lost($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->inventories->product_lost($limit,$offset,$search);
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
			$config['base_url'] = base_url().'product_lost';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('inventories/product_lost/index',$params);
	}
	public function product_lost_add(){
		$params = array();
		$params['results'] = $this->inventories->get_product();
		$this->load->view('inventories/product_lost/add',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->add($send);
		}
	}
	public function product_lost_update($id){
		$params = array();
		$params['results'] = $this->inventories->view($id);
		$params['product'] = $this->inventories->get_product();
		$this->load->view('inventories/product_lost/update',$params);
		if (isset($_POST['button'])) {
			$send = $_POST;
			$this->update($send,$id);
		}
	}
	public function product_lost_delete($id){
		$params = $this->inventories->view($id);
		$get_stock = $this->inventories->get_stock($params[0]['product_id']);
		$delete_stock =  $get_stock[0]['stock'] + $params[0]['quantity'];
		$data =[
			"stock" => $delete_stock
		];
		$this->products->update($params[0]['product_id'],$data);
		$this->inventories->delete($id);
		redirect(base_url('product_lost'));
	}

	//Reports
	public function report(){
		$params = array();
		$search = array();
		if (isset($_POST['search'])) {
			$date = explode('-', $_POST['date']);
			$search = [
				"start" => date("Y-m-d",strtotime($date[0])),
				"end" => date("Y-m-d",strtotime($date[1])),
				"product" => $_POST['product'],
				"price" => $_POST['price'],
				"status" => $_POST['status']
			];
			
			$count = $this->inventories->count_report($search);
			$limit 	= 10;
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$jumlah_data = $count[0]['total'];
			
			if ($jumlah_data > 0) {
				if (isset($_GET['per_page'])) {
					$params['results'] = $this->inventories->report($limit,$_GET['per_page'] - 1,$search);
				}else{
					$params['results'] = $this->inventories->report($limit,$offset,$search);
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
				$config['base_url'] = base_url().'inventories/reports';
				$config['total_rows'] = $jumlah_data;
				$config['per_page'] = $limit;
				$config['uri_segment'] = 3;

				$this->pagination->initialize($config);
				$params["links"] = $this->pagination->create_links();
			}

			$this->load->view('inventories/report',$params);
		} elseif (isset($_POST['print'])) {
			$date = explode('-', $_POST['date']);
			$search = [
				"start" => date("Y-m-d",strtotime($date[0])),
				"end" => date("Y-m-d",strtotime($date[1])),
				"product" => $_POST['product'],
				"price" => $_POST['price'],
				"status" => $_POST['status']
			];
			$params['results'] = $this->inventories->print_report($search);
			$params['periode'] = $_POST['date'];
			$params['status'] = $_POST['status'];

			$this->load->view("inventories/print",$params);
		} elseif (isset($_POST['excel'])) {
			$date = explode('-', $_POST['date']);
			$search = [
				"start" => date("Y-m-d",strtotime($date[0])),
				"end" => date("Y-m-d",strtotime($date[1])),
				"product" => $_POST['product'],
				"price" => $_POST['price'],
				"status" => $_POST['status']
			];
			$params['results'] = $this->inventories->print_report($search);

			$this->load->view("inventories/excel",$params);
		} else {
			$this->load->view('inventories/report');
		}
	}

	//Default
	function add($send){
		$params = [
			"product_id" => $send['product_id'],
			"quantity" => $send['quantity'],
			"unit_type" => $send['unit_type'],
			"price" => $send['price'],
			"date_in" => null,
			"date_out" => null,
			"date_lent" => null,
			"date_back" => null,
			"date_broken" => null,
			"date_lost" => null,
			"status" => $send['status'],
			"comment" => $send['comment']
		];
		if ($params['status'] == 1) {
			$params["date_in"] = date("Y-m-d",strtotime($send['date_in']));
			$add = $this->inventories->add($params);

			$get_stock = $this->inventories->get_stock($send['product_id']);
			$add_stock = $send['quantity'] + $get_stock[0]['stock'];
			$data = [
				"stock" => $add_stock
			];
			$this->products->update($send['product_id'],$data);

			redirect(base_url('product_in'));
		} elseif ($params['status'] == 2 || $params['status'] == 5 || $params['status'] == 6) {

			if ($params['status'] == 2) {
				$params["date_out"] = date("Y-m-d",strtotime($send['date_out']));
			} elseif ($params['status'] == 5) {
				$params["date_broken"] = date("Y-m-d",strtotime($send['date_broken']));
			} elseif ($params['status'] == 6) {
				$params["date_lost"] = date("Y-m-d",strtotime($send['date_lost']));
			}
			
			$add = $this->inventories->add($params);
			
			$get_stock = $this->inventories->get_stock($send['product_id']);
			$delete_stock = $get_stock[0]['stock'] -  $send['quantity'];
			$data = [
				"stock" => $delete_stock
			];

			$this->products->update($send['product_id'],$data);

			if ($params['status'] == 2) {
				redirect(base_url('product_out'));
			} elseif ($params['status'] == 5) {
				redirect(base_url('product_broken'));
			} elseif ($params['status'] == 6) {
				redirect(base_url('product_lost'));
			}		
		} else {

			if ($params['status'] == 3) {
				$params["date_lent"] = date("Y-m-d",strtotime($send['date_lent']));
			} elseif ($params['status'] == 4) {
				$params["date_back"] = date("Y-m-d",strtotime($send['date_back']));
			}

		  	$this->inventories->add($params);

		  	if ($params['status'] == 3) {
		  		redirect(base_url('product_borrowed'));
		  	} elseif($params['status'] == 4) {
		  		redirect(base_url('product_returned'));
		  	}
		}
	}
	function update($send,$id){
		$params = [
			"product_id" => $send['product_id'],
			"quantity" => $send['quantity'],
			"unit_type" => $send['unit_type'],
			"price" => $send['price'],
			"date_in" => null,
			"date_out" => null,
			"date_lent" => null,
			"date_back" => null,
			"date_broken" => null,
			"date_lost" => null,
			"status" => $send['status'],
			"comment" => $send['comment']
		];

		if ($params['status'] == 1) {
			$params["date_in"] = date("Y-m-d",strtotime($send['date_in']));
			$first = $this->inventories->get_inventorie($id);

			if ($first[0]['product_id'] == $params['product_id']) {
				$stock = $this->inventories->get_stock($send['product_id']);
				$stock_old = $stock[0]['stock'] - $first[0]['quantity'];
				$total = $stock_old + $send['quantity'];
				$data = [
					"stock" => $total
				];
				$this->products->update($send['product_id'],$data);
			} elseif ($first[0]['product_id'] != $params['product_id']) {
				$stock_false = $this->inventories->get_stock($first[0]['product_id']);
				$return_stock = $stock_false[0]['stock'] - $first[0]['quantity'];
				$return = [
					"stock" => $return_stock
				];
				$this->products->update_false($first[0]['product_id'],$return);

				$stock = $this->inventories->get_stock($send['product_id']);
				$total = $stock[0]['stock'] + $send['quantity'];
				$data = [
					"stock" => $total
				];
				$this->products->update($send['product_id'],$data);
			}

			$this->inventories->update($id,$params);
			redirect(base_url('product_in'));
		} elseif ($params['status'] == 2 || $params['status'] == 5 || $params['status'] == 6) {

			if ($params['status'] == 2) {
				$params["date_out"] = date("Y-m-d",strtotime($send['date_out']));
			} elseif ($params['status'] == 5) {
				$params["date_broken"] = date("Y-m-d",strtotime($send['date_broken']));
			} elseif ($params['status'] == 6) {
				$params["date_lost"] = date("Y-m-d",strtotime($send['date_lost']));
			}

			$first = $this->inventories->get_inventorie($id);

			if ($first[0]['product_id'] == $params['product_id']) {
				$stock = $this->inventories->get_stock($send['product_id']);
				$stock_old = $stock[0]['stock'] + $first[0]['quantity'];
				$total = $stock_old - $send['quantity'];
				$data = [
					"stock" => $total
				];
				$this->products->update($send['product_id'],$data);
			} elseif ($first[0]['product_id'] != $params['product_id']) {
				$stock_false = $this->inventories->get_stock($first[0]['product_id']);
				$return_stock = $stock_false[0]['stock'] + $first[0]['quantity'];
				$return = [
					"stock" => $return_stock
				];
				$this->products->update_false($first[0]['product_id'],$return);

				$stock = $this->inventories->get_stock($send['product_id']);
				$total = $stock[0]['stock'] - $send['quantity'];
				$data = [
					"stock" => $total
				];
				$this->products->update($send['product_id'],$data);
			}

			$this->inventories->update($id,$params);
			if ($params['status'] == 2) {
				redirect(base_url('product_out'));
			} elseif ($params['status'] == 5) {
				redirect(base_url('product_broken'));
			} elseif ($params['status'] == 6) {
				redirect(base_url('product_lost'));
			}
		} else {
			if ($params['status'] == 3) {
				$params["date_lent"] = date("Y-m-d",strtotime($send['date_lent']));
			} elseif ($params['status'] == 4) {
				$params["date_back"] = date("Y-m-d",strtotime($send['date_back']));
			}

		  	$this->inventories->update($id,$params);

		  	if ($params['status'] == 3) {
		  		redirect(base_url('product_borrowed'));
		  	} elseif($params['status'] == 4) {
		  		redirect(base_url('product_returned'));
		  	}
		}
	}



}
