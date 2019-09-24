<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_export extends CI_Model {
  function exportDataTransaksi(){
    $jenis = $this->input->post('jenis');
    $mulai = $this->input->post('mulai');
    $selesai = $this->input->post('selesai');
    $this->db->select('*');
    $this->db->from('transaksi');
    if($jenis == "semua"){
    
    }else{
      $this->db->where('tanggal_transaksi >=',$mulai);
      $this->db->where('tanggal_transaksi <=',$selesai);
    }
    $query = $this->db->get();
    return 	$query->result();	
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

  function exportDataDokumenAlumni(){
    $status = $this->input->post('status');
    $this->db->select('nim, nama, dokumen_ijazah, dokumen_transkrip, nomor_ijazah, validasi_ijazah, catatan_ijazah');
    $this->db->from('alumni');
    if($status == "semua"){

    }else if($status == "setuju"){
      $this->db->where('validasi_ijazah','setuju');
    }else if($status == "terkirim"){
      $this->db->where('validasi_ijazah','terkirim');
    }else if($status == "tolak"){
      $this->db->where('validasi_ijazah','tolak');
    }else{
      $this->db->where('validasi_ijazah !=','terkirim');
      $this->db->where('validasi_ijazah !=','setuju');
      $this->db->where('validasi_ijazah !=','tolak');
    }
    $query = $this->db->get();
    return 	$query->result();	
}

function getDataKuisioner($id_kuisioner){
  $this->db->select('*');
  $this->db->from('tanggapan');
  $this->db->join('alumni','tanggapan.id_responden = alumni.nim');
  $this->db->join('pertanyaan','tanggapan.id_pertanyaan = pertanyaan.id_pertanyaan');
  $this->db->where('tanggapan.id_kuisioner',$id_kuisioner);
  $query = $this->db->get();
  return 	$query->result();	
}

function getDetailKuisioner($id_kuisioner){
  $this->db->select('*');
  $this->db->from('kuisioner');
  $this->db->where('kuisioner.id_kuisioner',$id_kuisioner);
  $query = $this->db->get();
  return 	$query->result();	
}

function getJumlahPertanyaan($id_kuisioner){
		$this->db->select('id_pertanyaan ,count(id_pertanyaan) as jumPertanyaan');
		$this->db->select('nama_pertanyaan');
		$this->db->from('pertanyaan');
		$this->db->where('id_kuisioner',$id_kuisioner);
		$query = $this->db->get();
		return $query->result();
}

function getNamaPertanyaan($id_kuisioner){
  $this->db->select('nama_pertanyaan, id_pertanyaan');
  $this->db->from('pertanyaan');
  $this->db->where('id_kuisioner',$id_kuisioner);
  $query = $this->db->get();
  return $query->result();
}

}