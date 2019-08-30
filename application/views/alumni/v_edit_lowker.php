<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Update Lowongan Pekerjaan</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'alumni/lowker/editlowker'; ?>" method="POST">
                <?php foreach($lowongankerja as $u): ?>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID Lowongan</label>
                        <input disabled type="text" class="form-control" id="feInputAddress" value="<?php echo $u->id_lowongan ?>"> 
                        <input hidden name="id_lowongan" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->id_lowongan ?>">                
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Lowongan Pekerjaan</label>
                        <input type="text" class="form-control" value="<?php echo $u->nama_lowongan ?>" name="nama_lowongan" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input name="nama_perusahaan" type="text" class="form-control" value="<?php echo $u->nama_perusahaan ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Posisi Jabatan</label>
                        <input name="lowongan_jabatan" type="text" class="form-control" value="<?php echo $u->lowongan_jabatan ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Syarat Lowongan</label>
                        <input name="syarat_pekerjaan" type="text" class="form-control" value="<?php echo $u->syarat_pekerjaan ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jumlah Pegawai Yang Dibutuhkan</label>
                        <input name="pelamar_yang_dibutuhkan" type="text" class="form-control" value="<?php echo $u->pelamar_yang_dibutuhkan ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kisaran Gaji</label>
                        <select required  name="kisaran_gaji" id="feInputState" class="form-control ">
                         <option value="1juta-3,5juta" <?php echo ($u->kisaran_gaji=='operator_fakultas')?'selected="selected"':''; ?>>1.000.000 - 3.500.00</option>
                        <option value="3,5juta-5juta" <?php echo ($u->kisaran_gaji=='3,5juta-5juta')?'selected="selected"':''; ?>>3.500.000 - 5.000.000</option>
                         <option value="5juta-10juta" <?php echo ($u->kisaran_gaji=='5juta-10juta')?'selected="selected"':''; ?>>5.000.000 - 10.000.000</option>
                        <option value="10juta" <?php echo ($u->kisaran_gaji=='10juta')?'selected="selected"':''; ?>>Lebih dari 10.000.000</option>
                                   
                        </select>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Perusahan</label>
                        <input name="alamat_perusahaan" type="text" class="form-control" value="<?php echo $u->alamat_perusahaan ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email Perusahan</label>
                        <input name="email_perusahaan" type="text" class="form-control"value="<?php echo $u->email_perusahaan ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Website Perusahaan</label>
                        <input name="website_perusahaan" type="text" class="form-control"value="<?php echo $u->website_perusahaan ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input name="contact_person" type="number" class="form-control"value="<?php echo $u->contact_person ?>">
                      </div>
                    </div>
                  </div>
				  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No Telephone Perusahaan</label>
                        <input name="no_telp_perusahaan" type="number" class="form-control"value="<?php echo $u->no_telp_perusahaan ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Pemberi Informasi</label>
                        <input disabled type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $this->session->userdata('nama_login'); ?>"> 
                    <input hidden name="username" type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $this->session->userdata('nama_login'); ?>"> 
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
