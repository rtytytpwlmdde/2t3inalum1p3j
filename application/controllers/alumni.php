<?php 

class Alumni extends CI_Controller{
function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == FALSE){
				redirect('auth/logout');
		}
		$this->load->model('m_auth');
		$this->load->model('m_prodi');
		$this->load->model('m_jurusan');
		$this->load->model('m_alumni');
		$this->load->model('m_negara');
	}

	function index(){
		$data['main_view'] = 'alumni/v_pencarianAlumni';
		$data['mahasiswa'] = $this->m_alumni->tampilrestmahasiswa()->result();
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$this->load->view('template/template_operator', $data);
	}

	function cek_alumni(){
		$angkatan = $this->input->post('angkatan');
		$id_jurusan = $this->input->post('id_jurusan');
		//$cek = $this->m_alumni->cek_ketersediaan_pegawai($NIP)->num_rows();
		$cek1 = $this->m_alumni->cek_ketersediaan_mahasiswa($angkatan,$id_jurusan)->num_rows();
		if($cek1 > 0){
			$data['alumni'] = $this->m_alumni->get_mahasiswa_nim($angkatan,$id_jurusan);
			$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
			$data['prodi'] = $this->m_prodi->tampilProdi()->result();
			$data['negara'] = $this->m_negara->tampilnegara()->result();
			$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
			$data['kota'] = $this->m_negara->tampilkota()->result();
			$data['main_view'] = 'alumni/v_listAlumni';
			$this->load->view('template/template_operator', $data);
		}else{ 	 
			$this->session->set_flashdata('gagal', "Gagal - NIP/NIM tidak terdaftar");
			redirect('alumni');
		}	
	}
	function formTambahAlumni(){
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['negara'] = $this->m_negara->tampilnegara()->result();
		$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
		$data['main_view'] = 'alumni/v_tambahAlumni';
		$this->load->view('template/template_operator',$data);
	}
	function tambahAlumni(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$kewarganegaraan = $this->input->post('kewarganegaraan');
		$nama_negara = $this->input->post('nama_negara');
		$nama_provinsi = $this->input->post('nama_provinsi');
		$nama_kota = $this->input->post('nama_kota');
		$alamat = $this->input->post('alamat');
		$kode_pos = $this->input->post('kode_pos');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$jenjang = $this->input->post('jenjang');
		$angkatan = $this->input->post('angkatan');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$tanggal_yudisium = $this->input->post('tanggal_yudisium');
		$nomor_telepon = $this->input->post('nomor_telepon');
		$nomor_hp = $this->input->post('nomor_hp');
		$email = $this->input->post('email');
		$facebook = $this->input->post('facebook');
		$twitter = $this->input->post('twitter');
		$foto = $this->input->post('foto');
		$password = substr($nim, -6);
		$status_alumni = "nonaktif";

		
		$cek = $this->m_alumni->cek_ketersediaan_alumni($nim)->num_rows();
		
		if($cek > 0){
			$this->session->set_flashdata('gagal', "Alumni $nim sudah terdaftar");
			redirect('alumni/formTambahAlumni');
		}else{
			
			$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto_alumni')){
			$this->session->set_flashdata('gagal', "Gambar tidak sesuai persayaratan, periksa kembali logo perusahaan anda, max 1 mb, jpg/png");
			redirect('alumni/formTambahAlumni');
		}else{                    	            	
			$file = $this->upload->data();
			$gambar = $file['file_name']; 
		}
			
		$data = array(
			'nim' => $nim,
			'username' => $nim,
			'nama' => $nama,
			'jenis_kelamin'=>$jenis_kelamin,
			'tempat_lahir'=>$tempat_lahir,
			'tanggal_lahir'=>$tanggal_lahir,
			'kewarganegaraan'=>$kewarganegaraan,
			'nama_negara'=>$nama_negara,
			'nama_provinsi'=>$nama_provinsi,
			'nama_kota'=>$nama_kota,
			'alamat'=>$alamat,
			'kode_pos'=>$kode_pos,
			'id_jurusan' => $id_jurusan,
			'id_prodi' => $id_prodi,
			'angkatan'=>$angkatan,
			'tahun_lulus'=>$tahun_lulus,
			'tanggal_yudisium'=>$tanggal_yudisium,
			'nomor_telepon'=>$nomor_telepon,
			'nomor_hp'=>$nomor_hp,
			'email'=>$email,
			'facebook'=>$facebook,
			'twitter'=>$twitter,
			'password' =>$password,
			'foto' => $gambar,
			'status_alumni' =>$status_alumni
		);
		$this->m_alumni->tambahdata($data,'alumni');
		$this->session->set_flashdata('sukses', "Data alumni telah ditambahkan");
		redirect('alumni/detailAlumni/'.$nim);
		}
	}

	function hapusMahasiswa($nim){
		$where = array('nim' => $nim);
		$this->m_alumni->hapus_data($where,'alumni');
		$this->session->set_flashdata('sukses', "Data Alumni $nim berhasil dihapus");
		redirect('alumni');
	}

	function updateMahasiswa($nim){
		$data['main_view'] = 'alumni/v_editAlumni';
		$where = array('nim' => $nim);
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['negara'] = $this->m_negara->tampilnegara()->result();
		$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
		$data['kota'] = $this->m_negara->tampilkota()->result();
		$data['alumni'] = $this->m_alumni->edit_data($where,'alumni')->result();
		$this->load->view('template/template_operator',$data);
	}

	function edit_data_mahasiswa($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function updateAlumni(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$kewarganegaraan = $this->input->post('kewarganegaraan');
		$nomor_telepon = $this->input->post('nomor_telepon');
		$nama_negara = $this->input->post('nama_negara');
		$nama_provinsi = $this->input->post('nama_provinsi');
		$nama_kota = $this->input->post('nama_kota');
		$alamat = $this->input->post('alamat');
		$kode_pos = $this->input->post('kode_pos');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$jenjang = $this->input->post('jenjang');
		$angkatan = $this->input->post('angkatan');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$tanggal_yudisium = $this->input->post('tanggal_yudisium');
		$nomor_telepon = $this->input->post('nomor_telepon');
		$nomor_hp = $this->input->post('nomor_hp');
		$email = $this->input->post('email');
		$facebook = $this->input->post('facebok');
		$twitter = $this->input->post('twitter');
		$foto = $this->input->post('foto');
		
		$config['upload_path']          = './foto_alumni/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$this->session->set_flashdata('gagal', "Gambar tidak sesuai persayaratan, periksa kembali logo perusahaan anda, max 1 mb, jpg/png");
			redirect('alumni/editAlumni/'.$nim);
		}else{                    	            	
			$file = $this->upload->data();
			$gambar = $file['file_name']; 
		}

		$data = array(
			'nama' => $nama,
			'jenis_kelamin'=>$jenis_kelamin,
			'tempat_lahir'=>$tempat_lahir,
			'tanggal_lahir'=>$tanggal_lahir,
			'kewarganegaraan'=>$kewarganegaraan,
			'nama_negara'=>$nama_negara,
			'nama_provinsi'=>$nama_provinsi,
			'nomor_telepon'=>$nomor_telepon,
			'nama_kota'=>$nama_kota,
			'alamat'=>$alamat,
			'kode_pos'=>$kode_pos,
			'id_jurusan' => $id_jurusan,
			'id_prodi' => $id_prodi,
			'jenjang'=>$jenjang,
			'angkatan'=>$angkatan,
			'tahun_lulus'=>$tahun_lulus,
			'tanggal_yudisium'=>$tanggal_yudisium,
			'nomor_telepon'=>$nomor_telepon,
			'nomor_hp'=>$nomor_hp,
			'email'=>$email,
			'facebook'=>$facebook,
			'foto'=>$gambar,
			'twitter'=>$twitter
		);

		$where = array('nim' => $nim);

		$this->m_alumni->update_data($where,$data,'alumni');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('alumni/detailAlumni/'.$nim);
	}

	function reset_password(){
		$data['main_view'] = 'alumni/v_reset_password';
		$data['alumni'] = $this->m_alumni->tampilrestmahasiswa()->result();
		$this->load->view('template/template_operator', $data);

		}
		function resetaksi(){
			$nim = $this->input->post('nim');
			$cek1 = $this->m_alumni->cek_ketersediaan_alumni($nim)->num_rows();
			if($cek1 > 0){
				$data['mahasiswa'] = $this->m_alumni->get_alumni_nim($nim);
				$data['main_view'] = 'alumni/v_reset_pass';
				$this->load->view('template/template_operator', $data);
			}else{ 	 
				$this->session->set_flashdata('notif', "Gagal - NIP/NIM tidak terdaftar");
				redirect('alumni/reset_password');
			}	
		}
	
	function pass(){
		$nim = $this->input->post('nim');
		$pass = substr($nim,-6);
		$cek = $this->m_alumni->cek_ketersediaan_alumni($nim)->num_rows();
		if($cek > 0){
			$data = array(
				'nim' => $nim,
				'password' => $pass
				);
		
			$where = array(
				'nim' => $nim
			);
		
			$this->m_alumni->update_data($where,$data,'alumni');
			$this->session->set_flashdata('notif', "Berhasil - Password telah diupdate!");
			redirect('alumni/reset_password/');;
		}else{ 	 
			$this->session->set_flashdata('notif', "Gaagal - NIM Mahasiswa tidak terdaftar");
			redirect('alumni/reset_password');
		}	
		
	}
	
	function detailAlumni($nim){
		$data['username'] = $nim;
		$data['main_view'] = 'alumni/v_detailAlumni';
		$data['alumni'] = $this->m_alumni->dataAlumni($nim);
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}

	function editAlumni($nim){
		$data['username'] = $nim;
		$data['main_view'] = 'alumni/v_editDataAlumni';
		$data['alumni'] = $this->m_alumni->dataAlumni($nim);
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();

		$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
		$data['kota'] = $this->m_negara->tampilkota()->result();
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}

	function riwayatPekerjaan($nim){
		$data['username'] = $nim;
		$data['main_view'] = 'alumni/v_riwayatPekerjaan';
		$data['pekerjaan'] = $this->m_alumni->getDataRiwayatPekerjaan($nim);
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}

	function getDataKotaById(){
		$id=$this->input->post('id');
		$data=$this->m_negara->getDataKotaById($id);
		echo json_encode($data);
	}

	function tambahRiwayatPekerjaan(){
		$nim = $this->input->post('username');
		$jabatan = $this->input->post('jabatan');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$pendapatan = $this->input->post('pendapatan');
		$tgl_mulai = $this->input->post('tgl_mulai');
		$tgl_selesai = $this->input->post('tgl_selesai');
		$golongan_pns = $this->input->post('golongan_pns');
		$alamat_kerja = $this->input->post('alamat_kerja');
		
		$data = array(
			'nim' => $nim,
			'jabatan' => $jabatan,
			'nama_perusahaan' => $nama_perusahaan,
			'pendapatan'=>$pendapatan,
			'tgl_mulai'=>$tgl_mulai,
			'tgl_selesai'=>$tgl_selesai,
			'alamat_kerja'=>$alamat_kerja,
			'golongan_pns'=>$golongan_pns
		);
		$this->m_alumni->tambahdata($data,'riwayat_pekerjaan');
		$this->session->set_flashdata('sukses', "Data riwayat pekerjaan telah ditambahkan");
		redirect('alumni/riwayatPekerjaan/'.$nim);
	}

	function updateRiwayatPekerjaan(){
		$id_riwayat_pekerjaan = $this->input->post('id_riwayat_pekerjaan');
		$jabatan = $this->input->post('jabatan');
		$nim = $this->input->post('username');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$pendapatan = $this->input->post('pendapatan');
		$tgl_mulai = $this->input->post('tgl_mulai');
		$tgl_selesai = $this->input->post('tgl_selesai');
		$golongan_pns = $this->input->post('golongan_pns');
		$alamat_kerja = $this->input->post('alamat_kerja');
		
		$data = array(
			'jabatan' => $jabatan,
			'nama_perusahaan' => $nama_perusahaan,
			'pendapatan'=>$pendapatan,
			'tgl_mulai'=>$tgl_mulai,
			'tgl_selesai'=>$tgl_selesai,
			'alamat_kerja'=>$alamat_kerja,
			'golongan_pns'=>$golongan_pns
		);
		$where = array('id_riwayat_pekerjaan' => $id_riwayat_pekerjaan);
		$this->m_alumni->update_data($where,$data,'riwayat_pekerjaan');
		$this->session->set_flashdata('sukses', "Data riwayat pekerjaan telah berhasil diubah");
		redirect('alumni/riwayatPekerjaan/'.$nim);
	}
	
	function hapusRiwayatPekerjaan(){
		$id_riwayat_pekerjaan = $this->input->post('id_riwayat_pekerjaan');
		$username = $this->input->post('username');
		$where = array('id_riwayat_pekerjaan' => $id_riwayat_pekerjaan);
		$this->m_alumni->hapus_data($where,'riwayat_pekerjaan');
		$this->session->set_flashdata('sukses', "Data riwayat pekerjaan telah dihapus");
		redirect('alumni/riwayatPekerjaan/'.$username);
	}

	function pendidikan($id){
		$data['username'] = $id;
		$data['main_view'] = 'alumni/v_riwayatPendidikan';
		$data['pendidikan'] = $this->m_alumni->getDataRiwayatPendidikan($id);
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}

	function tambahRiwayatPendidikan(){
		$nim = $this->input->post('username');
		$nama_sekolah = $this->input->post('nama_sekolah');
		$jurusan_pendidikan = $this->input->post('jurusan_pendidikan');
		$jenjang_pendidikan = $this->input->post('jenjang_pendidikan');
		$tahun_masuk = $this->input->post('tahun_masuk');
		$tahun_lulus = $this->input->post('tahun_lulus');
		
		$data = array(
			'username' => $nim,
			'nama_sekolah' => $nama_sekolah,
			'jurusan_pendidikan' => $jurusan_pendidikan,
			'jenjang_pendidikan'=>$jenjang_pendidikan,
			'tahun_masuk'=>$tahun_masuk,
			'tahun_lulus'=>$tahun_lulus
		);
		$this->m_alumni->tambahdata($data,'pendidikan');
		$this->session->set_flashdata('sukses', "Data riwayat pendidikan telah ditambahkan");
		redirect('alumni/pendidikan/'.$nim);
	}

	function updateRiwayatPendidikan(){
		$id_pendidikan = $this->input->post('id_pendidikan');
		$nim = $this->input->post('username');
		$nama_sekolah = $this->input->post('nama_sekolah');
		$jurusan_pendidikan = $this->input->post('jurusan_pendidikan');
		$jenjang_pendidikan = $this->input->post('jenjang_pendidikan');
		$tahun_masuk = $this->input->post('tahun_masuk');
		$tahun_lulus = $this->input->post('tahun_lulus');
		
		$data = array(
			'nama_sekolah' => $nama_sekolah,
			'jurusan_pendidikan' => $jurusan_pendidikan,
			'jenjang_pendidikan'=>$jenjang_pendidikan,
			'tahun_masuk'=>$tahun_masuk,
			'tahun_lulus'=>$tahun_lulus
		);
		$where = array('id_pendidikan' => $id_pendidikan);
		$this->m_alumni->update_data($where,$data,'pendidikan');
		$this->session->set_flashdata('sukses', "Data riwayat pendidikan telah berhasil diubah");
		redirect('alumni/pendidikan/'.$nim);
	}
	
	function hapusRiwayatPendidikan(){
		$id_pendidikan = $this->input->post('id_pendidikan');
		$username = $this->input->post('username');
		$where = array('id_pendidikan' => $id_pendidikan);
		$this->m_alumni->hapus_data($where,'pendidikan');
		$this->session->set_flashdata('sukses', "Data riwayat pendidikan telah dihapus");
		redirect('alumni/pendidikan/'.$username);
	}

	function ijazah($id,$jenis){
		$data['jenis'] = $jenis;
		$data['username'] = $id;
		$data['main_view'] = 'alumni/v_ijazah';
		$data['ijazah'] = $this->m_alumni->getDataIjazahByNim($id);
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}

	function updateIjazah(){
		$username = $this->input->post('username');
		$dokumen = $this->input->post('dokumen');
		$tanggal_ijazah = $this->input->post('tanggal_ijazah');
		$status = 'terkirim';
		$config['upload_path']          = './ijazah/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('dokumen')){
			$this->session->set_flashdata('gagal', "Dokumen tidak sesuai persayaratan, periksa kembali dokumen anda, max 1 mb, format pdf");
			redirect('alumni/ijazah/'.$username.'/ijazah');
		}else{                    	            	
			$file = $this->upload->data();
			$pdf = $file['file_name']; 
		}

		$data = array(
			'dokumen_ijazah' => $pdf,
			'tanggal_ijazah'=>$tanggal_ijazah,
			'validasi_ijazah'=>$status
		);

		$where = array('username' => $username);

		$this->m_alumni->update_data($where,$data,'alumni');
		$this->session->set_flashdata('notif', "Dokumen Ijazah berhasil di Update");
		redirect('alumni/ijazah/'.$username.'/ijazah');
	}

	function updateTranskrip(){
		$username = $this->input->post('username');
		$dokumen = $this->input->post('dokumen');
		$status = 'terkirim';
		$config['upload_path']          = './ijazah/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('dokumen')){
			$this->session->set_flashdata('gagal', "Dokumen tidak sesuai persayaratan, periksa kembali dokumen anda, max 1 mb, format pdf");
			redirect('alumni/editAlumni/'.$nim);
		}else{                    	            	
			$file = $this->upload->data();
			$pdf = $file['file_name']; 
		}

		$data = array(
			'dokumen_transkrip' => $pdf
		);

		$where = array('username' => $username);

		$this->m_alumni->update_data($where,$data,'alumni');
		$this->session->set_flashdata('notif', "Dokumen Transkrip berhasil di Update");
		redirect('alumni/ijazah/'.$username.'/transkrip');
	}


}
