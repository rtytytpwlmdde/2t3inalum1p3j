<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Info FEB UB</h1>
            <div class="timeline-manage">
                <a href="<?php echo site_url('alumni/dashboard/'); ?>" class="btn btn-light btn-sm tmo-buttons active">
                    <i class='bx bx-info-circle' ></i>Info FEB
                </a>
                <a href="<?php echo site_url('alumni/dashboard/lowker'); ?>" class="btn btn-light btn-sm tmo-buttons ">
                    <i class='bx bxs-briefcase' ></i>Lowongan Kerja
                </a>
            </div>
          </div>
          
          <?php 
foreach ($info_feb as $u){ 
?>
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-primary  h-100 ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                        <span class="text-muted"><?php echo $u->keterangan ?> </span><br>
                        <span class="text-muted" style="font-size:14px;"><a target="_blank"  href="<?php echo $u->link?>">Baca Selengkapnya</a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            

          

        </div>
<?php } ?>