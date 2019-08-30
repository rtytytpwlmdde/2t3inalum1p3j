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
    <h1 class="h3 mb-2 text-gray-800">Data Operator</h1>
  </div>
</div>
</div>
		<div class="card-body">
               <form action="<?php echo base_url(). 'admin/alumni/resetaksi'; ?>" method="POST">
                            <div class="form-group">
						   <label for="feInputAddress">NIM/Nama</label>
						   <input list="NIP" pattern="[0-9]{5,25}" title="Gunakan Angka, 5-25 karakter" required name="nim" class="form-control" id="feInputAddress" placeholder="Ketik Nama atau NIM"> 
                                <datalist id = "NIP">
                                <?php foreach($alumni as $u){ ?>
                                <option value="<?php echo $u->nim ?>"> <?php echo $u->nim ?> <?php echo $u->nama ?></option>
                                <?php } ?>
                                </datalist>
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
		  