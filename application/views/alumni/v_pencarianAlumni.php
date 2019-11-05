<div class="container-fluid">
<?php
        $notif = $this->session->flashdata('notif');
        if($notif != NULL){
            echo '
            <div class="alert alert-accent alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-close text-white"></i></span>
            </button>
            <i class="fa fa-info mx-2"></i>
            <strong>'.$notif.'</strong> 
            </div>
            ';
        }
    ?>
<!-- Page Heading -->
<div class="row ">
  <div class="col-sm-6 pt-2 ">
    <h1 class="h3 mb-2 text-gray-800">Data Alumni</h1>
  </div>
  <div class="col-6 pt-2 col-sm-0 text-center text-sm-left mb-4 mb-sm-0">
  <div class="d-flex flex-row-reverse bd-highlight">
    <div class="d-flex flex-row-reverse bd-highlight">
      <a href="<?php echo base_url('user/inputUser'); ?>" class="btn btn-sm btn-info">Export Data Alumni</a>
      <a href="<?php echo base_url('alumni/formTambahAlumni'); ?>" class="btn btn-sm btn-info">Tambah Data Alumni</a>
    </div>
  </div>
</div>
		<div class="card-body ">
               <form action="<?php echo base_url(). 'alumni/cek_alumni'; ?>" method="POST">
                            <div class="form-group">
						   <label for="feInputAddress">Jurusan</label>
						   <select required  name="id_jurusan" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($jurusan as $u ){ ?>
                                    <option value="<?php echo $u->id_jurusan;?>"><?php echo $u->jurusan;     ?></option> 
                                    <?php } ?>
                                </select>
							<label for="feInputAddress">Tahun Angkatan</label>
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
                        <button type="submit" class="btn btn-primary btn-user ">
                        Search</button>
                </form>
              </div>
            </div>
          </div>