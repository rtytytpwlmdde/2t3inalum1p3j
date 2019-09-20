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
                    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Lowongan</th>
            <th>Jabatan</th>
            <th>Perusahaan</th>
            <th>Website</th>
            <th>Alamat</th>
          </tr>
        </thead>
        <tbody>
        <?php 
                    $no = 1;
                    foreach ($lowongankerja as $u){ 
                    ?>
         
            <td><?php echo $no++;?></td>
          <td>
          <a href="<?php echo site_url('operator_fakultas/lowker/detail_lowker/'.$u->id_lowongan); ?>">
          <?php echo $u->nama_lowongan?>
					</a></td>
          <td><?php echo $u->lowongan_jabatan?></td>
          <td><?php echo $u->nama_perusahaan?></td>
          <td><?php echo $u->website_perusahaan?></td>  
          <td><?php echo $u->alamat_perusahaan?></td>
          </tr>
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

