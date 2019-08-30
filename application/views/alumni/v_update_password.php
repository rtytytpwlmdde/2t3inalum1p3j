<div class="content">
					<div class="settings-form p-4" id="informasilulusan">
						<h2>Informasi Pendidikan</h2>
						<?php foreach($alumni as $u): ?>
						<form action="<?php echo base_url(). 'alumni/profil/update_password'; ?>" method="post" class="mt-4 settings-form">
						<div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Password lama</label>
                                <input required name="password_lama" pattern="[A-Za-z0-9]{5,16}" title="Gunakan kombinasi huruf dan angka, 5-16 karakter" type="password" class="form-control" id="feEmailAddress" placeholder="Password Lama"> 
                            </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Password baru</label>
                                <input required name="password_baru" pattern="[A-Za-z0-9]{5,16}" title="Gunakan kombinasi huruf dan angka, 5-16 karakter" type="password" class="form-control" id="fePassword" placeholder="Password Baru"> 
                            </div>
                        </div>
						<input hidden type="text" name="nim" class="form-control" id="feFirstName" value="<?php echo $u->nim ?>"> 
                            
								<button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
													</form>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>