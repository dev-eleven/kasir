<?php

class SessionController extends CI_Controller{
	public function login(){
		if ($this->session->userdata('status') == 'login') {
            $this->session->set_flashdata('login_sukses', 'Anda sudah login. Silahkan logout terlebih dahulu!');
            redirect(base_url('dashboard'));
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
                	redirect(base_url('dashboard'));
	        	}else {
	                $this->session->set_flashdata('login_failed', 'email atau password salah.');
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
}
