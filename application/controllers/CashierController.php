<?php

class CashierController extends CI_Controller{

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('status') != 'login') {
			$this->session->set_flashdata('login_gagal','silakan login terlebih dahulu.');
			redirect(base_url());
		}
	}

	public function index(){
		$params = array();
		$limit 	= 20;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$jumlah_data = $this->transactions->jumlah_data();
		$params['members'] = $this->transactions->get_member();
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->transactions->data($limit,$_GET['per_page'] - 1);
			}else{
				$params['results'] = $this->transactions->data($limit,$offset);
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
			$config['base_url'] = base_url().'cashier';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}

		if (isset($_POST['transaction'])) {
			$data = [
				"code" => rand(0,9999),
				"member_id" => null,
				"user_id" => $_SESSION['id']
			];

			if ($_POST['identitas'] == 'member') {
				$data['member_id'] = $_POST['member'];
			}

			$transaction = $this->transactions->add($data);
			if ($transaction) {
				$income = [
					"transaction_code" => $data['code'],
					"income" => ""
				];
				$this->transactions->add_income($income);
				redirect(base_url('cashier/order/'.$data['code']));
			}
		}
		
		$this->load->view('cashier/index', $params);		
	}

	public function order($code){
		$params = array();
		$params['menus'] = $this->transactions->get_menu();
		$params['results'] = $this->transactions->order($code);
		$params['final'] = $this->transactions->final_price($code);
		
		if (isset($_POST['order'])) {
			$price = $this->transactions->price($_POST['menu']);
			$total_price = $price[0]['price'] * $_POST['quantity'];
			$price_awal = $this->transactions->final_price($code);
			$price_akhir = $price_awal[0]["total"] + $total_price;
			$order = [
				"menu_id" => $_POST['menu'],
				"transaction_code" => $code,
				"total_price" => $total_price,
				"quantity" => $_POST['quantity'],
				"order_status" => 2
			];
			$add_order = $this->transactions->add_order($order);
			if ($add_order) {
				$income = [
					"income" => $price_akhir
				];
				$this->transactions->update_income($code,$income);
				redirect(base_url('cashier/order/'.$code));
			}
		} elseif (isset($_POST['order_update'])) {
			$data = $this->transactions->order($code);
			foreach ($data as $key) {
				$key['order_status'] = $_POST['order_update'];
				$full = [
					"order_status" => $key['order_status']
				];
				$this->transactions->update_order($code,$full);
				redirect(base_url('cashier/'));
			}
		}

		$this->load->view('cashier/order',$params);	
	}

	public function order_delete($id){
		$code = $this->transactions->get_code($id);

		$price = $this->transactions->price_order($id);
		$price_awal = $this->transactions->final_price($code[0]["transaction_code"]);
		$price_akhir = $price_awal[0]["total"] - $price[0]["total_price"];
		$income = [
			"income" => $price_akhir
		];
		$income = $this->transactions->update_income($code[0]["transaction_code"],$income);

		$this->transactions->order_delete($id);
		redirect(base_url('cashier/order/'.$code[0]['transaction_code']));	
	}

	public function delete($code){
		$delete = $this->transactions->delete($code);
		redirect(base_url('cashier'));
	}


}
