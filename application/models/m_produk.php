<?php 

class M_produk extends CI_Model{	
    
	function tampilProduk(){
		return $this->db->get('produk');
	}
	
}