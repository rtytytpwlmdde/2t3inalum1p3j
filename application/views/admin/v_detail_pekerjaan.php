
<div class="table-responsive">
<div style="">
            <div class="row">
                <div class="col ">
					<?php foreach($lowongankerja as $u){ ?>
                    <div class="p-0 pb-3" style="overflow-x:auto;">
                        <div class="card">
                            <div class="card-header text-sm-center">
                                <strong class="text-sm-center"><?php echo $u->nama_lowongan ?></strong>
                            </div>
                            <div class="card-body">
							
                                <div class="mx-auto d-block">
                                     <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->lowongan_jabatan ?></h5>
									 <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->nama_perusahaan ?></h5>
									 <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->website_perusahaan ?></h5>
                                    <div class="location text-sm-left"><i class="fa fa-map-marker"></i> <?php echo $u->alamat_perusahaan ?></div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
					<?php } ?>
				</div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->
		<div class="card-header text-sm-center">
                                <strong class="text-sm-center">Deskripsi</strong>
                            </div>
		<div style="min-width: 300px">
            <div class="row">
                <div class="col ">
					<?php foreach($lowongankerja as $u){ ?>
                    <div class="p-0 pb-3" style="overflow-x:auto;">
                        <div class="card">
                            <div class="card-body">
							
                                <div class="mx-auto d-block">
                                     <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->lowongan_jabatan ?></h5>
									 <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->nama_perusahaan ?></h5>
									 <h5 class="text-sm-left mt-2 mb-1"><?php echo $u->website_perusahaan ?></h5>
                                    <div class="location text-sm-left"><i class="fa fa-map-marker"></i> <?php echo $u->alamat_perusahaan ?></div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
					<?php } ?>
				</div><!-- .row -->
            </div><!-- .animated -->
        </div>
</div>

