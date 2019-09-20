<?php 

class Jurusan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'admin'){
				redirect('auth/logout');
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->model('m_auth');
		$this->load->model('m_user');
		$this->load->model('m_jurusan');
	}
	function index(){
		$data['main_view'] = 'admin/v_data_jurusan';
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		$this->load->view('template/template_admin', $data);
	}
	
	function inputJurusan(){
		$data['jurusan'] = $this->m_jurusan->tampilJurusan()->result();
		//$data['prodi'] = $this->m_jurusan->tampilProdi()->result();
		$data['main_view'] = 'admin/v_tambah_jurusan';
		$this->load->view('template/template_admin',$data);
	}
	
	function tambahJurusan(){
		$jurusan = $this->input->post('jurusan');
		$data = array(
			'jurusan' => $jurusan
		);
		$this->m_jurusan->tambahdata($data,'jurusan');
		$this->session->set_flashdata('notif', "Jurusan $jurusan berhasil ditambahkan");
		redirect('admin/jurusan');
	}
	
	function updateJurusan($id_jurusan){
		$data['main_view'] = 'admin/v_edit_jurusan';
		$where = array('id_jurusan' => $id_jurusan);
		$data['jurusan'] = $this->m_jurusan->edit_data($where,'jurusan')->result();
		$this->load->view('template/template_admin',$data);
	}
	
	function editJurusan(){
		$id_jurusan = $this->input->post('id_jurusan');
		$jurusan = $this->input->post('jurusan');
		
		$data = array(
			'id_jurusan' => $id_jurusan,
			'jurusan' => $jurusan
		);

		$where = array('id_jurusan' => $id_jurusan);

		$this->m_jurusan->update_data($where,$data,'jurusan');
		$this->session->set_flashdata('notif', "Data jurusan $jurusan berhasil di Update");
		redirect('admin/jurusan/');
	}
	
	function hapusJurusan($id_jurusan){
		$where = array('id_jurusan' => $id_jurusan);
		$this->m_jurusan->hapus_data($where,'jurusan');
		$this->session->set_flashdata('notif', "Data penyelenggara $id_jurusan berhasil dihapus");
		redirect('admin/jurusan');
	}
	public function get_prodi_by_jurusan_js($id_jurusan) {
    $this->db->select('*');
    $this->db->from('prodi');
    $this->db->where('id_jurusan', $id_jurusan);
    $this->db->order_by('prodi', 'ASC');
    $query  = $this->db->get();
    $output = '<option value="">Pilih Program Studi</option>';
    foreach($query->result() as $row)
    {
      $output .= '<option value="'.$row->id_prodi.'">'.$row->prodi.'</option>';
    }
    return $output;
	}
}