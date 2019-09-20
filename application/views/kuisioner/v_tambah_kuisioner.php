<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Tambah Kusioner</h1>
            
          </div>
          
   
        <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="  mb-2">
                
                <!-- Card Body -->
                <div class="">
                <form action="<?php echo base_url(). 'kuisioner/tambahKuisioner'; ?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Kuisioner</label>
                        <input name="nama_kuisioner" type="text" class="form-control" >
                      </div>
                    </div>
                  </div>
				          <button type="submit" class="btn btn-fill btn-primary">Tambah Kuisioner</button>
                </form>
                </div>
            </div>
            </div>
        </div>




