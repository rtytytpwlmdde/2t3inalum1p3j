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
}