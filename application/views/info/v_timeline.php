<div class="container-fluid">

          <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2 py-2">
        <h1 class="h3 mb-0 text-gray-800">Timeline</h1>                                
    </div>

    <!-- Content Row -->
    <div class="row">

            <!-- Content Column -->
            <div class="col-lg-9 mb-4">
                <?php foreach ($timeline as $u){ 
                    if($u->jenis_informasi == 'pekerjaan'){?>
                    <div class="card shadow mb-2">
                        <div class="card-body">               
                        <img class="lazyload company-logo pull-right hidden-xs" style="float: right !important; vertical-align: middle; width:100px" id="company_logo_25112142" src="<?php echo base_url('gambar/'.$u->logo_perusahaan); ?>"  style="display: block;">
                        <a href="<?php echo base_url("lowker/detailLowker/".$u->id_lowongan."/".$u->jenis_informasi);?>"><h6 class="h4 m-0  text-primary"><?= $u->lowongan_jabatan?></h6></a>
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
                    <?php  }else{ ?>
                        <div class="card shadow mb-2">
                        <div class="card-body">               
                        <a href="<?php echo base_url("info/detailInformasi/".$u->id_informasi."/".$u->jenis_informasi);?>"><h6 class="h4 m-0  text-primary"><?= $u->judul_informasi?></h6></a>
                        <span class="m-0  text-secondary"><?php echo substr($u->nama_informasi,0, 350); ?>...</span><br>
                        <a href="<?= $u->link_informasi ?>">Baca Selengkapnya</a> <br>
                        <span style="font-size:12px"><?= $u->id_penulis?></span> <i class="fas fa-circle mb-2" style="font-size:9px"></i> <span  style="font-size:12px"><?= $u->tanggal_informasi?></span>
                        </div>
                    </div>
                    <?php } ?>
                <?php  } ?>
            </div>

            <div class="col-lg-3 mb-4">
            
            <div class="card shadow mb-3">
                <div class="card-body">
                    <a href="<?php echo base_url("info/formTambahInfo");?>"><h6 class="m-0 font-weight-bold ">Tambah Info</h6></a>
                    <a href="<?php echo base_url("lowker/formTambahLowker");?>"><h6 class="m-0 font-weight-bold ">Tambah Lowongan</h6></a>
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
                            <input required name="search" type="text" placeholder="Cari.." class="form-control" >
                        </div>
                        <input type="submit" class="btn btn-sm btn-secondary" value="search">
                    </form>
                </div>
              </div>
               <!-- Approach -->
               <div class="card shadow mb-4">
                <div class="card-body">
                    <div class=" pb-3">
                    <h6 class="m-0 font-weight-bold ">Telusuri Informasi</h6>
                    </div>
                    <a href="<?php echo base_url("lowker/listLowker") ?>">Lowongan Pekerjaan</a> <br>
                    <a href="<?php echo base_url("info/timeline") ?>">Info FEB UB</a> <br>
                </div>
              </div>

            </div>
          </div>
</div>

       

