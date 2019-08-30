<?php 
class M_auth extends CI_Model{	
    
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	//alvin
	public function cek_user_admin(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$query = $this->db->where('username', $u)
						  ->where('password', $p)
						  ->get('user');
		if($this->db->affected_rows() > 0){
			$data_login = $query->row();
			$data_session = array(
									'logged_in' => TRUE,
									'username' => $data_login->username,
									'status' => $data_login->status
								);
			$this->session->set_userdata($data_session);
			return TRUE;
		
		} else{
			return FALSE;
		}
	}
	public function cek_user_pegawai(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$query = $this->db->where('username', $u)
						  ->where('password', $p)
						  ->get('user');
		if($this->db->affected_rows() > 0){

			$data_login = $query->row();

			$data_session = array(
									'logged_in' => TRUE,
									'username' => $data_login->username,
									'id_jurusan' => $data_login->id_jurusan,
									'id_prodi' => $data_login->id_prodi,
									'status' => $data_login->status
								);
			$this->session->set_userdata($data_session);
			return TRUE;
		
		} else{
			return FALSE;
		}
	}
    
    public function cek_user_mahasiswa(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$query = $this->db->where('username', $u)
						  ->where('password', $p)
						  ->get('alumni');
		if($this->db->affected_rows() > 0){
			$data_login = $query->row();
			$data_session = array(
									'logged_in' => TRUE,
									'id_login' => $data_login->nim,
									'username' => $data_login->username,
									'foto'=> $data_login->foto,
									'nama_kota' => $data_login->nama_kota,
									'nama_provinsi' => $data_login->nama_provinsi,
									'angkatan' => $data_login->angkatan,
									'id_prodi' => $data_login->id_prodi,
									'status' => 'alumni',
									'nama_login' => $data_login->nama,
									'status_alumni' => $data_login->status_alumni
								);
			$this->session->set_userdata($data_session);
			return TRUE;
		
		} else{
			return FALSE;
		}
	}
	
	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	
	
	function update_password($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function get_by_id($id_login)
    {
        $this->db->select('*');
        $this->db->from('alumnni');
        $this->db->where('nim', $id_login);
        $query = $this->db->get();
        return $query->row();
    }
	
}