<?php
        $gagals = $this->session->flashdata('gagal');
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
        $suksess = $this->session->flashdata('sukses');
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
            <h1 class="h3 mb-0 text-gray-800">Detail Transaksi </h1>
            <div class="timeline-manage badge badge-secondary">
            <?php 
                                    foreach ($transaksi as $u){ ?>
                                    <?php if($u->status_pesanan == '1' ){?>
                                        <p>Transaksi belum lengkap, silahkan isi alamat pengiriman dan segera lakukan pembayaran </p>
                                    <?php }?>
                                    <?php if($u->status_pesanan == '2' ){?>
                                        <p>Transaksi belum lengkap, Segera lakukan pembayaran</p>
                                        <div class="text-right">
                                        </div>
                                    <?php }?>
                                    <?php if($u->status_pesanan == '3' ){?>
                                        <p>Transaksi sudah lengkap, Validasi pembayaran sedang diproses oleh bagian keuangan</p>
                                        <div class="text-right">
                                        </div>
                                    <?php }?>
                                    <?php if($u->status_pesanan == '4' ){?>
                                        <p>Status pembayaran dari transaksi ini sudah valid</p>
                                        <div class="text-right">
                                        </div>
                                    <?php }?>
                                    <?php if($u->status_pesanan == '5' ){?>
                                        <p>Detail pesanan sudah diterima oleh bagian recording, Pesanan sedang di proses oleh recording</p>
                                        <div class="text-right">
                                        </div>
                                    <?php }?>
                                    <?php if($u->status_pesanan == '6' ){?>
                                        <p>Pesanan sudah dikirimkan ke alamat pengiriman</p>
                                        <div class="text-right">
                                        </div>
                                    <?php }?>
                                    <?php if($u->status_pesanan == '7' ){?>
                                        <p>Pesanan sudah sampai di tujuan, dan sudah diterima oleh costumer</p>
                                        <div class="text-right">
                                        </div>
                                    <?php }?>
                                    <?php } ?>
            </div>
          </div>
          

        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class=" h-100 ">
                <div class="">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <table class="table table-bordered">
                                                        <tbody>
                                                            <?php 
                                                            foreach ($transaksi as $u){ ?>
                                                            <tr>
                                                                <td>Id transaksi</td>
                                                                <td><?= $u->id_transaksi; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alumni</td>
                                                                <td><?= $u->id_pemesan; ?></td>
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
                                                                    <td><img style="width: 50%; height: auto;" src="<?php echo base_url(); ?>/gambar/<?= $u->bukti_transfer; ?>" alt="notification user image"></td>
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


