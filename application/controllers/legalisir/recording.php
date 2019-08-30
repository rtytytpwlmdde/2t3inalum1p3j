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


	
	function validasiIjazah($nomor_ijazah, $status){
		
		
		$data = array(
			'validasi_ijazah' => $status
		);

		$where = array('nomor_ijazah' => $nomor_ijazah);

		$this->m_admin->update_data($where,$data,'ijazah');
		$this->session->set_flashdata('sukses', "Data ijazah berhasil di setujui");
		redirect('legalisir/recording/ijazah');
	}
	
	function tolakIjazah(){
		$nomor_ijazah = $this->input->post('nomor_ijazah');
		$catatan = $this->input->post('catatan_ijazah');
		$status = "tolak";
		
		$data = array(
			'validasi_ijazah' => $status,
			'catatan_ijazah' => $catatan
		);

		$where = array('nomor_ijazah' => $nomor_ijazah);

		$this->m_admin->update_data($where,$data,'ijazah');
		unlink("./pdf/$dokumen_ijazah");
		$this->session->set_flashdata('sukses', "Data ijazah berhasil di tolak ");
		redirect('legalisir/recording/ijazah');
		}
		
		public function ijazah() //operator
	{
		$this->load->database();
		$jumlah_data = $this->m_legalisir->jumlah_data_ijazah();
		if($this->m_legalisir->jumlah_data_ijazah() != false){	
			$data['data_transaksi'] = 'ada';
		}else{
			$data['data_transaksi'] = 'kosong';
		}
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/legalisir/legalisir/transaksi/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-left"><nav><ul class="pagination justify-content-right">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);	
		$data['ijazah'] = $this->m_legalisir->getDataIjazah($config['per_page'],$from);
		$data['jumlah_transaksi_baru'] = $this->m_legalisir->getJumlahTransaksiBaru();
		$data['main_view'] = 'legalisir/v_list_ijazah';
		$this->load->view('template/template_operator', $data);
	}
    
}
