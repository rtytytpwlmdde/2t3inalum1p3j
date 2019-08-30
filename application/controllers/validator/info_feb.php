<?php 

class Info_feb extends CI_Controller{
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
        $this->load->model('m_info_feb');
	}

	function index(){
		$data['main_view'] = 'validator/v_info_feb';
		$data['info_feb'] = $this->m_info_feb->tampilinfofeb()->result();
		$this->load->view('template/template_validator', $data);
	}


}