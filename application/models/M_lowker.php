<?php 

class M_lowker extends CI_Model{
	function tampillowker(){
        $this->db->select('*');	
		$this->db->from('lowonganpekerjaan');
		$this->db->where('lowonganpekerjaan.status','valid');
		$query = $this->db->get();
		return $query->result();
    }
	function data_lowker(){
        $this->db->select('*');	
		$this->db->from('lowonganpekerjaan');
		$this->db->where('lowonganpekerjaan.status','BelumValid');
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
	function get_data_history_lowker(){
		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('lowonganpekerjaan');
		$this->db->where('username',$username);
		$query = $this->db->get();
		return $query->result();
	}
	public function dataPeminjamanMahasiswa($id){
		$this->db->select('*');
		$this->db->from('lowonganpekerjaan');
		$this->db->where('lowonganpekerjaan.id_lowongan',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function historyalumni(){
		$username = $this->session->userdata('nama_login');
		$this->db->select('*');
		$this->db->from('lowonganpekerjaan');
		$this->db->where('lowonganpekerjaan.username',$username);
		$query = $this->db->get();
		return $query->result();
	}
}
