<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Update Lowongan Pekerjaan</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'alumni/profil/editPekerjaan'; ?>" method="POST">
                <?php foreach($riwayat_pekerjaan as $u): ?>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID Riwayat Pekerjaan</label>
                        <input disabled type="text" class="form-control" id="feInputAddress" value="<?php echo $u->id_riwayat_pekerjaan ?>"> 
                        <input hidden name="id_riwayat_pekerjaan" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->id_riwayat_pekerjaan ?>">                
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>NIM</label>
                          <input disabled type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $this->session->userdata('id_login'); ?>"> 
						<input hidden name="nim" type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $this->session->userdata('id_login'); ?>"> 
                     </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tempat Bekerja</label>
                        <input name="tempat_kerja" type="text" class="form-control" value="<?php echo $u->tempat_kerja ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Posisi/Jabatan</label>
                        <input name="posisi" type="text" class="form-control" value="<?php echo $u->posisi ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Golongan PNS</label>
                        <input name="golongan_pns" type="text" class="form-control" value="<?php echo $u->golongan_pns ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Gaji</label>
                        <input name="pendapatan_per_bulan" type="text" class="form-control" value="<?php echo $u->pendapatan_per_bulan ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Mulai Bekerja</label>
                        <input name="mulai_kerja" type="date" class="form-control" value="<?php echo $u->mulai_kerja?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Berhenti Bekerja</label>
                        <input name="berhenti_kerja" type="date" class="form-control"value="<?php echo $u->berhenti_kerja ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Kerja</label>
                        <input name="alamat_kerja" type="text" class="form-control"value="<?php echo $u->alamat_kerja?>">
                      </div>
                    </div>
                  </div>
				   <button type="submit" class="btn btn-fill btn-primary">Save</button>
                   <?php endforeach ?>
                </form>
              </div>
            </div>
          </div>
         
