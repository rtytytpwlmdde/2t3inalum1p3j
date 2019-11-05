<div class="container-fluid">

          <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2 py-2">
        <h1 class="h3 mb-0 text-gray-800">Lowongan Pekerjaan</h1>                                
    </div>

    <!-- Content Row -->
    <div class="row">

            <!-- Content Column -->
            <div class="col-lg-9 mb-4">
                <?php foreach ($lowker as $u){ ?>
                <div class="card shadow mb-2">
                    <div class="card-body">               
                    <img class="lazyload company-logo pull-right hidden-xs" style="float: right !important; vertical-align: middle;" id="company_logo_25112142" data-original="https://siva.jsstatic.com/id/39031/images/logo/39031_logo_0_34039.png" src="https://siva.jsstatic.com/id/39031/images/logo/39031_logo_0_34039.png" style="display: block;">
                    <h6 class="h4 m-0  text-primary"><?= $u->lowongan_jabatan?></h6>
                    <h6 class="m-0  text-secondary"><?= $u->nama_perusahaan?></h6>
                    <ul class="list-unstyled">
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i> <?= $u->alamat_perusahaan?></li>
                                <li><i class="">$ </i> <?= $u->kisaran_gaji?></li>
                            </ul>
                        </li>
                    </ul>
                    <span style="font-size:12px"><?= $u->id_penulis?></span> <i class="fas fa-circle mb-2" style="font-size:9px"></i> <span  style="font-size:12px"><?= $u->tanggal_informasi?></span>
                    </div>
                </div>
                <?php  } ?>
            </div>

            <div class="col-lg-3 mb-4">
            
            <div class="card shadow mb-3">
                <div class="card-body">
                    <a href="<?php echo base_url("lowker/editLowker");?>"><h6 class="m-0 font-weight-bold ">Edit Lowongan</h6></a>
                </div>
              </div>
              <!-- Approach -->
              <div class="card shadow mb-3">
                <div class="card-body">
                    <div class=" pb-3">
                    <h6 class="m-0 font-weight-bold ">Pilih Kriteria</h6>
                    </div>
                    <form action="<?php echo base_url("lowker/listLowker")?>" method="get">
                        <div class="form-group">
                            <input required name="jabatan" type="text" placeholder="jabatan" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input required name="kota" type="text" placeholder="kota" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input required name="gaji" type="text" placeholder="gaji" class="form-control" >
                        </div>
                        <input type="submit" class="btn btn-sm btn-secondary" value="search">
                    </form>
                </div>
              </div>
               <!-- Approach -->
               <div class="card shadow mb-4">
                <div class="card-body">
                    <div class=" pb-3">
                    <h6 class="m-0 font-weight-bold ">Telusuri Lowongan</h6>
                    </div>
                    <a href="">Fresh Graduate</a> <br>
                    <a href="">Luar Negeri</a> <br>
                    <a href="">Dalam Negeri</a> <br>
                    <a href="">Perusahaan Bonapit</a>
                </div>
              </div>

            </div>
          </div>
</div>

       

