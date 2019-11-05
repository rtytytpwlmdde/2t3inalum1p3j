<?php 

class M_negara extends CI_Model{
    function tampilnegara(){
        return $this->db->get('negara');
    }
    function tampilprovinsi(){
        return $this->db->get('provinsi');
    }
    function tampilkota(){
        return $this->db->get('kota');
    }

    function getDataKotaById($id){
		$hasil=$this->db->query("SELECT nama_kota, id_kota FROM kota WHERE id_provinsi = '$id'");
		return $hasil->result();
	}
}