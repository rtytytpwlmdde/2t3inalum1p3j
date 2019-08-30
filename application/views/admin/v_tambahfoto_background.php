<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Lowongan Pekerjaan</h5>
              </div>
              <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php echo site_url('admin/background_foto/tambahFoto') ?>" enctype="multipart/form-data"> <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username</label>
                         <input disabled type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $this->session->userdata('username'); ?>"> 
						<input hidden name="username" type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $this->session->userdata('username'); ?>"> 
                    
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Foto</label>
                        <input class="form-control" name="userfile" id="userfile" placeholder="" type="file">
                      </div>
                    </div>
                  </div>
                   <button type="submit" class="btn btn-fill btn-primary">Save</button>
                </form>
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