<div class="content">
					<div class="settings-form p-4" id="informasilulusan">
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Foto</h1>
						
					</div>
						<?php foreach($alumni as $u): ?>
						<form class="form-horizontal" method="post" action="<?php echo site_url('alumni/profil/updatefoto') ?>" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
								<div class="author-thumb" style="left:25%;margin-bottom:8%;">
									<img class="" src="<?php echo base_url('img/alumni_pic/'.$u->foto) ?>" alt="" style="width:175px;height:175px;">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<label class="control-label">Upload Foto</label>
									<input class="" name="foto" placeholder="" type="file">
									<input class="" name="data_foto" type="text" value="<?php echo $u->foto ?>" hidden>
							</div>
							<input hidden type="text" name="nim" class="form-control" id="feFirstName" value="<?php echo $u->nim ?>"> 
                        
							<div class="col-md-6 text-LEFT">
								<button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
							</div>
					</form>
						</form>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>