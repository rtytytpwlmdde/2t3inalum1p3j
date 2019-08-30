<?php
	
	class M_register extends CI_Model {
		
		function __construct()
		{
			parent::__construct();
		}
		
		function tambahdata($data,$table){
		$this->db->insert($table,$data);
	}
	function updatedata($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
		
		function changeActiveState($key)
		{
			$this->load->database();
			$data = array(
               'status_alumni' => 'aktif'
            );

			$this->db->where('md5(nim)', $key);
			$this->db->update('alumni', $data);

			return true;
		}
		
		function cek_data_alumni($nim,$tanggal_yudisium){
			$this->db->select('nim,tanggal_yudisium');
			$this->db->from('alumni');
			$this->db->where('nim',$nim);
			$this->db->where('tanggal_yudisium',$tanggal_yudisium);
			$query = $this->db->get();
			if($this->db->affected_rows() > 0){
			   return $query->result();
			}else{
				return false;
			}
		}
		
		function cek_data_nim($nim){
		$this->db->select('nim');
		$this->db->from('alumni');
		$this->db->where('nim',$nim);
		$query = $this->db->get();
		return $query;
		}
	}
?>