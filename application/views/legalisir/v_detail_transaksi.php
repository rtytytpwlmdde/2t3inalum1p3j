<?php
        $notif = $this->session->flashdata('gagal');
        if($notif != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Validasi Pembayaran Tidak Berhasil! </strong> '.$notif.'
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
<div class=" "> 
        <div class="">
            <div class="row ">
                <div class="col-md-12">
                    <div class="profile-info-right">

                        <!-- Posts section -->
                        <div class="row px-4">
                            <div class="col-md-12 profile-center">
                                <br>
                                <h5 class="mb-3  page-title text-muted">TRANSAKSI</h5>
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

                                <div class=" border-bottom p-2 bg-white w-shadow">
                                    <div class=" ">
                                        <div class="content">
                                            <div class="col-md-12">
                                                <div class="panel-heading">
                                                </div>
                                                <div class="panel-body">
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
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>

