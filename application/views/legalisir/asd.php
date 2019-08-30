<?php
        $notif = $this->session->flashdata('gagal');
        $operator = $this->session->userdata('status');
        if($notif != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Gagal!</strong> '.$notif.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
        $notifsukses = $this->session->flashdata('sukses');
        if($notifsukses != NULL){
            echo '
            <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
              <strong>Sukses! </strong> '.$notifsukses.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
    ?>
<div class=" "> 
        <div class="">
            <div class="row ">
                <div class="col-md-12">
                    <div class="">

                        <!-- Posts section -->
                        <div class="row px-4 ">
                            <div class="col-md-12 content">
                                <br>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6">
                                        <h5 class="page-title text-muted">Dashboard</h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="btn-group d-flex flex-row-reverse" role="group" style="  float:right; width:50%" aria-label="Button group with nested dropdown">
                                        <form class="form-inline" action="<?php  echo base_url('legalisir/legalisir/dashboard'); ?>" method="get">
                                            <div class="form-group">
                                                <input type="text" required name="tahun" class="form-control" placeholder="<?php echo $tahun; ?>">
                                                <button type="submit" class="btn btn-light"><i class="fas fa-search"></i></button>
                                            </div>
                                        </form>
                                        
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom p-2 ">
                                    <div class="row">
                                        <div class="col-md-9 ">
                                            <div class=" bg-white w-shadow p-2" >
                                            <h6 class="text-muted">Grafik Jumlah Transaksi</h6>
                                                <div class="ct-chart-transaksi " id="chartTransaksiRecording"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3  ">
                                            <div class=" bg-white w-shadow p-2" >
                                            <h6 class="text-muted">Detail Jumlah Transaksi</h6>
                                                <table class="table table-sm table-bordered">
                                                    <tr>
                                                        <td>Bulan</td>
                                                        <td>Jumlah Transaksi</td>
                                                    </tr>
                                                        <?php 
                                                        for($i=1; $i<13; $i++){
                                                            $result = 0;
                                                        foreach($transaksiPerbulan as $u){
                                                            if($i == $u->bulan){ 
                                                                $result = $u->transaksiPerbulan;
                                                            }
                                                        }
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $i;?></td>
                                                                <td><?php  if($result == 0){
                                                            echo "0";
                                                        }else{
                                                            echo $result."";
                                                        }?></td>
                                                            </tr>
                                                        <?php 
                                                        } ?>
                                                
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
<!-- -->


<script>
$(function() {
    new Chartist.Bar('.ct-chart-transaksi', {
        labels: ['Jan', 'Feb', 'Mar', 'Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        series: [
            [
              //semua peminjaman
              <?php
                for($i=1; $i<13; $i++){
                  $result = 0;
                  foreach($transaksiPerbulan as $u){
                      if($i == $u->bulan){ 
                          $result = $u->transaksiPerbulan;
                      }
                  } 
                  if($result == 0){
                      echo "0,";
                  }else{
                      echo $result.",";
                  }
                }
              ?>
            ]
        ]
    }, {
    // Default mobile configuration
    stackBars: true,
    responsive: true,
    height: "446px",
    axisX: {
        labelInterpolationFnc: function(value) {
        return value.split(/\s+/).map(function(word) {
            return word[0];
        }).join('');
        }
    },
    axisY: {
        offset: 5
    },chartPadding: {
      left: 2,
      right: 10,
      top: 10,
      bottom: 15
    }, 
    }, [
    // Options override for media > 400px
    ['screen and (min-width: 400px)', {
        reverseData: true,
        horizontalBars: true,
        axisX: {
        labelInterpolationFnc: Chartist.noop
        },
        axisY: {
        offset: 40
        }
    }],
    // Options override for media > 800px
    ['screen and (min-width: 800px)', {
        stackBars: false,
        seriesBarDistance: 10
    }],
    // Options override for media > 1000px
    ['screen and (min-width: 1000px)', {
        reverseData: false,
        horizontalBars: false,
        seriesBarDistance: 15
    }]
    ]);


new Chartist.Bar('#chartTransaksiRecording', data, options, responsiveOptions);
});
</script>


