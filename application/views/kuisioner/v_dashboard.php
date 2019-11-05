<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 py-2">
            <h1 class="h3 mb-0 text-gray-800">Dasboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kuisioner</div> <?php $total_kuisioner =0; ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($jumlahKuisioner as $u){ echo $total_kuisioner = $u->jumKuisioner; }?></div>
                    </div>
                    <div class="col-auto" hidden>
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
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
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Responden</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($jumlahResponden as $u){ echo $u->jumResponden; }?></div>
                    </div>
                    <div class="col-auto" hidden>
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Alumni</div><?php $totalAlumni = 0;?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($jumlahAlumni as $u){ echo $totalAlumni = $u->jumAlumni; }?></div>
                    </div>
                    <div class="col-auto" hidden>
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
<!-- Content Row -->
          <div class="row">

          <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Kuisoner</h6>
                </div>
                <div class="card-body">
                <?php $a = 0; $no=0; $data[] = null; $nama_kuisioner[] = null; $b = null; $c=0; $totResponden[] = 0;
                foreach($kuisioner as $u){
                  $a = 0;
                  $c = 0;
                  $nama_kuisioner[$no] = $u->nama_kuisioner;
                  foreach($jumlahRespondenKuisioner as $j){
                       if($u->id_kuisioner == $j->id_kuisioner){
                          $a = 1;
                          $c++;
                       }
                    }
                    if($a == 1){
                      $data[$no] = $b;
                      $totResponden[$no] = $c;
                    }else{
                      $data[$no] = 0;
                      $totResponden[$no] = 0;
                    }
                    $no++; ?>
                  <?php } ?>
                  <?php for($i=0; $i<$total_kuisioner; $i++){?>
                  <?php $persen = $totResponden[$i] / $totalAlumni * 100?>
                    <h4 class="small font-weight-bold" title="Persentase jumlah alumni yang telah mengisi kuisioner <?= $nama_kuisioner[$i]?>"
                    ><?= $nama_kuisioner[$i];?> 
                    <span class="float-right"><?= number_format($persen);?>%</span></h4>
                    
                    <div class="progress mb-4">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $persen?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> 
                   <?php }?>
                </div>
              </div>

              <!-- Color System -->
             
            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tracer Study FEB UB</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url(); ?>/assets/admin/img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Sistem yang dibangun untuk melakukan tracer terhadap alumni FEB UB. <a target="_blank" rel="nofollow" href="https://undraw.co/">Panduan</a>, sistem dapat di unduh untuk mengetahui cara penggunaan sistem</p>
                </div>
              </div>

              <!-- Approach -->
             

            </div>
          </div>
          
        </div>

       



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
    ['jamur kripspi', 3],
    ['Onions', 1],
    ['Olives', 1],
    ['Zucchini', 1],
    ['Pepperoni', 2]
  ]);

  // Set chart options
  var options = {'title':'How Much Pizza I Ate Last Night',
                 'width':400,
                 'height':300};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
</script>