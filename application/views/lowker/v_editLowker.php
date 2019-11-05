<div class="container-fluid">

          <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2 py-2">
        <h1 class="h3 mb-0 text-gray-800">Detail Lowongan Pekerjaan</h1>                                
    </div>

<form action="<?php echo base_url("lowker/updateLowker")?>" enctype="multipart/form-data" method="post">
    <?php foreach ($lowker as $u){ ?>
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-2">
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-3 mb-2">
                    <div class="card mb-2" style="height:100px">
                        <div class="card-body">               
                            <img class="lazyload company-logo pull-right hidden-xs" width="60" height="60" id="company_logo_25112142"  src="<?php echo base_url('gambar/'.$u->logo_perusahaan); ?>" style="display: block;">
                        
                            <input type="file" name="logo_perusahaan" value="<?= $u->logo_perusahaan?>">
                            <input type="text" hidden name="gambar" value="<?= $u->logo_perusahaan?>">
                            <input type="text" hidden name="id_lowongan" value="<?= $u->id_lowongan?>">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6 mb-2">
                    <div class="card mb-2" style="height:100px">
                        <div class="card-body">               
                            <h6 class="h4 m-0  text-primary">Posisi / Jabatan</h6>
                            <input type="text" name="lowongan_jabatan" value="<?= $u->lowongan_jabatan?>">
                            <h6 class="m-0  text-secondary"><?= $u->nama_perusahaan?></h6>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-3 mb-2">
                    <div class="card mb-2" style="height:100px">
                        <div class="card-body">    
                            <button class="btn btn-sm btn-primary" type="submit">Simpan Perubahan</button>
                            <a class="btn btn-sm btn-secondary" href="<?php echo base_url("lowker/detailLowker/".$u->id_lowongan);?>">Batalkan</a>
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
                        <input type="text" name="kisaran_gaji" value="<?= $u->kisaran_gaji?>">
                    </div>               
                <div class=" pb-3">
                    <h6 class="m-0 font-weight-bold ">Batas Penayanagan</h6>
                        <input type="date" name="batas_penayangan" value="<?= $u->batas_penayangan?>">
                    </div>               
                    <div>
                </div>
                <div class=" pb-3">
                    <h6 class="m-0 font-weight-bold ">Deskripsi Pekerjasan</h6>
                    </div>               
                    <div>
                    <textarea id="froala-editor" name="syarat_pekerjaan" value="<?= $u->syarat_pekerjaan?>"></textarea>
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
                                <input type="text" name="nama_perusahaan" value="<?= $u->nama_perusahaan?>">
                            </div>
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">Bidang</span><br>
                                <input type="text" name="bidang_perusahaan" value="<?= $u->bidang_perusahaan?>">
                            </div>
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">Alamat</span><br>
                                <input type="text" name="alamat_perusahaan" value="<?= $u->alamat_perusahaan?>">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">Website</span><br>
                                <input type="text" name="website_perusahaan" value="<?= $u->website_perusahaan?>">
                            </div>
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">No Hp / Whatsapp</span><br>
                                <input type="text" name="contact_person" value="<?= $u->contact_person?>">
                            </div>
                            <div class="pb-2">
                                <span class="text-dark font-weight-bold">Email</span><br>
                                <input type="text" name="email_perusahaan" value="<?= $u->email_perusahaan?>">
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

       
    </div>
    <?php  } ?>
    </form>
</div>

<script> new FroalaEditor('textarea#froala-editor')</script>
       

