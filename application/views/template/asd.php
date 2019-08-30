<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/images/logo-16x16.png" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tracert Alumni</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@1.9.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/profile.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/settings.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/forms.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/media.css" rel="stylesheet">
</head>

<body class="profile newsfeed">
    <div class=" " id="wrapper">
        <div class=" row ">
            <div class="col-md-12 " id="page-content-wrapper">
                <nav id="navbar-main" class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand mr-lg-5 ml-5" href="<?php echo base_url('alumni/dashboard'); ?>"><img src="<?php echo base_url(); ?>/assets/images/ub.png" class="mr-3" alt="Logo" width="50" height="50">Sosial Media Alumni</a>

                    
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="main_menu">
                        
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav mr-5">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link nav-links" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bxs-message-rounded message-dropdown'></i> <span class="badge badge-pill badge-primary">1</span>
                                </a>
                                <ul class="dropdown-menu notify-drop dropdown-menu-right nav-drop dropdown-shadow">
                                    <div class="notify-drop-title">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6 fs-8">Messages | <a href="#">Requests</a></div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                                <a href="#" class="notify-right-icon">
                                                    Mark All as Read
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end notify title -->
                                    <!-- notify content -->
                                    <div class="drop-content">
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="notify-img">
                                                    <img src="<?php echo base_url(); ?>/assets/images/users/user-6.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 pd-l0">
                                                <a href="#" class="notification-user">Susan P. Jarvis</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    <i class='bx bx-check'></i> This party is going to have a DJ, food, and drinks.
                                                </p>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="notify-drop-footer text-center">
                                        <a href="#">See More</a>
                                    </div>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link nav-links" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bxs-bell notification-bell'></i> <span class="badge badge-pill badge-primary">3</span>
                                </a>
                                <ul class="dropdown-menu notify-drop dropdown-menu-right nav-drop dropdown-shadow">
                                    <div class="notify-drop-title">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6 fs-8">Notifications <span class="badge badge-pill badge-primary ml-2">3</span></div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                                <a href="#" class="notify-right-icon">
                                                    Mark All as Read
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end notify title -->
                                    <!-- notify content -->
                                    <div class="drop-content">
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="notify-img">
                                                    <img src="<?php echo base_url(); ?>/assets/images/users/user-10.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 pd-l0">
                                                <a href="#" class="notification-user">Sean</a> <span class="notification-type">replied to your comment on a post in </span><a href="#" class="notification-for">PHP</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    <span class="badge badge-pill badge-primary"><i class='bx bxs-group'></i></span> 3h
                                                </p>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="notify-drop-footer text-center">
                                        <a href="#">See More</a>
                                    </div>
                                </ul>
                            </li>
                          
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link nav-links" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="menu-user-image">
                                       <img src="<?php echo base_url('img/alumni_pic/'.$this->session->userdata('foto')); ?>" class="menu-user-img ml-1" alt="Menu Image">
                                    </div>
                                    <span class="ml-2"><?php echo $this->session->userdata('nama_login'); ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right nav-drop dropdown-shadow">
                                    <a class="dropdown-item" href="<?php echo base_url('alumni/profil/index/'.$this->session->userdata('id_login')); ?>"><i class='bx bx-user mr-2'></i> Profile</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>"><i class='bx bx-undo mr-2'></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
                <div class="row message-right-side-content">
                    <div class="col-md-12">
                        <div id="message-frame">
                            <div class="message-sidepanel">
                                <div class="message-contacts">
                                    <ul class="conversations">
                                        <h6 class="p-3">Pengaturan Profil</h6>
                                        <li class="contact">
                                            <a href="<?php echo base_url('alumni/profil/index/'.$this->session->userdata('id_login')); ?>" class="wrap d-flex align-items-center">
                                                <i class='bx bxs-user'></i>
                                                <div class="meta">
                                                    <p>Data Diri</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="contact">
                                            <a href="<?php echo base_url('alumni/profil/informasilulusan/'.$this->session->userdata('id_login')); ?>" class="wrap d-flex align-items-center">
                                                <i class='bx bx-id-card'></i>
                                                <div class="meta">
                                                    <p>Data Pendidikan</p>
                                                </div>
                                            </a>
                                        </li>
										<li class="contact">
                                            <a href="<?php echo base_url('alumni/profil/riwayatpekerjaan/'.$this->session->userdata('id_login')); ?>" class="wrap d-flex align-items-center">
                                                <i class='bx bx-briefcase' ></i>
                                                <div class="meta">
                                                    <p>Riwayat Pekerjaan</p>
                                                </div>
                                            </a>
                                        </li>
										<li class="contact">
                                            <a href="<?php echo base_url('alumni/profil/editpassword/'.$this->session->userdata('id_login')); ?>" class="wrap d-flex align-items-center">
                                                <i class='bx bxs-lock'></i>
                                                <div class="meta">
                                                    <p>Password</p>
                                                </div>
                                            </a>
                                        </li>
										<li class="contact">
                                            <a href="<?php echo base_url('alumni/profil/editfoto/'.$this->session->userdata('id_login')); ?>" class="wrap d-flex align-items-center">
                                                <i class='bx bx-photo-album' ></i>
                                                <div class="meta">
                                                    <p>Foto</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                <div>
                <?php $this->load->view($main_view); ?>
                </div>
            </div>
        </div>
    </div>
	

    <!-- New message modal -->
    <div class="modal fade" id="newMessageModal" tabindex="-1" role="dialog" aria-labelledby="newMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header new-msg-header">
                    <h5 class="modal-title" id="newMessageModalLabel">Start new conversation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body new-msg-body">
                    <form action="" method="" class="new-msg-form">
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
	
    <!-- Core -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/popper/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.js"></script>
    <!-- Optional -->
    <script type="text/javascript">
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>
    <script src="<?php echo base_url(); ?>/assets/js/components/components.js"></script>
</body>

</html>
