<?php 

class background_foto extends CI_Controller{
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
        $this->load->model('m_lowker');
        $this->load->model('m_opendonasi');
        $this->load->model('m_info_feb');
        $this->load->model('m_background');
	}

	function index(){
		$data['main_view'] = 'admin/v_foto_background';
		$data['foto_back'] = $this->m_background->foto_background()->result();
		$this->load->view('template/template_admin', $data);
	}
	
	function inputFoto(){
	$data['main_view'] = 'admin/v_tambahfoto_background';
	$this->load->view('template/template_admin', $data);	
	}
	
	function tambahFoto(){
		$username = $this->input->post('username');
	   $config['upload_path']          = './img/cover/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        $config['encrypt_name']         = TRUE;
		$config['file_name'] =$_FILES['userfile']['name'];
        $this->load->library('upload', $config);
		

        if(!empty($_FILES['userfile']['name'])){
				if ($this->upload->do_upload('userfile')){
				$foto =$this->upload->data();
			$data = array(
                      'foto'               =>  $foto['file_name'],
                      'username'           => 	$username
                    );
                $this->m_alumni->tambahdata($data,'foto_background');
                $this->session->set_flashdata('success', 'Update foto alumni berhasil.');
                redirect('admin/background_foto/');
				}else{
					die("Proses Gagal");
				}
         }else{
				
				$error = array('error' => $this->upload->display_errors());
				redirect('admin/background_foto/inputFoto');
              }
	}
	
	function hapusFoto($id){
		$where = array('id' => $id);
		$this->m_alumni->hapus_data($where,'foto_background');
		$this->session->set_flashdata('notif', "Data Alumni $nim berhasil dihapus");
		redirect('admin/background_foto');
	}
	
	function editFoto($id){
	$where = array('id' => $id);
	$data['foto_background'] = $this->m_alumni->edit_data($where,'foto_background')->result();
	$data['main_view'] = 'admin/v_edit_foto_background';
	$this->load->view('template/template_admin', $data);
	}
	
	public function updatefoto(){
		$id= $this->input->post('id');
	   $username = $this->input->post('username');
		$foto = $this->input->post('foto');
        $config['upload_path']          = './img/cover/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);
		$where =array ('id' =>$id);
		  if (!empty($_FILES['fotopost']['name'])) {
	        if ( $this->upload->do_upload('fotopost') ) {
	            $foto = $this->upload->data();
	            $data = array(
	                          'username'       => $username,
                            'foto'       => $foto['file_name']
	                        );
              // hapus foto pada direktori
              @unlink($path.$this->input->post('filelama'));
			$this->m_alumni->update_data($data,$where,'foto_background');
              redirect('admin/background_foto');
	        }else {
              die("gagal update");
	        }
	    }else {
	      echo "tidak masuk";
	    }

	}
	

}