<div class="row message-right-side-content">
                    <div class="col-md-12">
                        <div id="message-frame">
                            <div class="message-sidepanel">
                                <div class="message-profile">
                                    <div class="wrap">
									
                                        <img src="<?php echo base_url('img/alumni_pic/'.$this->session->userdata('foto')); ?>" class="online conv-img" alt="Conversation user" />
                                        <p><?php echo $this->session->userdata('nama_login') ?></p>
                                    </div>
                                </div>
                                <div class="message-search position-relative d-flex">
                                    <label for=""><i class='bx bx-search'></i></label>
                                    <input type="text" class="form-control search-input" placeholder="Search for conversations..." />
                                 </div>
                                
                            </div>
                            <div class="content">
							<?php 
												$id_grup = '';
												$nama_group = '';
												foreach ($grup as $u){ 
													$id_grup = $u->id_grup;
													$nama_group = $u->nama_group;
												}
												$n = $nama_group;
												$np = $id_grup;
											?>
                                <div class="contact-profile">
                                    <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/theme/team-4.jpg" alt="Online user" class="mr-2 online-user-image">
                                    <p class="message-profile-name"><?php echo $n?></p>
									
                                </div>
                                <div class="messages">
                                    <ul class="messages-content">
                                        
                                    </ul>
                                </div>
                                <div class="message-input">
                                    <div class="wrap">
                                        <form class="d-inline form-inline">
                                            <div id="chat_input">
        <!-- <input type="text" name="chat_message" id="chat_message" value="" tabindex="1" /> -->
        <input type="text" name="chat_message" id="chat_message" />
        <?php echo anchor('#', 'Enter', array('title' => 'Send this chat message', 'id' => 'submit_message', 'class' => 'btn btn-default btn-sm')); ?>
        <div class="clearer"></div>
      </div>
                                        </form>
                                    </div>
                                </div>
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