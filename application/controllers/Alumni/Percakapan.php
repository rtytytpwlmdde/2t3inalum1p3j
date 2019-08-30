<?php 

class percakapan extends CI_Controller{
function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'alumni'){
				redirect('auth/logout');
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->model('m_auth');
		$this->load->model('m_chatting');
		$this->load->model('m_obrolan');
		$this->load->model('m_segment');
		$this->load->model('m_alumni');
		}
		
	  public function chat_component($chat_id)
    {
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-3];
        /* Get the array of data of chat_id from model */
        $this->view_data['chat_data'] = $this->m_obrolan->getOne($chat_id)->row_array();

        /* Send in chat_id and user_id */
        $this->view_data['chat_id'] = $chat_id;
        $this->view_data['nim'] = $this->session->userdata('id_login');
		$this->session->set_userdata('last_chat_message_id_' . $this->view_data['chat_id'], 0);
		$data['alumni'] = $this->m_alumni->tampilalumniall($url);
		$data['main_view'] = 'alumni/v_percakapan';
		$this->load->view('template/template_alumni', $data);
	}

	function index(){
		 if (empty($chat_id = $this->uri->segment(3))) {
                $chat_id = $this->uri->segment(2);
            }
	$this->chat_component($chat_id);
	}
	
	
	public function redirect()
    {
        $nim_pengirim = $this->uri->segment(4);
        $nim_penerima = $this->uri->segment(5);

        $this->session->set_userdata('target_id', $nim_penerima);

        $result = $this->m_segment->locate($nim_pengirim,$nim_penerima);
        
        if ($result == 1) {
            redirect('alumni/percakapan/index/'. $this->session->userdata('chat_id'));
        } else {
            /* Crete the chatroom between two id */
            $chat = $this->m_obrolan->create($nim_pengirim,$nim_penerima);

            if ($chat == 1) {
                $topic = $nim_pengirim . $nim_penerima;

                $chat = $this->m_obrolan->obtain($topic)->row_array();

                /* Data to be inserted to uri_segments table */
                $data['nim_pengirim'] = $nim_pengirim;
                $data['nim_penerima'] = $nim_penerima;
                $data['chat_id'] = $chat['chat_id'];
                $segment = $this->m_segment->create($data);

                if ($segment == 1) {
                    redirect('alumni/percakapan/index/'. $data['chat_id']);
                } else {
                    echo "Error!!!";
                    die();
                }

            }

            /* Create the uri segment for locate method */
            $this->m_segment->create();
        }
    }
	
	 public function ajax_add_chat_message()
    {
        /* Posting */
        $chat_id = $this->input->post('chat_id');
        $user_id = $this->input->post('nim');
        $content = $this->input->post('content', true);

        $this->m_obrolan->add_chat_message($chat_id, $user_id, $content);

        /* Executing the method on model */
        echo $this->_get_chats_messages($chat_id);
    }

    public function ajax_get_chats_messages()
    {
        /* Posting */
        $chat_id = $this->input->post('chat_id');

        echo $this->_get_chats_messages($chat_id);
    }
	
	  public function _get_chats_messages($chat_id)
    {
        $last_chat_message_id = (int) $this->session->userdata('last_chat_message_id_' . $chat_id);

        /* Executing the method on model */
        $chats_messages = $this->m_obrolan->get_chats_messages($chat_id, $last_chat_message_id);

        if ($chats_messages->num_rows() > 0) {
            $base_url = base_url();

            /* Store the last chat message id */
            $last_chat_message_id = $chats_messages->row($chats_messages->num_rows() - 1)->id;

            $this->session->set_userdata('last_chat_message_id_' . $chat_id, $last_chat_message_id);

            // return the messages
            $chats_messages_html = "<ul>";

            foreach ($chats_messages->result() as $chats_messages) {
                $record = $this->db->get_where('alumni', ['nim' => $chats_messages->user_id])->row_array();
                $avatar = $record['avatar'];

                $li_class = ($this->session->userdata('id_login') == $chats_messages->user_id) ?
                    'class="by_current_user"' : '';

                if ($chats_messages->is_image == '0') {
                    if ($chats_messages->is_doc == '1') {
                        $chats_messages_html .=
                        '<p><li ' . $li_class . '>'
                            . '<p class="message_content"><img src="'.base_url().'uploads/avatars/'.$avatar.'" height="25" width="25">
                                <a href="'.base_url().'uploads/'.$chats_messages->content.'" target="_BLANK">
                                    '.$chats_messages->content.'
                                </a>
                            </p>
                            <span class="chat_message_header"><b>' .
                                $chats_messages->timestamp .
                                ' by ' .
                                $chats_messages->username .
                            '</b></span>
                        </li></p>';
                    } else {
                        $chats_messages_html .= '<p>
                        <li ' . $li_class . '>'
                        .'<p class="message_content"><img src="'.base_url().'uploads/avatars/'.$avatar.'" height="25" width="25"> '
                        . $chats_messages->content
                        .'</p>
                        <span class="chat_message_header"><b>'
                        . $chats_messages->timestamp
                        . ' by '
                        . $chats_messages->username
                        . '</b></span></li></p>';
                    }
                } else {
                    $chats_messages_html .=
                        '<p><li ' . $li_class . '>'
                            . '<p class="message_content"><img src="'.base_url().'uploads/avatars/'.$avatar.'" height="25" width="25">
                                <a href="'.base_url().'uploads/'.$chats_messages->content.'" target="_BLANK">
                                    <img src="'.base_url().'uploads/'.$chats_messages->content.'" width="100" height="100" />
                                </a>
                            </p>
                            <span class="chat_message_header"><b>' .
                                $chats_messages->timestamp .
                                ' by ' .
                                $chats_messages->username .
                            '</b></span>
                        </li></p>';
                }
            }

            $chats_messages_html .= "</ul>";

            $result = [
                'status'    => 'ok',
                'content'   => $chats_messages_html,
                'last_chat_message_id' => $last_chat_message_id
            ];

            return json_encode($result);
            exit();
        } else {
            $result = [
                'status'    => 'ok',
                'content'   => '',
                'last_chat_message_id' => $last_chat_message_id
            ];

            return json_encode($result);
            exit();
        }
    }
	


}
