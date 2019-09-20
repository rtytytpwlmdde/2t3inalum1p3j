<?php
        $gagals = $this->session->flashdata('gagals');
        if($gagals != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Gagal!</strong> '.$gagals.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
        $suksess = $this->session->flashdata('suksess');
        if($suksess != NULL){
            echo '
            <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
              <strong>Sukses! </strong> '.$suksess.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
    ?>
    <input  hidden type="text" id="sukses" value="<?php echo $sukses = $this->session->flashdata('sukses');?>">
<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reset Password </h1>
            <div class="timeline-manage">
            <div class="btn-group" role="group">   
                  
              </div>
            </div>
          </div>
          


        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class=" h-100 ">
                <div class="">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    
                    <form action="<?php echo base_url(). 'operator_fakultas/alumni/resetaksi'; ?>" method="POST">
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
              </div>
            </div>
        </div>
</div>

