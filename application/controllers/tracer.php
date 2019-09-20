<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer extends CI_Controller {

	function __construct(){
		parent::__construct();		  
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_kuisioner');
		$this->load->model('m_admin');
		$this->load->model('m_prodi');
		if($this->session->userdata('logged_in') == FALSE){
			redirect('auth/logout');
		}
    }

    function dashboard(){
			//$data['kuisioner'] = $this->m_kuisioner->getDataListKuisioner();
			$data['main_view'] = 'kuisioner/v_dashboard';
			if($this->session->userdata('username') == 'admin'){
				$this->load->view('template/template_admin', $data);
			}else if($this->session->userdata('status') == 'operator_fakultas' || $this->session->userdata('status') == 'operator_prodi'){
				$this->load->view('template/template_operator', $data);
			}else{
				$this->load->view('template/template_alumni', $data);
			}
    }


 

}