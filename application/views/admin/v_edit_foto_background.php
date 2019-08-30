	<div class="content">
						<div class="settings-form p-4" id="informasilulusan">
							<?php foreach($foto_background as $u): ?>
							<form class="form-horizontal" method="post" action="<?php echo site_url('admin/background_foto/updateFoto') ?>" enctype="multipart/form-data">
						<div class="col-md-12">
						  <div class="form-group">
							<label>ID foto</label>
							<input disabled type="text" class="form-control" id="feInputAddress" value="<?php echo $u->id ?>"> 
							<input hidden name="idi" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->id ?>">                
						  </div>
						</div>
					  </div>
					  <div class="row">
						<div class="col-md-12">
						  <div class="form-group">
							<label>Foto Lama</label>
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
								<div class="author-thumb" style="left:25%;margin-bottom:8%;">
									<img class="" src="<?php echo base_url('img/cover/'.$u->foto) ?>" alt="" style="width:175px;height:175px;">
								</div>
							</div>
							</div>
						</div>
					  </div>
					  <div class="row">
						<div class="col-md-12">
						  <div class="form-group">
							<label>Pilih File</label>
							<input name="fotopost" type="file" class="form-control">
							<input class="" name="data_foto" type="text" value="<?php echo $u->foto ?>" hidden>
						  </div>
						</div>
					  </div>
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