<?php 

class M_jurusan extends CI_Model{

	function tampilJurusan(){
		return $this->db->get('jurusan');
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
public function get_prodi_by_jurusan_js($id_jurusan) {
    $this->db->select('*');
    $this->db->from('prodi');
    $this->db->where('id_jurusan', $id_jurusan);
    $this->db->order_by('prodi', 'ASC');
    $query  = $this->db->get();
    $output = '<option value="">Pilih Program Studi</option>';
    foreach($query->result() as $row)
    {
      $output .= '<option value="'.$row->id_prodi.'">'.$row->prodi.'</option>';
    }
    return $output;
	}
}