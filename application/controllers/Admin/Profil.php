<?php 

class Profil extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'admin'){
				redirect('auth/logout');
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->model('m_auth');
		$this->load->model('m_profil');
	}
	function index(){
			$data['main_view'] = 'admin/v_profil';
			$data['user'] = $this->m_profil->getDataProfil();   
			$this->load->view('template/template_admin', $data);
		}
		
		function update_password(){
			$username = $this->input->post('username');
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$data_lama = array(
				'username' => $username,
				'password' => $password_lama,
				);
			$data_baru = array(
				'username' => $username,
				'password' => $password_baru,
				);
		
			$where = array(
				'username' => $username
			);
			//
			$cek = $this->m_auth->cek_login("user",$data_lama)->num_rows();
			if($cek > 0){
				$this->m_auth->update_password($where,$data_baru,'user');
				$this->session->set_flashdata('notif', "Password berhasil diupdate");
				redirect('admin/profil');
			}else{
				$this->session->set_flashdata('notif', "GAGAL - Password Lama tidak sesuai");
				redirect('admin/profil');
			}
		}
	}
		