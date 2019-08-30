<?php 

class M_profil_alumni extends CI_Model{

	public function getDataProfil(){
        $username = $this->session->userdata('id_login');
        $this->db->select('*');
        $this->db->from('alumni');
        $this->db->where('alumni.nim',$username);
        $query = $this->db->get();
        return $query->result();	
    }
	
		function tambahdata($data,$table){
		$this->db->insert($table,$data);
	}
		 function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		function edit_data($where,$table){
		return $this->db->get_where($table,$where);	
		}
		
		function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
		
		public function getDataPekerjaan(){
        $username = $this->session->userdata('id_login');
        $this->db->select('*');
        $this->db->from('riwayat_pekerjaan');
		$this->db->join ('alumni','alumni.nim = riwayat_pekerjaan.nim');
        $this->db->where('alumni.nim',$username);
        $query = $this->db->get();
        return $query->result();	
    }
	
	public function getDataTeman(){
        $id_login = $this->session->userdata('id_login');
        $this->db->select('*');
        $this->db->from('alumni');
        $this->db->where('alumni.nim != ', $id_login);
        $this->db->where('alumni.nim != 0');
        $query = $this->db->get();
        return $query->result();	
    }
}