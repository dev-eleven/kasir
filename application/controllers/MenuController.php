<?php

class MenuController extends CI_Controller{
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
		$jumlah_data = $this->menus->jumlah_data();
		$search = array();

		if (isset($_POST['search'])) {
			$search = [
				"title" => $_POST['title'],
				"product" => $_POST['product'],
				"price" => $_POST['price'],
				"type" => $_POST['type']
			];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->menus->data($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->menus->data($limit,$offset,$search);
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
			$config['base_url'] = base_url().'menus';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('menus/index', $params);		
	}

	public function add(){
		$params = array();
		$params['results'] = $this->menus->get_product();
		$this->load->view('menus/add',$params);
		if (isset($_POST['button'])) {
			$params = [
				"product_id" => $_POST['product_id'],
				"title" => $_POST['title'],
				"price" => $_POST['price'],
				"type" => $_POST['type']
			];
			$this->menus->add($params);
			redirect(base_url('menus'));
		}	
	}

	public function view($id){
		$params = array();
		$params['results'] = $this->menus->view($id);
		$this->load->view('menus/view',$params);
	}

	public function update($id){
		$params = array();
		$params['results'] = $this->menus->view($id);
		$params['supplier'] = $this->menus->get_product();
		$this->load->view('menus/update',$params);
		if (isset($_POST['button'])) {
			$data = array(			
				"product_id" => $_POST['product_id'],
				"title" => $_POST['title'],
				"price" => $_POST['price'],
				"type" => $_POST['type']
			);
			$this->menus->update($id,$data);
			redirect(base_url('menus'));
		}	
	}

	public function delete($id){
		$this->menus->delete($id);
		redirect(base_url('menus'));
	}
}
