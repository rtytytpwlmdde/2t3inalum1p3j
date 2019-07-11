<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Rekap Transaksi</h1>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
    </div>
  </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center" scope="col">Transaksi</th>
                <th class="text-center" scope="col">Jan</th>
                <th class="text-center" scope="col">Feb</th>
                <th class="text-center" scope="col">Mar</th>
                <th class="text-center" scope="col">Apr</th>
                <th class="text-center" scope="col">Mei</th>
                <th class="text-center" scope="col">Jun</th>
                <th class="text-center" scope="col">Jul</th>
                <th class="text-center" scope="col">Agu</th>
                <th class="text-center" scope="col">Sep</th>
                <th class="text-center" scope="col">Okt</th>
                <th class="text-center" scope="col">Nov</th>
                <th class="text-center" scope="col">Des</th>
                <th class="text-center" scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>Semua</td>
                <?php
                for($i=1; $i<13; $i++){?>
                    <td>
                        <?php
                        $result = 0;
                        foreach($transaksiPerbulan as $u){
                            if($i == $u->bulan){ 
                                $result = $u->jumlahTransaksiPerbulan;
                            }
                        } 
                        if($result == 0){
                            echo "0";
                        }else{
                            echo $result;
                        }
                    ?>
                    </td>
                <?php
                }
                ?>
                <td>
                <?php 
                foreach($transaksiPertahun as $u){
                    echo $u->jumlahTransaksiPertahun;
                }
                ?>
                </td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>