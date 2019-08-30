<?php 

class Opendonasi extends CI_Controller{
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
        $this->load->model('m_lowker');
        $this->load->model('m_opendonasi');
	}

	function index(){
		$data['main_view'] = 'operator_fakultas/v_open_donasi';
		$data['opendonasi'] = $this->m_opendonasi->tampilopendonasi()->result();
		$this->load->view('template/template_operator_fakultas', $data);
	}

	function inputOpen(){
		$data['main_view'] = 'operator_fakultas/v_tambah_open_donasi';
		$this->load->view('template/template_operator_fakultas',$data);
	}
	function tambahOpen(){
		$nama_kegiatan = $this->input->post('nama_kegiatan');
		$file= $this->input->post('file');
		$No_rekening = $this->input->post('No_rekening');
		$Keterangan = $this->input->post('Keterangan');
		$lokasi = $this->input->post('lokasi');
		$contact_person = $this->input->post('contact_person');
		$total_anggaran = $this->input->post('total_anggaran');
		
		$data = array(
			'nama_kegiatan' => $nama_kegiatan,
			'file'=>$file,
			'No_rekening'=>$No_rekening,
			'Keterangan'=>$Keterangan,
			'lokasi' =>$lokasi,
			'contact_person' => $contact_person,
			'total_anggaran' => $total_anggaran
            
		);
		$this->m_opendonasi->tambahdata($data,'opendonasi');
		$this->session->set_flashdata('notif', "Data Tidak Ditemukan");
		redirect('operator_fakultas/opendonasi');
	}

	function hapusOpendonasi($id_opendonasi){
		$where = array('id_opendonasi' => $id_opendonasi);
		$this->m_opendonasi->hapus_data($where,'opendonasi');
		$this->session->set_flashdata('notif', "Data Alumni $nim berhasil dihapus");
		redirect('operator_fakultas/opendonasi');
	}

	function updateOpendonasi($id_opendonasi){
		$data['main_view'] = 'operator_fakultas/v_edit_open_donasi';
		$where = array('id_opendonasi' => $id_opendonasi);
		$data['opendonasi'] = $this->m_opendonasi->edit_data($where,'opendonasi')->result();
		$this->load->view('template/template_operator_fakultas',$data);
	}
	
	function editOpendonasi(){
		$id_opendonasi = $this->input->post('id_opendonasi');
		$nama_kegiatan = $this->input->post('nama_kegiatan');
		$file= $this->input->post('file');
		$No_rekening = $this->input->post('No_rekening');
		$Keterangan = $this->input->post('Keterangan');
		
		$data = array(
			'nama_kegiatan' => $nama_kegiatan,
			'file'=>$file,
			'No_rekening'=>$No_rekening,
			'Keterangan'=>$Keterangan
		);
		$where = array('id_opendonasi' => $id_opendonasi);

		$this->m_opendonasi->update_data($where,$data,'opendonasi');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('operator_fakultas/opendonasi');
	}
}