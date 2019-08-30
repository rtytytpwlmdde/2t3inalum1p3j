<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lowongan Pekerjaan</h1>
            <div class="timeline-manage">
                <a href="<?php echo site_url('alumni/dashboard/'); ?>" class="btn btn-light btn-sm ">
                    <i class='bx bx-info-circle' ></i>Info FEB
                </a>
                <a href="<?php echo site_url('alumni/dashboard/lowker'); ?>" class="btn btn-light btn-sm active">
                    <i class='bx bxs-briefcase' ></i>Lowongan Kerja
                </a>
            </div>
          </div>
          
          <?php 
foreach ($lowongankerja as $u){ 
?>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="card  mb-2">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo site_url('alumni/lowker/detail_lowker/'.$u->id_lowongan); ?>"><?php echo $u->nama_lowongan ?></a></h6>
                
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class=""> 
                    <span><?php echo $u->nama_perusahaan ?>   </span><br>
                    <span class="px-4 text-muted"><i class="fas fa-map-marker-alt"></i> <?php echo $u->alamat_perusahaan ?></span><br>
                    <span class="text-muted"><?php echo $u->lowongan_jabatan ?> </span>
                </div>
                <div class="text-left small pt-2">
                    <span class="mr-2 ">
                        <img src="<?php echo base_url(); ?>/assets/images/users/guest.jpg" alt="Online user" style="width:17px;" class="mr-2 py-1 post-user-image"><?php echo $u->username ?>
                    </span>
                </div>
                </div>
            </div>
            </div>
        </div>
<?php } ?>