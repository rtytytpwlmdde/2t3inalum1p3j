<?php
        $notif = $this->session->flashdata('gagal');
        if($notif != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong> </strong> '.$notif.'
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
                                           
                                            <div class="post border-bottom p-3 bg-white w-shadow">
                                                <div class="media text-muted ">
                                                    <div class="content">
                                                            <h5 class="mb-3  page-title text-muted">SEMUA PESANAN</h5>
                                                            <p class="text-muted">List semua transaksi yang pernah dilakukan.</p>
                                                    </div>
                                                </div>
                                            </div> <br>
                                            <div class="post border-bottom p-3 bg-white w-shadow">
                                                <div class=" text-muted ">
                                                    <div class="content">
                                                        <div class="settings-form ">
                                                            <table class="table table-bordered" style="font-size:1em;">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">ID Transaksi</th>
                                                                    <th scope="col">Tanggal Transaksi</th>
                                                                    <th scope="col">Status Terakhir</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                    $no = 1;
                                                                    if($pesanan == 'ada'){
                                                                        foreach ($pesananSaya as $u){ ?>
                                                                            <tr>
                                                                                <td scope="row"><?= $no++; ?></td>
                                                                                <?php if($u->status_pesanan < 3){?>
                                                                                <td title="Transaksi belum complete, silahkan selesaikan pemesanan dan lakukan validasi pembayaran"><a href="<?php echo base_url('legalisir/detailPesanan/'.$u->id_transaksi )?>"><?= $u->id_transaksi; ?><i class='bx bxs-error-circle text-warning' style="font-size:2em;"></i></a></td>
                                                                                <?php }else{?>
                                                                                <td><a href="<?php echo base_url('legalisir/detailPesanan/'.$u->id_transaksi )?>"><?= $u->id_transaksi; ?></a></td>
                                                                                <?php }
                                                                                $date=date_create($u->tanggal_transaksi);
                                                                                ?>
                                                                                <td><?= date_format($date,"d-m-Y") ; ?></td>
        
                                                                                <td><?= $u->keterangan_status; ?></td>
                                                                            </tr>
                                                                            <?php }
                                                                    } else{ ?>
                                                                    <tr><td scope="row">Tidak ada transaksi</td> </tr>
                                                                    <?php } ?>

                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <br>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


