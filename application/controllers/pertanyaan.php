<?php
class Pertanyaan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
	}
	function index(){
		$data['id'] = '1';
		$data['main_view'] = 'kuisioner/v_detail_kuisioner';
		$this->load->view('template/template_admin', $data);
	}

	function product_data(){
		$data=$this->product_model->product_list();
		echo json_encode($data);
    }
    
    function dataPertanyaan(){
		$data=$this->product_model->dataPertanyaan();
		echo json_encode($data);
	}

	function save(){
		$data=$this->product_model->save_product();
		echo json_encode($data);
	}

	function update(){
		$data=$this->product_model->update_product();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->product_model->delete_product();
		echo json_encode($data);
	}

}