<?php

class m_obrolan extends CI_Model 
{
    /**
     * Chat_model Constructor
     * 
     * chats = ['id', 'topic', 'user_id', 'created_at']
     * chats_messages = ['id', 'chat_id', 'user_id', 'content', 'created_at']
     * created_at auto timestamp (currentdate)
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function create($nim_pengirim, $nim_penerima)
    {
        $data['topic'] = $nim_pengirim . $nim_penerima;

        $chat = $this->db->insert('records', $data);

        if ($chat) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Description
     * @param int $chat_id 
     * @param int $user_id 
     * @param text $content 
     * @return array
     */
    public function add_chat_message($chat_id, $user_id, $content)
    {
        $query = "INSERT INTO records_chat (chat_id, nim, content) VALUES (?, ?, ?)";

        return $this->db->query($query, array($chat_id, $user_id, $content));
    }

    public function get_chats_messages($chat_id, $last_chat_message_id = 0)
    {
        $query = "SELECT
                    cm.id,
                    cm.nim,
                    cm.content,
                    DATE_FORMAT(cm.created_at, '%D of %M %Y at %H:%i:%s') AS timestamp,
                    u.nim,
                    u.nama
                FROM
                    records_chat AS cm
                JOIN
                    alumni AS u
                ON
                    cm.nim = u.nim
                WHERE 
                    cm.chat_id = ?
                AND 
                    cm.id > ?
                ORDER BY
                    cm.id
                ASC";

        $result = $this->db->query($query, [$chat_id, $last_chat_message_id]);

        return $result;
    }

    public function getOne($id)
    {
        return $this->db->get_where('records', ['chat_id' => $id]);
    }

    public function get()
    {
        $this->db->select('records.*, alumni.nim');
        $this->db->from('records as chats, alumni as users');
		 $this->db->where('chats.nim = users.nim');
        return $this->db->get();
    }

    public function obtain($topic)
    {
        return $this->db->get_where('records', ['topic' => $topic]);
    }

}
