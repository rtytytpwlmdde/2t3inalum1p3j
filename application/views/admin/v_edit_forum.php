<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Update Data Forum</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'admin/groupchat/editforum'; ?>" method="POST">
                  <div class="row">
                  <?php foreach($groupchat as $u): ?>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID</label>
                        <input  disabled name="id" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id ?>"> 
                        <input  hidden name="id" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id ?>"> 
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Forum</label>
                        <input name="nama_group" type="text" class="form-control" value="<?php echo $u->nama_group ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                      <label>Jurusan</label>
                      <input  list="list_jurusan" name="id_jurusan" type="text" class="form-control" id="feInputAddress"  value="<?php echo $u->id_jurusan ?>""> 
                                <datalist id="list_jurusan">
                                    <?php foreach($jurusan as $p): ?>
                                    <option value="<?php echo $p->id_jurusan?>"><?php echo $p->id_jurusan?> - <?php echo $p->jurusan?></option>
                                    <?php endforeach ?>
                                </datalist>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                      <label>Program Studi</label>
                      <input  list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress"  value="<?php echo $u->id_prodi ?>"> 
                                <datalist id="list_prodi">
                                    <?php foreach($prodi as $p): ?>
                                    <option value="<?php echo $p->id_prodi?>"><?php echo $p->id_prodi?> - <?php echo $p->prodi?></option>
                                    <?php endforeach ?>
                                </datalist>
                    </div>
                  </div>
				  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                      <label>Tahun Masuk</label>
                    <select required  name="angkatan" id="feInputState" class="form-control"  value="<?php echo $u->angkatan ?>">
							<?php
							$mulai= date('Y') ;
							for($i = $mulai;$i>$mulai - 50;$i--){
							$sel = $i == date('Y') ? ' selected="selected"' : '';
							echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
							}
							?>
						</select>
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
