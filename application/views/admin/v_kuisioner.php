<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data  Kuisioner</h1>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
	 <a href="<?php echo base_url('admin/kuisioner/inputKuisioner/'.$paket_kuisioner); ?>" class="btn btn-info">Tambah Kuisioner</a>
	</div>
  </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
					    <th> Nama Paket Kuisioner </th>
					    <th> Pertanyaan</th>
					    <th> Tipe Kuisioner </th>
					    <th> Tahun Angkatan </th>
					    <th> Jurusan </th>
					    <th> Prodi </th>
					    <th> Pembuat</th>
					    <th> Jawaban Kuisioner </th>
                        <th> Aksi</th>
                      </tr>
        </thead>
        <tbody>
		<?php 
                     foreach ($kuisioner as $u){ 
                    ?>
                <tr>
						<td><?php echo $u->nama_paket ?></td>
                        <td>
						<?php echo $u->kuisioner ?>
						</td>
						<td>
						<?php echo $u->jenis_kuisioner ?>
						</td><td>
						<?php echo $u->tahun_angkatan ?>
						</td>
						<td><?php foreach ($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?></td>
						<td><?php foreach ($prodi as $a){if ($a->id_prodi == $u->id_prodi) :echo $a->prodi;endif;}  ?></td>
						<td><?php echo $u->pembuat ?></td>
						<td><a href="<?php echo site_url('admin/jawaban_kuisioner/jawaban/'.$u->id_kuisioner); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
                        <i class="fa fa-trash">Pilihan Jawaban</i>
                        </a>
						</td>
                        <td>
						<a href="<?php echo site_url('admin/kuisioner/updateKuisioner/'.$u->id_kuisioner); ?>" type="button"  rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon" title="Edit">
                        <i class="fa fa-edit"></i>
						</a>
						<a href="<?php echo site_url('admin/kuisioner/hapusKuisiner/'.$u->id_kuisioner); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
                        <i class="fa fa-trash"></i>
                        </a>
						</td>
                </tr>
                <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<div class="modal fade" id="modal-add-soal" role="dialog">
  <div class="modal-dialog">
    <form class="" action="<?php echo site_url('admin/kuisioner/tambahKuisioner') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" name="button"></button>
          <h4 class="modal-title"></i>Tambah Soal</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-horizontal">
              <div class="box-body">
			  <?php foreach($kuisioner as $u): ?>
				<input type="hidden" name="`id_paket_kuisioner" id="`id_paket_kuisioner" value="<?php echo $u->id_paket ?>" placeholder="">
				<?php endforeach ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="">Tipe Soal</label>
                  <div class="col-sm-9">
                    <select name="jenis_kuisioner" id="tipe_soal" class="form-control">
                      <option selected disabled>Pilih Tipe Soal</option>
                      <option value="Checkbox">Checkbox</option>
                      <option value="Multiple Choice">Multiple choice</option>
                      <option value="Dropdown">Dropdown</option>
                      <option value="Paragraf Text">Paragraf Text</option>
                      <option value="Short Text">Short Text</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="">Soal</label>
                  <div class="col-sm-9">
                    <input type="text" name="kuisioner" id="kuisioner" class="form-control" value="" placeholder="Masukan Soal..."required>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label" for="">Tahun Angkatan</label>
                  <div class="col-sm-9">
                    <select required  name="tahun_angkatan" id="feInputState" class="form-control">
							<?php
							$mulai= date('Y') ;
							for($i = $mulai;$i>$mulai - 50;$i--){
							$sel = $i == date('Y') ? ' selected="selected"' : '';
							echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
							}
							?>
						</select></div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label" for="">Jurusan</label>
                  <div class="col-sm-9">
                   <input  list="list_jurusan" name="id_jurusan" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_jurusan">
                                    <?php foreach($jurusan as $p): ?>
                                    <option value="<?php echo $p->id_jurusan?>"><?php echo $p->id_jurusan?> - <?php echo $p->jurusan?></option>
                                    <?php endforeach ?>
                                </datalist></div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label" for="">Program Studi</label>
                  <div class="col-sm-9">
                  <input  list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_prodi">
                                    <?php foreach($prodi as $p): ?>
                                    <option value="<?php echo $p->id_prodi?>"><?php echo $p->id_prodi?> - <?php echo $p->prodi?></option>
                                    <?php endforeach ?>
                                </datalist>
				  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="button">Tambah Soal</button>
          <button type="submit" class="btn btn-default" data-dismiss="modal" name="button">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modal-update-soal" role="dialog">
  <div class="modal-dialog">
    <form class="" action="<?php echo site_url('admin/daftar_soal/update_soal') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" name="button"></button>
          <h4 class="modal-title"></i>Update Soal</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-horizontal">
              <div class="box-body">
                <input type="hidden" name="id_paket_up" id="id_paket_up" value="" placeholder="">
                <div class="form-group">
                  <div class="col-sm-9"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="">Tipe Soal</label>
                  <div class="col-sm-9">
                    <input type="hidden" id="id_soal_up" name="id_soal_up" value="">
                    <select name="tipe_soal_up" id="tipe_soal_up" class="form-control">
                      <option selected disabled>Pilih tipe soal</option>
                      <option value="Checkbox">Checkbox</option>
                      <option value="Multiple Choice">Multiple choice</option>
                      <option value="Dropdown">Dropdown</option>
                      <option value="Paragraf Text">Paragraf Text</option>
                      <option value="Short Text">Short Text</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="">Soal</label>
                  <div class="col-sm-9">
                    <input type="text" name="soal_up" id="soal_up" class="form-control" value="" placeholder="Masukan Soal..."required>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="button">Update Soal</button>
          <button type="submit" class="btn btn-default" data-dismiss="modal" name="button">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>