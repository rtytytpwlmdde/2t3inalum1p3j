<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 py-2">
            <div>
              <h1 class="h3 mb-0 text-gray-800">Report</h1>
              <h1 class="h5 mb-0 text-gray-800"><?= str_replace("%20"," ",$nama_pertanyaan);?></h1>
            </div>
            <a href="<?php echo site_url('report/exportReport/'.$id_pertanyaan); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

      

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Responden</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                      $x3=0;
                      $x4=0;
                      $x5=0;
                      $x6=0;
                      $a = 1; $b = null; $c=null; 
                      foreach($jumlahResponden as $u){
                        $a++;
                      }echo $a;
                      ?>
                      </div>
                    </div>
                    <div class="col-auto" hidden>
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            </div>
          </div>

          <!-- Content Row -->
<!-- Content Row -->

          <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow mb-2">
                <div class="card-header py-2">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $nama_pertanyaan;?></h6>
                </div>
                <div class="card-body">
                  <div class="text-center table-responsive">
                    <table class="table table-sm table-bordered">
                      <thead>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Tanggapan</th>
                      </thead>
                      <tbody>
                      <?php foreach($kuisioner as $u){
                        $noTanggapan++;
                        if($noTanggapan == 6){
                          break;
                        }?>
                        <tr>
                          <td><?= $u->nim?></td>
                          <td><?= $u->nama?></td>
                          <td><?= $u->tanggapan?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Lihat Semua Tanggapan Pertanyaan Ini &rarr;</a>
                </div>
              </div>
            </div>
          </div>


         

  </div>
