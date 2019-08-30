<div class="content">
					<div class="settings-form p-4" id="informasilulusan">
						<h2>Informasi Pendidikan</h2>
						<?php foreach($alumni as $u): ?>
						<form action="" method="" class="mt-4 settings-form">
					<div class="row">	
                    <div class="col-md-12">
                      <div class="form-group">
                      <label>Jurusan</label>
                      <input disabled  list="list_jurusan" name="id_jurusan" type="text" class="form-control" id="feInputAddress"  value="<?php foreach ($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?>"> 
                     </div>
                    </div>
					</div>
					<div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <label>Program Studi</label>
                      <input disabled list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress"  value="<?php foreach ($prodi as $a){if ($a->id_prodi == $u->id_prodi) :echo $a->prodi;endif;}  ?>"> 
                      
                    </div>
                  </div>
				  </div>
				  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                      <label>Jenjang Pendidikan</label>
                     <input disabled list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->jenjang ?>"> 
                      </div>
                  </div>
				  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                      <label>Tahun Masuk</label>
                    <input disabled list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->angkatan ?>"> 
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                      <label>Tahun Lulus</label>
                      <input disabled list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->tahun_lulus ?>"> 
					</select>
                    </div>
                  </div>
                  <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                      <label>Tanggal Ijazah</label>
                      <input disabled name="tanggal_yudisium" type="date" class="form-control"  value="<?php echo $u->tanggal_yudisium ?>">
                    </div>
                  </div>
						</form>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>