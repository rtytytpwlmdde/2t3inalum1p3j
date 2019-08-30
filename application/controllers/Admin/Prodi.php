<?php 

class Prodi extends CI_Controller{

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
		$data['main_view'] = 'admin/v_data_prodi';
		$data['jurusan'] = $this->m_jurusan->get_jurusan();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$this->load->view('template/template_admin', $data);
	}
	
	function inputProdi(){
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['main_view'] = 'admin/v_tambah_prodi';
		$this->load->view('template/template_admin',$data);
	}
	
	function tambahProdi(){
		$id_jurusan = $this->input->post('id_jurusan');
		$prodi = $this->input->post('prodi');
		
		$data = array(
			'id_jurusan' => $id_jurusan,
			'prodi' => $prodi
		);
		$this->m_prodi->tambahdata($data,'prodi');
		$this->session->set_flashdata('notif', "Jurusan $nama_prodi berhasil ditambahkan");
		redirect('admin/prodi');
	}
	
	function updateProdi($id_prodi){
		$data['main_view'] = 'admin/v_edit_prodi';
		$where = array('id_prodi' => $id_prodi);
		$data['jurusan'] = $this->m_jurusan->get_jurusan();
		$data['prodi'] = $this->m_prodi->edit_data($where,'prodi')->result();
		$this->load->view('template/template_admin',$data);
	}
	
	function editProdi(){
		$id_prodi = $this->input->post('id_prodi');
		$id_jurusan = $this->input->post('id_jurusan');
		$prodi = $this->input->post('prodi');
		
		$data = array(
			'id_prodi' => $id_prodi,
			'id_jurusan' => $id_jurusan,
			'prodi' => $prodi
		);

		$where = array('id_prodi' => $id_prodi);

		$this->m_prodi->update_data($where,$data,'prodi');
		redirect('admin/prodi');
	}
	
	function hapusProdi($id_prodi){
		$where = array('id_prodi' => $id_prodi);
		$this->m_prodi->hapus_data($where,'prodi');
		$this->session->set_flashdata('notif', "Data penyelenggara $id_prodi berhasil dihapus");
		redirect('admin/prodi');
	}
	
	
}