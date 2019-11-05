<?php 

class M_alumni extends CI_Model{
	function tampilrestmahasiswa(){
        return $this->db->get('alumni');
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
	function get_mahasiswa_nim($angkatan,$id_jurusan){
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->where('angkatan',$angkatan);
		$this->db->where('id_jurusan',$id_jurusan);
		$query = $this->db->get();
		return $query->result();
	}
	function cek_ketersediaan_mahasiswa($angkatan,$id_jurusan){
		$this->db->select('angkatan,id_jurusan');
		$this->db->from('alumni');
		$this->db->where('angkatan',$angkatan);
		$this->db->where('id_jurusan',$id_jurusan);
		$query = $this->db->get();
		return $query;
	}
	function data_alumni(){
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->where('status_alumni','Pending');
		$query = $this->db->get();
		return $query;
	}
	function data_alumni_jurusan(){
		$id_jurusan = $this->session->userdata('id_jurusan');
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->where('alumni.id_jurusan',$id_jurusan);
		$query = $this->db->get();
		return $query;
	}
	function get_alumni_nim($nim){
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->where('nim',$nim);
		$query = $this->db->get();
		return $query->result();
	}
	function cek_ketersediaan_alumni($nim){
		$this->db->select('nim');
		$this->db->from('alumni');
		$this->db->where('nim',$nim);
		$query = $this->db->get();
		return $query;
	}
	
	
	 function dataAlumni($nim){
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->join('jurusan','alumni.id_jurusan= jurusan.id_jurusan');
		$this->db->join('prodi','alumni.id_prodi= prodi.id_prodi');
		//$this->db->join('riwayat_pekerjaan','alumni.nim= riwayat_pekerjaan.nim');
		$this->db->where('alumni.nim',$nim);
		$query = $this->db->get();
		return $query->result();
	}
	 function getDataRiwayatPekerjaan($nim){
		$this->db->select('*');
		$this->db->from('riwayat_pekerjaan');
		$this->db->where('riwayat_pekerjaan.nim',$nim);
		$query = $this->db->get();
		return $query->result();
	}

	function getDataRiwayatPendidikan($nim){
		$this->db->select('*');
		$this->db->from('pendidikan');
		$this->db->where('username',$nim);
		$query = $this->db->get();
		return $query->result();
	}

	function getDataIjazahByNim($nim){
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->where('username',$nim);
		$query = $this->db->get();
		return $query->result();
	}

	function tampilalumni(){
		$id_prodi = $this->session->userdata('id_prodi');
		$angkatan = $this->session->userdata('angkatan');
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->where('alumni.id_prodi',$id_prodi);
		$this->db->where('alumni.angkatan',$angkatan);
		$this->db->limit('5');
		$query = $this->db->get();
		return $query->result();
	}

	function tampilalumniall(){
		$id_prodi = $this->session->userdata('id_prodi');
		$angkatan = $this->session->userdata('angkatan');
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->where('alumni.id_prodi',$id_prodi);
		$this->db->where('alumni.angkatan',$angkatan);
		$query = $this->db->get();
		return $query->result();
	}
}
