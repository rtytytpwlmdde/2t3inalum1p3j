   
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
						redirect('admin/dashboard');
					}else if ($status == "operator_fakultas"){
						redirect('tracer/dashboard');
					}else if ($status == "operator_jurusan"){
						redirect('operator_jurusan/dashboard');
					}else if ($status == "operator_prodi"){
						redirect('operator_prodi/dashboard');
					}else if ($status == "gugusjaminanmutu"){
						redirect('gugusjaminanmutu/dashboard');
					}else if ($status == "recording"){
						redirect('legalisir/dashboard');
					}else{
						redirect('legalisir/transaksi');
					}
				/*}else if ($this->m_auth->cek_user_pegawai() == TRUE){
					$id_jurusan = $this->session->userdata('id_jurusan');
					$id_prodi = $this->session->userdata('id_prodi');
					$status =$this->session->userdata('status');
							if($id_jurusan == "id_jurusan"){
								if($id_prodi == "null"){
									redirect('operator_jurusan/index');
								}else{
									redirect('operator_prodi/index');
								}
							}else{
								redirect('gugusjaminanmutu/index');
							}*/
				}else if($this->m_auth->cek_user_mahasiswa() == TRUE){ 
					$angkatan = $this->session->userdata('angkatan');
					$id_prodi = $this->session->userdata('id_prodi');
					$foto = $this->session->userdata('foto');
					$nama_kota = $this->session->userdata('nama_kota');
					$status_alumni =$this->session->userdata('status_alumni');
					if($status_alumni == "aktif"){
					redirect('alumni/dashboard');
					}else{
						redirect('auth/logout_non_aktif');
					}
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
		$this->load->view('guest/v_login');
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
