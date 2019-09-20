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
            <h1 class="h3 mb-0 text-gray-800">Dokumen</h1>
           
          </div>
          
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-primary  h-100 ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                      <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <?php 
                                $no = 1;
                                foreach ($ijazah as $u){ 
                                    $date=date_create($u->tanggal_ijazah);
                                ?>
                                <tr>
                                <th>Nomor Ijazah </th>
                                <td><?php echo $u->nomor_ijazah ?></td>
                                </tr>
                                <tr>
                                <th>Tanggal Ijazah </th>
                                    <td><?= date_format($date,"d-m-Y") ; ?></td>
                                </tr>
                                <tr>
                                <th>NIM</th>
                                    <td><?php echo $u->nim ?></td>
                                </tr>
                                <tr>
                                <th>Berkas Ijazah</th>
                                <td>
                                    
                                    <?php if($cek_ijazah == 'false'){ ?>
                                        <?php echo "Dokumen ijazah tidak tersedia"; ?>
                                        <a href="<?php echo base_url('leges/upload/'); ?>" class="btn btn-primary btn-sm">Upload Ijazah</a>
                                    <?php  }else{ ?>
                                        <a target="_blank" rel="noopener noreferrer" href="<?php echo base_url();?>pdf/<?php echo $u->dokumen_ijazah ?> " class="btn btn-link btn-sm"><i class="far fa-file-pdf"></i> File</a>
                                        <?php if($cek_validasi == 'true'){ ?>
                                            <a href="<?php echo base_url('leges/upload/'); ?>" class="btn btn-warning btn-sm" title="ganti file ijazah"><i class='bx bxs-pencil' ></i>Ganti file ijazah</a><br>
                                            <small>*ganti file ijazah jika status upload di <strong>TOLAK</strong> atau masih belum diproses</small>
                                        <?php } ?>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                <th>status upload ijazah</th>
                                <td><?php echo $u->validasi_ijazah ?></td>
                                </tr>
                                <?php if($u->validasi_ijazah == 'tolak'){ ?>
                                <tr>
                                <th>catatan penolakan upload ijazah</th>
                                <td><?php echo $u->catatan_ijazah ?></td>
                                </tr>
                                <?php } ?>
                                
                                <tr>
                                <th>Berkas Transkrip</th>
                                <td>
                                    
                                    <?php if($cek_transkrip == 'false'){ ?>
                                        <?php echo "Dokumen Transkrip tidak tersedia"; ?>
                                    <?php  }else{ ?>
                                        <a target="_blank" rel="noopener noreferrer" href="<?php echo base_url();?>pdf/<?php echo $u->dokumen_ijazah ?> " class="btn btn-link btn-sm"><i class="far fa-file-pdf"></i> File</a>
                                        <?php if($cek_validasi == 'true'){ ?>
                                            <a href="<?php echo base_url('leges/upload/'); ?>" class="btn btn-warning btn-sm" title="ganti file ijazah"><i class='bx bxs-pencil' ></i>Ganti file ijazah</a><br>
                                            <small>*ganti file ijazah jika status upload di <strong>TOLAK</strong> atau masih belum diproses</small>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                                </tr>
                                <tr>
                            </thead>
                                <?php } ?>
                        
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenterTitle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <h1 class=""><i class="fas fa-check-circle text-success"></i></h1>
                        <label for="settingsAddress" class="text-white">Nama Produk</label>
                        <h5>Pesanan telah ditambahkan ke dalam keranjang</h5>
                    </div>
                </div>
            </div>  
            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Tambahkan pesanan lagi?</button>
                    <a href="<?php echo base_url('transaksi/pesanan/'); ?>" class="btn btn-primary">Lanjut ke pembayaran</a>
                </div>
            </div>  
      </div>
    </div>
  </div>
</div>

<script>
    var notifa = document.getElementById("sukses").value;
    if( notifa == "Produk telah ditambahkan ke dalam daftar pesanan saya" ) {
        window.onpageshow = function() {
        if (typeof window.performance != "undefined"
            && window.performance.navigation.type === 0) {
            $('#myModal').modal('show');
        }
        }
    }
</script>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <div class="row text-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <h1 class=""><i class="fas fa-check-circle text-success"></i></h1>
                        <?php
        if($sukses != NULL){
            echo '
            <h5 class="" role="alert">
              <strong> </strong> '.$sukses.'
            </h5>
            ';
        }
    ?>
                    </div>
                </div>
            </div>  
            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Tambahkan pesanan lagi?</button>
                    <a href="<?php echo base_url('legalisir/keranjang/'); ?>" class="btn btn-primary">Lanjut ke pembayaran</a>
                </div>
            </div>  
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


