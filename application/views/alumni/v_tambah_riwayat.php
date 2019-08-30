<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Riwayat Pekerjaan</h1>
            
          </div>
          
   
        <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="  mb-2">
                
                <!-- Card Body -->
                <div class="">
                <form action="<?php echo base_url(). 'alumni/profil/tambahPekerjaan'; ?>" method="POST">
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
                        <label>Perusahaan</label>
                        <input name="tempat_kerja" type="text" class="form-control" placeholder="Ketik...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Posisi/Jabatan</label>
                        <input name="posisi" type="text" class="form-control" placeholder="Ketik...">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Gologan PNS</label>
                        <input name="golongan_pns" type="text" class="form-control" placeholder="Ketik...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Gaji</label>
                        <input name="pendapatan_per_bulan" type="text" class="form-control" placeholder="Ketik...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Mulai Bekerja</label>
                        <input name="mulai_kerja" type="date" class="form-control" placeholder="Ketik...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Berhenti Bekerja</label>
                        <input name="berhenti_kerja" type="date" class="form-control" placeholder="Ketik...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Bekerja</label>
                        <input name="alamat_kerja" type="text" class="form-control" placeholder="Ketik...">
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