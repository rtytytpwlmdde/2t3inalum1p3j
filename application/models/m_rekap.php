<?php 

class M_rekap extends CI_Model{
    
	function getDataRekapTransaksiPerbulan(){
		$tahun = $this->input->get('tahun');
		if($tahun == NULL){
			$tahun = date("Y");
		}
		$this->db->select('id_transaksi ,count(id_transaksi) as jumlahTransaksiPerbulan');
		$this->db->select('date_format(tanggal_transaksi,"%m") as bulan');
		$this->db->from('transaksi');
		$this->db->group_by('bulan');
		$this->db->where('YEAR(tanggal_transaksi)',$tahun);
		$query = $this->db->get();
		return $query->result();
	}

	function getDataRekapTransaksiPertahun(){
		$tahun = $this->input->get('tahun');
		if($tahun == NULL){
			$tahun = date("Y");
		}
		$this->db->select('id_transaksi ,count(id_transaksi) as jumlahTransaksiPertahun');
		$this->db->from('transaksi');
		$this->db->where('YEAR(tanggal_transaksi)',$tahun);
		$query = $this->db->get();
		return $query->result();
    }
}