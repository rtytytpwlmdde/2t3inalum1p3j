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
            <h1 class="h3 mb-0 text-gray-800">Tambah Operator </h1>
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
                    <form action="<?php echo base_url(). 'admin/user/tambahUser'; ?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="text" class="form-control" placeholder="Password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Status</label>
                        <select required  name="status" id="feInputState" class="form-control ">
                                    <option value="" selected>Pilih </option>
                                    <option value="admin">admin</option>
                                    <option value="operator_fakultas">operator fakultas</option>
                                    <option value="operator_jurusan">operator jurusan</option>
                                    <option value="operator_prodi">operator prodi</option>
                                    <option value="validator">validator</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group-md-12">
                        <label>Jurusan</label>
                        <input  list="list_dosen" name="id_jurusan" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_dosen">
                                    <?php foreach($jurusan as $p): ?>
                                    <option value="<?php echo $p->id_jurusan?>"><?php echo $p->id_jurusan?> - <?php echo $p->jurusan?></option>
                                    <?php endforeach ?>
                                </datalist>
						</div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group-md-12">
                        <label>Program Studi </label>
                        <input  list="list_jurusan" name="id_prodi" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_jurusan">
                                    <?php foreach($prodi as $p): ?>
                                    <option value="<?php echo $p->id_prodi?>"><?php echo $p->id_prodi?> - <?php echo $p->prodi?></option>
                                    <?php endforeach ?>
                                </datalist>
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

