<?php

class UserController extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('users');
		$this->load->library('pagination');
	}
	
	public function login(){
		if ($this->session->userdata('status') == 'login') {
            $this->session->set_flashdata('login_sukses', 'Anda sudah login. Silahkan logut terlebih dahulu!');
            redirect(base_url('inventaris'));
        }else{
        	if (isset($_POST['button'])) {
	        	$email = $_POST['email'];
	        	$password = md5($_POST['password']);
	        	$login = $this->users->login($email,$password);
	        	if ($login) {
	        		$data = [
		        		'user_id' => $users_id,
		        		'email'   => $email,
		        		'logged_in' => true,
	                    'status'    => 'login'
                	];
                	$this->session->set_userdata($data);
                	redirect(base_url('inventaris'));
	        	}else {
	                $this->session->set_flashdata('login_failed', 'email dan password salah.');
	                redirect(base_url());
            	}
	        }else{
	        	$this->load->view('users/login');
	        }
        }
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

	public function index(){
		$params = array();
		$limit 	= 10;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$jumlah_data = $this->users->jumlah_data();
		$search = '';

		if (isset($_POST['search'])) {
			$search = $_POST['search'];
		}
		
		if ($jumlah_data > 0) {
			if (isset($_GET['per_page'])) {
				$params['results'] = $this->users->data($limit,$_GET['per_page'] - 1,$search);
			}else{
				$params['results'] = $this->users->data($limit,$offset,$search);
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
			$config['base_url'] = base_url().'users';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('users/index', $params);		
	}

	public function add(){
		$params = array();
		$this->load->view('users/add');
		if (isset($_POST['button'])) {
			$params = [
				"email" => $_POST['email'],
				"level" => $_POST['level'],
				"password" => md5($_POST['password'])
			];
			$this->users->add($params);
			redirect(base_url('users'));
		}	
	}

	public function view($id){
		$params = array();
		$params['results'] = $this->users->view($id);
		$this->load->view('users/view',$params);
	}

	public function update($id){
		$params = array();
		$params['results'] = $this->users->view($id);
		$this->load->view('users/update',$params);
		if (isset($_POST['button'])) {
			$data = array(			
				'email' => $this->input->post('email'),
				'level' => $this->input->post('level')
			);

			if (empty($_POST['password'])) {
				$data['password'] = $_POST['password_hidden'];
			} else {
				$data['password'] = md5($this->input->post('password'));
			}
			$this->users->update($id,$data);
			redirect(base_url('users'));
		}	
	}

	public function delete($id){
		$this->users->delete($id);
		redirect(base_url('users'));
	}
}
