<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Controller {

	public function index()
	{
		$this->load->model('m_legalisir');
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

	public function getCity($province)
	{		

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/basic/city?province=$province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
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
		
		for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
			echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']." (".$data['rajaongkir']['results'][$i]['type']." - ".$data['rajaongkir']['results'][$i]['postal_code'].")</option>";
		}
	}

	function getCost()
	{
		$origin = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = $this->input->get('courier');

		$data = array('origin' => $origin,
						'destination' => $destination, 
						'berat' => $berat, 
						'courier' => $courier 

		);
		
		$this->load->view('rajaongkir/getCost', $data);
	}

	function getResi()
	{
		$waybill = $this->input->get('waybill');

		$data = array('waybill' => $waybill

		);
		
		$this->load->view('rajaongkir/getResi', $data);
	}
}