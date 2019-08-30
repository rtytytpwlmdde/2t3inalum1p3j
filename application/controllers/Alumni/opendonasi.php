<?php 

class Opendonasi extends CI_Controller{
function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'alumni'){
				redirect('auth/logout');
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->model('m_auth');
		$this->load->model('m_alumni');
		$this->load->model('m_lowker');
		$this->load->model('m_opendonasi');
		$this->load->model('m_group_chat');
		$this->load->model('m_profil_alumni');
	}

	function detail_open($id){
		$url=$this->uri->segment(4);
		$url = $id;
		$data['opendonasi'] = $this->m_opendonasi-> donasi($url);  
			$data['alumni'] = $this->m_alumni->tampilalumni();
		$data['grup'] = $this->m_group_chat->tampilgrup();
		$data['main_view'] = 'alumni/v_detail_opendonasi';
		$this->load->view('template/template_alumni', $data);
	}
	
	function tambah_donasi(){
		$id_open_donasi = $this->input->post('id_open_donasi');
		$nim= $this->input->post('nim');
		$jumlah_bantuan = $this->input->post('jumlah_bantuan');
		$status="BelumDisetujui";
		
				$data = array(
				'id_open_donasi' => $id_open_donasi,
				'nim' => $nim,
				'jumlah_bantuan' => $jumlah_bantuan,
				'status' => $status
			);
			$this->m_alumni->tambahdata($data,'detail_open_donasi');
			$this->session->set_flashdata('notif', "Pegawai $NIP berhasil ditambahkan !");
			redirect('alumni/dashboard/open_donasi/');
	}

	

}
