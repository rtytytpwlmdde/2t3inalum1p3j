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
                                                <div class=" text-muted ">
                                                    <div class="content">
                                                            <h5 class="mb-3  page-title text-muted">DETAIL TRANSAKSI</h5>
                                                                    <?php 
                                                                    foreach ($pesananSaya as $u){ ?>
                                                                    <?php if($u->status_pesanan == '0' ){?>
                                                                        <p>Transaksi belum lengkap, silahkan selesaikan proses memilih pesanan </p>
                                                                        <div class="text-right">
                                                                            <a href="<?php echo base_url('legalisir/legalisir'); ?>" class="btn btn-primary btn-sm">Lanjut memilih pesanan</a>
                                                                        </div>
                                                                    <?php }?>
                                                                    <?php if($u->status_pesanan == '1' ){?>
                                                                        <p>Transaksi belum lengkap, silahkan isi alamat pengiriman dan segera lakukan pembayaran </p>
                                                                        <div class="text-right">
                                                                            <a href="<?php echo base_url('rajaongkir'); ?>" class="btn btn-primary btn-sm">Masukkan alamat pengiriman</a>
                                                                        </div>
                                                                    <?php }?>
                                                                    <?php if($u->status_pesanan == '2' ){?>
                                                                        <p>Transaksi belum lengkap, Segera lakukan pembayaran</p>
                                                                        <div class="text-right">
                                                                            <a href="<?php echo base_url('legalisir/pembayaran'); ?>" class="btn btn-primary btn-sm">Pembayaran</a>
                                                                        </div>
                                                                    <?php }?>
                                                                    <?php if($u->status_pesanan == '3' ){?>
                                                                        <p>Transaksi sudah lengkap, Validasi pembayaran sedang diproses oleh bagian keuangan</p>
                                                                    <?php }?>
                                                                    <?php if($u->status_pesanan == '4' ){?>
                                                                        <p>Transaksi berhasil, validasi pemayaran telah di validasi oleh bagian keuangan</p>
                                                                    <?php }?>
                                                                    <?php if($u->status_pesanan == '5' ){?>
                                                                        <p>Detail pesanan sudah diterima oleh bagian recording, Pesanan sedang di proses oleh recording</p>
                                                                    <?php }?>
                                                                    <?php if($u->status_pesanan == '6' ){?>
                                                                        <p>Pesanan sudah dikirimkan ke alamat pengiriman</p>
                                                                    <?php }?>
                                                                    <?php if($u->status_pesanan == '6' ){?>
                                                                        <p>Pesanan sudah diterima</p>
                                                                    <?php }?>
                                                                    <?php } ?>
                                                    </div>
                                                </div>
                                            </div> <br>
                                            <div class="post border-bottom p-3 bg-white w-shadow">
                                                <div class=" text-muted ">
                                                    <div class="content">
                                                        <div class="settings-form ">
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <?php 
                                                                    foreach ($pesananSaya as $u){ ?>
                                                                    <tr>
                                                                        <td>Id transaksi</td>
                                                                        <td><?= $u->id_transaksi; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal transaksi</td>
                                                                        <td><?= $u->tanggal_transaksi; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Status Terakhir Pesanan</td>
                                                                        <td><?= $u->keterangan_status; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Produk</td>
                                                                        <td>
                                                                        <?php $no = 1;
                                                                        foreach ($produk as $p){ ?>
                                                                            <?= $no++;?>.
                                                                            <?= $p->nama_produk;?> - 
                                                                            <?= $p->jumlah_produk;?> lembar
                                                                            <br>
                                                                        <?php } ?>
                                                                        
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Harga</td>
                                                                        <td>Rp <?= $u->total_harga; ?> <br><small> *Belum termasuk ongkos kirim</small></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Berat</td>
                                                                        <td><?= $u->total_berat; ?> gram</td>
                                                                    </tr>
                                                                    <?php if($u->status_pesanan != 1){?>
                                                                    <tr>
                                                                        <td>Ongkos Kirim</td>
                                                                        <td>Rp <?= $u->ongkos_kirim; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Pembayaran</td>
                                                                        <td>Rp <?= $u->total_pembayaran; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Alamat Pengiriman</td>
                                                                        <td>
                                                                            <?= $u->jalan; ?>,
                                                                            <?= $u->kota; ?>, Provinsi
                                                                            <?= $u->provinsi; ?>
                                                                            <?= $u->kode_pos; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Layanan Pengiriman</td>
                                                                        <td>JNE-<?= $u->layanan_pengiriman; ?></td>
                                                                    </tr>
                                                                    <?php if($u->status_pesanan == '6' ){?>
                                                                    <tr>
                                                                        <td>Nomor Resi Pengiriman</td>
                                                                        <td><?= $u->nomor_resi; ?></td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                        <td>Estimasi Pengiriman</td>
                                                                        <td><?= $u->estimasi_pengiriman; ?></td>
                                                                    </tr>
                                                                        <?php if($u->status_pesanan != 2 ){?>
                                                                        <tr>
                                                                            <td>Tanggal Transfer</td>
                                                                            <td><?= $u->tanggal_transfer; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jam Transfer</td>
                                                                            <td><?= $u->jam_transfer; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Bank</td>
                                                                            <td><?= $u->bank; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Bukti Transfer</td>
                                                                            <td><img style="width: 100%; height: auto;" src="<?php echo base_url(); ?>/gambar/<?= $u->bukti_transfer; ?>" alt="notification user image"></td>
                                                                        </tr>
                                                                        <?php }?>
                                                                    <?php }?>
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


