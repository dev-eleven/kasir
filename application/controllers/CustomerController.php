<?php

class CustomerController extends CI_Controller{
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
		$jumlah_data = $this->customers->jumlah_data();
		$search = array();

		if (isset($_POST['search'])) {
			$search = [
				"name" => $_POST['name'],
				"address" => $_POST['address']
			];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->customers->data($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->customers->data($limit,$offset,$search);
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
			$config['base_url'] = base_url().'customers';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('customers/index', $params);		
	}

	public function add(){
		$params = array();
		$this->load->view('customers/add',$params);
		if (isset($_POST['button'])) {
			$params = [
				"name" => $_POST['name'],
				"address" => $_POST['address']
			];
			$this->customers->add($params);
			redirect(base_url('customers'));
		}	
	}

	public function update($id){
		$params = array();
		$params['results'] = $this->customers->view($id);
		$this->load->view('customers/update',$params);
		if (isset($_POST['button'])) {
			$data = array(			
				"name" => $_POST['name'],
				"address" => $_POST['address']
			);
			$this->customers->update($id,$data);
			redirect(base_url('customers'));
		}	
	}

	public function delete($id){
		$this->customers->delete($id);
		redirect(base_url('customers'));
	}
}
