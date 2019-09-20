<?php 

class Dashboard extends CI_Controller{
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
	}

	function index(){
		$data['main_view'] = 'operator_fakultas/v_dashboard';
		$this->load->view('template/template_operator', $data);
	}


}
