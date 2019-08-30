<?php 

class grup_chat extends CI_Controller{
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
		$this->load->model('m_alumni');
		$this->load->model('m_group_chat');
	}
	
	public function index(){
		 if (isset($_POST['submit'])) {
            $id = $this->uri->segment(4);
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                redirect('alumni/percakapan/index/'.$id);
            } else {
                $data = array('upload_data' => $this->upload->data());

                $chat_id = $this->uri->segment(4);
                $user_id = $this->session->userdata('user_id');
                $content = $data['upload_data']['file_name'];

                $data = [
                    'chat_id' => $chat_id,
                    'user_id' => $user_id,
                    'content' => $content,
                    'is_image' => 1
                ];

                $this->db->insert('chats_messages', $data);

                redirect('group/chat/'.$chat_id);
            }
        } elseif (isset($_POST['submit_video'])) {
            /* If the chat_id on the uri segment 4 is blank */
            if (empty($chat_id = $this->uri->segment(4))) {
                $chat_id = $this->uri->segment(2);
            }

            /* Activate video call */
            $this->view_data['video'] = 1;
            $this->view_data['audio'] = $this->session->userdata('audio');
            $this->session->set_userdata(['video' => 1]);

            $this->chat_component($chat_id);
        } elseif (isset($_POST['submit_audio'])) {
            /* If the chat_id on the uri segment 4 is blank */
            if (empty($chat_id = $this->uri->segment(4))) {
                $chat_id = $this->uri->segment(2);
            }

            /* Activate video call */
            $this->view_data['video'] = $this->session->userdata('video');
            $this->view_data['audio'] = 1;
            $this->session->set_userdata(['audio' => 1]);

            $this->chat_component($chat_id);
        } elseif (isset($_POST['submit_close_audio'])) {
            /* If the chat_id on the uri segment 4 is blank */
            if (empty($chat_id = $this->uri->segment(4))) {
                $chat_id = $this->uri->segment(2);
            }

            /* Activate video call */
            $this->session->unset_userdata('audio');
            $this->view_data['video'] = $this->session->userdata('video');
            $this->view_data['audio'] = 0;

            $this->chat_component($chat_id);
        } elseif (isset($_POST['submit_close_video'])) {
            /* If the chat_id on the uri segment 4 is blank */
            if (empty($chat_id = $this->uri->segment(4))) {
                $chat_id = $this->uri->segment(2);
            }

            /* Activate video call */
            $this->session->unset_userdata('video');
            $this->view_data['video'] = 0;
            $this->view_data['audio'] = $this->session->userdata('audio');

            $this->chat_component($chat_id);
        } else {
            /* If the chat_id on the uri segment 4 is blank */
            if (empty($chat_id = $this->uri->segment(4))) {
                $chat_id = $this->uri->segment(2);
            }

            $this->view_data['audio'] = $this->session->userdata('audio');
            $this->view_data['video'] = $this->session->userdata('video');
            
            $this->chat_component($chat_id);
        }
		
	}

	public function check()
    {
		$data['id_grup'] = $this->uri->segment(4);
        $data['nim'] = $this->session->userdata('id_login');

        $check = $this->m_chatting->checkanggota($this->session->userdata('id_login'),$this->uri->segment(4));

        if ($check == 1) {
            redirect('alumni/grup_chat/index/'.$this->uri->segment(4));
        } else {
            $this->db->insert('anggota_group', $data);
            redirect('grup_chat/index/'.$this->uri->segment(4));
        }
    }
	
	
	public function chat_component($chat_id)
    {
        $page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-1];
        $this->view_data['chat_data'] = $this->m_chatting->getOne($chat_id)->row_array();

        /* Send in chat_id and user_id */
        $this->view_data['id_grup'] = $chat_id;
        $this->view_data['nim'] = $this->session->userdata('id_login');

        $this->session->set_userdata('last_chat_message_id_' . $this->view_data['id_grup'], 0);
		$data['grup'] = $this->m_group_chat->tampilgrup($url);
		$data['main_view'] = 'alumni/v_forum_komunikasi';
		$this->load->view('template/template_alumni', $data);	
	}

}
