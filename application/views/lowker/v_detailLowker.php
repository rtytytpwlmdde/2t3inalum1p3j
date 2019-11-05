<div class="container-fluid">

          <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2 py-2">
        <h1 class="h3 mb-0 text-gray-800">Detail Lowongan Pekerjaan</h1>                                
    </div>

    <?php foreach ($lowker as $u){ ?>
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-2">
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-3 mb-2">
                    <div class="card mb-2" style="height:100px">
                        <div class="card-body">               
                            <img class="lazyload company-logo pull-right hidden-xs"  width="60" height="60" id="company_logo_25112142"  src="<?php echo base_url('gambar/'.$u->logo_perusahaan); ?>" >
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6 mb-2">
                    <div class="card mb-2" style="height:100px">
                        <div class="card-body">               
                            <h6 class="h4 m-0  text-primary"><?= $u->lowongan_jabatan?></h6>
                            <h6 class="m-0  text-secondary"><?= $u->nama_perusahaan?></h6>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-3 mb-2">
                    <div class="card mb-2" style="height:100px">
                        <div class="card-body">    
                            <a href="<?php echo base_url("lowker/editLowker/".$u->id_lowongan);?>"><h6 class="m-0 font-weight-bold ">Edit Lowongan</h6></a>
                            <a href="<?php echo base_url("lowker/tutupLowker/".$u->id_lowongan);?>"><h6 class="m-0 font-weight-bold ">Tutup Lowongan</h6></a>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

       
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-6 mb-4">
            <div class="card  mb-2">
                <div class="card-body">
                    <div class=" pb-3">
                        <h6 class="m-0 font-weight-bold ">Kisaran Gaji</h6>
                        <?= $u->kisaran_gaji?>
                    </div>               
                    <div class=" pb-3">
                        <h6 class="m-0 font-weight-bold ">Batas Waktu</h6>
                        <?= $u->batas_penayangan?>
                    </div>               
                    <div>
                </div>
                <div class=" pb-3">
                    <h6 class="m-0 font-weight-bold ">Deskripsi Pekerjaan</h6>
                    </div>               
                    <div>
                    <?= $u->syarat_pekerjaan?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card  mb-2">
                <div class="card-body">
                <div class=" pb-3">
                <h6 class="m-0 font-weight-bold ">Profil Perusahaan</h6>
                </div>    
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">Nama Perusahaan</span><br>
                                <span><?= $u->nama_perusahaan?></span>
                            </div>
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">Bidang</span><br>
                                <span><?= $u->bidang_perusahaan?></span>
                            </div>
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">Alamat</span><br>
                                <span><?= $u->alamat_perusahaan?></span>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">Website</span><br>
                                <span><?= $u->website_perusahaan?></span>
                            </div>
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">No Hp / Whatsapp</span><br>
                                <span><?= $u->contact_person?></span>
                            </div>
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">Email</span><br>
                                <span><?= $u->email_perusahaan?></span>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

       
    </div>
    <?php  } ?>
</div>

       

