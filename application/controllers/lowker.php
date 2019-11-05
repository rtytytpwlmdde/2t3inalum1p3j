<?php
class Lowker extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_lowker');
		$this->load->model('m_admin');
	}
	function listLowker(){
		$data['main_view'] = 'lowker/v_listLowker';
        $data['lowker'] = $this->m_lowker->getDataLowker();
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}
	
	function formTambahLowker(){
		$data['main_view'] = 'lowker/v_tambahLowonganKerja';
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}
	
	function tambahLowker(){
		$id_penulis = $this->session->userdata('username');
		$jenis_informasi = 'pekerjaan';
		$nama_informasi = 'Lowongan Pekerjaan';
		$lowongan_jabatan = $this->input->post('lowongan_jabatan');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$tanggal_informasi = $this->input->post('tanggal_informasi');
		$contact_person = $this->input->post('contact_person');
		$email_perusahaan = $this->input->post('email_perusahaan');
		$website_perusahaan = $this->input->post('website_perusahaan');
		$alamat_perusahaan = $this->input->post('alamat_perusahaan');
		$kisaran_gaji = $this->input->post('kisaran_gaji');
		$syarat_pekerjaan = $this->input->post('syarat_pekerjaan');
		$logo_perusahaan = $this->input->post('logo_perusahaan');
		$batas_penayanagan = $this->input->post('batas_penayanagan');
	
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('logo_perusahaan')){
			$this->session->set_flashdata('gagal', "Gambar tidak sesuai persayaratan, periksa kembali logo perusahaan anda, max 1 mb, jpg/png");
			redirect('lowker/formTambahLowker');
		}else{                    	            	
			$file = $this->upload->data();
			$gambar = $file['file_name']; 
		}

		$dt_informasi = array(
			'id_penulis' => $id_penulis,
			'nama_informasi' => $nama_informasi,
			'tanggal_informasi' => $tanggal_informasi,
			'jenis_informasi' => $jenis_informasi
		);
		$this->m_admin->tambahdata($dt_informasi,'informasi');
		$pekerjaan = $this->m_lowker->getDataInformasiPekerjaanBy($id_penulis,$nama_informasi,$tanggal_informasi,$jenis_informasi);
		$id_informasi = null;
		foreach ($pekerjaan as $u){
			echo $id_informasi = $u->id_informasi;
			echo $tanggal_informasi."-".$u->tanggal_informasi;
		}
		$data = array(
			'id_informasi' => $id_informasi,
			'lowongan_jabatan' => $lowongan_jabatan,
			'nama_perusahaan' => $nama_perusahaan,
			'contact_person' => $contact_person,
			'email_perusahaan' => $email_perusahaan,
			'website_perusahaan' => $website_perusahaan,
			'alamat_perusahaan' => $alamat_perusahaan,
			'kisaran_gaji' => $kisaran_gaji,
			'batas_penayangan' => $batas_penayangan,
			'logo_perusahaan' => $gambar,
			'syarat_pekerjaan' => $syarat_pekerjaan
		);
		$this->m_admin->tambahdata($data,'lowongan_pekerjaan');
		$this->session->set_flashdata('gagal', "data lowongan pekerjaan berhasil ditambahkan");
		redirect('lowker/myLowker');
	}

	function myLowker(){
		$data['main_view'] = 'lowker/v_listLowker';
        $data['lowker'] = $this->m_lowker->getDataLowkerByName();
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}

	function detailLowker($id){
		$data['main_view'] = 'lowker/v_detailLowker';
        $data['lowker'] = $this->m_lowker->getDataLowkerById($id);
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}

	function editLowker($id){
		$data['main_view'] = 'lowker/v_editLowker';
        $data['lowker'] = $this->m_lowker->getDataLowkerById($id);
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}

	function updateLowker(){
		$id_lowongan = $this->input->post('id_lowongan');
		$lowongan_jabatan = $this->input->post('lowongan_jabatan');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$tanggal_informasi = $this->input->post('tanggal_informasi');
		$contact_person = $this->input->post('contact_person');
		$email_perusahaan = $this->input->post('email_perusahaan');
		$website_perusahaan = $this->input->post('website_perusahaan');
		$alamat_perusahaan = $this->input->post('alamat_perusahaan');
		$kisaran_gaji = $this->input->post('kisaran_gaji');
		$syarat_pekerjaan = $this->input->post('syarat_pekerjaan');
		$logo_perusahaan = $this->input->post('logo_perusahaan');
		$batas_penayangan = $this->input->post('batas_penayangan');
		$logo = $this->input->post('gambar');
	
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if($logo_perusahaan != null){
			if ( ! $this->upload->do_upload('logo_perusahaan')){
				$this->session->set_flashdata('gagal', "Gambar tidak sesuai persayaratan, periksa kembali logo perusahaan anda, max 1 mb, jpg/png");
				redirect('lowker/editLowker/'.$id_lowongan);
			}else{                    	            
				$data = array('upload_data' => $this->upload->data());	
				$file = $this->upload->data();
				$gambar = $file['file_name']; 
			}
		}else{
			$gambar = $logo;
		}


		$dt_lowker = array(
			'lowongan_jabatan' => $lowongan_jabatan,
			'nama_perusahaan' => $nama_perusahaan,
			'contact_person' => $contact_person,
			'email_perusahaan' => $email_perusahaan,
			'website_perusahaan' => $website_perusahaan,
			'alamat_perusahaan' => $alamat_perusahaan,
			'kisaran_gaji' => $kisaran_gaji,
			'logo_perusahaan' => $gambar,
			'batas_penayangan' => $batas_penayangan,
			'syarat_pekerjaan' => $syarat_pekerjaan
		);
		$where = array('id_lowongan' => $id_lowongan);
		$this->m_admin->update_data($where,$dt_lowker,'lowongan_pekerjaan'); 
		$this->session->set_flashdata('sukses', "data lowongan pekerjaan berhasil diubah");
		redirect('lowker/detailLowker/'.$id_lowongan);
	}
}