<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_admin');
		$this->load->model('m_produk');
		if($this->session->userdata('logged_in') == FALSE){
			redirect('auth/logout');
		}
	}

	public function index()
	{
		if($this->session->userdata('status') == "alumni"){
		$data['main_view'] = 'alumni/v_profil';
		$this->load->view('template/template_alumni', $data);
		}else{
			redirect("auth/logout");
		}
	}

	public function profile()
	{
		$data['main_view'] = 'alumni/v_profil';
		$this->load->view('template/template_alumni', $data);
	}

	public function legalisir()
	{
		$data['produk'] = $this->m_produk->tampilProduk()->result();
		$data['main_view'] = 'alumni/v_list_produk';
		$this->load->view('template/template_alumni', $data);
	}

	public function alamat_pengiriman()
	{
		$data['main_view'] = 'alumni/v_input_alamat_pengiriman';
		$this->load->view('template/template_alumni', $data);
	}

	public function data_alumni()
	{
		$nim = $this->session->userdata('nim');
		$data['main_view'] = 'alumni/v_data_alumni';
		$data['alumni'] = $this->m_produk->tampilDataAlumni($nim);
		$this->load->view('template/template_alumni', $data);
	}

	public function lihatIjazah()
	{
		$nim = $this->session->userdata('nim');
		$data['main_view'] = 'alumni/v_data_ijazah';
		if($this->m_produk->cekIjazah('file') == true){
			$data['cek_ijazah'] = 'true';
			if($this->m_produk->cekIjazah('status') == true){
				$data['cek_validasi'] = 'true';
			}else{
				$data['cek_validasi'] = 'false';
			}
		}else{
			$data['cek_ijazah'] = 'false';
		}
		$data['ijazah'] = $this->m_produk->tampilDataIjazah()->result();
		$this->load->view('template/template_alumni', $data);
	}

	public function pembayaran()
	{
		$data['main_view'] = 'alumni/v_pembayaran';
		$this->load->view('template/template_alumni', $data);
	}
	public function percakapan()
	{
		$data['main_view'] = 'alumni/v_percakapan';
		$this->load->view('template/template_alumni', $data);
	}
}
