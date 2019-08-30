<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Update Data Forum</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'operator_fakultas/paket_kuisioner/editpaket'; ?>" method="POST">
                  <div class="row">
                  <?php foreach($paket_kuisioner as $u): ?>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID</label>
                        <input  disabled name="id_paket" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_paket ?>"> 
                        <input  hidden name="id_paket" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_paket?>"> 
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Forum</label>
                        <input name="nama_paket" type="text" class="form-control" value="<?php echo $u->nama_paket ?>">
                      </div>
                    </div>
                  </div>
				   <button type="submit" class="btn btn-fill btn-primary">Save</button>
                   <?php endforeach ?>
                </form>
              </div>
            </div>
          </div>
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
