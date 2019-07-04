<?php 

class Produk extends CI_Controller{

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
		$data['main_view'] = 'produk/v_data_produk';
		$this->load->view('template/template_admin', $data);
	}

	function tambah_produk(){
		$data['main_view'] = 'produk/v_tambah_produk';
		$this->load->view('template/template_admin', $data);
	}

	function tambahProduk(){
		$nama_produk = $this->input->post('nama_produk');
		$harga_produk = $this->input->post('harga_produk');
		$berat_produk = $this->input->post('berat_produk');
		
		$data = array(
			'nama_produk' => $nama_produk,
			'berat_produk' => $berat_produk,
			'harga_produk' => $harga_produk
		);
		$this->m_admin->tambahdata($data,'produk');
		$this->session->set_flashdata('notif', "data $nama_produk berhasil ditambahkan");
		redirect('produk/produk');
    }
    
    function hapusProduk($id){
		$where = array('id_produk' => $id);
		$this->m_admin->hapus_data($where,'produk');
		$this->session->set_flashdata('notif', "Data Produk berhasil dihapus");
		redirect('produk/produk');
	}

	function editProduk($id){
		$data['main_view'] = 'produk/v_edit_produk';
		$where = array('id_produk' => $id);
		$data['produk'] = $this->m_admin->edit_data($where,'produk')->result();
		$this->load->view('template/template_admin',$data);
	}

	function edit_data_produk($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function updateProduk(){
		$id_produk = $this->input->post('id_produk');
		$nama_produk = $this->input->post('nama_produk');
		$harga_produk = $this->input->post('harga_produk');
		$berat_produk = $this->input->post('berat_produk');
		
		$data = array(
			'nama_produk' => $nama_produk,
			'berat_produk' => $berat_produk,
			'harga_produk' => $harga_produk
		);

		$where = array('id_produk' => $id_produk);

		$this->m_admin->update_data($where,$data,'produk');
		$this->session->set_flashdata('notif', "Data produk berhasil di Update");
		redirect('produk/produk');
		}
		
		function tambahTransaksi(){
			$nama_produk = $this->input->post('nama_produk');
			$harga_produk = $this->input->post('harga_produk');
			$berat_produk = $this->input->post('berat_produk');
			
			$data = array(
				'nama_produk' => $nama_produk,
				'berat_produk' => $berat_produk,
				'harga_produk' => $harga_produk
			);
			//$this->m_admin->tambahdata($data,'produk');
			$this->session->set_flashdata('notif', "data $nama_produk berhasil ditambahkan");
			redirect('produk/produk');
			}
}