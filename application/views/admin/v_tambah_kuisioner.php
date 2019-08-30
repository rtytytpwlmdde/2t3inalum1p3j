<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Data Kuisioner</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'admin/kuisioner/tambahKuisioner'; ?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kuisioner</label>
                        <input type="text" class="form-control"placeholder="Ketik.." name="kuisioner">
                      </div>
                    </div>
                  </div><div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Kuisioner</label>
                        <select required  name="jenis_kuisioner" id="feInputState" class="form-control ">
                                    <option value="" selected>Pilih </option>
                                    <option value="CheckBox">CheckBox</option>
                                    <option value="Multiple Choice">Multiple Choice</option>
                                    <option value="Paragraf">Paragraf</option>
                        </select>
                      </div>
                    </div>
                  </div><div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kuisioner</label>
                        <select required  name="tahun_angkatan" id="feInputState" class="form-control">
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
				  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jurusan</label>
                        <input  list="list_jurusan" name="id_jurusan" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_jurusan">
                                    <?php foreach($jurusan as $p): ?>
                                    <option value="<?php echo $p->id_jurusan?>"><?php echo $p->id_jurusan?> - <?php echo $p->jurusan?></option>
                                    <?php endforeach ?>
                                </datalist>
                      </div>
                    </div>
                  </div>
				  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Program Studi</label>
                        <input  list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_prodi">
                                    <?php foreach($prodi as $p): ?>
                                    <option value="<?php echo $p->id_prodi?>"><?php echo $p->id_prodi?> - <?php echo $p->prodi?></option>
                                    <?php endforeach ?>
                                </datalist>
                      </div>
                    </div>
                  </div> 
				   <input type="hidden" name="id_paket_kuisioner" value="<?= $paket_kuisioner ?>">
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
