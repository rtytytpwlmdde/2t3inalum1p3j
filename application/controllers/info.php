<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_info');
		$this->load->model('m_admin');
		$this->load->model('m_lowker');
	}

	function timeline(){
		$data['main_view'] = 'info/v_timeline';
		$data['timeline'] = $this->m_info->getDataTimeline();
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}

	function formTambahInfo(){
		$data['main_view'] = 'info/v_tambahInfo';
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}

	function tambahInformasi(){
		$id_penulis = $this->session->userdata('username');
		$jenis_informasi = 'informasi';
		$nama_informasi = $this->input->post('nama_informasi');
		$judul_informasi = $this->input->post('judul_informasi');
		$link_info = $this->input->post('link_info');
		
		$data = array(
			'id_penulis' => $id_penulis,
			'judul_informasi' => $judul_informasi,
			'nama_informasi' => $nama_informasi,
			'link_informasi' => $link_info,
			'jenis_informasi' => $jenis_informasi
		);
		$this->m_admin->tambahdata($data,'informasi');
		$this->session->set_flashdata('sukses', "informasi telah berhasil ditambahkan");
		redirect('info/timeline');
	}

	function detailInformasi($id,$jenis){
		if($jenis == 'informasi'){
			$data['main_view'] = 'info/v_detailTimeline';
			$data['timeline'] = $this->m_info->getDataTimelineById($id);
		}else{
			$data['main_view'] = 'lowker/v_detailLowker';
			$data['lowker'] = $this->m_lowker->getDataLowkerById($id);
		}
		if($this->session->userdata('status') == 'alumni'){
			$this->load->view('template/template_alumni', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
	}
   


 

}