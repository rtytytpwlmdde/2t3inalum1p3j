<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Prodi_Model');
    $this->load->model('Jurusan_Model');
  }

function lihat_prodi(){
		$data['main_view'] = 'admin/v_list_prodi';
		$data['jurusan'] = $this->m_admin->get_jurusan();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$this->load->view("layouts/wrapper", $data, false);
	}
	
	function inputProdi(){
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['main_view'] = 'admin/v_tambah_prodi';
		$this->load->view("layouts/wrapper", $data, false);
	}
	
	function tambahProdi(){
		$id_jurusan = $this->input->post('id_jurusan');
		$nama_prodi = $this->input->post('nama_prodi');
		
		$data = array(
			'id_jurusan' => $id_jurusan,
			'prodi' => $nama_prodi
		);
		$this->m_admin->tambahdata($data,'prodi');
		$this->session->set_flashdata('notif', "Jurusan $nama_prodi berhasil ditambahkan");
		redirect('admin/lihat_prodi');
	}
	
	function updateProdi($id_prodi){
		$data['main_view'] = 'admin/v_edit_prodi';
		$where = array('id_prodi' => $id_prodi);
		$data['jurusan'] = $this->m_admin->get_jurusan();
		$data['prodi'] = $this->m_admin->edit_data($where,'prodi')->result();
		$this->load->view("layouts/wrapper", $data, false);
	}
	
	function editProdi(){
		$id_prodi = $this->input->post('id_prodi');
		$id_jurusan = $this->input->post('id_jurusan');
		$prodi = $this->input->post('nama_prodi');
		
		$data = array(
			'id_prodi' => $id_prodi,
			'id_jurusan' => $id_jurusan,
			'prodi' => $prodi
		);

		$where = array('id_prodi' => $id_prodi);

		$this->m_admin->update_data($where,$data,'prodi');
		$this->session->set_flashdata('notif', "Data jurusan $prodi berhasil di Update");
		redirect('admin/lihat_prodi');
	}
	
	function hapusProdi($id_prodi){
		$where = array('id_prodi' => $id_prodi);
		$this->m_admin->hapus_data($where,'prodi');
		$this->session->set_flashdata('notif', "Data penyelenggara $id_prodi berhasil dihapus");
		redirect('admin/lihat_prodi');
	}
	

    public function get_prodi_by_jurusan_js(){
      if($this->input->post('id_jurusan'))
      {
      echo $this->Prodi_Model->get_prodi_by_jurusan_js($this->input->post('id_jurusan'));
      }
    }

}
