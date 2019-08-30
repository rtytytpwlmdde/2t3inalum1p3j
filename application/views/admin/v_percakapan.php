<div class="row message-right-side-content">
                    <div class="col-md-12">
                        <div id="message-frame">
                            <div class="message-sidepanel">
                                <div class="message-profile">
                                    <div class="wrap">
                                        <img src="<?php echo base_url(); ?>/assets/images/users/guest.jpg" class="online conv-img" alt="Conversation user" />
                                        <p><?php echo $this->session->userdata('nama_login') ?></p>
                                        <i class='bx bx-chevron-down expand-button'></i>
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
                                        <div id="expanded">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <a href="javascript:void(0)" class="text-dark fs-9"><i class='bx bx-contact text-primary mr-3'></i> Kontak</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="javascript:void(0)" class="text-dark fs-9"><i class='bx bx-users text-primary mr-3'></i> Group</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="message-search position-relative d-flex">
                                    <label for=""><i class='bx bx-search'></i></label>
                                    <input type="text" class="form-control search-input" placeholder="Search for conversations..." />
                                    <button type="button" class="btn btn-create-conversation" data-toggle="modal" data-target="#newConversation"><i class='bx bx-pencil'></i></button>
                                </div>
                                <div class="message-contacts">
                                    <ul class="conversations">
                                        <li class="contact">
                                            <div class="wrap">
                                                <span class="contact-status online"></span>
                                                <img src="<?php echo base_url(); ?>/assets/images/users/user-5.png" alt="Conversation user" />
                                                <span class="unread-messages">3</span>
                                                <div class="meta">
                                                    <p class="name">Ruth D. Greene</p>
                                                    <p class="preview">Great, I’ll see you tomorrow!.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact messenger-user-active">
                                            <div class="wrap">
                                                <span class="contact-status busy"></span>
                                                <img src="<?php echo base_url(); ?>/assets/images/users/user-6.png" alt="Conversation user" />
                                                <div class="meta">
                                                    <p class="name">Susan P. Jarvis</p>
                                                    <p class="preview">This party is going to have a DJ, food, and drinks.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="wrap">
                                                <span class="contact-status away"></span>
                                                <img src="<?php echo base_url(); ?>/assets/images/users/user-7.png" alt="Conversation user" />
                                                <div class="meta">
                                                    <p class="name">Kimberly R. Hatfield</p>
                                                    <p class="preview"><span>You:</span> Yeah, I will be there.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="wrap">
                                                <span class="contact-status online"></span>
                                                <img src="<?php echo base_url(); ?>/assets/images/users/user-8.png" alt="Conversation user" />
                                                <span class="unread-messages">1</span>
                                                <div class="meta">
                                                    <p class="name">Joe S. Feeney</p>
                                                    <p class="preview">I would really like to bring my friend Jake, if that would be OK.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="wrap">
                                                <span class="contact-status busy"></span>
                                                <img src="<?php echo base_url(); ?>/assets/images/users/user-9.png" alt="Conversation user" />
                                                <div class="meta">
                                                    <p class="name">William S. Willmon</p>
                                                    <p class="preview"><span>You:</span> Sure, what can I help you with?</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="wrap">
                                                <span class="contact-status"></span>
                                                <img src="<?php echo base_url(); ?>/assets/images/users/user-10.png" alt="Conversation user" />
                                                <span class="unread-messages">4</span>
                                                <div class="meta">
                                                    <p class="name">Sean S. Smith</p>
                                                    <p class="preview">Which of those two is best?</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="wrap">
                                                <span class="contact-status"></span>
                                                <img src="<?php echo base_url(); ?>/assets/images/users/user-11.png" alt="Conversation user" />
                                                <span class="unread-messages">1</span>
                                                <div class="meta">
                                                    <p class="name">Michelle R. Alvarado</p>
                                                    <p class="preview">You'll need to make an appointment.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="wrap">
                                                <span class="contact-status busy"></span>
                                                <img src="<?php echo base_url(); ?>/assets/images/users/user-12.png" alt="Conversation user" />
                                                <span class="unread-messages">2</span>
                                                <div class="meta">
                                                    <p class="name">Irwin M. Speller</p>
                                                    <p class="preview">Sure. Here you go.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="wrap">
                                                <span class="contact-status"></span>
                                                <img src="<?php echo base_url(); ?>/assets/images/users/user-5.png" alt="Conversation user" />
                                                <span class="unread-messages">1</span>
                                                <div class="meta">
                                                    <p class="name">Karen E. Nagata</p>
                                                    <p class="preview">Would you like to exchange it?</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="wrap">
                                                <span class="contact-status"></span>
                                                <img src="<?php echo base_url(); ?>/assets/images/users/user-8.png" alt="Conversation user" />
                                                <div class="meta">
                                                    <p class="name">Jonathan Sidwell</p>
                                                    <p class="preview"><span>You:</span> Certainly. This will take only a few seconds.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <div class="contact-profile">
                                    <img src="<?php echo base_url(); ?>/assets/images/users/user-6.png" alt="Convarsation user image" />
                                    <p class="message-profile-name">Susan P. Jarvis</p>
                                </div>
                                <div class="messages">
                                    <ul class="messages-content">
                                        <li class="sent">
                                            <img src="<?php echo base_url(); ?>/assets/images/users/user-6.png" alt="Conversation user image" />
                                            <p>Are you going to the party on Saturday?</p>
                                        </li>
                                        <li class="replies">
                                            <p>I was thinking about it. Are you?</p>
                                        </li>
                                        <li class="sent">
                                            <img src="<?php echo base_url(); ?>/assets/images/users/user-6.png" alt="Conversation user image" />
                                            <p>Yeah, I heard it's going to be a lot of fun.</p>
                                        </li>
                                        <li class="replies">
                                            <p>Really? Well, what time does it start?</p>
                                        </li>
                                        <li class="sent">
                                            <img src="<?php echo base_url(); ?>/assets/images/users/user-6.png" alt="Conversation user image" />
                                            <p>It starts at 8:00 pm, and I really think you should go.</p>
                                        </li>
                                        <li class="replies">
                                            <p>Well, who else is going to be there?</p>
                                        </li>
                                        <li class="sent">
                                            <img src="<?php echo base_url(); ?>/assets/images/users/user-6.png" alt="Conversation user image" />
                                            <p>Everybody from school.</p>
                                        </li>
                                        <li class="replies">
                                            <p>How do you know it's going to be so fun?</p>
                                        </li>
                                        <li class="sent">
                                            <img src="<?php echo base_url(); ?>/assets/images/users/user-6.png" alt="Conversation user image" />
                                            <p>This party is going to have a DJ, food, and drinks.</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="message-input">
                                    <div class="wrap">
                                        <form class="d-inline form-inline">
                                            <div class="input-group-btn">
                                                <input type="text" class="form-control search-input" placeholder="Type a message..." aria-label="Search" aria-describedby="search-addon">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn search-button" id="send-message"><i class='bx bx-send'></i></button>
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