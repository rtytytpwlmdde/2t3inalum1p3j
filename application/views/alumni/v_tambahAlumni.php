<div class="container-fluid pb-3 ">
<?php
        $gagal = $this->session->flashdata('gagal');
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
        if($sukses != NULL){
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
      <h1 class="h3 mb-2 text-gray-800">Data Alumni</h1>
      
    </div>
    <?php $status_operator = $this->session->userdata('status') ?>
    <div class="col-sm-6">
      <div class="d-flex flex-row-reverse bd-highlight">
      
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="col-sm-3 ">
      <div class=" mb-2">
        <div class="text-center  mt-2">
            <form action="<?php echo base_url("alumni/tambahAlumni");?>" method="post" enctype="multipart/form-data" >
          <img src="<?php echo base_url('assets/images/users/guest.jpg'); ?>" alt="" style="width:100%"> <br>
          <input type="file" name="foto" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="">
          <div>
              <div class="form-group">
                <label for="inputAddress">Nama</label>
                <input type="text" name="nama" class="form-control" >
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Nim</label>
                  <input type="text" name="nim" class="form-control"  >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Password</label>
                  <input type="password" name="password" class="form-control"  >
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputEmail4">Jenis Kelamin</label>
                    <select   name="jenis_kelamin" id="singleSelectDD"  class=" form-control">
                        <option value="" selected>Pilih </option>
                        <option value="laki-laki" selected>Laki-laki </option>
                        <option value="perempuan" selected>Perempuan </option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control"  >
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">Tanggal Lahir</label>
                  <input type="date" class="form-control"  >
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputAddress">Email</label>
                  <input type="email" name="email" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                  <label for="inputAddress">Telpon</label>
                  <input type="text" name="nomor_telpon" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                  <label for="inputAddress">HP</label>
                  <input type="text" name="nomor_hp" class="form-control" >
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress2">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Apartment, studio, or floor" >
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputState">Provinsi</label>
                    <select name="nama_provinsi" id="kategori"   class="form-control" >
                        <option value="" selected>Pilih Provinsi</option>
                        <?php foreach($provinsi as $u){ ?>
                            <option value="<?= $u->id_provinsi?>"><?= $u->nama_provinsi?></option>
                        <?php } ?>
                    </select>  
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity">Kota</label>
                    <select   name="nama_kota" id="singleSelectDD"  class="id_fiter_by form-control">
                        <option value="" selected>Pilih </option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Zip</label>
                  <input type="text" class="form-control" name="kode_pos" >
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">Facebook</label>
                  <input type="text" class="form-control" name="facebook" >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Twitter</label>
                  <input type="text" class="form-control" name="twitter" >
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">Jurusan</label>
                     <select name="id_jurusan" id="kategori"   class="form-control" >
                        <option value="" selected>Pilih Jurusan</option>
                        <?php foreach($jurusan as $u){ ?>
                            <option value="<?= $u->id_jurusan?>"><?= $u->jurusan?></option>
                        <?php } ?>
                    </select>  
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Prodi</label> 
                  <select name="id_prodi" id="kategori"   class="form-control" >
                        <option value="" selected>Pilih Prodi</option>
                        <?php foreach($prodi as $u){ ?>
                            <option value="<?= $u->id_prodi?>"><?= $u->prodi?></option>
                        <?php } ?>
                    </select>  
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputCity">Angkatan</label>
                  <input type="text" class="form-control"name="angkatan" >
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Tahun Lulus</label>
                  <input type="text" class="form-control" name="tahun_lulus" >
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Tanggal Yudisium</label>
                  <input type="text" class="form-control" name="tanggal_yudisium" >
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
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