
<div class="">
<div style="">
            <div class="row">
                <div class="col-sm-12 ">
					<?php foreach($lowongankerja as $u){ ?>
                    <div class="" >
                        <div class=" ">
                            <div class="bg-secondary p-2 text-sm-center text-white">
                                <strong class="text-sm-center"><?php echo $u->nama_lowongan ?></strong>
                            </div>
                            <div class="">
							
                                <div class="pl-2 pb-2">
                                     <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->lowongan_jabatan ?></h5>
									 <h6 class="text-sm-left mt-2 mb-1"><?php echo $u->nama_perusahaan ?></h6>
									 <h6 class="text-sm-left mt-2 mb-1"><?php echo $u->website_perusahaan ?></h6>
                                    <h6 class="text-sm-left mt-2 mb-1"></i> <?php echo $u->alamat_perusahaan ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
				</div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->
		<div class="napbar p-2 text-sm-center">
                                <strong class="text-sm-center ">Deskripsi</strong>
                            </div>
		<div style="">
            <div class="row">
                <div class=" ">
					<?php foreach($lowongankerja as $u){ ?>
                    <div class="border-bottom" style="width:100%">
							
                                <div class="pl-4">
                                     <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->lowongan_jabatan ?></h5>
									 <h6 class="text-sm-left mt-2 mb-1"><?php echo $u->nama_perusahaan ?></h6>
									 <h6 class="text-sm-left mt-2 mb-1"><?php echo $u->website_perusahaan ?></h6>
                                    <h6 class="text-sm-left mt-2 mb-1"></i> <?php echo $u->alamat_perusahaan ?></h6>
                                
                                </div>
                           
                    </div>
					<?php } ?>
				</div><!-- .row -->
            </div><!-- .animated -->
        </div>
</div>

 