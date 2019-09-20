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
            <h1 class="h3 mb-0 text-gray-800">Data Lowongan Kerja </h1>
            <div class="timeline-manage">
           
            </div>
          </div>
          


        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class=" h-100 ">
                <div class="">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php foreach($lowongankerja as $u){ ?>
                    <div class="p-0" style="overflow-x:auto;">
                        <div class="card">
                            <div class="card-header text-sm-center">
                                <strong class="text-sm-center"><?php echo $u->nama_lowongan ?></strong>
                            </div>
                            <div class="card-body">
							
                                <div class="mx-auto d-block">
                                     <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->lowongan_jabatan ?></h5>
									 <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->nama_perusahaan ?></h5>
									 <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->website_perusahaan ?></h5>
                                    <div class="location text-sm-left"><i class="fa fa-map-marker"></i> <?php echo $u->alamat_perusahaan ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php } ?><br>
                        <div class="card">
                    <div class="card-header text-sm-center">
                    <strong class="text-sm-center">Deskripsi</strong>
                    </div>
                        <div style="min-width: 300px">
                    <div class="row">
                        <div class="col ">
                            <?php foreach($lowongankerja as $u){ ?>
                            <div class="" style="overflow-x:auto;">
                                <div class="">
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->lowongan_jabatan ?></h5>
                                            <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->nama_perusahaan ?></h5>
                                            <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->website_perusahaan ?></h5>
                                            <div class="location text-sm-left"><i class="fa fa-map-marker"></i> <?php echo $u->alamat_perusahaan ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div><!-- .row -->
                    </div><!-- .animated -->
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
</div>

