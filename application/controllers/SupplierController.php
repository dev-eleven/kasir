<?php

class SupplierController extends CI_Controller{
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('status') != 'login') {
			$this->session->set_flashdata('login_gagal','silakan login terlebih dahulu.');
			redirect(base_url());
		}
	}
	
	public function index(){
		$params = array();
		$limit 	= 10;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$jumlah_data = $this->suppliers->jumlah_data();
		$search = array();

		if (isset($_POST['search'])) {
			$search = [
				"name" => $_POST['name'],
				"company" => $_POST['company'],
				"email" => $_POST['email'],
				"phone" => $_POST['phone']
			];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->suppliers->data($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->suppliers->data($limit,$offset,$search);
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
			$config['base_url'] = base_url().'suppliers';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('suppliers/index', $params);		
	}

	public function add(){
		$params = array();
		$this->load->view('suppliers/add');
		if (isset($_POST['button'])) {
			$params = [
				"person_name" => $_POST['person_name'],
				"company_name" => $_POST['company_name'],
				"address" => $_POST['address'],
				"email" => $_POST['email'],
				"phone" => $_POST['phone']
			];
			$this->suppliers->add($params);
			redirect(base_url('suppliers'));
		}	
	}

	public function view($id){
		$params = array();
		$params['product'] = $this->suppliers->get_product($id);
		$params['results'] = $this->suppliers->view($id);
		$this->load->view('suppliers/view',$params);
	}

	public function update($id){
		$params = array();
		$params['results'] = $this->suppliers->view($id);
		$this->load->view('suppliers/update',$params);
		if (isset($_POST['button'])) {
			$data = array(			
				"person_name" => $_POST['person_name'],
				"company_name" => $_POST['company_name'],
				"address" => $_POST['address'],
				"email" => $_POST['email'],
				"phone" => $_POST['phone']
			);
			$this->suppliers->update($id,$data);
			redirect(base_url('suppliers'));
		}	
	}

	public function delete($id){
		$this->suppliers->delete($id);
		redirect(base_url('suppliers'));
	}
}
