<?php 

class Alumni extends CI_Controller{
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
	}

	function index(){
		$data['main_view'] = 'admin/v_pencarian_alumni';
		$data['mahasiswa'] = $this->m_alumni->tampilrestmahasiswa()->result();
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$this->load->view('template/template_admin', $data);
	}

	function cek_alumni(){
		$angkatan = $this->input->post('angkatan');
		$id_jurusan = $this->input->post('id_jurusan');
		//$cek = $this->m_admin->cek_ketersediaan_pegawai($NIP)->num_rows();
		$cek1 = $this->m_alumni->cek_ketersediaan_mahasiswa($angkatan,$id_jurusan)->num_rows();
		if($cek1 > 0){
			$data['alumni'] = $this->m_alumni->get_mahasiswa_nim($angkatan,$id_jurusan);
			$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
			$data['prodi'] = $this->m_prodi->tampilProdi()->result();
			$data['negara'] = $this->m_negara->tampilnegara()->result();
			$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
			$data['kota'] = $this->m_negara->tampilkota()->result();
			$data['main_view'] = 'admin/v_data_mahasiswa';
			$this->load->view('template/template_admin', $data);
		}else{ 	 
			$this->session->set_flashdata('notif', "Gagal - NIP/NIM tidak terdaftar");
			redirect('admin/alumni');
		}	
	}
	function inputMahasiwa(){
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['negara'] = $this->m_negara->tampilnegara()->result();
		$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
		$data['kota'] = $this->m_negara->tampilkota()->result();
		$data['main_view'] = 'admin/v_tambah_alumni';
		$this->load->view('template/template_admin',$data);
	}
	function tambahMahasiswa(){
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
		$facebook = $this->input->post('facebok');
		$twitter = $this->input->post('twitter');
		$password = substr($nim, -6);
		$username = $nim;
		$foto = "default.png";
		$status_alumni = "nonaktif";
		/*if($id_jurusan=="prodi"){
		echo $this->model_select->kabupaten($id_prodi);
		}*/
		if(!preg_match('/[^+0-9]/',trim($nomor_hp))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($nomor_hp), 0, 2)=='62'){
            $hp = trim($nomor_hp);
        }elseif(substr(trim($nomor_hp), 0, 3)=='+62'){
            $hp = trim($nomor_hp);
		}
        // cek apakah no hp karakter 1 adalah 0
        elseif(substr(trim($nomor_hp), 0, 1)=='0'){
            $hp = '62'.substr(trim($nomor_hp), 1);
        }
		}
		
		
		$cek = $this->m_alumni->cek_ketersediaan_alumni($nim)->num_rows();
		
		if($cek > 0){
			$this->session->set_flashdata('notif', "Alumni $nim sudah terdaftar");
			redirect('admin/alumni/inputMahasiwa');
		}else{
			
		$data = array(
			'nim' => $nim,
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
			'jenjang'=>$jenjang,
			'angkatan'=>$angkatan,
			'tahun_lulus'=>$tahun_lulus,
			'tanggal_yudisium'=>$tanggal_yudisium,
			'nomor_telepon'=>$nomor_telepon,
			'nomor_hp'=>$nomor_hp,
			'email'=>$email,
			'facebook'=>$facebook,
			'twitter'=>$twitter,
			'password' =>$password,
			'username'=>$username,
			'foto' => $foto,
			'status_alumni' =>$status_alumni
		);
		$this->m_alumni->tambahdata($data,'alumni');
		$this->session->set_flashdata('notif', "Data Tidak Ditemukan");
		redirect('admin/alumni');
		}
	}

	function hapusMahasiswa($nim){
		$where = array('nim' => $nim);
		$this->m_alumni->hapus_data($where,'alumni');
		$this->session->set_flashdata('notif', "Data Alumni $nim berhasil dihapus");
		redirect('admin/alumni');
	}

	function updateMahasiswa($nim){
		$data['main_view'] = 'admin/v_edit_alumi';
		$where = array('nim' => $nim);
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['negara'] = $this->m_negara->tampilnegara()->result();
		$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
		$data['kota'] = $this->m_negara->tampilkota()->result();
		$data['alumni'] = $this->m_alumni->edit_data($where,'alumni')->result();
		$this->load->view('template/template_admin',$data);
	}

	function edit_data_mahasiswa($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editMahasiswa(){
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
		$twitter = $this->input->post('twitter');;
		/*if($id_jurusan=="prodi"){
		echo $this->model_select->kabupaten($id_prodi);
		}*/
		if(!preg_match('/[^+0-9]/',trim($nomor_hp))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($nomor_hp), 0, 2)=='62'){
            $hp = trim($nomor_hp);
        }elseif(substr(trim($nomor_hp), 0, 3)=='+62'){
            $hp = trim($nomor_hp);
		}
        // cek apakah no hp karakter 1 adalah 0
        elseif(substr(trim($nomor_hp), 0, 1)=='0'){
            $hp = '62'.substr(trim($nomor_hp), 1);
        }
    }
		$data = array(
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
			'jenjang'=>$jenjang,
			'angkatan'=>$angkatan,
			'tahun_lulus'=>$tahun_lulus,
			'tanggal_yudisium'=>$tanggal_yudisium,
			'nomor_telepon'=>$nomor_telepon,
			'nomor_hp'=>$nomor_hp,
			'email'=>$email,
			'facebook'=>$facebook,
			'twitter'=>$twitter
		);

		$where = array('nim' => $nim);

		$this->m_alumni->update_data($where,$data,'alumni');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('admin/alumni');
	
	}

	function detail_alumni($nim){
		$data['main_view'] = 'admin/v_detail_alumni';
		$data['alumni'] = $this->m_alumni->dataalumni($nim);
		$data['riwayatpekerjaan'] = $this->m_alumni->riwayatpekerjaan($nim);
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['negara'] = $this->m_negara->tampilnegara()->result();
		$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
		$data['kota'] = $this->m_negara->tampilkota()->result();
		$this->load->view('template/template_admin', $data);
		}

	function chatting(){
			$data['main_view'] = 'admin/v_percakapan';
			$this->load->view('template/template_admin', $data);
		}
		
	
	function reset_password(){
		$data['main_view'] = 'admin/v_reset_password';
		$data['alumni'] = $this->m_alumni->tampilrestmahasiswa()->result();
		$this->load->view('template/template_admin', $data);

		}
		function resetaksi(){
			$nim = $this->input->post('nim');
			$cek1 = $this->m_alumni->cek_ketersediaan_alumni($nim)->num_rows();
			if($cek1 > 0){
				$data['mahasiswa'] = $this->m_alumni->get_alumni_nim($nim);
				$data['main_view'] = 'admin/v_reset_pass';
				$this->load->view('template/template_admin', $data);
			}else{ 	 
				$this->session->set_flashdata('notif', "Gagal - NIP/NIM tidak terdaftar");
				redirect('admin/alumni/reset_password');
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
			redirect('admin/alumni/reset_password/');;
		}else{ 	 
			$this->session->set_flashdata('notif', "Gaagal - NIM Mahasiswa tidak terdaftar");
			redirect('admin/alumni/reset_password');
		}	
		
	}
}
