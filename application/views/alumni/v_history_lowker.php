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
            <h1 class="h3 mb-0 text-gray-800">Lowongan Kerja </h1>
            <div class="timeline-manage">
                <a href="<?php echo base_url('alumni/lowker/inputLowker'); ?>" class="btn btn-primary btn-sm  ">
                    <i class='bx bx-money'></i>Tambah Lowongan Kerja
                </a>
            </div>
          </div>
          
          <?php foreach($lowongankerja as $u){ ?>
        <div class="row">
        <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-primary h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">
                        <a  class="text-primary " href="<?php echo site_url('admin/lowker/detail_lowker/'.$u->id_lowongan); ?>">
                        <h4 class="page-title font-weight-bold text-primary"><?php echo $u->nama_lowongan ?> </h4>
                        </a>
                        <span class="h6 text-primary"><?php echo $u->nama_perusahaan ?></span><br>
                        <span style="" class="text-dark"><?php echo $u->lowongan_jabatan ?></span><br>
                        <span class="text-dark"><?php echo $u->alamat_perusahaan ?> </span>
                      </div>
                    </div>
                    <div class="col-auto">
                    <?php if($u->status=="BelumValid"){ ?>
                      <a href="<?php echo site_url('alumni/lowker/updateLowongan/'.$u->id_lowongan); ?>"    class="btn btn-warning btn-sm  text-white"  title="Update">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="<?php echo site_url('alumni/lowker/hapusLowongan/'.$u->id_lowongan); ?>"    class="btn btn-danger btn-sm "  title="Hapus">
                        <i class="fas fa-trash"></i>
                      </a>
                    <?php }else{?>
                      <a href="<?php echo site_url('alumni/lowker/hapusLowongan/'.$u->id_lowongan); ?>"    class="btn btn-danger btn-sm "  title="Hapus">
                        <i class="fas fa-trash"></i>
                      </a>
                    <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
<?php } ?>
</div>


