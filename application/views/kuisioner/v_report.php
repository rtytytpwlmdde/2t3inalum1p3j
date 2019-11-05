<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 py-2">
            <div>
              <h1 class="h3 mb-0 text-gray-800">Report</h1>
              <h1 class="h5 mb-0 text-gray-800"><?= str_replace("%20"," ",$nama_kuisioner);?></h1>
            </div>
            <a href="<?php echo site_url('report/exportReport/'.$id_kuisioner); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

           

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pertanyaan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($jumlahPertanyaan as $u){ echo $u->jumPertanyaan; }?></div>
                    </div>
                    <div class="col-auto" hidden>
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

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

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Persentase</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" title="persentase jumlah alumni yang telah mengisi kuisioner ini">
                        <?php foreach($jumlahAlumni as $u){ $totAlumni =  $u->jumAlumni; } $persen = $a/$totAlumni;
                        echo ($persen*100)."%";?> 
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

        <?php foreach($kuisioner as $a){
          $noTanggapan = 0;?>
          <?php if($a->jenis_pertanyaan == '1'){?>
          <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow mb-2">
                <div class="card-header py-2">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $a->nama_pertanyaan;?></h6>
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
                      <?php foreach($tanggapan1 as $u){
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
                  <a href="<?php echo base_url('kuisioner/detailTanggapan/'.$a->id_pertanyaan.'/'.$a->nama_pertanyaan);?>">Lihat Semua Tanggapan Pertanyaan Ini &rarr;</a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>

          <?php if($a->jenis_pertanyaan == '2'){
          $noTanggapan = 0;?>
          <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow mb-2">
                <div class="card-header py-2">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $a->nama_pertanyaan;?></h6>
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
                      <?php foreach($tanggapan2 as $u){
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
                  <a href="<?php echo base_url('kuisioner/detailTanggapan/'.$a->id_pertanyaan.'/'.$a->nama_pertanyaan);?>">Lihat Semua Tanggapan Pertanyaan Ini &rarr;</a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>

          <?php if($a->jenis_pertanyaan == '3'){
            $noTanggapan =0;
            $x4++;
            ?>
          <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow mb-2">
                <div class="card-header py-2">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $a->nama_pertanyaan;?></h6>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6 mb-2">
                      <div class="text-center">
                        <div style="margin-left:15%;" id="chart_div3<?=$a->id_pertanyaan?>"></div>
                      </div>
                      
                    </div>
                    
                    <div class="col-lg-6 mb-2 bg-card card">
                      <div class="text-center table-responsive py-2">
                        <table class="table table-sm table-bordered">
                          <thead>
                            <tr>
                              <th>Tanggapan</th>
                              <th>Jumlah</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($rekapTanggapan as $u){ 
                              if($a->id_pertanyaan == $u->id_pertanyaan){?>
                              <tr>
                              <td><?= $u->tanggapan?></td>
                              <td><?= $u->jumResponden?></td>
                              </tr>
                              <?php }?>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>
                      <a href="<?php echo base_url('kuisioner/detailTanggapan/'.$a->id_pertanyaan.'/'.$a->nama_pertanyaan);?>">Lihat Semua Tanggapan Pertanyaan Ini &rarr;</a>
                      <div id="chart_div"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>

          <?php if($a->jenis_pertanyaan == '4'){
            $noTanggapan =0;
            $x4++;
            ?>
          <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow mb-2">
                <div class="card-header py-2">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $a->nama_pertanyaan;?></h6>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6 mb-2">
                      <div class="text-center">
                        <div style="margin-left:15%;" id="chart_div4<?=$a->id_pertanyaan?>"></div>
                      </div>
                      
                    </div>
                    
                    <div class="col-lg-6 mb-2 bg-card card">
                      <div class="text-center table-responsive py-2">
                        <table class="table table-sm table-bordered" style="font-size:13px;">
                          <thead>
                            <tr>
                              <th>Tanggapan</th>
                              <th>Jumlah</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($rekapTanggapan as $u){ 
                              if($a->id_pertanyaan == $u->id_pertanyaan){?>
                              <tr>
                              <td><?= $u->tanggapan?></td>
                              <td><?= $u->jumResponden?></td>
                              </tr>
                              <?php }?>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>
                      <a href="<?php echo base_url('kuisioner/detailTanggapan/'.$a->id_pertanyaan.'/'.$a->nama_pertanyaan);?>">Lihat Semua Tanggapan Pertanyaan Ini &rarr;</a>
                      <div id="chart_div"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>

          <?php if($a->jenis_pertanyaan == '5'){
            $noTanggapan =0;
            $x5++;
            ?>
          <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow mb-2">
                <div class="card-header py-2">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $a->nama_pertanyaan;?></h6>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6 mb-2">
                      <div class="text-center">
                        <div style="margin-left:15%;" id="chart_div5<?=$a->id_pertanyaan?>"></div>
                      </div>
                    </div>
                    
                    <div class="col-lg-6 mb-2 bg-card card">
                      <div class="text-center table-responsive py-2">
                        <table class="table table-sm table-bordered" style="font-size:13px;">
                          <thead>
                            <tr>
                              <th>Tanggapan</th>
                              <th>Jumlah</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($rekapTanggapan as $u){ 
                              if($a->id_pertanyaan == $u->id_pertanyaan){?>
                              <tr>
                              <td><?= $u->tanggapan?></td>
                              <td><?= $u->jumResponden?></td>
                              </tr>
                              <?php }?>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>
                      <a href="<?php echo base_url('kuisioner/detailTanggapan/'.$a->id_pertanyaan.'/'.$a->nama_pertanyaan);?>">Lihat Semua Tanggapan Pertanyaan Ini &rarr;</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>

         
        
        <?php } ?>

  </div>



  <?php foreach($kuisioner as $s){ ?>
      <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Topping');
          data.addColumn('number', 'Slices');
          data.addRows([
            
          <?php foreach($rekapTanggapan as $u){ 
            if($s->id_pertanyaan == $u->id_pertanyaan){?>
              ['<?= $u->tanggapan?>', <?= $u->jumResponden?>],
            <?php } ?>
          <?php } ?>
          ]);

          // Set chart options
          var options = {'title':'Grafik',
                        'width':400,
                        'height':300,
                        };

          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.PieChart(document.getElementById('chart_div<?= $s->jenis_pertanyaan?><?= $s->id_pertanyaan;?>'));
          chart.draw(data, options);
        }
        </script>
      <?php } ?>
  
       



