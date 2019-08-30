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
            <h1 class="h3 mb-0 text-gray-800">Legalisir Online</h1>
            <div class="timeline-manage">
                <a href="<?php echo site_url('legalisir/legalisir/pesananSaya/'); ?>" class="btn btn-light btn-sm  ">
                    <i class='bx bx-money'></i>Semua Pesanan Saya
                </a>
                <a href="<?php echo site_url('legalisir/legalisir/keranjang/'); ?>" class="btn btn-light btn-sm ">
                    <i class='bx bx-info-circle' ></i>Pesanan Tertunda
                </a>
            </div>
          </div>
          
<?php foreach ($produk as $u){?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-info  h-100 ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                        <form action="<?php echo base_url('legalisir/legalisir/tambahTransaksi/'); ?>" method="post" onsubmit="openModal()" id="myForm">
                            <div class="row profile-rows">
                            <div class="col-md-4">
                                <div class="row no-gutters align-items-center">
                                    <div class="col">
                                        <div class="text-xs font-weight-bold" style="font-size: 0.9em;"><?= $u->nama_produk; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="text-gray-800" style="font-size: 0.8em;"><?= "Rp".$u->harga_produk; ?></div>
                            </div>
                            <div class="col-md-2">
                                <div class="text-gray-800" style="font-size: 0.8em;"><?= $u->berat_produk; ?></div>
                            </div>
                            <div class="col-md-2">
                            <select class="form-control" style="width:70px;" required name="jumlah_produk" id="exampleFormControlSelect1">
                                <option value="">0</option>
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                            </div>
                            <div class="col-md-2">
                                <input hidden type="text" name="id_produk" value="<?= $u->id_produk; ?>">
                                <input hidden type="text" name="harga_produk" value="<?= $u->harga_produk; ?>">
                                <input hidden type="text" name="berat_produk" value="<?= $u->berat_produk; ?>">
                                <div class="text-center align-items-center">
                                    <button type="submit" class="btn btn-outline-primary btn-sm identifyingClass">Pesan</button>
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
<?php } ?>
</div>






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