<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Open Donasi</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'admin/opendonasi/editOpendonasi'; ?>" method="POST">
                <?php foreach($opendonasi as $u): ?>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID Lowongan</label>
                        <input disabled type="text" class="form-control" id="feInputAddress" value="<?php echo $u->id_opendonasi ?>"> 
                        <input hidden name="id_opendonasi" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->id_opendonasi ?>">                
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" value="<?php echo $u->nama_kegiatan ?>" name="nama_kegiatan">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input name="Keterangan" type="text" class="form-control"  value="<?php echo $u->Keterangan ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>File</label>
                        <input name="file" type="file" class="form-control"  value="<?php echo $u->file ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No Rekening</label>
                        <input name="No_rekening" type="number" class="form-control" value="<?php echo $u->No_rekening ?>">
                      </div>
                    </div>
                  </div>
				   <button type="submit" class="btn btn-fill btn-primary">Save</button>
                   <?php endforeach ?>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                   
                </div>
              </div>
              </div>
            </div>
