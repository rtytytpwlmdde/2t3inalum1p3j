<?php 

class M_paket_kuisioner extends CI_Model{

	function paket_kuisioner(){
		return $this->db->get('paket_soal');
	}
	 function tambahdata($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function edit_data($where,$table){
	return $this->db->get_where($table,$where);	
    }
	
	function data_paket_kuisioner($id_paket_kuisioner){
		$this->db->select('*');
		$this->db->from('paket_soal');
		//$this->db->join('opendonasi','opendonasi.id_opendonasi = detail_open_donasi.id_open_donasi');
		$this->db->where('paket_soal.id_paket_kuisioner',$id_paket_kuisioner);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getDetailPaket($id_paket){
    $this->db->select('*');
    $this->db->from('paket_soal');
    $this->db->where('id_paket',$id_paket);
    $query = $this->db->get();
    return $query->row();
  }
}