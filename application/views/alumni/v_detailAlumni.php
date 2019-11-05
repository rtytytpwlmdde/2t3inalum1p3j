<div class="container-fluid pb-3 ">
  <div class="row py-2 ">
    <div class="col-sm-6">
      <h1 class="h3 mb-2 text-gray-800">Data Alumni</h1>
      
    </div>
    <?php $status_operator = $this->session->userdata('status') ?>
    <div class="col-sm-6">
      <div class="d-flex flex-row-reverse bd-highlight">
      <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link active" href="<?php echo base_url("alumni/detailAlumni/".$username);?>">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("alumni/riwayatPekerjaan/".$username);?>">Riwayat Pekerjaan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("alumni/pendidikan/".$username);?>">Riwayat Pendidikan</a>
      </li>
</ul>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="col-sm-3 ">
      <div class=" mb-2">
        <div class="text-center  mt-2">
          <?php foreach($alumni as $u){ ?>
          <img src="<?php echo base_url('foto_alumni/'.$u->foto); ?>" alt="" style="width:100%"> <br>
          <?php if($status_operator == 'operator_fakultas' || $username == $this->session->userdata('username')){ ?>
           <a href="<?php echo base_url("alumni/editAlumni/".$username) ?>" class="btn btn-sm btn-info my-2" style="width:100px">Edit Data </a>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="">
          <div>
            <form action="<?php echo base_url("alumni/editMahasiswa");?>">
              <div class="form-group">
                <label for="inputAddress">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $u->nama;?>">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Username</label>
                  <input type="text" name="username" class="form-control"  value="<?= $u->username;?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Password</label>
                  <input type="password" name="password" class="form-control"  value="<?= $u->password;?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputEmail4">Jenis Kelamin</label>
                  <input type="text" name="jenis_kelamin" class="form-control"  value="<?= $u->jenis_kelamin;?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control"  value="<?= $u->tempat_lahir;?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">Tanggal Lahir</label>
                  <input type="date" class="form-control"  value="<?= $u->tanggal_lahir;?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputAddress">Email</label>
                  <input type="email" name="email" class="form-control" value="<?= $u->email;?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputAddress">Telpon</label>
                  <input type="text" name="nomor_telpon" class="form-control" value="<?= $u->nomor_telepon;?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputAddress">HP</label>
                  <input type="text" name="nomor_hp" class="form-control" value="<?= $u->nomor_hp;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress2">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Apartment, studio, or floor" value="<?= $u->alamat ?>">
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputState">Provinsi</label>
                  <input type="text" class="form-control" name="nama_provinsi" value="<?= $u->nama_provinsi ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity">Kota</label>
                  <input type="text" class="form-control" name="nama_kota" value="<?= $u->nama_kota ?>">
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Zip</label>
                  <input type="text" class="form-control" name="kode_pos" value="<?= $u->kode_pos ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">Facebook</label>
                  <input type="text" class="form-control" name="facebook" value="<?= $u->facebook ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Twitter</label>
                  <input type="text" class="form-control" name="twitter" value="<?= $u->twitter ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">Jurusan</label>
                  <input type="text" class="form-control" name="jurusan" value="<?= $u->jurusan ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Prodi</label>
                  <input type="text" class="form-control" name="prodi" value="<?= $u->prodi ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputCity">Angkatan</label>
                  <input type="text" class="form-control"name="angkatan" value="<?= $u->angkatan ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Tahun Lulus</label>
                  <input type="text" class="form-control" name="tahun_lulus" value="<?= $u->tahun_lulus ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Tanggal Yudisium</label>
                  <input type="text" class="form-control" name="tanggal_yudisium" value="<?= $u->tanggal_yudisium ?>">
                </div>
              </div>
            </form>
          <?php } ?>
          </div>
        </div>
    </div>
  </div>

</div>