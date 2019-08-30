<?php 

class Opendonasi extends CI_Controller{
function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'validator'){
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
        $this->load->model('m_lowker');
        $this->load->model('m_opendonasi');
	}

	function index(){
		$data['main_view'] = 'validator/v_open_donasi';
		$data['opendonasi'] = $this->m_opendonasi->tampilopendonasi()->result();
		$this->load->view('template/template_validator', $data);
	}
	
	
	function data_open(){
		$data['main_view'] = 'validator/v_data_open_donasi';
		$data['open_donasi'] = $this->m_opendonasi->tampilopendonasi()->result();
		$this->load->view('template/template_validator', $data);
	}
	
	function data_donasi($id){
		$data['main_view'] = 'validator/v_list_anggota_donasi';
		$data['anggota_donasi'] = $this->m_opendonasi->tampillistdonasi($id);
		$data['donasi'] = $this->m_opendonasi->donasi($id);
		$this->load->view('template/template_validator', $data);
	}
	
}