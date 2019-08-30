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
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data operator_jurusan</h1>
  </div>
  <div class="col-12 col-sm-0 text-center text-sm-left mb-4 mb-sm-0">
  <div  style="float:right" >
    <div class="d-flex flex-row-reverse bd-highlight">
    <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
    
    </div>
    </div>
  </div>
</div>
		<div class="card-body">
               <form action="<?php echo base_url(). 'operator_jurusan_fakultas/alumni/cek_alumni'; ?>" method="POST">
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
		  