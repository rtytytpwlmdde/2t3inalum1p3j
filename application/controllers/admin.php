<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_auth');
		$this->load->model('m_admin');
		$this->load->model('m_produk');
	}

	function index(){
		$data['main_view'] = 'admin/v_dashboard';
		$this->load->view('template/template_admin', $data);
	}

	function mahasiswa(){
		$data['main_view'] = 'admin/v_data_mahasiswa';
		$this->load->view('template/template_admin', $data);
	}

	function operator(){
		$data['main_view'] = 'admin/v_data_operator';
		$this->load->view('template/template_admin', $data);
	}

	function tambah_data(){
		$data['main_view'] = 'admin/v_tambah_data';
		$this->load->view('template/template_admin', $data);
	}

	function produk(){
		$data['produk'] = $this->m_produk->tampilProduk()->result();
		$data['main_view'] = 'admin/v_data_produk';
		$this->load->view('template/template_admin', $data);
	}

	function tambah_produk(){
		$data['main_view'] = 'admin/v_tambah_produk';
		$this->load->view('template/template_admin', $data);
	}

	function tambahProduk(){
		$nama_produk = $this->input->post('nama_produk');
		$harga = $this->input->post('harga');
		
		$data = array(
			'nama_produk' => $nama_produk,
			'harga' => $harga
		);
		$this->m_admin->tambahdata($data,'produk');
		$this->session->set_flashdata('notif', "data $nama_produk berhasil ditambahkan");
		redirect('admin/produk');
	}


}