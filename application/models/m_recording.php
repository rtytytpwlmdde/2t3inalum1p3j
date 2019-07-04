<?php 

class M_recording extends CI_Model{	
		
    function getDataTransaksi($status){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('status_pesanan','transaksi.status_pesanan = status_pesanan.id_status');
        $this->db->join('alumni','transaksi.id_pemesan = alumni.username');
        if($status == null){
            $this->db->where('transaksi.status_pesanan >= ','4');
        }else{
            $this->db->where('transaksi.status_pesanan',$status);
        }
        $query=$this->db->get();
        if($this->db->affected_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    function getBuktiTransfer($id_transaksi){
        $this->db->select('bukti_transfer');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi',$id_transaksi);
        $query=$this->db->get();
        if($this->db->affected_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    function getJumlahTransaksiBaru(){
		$this->db->select('id_transaksi ,count(id_transaksi) as jumlah_transaksi_baru');
        $this->db->from('transaksi');
        $this->db->where('transaksi.status_pesanan','4');
        $query=$this->db->get();
        if($this->db->affected_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
}