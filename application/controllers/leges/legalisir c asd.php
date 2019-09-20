<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legalisir extends CI_Controller {

	function __construct(){
		parent::__construct();		  
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_admin');
		$this->load->model('m_produk');
		$this->load->model('m_alumni');

		$this->load->model('m_group_chat');
		$this->load->model('m_legalisir');
		if($this->session->userdata('logged_in') == FALSE){
			redirect('auth/logout');
		}
	}

	public function dashboard(){
		if($this->session->userdata('status') == "recording"){
			$tahun = $this->input->get('tahun');
			if($tahun == NULL){
				$tahun = date("Y");
			}
			$data['tahun'] = $tahun;
			$data['jumlah_transaksi_baru'] = $this->m_legalisir->getJumlahTransaksiBaru();
			$data['transaksiPerbulan'] = $this->m_legalisir->getDataTransaksiPerbulan();
			$data['transaksiPertahun'] = $this->m_legalisir->getDataTransaksiPertahun();
			$data['main_view'] = 'legalisir/v_dashboard_recording';
			$this->load->view('template/template_operator', $data);
		}else{
			redirect("auth/logout");
		}
	}


	public function legalisir() //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			$data['produk'] = $this->m_produk->tampilProduk()->result();
			$data['keranjang'] = $this->m_legalisir->getIdProdukDetailTransaksi();
			$data['alumni'] = $this->m_alumni->tampilalumni();
			$data['grup'] = $this->m_group_chat->tampilgrup();
			$data['main_view'] = 'legalisir/v_list_produk';
			$this->load->view('template/template_alumni', $data);
		}else{
			redirect("auth/logout");
		}
	}

	public function data_alumni() //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			$data['main_view'] = 'alumni/v_data_alumni';
			$this->load->view('template/template_alumni', $data);
		}else{
			redirect("auth/logout");
		}
	}

	public function pembayaran($id_transaksi) //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			if($this->m_legalisir->getTransaksiById($id_transaksi) != false){
				$data['keranjang'] = $this->m_legalisir->getTransaksiById($id_transaksi);
				$data['id_transaksi'] = $id_transaksi;
				$data['alumni'] = $this->m_alumni->tampilalumni();
				$data['grup'] = $this->m_group_chat->tampilgrup();
				$data['main_view'] = 'legalisir/v_pembayaran';
				$this->load->view('template/template_alumni', $data);
			}else{
				$this->session->set_flashdata('gagal', "id transaksi tidak ditemukan, periksa kembali id transaksi anda");
				redirect('legalisir/legalisir/pesananSaya');
			}
		}else{
			redirect("auth/logout");
		}
	}
	public function percakapan() //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			$data['main_view'] = 'alumni/v_percakapan';
			$this->load->view('template/template_alumni', $data);
		}else{
			redirect("auth/logout");
		}
    }
    
    function tambahTransaksi() //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			$id_pemesan = $this->session->userdata('username');
			$id_produk = $this->input->post('id_produk');
			$nama_produk = $this->input->post('nama_produk');
			$harga_produk = $this->input->post('harga_produk');
			$berat_produk = $this->input->post('berat_produk');
			$jumlah_produk = $this->input->post('jumlah_produk');
			$harga_transaksi = $jumlah_produk*$harga_produk;
			$tanggal_transaksi = date("Y-m-d");
			$status_pesanan = '0';
			$id_transaksi = 0;
			$berat_transaksi = $jumlah_produk*$berat_produk;

			//////////////////////// mendapatkan id transaksi
			if($this->m_legalisir->cekKeranjang() == false){
				if($this->m_legalisir->getIdTransaksiTerbesar() != false){
					$transaksi = $this->m_legalisir->getIdTransaksiTerbesar();
					$id = null;
					foreach ($transaksi as $u){ echo $id=$u->id_transaksi;}
					$id_transaksi = $id+1;
				}else{
					$kode_tgl = str_replace("-","",$tanggal_transaksi);
					$id_transaksi = "1".$kode_tgl."0001";
				}
			}else{
				$transaksi = $this->m_legalisir->cekKeranjang();
				foreach ($transaksi as $u){ echo $id=$u->id_transaksi;}
				$id_transaksi = $id;
			}
			//////////////////////////

			if($this->m_legalisir->cekKeranjang() == false){
				$data_transaksi = array(
					'id_transaksi' => $id_transaksi,
					'id_pemesan' => $id_pemesan,
					'status_pesanan' => $status_pesanan
				);
				$this->m_admin->tambahdata($data_transaksi,'transaksi');

				$data_detail_transaksi = array(
					'id_transaksi' => $id_transaksi,
					'id_produk' => $id_produk,
					'jumlah_produk' => $jumlah_produk,
					'berat_produk_transaksi' => $berat_transaksi,
					'harga_transaksi' => $harga_transaksi
				);
				$this->m_admin->tambahdata($data_detail_transaksi,'detail_transaksi');
			}else{
				if($this->m_legalisir->cekProdukKeranjang($id_transaksi) != false){
					$data_detail_transaksi = array(
						'id_transaksi' => $id_transaksi,
						'id_produk' => $id_produk,
						'jumlah_produk' => $jumlah_produk,
						'berat_produk_transaksi' => $berat_transaksi,
						'harga_transaksi' => $harga_transaksi
					);
					$this->m_admin->tambahdata($data_detail_transaksi,'detail_transaksi');
				}else{
					$produk = $this->m_legalisir->cekProdukKeranjang($id_transaksi);
					foreach ($produk as $u){ echo $idx = $u->id_detail_transaksi;}
					$id_detail_transaksi = $idx;
					$data_detail_transaksi = array(
						'id_transaksi' => $id_transaksi,
						'id_produk' => $id_produk,
						'jumlah_produk' => $jumlah_produk,
						'berat_produk_transaksi' => $berat_transaksi,
						'harga_transaksi' => $harga_transaksi
					);
					$where = array('id_detail_transaksi' => $id_detail_transaksi);
					$this->m_admin->update_data($where,$data_detail_transaksi,'detail_transaksi');
				}
			}
			$this->session->set_flashdata('sukses', "Produk telah ditambahkan ke dalam daftar pesanan saya");
			redirect('legalisir/legalisir/legalisir/');
		}else{
			redirect("auth/logout");
		}
    }
    
    function keranjang(){ //alumni
		if($this->session->userdata('status') == "alumni"){
			$status_pesanan = '0';
			$data['alumni'] = $this->m_alumni->tampilalumni();
			$data['grup'] = $this->m_group_chat->tampilgrup();
			$data['keranjang'] = $this->m_legalisir->getTransaksiKeranjang($status_pesanan);
			if($this->m_legalisir->cekKeranjang() == false){
				$this->session->set_flashdata('gagals', "Keranjang Anda KOSONG, silahkan lakukan transaksi pemesanan produk yang anda inginkan");
				redirect('legalisir/legalisir/legalisir');
			}else{
				$data['main_view'] = 'legalisir/v_keranjang';
				$this->load->view('template/template_alumni', $data);
			}
		}else{
			redirect("auth/logout");
		}
    }

    function hapusProdukKeranjang($id_transaksi, $id_detail_transaksi){ //alumni
		if($this->session->userdata('status') == "alumni"){
			$where = array('id_detail_transaksi' => $id_detail_transaksi);
			$where_transaksi = array('id_transaksi' => $id_transaksi);
			$this->m_admin->hapus_data($where,'detail_transaksi');
			if($this->m_legalisir->cekProdukDetailTransaksi($id_transaksi) == true){
				$this->session->set_flashdata('sukses', "Data Produk berhasil dihapus");
				redirect('legalisir/legalisir/keranjang');
			}else{
				$this->m_admin->hapus_data($where_transaksi,'transaksi');
				$this->session->set_flashdata('sukses', "Data Produk dan transaksi berhasil dihapus");
				redirect('legalisir/legalisir/legalisir');
			}
		}else{
			redirect("auth/logout");
		}
    }
    
    function editProdukKeranjang(){ //alumni
		if($this->session->userdata('status') == "alumni"){
			$id_detail_transaksi = $this->input->post('id_detail_transaksi');
			$harga_produk = $this->input->post('harga_produk');
			$berat_produk = $this->input->post('berat_produk');
			$jumlah_produk = $this->input->post('jumlah_produk');
			$id_transaksi = $this->input->post('id_transaksi');
			$harga_transaksi = $jumlah_produk*$harga_produk;
			$berat_produk_transaksi = $jumlah_produk*$berat_produk;
			$data = array(
				'id_detail_transaksi' => $id_detail_transaksi,
				'jumlah_produk' => $jumlah_produk,
				'berat_produk_transaksi' => $berat_produk_transaksi,
				'harga_transaksi' => $harga_transaksi
			);
			$where = array('id_detail_transaksi' => $id_detail_transaksi);

			$this->m_admin->update_data($where,$data,'detail_transaksi');
			$this->session->set_flashdata('notif', "Data produk berhasil di Update");
			redirect('legalisir/legalisir/keranjang');
		}else{
			redirect("auth/logout");
		}
	}
	
	public function buatPesanan() //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			$id_transaksi = $this->input->post('id_transaksi');
			$total_harga = $this->input->post('total_harga');
			$total_berat = $this->input->post('total_berat');
			$status_pesanan = '1';
			$data = array(
				'id_transaksi' => $id_transaksi,
				'total_harga' => $total_harga,
				'status_pesanan' => $status_pesanan,
				'total_berat' => $total_berat
			);
			$where = array('id_transaksi' => $id_transaksi);

			$this->m_admin->update_data($where,$data,'transaksi');
			redirect('rajaongkir');
		}else{
			redirect("auth/logout");
		}
    }

    public function alamatPengiriman() //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			$data['main_view'] = 'legalisir/v_input_alamat_pengiriman';
			$data['alumni'] = $this->m_alumni->tampilalumni();
			$data['grup'] = $this->m_group_chat->tampilgrup();
			$this->load->view('template/template_alumni', $data);
		}else{
			redirect("auth/logout");
		}
    }
    
    public function tambahAlamatPengiriman() //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			$origin = '256';
			$destination = $this->input->get('destination');
			$berat = $this->input->get('berat');
			$courier = $this->input->get('courier');
			$id_transaksi = $this->input->get('id_transaksi');
			$total_harga = $this->input->get('total_harga');
			$jalan = $this->input->get('jalan');
			$status_pesanan = '2';

			$data = array('origin' => $origin,
							'destination' => $destination, 
							'berat' => $berat, 
							'courier' => $courier 

			);

			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/basic/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
					"key:fbd791dbdaa5ed2f93cd83f0f68887ef"
			),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$data = json_decode($response, true);
			}

			echo $provinsi = $data['rajaongkir']['destination_details']['province'];
			echo $kode_pos = $data['rajaongkir']['destination_details']['postal_code'];
			echo "&nbsp;&nbsp;&nbsp;From ".$data['rajaongkir']['origin_details']['city_name'];
			echo $kota = $data['rajaongkir']['destination_details']['city_name']; 
			echo strtoupper($courier); 
			for ($k=0; $k < count($data['rajaongkir']['results']); $k++) : 
					for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++): 
					echo $l+1;
					echo $layanan = $data['rajaongkir']['results'][$k]['costs'][$l]['service'];
					echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];
					echo  $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];
					echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);
					if($layanan == 'REG'){
						$layanans = $data['rajaongkir']['results'][$k]['costs'][$l]['service'];
						$deskripsi_layanan = $data['rajaongkir']['results'][$k]['costs'][$l]['description'];
						$estimasi = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];
						$ongkos_kirim = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];
					} 
				endfor;
			endfor; 
			

			//////////////
			
			
			$total_pembayaran = $total_harga + $ongkos_kirim;
			
			$data = array(
				'id_transaksi' => $id_transaksi,
				'ongkos_kirim' => $ongkos_kirim,
				'total_pembayaran' => $total_pembayaran,
				'provinsi' => $provinsi,
				'kota' => $kota,
				'jalan' => $jalan,
				'status_pesanan' => $status_pesanan,
				'estimasi_pengiriman' => $estimasi,
				'layanan_pengiriman' => $layanans,
				'kode_pos' => $kode_pos
			);
			$where = array('id_transaksi' => $id_transaksi);

			$this->m_admin->update_data($where,$data,'transaksi');
			redirect('legalisir/legalisir/pembayaran/'.$id_transaksi);
		}else{
			redirect("auth/logout");
		}
	}

	public function formValidasiPembayaran() //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			$data['id_transaksi'] = $this->input->post('id_transaksi');
			if($this->input->post('id_transaksi') == null){
				$this->session->set_flashdata('gagal', "Lakukan validasi pembayaran kembali");
				redirect("legalisir/pesananSaya");
			}else{
				$transaksi = $this->m_legalisir->getTotalPembayaran($this->input->post('id_transaksi'));
				$total = 0;
				foreach($transaksi as $u){$total = $u->total_pembayaran;}
				$data['total_pembayaran'] = $total;
				$data['alumni'] = $this->m_alumni->tampilalumni();
				$data['grup'] = $this->m_group_chat->tampilgrup();
				$data['main_view'] = 'legalisir/v_validasi_pembayaran';
				$this->load->view('template/template_alumni', $data);
			}
		}else{
			redirect("auth/logout");
		}
	}
	
	public function validasiPembayaran() //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			$id_transaksi = $this->input->post('id_transaksi');
			$bank = $this->input->post('bank');
			$jumlah_transfer = $this->input->post('jumlah_transfer');
			$tanggal_transfer = $this->input->post('tanggal_transfer');
			$jam_transfer = $this->input->post('jam_transfer');
			$bukti_tranfer = $this->input->post('bukti_tranfer');
			$status_pesanan = '3';
			
			if($this->m_legalisir->cekIdTransaksi($id_transaksi) != false){
				

				$config['upload_path']          = './gambar/';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 1000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
		
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload('bukti_transfer')){
					$this->session->set_flashdata('gagal', "Validasi Pembayaran Gagal! Gambar tidak sesuai persayaratan, periksa kembali bukti transfer anda");
					redirect('legalisir/legalisir/formValidasiPembayaran');
				}else{                    	            	
					$file = $this->upload->data();
					$gambar = $file['file_name'];   
					$file = 'asdsad';  	
					$file = 'asdsad';  	
					$file = 'asdsad';
					$data = array(
						'id_transaksi' => $id_transaksi,
						'bank' => $bank,
						'jumlah_transfer' => $jumlah_transfer,
						'jam_transfer' => $jam_transfer,
						'bukti_transfer' => $gambar,
						'status_pesanan' => $status_pesanan,
						'tanggal_transfer' => $tanggal_transfer
					);
					$where = array('id_transaksi' => $id_transaksi);
					$this->m_admin->update_data($where,$data,'transaksi');
					$data = array('upload_data' => $this->upload->data());
					$this->session->set_flashdata('sukses', "validasi pembayaran telah dikirim, silahkan tunggu beberapa hingga pembayaran divalidasi oleh bagian keuangan");
					redirect('legalisir/legalisir/detailPesanan/'.$id_transaksi);
				}

			}else{
				$this->session->set_flashdata('gagal', "id transaksi tidak ditemukan, periksa kembali id transaksi anda");
				redirect('legalisir/legalisir/formValidasiPembayaran');

			}
		}else{
			redirect("auth/logout");
		}
	}
	
	public function pesananSaya() //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			if($this->m_legalisir->getPesananSaya() != false){
				$data['pesanan'] = 'ada';
			}else{
				$data['pesanan'] = 'kosong';
			}
			$data['pesananSaya'] = $this->m_legalisir->getPesananSaya();
			$data['alumni'] = $this->m_alumni->tampilalumni();
			$data['grup'] = $this->m_group_chat->tampilgrup();
			$data['main_view'] = 'legalisir/v_list_pesanan_saya';
			$this->load->view('template/template_alumni', $data);
		}else{
			redirect("auth/logout");
		}
	}

	public function detailPesanan($id_transaksi) //alumni
	{
		if($this->session->userdata('status') == "alumni"){
			if($this->m_legalisir->getTransaksiById($id_transaksi) != false){
				$data['produk'] = $this->m_legalisir->getProdukPesananSaya($id_transaksi);
				$data['pesananSaya'] = $this->m_legalisir->getDetailPesananSaya($id_transaksi);
				$data['alumni'] = $this->m_alumni->tampilalumni();
				$data['grup'] = $this->m_group_chat->tampilgrup();
				$data['main_view'] = 'legalisir/v_detail_pesanan_saya';
				$this->load->view('template/template_alumni', $data);
			}else{
				$this->session->set_flashdata('gagal', "id transaksi tidak ditemukan, periksa kembali id transaksi anda");
				redirect('legalisir/legalisir/pesananSaya');
			}
		}else{
			redirect("auth/logout");
		}
	}



	public function transaksi() //operator
	{
		$this->load->database();
		$jumlah_data = $this->m_legalisir->jumlah_data();
		if($this->m_legalisir->jumlah_data() != false){	
			$data['data_transaksi'] = 'ada';
		}else{
			$data['data_transaksi'] = 'kosong';
		}
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/legalisir/legalisir/transaksi/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-left"><nav><ul class="pagination justify-content-right">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);	
		$data['transaksi'] = $this->m_legalisir->getDataTransaksi($config['per_page'],$from);
		$data['jumlah_transaksi_baru'] = $this->m_legalisir->getJumlahTransaksiBaru();
		$data['main_view'] = 'legalisir/v_list_transaksi';
		$this->load->view('template/template_operator', $data);
	}
	
	public function prosesTransaksi() //operator
	{
		if($this->session->userdata('status') == "recording"){
			$id_transaksi = $this->input->post('id_transaksi');
			$status_pesanan = $this->input->post('status_pesanan');
			$nomor_resi = $this->input->post('nomor_resi');
			$data = array(
				'id_transaksi' => $id_transaksi,
				'nomor_resi' => $nomor_resi,
				'status_pesanan' => $status_pesanan
			);
			$where = array('id_transaksi' => $id_transaksi);

			$this->m_admin->update_data($where,$data,'transaksi');
			$this->session->set_flashdata('sukses', "Status transaksi $id_transaksi telah di ubah");
			redirect('legalisir/legalisir/detailTransaksi/'.$id_transaksi);
		}else{
			redirect("auth/logout");
		}
	}
	
	public function detailTransaksi($id_transaksi) //operator
	{
		if($this->session->userdata('status') == "keuangan" || $this->session->userdata('status') == "recording"){
			if($this->m_legalisir->cekIdTransaksi($id_transaksi) != false || $id_transkaksi != null){
				$data['jumlah_transaksi_baru'] = $this->m_legalisir->getJumlahTransaksiBaru();
				$data['produk'] = $this->m_legalisir->getProdukPesananSaya($id_transaksi);
				$data['alumni'] = $this->m_alumni->tampilalumni();
				$data['grup'] = $this->m_group_chat->tampilgrup();
				$data['transaksi'] = $this->m_legalisir->getDetailPesananSaya($id_transaksi);
				$data['main_view'] = 'legalisir/v_detail_transaksi';
				$this->load->view('template/template_operator', $data);
			}else{
				$this->session->set_flashdata('gagal', "id transaksi tidak ditemukan");
				redirect('legalisir/legalisir/transaksi/semua');
			}
		}else{
			redirect("auth/logout");
		}
    }
	
	public function buktiTransfer($id_transaksi) //operator
	{
		$data['transaksi'] = $this->m_legalisir->getBuktiTransfer($id_transaksi);
		$this->load->view('legalisir/v_bukti_transfer', $data);
	}
	
	public function verifikasiPembayaran() //operator
	{
		if($this->session->userdata('status') == "keuangan"){
			$id_transaksi = $this->input->post('id_transaksi');
			$status_pesanan = '4';
			$data = array(
				'id_transaksi' => $id_transaksi,
				'status_pesanan' => $status_pesanan
			);
			$where = array('id_transaksi' => $id_transaksi);

			$this->m_admin->update_data($where,$data,'transaksi');
			$this->session->set_flashdata('sukses', "Pembayaran transaksi $id_transaksi telah divalidasi");
			redirect('legalisir/legalisir/detailTransaksi/'.$id_transaksi);
		}else{
			redirect("auth/logout");
		}
		}
		
		public function resi()
	{
		$operator = $this->session->userdata('status');
		$data['nomor_resi'] = $this->input->post('nomor_resi');
		if($operator == "alumni"){
			$this->load->view('v_test',$data);
		}else if($operator == "keuangan" || $operator == "recording"){
			$data['jumlah_transaksi_baru'] = $this->m_legalisir->getJumlahTransaksiBaru();
			$this->load->view('v_cek_resi',$data);
		}else{
			redirect("auth/logout");
		}
	}
function getResi()
	{
		$waybill = $this->input->get('waybill');

		$data = array('waybill' => $waybill

		);
		
		$this->load->view('rajaongkir/getResi', $data);
	}

}
