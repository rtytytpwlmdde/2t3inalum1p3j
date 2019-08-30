<?php 

class Dashboard extends CI_Controller{
function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'alumni'){
				redirect('auth/logout');
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->model('m_auth');
		$this->load->model('m_alumni');
		$this->load->model('m_lowker');
		$this->load->model('m_opendonasi');
		$this->load->model('m_group_chat');
		$this->load->model('m_profil_alumni');
		$this->load->model('m_info_feb');
	}

	function index(){
		$data['main_view'] = 'alumni/v_info_feb';
		$data['user'] = $this->m_profil_alumni->getDataTeman($this->session->userdata('id_login'));   
		//$data['get_all_userdata'] = $this->m_auth->get_by_id($this->session->userdata('id_log'));
		$data['info_feb'] = $this->m_info_feb->tampilinfofeb()->result();
		$data['alumni'] = $this->m_alumni->tampilalumni();
		$data['grup'] = $this->m_group_chat->tampilgrup();
		$this->load->view('template/template_alumni', $data);
	}

	function open_donasi(){
		$data['main_view'] = 'alumni/v_open_donasi';
		$data['user'] = $this->m_profil_alumni->getDataProfil();   
		//$data['get_all_userdata'] = $this->m_auth->get_by_id($this->session->userdata('id_log'));
		$data['opendonasi'] = $this->m_opendonasi->tampilopendonasi()->result();
		$data['alumni'] = $this->m_alumni->tampilalumni();
		$data['grup'] = $this->m_group_chat->tampilgrup();
		$this->load->view('template/template_alumni', $data);
	}

	function lowker(){
		$data['main_view'] = 'alumni/v_lowker';
		$data['user'] = $this->m_profil_alumni->getDataProfil();   
		//$data['get_all_userdata'] = $this->m_auth->get_by_id($this->session->userdata('id_log'));
		$data['lowongankerja'] = $this->m_lowker->tampillowker();
		$data['alumni'] = $this->m_alumni->tampilalumni();
		$data['grup'] = $this->m_group_chat->tampilgrup();
		$this->load->view('template/template_alumni', $data);
	}
	
	function updtae_foto(){
		$this->load->helper(array('form', 'url')); 
		$foto = $fpto;
		$this->load->library('upload');
		$config['upload_path'] = './uploads/userphoto/'; // Sesuaikan sama folder dimana foto akan d simpan
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] = '2048';
		$config['max_width']  = '1288';
		$config['max_height']  = '768';

		$this->upload->initialize($config);
		if(!$this->upload->do_upload('foto')){
			$foto="";
		}else{
			$foto=$this->upload->file_name;
		}
		$data = array(
			'foto' => $foto,
		);

		$this->m_profil_alumni->update_foto($data); 
		$this->load->view('template/template_alumni', $data);
	}

}
