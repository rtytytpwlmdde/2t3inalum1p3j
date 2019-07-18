<?php 

class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
		  $this->load->model('m_admin');
          $this->load->model('m_produk');
	}

	public function index(){
		$data['main_view'] = 'alumni/v_upload';
		$data['error'] = ' ';
		$this->load->view('template/template_alumni',$data);
	}

	public function uploadIjazah(){
        $dokumen = $this->input->post('dokumen');
        $validasi = 'belum di validasi';
        $catatan = '';
		$nim = $this->session->userdata('nim');
        $config['upload_path']          = './pdf/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 1000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('dokumen')){
            $this->session->set_flashdata('gagal', "Dokumen gagal di upload! File tidak sesuai persayaratan, hanya file pdf yang diperbolehkan");
            redirect('upload/index');
        }else{                    	            	
            $file = $this->upload->data();
            $pdf = $file['file_name'];   
            $data = array(
                'nim' => $nim,
                'validasi' => $validasi,
                'catatan' => $catatan,
                'dokumen_ijazah' => $pdf
            );
            $where = array('nim' => $nim);
            $this->m_admin->update_data($where,$data,'ijazah');
            $data = array('upload_data' => $this->upload->data());
            $this->session->set_flashdata('sukses', "Dokumen telah di upload, silahkan tunggu beberapa saat sampai dokumen akan di cek oleh recording");
            redirect('alumni/lihatIjazah');
        }
    }
	
	
}