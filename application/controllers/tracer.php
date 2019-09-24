<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer extends CI_Controller {

	function __construct(){
		parent::__construct();		  
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_dashboard');
		if($this->session->userdata('logged_in') == FALSE){
			redirect('auth/logout');
		}
    }

    function dashboard(){
			//$data['kuisioner'] = $this->m_kuisioner->getDataListKuisioner();

			$data['jumlahKuisioner'] = $this->m_dashboard->getJumlahKuisioner();
			$data['jumlahResponden'] = $this->m_dashboard->getJumlahResponden();
			$data['jumlahPertanyaan'] = $this->m_dashboard->getJumlahPertanyaan();
			$data['jumlahRespondenKuisioner'] = $this->m_dashboard->getJummlahRespondenKuisioner();
			$data['kuisioner'] = $this->m_dashboard->getDataKuisioner();
			$data['jumlahAlumni'] = $this->m_dashboard->getJumlahAlumni();
			$data['respondenKuisioner'] = $this->m_dashboard->getJumlahAlumniPengisiKuisioner();


			$data['main_view'] = 'kuisioner/v_dashboard';
		
				$this->load->view('template/template_operator', $data);
			
    }


 

}