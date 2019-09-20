<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Operator</h1>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
    </div>
  </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
  <form action="<?php echo base_url(). 'admin/user/editUser'; ?>" method="POST">
			  <?php foreach($user as $u): ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username</label>
                        <input  disabled name="username" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->username ?>"> 
                        <input  hidden name="username" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->username ?>"> 
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->password ?>"> 
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Status</label>
                        <select required  name="status" id="feInputState" class="form-control">
                                    <option value="admin" <?php echo ($u->status=='admin')?'selected="selected"':''; ?>>admin</option>
                                    <option value="operator_fakultas" <?php echo ($u->status=='operator_fakultas')?'selected="selected"':''; ?>>operator fakultas</option>
                                    <option value="operator_jurusan" <?php echo ($u->status=='operator_jurusan')?'selected="selected"':''; ?>>operator jurusan</option>
                                    <option value="operator_prodi" <?php echo ($u->status=='operator_prodi')?'selected="selected"':''; ?>>operator prodi</option>
                                    <option value="validator" <?php echo ($u->status=='validator')?'selected="selected"':''; ?>>validator</option>
                                   </select>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                        <label>Jurusan</label>
                        <select required  name="id_jurusan" id="feInputState" class="form-control">
                                <option value="" <?php echo ($u->id_jurusan=='asd')?'selected="selected"':''; ?>>Pilih Jurusan</option>
                                <?php foreach ($jurusan as $a) : ?>
                                    <option value="<?= $a->id_jurusan; ?>"
                                        <?php if ($u->id_jurusan == $a->id_jurusan) :
                                            echo "selected=selected";
                                        endif; ?>>
                                        <?= $a->jurusan; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                        <label>Program Studi </label>
                        <select required  name="id_prodi" id="feInputState" class="form-control">
                                <option value="" <?php echo ($u->id_prodi=='asd')?'selected="selected"':''; ?>>Pilih Prodi</option>
                                <?php foreach ($prodi as $a) : ?>
                                    <option value="<?= $a->id_prodi; ?>"
                                        <?php if ($u->id_prodi == $a->id_prodi) :
                                            echo "selected=selected";
                                        endif; ?>>
                                        <?= $a->prodi; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                  </div>
				   <button type="submit" class="btn btn-fill btn-primary">Save</button>
				<?php endforeach ?>
                </form>
  </div>
</div>

</div>
