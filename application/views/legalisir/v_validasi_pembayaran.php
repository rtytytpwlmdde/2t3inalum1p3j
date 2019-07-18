<?php
        $notif = $this->session->flashdata('gagal');
        if($notif != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Validasi Pembayaran Tidak Berhasil! </strong> '.$notif.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
        $notifsukses = $this->session->flashdata('sukses');
        if($notifsukses != NULL){
            echo '
            <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
              <strong>Sukses! </strong> '.$notifsukses.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
    ?>
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
                        <div class="row ">
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
                                        <p class="profile-username mb-3 text-muted">@pocinki</p>
                                    </div>
                                    
                                    <div class="intro mt-5 mv-hidden">
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bx-briefcase text-primary'></i> Kapolsek<a href="#">Lowokwaru</a></p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bx-map text-primary'></i> Lives in <a href="#">Pocinki, Erangel</a></p>
                                        </div>
                                    </div>
                                   
                                    <div class="intro mt-5 mv-hidden">
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted">Other Social Accounts</p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bxl-facebook-square facebook-color'></i> <a href="#" target="_blank">facebook.com/username</a></p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bxl-twitter twitter-color'></i> <a href="#" target="_blank">twitter.com/username</a></p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bxl-instagram instagram-color'></i> <a href="#" target="_blank">instagram.com/username</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-info-right">

                                    <!-- Posts section -->
                                    <div class="row">
                                        <div class="col-md-12 profile-center">
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
                                           
                                            <div class="post border-bottom p-3 bg-white w-shadow">
                                                <div class=" text-muted ">
                                                    <div class="content">
                                                        <div class="col-md-12">
                                                            <div class="panel-heading">
                                                                <h5 class="mb-3  page-title text-muted">VALIDASI PEMBAYARAN</h5>
                                                            </div>
                                                            <div class="panel-body">
                                                                <form action="<?php echo base_url('legalisir/validasiPembayaran/'); ?>" method="post" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <label for="weight">Id Transaksi</label>
                                                                        <input disabled type="text" class="form-control" value="<?= $id_transaksi ?>" >
                                                                        <input hidden type="text" name="id_transaksi" class="form-control" value="<?= $id_transaksi; ?>" >
                                                                        <input hidden type="text" name="jumlah_transfer" class="form-control" value="<?= $total_pembayaran; ?>" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="weight">Nama Bank</label>
                                                                        <input type="text" class="form-control" name="bank" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="weight">Jumlah Transfer</label>
                                                                        <input type="text" disabled class="form-control" value="Rp <?= $total_pembayaran; ?>,-">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="weight">Tanggal Transfer</label>
                                                                        <input type="date" class="form-control" name="tanggal_transfer" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="weight">Jam Tranfer</label>
                                                                        <input type="time" class="form-control" name="jam_transfer" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="weight">Bukti Tranfer</label>
                                                                        <input type="file" class="form-control" name="bukti_transfer" >
                                                                    </div>
                                                                    <div class="form-group text-right">
                                                                        <button type="submit" value="upload" class="btn btn-primary">Validasi Pembayaran</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile-info-right">
                                    <!-- Posts section -->
                                    <div class="row">
                                        <div class="col-md-12 profile-center"><br>
                                           
                                            <div class="post border-bottom p-2 bg-white w-shadow">
                                                <div class=" text-muted ">
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="panel panel-primary">
                                                                    <div class="panel-heading">
                                                                        <h6 class="mb-3  page-title text-muted">Alur Transaksi</h6>
                                                                    </div>
                                                                    <div class="panel-body" style="font-size:0.8em;">
                                                                        <p>1. Costumer membuat pesanan <i class='text-success bx bxs-check-circle' ></i></p>
                                                                        <p>2. Costumer mengisi alamat pengiriman <i class='text-success bx bxs-check-circle' ></i></p>
                                                                        <p>3. Costumer melakukan pembayaran <i class='bx bx-loader' ></i></p>
                                                                        <p>4. Pembayaran telah divalidasi <i class='bx bx-loader' ></i></p>
                                                                        <p>5. Pesanan Di Packing <i class='bx bxs-x-circle' ></i></p>
                                                                        <p>6. Pesanan Di Kirim <i class='bx bxs-x-circle' ></i></p>
                                                                        <p>7. Pesanan Sampai Di Tujuan <i class='bx bxs-x-circle' ></i></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> 
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>

