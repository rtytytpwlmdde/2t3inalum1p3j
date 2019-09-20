<?php 

class M_produk extends CI_Model{	
    
	function tampilProduk(){
		return $this->db->get('produk');
	}

	
	function tampilDataAlumni($username){
		$this->db->select('*');
        $this->db->from('alumni');
		$this->db->where('username',$username);
        $query=$this->db->get();
		return $query->result();
        
	}
	
	function tampilDataIjazah(){
		return $this->db->get('alumni');
		/* $this->db->select('*');
        $this->db->from('ijazah');
		$this->db->where('nim',$username);
        $query=$this->db->get();
        if($this->db->affected_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        } */
	}

	function getDataIjazahByIdLogin(){
		$nim = $this->session->userdata('id_login');
		$this->db->select('*');
			$this->db->from('alumni');
			$this->db->where('nim',$nim);
			$query=$this->db->get();
			return $query->result();
			
	}

	function cekIjazah($status){
		$nim = $this->session->userdata('id_login');
        $this->db->from('alumni');
		$this->db->where('nim',$nim);
		if($status == 'file'){
			$this->db->where('dokumen_ijazah !=', null);
			$query=$this->db->get();
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('validasi_ijazah !=', 'setuju');
			$query=$this->db->get();
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}

	function cekTranskrip(){
		$nim = $this->session->userdata('id_login');
        $this->db->from('alumni');
		$this->db->where('nim',$nim);
		$this->db->where('dokumen_transkrip !=', null);
		$query=$this->db->get();
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
}