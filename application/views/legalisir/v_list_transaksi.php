<?php
        $notif = $this->session->flashdata('gagal');
        $operator = $this->session->userdata('status');
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
                    <div class="">

                        <!-- Posts section -->
                        <div class="row px-4 ">
                            <div class="col-md-12 content">
                                <br>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6">
                                        <h5 class="page-title text-muted">TRANSAKSI</h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="btn-group d-flex flex-row-reverse" role="group" style="  float:right; width:50%" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-sm btn-secondary dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</a>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="<?php echo base_url('legalisir/export/excel' )?>"><i class="fas fa-file-excel"></i> Excel</a>
                                            </div>
                                        </div>
                                            <?php if($this->session->userdata('status') == 'keuangan'){ ?>
                                                <a href="<?php echo base_url('legalisir/transaksi/4' )?>" class="btn btn-sm btn-success">valid</a>
                                                <a href="<?php echo base_url('legalisir/transaksi/3' )?>" class="btn btn-sm btn-warning">belum di proses</a>
                                            <?php }else if($this->session->userdata('status') == 'recording'){ ?> 
                                                <a href="<?php echo base_url('legalisir/transaksi/4' )?>" class="btn btn-sm btn-info">belum diproses</a>
                                                <a href="<?php echo base_url('legalisir/transaksi/5' )?>" class="btn btn-sm btn-primary">sedang diproses</a>
                                                <a href="<?php echo base_url('legalisir/transaksi/6' )?>" class="btn btn-sm btn-warning">telah dikirim</a>
                                                <a href="<?php echo base_url('legalisir/transaksi/7' )?>" class="btn btn-sm btn-success">telah sampai</a>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom p-2 bg-white w-shadow">
                                    <div class=" ">
                                        <div class="content">
                                            <div class="col-md-12">
                                                <div class="panel-heading">
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-bordered table-responsive" style="width:100%" id="tabel">
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
                                                                <td><a href="<?php echo base_url('legalisir/detailTransaksi/'.$u->id_transaksi )?>"><?= $u->id_transaksi; ?></a></td>
                                                                <td><?= $u->nama; ?></td>
                                                                <td><?= date_format($date,"d-m-Y") ; ?></td>
                                                                <?php if($this->session->userdata('status') == 'keuangan'){ ?>
                                                                    <td
                                                                    <?php if($u->status_pesanan == '4' || $u->status_pesanan == '5' || $u->status_pesanan == '6' || $u->status_pesanan == '7'){ ?>
                                                                        class="text-success"> <?php echo 'valid'; 
                                                                    }else if($u->status_pesanan == '3'){ ?>
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
                                                                    <a target="_blank" rel="noopener noreferrer" href="<?php echo base_url('legalisir/buktiTransfer/'.$u->id_transaksi )?>" class="btn btn-link btn-sm"><i class='bx bxs-file-image' ></i>Gambar</a>
                                                                </td>
                                                                <?php if($this->session->userdata('status') == 'keuangan'){ ?>
                                                                    <td>
                                                                        <form action="<?php echo base_url('legalisir/verifikasiPembayaran' )?>" method="post">
                                                                            <input type="text" hidden name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                                                                            <button type="submit" class="btn btn-primary btn-sm">Validasi</button>
                                                                        </form>
                                                                    </td>
                                                                <?php } ?>
                                                                <?php if($this->session->userdata('status') == 'recording'){ ?>
                                                                    <form action="<?php echo base_url('legalisir/prosesTransaksi' )?>" method="post">
                                                                        <td>
                                                                        <?php if($u->status_pesanan == '4'){ ?>
                                                                            <input type="text" hidden name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                                                                            <input type="text" hidden name="status_pesanan" value="5">
                                                                            <button type="submit" class="btn btn-primary btn-sm">Klik jika transaksi sudah diterima dan sedang di proses</button>
                                                                        <?php }else if($u->status_pesanan == '5'){ ?>
                                                                            <a  class="btn btn-sm btn-warning open-AddBookDialog" data-toggle="modal"  data-target="#exampleModal" data-id_transaksi="<?= $u->id_transaksi; ?>" 
                                                                                >Klik jika pesanan telah dikirimkan</a>

                                                                        <?php } else if($u->status_pesanan == '6'){ ?>
                                                                            <input type="text" hidden name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                                                                            <input type="text" hidden name="status_pesanan" value="7">
                                                                            <button type="submit" class="btn btn-success btn-sm">Klik jika pesanan telah sampai</button>
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
    <form action="<?php echo base_url('legalisir/prosesTransaksi/'); ?>" method="post">
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

$(document).ready(function() {
    $('#tabel').DataTable();
} );
</script>

