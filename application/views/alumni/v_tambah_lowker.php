<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Lowongan Pekerjaan</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'alumni/lowker/tambahLowker/'; ?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Lowongan Pekerjaan</label>
                        <input type="text" class="form-control" placeholder="Ketik.." name="nama_lowongan">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input name="nama_perusahaan" type="text" class="form-control" placeholder="Ketik...">
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Posisi Jabatan</label>
                        <input name="lowongan_jabatan" type="text" class="form-control" placeholder="Ketik...">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Jumlah Pegawai Yang Dibutuhkan</label>
                        <input name="pelamar_yang_dibutuhkan" type="text" class="form-control" placeholder="Ketik...">
                      </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Syarat Lowongan</label>
                        <textarea name="syarat_pekerjaan" type="text" class="form-control" placeholder="Ketik..." rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kisaran Gaji</label>
                        <select required  name="kisaran_gaji" id="feInputState" class="form-control ">
                                    <option value="" selected>Pilih </option>
                                    <option value="1juta-3,5juta">1.000.000 - 3.500.000</option>
                                    <option value="3,5juta-5juta">3.500.000 - 5.000.000</option>
                                    <option value="5juta-10juta">5.000.000 - 10.000.000</option>
                                    <option value=">10juta">Lebih dari 10.000.000</option>
                        </select>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Perusahan</label>
                        <textarea class="form-control" name="alamat_perusahaan" type="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Email Perusahan</label>
                        <input name="email_perusahaan" type="text" class="form-control" placeholder="Ketik...">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Website Perusahaan</label>
                        <input name="website_perusahaan" type="text" class="form-control" placeholder="Ketik...">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Contact Person</label>
                        <input name="contact_person" type="number" class="form-control" placeholder="Ketik...">
                      </div>
                      <div class="form-group col-md-3">
                        <label>No Telephone Perusahaan</label>
                        <input name="no_telp_perusahaan" type="number" class="form-control" placeholder="Ketik...">
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
                </form>
              </div>
            </div>
          </div>
            </div>

	<script>

  $(document).ready(function(){

    $('#jurusan').change(function(){
      var e = document.getElementById ("jurusan");
      var id_jurusan = e.options [e.selectedIndex] .value;
      console.log(id_jurusan)
      if(id_jurusan != '')
      {
        $.ajax({
          url:"<?php echo site_url();?>/admin/user/get_prodi_by_jurusan_js",
          method: "POST",
          data:{id_jurusan:id_jurusan},
          success:function(data)
          {
            $('#prodi').html(data);
          }
        })
      }
    })
   
  })

</script>