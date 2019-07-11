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
                                                            <h5 class="mb-3  page-title text-muted">PESANAN TERTUNDA</h5>
                                                            <p class="text-muted">List Pesanan Yang telah dilakukan.</p>
                                                    </div>
                                                </div>
                                            </div> <br>
                                            <div class="post border-bottom p-3 bg-white w-shadow">
                                                <div class=" text-muted ">
                                                    <div class="content">
                                                        <div class="settings-form ">
                                                            <h6>Detail Pesanan</h6>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Produk</th>
                                                                    <th scope="col">Jumlah</th>
                                                                    <th scope="col">Harga</th>
                                                                    <th scope="col">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                    $no= 1;
                                                                    $total_berat = 0;
                                                                    $total_harga = 0;
                                                                    foreach($keranjang as $u){
                                                                        
                                                                    $id_transaksi = $u->id_transaksi;?>
                                                                    <tr>
                                                                        <td scope="row"><?= $no++; ?></td>
                                                                        <td><?= $u->nama_produk; ?></td>
                                                                        <td><?= $u->jumlah_produk; ?></td>
                                                                        <td hidden ><?= $total_berat += $u->berat_produk_transaksi; ?></td>
                                                                        <td><?= $total_harga += $u->harga_transaksi; ?></td>
                                                                        <td>
                                                                            <a data-toggle="modal" data-target="#modal<?=$u->id_detail_transaksi?>" class="btn btn-warning btn-sm text-white"><i class="fas fa-pencil-alt" title="edit pesanan ini"></i></a>
                                                                            <a href="<?php echo base_url('legalisir/hapusProdukKeranjang/'.$id_transaksi."/".$u->id_detail_transaksi); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" title="hapus pesanan ini"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                    <tr>
                                                                    <th scope="row">#</th>
                                                                        <td colspan="3"><strong>Total harga sementara</strong></td>
                                                                        <td><strong>Rp <?= $total_harga ?> ,-</strong></td>
                                                                    </tr>
                                                                    <th scope="row">#</th>
                                                                        <td colspan="4">*Total berat = <?= $total_berat; ?> gram</td>
                                                                    </tr>
                                                                    <th scope="row">#</th>
                                                                        <td colspan="4">*Ongkos kirim belum termasuk</td>
                                                                    </tr>

                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 text-center">
                                                    <form action="<?php echo base_url('legalisir/buatPesanan/'); ?>" method="post">
                                                    <input hidden type="text" name="id_transaksi" value="<?= $id_transaksi; ?>">
                                                    <input hidden type="text" name="total_harga" value="<?= $total_harga; ?>">
                                                    <input hidden type="text" name="total_berat" value="<?= $total_berat; ?>">
                                                    <button type="submit" class="btn btn-primary btn-sm">Selesai dan lanjut mengisi alamat pengiriman</button>
                                                    </form>
                                                </div>
                                            </div> <br>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<?php  foreach($keranjang as $k){ 
    $tot_harga=0; ?>
<div class="modal fade" id="modal<?=$k->id_detail_transaksi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Produk Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url('legalisir/editProdukKeranjang/'); ?>" method="post">
        <div class="form-group">
            <label>Nama Produk</label>
            <input hidden type="text" name="id_detail_transaksi" class="form-control" value="<?= $k->id_detail_transaksi;?>">
            <input hidden type="text" name="id_produk" class="form-control" value="<?= $k->id_produk;?>">
            <input hidden type="text" name="id_transaksi" class="form-control" value="<?= $k->id_transaksi;?>">
            <input hidden type="text" name="berat_produk" class="form-control" value="<?= $k->berat_produk;?>">
            <input hidden type="text" name="harga_produk" class="form-control" value="<?= $k->harga_produk;?>">
            <input disabled type="nama_produk" class="form-control" value="<?= $k->nama_produk;?>">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <select required  name="jumlah_produk" id="feInputState" class="">
                <option value="5" <?php echo ($k->jumlah_produk=='5')?'selected="selected"':''; ?>>5</option>
                <option value="10" <?php echo ($k->jumlah_produk=='10')?'selected="selected"':''; ?>>10</option>
                <option value="15" <?php echo ($k->jumlah_produk=='15')?'selected="selected"':''; ?>>15</option>
                <option value="20" <?php echo ($k->jumlah_produk=='20')?'selected="selected"':''; ?>>20</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Ubah Pesanan</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php } ?>