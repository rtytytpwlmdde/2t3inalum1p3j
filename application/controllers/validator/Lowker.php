<?php 

class Lowker extends CI_Controller{
function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'validator'){
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
	}

	function index(){
		$data['main_view'] = 'validator/v_lowker';
		$data['lowongankerja'] = $this->m_lowker->tampillowker();
		$this->load->view('template/template_validator', $data);
	}

	function inputLowker(){
		$data['main_view'] = 'validator/v_tambah_lowker';
		$this->load->view('template/template_validator',$data);
	}
	function tambahLowker(){
		$nama_lowongan = $this->input->post('nama_lowongan');
		$nama_perusahaan= $this->input->post('nama_perusahaan');
		$lowongan_jabatan = $this->input->post('lowongan_jabatan');
		$syarat_pekerjaan = $this->input->post('syarat_pekerjaan');
		$pelamar_yang_dibutuhkan = $this->input->post('pelamar_yang_dibutuhkan');
		$kisaran_gaji = $this->input->post('kisaran_gaji');
		$alamat_perusahaan = $this->input->post('alamat_perusahaan');
		$email_perusahaan = $this->input->post('email_perusahaan');
		$website_perusahaan = $this->input->post('website_perusahaan');
		$contact_person = $this->input->post('contact_person');
		$no_telp_perusahaan = $this->input->post('no_telp_perusahaan');
		$username = $this->input->post('username');
		$status = "BelumValid";
		
		$data = array(
			'nama_lowongan' => $nama_lowongan,
			'nama_perusahaan'=>$nama_perusahaan,
			'lowongan_jabatan'=>$lowongan_jabatan,
			'syarat_pekerjaan'=>$syarat_pekerjaan,
			'pelamar_yang_dibutuhkan'=>$pelamar_yang_dibutuhkan,
			'kisaran_gaji'=>$kisaran_gaji,
			'alamat_perusahaan'=>$alamat_perusahaan,
			'email_perusahaan'=>$email_perusahaan,
			'website_perusahaan'=>$website_perusahaan,
			'contact_person'=>$contact_person,
			'no_telp_perusahaan'=>$no_telp_perusahaan,
			'username'=>$username,
			'status'=>$status
		);
		$this->m_lowker->tambahdata($data,'lowonganpekerjaan');
		$this->session->set_flashdata('notif', "Data Tidak Ditemukan");
		redirect('validator/lowker/riwayatpekerjaan');
	}

	function hapusLowongan($id_lowngan){
		$where = array('id_lowongan' => $id_lowngan);
		$this->m_alumni->hapus_data($where,'lowonganpekerjaan');
		$this->session->set_flashdata('notif', "Data Alumni $nim berhasil dihapus");
		redirect('validator/lowker/riwayatpekerjaan');
	}

	function updateLowongan($id_lowongan){
		$data['main_view'] = 'validator/v_edit_lowker';
		$where = array('id_lowongan' => $id_lowongan);
		$data['lowongankerja'] = $this->m_lowker->edit_data($where,'lowonganpekerjaan')->result();
		$this->load->view('template/template_validator',$data);
	}

	function edit_data_mahasiswa($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editlowker(){
		$id_lowongan = $this->input->post('id_lowongan');
		$nama_lowongan = $this->input->post('nama_lowongan');
		$nama_perusahaan= $this->input->post('nama_perusahaan');
		$lowongan_jabatan = $this->input->post('lowongan_jabatan');
		$syarat_pekerjaan = $this->input->post('syarat_pekerjaan');
		$pelamar_yang_dibutuhkan = $this->input->post('pelamar_yang_dibutuhkan');
		$kisaran_gaji = $this->input->post('kisaran_gaji');
		$alamat_perusahaan = $this->input->post('alamat_perusahaan');
		$email_perusahaan = $this->input->post('email_perusahaan');
		$website_perusahaan = $this->input->post('website_perusahaan');
		$contact_person = $this->input->post('contact_person');
		$no_telp_perusahaan = $this->input->post('no_telp_perusahaan');
		$username = $this->input->post('username');
		$status = "BelumValid";
		
		$data = array(
			'nama_lowongan' => $nama_lowongan,
			'nama_perusahaan'=>$nama_perusahaan,
			'lowongan_jabatan'=>$lowongan_jabatan,
			'syarat_pekerjaan'=>$syarat_pekerjaan,
			'pelamar_yang_dibutuhkan'=>$pelamar_yang_dibutuhkan,
			'kisaran_gaji'=>$kisaran_gaji,
			'alamat_perusahaan'=>$alamat_perusahaan,
			'email_perusahaan'=>$email_perusahaan,
			'website_perusahaan'=>$website_perusahaan,
			'contact_person'=>$contact_person,
			'no_telp_perusahaan'=>$no_telp_perusahaan,
			'username'=>$username,
			'status'=>$status
		);
		$where = array('id_lowongan' => $id_lowongan);

		$this->m_lowker->update_data($where,$data,'lowonganpekerjaan');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('validator/lowker/riwayatpekerjaan');
	}

	function detail_lowker($id){
			$data['main_view'] = 'validator/v_detail_pekerjaan';
			$data['lowongankerja'] = $this->m_lowker->dataPeminjamanMahasiswa($id);
			$this->load->view('template/template_validator',$data);
	}

	function riwayatpekerjaan(){
		$data['main_view'] = 'validator/v_riwayat_lowker';
		$data['lowongankerja'] = $this->m_lowker->get_data_history_lowker();
		$this->load->view('template/template_validator', $data);
	}
	
	function data_lowker(){
		$data['main_view'] = 'validator/v_data_lowongan';
		$data['lowongankerja'] = $this->m_lowker->data_lowker();
		$this->load->view('template/template_validator', $data);
	}
}