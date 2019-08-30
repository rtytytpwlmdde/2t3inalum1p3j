<?php 

class validasi extends CI_Controller{
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
        $this->load->model('m_opendonasi');
	}

	function validasi_lowongan(){
		$data['main_view'] = 'validator/v_data_lowongan';
		$data['lowongankerja'] = $this->m_lowker->tampillowker()->result();
		$this->load->view('template/template_validator', $data);
	}
	
	function aksivalidasi_lowker($id_lowongan,$status){
		$data = array('status' => $status);
		 $where = array('id_lowongan' => $id_lowongan);
		$this->m_lowker->update_data($where,$data,'lowonganpekerjaan');
		redirect('validator/lowker/data_lowker');
	}
	
	function data_open(){
		$data['main_view'] = 'validator/v_open_donasi';
		$data['opendonasi'] = $this->m_opendonasi->tampilopendonasi()->result();
		$this->load->view('template/template_validator', $data);
	}
	
	function validasi_donasi($id_detail_open,$status){
		$data = array('status' => $status);
		 $where = array('id_detail_open' => $id_detail_open);
		$this->m_lowker->update_data($where,$data,'detail_open_donasi');
		redirect('validator/opendonasi/data_open');
	}
	
	function data_alumni(){
			$data['alumni'] = $this->m_alumni->data_alumni()->result();
			$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
			$data['prodi'] = $this->m_prodi->tampilProdi()->result();
			$data['negara'] = $this->m_negara->tampilnegara()->result();
			$data['provinsi'] = $this->m_negara->tampilprovinsi()->result();
			$data['kota'] = $this->m_negara->tampilkota()->result();
			$data['main_view'] = 'validator/v_data_alumni';
			$this->load->view('template/template_validator', $data);
	}
	
	function validasi_alumni($nim,$status_alumni){
		$data = array('status_alumni' => $status_alumni);
		 $where = array('nim' => $nim);
		$this->m_lowker->update_data($where,$data,'alumni');
		redirect('validator/validasi/data_alumni');
	}
	
}