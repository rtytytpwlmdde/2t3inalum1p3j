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
<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran </h1>
            <div class="timeline-manage">
                <a href="<?php echo site_url('legalisir/legalisir/pesananSaya/'); ?>" class="btn btn-light btn-sm  ">
                    <i class='bx bx-money'></i>Semua Pesanan Saya
                </a>
                <a href="<?php echo site_url('legalisir/legalisir/keranjang/'); ?>" class="btn btn-light btn-sm ">
                    <i class='bx bx-info-circle' ></i>Pesanan Tertunda
                </a>
            </div>
          </div>
          
          <div class="row mb-2 ">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 bg-abu-abu">
              <div class=" h-100 ">
                <div class="py-2">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                        <p class="text-dark">Silahkan transfer ke nomor rekening berikut sesuai dengan nominal yang harus dibayar pada detail pesanan.</p>
                        <div class="settings-form">
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <img class="" width="150" height="50" src="<?php echo base_url(); ?>/assets/images/icons/mandiri.png" alt="Paymant image">
                                    
                                    <div class="align-items-center py-4">
                                        <h3 class="text-dark">411111******1111</h3>
                                        <span class="text-dark">A.N Sueddi Sihotang</span>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
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

        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class=" h-100 ">
                <div class="">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
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
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-12 text-right">
            <form action="<?php echo base_url('legalisir/legalisir/formValidasiPembayaran/'); ?>" method="post">
                <input hidden type="text" name="id_transaksi" value="<?= $id_transaksi; ?>">
                <input hidden type="text" name="total_pembayaran" value="<?= $total_pembayaran; ?>">
                <button type="submit" class="btn btn-primary btn-sm">Validasi Pembayaran</button>
            </form>
        </div>
</div>


