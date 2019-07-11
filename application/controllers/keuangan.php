<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

	function __construct(){
		parent::__construct();		  
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_admin');
		$this->load->model('m_produk');
		$this->load->model('m_legalisir');
		$this->load->model('m_keuangan');
	}

	public function index()
	{
        $status = null;
        if($this->m_keuangan->getDataTransaksi($status) == false){
            $data['data_transaksi'] = 'kosong';
        }else{
            $data['data_transaksi'] = 'ada';
            $data['transaksi'] = $this->m_keuangan->getDataTransaksi($status);
        }
				$data['jumlah_transaksi_baru'] = $this->m_keuangan->getJumlahTransaksiBaru();
        $data['main_view'] = 'legalisir/v_list_transaksi';
        $this->load->view('template/template_operator', $data);
    }
    
    public function transaksi($status)
	{
		if($this->m_keuangan->getDataTransaksi($status) == false){
				$data['data_transaksi'] = 'kosong';
		}else{
				$data['data_transaksi'] = 'ada';
				$data['transaksi'] = $this->m_keuangan->getDataTransaksi($status);
		}
		$data['jumlah_transaksi_baru'] = $this->m_keuangan->getJumlahTransaksiBaru();
		$data['main_view'] = 'legalisir/v_list_transaksi';
		$this->load->view('template/template_operator', $data);
    }
    
    public function buktiTransfer($id_transaksi)
	{
		$data['transaksi'] = $this->m_keuangan->getBuktiTransfer($id_transaksi);
		$this->load->view('legalisir/v_bukti_transfer', $data);
    }

    public function validasiPembayaran()
	{
        $id_transaksi = $this->input->post('id_transaksi');
        $status_pesanan = '4';
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_pesanan' => $status_pesanan
        );
		$where = array('id_transaksi' => $id_transaksi);

		$this->m_admin->update_data($where,$data,'transaksi');
		$this->session->set_flashdata('sukses', "Pembayaran transaksi $id_transaksi telah divalidasi");
		redirect('keuangan/detailTransaksi/'.$id_transaksi);
    }

    public function detailTransaksi($id_transaksi)
	{
		$data['jumlah_transaksi_baru'] = $this->m_keuangan->getJumlahTransaksiBaru();
		$data['produk'] = $this->m_legalisir->getProdukPesananSaya($id_transaksi);
		$data['transaksi'] = $this->m_legalisir->getDetailPesananSaya($id_transaksi);
		$data['main_view'] = 'legalisir/v_detail_transaksi';
		$this->load->view('template/template_operator', $data);
    }
    
}
