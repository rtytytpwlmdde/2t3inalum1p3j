<?php 

class Info_feb extends CI_Controller{
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
		$this->load->model('m_prodi');
		$this->load->model('m_jurusan');
		$this->load->model('m_alumni');
		$this->load->model('m_negara');
        $this->load->model('m_lowker');
        $this->load->model('m_opendonasi');
        $this->load->model('m_info_feb');
	}

	function index(){
		$data['main_view'] = 'admin/v_info_feb';
		$data['info_feb'] = $this->m_info_feb->tampilinfofeb()->result();
		$this->load->view('template/template_admin', $data);
	}

	function inputinfofeb(){
		$data['main_view'] = 'admin/v_tambah_info_feb';
		$this->load->view('template/template_admin',$data);
	}
	function tambahInfo(){
		$keterangan = $this->input->post('keterangan');
		$link = $this->input->post('link');
		
		$data = array(
			'keterangan'=>$keterangan,
			'link' => $link
            
		);
		$this->m_info_feb->tambahdata($data,'informasi_feb');
		$this->session->set_flashdata('notif', "Data Tidak Ditemukan");
		redirect('admin/info_feb');
	}

	function hapusInfo($id_informasi){
		$where = array('id_informasi' => $id_informasi);
		$this->m_info_feb->hapus_data($where,'informasi_feb');
		$this->session->set_flashdata('notif', "Data Alumni $nim berhasil dihapus");
		redirect('admin/info_feb');
	}

	function updateInfo($id_informasi){
		$data['main_view'] = 'admin/v_edit_info';
		$where = array('id_informasi' => $id_informasi);
		$data['info_feb'] = $this->m_info_feb->edit_data($where,'informasi_feb')->result();
		$this->load->view('template/template_admin',$data);
	}
	
	function editInfo(){
		$id_informasi = $this->input->post('id_informasi');
		$link = $this->input->post('link');
		$keterangan = $this->input->post('keterangan');
		
		$data = array(
			'link'=>$link,
			'keterangan'=>$keterangan
		);
		$where = array('id_informasi' => $id_informasi);

		$this->m_opendonasi->update_data($where,$data,'informasi_feb');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('admin/info_feb');
	}
}