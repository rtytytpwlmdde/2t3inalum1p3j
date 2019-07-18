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
                                                <div class="media text-muted ">
                                                    <div class="content">
                                                           
                                                            <h5 class="mb-3  page-title text-muted">PEMBAYARAN</h5>
                                                            <p class="text-muted">Silahkan transfer ke nomor rekening berikut sesuai dengan nominal yang harus dibayar pada detail pesanan.</p>
                                                            <div class="settings-form">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <img class="" width="120" height="50" src="<?php echo base_url(); ?>/assets/images/icons/mandiri.png" alt="Paymant image">
                                                                        
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div>
                                                                            <h3 class="">411111******1111</h3>
                                                                            <span class="text-muted">A.N Sueddi Sihotang</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div> <br>
                                            <div class="post border-bottom p-3 bg-white w-shadow">
                                                <div class="media text-muted ">
                                                    <div class="content">
                                                        <div class="settings-form ">
                                                            <h6 class="font-weight">Detail Pesanan</h6>
                                                            <h6>ID Transaksi : <?= $id_transaksi; ?></h6>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Produk</th>
                                                                    <th scope="col">Jumlah</th>
                                                                    <th scope="col">Harga</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                    $no= 1;
                                                                    foreach($keranjang as $u){
                                                                        
                                                                    $id_transaksi = $u->id_transaksi;
                                                                    $total_berat = $u->total_berat;
                                                                    $total_harga = $u->total_harga;
                                                                    $ongkos_kirim = $u->ongkos_kirim;
                                                                    $total_pembayaran = $u->total_pembayaran;
                                                                    
                                                                    ?>
                                                                    <tr>
                                                                        <td scope="row"><?= $no++; ?></td>
                                                                        <td><?= $u->nama_produk; ?></td>
                                                                        <td><?= $u->jumlah_produk; ?></td>
                                                                        <td><?= $u->harga_transaksi; ?></td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                    <tr>
                                                                    <th scope="row">#</th>
                                                                        <td>Total harga</td>
                                                                        <td colspan="2">Rp <?= $total_harga ?> ,-</td>
                                                                    </tr>
                                                                        <th scope="row">#</th>
                                                                        <td>*Total berat </td>
                                                                        <td colspan="2"><?= $total_berat; ?> gram</td>
                                                                    </tr>
                                                                        <th scope="row">#</th>
                                                                        <td>*Ongkos Kirim </td>
                                                                        <td colspan="2">Rp <?= $ongkos_kirim; ?></td>
                                                                    </tr>
                                                                        <th scope="row">#</th>
                                                                        <td><strong>Total Yang Harus Dibayar</strong></td>
                                                                        <td colspan="2"><strong>Rp <?= $total_pembayaran; ?></strong></td>
                                                                    </tr>

                                                                    
                                                                </tbody>
                                                            </table>
                                                                    <small id="emailHelp" class="form-text text-muted">*Lakukan validasi pembayaran dalam 24 jam. Pesanan dianggap gagal jika tidak divalidasi dalam 24 jam</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 text-right">
                                                    <form action="<?php echo base_url('legalisir/formValidasiPembayaran/'); ?>" method="post">
                                                        <input hidden type="text" name="id_transaksi" value="<?= $id_transaksi; ?>">
                                                        <input hidden type="text" name="total_pembayaran" value="<?= $total_pembayaran; ?>">
                                                        <button type="submit" class="btn btn-primary btn-sm">Validasi Pembayaran</button>
                                                    </form>
                                                </div>
                                            </div> <br>
                                            
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
                                                                        <p>4. Pembayaran telah divalidasi <i class='bx bxs-x-circle' ></i></p>
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