<?php 

class groupchat extends CI_Controller{
function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'operator_fakultas'){
				redirect('auth/logout');
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->model('m_auth');
		$this->load->model('m_prodi');
		$this->load->model('m_jurusan');
		$this->load->model('m_alumni');
		$this->load->model('m_negara');
		$this->load->model('m_group_chat');
	
	}

	function index(){
		$data['main_view'] = 'operator_fakultas/v_forum_komunikasi';
		$data['grupchat'] = $this->m_group_chat->grupchat()->result();
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$this->load->view('template/template_operator', $data);
	}
	
	function inputForum(){
		$data['main_view'] = 'operator_fakultas/v_tambah_forum';
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$this->load->view('template/template_operator',$data);
	}
	function tambahForum(){
		$nama_group = $this->input->post('nama_group');
		$id_jurusan= $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$angkatan = $this->input->post('angkatan');
		
		$data = array(
			'nama_group' => $nama_group,
			'id_jurusan'=>$id_jurusan,
			'id_prodi'=>$id_prodi,
			'angkatan'=>$angkatan
		);
		$this->m_group_chat->tambahdata($data,'group_chat');
		$this->session->set_flashdata('notif', "Data Tidak Ditemukan");
		redirect('operator_fakultas/groupchat');
	}

	function hapusForum($id){
		$where = array('id' => $id);
		$this->m_group_chat->hapus_data($where,'group_chat');
		$this->session->set_flashdata('notif', "Data Alumni $nim berhasil dihapus");
		redirect('operator_fakultas/groupchat');
	}

	function updateForum($id){
		$data['main_view'] = 'operator_fakultas/v_edit_forum';
		$where = array('id' => $id);
		$data['groupchat'] = $this->m_group_chat->edit_data($where,'group_chat')->result();
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$this->load->view('template/template_operator',$data);
	}

	function edit_data_mahasiswa($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editforum(){
		$id = $this->input->post('id');
		$nama_group = $this->input->post('nama_group');
		$id_jurusan= $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$angkatan = $this->input->post('angkatan');
		
		
		$data = array(
			'nama_group' => $nama_group,
			'id_jurusan'=>$id_jurusan,
			'id_prodi'=>$id_prodi,
			'angkatan'=>$angkatan
		);
		$where = array('id' => $id);

		$this->m_group_chat->update_data($where,$data,'group_chat');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('operator_fakultas/groupchat');
	}


}
