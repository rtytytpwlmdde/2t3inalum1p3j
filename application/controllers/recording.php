<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recording extends CI_Controller {

	function __construct(){
		parent::__construct();		  
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_admin');
		$this->load->model('m_produk');
		$this->load->model('m_legalisir');
		if($this->session->userdata('status') != 'recording'){
			redirect('auth/logout');
		}
	}

	function lihatValidasiIjazah(){
		$username = $this->session->userdata('username');
		
		$data['jumlah_transaksi_baru'] = $this->m_legalisir->getJumlahTransaksiBaru();
		$data['main_view'] = 'legalisir/v_list_ijazah';
		$data['ijazah'] = $this->m_legalisir->tampilIjazah()->result();
		$this->load->view('template/template_operator',$data);
	}
	
	function validasiIjazah($nomor_ijazah, $status){
		
		
		$data = array(
			'validasi' => $status
		);

		$where = array('nomor_ijazah' => $nomor_ijazah);

		$this->m_admin->update_data($where,$data,'ijazah');
		$this->session->set_flashdata('notif', "Data ijazah berhasil di setujui");
		redirect('recording/lihatValidasiIjazah');
	}
	
	function tolakIjazah(){
		$nomor_ijazah = $this->input->post('nomor_ijazah');
		$catatan = $this->input->post('catatan_penolakan');
		$status = "tolak";
		
		$data = array(
			'validasi' => $status,
			'catatan' => $catatan
		);

		$where = array('nomor_ijazah' => $nomor_ijazah);

		$this->m_admin->update_data($where,$data,'ijazah');
		unlink("./pdf/$dokumen_ijazah");
		$this->session->set_flashdata('notif', "Data ijazah berhasil di tolak ");
		redirect('recording/lihatValidasiIjazah');
    }
    
}
