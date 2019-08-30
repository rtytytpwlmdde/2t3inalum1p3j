<?php 

class kuisioner extends CI_Controller{
function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'operator_jurusan'){
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
		$this->load->model('m_paket_kuisioner');
		$this->load->model('m_kuisioner');
		
	
	}

	function datakuisioner($id_paket){
		$data['main_view'] = 'operator_jurusan/v_kuisioner';
		$data['paket_kuisioner'] = $this->m_kuisioner->datakuisioner($id_paket);
		$this->load->view('template/template_operator_jurusan', $data);
	}
	
	function inputPaket(){
		$data['main_view'] = 'operator_jurusan/v_tambah_paketkuisioner';
		$this->load->view('template/template_operator_jurusan',$data);
	}
	function tambahPaket(){
		$nama_paket = $this->input->post('nama_paket');
		
		$data = array(
			'nama_paket' => $nama_paket
		);
		$this->m_paket_kuisioner->tambahdata($data,'paket_soal');
		$this->session->set_flashdata('notif', "Data Tidak Ditemukan");
		redirect('operator_jurusan/paket_kuisioner');
	}

	function hapusPaket($id_paket){
		$where = array('id_paket' => $id_paket);
		$this->m_paket_kuisioner->hapus_data($where,'paket_soal');
		$this->session->set_flashdata('notif', "Data Alumni $nim berhasil dihapus");
		redirect('operator_jurusan/paket_kuisioner');
	}

	function updatePaket($id_paket){
		$data['main_view'] = 'operator_jurusan/v_edit_paketkuisioner';
		$where = array('id_paket' => $id_paket);
		$data['paket_kuisioner'] = $this->m_paket_kuisioner->edit_data($where,'paket_soal')->result();
		$this->load->view('template/template_operator_jurusan',$data);
	}

	function edit_data_mahasiswa($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editpaket(){
		$id_paket = $this->input->post('id_paket');
		$nama_paket = $this->input->post('nama_paket');
		
		
		$data = array(
			'nama_paket' => $nama_paket
		);
		$where = array('id_paket' => $id_paket);

		$this->m_paket_kuisioner->update_data($where,$data,'paket_soal');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('operator_jurusan/paket_kuisioner');
	}


}
