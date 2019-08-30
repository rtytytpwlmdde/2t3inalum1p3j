<?php 

class kuisioner extends CI_Controller{
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
		$this->load->model('m_group_chat');
		$this->load->model('m_paket_kuisioner');
		$this->load->model('m_kuisioner');
		
	
	}

	function datakuisioner($id_paket_kuisioner){
		$url=$this->uri->segment(4);
		$url = $id_paket_kuisioner;
		$data['paket_kuisioner'] = $id_paket_kuisioner;
		$data['main_view'] = 'admin/v_kuisioner';
		$data['kuisioner'] = $this->m_kuisioner->datakuisioner($url);
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$this->load->view('template/template_admin', $data);
	}
	
	function inputKuisioner($id){
		$data['paket_kuisioner'] = $id;
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$data['prodi'] = $this->m_prodi->tampilProdi()->result();
		$data['main_view'] = 'admin/v_tambah_kuisioner';
		$this->load->view('template/template_admin',$data);
	}
	function tambahKuisioner(){
		$id_paket_kuisioner = $this->input->post('id_paket_kuisioner');
		$kuisioner = $this->input->post('kuisioner');
		$jenis_kuisioner = $this->input->post('jenis_kuisioner');
		$tahun_angkatan = $this->input->post('tahun_angkatan');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		//$pembuat = $this->input->post('pembuat');
		
		$data = array(
			'id_paket_kuisioner' => $id_paket_kuisioner,
			'kuisioner' => $kuisioner,
			'jenis_kuisioner' => $jenis_kuisioner,
			'tahun_angkatan' => $tahun_angkatan,
			'id_jurusan' => $id_jurusan,
			'id_prodi' => $id_prodi
		);
		$this->m_kuisioner->tambahdata($data,'kuisioner');
		$this->session->set_flashdata('notif', "Data Tidak Ditemukan");
		redirect('admin/kuisioner/datakuisioner/'.$id_paket_kuisioner);
	}

	function hapusPaket($id_paket){
		$where = array('id_paket' => $id_paket);
		$this->m_paket_kuisioner->hapus_data($where,'paket_soal');
		$this->session->set_flashdata('notif', "Data Alumni $nim berhasil dihapus");
		redirect('admin/paket_kuisioner');
	}

	function updatePaket($id_paket){
		$data['paket_kuisioner'] = $id;
		$data['main_view'] = 'admin/v_edit_kuisioner';
		$where = array('id_kuisioner' => $id_kuisioner);
		$data['paket_kuisioner'] = $this->m_paket_kuisioner->edit_data($where,'kuisioner')->result();
		$this->load->view('template/template_admin',$data);
	}

	function edit_data_mahasiswa($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editpaket(){
		$id_paket_kuisioner=$this->input->post('id_paket_kuisioner');
		$id_kuisioner=$this->input->post('id_kuisioner');
		$kuisioner = $this->input->post('kuisioner');
		$jenis_kuisioner = $this->input->post('jenis_kuisioner');
		$tahun_angkatan = $this->input->post('tahun_angkatan');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		//$pembuat = $this->input->post('pembuat');
		
		$data = array(
			'id_paket_kuisioner' => $id_paket_kuisioner,
			'kuisioner' => $kuisioner,
			'jenis_kuisioner' => $jenis_kuisioner,
			'tahun_angkatan' => $tahun_angkatan,
			'id_jurusan' => $id_jurusan,
			'id_prodi' => $id_prodi
		);
		$where = array('id_kuisioner' => $id_kuisioner);

		$this->m_paket_kuisioner->update_data($where,$data,'paket_soal');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('admin/paket_kuisioner');
	}


}
