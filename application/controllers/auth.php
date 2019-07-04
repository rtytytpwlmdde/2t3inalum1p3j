<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_auth');
	}

	public function index()
	{
		$data['main_view'] = 'guest/v_login';
		$this->load->view('guest/v_login', $data);

	}

	function login(){
		$data['main_view'] = 'guest/v_login';
		$this->load->view('guest/v_login', $data);
	}
	//alvin
	public function cek_login(){
		if($this->session->userdata('logged_in') == FALSE){

			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->m_auth->cek_user_admin() == TRUE){
					$status = $this->session->userdata('status');
					if($status=="admin"){
						redirect('admin/index');
					}else if ($status == "recording"){
						redirect('recording/index');
					}else{
						redirect('keuangan/index');
					}
				} else if($this->m_auth->cek_user_mahasiswa() == TRUE){ 
					redirect('alumni/index');
				}else{
					$this->session->set_flashdata('notif', 'Username atau Password salah');
					redirect('auth/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
					redirect('auth/index');
			}
		} else {
			redirect('auth/logout');
		}
	}

	function logout_non_aktif(){
		$this->session->set_flashdata('notif', 'mohon maaf user sudah non aktif, untuk melihat data silahkan hubungi operator');
		$this->session->sess_destroy();
		$this->load->view('v_login');
	}

	 function logout(){
		$this->session->sess_destroy();
		redirect('auth/index');
	}

	function lupa_password(){
		$data['main_view'] = 'v_lupa_password';
		$this->load->view('v_lupa_password', $data);
	}
}
