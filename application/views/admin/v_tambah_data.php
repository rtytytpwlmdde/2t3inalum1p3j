<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah User</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'admin/user/tambahUser'; ?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="text" class="form-control" placeholder="Password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Status</label>
                        <select required  name="status" id="feInputState" class="form-control ">
                                    <option value="" selected>Pilih </option>
                                    <option value="admin">admin</option>
                                    <option value="operator_fakultas">operator fakultas</option>
                                    <option value="operator_jurusan">operator jurusan</option>
                                    <option value="operator_prodi">operator prodi</option>
                                    <option value="validator">validator</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                        <label>Jurusan</label>
                        <input  list="list_dosen" name="id_jurusan" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_dosen">
                                    <?php foreach($jurusan as $p): ?>
                                    <option value="<?php echo $p->id_jurusan?>"><?php echo $p->id_jurusan?> - <?php echo $p->jurusan?></option>
                                    <?php endforeach ?>
                                </datalist>
						</div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                        <label>Program Studi </label>
                        <input  list="list_jurusan" name="id_prodi" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_jurusan">
                                    <?php foreach($prodi as $p): ?>
                                    <option value="<?php echo $p->id_prodi?>"><?php echo $p->id_prodi?> - <?php echo $p->prodi?></option>
                                    <?php endforeach ?>
                                </datalist>
                      </div>
                    </div>
                  </div>
				   <button type="submit" class="btn btn-fill btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
                      <h5 class="title">Petunjuk</h5>
                    </a>
                    <p class="description">
                      Ceo/Co-Founder
                    </p>
                  </div>
                </p>
                <div class="card-description">
                 1. Jika Status Admin, Operator Fakultas dan Validator maka field Jurusan dan Program Studi Kosong.
                 </div>
                 <div class="card-description">
                 2. Jika Status Operator Jurusan maka field Program Studi kosong.
                 </div>
                 <div class="card-description">
                3. Jika Status Operator Prodi maka semua field wajib diisi.
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