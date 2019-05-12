<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_admin');
		$this->load->model('m_produk');
	}

	public function index()
	{
		$data['main_view'] = 'alumni/v_profil';
		$this->load->view('template/template_alumni', $data);
	}

	public function profile()
	{
		$data['main_view'] = 'alumni/v_profil';
		$this->load->view('template/template_alumni', $data);
	}

	public function legalisir()
	{
		$data['produk'] = $this->m_produk->tampilProduk()->result();
		$data['main_view'] = 'alumni/v_list_produk';
		$this->load->view('template/template_alumni', $data);
	}

	public function alamat_pengiriman()
	{
		$data['main_view'] = 'alumni/v_input_alamat_pengiriman';
		$this->load->view('template/template_alumni', $data);
	}

	public function data_alumni()
	{
		$data['main_view'] = 'alumni/v_data_alumni';
		$this->load->view('template/template_alumni', $data);
	}

	public function pembayaran()
	{
		$data['main_view'] = 'alumni/v_pembayaran';
		$this->load->view('template/template_alumni', $data);
	}
	public function percakapan()
	{
		$data['main_view'] = 'alumni/v_percakapan';
		$this->load->view('template/template_alumni', $data);
	}
}
