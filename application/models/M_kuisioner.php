<?php 

class M_kuisioner extends CI_Model{

	function datakuisioner($id_paket){
		$this->db->select('*');
		$this->db->from('kuisioner');
		$this->db->join('paket_soal','kuisioner.id_paket_kuisioner= paket_soal.id_paket');
		$this->db->where('kuisioner.id_paket_kuisioner',$id_paket);
		$query = $this->db->get();
		return $query->result();
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
	
	public function getDetailPaket($id_paket){
    $this->db->select('*');
    $this->db->from('paket_soal');
    $this->db->where('id_paket',$id_paket);
    $query = $this->db->get();
    return $query->row();
  }
}