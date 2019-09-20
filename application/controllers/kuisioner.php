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
		$id_kuisioner = null;
		$data_kuisioner = array(
			'nama_kuisioner' => $nama_kuisioner
		);
		$this->m_admin->tambahdata($data_kuisioner,'kuisioner');
		$kuisioner = $this->m_kuisioner->getIdKuisioner($nama_kuisioner);
		foreach($kuisioner as $u){
			$id_kuisioner = $u->id_kuisioner;
		}
		$data_section = array(
			'id_kuisioner' => $id_kuisioner,
			'no_section' => '1',
			'nama_section' => 'Section 1',

		);
		$this->m_admin->tambahdata($data_section,'section');
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
		
		function hapusPertanyaan($id,$section){
			$where = array('id_pertanyaan' => $id);
			$this->m_admin->hapus_data($where,'pertanyaan');
			$this->session->set_flashdata('notif', "data pertanyaan berhasil dihapus");
			redirect('kuisioner/detailKuisioner/'.$id.'/'.$section);
    }

    function detailKuisioner($id,$section){
			$xsection = null;
			$id_section = null;
			$nama_section = null;
			if($section == '0'){
				$section = $this->m_kuisioner->getFirstSectionKuisioner($id);
				if($section == false){
					$xsection = 1;
				}else{
					foreach($section as $s){
						$xsection = $s->no_section;
						$id_section = $s->id_section;
						$nama_section = $s->nama_section;
					}	
				}
			}else{
				$id_section = $section;
			}
			$data['id_section'] = $id_section;
			$data['id_kuisioner'] = $id;
			$data['nama_section'] = $nama_section;
			$data['idsection'] = $this->m_kuisioner->getDataSectionById($id_section);
			$kuisioner = $this->m_kuisioner->getPertanyaanKuisioner($id,$id_section);
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
			$data['kuisioner'] = $this->m_kuisioner->getPertanyaanKuisioner($id,$id_section);
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
			$id_prodi = $this->input->post('id_prodi');
			$level_pertanyaan = $this->input->post('level_pertanyaan');
			$nama_pertanyaan = $this->input->post('nama_pertanyaan');
			$jenis_pertanyaan = $this->input->post('jenis_pertanyaan');
			$nomor_pertanyaan = $this->input->post('nomor_pertanyaan');
			
			$data = array(
				'id_kuisioner' => $id_kuisioner,
				'id_section' => $id_section,
				'nama_pertanyaan' => $nama_pertanyaan,
				'id_prodi' => $id_prodi,
				'level_pertanyaan' => $level_pertanyaan,
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
			$id_section = $this->input->post('id_section');
			
			$data = array(
				'id_kuisioner' => $id_kuisioner,
				'id_pertanyaan' => $id_pertanyaan,
				'nama_pilihan_jawaban' => $jawaban,
				'jenis_pertanyaan' => $jenis_pertanyaan
			);
			$this->m_admin->tambahdata($data,'pilihan_jawaban');
			$this->session->set_flashdata('notif', "data pilihan jawaban berhasil ditambahkan");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner.'/'.$id_section);
    }

    function ubahJawabanPertanyaan(){
			$id_kuisioner = $this->input->post('id_kuisioner');
			$id_section = $this->input->post('id_section');
			$id_pilihan_jawaban = $this->input->post('id_pilihan_jawaban');
			$nama_pilihan_jawaban = $this->input->post('nama_pilihan_jawaban');
			
			$data = array(
				'id_pilihan_jawaban' => $id_pilihan_jawaban,
				'nama_pilihan_jawaban' => $nama_pilihan_jawaban
			);
			$where = array('id_pilihan_jawaban' => $id_pilihan_jawaban);
			$this->m_admin->update_data($where,$data,'pilihan_jawaban');
			$this->session->set_flashdata('notif', "data pilihan jawaban berhasil diubah");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner.'/'.$id_section);
    }

    function hapusPilihanJawaban(){
			$id_kuisioner = $this->input->post('id_kuisioner');
			$id_section = $this->input->post('id_section');
			$id_pilihan_jawaban = $this->input->post('id_pilihan_jawaban');
			$where = array('id_pilihan_jawaban' => $id_pilihan_jawaban);
			$this->m_admin->hapus_data($where,'pilihan_jawaban');
			$this->session->set_flashdata('notif', "data kuisioner berhasil dihapus");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner.'/'.$id_section);
		}
		
		function ubahPertanyaan(){
			$id_kuisioner = $this->input->post('id_kuisioner');
			$id_section = $this->input->post('id_section');
			$id_pertanyaan = $this->input->post('id_pertanyaan');
			$nama_pertanyaan = $this->input->post('nama_pertanyaan');
			$nomor_pertanyaan = $this->input->post('nomor_pertanyaan');
			
			$data = array(
				'nomor_pertanyaan' => $nomor_pertanyaan,
				'id_section' => $id_section,
				'nama_pertanyaan' => $nama_pertanyaan
			);
			$where = array('id_pertanyaan' => $id_pertanyaan);
			$this->m_admin->update_data($where,$data,'pertanyaan');
			$this->session->set_flashdata('notif', "data pertanyaan berhasil diubah");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner.'/'.$id_section);
		}
		
		function previewKuisioner($id,$section){
			$data['id_kuisioner'] = $id;
			$kuisioner = $this->m_kuisioner->getPertanyaanKuisioner($id,$section);
			$data['main_view'] = 'kuisioner/v_preview_kuisioner';
			$data['data_kuisioner'] = $this->m_kuisioner->getDataKuisionerById($id);
			$data['prodi'] = $this->m_prodi->tampilProdi()->result();
			$data['kuisioner'] = $this->m_kuisioner->getPertanyaanKuisioner($id,$section);
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
			$id_section = $this->input->post('id_section');
			$id_responden = $this->input->post('id_responden');
			$no_section = $this->input->post('no_section');
			$pertanyaan = null;
			$id_jawaban = null;
			$kuisioner = $this->m_kuisioner->getPertanyaanKuisioner($id_kuisioner,$id_section);
			foreach($kuisioner as $u){
				$id_pertanyaan = $u->id_pertanyaan;
				$tanggapan = $this->input->post('pertanyaan'.$id_pertanyaan);
				if($tanggapan == null){
				}else{
					if($u->jenis_pertanyaan == '4'){
						$pieces = explode("~", $tanggapan);
						"dropdown";
						$id_jawaban = $pieces[0];
						$tanggapan = $pieces[1];
					}else{
						$tanggapan = $tanggapan;
						$id_jawaban = null;
					}
					$data = array(
						'id_kuisioner' => $id_kuisioner,
						'id_section' => $id_section,
						'id_pertanyaan' => $id_pertanyaan,
						'id_responden' => $id_responden,
						'id_jawaban' => $id_jawaban,
						'tanggapan' => $tanggapan
					);
					$this->m_admin->tambahdata($data,'tanggapan');
				}
			}
			$this->session->set_flashdata('notif', "tanggapan berhasil disimpan");
			redirect('kuisioner/getNextSectionKuisioner/'.$id_kuisioner.'/'.$id_section.'/'.$id_responden.'/'.$no_section);
		}

		function getNextSectionKuisioner($id_kuisioner,$id_section,$id_responden,$no_section){
			//mendapatkan no section dari pertanyaan yang barusan diinput
			$new_no_section = null;
			$new_id_section = null;
			$jawaban = null;
			$kondisi = null;
			if($no_section == '0'){
				$new_no_section = $no_section + 2;
			}else{
				$new_no_section = $no_section + 1;
			}
			//------------------
			//--mengecek apakah masih ada section selanjutnya atau tidak
			$prev_section = $this->m_kuisioner->getNextSectionKuisioner($id_kuisioner,$new_no_section);
			if($prev_section == false){
				redirect('kuisioner/listKuisioner/');
			}else{
				foreach($prev_section as $u){
					$new_no_section = $u->no_section;
					$new_id_section = $u->id_section;
					$kondisi = $u->id_jawaban;
				}
				if($kondisi != null){
					$pilihan_jawaban = $this->m_kuisioner->getSectionPilihanJawaban($id_kuisioner,$kondisi);
					if($pilihan_jawaban == false){
						$new_id_section = $new_id_section +1;
						redirect('kuisioner/getNextSectionKuisioner/'.$id_kuisioner.'/'.$new_id_section.'/'.$id_responden.'/'.$new_no_section);
					}else{
						redirect('kuisioner/detailKuisioner/'.$id_kuisioner.'/'.$new_id_section);
					}
				}else{
					redirect('kuisioner/detailKuisioner/'.$id_kuisioner.'/'.$new_id_section);
				}
			}
		}
		
		function formTambahSection($id_kuisioner, $no_section){
			$data['id_kuisioner'] = $id_kuisioner;
			$data['no_section'] = $no_section;
			$data['pertanyaan'] = $this->m_kuisioner->getAllPertanyaanByKuisioner($id_kuisioner);
			$data['main_view'] = 'kuisioner/v_tambah_section';
			$this->load->view('template/template_operator', $data);
		}

		function tambahSection(){
			$id_section = 0;
			$id_kuisioner = $this->input->post('id_kuisioner');
			$no_section = $this->input->post('no_section');
			$nama_section = $this->input->post('nama_section');
			$id_jawaban = $this->input->post('id_fiter_by');
			$data = array(
				'id_kuisioner' => $id_kuisioner,
				'no_section' => $no_section,
				'id_jawaban' => $id_jawaban,
				'nama_section' => $nama_section
			);
			$this->m_admin->tambahdata($data,'section');
			$this->session->set_flashdata('notif', "section berhasil disimpan");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner.'/'.$id_section);
		}

		function getOptionPilihanJawaban(){
			$id=$this->input->post('id');
			$data=$this->m_kuisioner->getOptionPilihanJawaban($id);
			echo json_encode($data);
		}

		function hapusSection($id_kuisioner,$id_section){
			$where = array('id_section' => $id_section);
			$section = 0;
			$this->m_admin->hapus_data($where,'section');
			$this->m_admin->hapus_data($where,'pertanyaan');
			$this->session->set_flashdata('notif', "data section berhasil dihapus");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner.'/'.$section);
		}

		function updateSection($id_kuisioner, $id_section){
			$data['id_kuisioner'] = $id_kuisioner;
			$data['id_section'] = $id_section;
			$data['pertanyaan'] = $this->m_kuisioner->getAllPertanyaanByKuisioner($id_kuisioner);
			$data['section'] = $this->m_kuisioner->getDataSectionById($id_section);
			$data['main_view'] = 'kuisioner/v_update_section';
			$this->load->view('template/template_operator', $data);
		}

		function editSection(){
			$id_section = $this->input->post('id_section');
			$id_kuisioner = $this->input->post('id_kuisioner');
			$no_section = $this->input->post('no_section');
			$nama_section = $this->input->post('nama_section');
			$id_jawaban = $this->input->post('id_fiter_by');
			$data = array(
				'id_section' => $id_section,
				'id_kuisioner' => $id_kuisioner,
				'no_section' => $no_section,
				'id_jawaban' => $id_jawaban,
				'nama_section' => $nama_section
			);
			$where = array('id_section' => $id_section);
			$this->m_admin->update_data($where,$data,'section');
			$this->session->set_flashdata('notif', "section berhasil disimpan");
			redirect('kuisioner/detailKuisioner/'.$id_kuisioner.'/'.$id_section);
		}



 

}