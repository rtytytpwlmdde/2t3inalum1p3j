<?php 

class Alumni extends CI_Controller{
function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'operator_prodi'){
				redirect('auth/logout');
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->model('m_auth');
		$this->load->model('m_prodi');
		$this->load->model('m_jurusan');
		$this->load->model('m_alumni');
		$this->load->model('m_negara');
	}

	function index(){
			$data['alumni'] = $this->m_alumni->data_alumni_jurusan()->result();
			$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
			$data['prodi'] = $this->m_prodi->tampilProdi()->result();
			$data['negara'] = $this->m_negara->tampilnegara()->result();
			$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
			$data['kota'] = $this->m_negara->tampilkota()->result();
			$data['main_view'] = 'operator_prodi/v_data_alumni';
			$this->load->view('template/template_operator_prodi', $data);
	}
}
