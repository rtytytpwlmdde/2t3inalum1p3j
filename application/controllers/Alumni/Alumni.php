<?php 

class Alumni extends CI_Controller{
function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'alumni'){
				redirect('auth/logout');
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->model('m_auth');
	}

	function index(){
		$data['main_view'] = 'alumni/v_data_alumni';
		$this->load->view('template/template_alumni', $data);
	}


}
