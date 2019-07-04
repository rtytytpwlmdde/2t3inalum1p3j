<div class="row profile-right-side-content">
                    <div class="user-profile">
                        <div class="profile-header-background">
                            <a href="#" class="profile-cover">
                                <img src="<?php echo base_url(); ?>/assets/images/users/cover/cover1.jpg" alt="Profile Header Background">
                                <div class="cover-overlay">
                                    <a href="#" class="btn btn-update-cover"><i class='bx bxs-camera'></i> Update Cover Photo</a>
                                </div>
                            </a>
                        </div>
                        <div class="row profile-rows">
                            <div class="col-md-3">
                                <div class="profile-info-left">
                                    <div class="text-center">
                                        <div class="profile-img w-shadow">
                                            <div class="profile-img-overlay"></div>
                                            <img src="<?php echo base_url(); ?>/assets/images/users/guest.jpg" alt="Avatar" class="avatar img-circle">
                                            <div class="profile-img-caption">
                                                <label for="updateProfilePic" class="upload">
                                                    <i class='bx bxs-camera'></i> Update
                                                    <input type="file" id="updateProfilePicInput" class="text-center upload">
                                                </label>
                                            </div>
                                        </div>
                                        <p class="profile-fullname mt-3">Jisso</p>
                                        <p class="intro-title text-muted"><i class=' text-primary'></i>online<a href="#"><span class="online-status bg-success"></span></a></p>
                                    </div>
                                    
                                    <div class="intro mt-5 mv-hidden">
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted">Biodata</p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bx-briefcase text-primary'></i> Kapolsek<a href="#">Lowokwaru</a></p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bx-map text-primary'></i> Lives in <a href="#">Pocinki, Erangel</a></p>
                                        </div>
                                    </div>
                                    <div class="intro mt-5 mv-hidden">
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted">Social Accounts</p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bxl-facebook-square facebook-color'></i> <a href="#" target="_blank">facebook.com/sueddii</a></p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bxl-twitter twitter-color'></i> <a href="#" target="_blank">twitter.com/sueddii</a></p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bxl-instagram instagram-color'></i> <a href="#" target="_blank">instagram.com/sueddii</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="profile-info-right">

                                    <!-- Posts section -->
                                    <div class="row">
                                        <div class="col-md-8 profile-center">
                                            <ul class="list-inline profile-links d-flex justify-content-between w-shadow rounded">
                                                <li class="list-inline-item profile-active">
                                                    <a href="<?php echo base_url('alumni/'); ?>">Timeline</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a  href="<?php echo base_url('alumni/data_alumni/'); ?>">About</a></li>
                                                <li class="list-inline-item">
                                                    <a  href="<?php echo base_url('alumni/percakapan'); ?>">Percakapan</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a  href="<?php echo base_url('legalisir/legalisir'); ?>">Legalisir Online</a>
                                                </li>
                                                <li class="list-inline-item dropdown">
                                                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right profile-ql-dropdown">
                                                        <a href="#" class="dropdown-item">Activity Log</a>
                                                        <a href="#" class="dropdown-item">Videos</a>
                                                        <a href="#" class="dropdown-item">Check-Ins</a>
                                                        <a href="#" class="dropdown-item">Events</a>
                                                        <a href="#" class="dropdown-item">Likes</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="list-unstyled" style="margin-bottom: 0;">
                                                <li class="media post-form w-shadow">
                                                    <div class="media-body">
                                                        <div class="form-group post-input">
                                                            <textarea class="form-control" id="postForm" rows="2" placeholder="What's on your mind?"></textarea>
                                                        </div>
                                                        <div class="row post-form-group">
                                                            <div class="col-md-9">
                                                                <button type="button" class="btn btn-link post-form-btn btn-sm">
                                                                    <i class='bx bx-images'></i> <span>Photo/Video</span>
                                                                </button>
                                                                <button type="button" class="btn btn-link post-form-btn btn-sm">
                                                                    <i class='bx bxs-group'></i> <span>Tag Friends</span>
                                                                </button>
                                                                <button type="button" class="btn btn-link post-form-btn btn-sm">
                                                                    <i class='bx bxs-map'></i> <span>Check In</span>
                                                                </button>
                                                            </div>
                                                            <div class="col-md-3 text-right">
                                                                <button type="button" class="btn btn-primary btn-sm">Publish</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="profile-posts-options mt-4 mb-3  d-flex justify-content-between">
                                                <h6 class="text-muted timeline-title">Posts</h6>
                                                <div class="timeline-manage">
                                                    <button type="button" class="btn btn-light btn-sm tmo-buttons"><i class='bx bxs-cog'></i> Manage Posts</button>
                                                    <button type="button" class="btn btn-light btn-sm tmo-buttons ql-active"><i class='bx bx-align-middle'></i> List View</button>
                                                    <button type="button" class="btn btn-light btn-sm tmo-buttons"><i class='bx bxs-grid-alt'></i> Grid View</button>
                                                </div>
                                            </div>
                                            <div class="post border-bottom p-3 bg-white w-shadow">
                                                <div class="media text-muted pt-3">
                                                    <img src="<?php echo base_url(); ?>/assets/images/users/guest.jpg" alt="Online user" class="mr-3 post-user-image">
                                                    <div class="media-body pb-3 mb-0 small lh-125">
                                                        <div class="d-flex justify-content-between align-items-center w-100">
                                                            <span class="post-type text-muted"><a href="#" class="text-gray-dark post-user-name mr-2">Jisoo</a> updated his cover photo.</span>
                                                            <div class="dropdown">
                                                                <a href="#" class="post-more-settings" role="button" data-toggle="dropdown" id="postOptions" aria-haspopup="true" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left post-dropdown-menu">
                                                                    <a href="#" class="dropdown-item" aria-describedby="savePost">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <i class='bx bx-bookmark-plus post-option-icon'></i>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <span class="fs-9">Save post</span>
                                                                                <small id="savePost" class="form-text text-muted">Add this to your saved items</small>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="#" class="dropdown-item" aria-describedby="hidePost">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <i class='bx bx-hide post-option-icon'></i>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <span class="fs-9">Hide post</span>
                                                                                <small id="hidePost" class="form-text text-muted">See fewer posts like this</small>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="#" class="dropdown-item" aria-describedby="snoozePost">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <i class='bx bx-time post-option-icon'></i>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <span class="fs-9">Snooze Arthur for 30 days</span>
                                                                                <small id="snoozePost" class="form-text text-muted">Temporarily stop seeing posts</small>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="#" class="dropdown-item" aria-describedby="reportPost">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <i class='bx bx-block post-option-icon'></i>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <span class="fs-9">Report</span>
                                                                                <small id="reportPost" class="form-text text-muted">I'm concerned about this post</small>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="d-block">3 hours ago <i class='bx bx-globe ml-3'></i></span>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <p>Testing testing</p>
                                                </div>
                                                <div class="d-block mt-3">
                                                    <img src="<?php echo base_url(); ?>/assets/images/users/post/post-1.jpg" class="w-100 mb-3" alt="post image">
                                                </div>
                                                <div class="mb-2">

                                                    <!-- Reactions -->
                                                    <div class="argon-reaction">
                                                        <span class="like-btn">
                                                            <a href="#" class="post-card-buttons" id="reactions"><i class='bx bxs-like mr-2'></i> 67</a>
                                                            <ul class="reactions-box dropdown-shadow">
                                                                <li class="reaction reaction-like" data-reaction="Like"></li>
                                                                <li class="reaction reaction-love" data-reaction="Love"></li>
                                                                <li class="reaction reaction-haha" data-reaction="HaHa"></li>
                                                                <li class="reaction reaction-wow" data-reaction="Wow"></li>
                                                                <li class="reaction reaction-sad" data-reaction="Sad"></li>
                                                                <li class="reaction reaction-angry" data-reaction="Angry"></li>
                                                            </ul>
                                                        </span>
                                                    </div>

                                                    <a href="javascript:void(0)" class="post-card-buttons" id="show-comments"><i class='bx bx-message-rounded mr-2'></i> 5</a>
                                                    <div class="dropdown dropup share-dropup">
                                                        <a href="#" class="post-card-buttons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class='bx bx-share-alt mr-2'></i> Share
                                                        </a>
                                                        <div class="dropdown-menu post-dropdown-menu">
                                                            <a href="#" class="dropdown-item">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <i class='bx bx-share-alt'></i>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <span>Share Now (Public)</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="dropdown-item">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <i class='bx bx-share-alt'></i>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <span>Share...</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="dropdown-item">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <i class='bx bx-message'></i>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <span>Send as Message</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border-top pt-3 hide-comments" style="display: none;">
                                                    <div class="row bootstrap snippets">
                                                        <div class="col-md-12">
                                                            <div class="comment-wrapper">
                                                                <div class="panel panel-info">
                                                                    <div class="panel-body">
                                                                        <ul class="media-list comments-list">
                                                                            <li class="media comment-form">
                                                                                <a href="#" class="pull-left">
                                                                                    <img src="<?php echo base_url(); ?>/assets/images/users/user-4.jpg" alt="" class="img-circle">
                                                                                </a>
                                                                                <div class="media-body">
                                                                                    <form action="" method="" role="form">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="input-group">
                                                                                                    <input type="text" class="form-control comment-input" placeholder="Write a comment...">

                                                                                                    <div class="input-group-btn">
                                                                                                        <button type="button" class="btn comment-form-btn" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class='bx bxs-smiley-happy'></i></button>
                                                                                                        <button type="button" class="btn comment-form-btn comment-form-btn" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class='bx bx-camera'></i></button>
                                                                                                        <button type="button" class="btn comment-form-btn comment-form-btn" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class='bx bx-microphone'></i></button>
                                                                                                        <button type="button" class="btn comment-form-btn" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class='bx bx-file-blank'></i></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </li>
                                                                            <li class="media">
                                                                                <a href="#" class="pull-left">
                                                                                    <img src="<?php echo base_url(); ?>/assets/images/users/user-2.jpg" alt="" class="img-circle">
                                                                                </a>
                                                                                <div class="media-body">
                                                                                    <div class="d-flex justify-content-between align-items-center w-100">
                                                                                        <strong class="text-gray-dark"><a href="#" class="fs-8">Karen Minas</a></strong>
                                                                                        <a href="#"><i class='bx bx-dots-horizontal-rounded'></i></a>
                                                                                    </div>
                                                                                    <span class="d-block comment-created-time">30 min ago</span>
                                                                                    <p class="fs-8 pt-2">
                                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                                        Lorem ipsum dolor sit amet, <a href="#">#consecteturadipiscing </a>.
                                                                                    </p>
                                                                                    <div class="commentLR">
                                                                                        <button type="button" class="btn btn-link fs-8">Like</button>
                                                                                        <button type="button" class="btn btn-link fs-8">Reply</button>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="media">
                                                                                <a href="#" class="pull-left">
                                                                                    <img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                                                                                </a>
                                                                                <div class="media-body">
                                                                                    <div class="d-flex justify-content-between align-items-center w-100">
                                                                                        <strong class="text-gray-dark"><a href="#" class="fs-8">Lia Earnest</a></strong>
                                                                                        <a href="#"><i class='bx bx-dots-horizontal-rounded'></i></a>
                                                                                    </div>
                                                                                    <span class="d-block comment-created-time">2 hours ago</span>
                                                                                    <p class="fs-8 pt-2">
                                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                                        Lorem ipsum dolor sit amet, <a href="#">#consecteturadipiscing </a>.
                                                                                    </p>
                                                                                    <div class="commentLR">
                                                                                        <button type="button" class="btn btn-link fs-8">Like</button>
                                                                                        <button type="button" class="btn btn-link fs-8">Reply</button>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="media">
                                                                                <a href="#" class="pull-left">
                                                                                    <img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="img-circle">
                                                                                </a>
                                                                                <div class="media-body">
                                                                                    <div class="d-flex justify-content-between align-items-center w-100">
                                                                                        <strong class="text-gray-dark"><a href="#" class="fs-8">Rusty Mickelsen</a></strong>
                                                                                        <a href="#"><i class='bx bx-dots-horizontal-rounded'></i></a>
                                                                                    </div>
                                                                                    <span class="d-block comment-created-time">17 hours ago</span>
                                                                                    <p class="fs-8 pt-2">
                                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                                        Lorem ipsum dolor sit amet, <a href="#">#consecteturadipiscing </a>.
                                                                                    </p>
                                                                                    <div class="commentLR">
                                                                                        <button type="button" class="btn btn-link fs-8">Like</button>
                                                                                        <button type="button" class="btn btn-link fs-8">Reply</button>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="media">
                                                                                <div class="media-body">
                                                                                    <div class="comment-see-more text-center">
                                                                                        <button type="button" class="btn btn-link fs-8">See More</button>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                        </div>
                                        <div class="col-md-4 third-section"><br>
                                            <div class="p-3 bg-white rounded w-shadow">
                                                <h6 class="card-title border-bottom border-gray pb-2 mb-0">Online Users</h6>
                                                <div class="media text-muted pt-3">
                                                    <img src="<?php echo base_url(); ?>/assets/images/users/user-2.jpg" alt="Online user" class="mr-2 online-user-image">
                                                    <div class="media-body pb-3 mb-0  lh-125">
                                                        <div class="d-flex justify-content-between align-items-center w-100">
                                                            <strong class="text-gray-dark"><a href="#" class="smFLname">Sihotang</a></strong>
                                                            <span class="online-status bg-success"></span>
                                                        </div>
                                                        <span class="d-block online-username">@sihotang</span>
                                                    </div>
                                                </div>
                                                <div class="media text-muted pt-3">
                                                    <img src="<?php echo base_url(); ?>/assets/images/users/user-3.jpg" alt="Online user" class="mr-2 online-user-image">
                                                    <div class="media-body pb-3 mb-0  lh-125">
                                                        <div class="d-flex justify-content-between align-items-center w-100">
                                                            <strong class="text-gray-dark"><a href="#" class="smFLname">Simarsoit</a></strong>
                                                            <span class="online-status bg-success"></span>
                                                        </div>
                                                        <span class="d-block online-username">@simarsoit</span>
                                                    </div>
                                                </div>
                                                <div class="media text-muted pt-3">
                                                    <img src="<?php echo base_url(); ?>/assets/images/users/user-1.jpg" alt="Online user" class="mr-2 online-user-image">
                                                    <div class="media-body pb-3 mb-0  lh-125">
                                                        <div class="d-flex justify-content-between align-items-center w-100">
                                                            <strong class="text-gray-dark"><a href="#" class="smFLname">Nella Karisma</a></strong>
                                                            <span class="online-status bg-success"></span>
                                                        </div>
                                                        <span class="d-block online-username">@karisma</span>
                                                    </div>
                                                </div>
                                                <small class="d-block text-right mt-3">
                                                    <a href="#">See More</a>
                                                </small>
                                            </div>

                                            <!-- Suggestions -->
                                            <div class="mt-4 p-3 bg-white rounded w-shadow">
                                                <h6 class="card-title border-bottom border-gray pb-2 mb-0">Group</h6>
                                                <div class="media text-muted pt-3">
                                                    <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/theme/team-4.jpg" alt="Online user" class="mr-2 online-user-image">
                                                    <div class="media-body pb-3 mb-0  lh-125">
                                                        <div class="d-flex justify-content-between align-items-center w-100">
                                                            <strong class="text-gray-dark" style="line-height: 0;"><a href="#" class="smFLname">FORSTILING</a></strong>
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Follow"><i class='bx bxs-plus-circle' style="font-size: 2.5em; color: #969696;"></i></a>
                                                        </div>
                                                        <span class="d-block" style="line-height: 10px;">400 anggota</span>
                                                    </div>
                                                </div>
                                                <div class="media text-muted pt-3">
                                                    <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/theme/team-3.jpg" alt="Online user" class="mr-2 online-user-image">
                                                    <div class="media-body pb-3 mb-0  lh-125">
                                                        <div class="d-flex justify-content-between align-items-center w-100">
                                                            <strong class="text-gray-dark" style="line-height: 0;"><a href="#" class="smFLname">HMIF</a></strong>
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Follow"><i class='bx bxs-plus-circle' style="font-size: 2.5em; color: #969696;"></i></a>
                                                        </div>
                                                        <span class="d-block" style="line-height: 10px;">100 anggota</span>
                                                    </div>
                                                </div>
                                                <small class="d-block text-right mt-3">
                                                    <a href="#">See More</a>
                                                </small>
                                            </div>

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>