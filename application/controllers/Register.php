   
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class register extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_auth');
		$this->load->model('m_register');
		$this->load->model('m_jurusan');
		$this->load->model('m_prodi');
	}
	public function index()
	{
		$data['main_view'] = 'guest/v_register';
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$this->load->view('guest/v_register', $data);
	}
	
	public function submit(){
		//passing post data dari view
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$tanggal_yudisium = $this->input->post('tanggal_yudisium');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$jenjang = $this->input->post('jenjang');
		$angkatan = $this->input->post('angkatan');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$password = substr($nim, -6);
		$username = $nim;
		
		//$cek = $this->m_register->cek_data_nim($nim)->num_rows();
		$cek1 = $this->m_register->cek_data_alumni($nim,$tanggal_yudisium);
		//memasukan ke array
		if($cek1  != false){
			$status_alumni = "BelumVerifikasi";	
			$data = array(
			 'nim' => $nim,
				'status_alumni' =>$status_alumni
			);
			$where = array(
			 'nim' => $nim,
			 'tanggal_yudisium' => $tanggal_yudisium
			);
			$this->m_register->updatedata($where,$data,'alumni');
			$this->session->set_flashdata('notif', "Data Pendaftaran telah disimpan. Silahkan Cek Email untuk Verifikasi");
			redirect('auth');
			//echo "true".$nim." ".$status_alumni;
		}else{
			$status_alumni = "Pending";	
			$data = array(
				'nim' => $nim,
				'nama' => $nama,
				'id_jurusan' => $id_jurusan,
				'id_prodi' => $id_prodi,
				'jenjang'=>$jenjang,
				'angkatan'=>$angkatan,
				'tahun_lulus'=>$tahun_lulus,
				'tanggal_yudisium'=>$tanggal_yudisium,
				'password' =>$password,
				'username'=>$username,
				'status_alumni' =>$status_alumni
			);
				$this->m_register->tambahdata($data,'alumni');
				$this->session->set_flashdata('notif', "Data Pendaftaran Berhasil. Silahkan menunggu verifikasi dari Validator");
				redirect('auth');
				
		}
	}
	
	public function verification($key)
	{
		$this->load->helper('url');
		$this->load->model('m_register');
		$this->m_register->changeActiveState($key);
		echo "Selamat kamu telah memverifikasi akun kamu";
		echo "<br><br><a href='".site_url("login")."'>Kembali ke Menu Login</a>";
	}
	
}
