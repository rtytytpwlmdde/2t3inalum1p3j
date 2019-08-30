<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

	function __construct(){
		parent::__construct();		  
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_rekap');
	}

	public function rekapTransaksi()
	{
		$tahun = $this->input->get('tahun');
		if($tahun == NULL){
			$tahun = date("Y");
		}
		$data['tahun'] = $tahun;
		$data['transaksiPerbulan'] = $this->m_rekap->getDataRekapTransaksiPerbulan();
		$data['transaksiPertahun'] = $this->m_rekap->getDataRekapTransaksiPertahun();
        $data['main_view'] = 'admin/v_rekap_transaksi';
        $this->load->view('template/template_admin', $data);
    }
    
  
    
}
