<div class="container-fluid pb-3 ">
<?php
        $gagals = $this->session->flashdata('gagal');
        if($gagals != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Gagal!</strong> '.$gagals.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
        $suksess = $this->session->flashdata('sukses');
        if($suksess != NULL){
            echo '
            <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
              <strong>Sukses! </strong> '.$suksess.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
    ?>
  <div class="row py-2 ">
    <div class="col-sm-6">
      <h1 class="h3 mb-2 text-gray-800">Edit Data Alumni</h1>
      
    </div>
    <?php $status_operator = $this->session->userdata('status') ?>
    <div class="col-sm-6">
      <div class="d-flex flex-row-reverse bd-highlight">
      <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link active" href="<?php echo base_url("alumni/detailAlumni/".$username);?>">Batal Edit</a>
      </li>
</ul>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="col-sm-3 ">
      <div class=" mb-2">
        <div class="text-center  mt-2">
            <form action="<?php echo base_url("alumni/updateAlumni");?>" method="post" enctype="multipart/form-data">
          <?php foreach($alumni as $u){ ?>
        <img src="<?php echo base_url('foto_alumni/'.$u->foto); ?>" alt="" style="width:100%"> <br>
          <input type="file" class="form-control" name="foto">
        </div>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="">
          <div>
              <div class="form-group">
                <label for="inputAddress">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $u->nama;?>">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Username</label>
                  <input type="text" name="username" class="form-control"  value="<?= $u->username;?>">
                  <input type="hidden" name="nim" class="form-control"  value="<?= $u->nim;?>">
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
                  <input type="text" name="nomor_telepon" class="form-control" value="<?= $u->nomor_telepon;?>">
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
                <div class="form-group col-md-6">
                  <label for="inputState">Provinsi</label>
                  <select name="nama_provinsi" class="form-control" id="kategori">
                    <?php foreach($provinsi as $j): ?>
                        <option value="<?= $j->id_provinsi; ?>"
                            <?php if ($j->id_provinsi == $u->nama_provinsi) :
                                echo "selected=selected";
                            endif; ?>>
                             <?= $j->nama_provinsi; ?>
                        </option>
                    <?php endforeach; ?>         
                </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCity">Kota</label> 
                  <select name="nama_kota" class="form-control id_fiter_by" id="kategori">
                    <?php foreach($kota as $j): ?>
                        <option value="<?= $j->id_kota; ?>"
                            <?php if ($j->id_kota == $u->nama_kota) :
                                echo "selected=selected";
                            endif; ?>>
                             <?= $j->nama_kota; ?>
                        </option>
                    <?php endforeach; ?>         
                </select>
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
                  <select name="id_jurusan" class="form-control" id="exampleFormControlSelect1">
                    <?php foreach($jurusan as $j): ?>
                        <option value="<?= $j->id_jurusan; ?>"
                            <?php if ($j->id_jurusan == $u->id_jurusan) :
                                echo "selected=selected";
                            endif; ?>>
                             <?= $u->jurusan; ?>
                        </option>
                    <?php endforeach; ?>         
                </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Prodi</label>
                  <select name="id_prodi" class="form-control" id="exampleFormControlSelect1">
                    <?php foreach($prodi as $j): ?>
                        <option value="<?= $j->id_prodi; ?>"
                            <?php if ($j->id_prodi == $u->id_prodi) :
                                echo "selected=selected";
                            endif; ?>>
                             <?= $u->prodi; ?>
                        </option>
                    <?php endforeach; ?>         
                </select>
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
                  <input type="date" class="form-control" name="tanggal_yudisium" value="<?= $u->tanggal_yudisium ?>">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          <?php } ?>
          </div>
        </div>
    </div>
  </div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#kategori').change(function(){
			var id=$(this).val();
      

        $.ajax({
          url : "<?php echo base_url();?>/alumni/getDataKotaById",
          method : "POST",
          data : {id: id},
          async : false,
              dataType : 'json',
          success: function(data){
            var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                      html += '<option value='+data[i].id_kota+'>'+data[i].nama_kota+'</option>';
                  }
                  $('.id_fiter_by').html(html);
          }
        });
      

        
		});
	});
</script>