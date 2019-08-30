<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Open Donasi</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'admin/info_feb/editInfo'; ?>" method="POST">
                <?php foreach($info_feb as $u): ?>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" value="<?php echo $u->keterangan ?>" name="keterangan">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Link Url</label>
                        <input name="link" type="text" class="form-control"  value="<?php echo $u->link ?>">
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
