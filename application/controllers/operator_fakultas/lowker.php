<?php 

class Lowker extends CI_Controller{
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
	}

	function index(){
		$data['main_view'] = 'operator_fakultas/v_lowker';
		$data['lowongankerja'] = $this->m_lowker->tampillowker();
		$this->load->view('template/template_operator_fakultas', $data);
	}

	function inputLowker(){
		$data['main_view'] = 'operator_fakultas/v_tambah_lowker';
		$this->load->view('template/template_operator_fakultas',$data);
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
			'status'=>$status
		);
		$this->m_lowker->tambahdata($data,'lowonganpekerjaan');
		$this->session->set_flashdata('notif', "Data Tidak Ditemukan");
		redirect('operator_fakultas/lowker');
	}

	function hapusMahasiswa($nim){
		$where = array('nim' => $nim);
		$this->m_alumni->hapus_data($where,'alumni');
		$this->session->set_flashdata('notif', "Data Alumni $nim berhasil dihapus");
		redirect('operator_fakultas/alumni');
	}

	function updateMahasiswa($nim){
		$data['main_view'] = 'operator_fakultas/v_edit_alumi';
		$where = array('nim' => $nim);
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['negara'] = $this->m_negara->tampilnegara()->result();
		$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
		$data['kota'] = $this->m_negara->tampilkota()->result();
		$data['alumni'] = $this->m_alumni->edit_data($where,'alumni')->result();
		$this->load->view('template/template_operator_fakultas',$data);
	}

	function edit_data_mahasiswa($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editMahasiswa(){
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
			'contact_person'=>$contact_person
		);
		$where = array('nim' => $nim);

		$this->m_alumni->update_data($where,$data,'lowonganpekerjaan');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('operator_fakultas/lowker');
	}
	
	function detail_lowker($id){
			$data['main_view'] = 'operator_fakultas/v_detail_pekerjaan';
			$data['lowongankerja'] = $this->m_lowker->dataPeminjamanMahasiswa($id);
			$this->load->view('template/template_operator_fakultas',$data);
	}
}