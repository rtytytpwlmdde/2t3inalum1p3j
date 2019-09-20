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
            <h1 class="h3 mb-0 text-gray-800">Upload Dokumen</h1>
            <div hidden class="timeline-manage">
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
              <div class="card border-left-info  h-100 ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
										<form action="<?php echo base_url('leges/upload/uploadIjazah/'); ?>" method="post" enctype="multipart/form-data">
                            <div class="row profile-rows">
                            <div class="col-md-8">
                                <div class="row no-gutters align-items-center">
                                    <div class="col">
                                        <div class="text-xs font-weight-bold" style="font-size: 0.9em;">
                                            
												<label for="weight">Pilih Dokumen Ijazah</label> <br>
												<input type="file" class="form- upload-file" name="dokumen" >
                                        </div>
                                    </div>
                                </div>
                                <?php if($nim == null){
                                  $nims = $this->session->userdata('id_login');
                                  }else{
                                    $nims = $nim;
                                  }?>
                            </div> <?= $this->session->userdata('id_login')?>
                            <div class="col-md-4">
                                <div class="text-center align-items-center">
                                  <input type="hidden" name="nim" value="<?= $nim; ?>">
                                    <button type="submit" class="btn btn-outline-primary btn-sm identifyingClass">Upload Dokumen Ijazah</button>
                                </div>
                            </div>
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


