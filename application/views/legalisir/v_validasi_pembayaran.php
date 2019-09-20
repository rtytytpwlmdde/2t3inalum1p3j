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
<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Validasi Pembayaran </h1>
            <div class="timeline-manage">
                <a href="<?php echo site_url('legalisir/pesananSaya/'); ?>" class="btn btn-light btn-sm  ">
                    <i class='bx bx-money'></i>Semua Pesanan Saya
                </a>
                <a href="<?php echo site_url('legalisir/keranjang/'); ?>" class="btn btn-light btn-sm ">
                    <i class='bx bx-info-circle' ></i>Pesanan Tertunda
                </a>
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
              </div>
            </div>
        </div>
</div>


