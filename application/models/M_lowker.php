<?php 

class M_lowker extends CI_Model{
	function getDataLowker(){
		$this->db->select('*');	
		$this->db->from('lowongan_pekerjaan');
		$this->db->join('informasi','lowongan_pekerjaan.id_informasi = informasi.id_informasi');
		$query = $this->db->get();
		return $query->result();
	}
		
	function getDataInformasiPekerjaanBy($id_penulis,$nama_informasi,$tanggal_informasi,$jenis_informasi){
		$this->db->select('*');	
		$this->db->from('informasi');
		$this->db->where('id_penulis',$id_penulis);
		$this->db->where('nama_informasi',$nama_informasi);
		$this->db->where('tanggal_informasi',$tanggal_informasi);
		$this->db->where('jenis_informasi',$jenis_informasi);
		$query = $this->db->get();
		return $query->result();
	}

	function getDataLowkerByName(){
		$id_penulis = $this->session->userdata('username');
		$this->db->select('*');	
		$this->db->from('lowongan_pekerjaan');
		$this->db->join('informasi','lowongan_pekerjaan.id_informasi = informasi.id_informasi');
		$this->db->where('informasi.id_penulis',$id_penulis);
		$query = $this->db->get();
		return $query->result();
	}

	function getDataLowkerById($id){
		$id_penulis = $this->session->userdata('username');
		$this->db->select('*');	
		$this->db->from('lowongan_pekerjaan');
		$this->db->join('informasi','lowongan_pekerjaan.id_informasi = informasi.id_informasi');
		$this->db->where('lowongan_pekerjaan.id_lowongan',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
}
