<?php 

class M_chatting extends CI_Model{

	function Chatting($nim){
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->where('alumni.nim',$nim);
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
	
	function checkanggota($nim,$id_grup){
		$check = $this->db->get_where('anggota_group', ['id_grup' => $id_grup, 'nim' => $nim]);

        if ($check->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
	public function getOne($id)
    {
        return $this->db->get_where('group_chat', ['id_grup' => $id]);
    }
}