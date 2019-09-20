<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Update Kusioner</h1>
            
          </div>
          
   
        <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="  mb-2">
                
                <!-- Card Body -->
                <div class="">
                <?php 
                    foreach($kuisioner as $u){
                ?>
                <form action="<?php echo base_url(). 'kuisioner/updateKuisioner'; ?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID Kuisioner</label>
                        <input disabled name="id_kuisioner" type="text" class="form-control" value="<?= $u->id_kuisioner; ?>">
                        <input hidden name="id_kuisioner" type="text" class="form-control" value="<?= $u->id_kuisioner; ?>">
                      </div>
                      <div class="form-group">
                        <label>Nama Kuisioner</label>
                        <input name="nama_kuisioner" type="text" class="form-control" value="<?= $u->nama_kuisioner; ?>">
                      </div>
                    </div>
                  </div>
				          <button type="submit" class="btn btn-fill btn-primary">Update Kuisioner</button>
                </form>
                <?php 
                    }
                ?>
                </div>
            </div>
            </div>
        </div>




