<?php 

class M_opendonasi extends CI_Model{
	function tampilopendonasi(){
        return $this->db->get('opendonasi');
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
	
	public function dataOpendonasi($id){
		$this->db->select('*');
		$this->db->from('opendonasi');
		$this->db->where('opendonasi.id_opendonasi',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function tampillistdonasi($id){
		$this->db->select('*');
		$this->db->from('detail_open_donasi');
		$this->db->join('opendonasi','opendonasi.id_opendonasi = detail_open_donasi.id_open_donasi');
		$this->db->where('opendonasi.id_opendonasi',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function donasi($id){
		$this->db->select('*');
		$this->db->from('opendonasi');
		//$this->db->join('opendonasi','opendonasi.id_opendonasi = detail_open_donasi.id_open_donasi');
		$this->db->where('opendonasi.id_opendonasi',$id);
		$query = $this->db->get();
		return $query->result();
	}
}
