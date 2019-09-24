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

	function getDataListKuisioner(){
		$this->db->select('*');
		$this->db->from('kuisioner');
		if($this->session->userdata('status') == 'alumni'){
			$this->db->where('kuisioner.status_kuisioner','online');
		}
		$query = $this->db->get();
		return $query->result();
	}

	function getDataKuisionerById($id){
		$this->db->select('*');
		$this->db->from('kuisioner');
		$this->db->where('kuisioner.id_kuisioner',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function getDataListKuisionerById($id){
		$this->db->select('*');
		$this->db->from('kuisioner');
		$this->db->where('kuisioner.id_kuisioner',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function getPertanyaanKuisioner($id,$section){
		$this->db->select('*');
		$this->db->from('kuisioner');
		$this->db->join('pertanyaan','kuisioner.id_kuisioner= pertanyaan.id_kuisioner');
		$this->db->join('jenis_pertanyaan','pertanyaan.jenis_pertanyaan= jenis_pertanyaan.id_jenis_pertanyaan');
		$this->db->join('prodi','pertanyaan.id_prodi= prodi.id_prodi','left');
		$this->db->where('kuisioner.id_kuisioner',$id);
		$this->db->where('pertanyaan.id_section',$section);
		$query = $this->db->get();
		return $query->result();
	}

	function getNextSectionKuisioner($id_kuisioner,$no_section){
		$this->db->select('*');
		$this->db->from('section');
		$this->db->where('section.id_kuisioner',$id_kuisioner);
		$this->db->where('section.no_section',$no_section);
		$query = $this->db->get();
		if($this->db->affected_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function getSectionPilihanJawaban($id_kuisioner, $id_jawaban){
		$user = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('tanggapan');
		$this->db->where('tanggapan.id_kuisioner',$id_kuisioner);
		$this->db->where('tanggapan.id_jawaban',$id_jawaban);
		$this->db->where('tanggapan.id_responden',$user);
		$query = $this->db->get();
		if($this->db->affected_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function getDataNextSectionKuisioner($id_kuisioner,$id_section,$kondisi){
		$this->db->select('*');
		$this->db->from('tanggapan');
		$this->db->where('tanggapan.id_kuisioner',$id_kuisioner);
		$this->db->where('tanggapan.id_section',$id_section);
		$this->db->where('tanggapan.id_jawaban',$kondisi);
		$query = $this->db->get();
		if($this->db->affected_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
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

	public function getJenisPertanyaan(){
		$this->db->select('*');
		$this->db->from('jenis_pertanyaan');
		$query = $this->db->get();
		return $query->result();
	}

	function getPilihanJawaban($id){
		$this->db->select('*');
		$this->db->from('pilihan_jawaban');
		$this->db->join('kuisioner','kuisioner.id_kuisioner= pilihan_jawaban.id_kuisioner');
		$this->db->where('pilihan_jawaban.id_kuisioner',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function cekPertanyaanByIdKuisioner($id){
		$this->db->select('*');
		$this->db->from('kuisioner');
		$this->db->where('id_kuisioner',$id);
		$query=$this->db->get();
		return $query->result();
	}

	function getJumlahPertanyaanKuisionerById($id){
		$this->db->select('count(id_pertanyaan) as jumPertanyaan');
		$this->db->from('pertanyaan');
		$this->db->where('id_kuisioner',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function getSectionKuisioner($id){
		$this->db->select('*');
		$this->db->from('section');
		$this->db->where('id_kuisioner',$id);
		$query = $this->db->get();
		if($this->db->affected_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function getFirstSectionKuisioner($id){
		$this->db->select('*');
		$this->db->from('section');
		$this->db->where('id_kuisioner',$id);
		$this->db->order_by('no_section', 'ASC');
		$this->db->limit(1);
		$query = $this->db->get();
		if($this->db->affected_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function getAllPertanyaanByKuisioner($id){
		$this->db->select('*');
		$this->db->from('pertanyaan');
		$query = $this->db->get();
		return $query->result();
	}

	function getOptionPilihanJawaban($id){
		$hasil=$this->db->query("SELECT nama_pilihan_jawaban, id_pilihan_jawaban FROM pilihan_jawaban WHERE id_pertanyaan ='".$id."' ORDER BY nama_pilihan_jawaban ASC");
		return $hasil->result();
	}

	function getDataSectionById($id){
		$this->db->select('*');
		$this->db->from('section');
		$this->db->where('id_section',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function getIdKuisioner($nama){
		$this->db->select('*');
		$this->db->from('kuisioner');
		$this->db->where('nama_kuisioner',$nama);
		$query = $this->db->get();
		return $query->result();
	}
	

}