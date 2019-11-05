<?php 

class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
		  $this->load->model('m_admin');
          $this->load->model('m_produk');
          $this->load->model('m_legalisir');
	}

	public function index(){
		$data['main_view'] = 'alumni/v_upload';
		$data['error'] = ' ';
		$this->load->view('template/template_alumni',$data);
    }
    
    public function formUploadIjazah(){
		$data['main_view'] = 'alumni/v_upload';
        $data['nim'] = $this->input->post('nim');
		$data['jumlah_transaksi_baru'] = $this->m_legalisir->getJumlahTransaksiBaru();
		$data['error'] = ' ';
		$this->load->view('template/template_operator',$data);
	}

	public function uploadIjazah(){
        $dokumen = $this->input->post('dokumen');
        if($this->session->userdata('status') == 'recording'){
            $validasi = 'setuju';
        }else{
            $validasi = 'belum di validasi';
        }
        $catatan = '';
		$nim = $this->input->post('nim');
        $config['upload_path']          = './pdf/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 1000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('dokumen')){
            $this->session->set_flashdata('gagal', "Dokumen gagal di upload! File tidak sesuai persayaratan, hanya file pdf yang diperbolehkan");
            redirect('leges/upload/index');
        }else{                    	            	
            $file = $this->upload->data();
            $pdf = $file['file_name'];   
            $data = array(
                'nim' => $nim,
                'validasi_ijazah' => $validasi,
                'catatan_ijazah' => $catatan,
                'dokumen_ijazah' => $pdf
            );
            $where = array('nim' => $nim);
            $this->m_admin->update_data($where,$data,'alumni');
            $data = array('upload_data' => $this->upload->data());
            $this->session->set_flashdata('sukses', "Dokumen telah di upload, silahkan tunggu beberapa saat sampai dokumen akan di cek oleh recording");
            if($this->session->userdata('status') == 'recording'){
                redirect('leges/recording/alumni');
            }else{
                redirect('leges/upload/lihatIjazah');
            }
        }
    }
	
	
}