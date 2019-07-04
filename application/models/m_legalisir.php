<?php 

class M_legalisir extends CI_Model{	
    
	function tampilProduk(){
		return $this->db->get('produk');
    }
    
    function cekKeranjang(){
			$pemesan = $this->session->userdata('username');
			$this->db->select('id_transaksi');
			$this->db->from('transaksi');
			$this->db->where('status_pesanan','0');
			$this->db->where('id_pemesan',$pemesan);
			$query=$this->db->get();
			if($this->db->affected_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}

		function cekPesanan(){
			$pemesan = $this->session->userdata('username');
			$this->db->select('id_transaksi');
			$this->db->from('transaksi');
			$this->db->where('status_pesanan','1');
			$this->db->where('id_pemesan',$pemesan);
			$query=$this->db->get();
			if($this->db->affected_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		function cekDetailTransaksi($id_transaksi){
			$this->db->select('id_transaksi');
			$this->db->from('detail_transaksi');
			$this->db->where('id_transaksi',$id_transaksi);
			$query=$this->db->get();
			if($this->db->affected_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
    }

    function getIdTransaksiTerbesar(){
			$this->db->select('id_transaksi');
			$this->db->from('transaksi');
			$query=$this->db->get();
			return $query->result();
    }

    function getIdProdukDetailTransaksi(){
			$pemesan = $this->session->userdata('username');
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('detail_transaksi','transaksi.id_transaksi = detail_transaksi.id_transaksi');
			$this->db->where('transaksi.status_pesanan','0');
			$this->db->where('transaksi.id_pemesan',$pemesan);
			$query=$this->db->get();
			return $query->result();
    }

    function getTransaksiKeranjang($status_pesanan){
			$id_pemesan = $this->session->userdata('username');
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('detail_transaksi','transaksi.id_transaksi = detail_transaksi.id_transaksi');
			$this->db->join('produk','produk.id_produk = detail_transaksi.id_produk');
			$this->db->where('transaksi.status_pesanan', $status_pesanan);
			$this->db->where('transaksi.id_pemesan',$id_pemesan);
			$query=$this->db->get();
			if($this->db->affected_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
	
		
		function cekIdTransaksi($id_transaksi){
			$this->db->select('id_transaksi');
			$this->db->from('transaksi');
			$this->db->where('id_transaksi',$id_transaksi);
			$query=$this->db->get();
			if($this->db->affected_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		function getPesananSaya(){
			$id_pemesan = $this->session->userdata('username');
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('status_pesanan','status_pesanan.id_status = transaksi.status_pesanan');
			$this->db->where('id_pemesan',$id_pemesan);
			$this->db->order_by('transaksi.tanggal_transaksi', 'ASC');
			$query=$this->db->get();
			if($this->db->affected_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		function getDetailPesananSaya($id_transaksi){
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('status_pesanan','status_pesanan.id_status = transaksi.status_pesanan');
			$this->db->where('transaksi.id_transaksi',$id_transaksi);
			$query=$this->db->get();
			if($this->db->affected_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		function getProdukPesananSaya($id_transaksi){
			$id_pemesan = $this->session->userdata('username');
			$this->db->select('*');
			$this->db->from('detail_transaksi');
			$this->db->join('produk','produk.id_produk = detail_transaksi.id_produk');
			$this->db->where('detail_transaksi.id_transaksi',$id_transaksi);
			$query=$this->db->get();
			if($this->db->affected_rows() > 0){
				return $query->result();
			}else{
				return false;
			}

		}
}