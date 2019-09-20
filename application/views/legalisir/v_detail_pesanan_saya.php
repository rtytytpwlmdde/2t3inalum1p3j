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
            <h1 class="h3 mb-0 text-gray-800">Detail Pesanan </h1>
            
            <div class="timeline-manage">
                <a href="<?php echo site_url('legalisir/pesananSaya/'); ?>" class="btn btn-light btn-sm  ">
                    <i class='bx bx-money'></i>Semua Pesanan Saya
                </a>
                <a href="<?php echo site_url('legalisir/keranjang/'); ?>" class="btn btn-light btn-sm ">
                    <i class='bx bx-info-circle' ></i>Pesanan Tertunda
                </a>
            </div>
          </div>
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
                                                                            <a href="<?php echo base_url('legalisir/pembayaran/'.$u->id_transaksi); ?>" class="btn btn-primary btn-sm">Pembayaran</a>
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
                                                                    <?php if($u->status_pesanan == '7' ){?>
                                                                        <p>Pesanan sudah diterima</p>
                                                                    <?php }?>
                                                                    <?php if($u->status_pesanan == '6' || $u->status_pesanan == '7'){?>
                                                                        <div class="text-right">
                                                                            <form action="<?php echo base_url('resi'); ?>" method="post">
                                                                                <input type="text" hidden name="nomor_resi" value="<?= $u->nomor_resi; ?>">
                                                                                <button type="submit" class="btn btn-primary btn-sm">Lacak Pesanan</button>
                                                                            </form>
                                                                        </div>
                                                                    <?php }?>
                                                                    <?php } ?>
          
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class=" h-100 ">
                <div class="">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" no-gutters align-items-center">
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
                </div>
              </div>
            </div>
        </div>
</div>


