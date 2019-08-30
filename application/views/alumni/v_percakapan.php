<div class="row message-right-side-content">
                    <div class="col-md-12">
                        <div id="message-frame">
                            <div class="message-sidepanel">
                                <div class="message-profile">
                                    <div class="wrap">
                                        <img src="<?php echo base_url('img/alumni_pic/'.$this->session->userdata('foto')); ?>" class="online conv-img" alt="Conversation user" />
                                        <p><?php echo $this->session->userdata('nama_login') ?></p>
                                         <div id="status-options">
                                            <ul id="set-online-status">
                                                <li id="status-online" class="messenger-user-active"><span class="status-circle"></span>
                                                    <p>Online</p>
                                                </li>
                                                <li id="status-away"><span class="status-circle"></span>
                                                    <p>Away</p>
                                                </li>
                                                <li id="status-busy"><span class="status-circle"></span>
                                                    <p>Busy</p>
                                                </li>
                                                <li id="status-offline"><span class="status-circle"></span>
                                                    <p>Offline</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                               
                            </div>
                            <div class="content">
								<?php 
												$nama = '';
												$foto = '';
												foreach ($alumni as $u){ 
													$nama= $u->nama;
													$foto = $u->foto;
												}
												$n = $nama;
												$np = $foto;
											?>
                                <div class="contact-profile">
                                       <img src="<?php echo base_url('img/alumni_pic/'.$np) ?>" alt="Online user" class="mr-2 online-user-image">
                                    <p class="message-profile-name"><?php echo $n?></p>
									
									
                                </div>
                                <div class="messages">
                                    <ul class="messages-content">
                                        
                                    </ul>
                                </div>
                                <div class="message-input">
                                    <div class="wrap">
                                        <form class="d-inline form-inline">
                                            <div class="input-group-btn">
											 <input type="text" name="chat_message" id="chat_message" class="form-control search-input" placeholder="Type a message..." aria-label="Search" aria-describedby="search-addon">
                                                <div class="input-group-append">
                                                     <?php echo anchor('#', 'Send', array('title' => 'Send this chat message', 'id' => 'submit_message', 'class' => 'btn btn-default bx bx-send')); ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Modal -->
    <div class="modal fade" id="newConversation" tabindex="-1" role="dialog" aria-labelledby="newConversationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header new-msg-header">
                    <h5 class="modal-title" id="newConversationLabel">Start new conversation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body new-msg-body">
                    <form action="" method="" class="new-msg-form">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control search-input" id="recipient-name" placeholder="Add recipient...">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control search-input" rows="5" id="message-text" placeholder="Type a message..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer new-msg-footer">
                    <button type="button" class="btn btn-primary btn-sm">Send message</button>
                </div>
            </div>
        </div>
    </div>
	
<script type="text/javascript" charset="utf-8" async defer>
  var webrtc = new SimpleWebRTC({
    // the id/element dom element that will hold 'our' video
    localVideoEl: 'localVideo',
    // the id/element dom element that will hold remote videos
    remoteVideosEl: '',
    // immediately ask for camera access
    autoRequestMedia: true,
    media: {
        <?php
        if ($video == 0) {
            if ($audio == 0) {
                echo "audio: false,
                  video: false";
            } elseif ($audio == 1) {
                echo "audio: true,
                  video: false";
            }
        } elseif ($video == 1) {
            if ($audio == 0) {
                echo "audio: false,
                  video: true";
            } elseif ($audio == 1) {
                echo "audio: true,
                  video: true";
            }
        }
        ?>
    }
  });

  // a peer video has been added
  webrtc.on('videoAdded', function (video, peer) {
      console.log('video added', peer);
      var remotes = document.getElementById('remotesVideos');
      if (remotes) {
          var container = document.createElement('div');
          container.className = 'videoContainer';
          container.id = 'container_' + webrtc.getDomId(peer);
          container.appendChild(video);

          // suppress contextmenu
          video.oncontextmenu = function () { return false; };

          remotes.appendChild(container);
      }
  });

  // a peer video was removed
  webrtc.on('videoRemoved', function (video, peer) {
      console.log('video removed ', peer);
      var remotes = document.getElementById('remotesVideos');
      var el = document.getElementById(peer ? 'container_' + webrtc.getDomId(peer) : 'localScreenContainer');
      if (remotes && el) {
          remotes.removeChild(el);
      }
  });

  // we have to wait until it's ready
  webrtc.on('readyToCall', function () {
    // you can name it anything
    webrtc.joinRoom('<?php echo $chat_data['topic']; ?>');
  });
</script>