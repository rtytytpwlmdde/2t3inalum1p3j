<?php 

class M_info extends CI_Model{
	function getDataTimeline(){
		$this->db->select('*');	
		$this->db->from('lowongan_pekerjaan');
		$this->db->join('informasi','lowongan_pekerjaan.id_informasi = informasi.id_informasi','right');
		$query = $this->db->get();
		return $query->result();
	}

	function getDataTimelineById($id){
		$this->db->select('*');	
		$this->db->from('informasi');
		$this->db->where('id_informasi',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
}
