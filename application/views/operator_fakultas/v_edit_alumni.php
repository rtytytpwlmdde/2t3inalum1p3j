<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Update Data Alumni</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url(). 'operator_fakultas/alumni/editMahasiswa'; ?>" method="POST">
                  <div class="row">
                  <?php foreach($alumni as $u): ?>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>NIM</label>
                        <input  disabled name="nim" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->nim ?>"> 
                        <input  hidden name="nim" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->nim ?>"> 
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama</label>
                        <input name="nama" type="text" class="form-control" value="<?php echo $u->nama ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select required  name="jenis_kelamin" id="feInputState" class="form-control "value="<?php echo $u->jenis_kelamin ?>">
                                 <option value="laki-laki" <?php echo ($u->jenis_kelamin=='laki-laki')?'selected="selected"':''; ?>>Laki-Laki</option>
                                   <option value="perempuan" <?php echo ($u->jenis_kelamin=='perempuan')?'selected="selected"':''; ?>>Perempuan</option>
                                   
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                      <label>Tempat Lahir</label>
                        <input name="tempat_lahir" type="text" class="form-control" value="<?php echo $u->tempat_lahir ?>">
                    </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                      <label>Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="date" class="form-control" value="<?php echo $u->tanggal_lahir ?>">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                  <div class="col-md-12">
                      <div class="form-group md-12">
                        <label>Kewarganegaraan</label>
                        <select required  name="kewarganegaraan" id="feInputState" class="form-control ">
                                    <option value="WNI" <?php echo ($u->kewarganegaraan=='WNI')?'selected="selected"':''; ?>>Warga Negara Indonesia</option>
                                   <option value="WNA" <?php echo ($u->kewarganegaraan=='WNA')?'selected="selected"':''; ?>>Warga Negara Asing</option>
                                   
                        </select>
                     </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                      <label>Negara</label>
                      <input  list="list_negara" name="nama_negara" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->nama_negara ?>"> 
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
                      <input  list="list_provinsi" name="nama_provinsi" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->nama_provinsi ?>"> 
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
                        <input  list="list_kota" name="nama_kota" type="text" class="form-control" id="feInputAddress"  value="<?php echo $u->nama_kota ?>"> 
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
                        <input name="alamat" type="text" class="form-control" id="feInputAddress"  value="<?php echo $u->alamat ?>"> 
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Kode Pos</label>
                        <input name="kode_pos" type="text" class="form-control" id="feInputAddress"  value="<?php echo $u->kode_pos ?>"> 
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
                  <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                      <label>Jenjang Pendidikan</label>
                      <select required  name="jenjang" id="feInputState" class="form-control "  value="<?php echo $u->jenjang ?>">
                                 <option value="D3" <?php echo ($u->jenjang=='D3')?'selected="selected"':''; ?>>D3</option>
                                    <option value="D4" <?php echo ($u->jenjang=='D4')?'selected="selected"':''; ?>>D4</option>
                                    <option value="S1" <?php echo ($u->jenjang=='S1')?'selected="selected"':''; ?>>S1</option>
                                    <option value="S2" <?php echo ($u->jenjang=='S2')?'selected="selected"':''; ?>>S2</option>
                                    <option value="S3" <?php echo ($u->jenjang=='S3')?'selected="selected"':''; ?>>S3</option>
                                   
                                   </select>
                        </select>
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
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                      <label>Tahun Lulus</label>
                      <select required  name="tahun_lulus" id="feInputState" class="form-control"  value="<?php echo $u->tahun_lulus ?>">
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
                      <input name="tanggal_yudisium" type="date" class="form-control"  value="<?php echo $u->tanggal_yudisium ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input name="nomor_telepon" type="number" class="form-control" id="feInputAddress" value="<?php echo $u->nomor_telepon ?>"> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input name="nomor_hp" type="number" class="form-control" id="feInputAddress"  value="<?php echo $u->nomor_hp ?>"> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label> Email</label>
                        <input name="email" type="text" class="form-control" id="feInputAddress"  value="<?php echo $u->email ?>"> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Facebook</label>
                        <input name="facebook" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->facebook ?>"> 
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Twitter</label>
                        <input name="twitter" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->twitter ?>"> 
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
