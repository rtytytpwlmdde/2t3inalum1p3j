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
            <h1 class="h3 mb-0 text-gray-800">Pesanan Saya </h1>
            <div class="timeline-manage">
                <a href="<?php echo site_url('legalisir/legalisir/pesananSaya/'); ?>" class="btn btn-light btn-sm  ">
                    <i class='bx bx-money'></i>Semua Pesanan Saya
                </a>
                <a href="<?php echo site_url('legalisir/legalisir/keranjang/'); ?>" class="btn btn-light btn-sm ">
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
                                            <td title="Transaksi belum complete, silahkan selesaikan pemesanan dan lakukan validasi pembayaran"><a href="<?php echo base_url('legalisir/legalisir/detailPesanan/'.$u->id_transaksi )?>"><?= $u->id_transaksi; ?><i class='bx bxs-error-circle text-warning' style="font-size:2em;"></i></a></td>
                                            <?php }else{?>
                                            <td><a href="<?php echo base_url('legalisir/legalisir/detailPesanan/'.$u->id_transaksi )?>"><?= $u->id_transaksi; ?></a></td>
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
                </div>
              </div>
            </div>
        </div>
</div>


