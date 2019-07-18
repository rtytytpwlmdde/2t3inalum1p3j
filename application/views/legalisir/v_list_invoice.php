<?php
        $notif = $this->session->flashdata('gagal');
        $operator = $this->session->userdata('status');
        if($notif != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Gagal!</strong> '.$notif.'
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
                                       
                                        
                                        <div class="">
                                          <a class="btn btn-sm btn-outline-primary "  href="<?php echo base_url('export/exportInvoice/' )?>" >Rekap Invoice Excel</a>
                                            
                                        </div>
                                        <div class="">
                                          <a class="btn btn-sm btn-primary"  target="_blank" href="<?php echo base_url('export/printInvoice/' )?>" >Print Invoice Transaksi</a>
                                            
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom p-2 bg-white w-shadow">
                                    <div class=" ">
                                                <div class="col-md-4">
                                                    <input id="myInput" type="text" class="form-control py-2" placeholder="Search.." >
                                                </div>
                                        <div class="content">
                                            <div class="col-md-12">
                                                <div class="panel-heading py-2">
                                                </div>
                                                <div class="panel-body" >
                                                <div class="table-responsive">
                                                    <table class="table table-bordered " style="width:100%" id="myTable">
                                                        <thead>
                                                            <tr class="text-center">
                                                            <th scope="col">#</th>
                                                            <th scope="col">Pilih</th>
                                                            <th scope="col">ID Transaksi</th>
                                                            <th scope="col">Alumni</th>
                                                            <th scope="col">Tanggal Transaksi</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Total Pembayaran</th>
                                                            <th scope="col">Jumlah Transfer</th>
                                                            <th scope="col">Tanggal Transfer</th>
                                                            <th scope="col">Jam Transfer</th>
                                                            <th scope="col">Bank</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if($data_transaksi =="ada"){ ?>
                                                            <?php 		
                                                            $no = 1;	
                                                            foreach ($transaksi as $u){ 
                                                                $result = 0;
                                                                if($data_invoice =="ada"){
                                                                    foreach ($invoice as $i){ 
                                                                        if($u->id_transaksi == $i->id_transaksi){
                                                                            $result = 1;
                                                                        }
                                                                    }
                                                                }
                                                                $date=date_create($u->tanggal_transaksi);
                                                                $tanggal_transfer=date_create($u->tanggal_transfer);
                                                                ?>
                                                                <tr <?php if($result == 1){?>style="background-color: rgba(50, 115, 220, 0.3);"  <?php } ?> >
                                                                    <td scope="row"><?= $no++; ?></td>
                                                                    <td class="text-center">
                                                                    <?php if($result == 1){?>
                                                                        <form action="<?php echo base_url('export/hapusInvoice/' )?>" method="post">
                                                                            <input type="hidden" name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                                                                            <button type="submit" class="btn btn-outline-danger" title="pilih transaksi ini untuk di cetak"><i class='bx bx-trash' ></i></button>
                                                                        </form>
                                                                    <?php }else{ ?>
                                                                        <form action="<?php echo base_url('export/tambahInvoice/' )?>" method="post">
                                                                            <input type="hidden" name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                                                                            <button type="submit" class="btn btn-outline-primary" title="pilih transaksi ini untuk di cetak"><i class='bx bx-plus-circle' ></i></button>
                                                                        </form>
                                                                    <?php } ?>
                                                                    </td>
                                                                    <td class="text-center"><?= $u->id_transaksi; ?></td>
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
                                                                
                                                                </tr>
                                                            <?php } ?>
                                                        <?php }else{ ?>
                                                        <td>Tidak ada data</td>
                                                        <?php }?>


                                                            
                                                        </tbody>
                                                    </table></div>
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
<!-- -->


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

<div class="modal fade" id="modalExport" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Filter Data Yang Akan Di Export</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?php echo base_url('export/listInvoice/'); ?>" method="post">
        <div class="modal-body">
            <div class="" >
            <label for="from_city">Jenis Export </label>
            <a id="show" onclick="myFunctionShow()" class="btn btn-sm btn-secondary">Filter Tanggal</a>
            <a id="hide" onclick="myFunctionHide()" class="btn btn-sm btn-secondary">Semua</a>
            </div>
            <p id="demo">Export Data Transaksi Sesuai Tanggal</p>
            <p id="semua" class="text-danger"></p>

        <div class="form-group form-export " >
            <label for="from_province">Tanggal mulai </label>
            <input type="date" name="tanggal_mulai" class="form-control">
            <label for="from_province">Tanggal Selesai </label>
            <input type="date" name="tanggal_selesai" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Export Data</button>
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

<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $(".form-export").hide();
    $("#demo").hide();
  });
  $("#show").click(function(){
    $(".form-export").show();
    $("#demo").hide();
  });
});
</script>
<script>
function myFunctionHide() {
  document.getElementById("demo").innerHTML = "Export Semua Data Transaksi!";
  document.getElementById("semua").innerHTML = "Export Semua Data Transaksi!";
}
function myFunctionShow() {
  document.getElementById("demo").innerHTML = "Export Data Transaksi Berdasarkan Tanggal!";
  document.getElementById("semua").innerHTML = "Export Data Transaksi Berdasarkan Tanggal!";
}
</script>


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

