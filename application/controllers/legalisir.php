<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legalisir extends CI_Controller {

	function __construct(){
		parent::__construct();		  
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_admin');
		$this->load->model('m_produk');
		$this->load->model('m_legalisir');
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
		$data['keranjang'] = $this->m_legalisir->getIdProdukDetailTransaksi();
		$data['main_view'] = 'legalisir/v_list_produk';
		$this->load->view('template/template_alumni', $data);
	}

	public function data_alumni()
	{
		$data['main_view'] = 'alumni/v_data_alumni';
		$this->load->view('template/template_alumni', $data);
	}

	public function pembayaran()
	{
		$status_pesanan = '2';
		$data['keranjang'] = $this->m_legalisir->getTransaksiKeranjang($status_pesanan);
		$data['main_view'] = 'legalisir/v_pembayaran';
		$this->load->view('template/template_alumni', $data);
	}
	public function percakapan()
	{
		$data['main_view'] = 'alumni/v_percakapan';
		$this->load->view('template/template_alumni', $data);
    }
    
    function tambahTransaksi()
	{
        
		$id_produk = $this->input->post('id_produk');
		$nama_produk = $this->input->post('nama_produk');
		$harga_produk = $this->input->post('harga_produk');
        $berat_produk = $this->input->post('berat_produk');
        $status_pesanan = '0';
        $harga_transaksi = 5*$harga_produk;
        
        $id_pemesan = $this->session->userdata('username');
        $jumlah_produk = 5;
        $berat_transaksi = 5*$berat_produk;

        //////////////////////// mendapatkan id transaksi
        $transaksi = $this->m_legalisir->getIdTransaksiTerbesar();
        $tanggal_transaksi = date("Y-m-d");
        $id = null;
        foreach ($transaksi as $u){ echo $id=$u->id_transaksi;}
        if($id != null){
            $id_transaksi = $id+1;
        }else{
            $kode_tgl = str_replace("-","",$tanggal_transaksi);
            $id_transaksi = "1".$kode_tgl."0001";
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
            $transaksi = $this->m_legalisir->cekKeranjang();
            $id_transaksi1 = null;
            foreach ($transaksi as $u){ 
                $id_transaksi1 = $u->id_transaksi;
            }
            $data_detail_transaksi = array(
                'id_transaksi' => $id_transaksi1,
                'id_produk' => $id_produk,
                'jumlah_produk' => $jumlah_produk,
                'status_pesanan' => $status_pesanan,
                'berat_produk_transaksi' => $berat_transaksi,
                'harga_transaksi' => $harga_transaksi
            );
            $this->m_admin->tambahdata($data_detail_transaksi,'detail_transaksi');
        }
		$this->session->set_flashdata('notif', "data transaksi berhasil ditambahkan");
		redirect('legalisir/legalisir/'.$id_pemesan);
    }
    
    function keranjang(){
		$status_pesanan = '0';
		$data['keranjang'] = $this->m_legalisir->getTransaksiKeranjang($status_pesanan);
        if($this->m_legalisir->cekKeranjang() == false){
			$this->session->set_flashdata('gagal', "Keranjang Anda KOSONG, silahkan lakukan pemesanan produk yang anda inginkan");
			redirect('legalisir/legalisir');
		}else{
			$data['main_view'] = 'legalisir/v_keranjang';
			$this->load->view('template/template_alumni', $data);
		}
    }

    function hapusProdukKeranjang($id){
		$where = array('id_detail_transaksi' => $id);
		$this->m_admin->hapus_data($where,'detail_transaksi');
		$this->session->set_flashdata('notif', "Data Produk berhasil dihapus");
		redirect('legalisir/keranjang');
    }
    
    function editProdukKeranjang(){
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
		redirect('legalisir/keranjang');
	}
	
	public function buatPesanan()
	{
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
    }

    public function alamatPengiriman()
	{
		$data['main_view'] = 'legalisir/v_input_alamat_pengiriman';
		$this->load->view('template/template_alumni', $data);
    }
    
    public function tambahAlamatPengiriman()
	{
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
		redirect('legalisir/pembayaran');
	}

	public function formValidasiPembayaran()
	{
		$data['main_view'] = 'legalisir/v_validasi_pembayaran';
		$this->load->view('template/template_alumni', $data);
	}
	
	public function validasiPembayaran()
	{
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
				$this->session->set_flashdata('gagal', "Gambar tidak sesuai persayaratan, periksa kembali bukti transfer anda");
				redirect('legalisir/formValidasiPembayaran');
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
				redirect('legalisir/detailPesanan/'.$id_transaksi);
			}

		}else{
			$this->session->set_flashdata('gagal', "id transaksi tidak ditemukan, periksa kembali id transaksi anda");
			redirect('legalisir/formValidasiPembayaran');

		}
	}
	
	public function pesananSaya()
	{
		$data['pesananSaya'] = $this->m_legalisir->getPesananSaya();
		$data['main_view'] = 'legalisir/v_list_pesanan_saya';
		$this->load->view('template/template_alumni', $data);
	}

	public function detailPesanan($id_transaksi)
	{
		$data['produk'] = $this->m_legalisir->getProdukPesananSaya($id_transaksi);
		$data['pesananSaya'] = $this->m_legalisir->getDetailPesananSaya($id_transaksi);
		$data['main_view'] = 'legalisir/v_detail_pesanan_saya';
		$this->load->view('template/template_alumni', $data);
	}
}
