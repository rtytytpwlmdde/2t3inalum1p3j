<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Data Alumni</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'operator_fakultas/alumni/tambahMahasiswa'; ?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control"placeholder="Ketik.." name="nim">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama</label>
                        <input name="nama" type="text" class="form-control" placeholder="Ketik..">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select required  name="jenis_kelamin" id="feInputState" class="form-control ">
                                    <option value="" selected>Pilih </option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                      <label>Tempat Lahir</label>
                        <input name="tempat_lahir" type="text" class="form-control" placeholder="Ketik..">
                    </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                      <label>Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="date" class="form-control" placeholder="Ketik..">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                  <div class="col-md-12">
                      <div class="form-group md-12">
                        <label>Kewarganegaraan</label>
                        <select required  name="kewarganegaraan" id="feInputState" class="form-control ">
                                    <option value="" selected>Pilih </option>
                                    <option value="WNI">Warga Negara Indonesia</option>
                                    <option value="WNA">Warga Negara Asing</option>
                        </select>
                     </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                      <label>Negara</label>
                      <input  list="list_negara" name="nama_negara" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_negara">
                                    <?php foreach($negara as $p): ?>
                                    <option value="<?php echo $p->nama_negara?>"><?php echo $p->id_negara?> - <?php echo $p->nama_negara?></option>
                                    <?php endforeach ?>
                                </datalist>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                      <label>Provinsi</label>
                      <input  list="list_provinsi" name="nama_provinsi" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_provinsi">
                                    <?php foreach($provinsi as $p): ?>
                                    <option value="<?php echo $p->nama_provinsi?>"><?php echo $p->id_provinsi?> - <?php echo $p->nama_provinsi?></option>
                                    <?php endforeach ?>
                                </datalist>
                    </div>
                  </div>
                  <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                      <label>Kota</label>
                        <input  list="list_kota" name="nama_kota" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_kota">
                                    <?php foreach($kota as $p): ?>
                                    <option value="<?php echo $p->nama_kota?>"><?php echo $p->id_kota?> - <?php echo $p->nama_kota?></option>
                                    <?php endforeach ?>
                                </datalist>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Kode Pos</label>
                        <input name="kode_pos" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
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
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                      <label>Program Studi</label>
                      <input  list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_prodi">
                                    <?php foreach($prodi as $p): ?>
                                    <option value="<?php echo $p->id_prodi?>"><?php echo $p->id_prodi?> - <?php echo $p->prodi?></option>
                                    <?php endforeach ?>
                                </datalist>
                    </div>
                  </div>
                  <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                      <label>Jenjang Pendidikan</label>
                      <select required  name="jenjang" id="feInputState" class="form-control ">
                                    <option value="" selected>Pilih </option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                        </select>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                      <label>Tahun Masuk</label>
                    <select required  name="angkatan" id="feInputState" class="form-control">
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
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                      <label>Tahun Lulus</label>
                      <select required  name="tahun_lulus" id="feInputState" class="form-control">
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
                  <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                      <label>Tanggal Yudisium</label>
                      <input name="tanggal_yudisium" type="date" class="form-control" placeholder="Ketik..">
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input name="nomor_telepon" type="number" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input name="nomor_hp" type="number" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label> Email</label>
                        <input name="email" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Facebook</label>
                        <input name="facebook" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Twitter</label>
                        <input name="twitter" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
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
          url:"<?php echo site_url();?>/operator_fakultas/user/get_prodi_by_jurusan_js",
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
