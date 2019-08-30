<?php

class m_segment extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $segment = $this->db->insert('segment', $data);

        if ($segment) {
            return 1;
        } else {
            return 0;
        }
    }

    public function select($nim_pengirim, $nim_penerima)
    {
		$this->db->select('*');
		$this->db->from('segment');
		$this->db->where('nim_pengirim',$nim_pengirim);
		$this->db->where('nim_penerima',$nim_penerima);
		$query = $this->db->get();
		return $query;
    }

    /**
     * Locate the id on uri_segments table
     * @param int $first_id 
     * @param int $second_id 
     * @return bool
     */
    public function locate($nim_pengirim,$nim_penerima)
    {
        $query = "SELECT
                    *
                FROM
                    segment AS uri
                WHERE
                    (nim_pengirim = '$nim_pengirim'
                AND
                    nim_penerima = '$nim_penerima')
                OR
                    (nim_pengirim = '$nim_penerima'
                AND
                    nim_penerima = '$nim_pengirim')
                ORDER BY
                    uri.id
                DESC";

        $record_array = $this->db->query($query)->row_array();
        $this->session->set_userdata(['chat_id' => $record_array['chat_id']]);

        $result = $this->db->query($query)->num_rows();

        if ($result > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
