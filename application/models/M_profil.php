<?php 

class M_profil extends CI_Model{

	public function getDataProfil(){
        $username = $this->session->userdata('username');
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.username',$username);
        $query = $this->db->get();
        return $query->result();	
    }
	
	

}