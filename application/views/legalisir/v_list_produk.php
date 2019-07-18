<?php
        $gagals = $this->session->flashdata('gagals');
        if($gagals != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Gagal!</strong> '.$gagals.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
        $suksess = $this->session->flashdata('suksess');
        if($suksess != NULL){
            echo '
            <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
              <strong>Sukses! </strong> '.$suksess.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
    ?>
<input  hidden type="text" id="sukses" value="<?php echo $sukses = $this->session->flashdata('sukses');?>">

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
                                                <div class="bg-secondary text-muted ">
                                                    <div class="">
                                                        <div class=" ">
                                                            <div class="text-right">
                                                                <?php $user_login = $this->session->userdata('username');?>
                                                                <a href="<?php echo base_url('legalisir/pesananSaya/'); ?>"  class="btn btn-primary btn-sm identifyingClass"> <i class='bx bxs-shopping-bag-alt'></i> Semua Pesanan Saya</a>
                                                                <a href="<?php echo base_url('legalisir/keranjang/'); ?>"  class="btn btn-primary btn-sm identifyingClass"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Pesanan Tertunda</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media text-muted ">
                                                    <div class="content">
                                                        <div class="settings-form p-4">
                                                            <h2>Legalisir Online</h2>
                                                            <h6>Silahkan dipilih produk yang diinginkan</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <!-- Earnings (Monthly) Card Example -->
                                                <div class="col-md-12 ">
                                                    <div class="card  shadow h-100">
                                                        <div class="card-body">
                                                            <div class="row profile-rows">
                                                                <div class="col-md-4">
                                                                    <div class="row no-gutters align-items-center">
                                                                        <div class=" font-weight-normal">Produk</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="row no-gutters align-items-center">
                                                                        <div class=" font-weight-normal">Harga</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="row no-gutters align-items-center">
                                                                        <div class=" font-weight-normal">Berat</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="row no-gutters align-items-center">
                                                                        <div class=" font-weight-normal">Jumlah</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="row no-gutters align-items-center">
                                                                        <div class=" font-weight-normal">Tambah</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Earnings (Monthly) Card Example -->
                                                <?php foreach ($produk as $u){?>
                                                <div class="col-xl-12 col-md-12">
                                                    <div class="card  shadow h-100">
                                                        <div class="card-body">
                                                            <form action="<?php echo base_url('legalisir/tambahTransaksi/'); ?>" method="post" onsubmit="openModal()" id="myForm">
                                                            <div class="row profile-rows">
                                                                <div class="col-md-4">
                                                                    <div class="row no-gutters align-items-center">
                                                                        <div class="col">
                                                                            <div class="text-xs font-weight-bold" style="font-size: 0.9em;"><?= $u->nama_produk; ?></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="text-gray-800" style="font-size: 0.8em;"><?= "Rp".$u->harga_produk; ?></div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="text-gray-800" style="font-size: 0.8em;"><?= $u->berat_produk; ?></div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <select class="" required name="jumlah_produk" id="exampleFormControlSelect1">
                                                                    <option value="">0</option>
                                                                    <option>5</option>
                                                                    <option>10</option>
                                                                    <option>15</option>
                                                                    <option>20</option>
                                                                </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <input hidden type="text" name="id_produk" value="<?= $u->id_produk; ?>">
                                                                    <input hidden type="text" name="harga_produk" value="<?= $u->harga_produk; ?>">
                                                                    <input hidden type="text" name="berat_produk" value="<?= $u->berat_produk; ?>">
                                                                    <div class="text-center">
                                                                        <button type="submit" class="btn btn-outline-primary btn-sm identifyingClass">Pesan</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div><br>
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
                                                                        <p>1. Costumer membuat pesanan <i class='bx bx-load' ></i></p>
                                                                        <p>2. Costumer mengisi alamat pengiriman <i class='bx bxs-x-circle' ></i></p>
                                                                        <p>3. Costumer melakukan pembayaran <i class='bx bxs-x-circle' ></i></p>
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






<!-- Modal -->
<div class="modal fade" id="exampleModalCenterTitle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <h1 class=""><i class="fas fa-check-circle text-success"></i></h1>
                        <label for="settingsAddress" class="text-white">Nama Produk</label>
                        <h5>Pesanan telah ditambahkan ke dalam keranjang</h5>
                    </div>
                </div>
            </div>  
            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Tambahkan pesanan lagi?</button>
                    <a href="<?php echo base_url('transaksi/pesanan/'); ?>" class="btn btn-primary">Lanjut ke pembayaran</a>
                </div>
            </div>  
      </div>
    </div>
  </div>
</div>

<script>
    var notifa = document.getElementById("sukses").value;
    if( notifa == "Produk telah ditambahkan ke dalam daftar pesanan saya" ) {
        window.onpageshow = function() {
        if (typeof window.performance != "undefined"
            && window.performance.navigation.type === 0) {
            $('#myModal').modal('show');
        }
        }
    }
</script>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <div class="row text-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <h1 class=""><i class="fas fa-check-circle text-success"></i></h1>
                        <?php
        if($sukses != NULL){
            echo '
            <h5 class="" role="alert">
              <strong> </strong> '.$sukses.'
            </h5>
            ';
        }
    ?>
                    </div>
                </div>
            </div>  
            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Tambahkan pesanan lagi?</button>
                    <a href="<?php echo base_url('legalisir/keranjang/'); ?>" class="btn btn-primary">Lanjut ke pembayaran</a>
                </div>
            </div>  
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


