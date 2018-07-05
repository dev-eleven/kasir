<?php

class ProductController extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('products');
		$this->load->library('pagination');
	}
	

	public function index(){
		$params = array();
		$limit 	= 10;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$jumlah_data = $this->products->jumlah_data();
		$search = '';

		if (isset($_POST['search'])) {
			$search = $_POST['search'];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->products->data($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->products->data($limit,$offset,$search);
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
			$config['base_url'] = base_url().'products';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('products/index', $params);		
	}

	public function add(){
		$params = array();
		$params['results'] = $this->products->get_supplier();
		$this->load->view('products/add',$params);
		if (isset($_POST['button'])) {
			$params = [
				"supplier_id" => $_POST['supplier_id'],
				"name" => $_POST['product'],
				"stock" => $_POST['stock'],
				"price" => $_POST['price'],
				"type" => $_POST['type']
			];
			$this->products->add($params);
			redirect(base_url('products'));
		}	
	}

	public function view($id){
		$params = array();
		$params['results'] = $this->products->view($id);
		$this->load->view('products/view',$params);
	}

	public function update($id){
		$params = array();
		$params['results'] = $this->products->view($id);
		$params['supplier'] = $this->products->get_supplier();
		$this->load->view('products/update',$params);
		if (isset($_POST['button'])) {
			$data = array(			
				"supplier_id" => $_POST['supplier_id'],
				"name" => $_POST['product'],
				"stock" => $_POST['stock'],
				"price" => $_POST['price'],
				"type" => $_POST['type']
			);
			$this->products->update($id,$data);
			redirect(base_url('products'));
		}	
	}

	public function delete($id){
		$this->products->delete($id);
		redirect(base_url('products'));
	}
}
