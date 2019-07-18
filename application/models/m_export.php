<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_export extends CI_Model {
  public function view(){
    return $this->db->get('transaksi')->result(); // Tampilkan semua data yang ada di tabel siswa
  }

  function getListInvoicePengiriman(){
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('status_pesanan','transaksi.status_pesanan = status_pesanan.id_status');
			$this->db->join('alumni','transaksi.id_pemesan = alumni.username');
			$this->db->where('transaksi.status_pesanan','5');
      $query = $this->db->get();
      return 	$query->result();	
  }

  
  function getDataInvoicePengiriman(){
    $operator = $this->session->userdata('username');
    $this->db->select('*');
    $this->db->from('invoice');
    $this->db->where('recording',$operator);
    $query=$this->db->get();
    if($this->db->affected_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

  function getDataExportInvoice(){
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('status_pesanan','transaksi.status_pesanan = status_pesanan.id_status');
    $this->db->join('alumni','transaksi.id_pemesan = alumni.username');
    $this->db->join('invoice','transaksi.id_transaksi = invoice.id_transaksi');
    $query = $this->db->get();
    return 	$query->result();	
}

function getDataPrintInvoice(){
  $this->db->select('*');
  $this->db->from('transaksi');
  $this->db->join('status_pesanan','transaksi.status_pesanan = status_pesanan.id_status');
  $this->db->join('alumni','transaksi.id_pemesan = alumni.username');
  $this->db->join('invoice','transaksi.id_transaksi = invoice.id_transaksi');
  $query = $this->db->get();
  return 	$query->result();	

}

function getDatailTransaksiInvoice(){
  $operator = $this->session->userdata('username');
  $this->db->select('*');
  $this->db->from('detail_transaksi');
  $this->db->join('invoice','detail_transaksi.id_transaksi = invoice.id_transaksi');
  $this->db->join('produk','detail_transaksi.id_produk = produk.id_produk');
  $this->db->where('invoice.recording',$operator);
  $query = $this->db->get();
  return 	$query->result();	

}


  function jumlah_data_invoice(){
    $operator = $this->session->userdata('username');
    $this->db->select('*');
    $this->db->where('recording',$operator);
    $query = $this->db->get('invoice');
    if($this->db->affected_rows() > 0){
      return 	$query->num_rows();	
    }else{
      return false;
    }
  }

}