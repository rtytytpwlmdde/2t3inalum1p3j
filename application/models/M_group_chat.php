<?php 

class M_group_chat extends CI_Model{

	function grupchat(){
		return $this->db->get('group_chat');
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
	function get_jurusan(){
		$this->db->select('*');	
		$this->db->from('jurusan');
		$this->db->order_by("jurusan", "ASC");
		$query = $this->db->get();
		return $query->result();
	}
	function tampilgrup(){
		$id_prodi = $this->session->userdata('id_prodi');
		$angkatan = $this->session->userdata('angkatan');
		$this->db->select('*');
		$this->db->from('group_chat');
		$this->db->where('group_chat.id_prodi',$id_prodi);
		$this->db->where('group_chat.angkatan',$angkatan);
		$query = $this->db->get();
		return $query->result();
	}
}