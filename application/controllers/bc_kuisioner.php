<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisioner extends CI_Controller {

	function __construct(){
		parent::__construct();		  
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_kuisioner');
		$this->load->model('m_admin');
		$this->load->model('m_prodi');
		if($this->session->userdata('logged_in') == FALSE){
			redirect('auth/logout');
		}
    }

    function listKuisioner(){
			$data['kuisioner'] = $this->m_kuisioner->getDataListKuisioner();
			$data['main_view'] = 'kuisioner/v_list_kuisioner';
			if($this->session->userdata('username') == 'admin'){
				$this->load->view('template/template_admin', $data);
			}else if($this->session->userdata('status') == 'operator_fakultas' || $this->session->userdata('status') == 'operator_prodi'){
				$this->load->view('template/template_operator', $data);
			}else{
				$this->load->view('template/template_alumni', $data);
			}
    }

    function formTambahKuisioner(){
		$data['main_view'] = 'kuisioner/v_tambah_kuisioner';
		if($this->session->userdata('username') == 'admin'){
			$this->load->view('template/template_admin', $data);
		}else{
			$this->load->view('template/template_operator', $data);
		}
    }

    function editKuisioner($id){
		$data['main_view'] = 'kuisioner/v_edit_kuisioner';
		$data['kuisioner'] = $this->m_kuisioner->getDataListKuisionerById($id);
		$this->load->view('template/template_admin', $data);
    }

    function tambahKuisioner(){
		$nama_kuisioner = $this->input->post('nama_kuisioner');
		
		$data = array(
			'nama_kuisioner' => $nama_kuisioner
		);
		$this->m_admin->tambahdata($data,'kuisioner');
		$this->session->set_flashdata('notif', "data kuisioner berhasil ditambahkan");
		redirect('kuisioner/listKuisioner');
    }

    function updateKuisioner(){
		$id_kuisioner = $this->input->post('id_kuisioner');
		$nama_kuisioner = $this->input->post('nama_kuisioner');
		
		$data = array(
			'nama_kuisioner' => $nama_kuisioner
		);
        $where = array('id_kuisioner' => $id_kuisioner);
        $this->m_admin->update_data($where,$data,'kuisioner');
		$this->session->set_flashdata('notif', "data kuisioner berhasil diupdate");
		redirect('kuisioner/listKuisioner');
    }

    function hapusKuisioner($id){
			$where = array('id_kuisioner' => $id);
			$this->m_admin->hapus_data($where,'kuisioner');
			$this->session->set_flashdata('notif', "data kuisioner berhasil dihapus");
			redirect('kuisioner/listKuisioner');
    }

    function detailKuisioner($id,$section){
			$data['id_kuisioner'] = $id;
			$kuisioner = $this->m_kuisioner->getPertanyaanKuisioner($id);
			$jumKuisioner = $this->m_kuisioner->cekPertanyaanByIdKuisioner($id);
			$n_kuisioner = null;
			$jumPertanyaan = null;
			foreach($jumKuisioner as $u){
					$n_kuisioner = $u->nama_kuisioner;
			}	
			$data['nama_kuisioner'] = $n_kuisioner;
			$data['jumPertanyaan'] = $this->m_kuisioner->getJumlahPertanyaanKuisionerById($id);
			$data['prodi'] = $this->m_prodi->tampilProdi()->result();
			$data['section'] = $this->m_kuisioner->getSectionKuisioner($id);
			$data['kuisioner'] = $this->m_kuisioner->getPertanyaanKuisioner($id);
			$data['jenis_pertanyaan'] = $this->m_kuisioner->getJenisPertanyaan();
			$data['pilihan_jawaban'] = $this->m_kuisioner->getPilihanJawaban($id);
			if($this->session->userdata('username') == 'admin'){
				$data['main_view'] = 'kuisioner/v_detail_kuisioner';
				$this->load->view('template/template_admin', $data);
			}else if($this->session->userdata('status') == 'operator_fakultas' || $this->session->userdata('status') == 'operator_prodi'){
				$data['main_view'] = 'kuisioner/v_detail_kuisioner';
				$this->load->view('template/template_operator', $data);
			}else{
				$data['main_view'] = 'kuisioner/v_isi_kuisioner';
				$this->load->view('template/template_alumni', $data);
			}
    }

    function tambahPertanyaan(){
		$id_kuisioner = $this->input->post('id_kuisioner');
		$id_section = $this->input->post('id_section');
		$nama_pertanyaan = $this->input->post('nama_pertanyaan');
		$jenis_pertanyaan = $this->input->post('jenis_pertanyaan');
		$nomor_pertanyaan = $this->input->post('nomor_pertanyaan');
		
		$data = array(
			'id_kuisioner' => $id_kuisioner,
			'id_section' => $id_section,
			'nama_pertanyaan' => $nama_pertanyaan,
			'jenis_pertanyaan' => $jenis_pertanyaan,
			'nomor_pertanyaan' => $nomor_pertanyaan
		);
		$this->m_admin->tambahdata($data,'pertanyaan');
		$this->session->set_flashdata('notif', "data pertanyaan berhasil ditambahkan");
		redirect('kuisioner/detailKuisioner/'.$id_kuisioner.'/'.$id_section);
    }

    function tambahJawabanPertanyaan(){
		$id_kuisioner = $this->input->post('id_kuisioner');
		$id_pertanyaan = $this->input->post('id_pertanyaan');
		$jenis_pertanyaan = $this->input->post('jenis_pertanyaan');
			$jawaban = $this->input->post('jawaban');
		
		$data = array(
			'id_kuisioner' => $id_kuisioner,
			'id_pertanyaan' => $id_pertanyaan,
			'nama_pilihan_jawaban' => $jawaban,
			'jenis_pertanyaan' => $jenis_pertanyaan
		);
		$this->m_admin->tambahdata($data,'pilihan_jawaban');
		$this->session->set_flashdata('notif', "data pilihan jawaban berhasil ditambahkan");
		redirect('kuisioner/detailKuisioner/'.$id_kuisioner);
    }

    function ubahJawabanPertanyaan(){
			$id_kuisioner = $this->input->post('id_kuisioner');
			$id_pilihan_jawaban = $this->input->post('id_pilihan_jawaban');
			$nama_pilihan_jawaban = $this->input->post('nama_pilihan_jawaban');
			
			$data = array(
				'id_pilihan_jawaban' => $id_pilihan_jawaban,
				'nama_pilihan_jawaban' => $nama_pilihan_jawaban
			);
			$where = array('id_pilihan_jawaban' => $id_pilihan_jawaban);
			$this->m_admin->update_data($where,$data,'pilihan_jawaban');
			$this->session->set_flashdata('notif', "data pilihan jawaban berhasil diubah");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner);
    }

    function hapusPilihanJawaban(){
			$id_kuisioner = $this->input->post('id_kuisioner');
			$id_pilihan_jawaban = $this->input->post('id_pilihan_jawaban');
			$where = array('id_pilihan_jawaban' => $id_pilihan_jawaban);
			$this->m_admin->hapus_data($where,'pilihan_jawaban');
			$this->session->set_flashdata('notif', "data kuisioner berhasil dihapus");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner);
		}
		
		function ubahPertanyaan(){
			$id_kuisioner = $this->input->post('id_kuisioner');
			$id_pertanyaan = $this->input->post('id_pertanyaan');
			$nama_pertanyaan = $this->input->post('nama_pertanyaan');
			$nomor_pertanyaan = $this->input->post('nomor_pertanyaan');
			
			$data = array(
				'nomor_pertanyaan' => $nomor_pertanyaan,
				'nama_pertanyaan' => $nama_pertanyaan
			);
			$where = array('id_pertanyaan' => $id_pertanyaan);
			$this->m_admin->update_data($where,$data,'pertanyaan');
			$this->session->set_flashdata('notif', "data pertanyaan berhasil diubah");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner);
		}
		
		function previewKuisioner($id){
			$data['id_kuisioner'] = $id;
			$kuisioner = $this->m_kuisioner->getPertanyaanKuisioner($id);
			foreach($kuisioner as $u){$pertanyaan = $u->nama_kuisioner;}
			$data['main_view'] = 'kuisioner/v_preview_kuisioner';
			$data['nama_kuisioner'] = $pertanyaan;
			$data['prodi'] = $this->m_prodi->tampilProdi()->result();
			$data['kuisioner'] = $this->m_kuisioner->getPertanyaanKuisioner($id);
			$data['jenis_pertanyaan'] = $this->m_kuisioner->getJenisPertanyaan();
			$data['pilihan_jawaban'] = $this->m_kuisioner->getPilihanJawaban($id);
			if($this->session->userdata('username') == 'admin'){
				$this->load->view('template/template_admin', $data);
			}else{
				$this->load->view('template/template_operator', $data);
			}
		}
		
		function kirimTanggapan(){
			$id_kuisioner = $this->input->post('id_kuisioner');
			$pertanyaan = null;
			$kuisioner = $this->m_kuisioner->getPertanyaanKuisioner($id_kuisioner);
			foreach($kuisioner as $u){
				$id_pertanyaan = $u->id_pertanyaan;
				$pertanyaan = $this->input->post('id_pertanyaan');
				$tanggapan = $this->input->post('pertanyaan'.$id_pertanyaan);
				if($tanggapan == null){
				}else{
					$data = array(
						'id_kuisioner' => $id_kuisioner,
						'id_pertanyaan' => $id_pertanyaan,
						'tanggapan' => $tanggapan
					);
					$this->m_admin->tambahdata($data,'tanggapan');
				}
			}
			$this->session->set_flashdata('notif', "tanggapan berhasil disimpan");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner);
    }



 

}