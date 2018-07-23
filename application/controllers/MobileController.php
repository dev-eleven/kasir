<?php

class MobileController extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$params = array();
		$params['members'] = $this->transactions->get_member();
		if (isset($_POST['transaction'])) {
			$data = [
				"code" => rand(0,9999),
				"member_id" => null,
				"user_id" => 1
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
				redirect(base_url('order_mobile/order/'.$data['code']));
			}
		}
		$this->load->view('mobile/index',$params);
	}

	public function order($code){
		$params = array();
		$params['code'] = $code;
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
				redirect(base_url('order_mobile/order/'.$code));
			}
		}

		$this->load->view('mobile/order',$params);
	}
}
