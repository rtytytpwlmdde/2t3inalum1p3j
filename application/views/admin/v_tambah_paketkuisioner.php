<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Data Forum</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'admin/paket_kuisioner/tambahPaket'; ?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" class="form-control"placeholder="Ketik.." name="nama_paket">
                      </div>
                    </div>
                  </div>
                   <button type="submit" class="btn btn-fill btn-primary">Save</button>
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
