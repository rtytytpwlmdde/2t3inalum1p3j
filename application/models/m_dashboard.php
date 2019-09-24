<?php 

class M_dashboard extends CI_Model{
    function getJumlahKuisioner(){
			$this->db->select('count(id_kuisioner) as jumKuisioner');
			$this->db->from('kuisioner');
			$query = $this->db->get();
			return $query->result();
    }
    
    function getJumlahPertanyaan(){
			$this->db->select('count(id_pertanyaan) as jumPertanyaan');
			$this->db->from('pertanyaan');
			$query = $this->db->get();
			return $query->result();
    }
    
    function getJumlahResponden(){
			$this->db->select('count(id_responden) as jumResponden');
			$this->db->from('tanggapan');
			$query = $this->db->get();
			return $query->result();
		}

		function getJumlahAlumni(){
			$this->db->select('count(nim) as jumAlumni');
			$this->db->from('alumni');
			$query = $this->db->get();
			return $query->result();
		}

		function getJummlahRespondenKuisioner(){
			$this->db->select('count(alumni.nim) as jumResponden');
			$this->db->select('tanggapan.id_kuisioner');
			$this->db->from('alumni');
			$this->db->join('tanggapan','tanggapan.id_responden= alumni.nim');
			$this->db->group_by('tanggapan.id_kuisioner');
			$this->db->group_by('tanggapan.id_responden');
			$query = $this->db->get();
			return $query->result();
		}

		function getJumlahAlumniPengisiKuisioner(){

		}

		function getDataKuisioner(){
			$this->db->select('*');
			$this->db->from('kuisioner');
			$query = $this->db->get();
			return $query->result();
		}
	
}