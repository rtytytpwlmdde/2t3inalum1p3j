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
                                <h5 class="mb-3  page-title text-muted">TRANSAKSI
                                </h5>
                                <div class=" border-bottom p-2 bg-white w-shadow">
                                    <div class=" ">
                                        <div class="content">
                                            <div class="col-md-12">
                                                <div class="panel-heading">
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr class="text-center">
                                                            <th scope="col">#</th>
                                                            <th scope="col">ID Transaksi</th>
                                                            <th scope="col">Costumer</th>
                                                            <th scope="col">Tanggal Transaksi</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Total Pembayaran</th>
                                                            <th scope="col">Jumlah Transfer</th>
                                                            <th scope="col">Tanggal Transfer</th>
                                                            <th scope="col">Jam Transfer</th>
                                                            <th scope="col">Bank</th>
                                                            <th scope="col">Bukti Transfer</th>
                                                            <th scope="col">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if($data_transaksi =="ada"){ ?>
                                                            <?php 
                                                            $no = 1;
                                                            foreach ($transaksi as $u){ 
                                                                $date=date_create($u->tanggal_transaksi);
                                                                $tanggal_transfer=date_create($u->tanggal_transfer);
                                                                ?>
                                                            <tr >
                                                                <td scope="row"><?= $no++; ?></td>
                                                                <td><a href="<?php echo base_url('keuangan/detailTransaksi/'.$u->id_transaksi )?>"><?= $u->id_transaksi; ?></a></td>
                                                                <td><?= $u->nama; ?></td>
                                                                <td><?= date_format($date,"d-m-Y") ; ?></td>
                                                                <?php if($this->session->userdata('status') == 'keuangan'){ ?>
                                                                    <td
                                                                    <?php if($u->status_pesanan == '4'){ ?>
                                                                        class="text-success"> <?php echo 'valid'; 
                                                                    }else{ ?>
                                                                        class="text-warning"> <?php echo 'pembayaran belum divalidasi oleh keuangan'; 
                                                                        } ?>
                                                                    </td>
                                                                <?php } ?>
                                                                <?php if($this->session->userdata('status') == 'recording'){ ?>
                                                                    <td
                                                                    <?php if($u->status_pesanan == '4'){ ?>
                                                                        class="text-dark"> <?php echo 'belum di proses oleh recording'; 
                                                                    }else if($u->status_pesanan == '5'){ ?>
                                                                        class="text-parimary"> <?php echo 'Pesanan sedang di proses'; 
                                                                    } else if($u->status_pesanan == '6'){ ?>
                                                                        class="text-warning"> <?php echo 'Pesanan telah dikirim'; 
                                                                    } else if($u->status_pesanan == '7'){ ?>
                                                                        class="text-success"> <?php echo 'Pesanan telah sampai di tujuan'; 
                                                                    } ?>
                                                                    </td>
                                                                <?php } ?>
                                                                <td><?= $u->total_pembayaran; ?></td>
                                                                <td><?= $u->jumlah_transfer; ?></td>
                                                                <td><?=  date_format($tanggal_transfer,"d-m-Y") ; ?></td>
                                                                <td><?= $u->jam_transfer; ?></td>
                                                                <td><?= $u->bank; ?></td>
                                                                <td>
                                                                    <a target="_blank" rel="noopener noreferrer" href="<?php echo base_url('keuangan/buktiTransfer/'.$u->id_transaksi )?>" class="btn btn-link btn-sm"><i class='bx bxs-file-image' ></i>Gambar</a>
                                                                </td>
                                                                <?php if($this->session->userdata('status') == 'keuangan'){ ?>
                                                                    <td>
                                                                        <form action="<?php echo base_url('keuangan/validasiPembayaran' )?>" method="post">
                                                                            <input type="text" hidden name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                                                                            <button type="submit" class="btn btn-primary btn-sm">Validasi</button>
                                                                        </form>
                                                                    </td>
                                                                <?php } ?>
                                                                <?php if($this->session->userdata('status') == 'recording'){ ?>
                                                                    <form action="<?php echo base_url('recording/prosesTransaksi' )?>" method="post">
                                                                        <td>
                                                                        <?php if($u->status_pesanan == '4'){ ?>
                                                                            <input type="text" hidden name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                                                                            <input type="text" hidden name="status_pesanan" value="5">
                                                                            <button type="submit" class="btn btn-primary btn-sm">Transaksi sudah diterima dan sedang di proses</button>
                                                                        <?php }else if($u->status_pesanan == '5'){ ?>
                                                                            <a  class="btn btn-warning open-AddBookDialog" data-toggle="modal"  data-target="#exampleModal" data-id_transaksi="<?= $u->id_transaksi; ?>" 
                                                                                >Pesanan telah dikirim</a>

                                                                        <?php } else if($u->status_pesanan == '6'){ ?>
                                                                            <input type="text" hidden name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                                                                            <input type="text" hidden name="status_pesanan" value="7">
                                                                            <button type="submit" class="btn btn-success btn-sm">Pesanan telah sampai</button>
                                                                        <?php } else if($u->status_pesanan == '7'){ ?>
                                                                        
                                                                        <?php } ?>
                                                                        </td>
                                                                    </form>
                                                                <?php } ?>
                                                            </tr>
                                                            <?php } ?>
                                                        <?php }else{ ?>
                                                        <td>Tidak ada data</td>
                                                        <?php }?>


                                                            
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Masukkan Nomor Resi Pengiriman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?php echo base_url('recording/prosesTransaksi/'); ?>" method="post">
      <div class="modal-asd">
        <input type="hidden" class="id_transaksi_modal" name="id_transaksi" id="id_transaksi" value="">
      </div>
      <div class="modal-body">
        <input type="text" hidden name="status_pesanan" value="6">
        <input type="text" class="form-control" name="nomor_resi" id="nomor_resi">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
  let id_transaksi = $(event.relatedTarget).data('id_transaksi') 
  $(this).find('.modal-asd input').val(id_transaksi)
})
</script>

