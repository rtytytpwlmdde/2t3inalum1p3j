<!DOCTYPE html>
<html lang="en">


<body class="">
	<?php foreach($alumni as $u): ?>
  <div class="main-content">
    <!-- Navbar -->
   
    <!-- End Navbar -->
    <!-- Header -->
    <!-- Page content -->
    <div class="container-fluid mt--0">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-0 order-lg-6">
                <div class="card-profile-image">
                   <img src="<?php echo base_url(); ?>/assets/images/theme/team-4-800x800.jpg" class="rounded-circle" width="200" height="150">
                  
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo $u->nama ?><span class="font-weight-light">, 27</span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $u->alamat ?>, <?php echo $u->nama_kota ?><br>
                  <i class="ni location_pin mr-2"></i><?php echo $u->nama_provinsi ?>, <?php echo $u->nama_negara ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
                <hr class="my-4" />
                 <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Message</a>
                <a href="#" class="btn btn-sm btn-info float-right">Message</a>
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Profil Alumni</h3>
                </div>
              </div>
            </div>
            <div class="bg-secondary shadow">
              <form>
                <h6 class="heading-small mb-4">Data Diri</h6>
                <div class="pl-lg-4">
				<div class="row">
                <div class="col-md-12">
                      <div class="form-group">
                        <label>NIM</label>
                        <input  disabled name="nim" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->nim ?>"> 
                        <input  hidden name="nim" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->nim ?>"> 
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username</label>
                        <input disabled name="username" type="text" class="form-control" value="<?php echo $u->username ?>">
                      </div>
                    </div>
                  </div>
				  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama</label>
                        <input disabled name="nama" type="text" class="form-control" value="<?php echo $u->nama ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input disabled name="nama" type="text" class="form-control" value="<?php echo $u->jenis_kelamin ?>">
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                      <label>Tempat Lahir</label>
                        <input disabled name="tempat_lahir" type="text" class="form-control" value="<?php echo $u->tempat_lahir ?>">
                    </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                      <label>Tanggal Lahir</label>
                        <input disabled name="tanggal_lahir" type="date" class="form-control" value="<?php echo $u->tanggal_lahir ?>">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                  <div class="col-md-12">
                      <div class="form-group ">
                        <label>Kewarganegaraan</label>
                        <select disabled required  name="kewarganegaraan" id="feInputState" class="form-control ">
                                    <option value="WNI" <?php echo ($u->kewarganegaraan=='WNI')?'selected="selected"':''; ?>>Warga Negara Indonesia</option>
                                   <option value="WNA" <?php echo ($u->kewarganegaraan=='WNA')?'selected="selected"':''; ?>>Warga Negara Asing</option>
                                   
                        </select>
                     </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                      <label>Negara</label>
                      <input disabled list="list_negara" name="nama_negara" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->nama_negara ?>"> 
                                <datalist id="list_negara">
                                    <?php foreach($negara as $p): ?>
                                    <option value="<?php echo $p->nama_negara?>"><?php echo $p->id_negara?> - <?php echo $p->nama_negara?></option>
                                    <?php endforeach ?>
                                </datalist>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                      <label>Provinsi</label>
                      <input disabled list="list_provinsi" name="nama_provinsi" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->nama_provinsi ?>"> 
                                <datalist id="list_provinsi">
                                    <?php foreach($provinsi as $p): ?>
                                    <option value="<?php echo $p->nama_provinsi?>"><?php echo $p->id_provinsi?> - <?php echo $p->nama_provinsi?></option>
                                    <?php endforeach ?>
                                </datalist>
                    </div>
                  </div>
                  <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                      <label>Kota</label>
                        <input disabled list="list_kota" name="nama_kota" type="text" class="form-control" id="feInputAddress"  value="<?php echo $u->nama_kota ?>"> 
                                <datalist id="list_kota">
                                    <?php foreach($kota as $p): ?>
                                    <option value="<?php echo $p->nama_kota?>"><?php echo $p->id_kota?> - <?php echo $p->nama_kota?></option>
                                    <?php endforeach ?>
                                </datalist>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input disabled name="alamat" type="text" class="form-control" id="feInputAddress"  value="<?php echo $u->alamat ?>"> 
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Kode Pos</label>
                        <input disabled name="kode_pos" type="text" class="form-control" id="feInputAddress"  value="<?php echo $u->kode_pos ?>"> 
                    </div>
                  </div>
				  <div class="col-md-12">
                      <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input disabled name="nomor_telepon" type="number" class="form-control" id="feInputAddress" value="<?php echo $u->nomor_telepon ?>"> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input disabled name="nomor_hp" type="number" class="form-control" id="feInputAddress"  value="<?php echo $u->nomor_hp ?>"> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label> Email</label>
                        <input disabled name="email" type="text" class="form-control" id="feInputAddress"  value="<?php echo $u->email ?>"> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Facebook</label>
                        <input disabled name="facebook" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->facebook ?>"> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Twitter</label>
                        <input disabled name="twitter" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->twitter ?>"> 
                    </div>
                  </div> 
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Informasi Pendidikan</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Jurusan</label>
                         <input disabled  list="list_jurusan" name="id_jurusan" type="text" class="form-control" id="feInputAddress"  value="<?php foreach ($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?>"> 
                     </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Program Studi</label>
                         <input disabled list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress"  value="<?php foreach ($prodi as $a){if ($a->id_prodi == $u->id_prodi) :echo $a->prodi;endif;}  ?>"> 
                       </div>
                    </div>
					<div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Jenjang Pendidikan</label>
						 <input disabled list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->jenjang ?>"> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Tahun Masuk</label>
                       <input disabled list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->angkatan ?>"> 
                     </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Tahun Lulus</label>
                        <input disabled list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->tahun_lulus ?>"> 
					 </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Tanggal Ijazah</label>
                       <input disabled name="tanggal_yudisium" type="date" class="form-control"  value="<?php echo $u->tanggal_yudisium ?>">
                   </div>
                    </div>
                  </div>
                </div>
				<?php endforeach ?>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Riwayat Pekerjaan</h6>
                <div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="" width="100%" cellspacing="100%">
        <thead>
          <tr>
          <th>No</th>
          <th>Tempat Kerja</th>
            <th>Posisi Jabatan</th>
            <th>Bidang Kerja</th>
            <th>Golongan PNS</th>
            <th>Pendapatan</th>
            <th>Tahun Masuk</th>
            <th>Tahun Berhenti</th>
            <th>Alamat Kerja</th>
            <th>Status Kerja</th>
          </tr>
        </thead>
        <tbody>
        <?php 
                    $no = 1;
                    foreach ($riwayatpekerjaan as $u){ 
                    ?>
          <tr>
          <td><?php echo $no++ ?></td>
          <td>
			<?php echo $u->tempat_kerja ?>
          </td>
          <td><?php echo $u->posisi ?></td>
          <td><?php echo $u->bidang_kerja?></td>
          <td><?php echo $u->golongan_pns?></td>
          <td><?php echo $u->pendapatan_per_bulan?></td>  
          <td><?php echo $u->mulai_kerja?></td>
          <td><?php echo $u->berhenti_kerja?></td>
          <td><?php echo $u->alamat_kerja?></td>
          <td><?php echo $u->sekarang?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
	
    </div>
  </div>
  <!--   Core   -->


</html>