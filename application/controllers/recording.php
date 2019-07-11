<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recording extends CI_Controller {

	function __construct(){
		parent::__construct();		  
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_admin');
		$this->load->model('m_produk');
		$this->load->model('m_legalisir');
		$this->load->model('m_recording');
	}

	public function index()
	{
        $status = null;
        if($this->m_recording->getDataTransaksi($status) == false){
            $data['data_transaksi'] = 'kosong';
        }else{
            $data['data_transaksi'] = 'ada';
            $data['transaksi'] = $this->m_recording->getDataTransaksi($status);
        }
        $data['jumlah_transaksi_baru'] = $this->m_recording->getJumlahTransaksiBaru();
        $data['main_view'] = 'legalisir/v_list_transaksi';
        $this->load->view('template/template_operator', $data);
    }
    
    public function transaksi($status)
	{
        if($this->m_recording->getDataTransaksi($status) == false){
            $data['data_transaksi'] = 'kosong';
        }else{
            $data['data_transaksi'] = 'ada';
            $data['transaksi'] = $this->m_recording->getDataTransaksi($status);
        }
        $data['jumlah_transaksi_baru'] = $this->m_recording->getJumlahTransaksiBaru();
        $data['main_view'] = 'legalisir/v_list_transaksi';
        $this->load->view('template/template_operator', $data);
    }
    
    public function buktiTransfer($id_transaksi)
	{
		$data['transaksi'] = $this->m_recording->getBuktiTransfer($id_transaksi);
		$this->load->view('legalisir/v_bukti_transfer', $data);
    }

    public function prosesTransaksi()
	{
        $id_transaksi = $this->input->post('id_transaksi');
        $status_pesanan = $this->input->post('status_pesanan');
        $nomor_resi = $this->input->post('nomor_resi');
        $data = array(
            'id_transaksi' => $id_transaksi,
            'nomor_resi' => $nomor_resi,
            'status_pesanan' => $status_pesanan
        );
		$where = array('id_transaksi' => $id_transaksi);

		$this->m_admin->update_data($where,$data,'transaksi');
		$this->session->set_flashdata('sukses', "Status transaksi $id_transaksi telah di ubah");
		redirect('recording/detailTransaksi/'.$id_transaksi);
    }

    public function detailTransaksi($id_transaksi)
	{
        $data['jumlah_transaksi_baru'] = $this->m_recording->getJumlahTransaksiBaru();
		$data['produk'] = $this->m_legalisir->getProdukPesananSaya($id_transaksi);
		$data['transaksi'] = $this->m_legalisir->getDetailPesananSaya($id_transaksi);
		$data['main_view'] = 'legalisir/v_detail_transaksi';
		$this->load->view('template/template_operator', $data);
    }
    
}
