<?php 

class User extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'admin'){
				redirect('auth/logout');
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->model('m_auth');
		$this->load->model('m_user');
		$this->load->model('m_jurusan');
		$this->load->model('m_prodi');
	}

	function index(){
		$data['main_view'] = 'admin/v_data_operator';
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['user'] = $this->m_user->tampilUser()->result();
		$this->load->view('template/template_admin', $data);
	}
		
	function inputUser(){
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['main_view'] = 'admin/v_tambah_data';
		$this->load->view('template/template_admin',$data);
	}
	function tambahUser(){
		$username = $this->input->post('username');
		$status = $this->input->post('status');
		$password = $this->input->post('password');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$data = array(
			'username' => $username,
			'status' => $status,
			'password' =>$password,
			'id_jurusan' => $id_jurusan,
			'id_prodi' => $id_prodi
		);
		$this->m_user->tambahdata($data,'user');
		$this->session->set_flashdata('notif', "User $username berhasil ditambahkan");
		redirect('admin/user');
	}

	function hapusUser($id){
		$where = array('username' => $id);
		$this->m_user->hapus_data($where,'user');
		$this->session->set_flashdata('notif', "Data user $id berhasil dihapus");
		redirect('admin/user');
	}

	function updateUser($id){
		$data['main_view'] = 'admin/v_edit_user';
		$where = array('username' => $id);
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['user'] = $this->m_user->edit_data($where,'user')->result();
		$this->load->view('template/template_admin',$data);
	}

	function edit_data_user($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editUser(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$status = $this->input->post('status');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		
		
		$data = array(
			'username' => $username,
			'status' => $status,
			'password' => $password,
			'id_jurusan' => $id_jurusan,
			'id_prodi' => $id_prodi
			
		
		);

		$where = array('username' => $username);

		$this->m_user->update_data($where,$data,'user');
		$this->session->set_flashdata('notif', "Data user $username berhasil di Update");
		redirect('admin/user');
	}
	function get_prodi_by_jurusan_js(){
      if($this->input->post('id_jurusan'))
      {
      echo $this->m_jurusan->get_prodi_by_jurusan_js($this->input->post('id_jurusan'));
      }
    }
	
}