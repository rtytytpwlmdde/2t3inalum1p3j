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

		$query = $this->db->where('NIP', $u)
						  ->where('password', $p)
						  ->get('pegawai');
		if($this->db->affected_rows() > 0){

			$data_login = $query->row();

			$data_session = array(
									'logged_in' => TRUE,
									'username' => $data_login->username,
									'id_login' => $data_login->NIP,
									'nama_login' => $data_login->Nama,
									'Status' => $data_login->Status,
									'stat' => $data_login->stat
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
									'username' => $data_login->username,
									'id_login' => $data_login->nim,
									'status' => 'alumni',
									'nama_login' => $data_login->nama
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
	
}