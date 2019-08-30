<?php 

class Profil extends CI_Controller{
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
		$this->load->model('m_profil_alumni');
		$this->load->model('m_prodi');
		$this->load->model('m_jurusan');
		$this->load->model('m_lowker');
	}
	function index(){
			$data['main_view'] = 'alumni/v_data_alumni';
			$data['alumni'] = $this->m_profil_alumni->getDataProfil();   
			$this->load->view('template/template_alumni', $data);
		}
	function informasilulusan(){
			$data['main_view'] = 'alumni/v_informasi_lulusan';
			$data['alumni'] = $this->m_profil_alumni->getDataProfil(); 
			$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
			$data['prodi'] = $this->m_prodi->tampilProdi()->result();
			$this->load->view('template/template_alumni', $data);
		}
		function riwayatpekerjaan(){
			$data['main_view'] = 'alumni/v_riwayat_pekerjaan';
			$data['riwayat_pekerjaan'] = $this->m_profil_alumni->getDataPekerjaan() ;  
			$this->load->view('template/template_alumni', $data);
		}
		function editpassword(){
			$data['main_view'] = 'alumni/v_update_password';
			$data['alumni'] = $this->m_profil_alumni->getDataProfil();   
			$this->load->view('template/template_alumni', $data);
		}
		
		function update_password(){
			$nim = $this->input->post('nim');
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$data_lama = array(
				'nim' => $nim,
				'password' => $password_lama,
				);
			$data_baru = array(
				'nim' => $nim,
				'password' => $password_baru,
				);
		
			$where = array(
				'nim' => $nim
			);
			//
			$cek = $this->m_auth->cek_login("alumni",$data_lama)->num_rows();
			if($cek > 0){
				$this->m_auth->update_password($where,$data_baru,'alumni');
				$this->session->set_flashdata('notif', "Password berhasil diupdate");
				redirect('alumni/profil/');
			}else{
				$this->session->set_flashdata('notif', "GAGAL - Password Lama tidak sesuai");
				redirect('alumni/profil');
			}
		}
		function editfoto(){
		$data['main_view'] = 'alumni/v_update_foto';
		$data['alumni'] = $this->m_profil_alumni->getDataProfil();   
		$this->load->view('template/template_alumni', $data);
		}
		
		public function updatefoto(){
        $id_login = $this->input->post('nim');
		$foto = $this->input->post('foto');
        $config['upload_path']          = './img/alumni_pic/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);

        if(! $this->upload->do_upload('foto')){
				$i  = $this->input;
                 $data = array(
                      'foto'               =>  $i->post('data_foto'),
                      'nim'           =>  $id_login
                    );
				$where = array(
				'nim' => $id_login
			);
                $this->m_profil_alumni->update_data($where,$data,'alumni');
                $this->session->set_flashdata('success', 'Update foto alumni gagal.');
                redirect('alumni/profil/editfoto/');
              }else{
				 $i  = $this->input;
                 $data = array(
                      'foto'               =>  $this->upload->data('file_name'),
                      'nim'           =>  $id_login
                    );
				$where = array(
				'nim' => $id_login
			);
                $this->m_profil_alumni->update_data($where,$data,'alumni');
                $this->session->set_flashdata('success', 'Update foto alumni berhasil.');
                redirect('alumni/profil/editfoto/');
              }
			}
			
		// 	public function updatefoto(){
    //     $id_login = $this->input->post('nim');
		// $foto = $this->input->post('foto');
    //     $config['upload_path']          = './img/alumni_pic/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['max_size']             = 3000;
    //     $config['max_width']            = 5000;
    //     $config['max_height']           = 5000;
    //     $config['encrypt_name']         = TRUE;
    //     $this->load->library('upload', $config);

    //     if(! $this->upload->do_upload('foto')){
		// 		$i  = $this->input;
    //              $data = array(
    //                   'foto'               =>  $i->post('data_foto'),
    //                   'nim'           =>  $id_login
    //                 );
		// 		$where = array(
		// 		'nim' => $id_login
		// 	);
    //             $this->m_profil_alumni->update_data($where,$data,'alumni');
    //             $this->session->set_flashdata('success', 'Update foto alumni gagal.');
    //             redirect('alumni/profil/editfoto/');
    //           }else{
		// 		 $i  = $this->input;
    //              $data = array(
    //                   'foto'               =>  $this->upload->data('file_name'),
    //                   'nim'           =>  $id_login
    //                 );
		// 		$where = array(
		// 		'nim' => $id_login
		// 	);
    //             $this->m_profil_alumni->update_data($where,$data,'alumni');
    //             $this->session->set_flashdata('success', 'Update foto alumni berhasil.');
    //             redirect('alumni/profil/editfoto/');
    //           }
    //   }

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
	  function editMahasiswa(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$kewarganegaraan = $this->input->post('kewarganegaraan');
		$nama_negara = $this->input->post('nama_negara');
		$nama_provinsi = $this->input->post('nama_provinsi');
		$nama_kota = $this->input->post('nama_kota');
		$alamat = $this->input->post('alamat');
		$kode_pos = $this->input->post('kode_pos');
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
			'username' => $username,
			'jenis_kelamin'=>$jenis_kelamin,
			'tempat_lahir'=>$tempat_lahir,
			'tanggal_lahir'=>$tanggal_lahir,
			'kewarganegaraan'=>$kewarganegaraan,
			'nama_negara'=>$nama_negara,
			'nama_provinsi'=>$nama_provinsi,
			'nama_kota'=>$nama_kota,
			'alamat'=>$alamat,
			'kode_pos'=>$kode_pos,
			'nomor_telepon'=>$nomor_telepon,
			'nomor_hp'=>$nomor_hp,
			'email'=>$email,
			'facebook'=>$facebook,
			'twitter'=>$twitter
		);

		$where = array('nim' => $nim);

		$this->m_profil_alumni->update_data($where,$data,'alumni');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('alumni/profil/');
	}
	
	function inputPekerjaan(){
		$data['main_view'] = 'alumni/v_tambah_riwayat';
		$this->load->view('template/template_alumni', $data);
	}
	
	function tambahPekerjaan(){
		$nim = $this->input->post('nim');
		$tempat_kerja = $this->input->post('tempat_kerja');
		$posisi = $this->input->post('posisi');
		$golongan_pns = $this->input->post('golongan_pns');
		$pendapatan_per_bulan = $this->input->post('pendapatan_per_bulan');
		$mulai_kerja = $this->input->post('mulai_kerja');
		$berhenti_kerja = $this->input->post('berhenti_kerja');
		$alamat_kerja = $this->input->post('alamat_kerja');
	
		$data = array(
			'nim' => $nim,
			'tempat_kerja'=>$tempat_kerja,
			'posisi'=>$posisi,
			'golongan_pns'=>$golongan_pns,
			'pendapatan_per_bulan'=>$pendapatan_per_bulan,
			'mulai_kerja'=>$mulai_kerja,
			'berhenti_kerja'=>$berhenti_kerja,
			'alamat_kerja'=>$alamat_kerja
			);
			
		$this->m_profil_alumni->tambahdata($data,'riwayat_pekerjaan');
		$this->session->set_flashdata('notif', "Data Tidak Ditemukan");
		redirect('alumni/profil');	
	}
	
	function hapusPekerjaan($id_riwayat_pekerjaan){
		$where = array('id_riwayat_pekerjaan' => $id_riwayat_pekerjaan);
		$this->m_profil_alumni->hapus_data($where,'riwayat_pekerjaan');
		$this->session->set_flashdata('notif', "Data Alumni $nim berhasil dihapus");
		redirect('alumni/profil');
	}
	
	 function updatePekerjaan($id_riwayat_pekerjaan){
		$data['main_view'] = 'alumni/v_edit_riwayat';
		$where = array('id_riwayat_pekerjaan' => $id_riwayat_pekerjaan);;
		$data['riwayat_pekerjaan'] = $this->m_profil_alumni->edit_data($where,'riwayat_pekerjaan')->result();
		$this->load->view('template/template_alumni',$data);
	}
	
		function editPekerjaan(){
		$id_riwayat_pekerjaan = $this->input->post('id_riwayat_pekerjaan');
		$nim = $this->input->post('nim');
		$tempat_kerja = $this->input->post('tempat_kerja');
		$posisi = $this->input->post('posisi');
		$golongan_pns = $this->input->post('golongan_pns');
		$pendapatan_per_bulan = $this->input->post('pendapatan_per_bulan');
		$mulai_kerja = $this->input->post('mulai_kerja');
		$berhenti_kerja = $this->input->post('berhenti_kerja');
		$alamat_kerja = $this->input->post('alamat_kerja');
	
		$data = array(
			'nim' => $nim,
			'tempat_kerja'=>$tempat_kerja,
			'posisi'=>$posisi,
			'golongan_pns'=>$golongan_pns,
			'pendapatan_per_bulan'=>$pendapatan_per_bulan,
			'mulai_kerja'=>$mulai_kerja,
			'berhenti_kerja'=>$berhenti_kerja,
			'alamat_kerja'=>$alamat_kerja
			);
			
		$where = array('id_riwayat_pekerjaan' => $id_riwayat_pekerjaan);
			
		$this->m_profil_alumni->update_data($where,$data, 'riwayat_pekerjaan');
		$this->session->set_flashdata('notif', "Data Tidak Ditemukan");
		redirect('alumni/profil');	
	}
}
		