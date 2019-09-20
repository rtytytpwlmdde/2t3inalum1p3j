

<div class="container-fluid">
<?php 
  $status_operator = $this->session->userdata('status');
  $operator_prodi = $this->session->userdata('id_prodi');

?>
  <!-- Page Heading -->
  <div class="row pt-2">
    <div class="col-sm-6">
      <h1 class="h3 mb-2 text-gray-800">Detail Kuisioner</h1> 
      <h5 class="h5 mb-2 text-gray-600"><?= $nama_kuisioner; ?></h5>
  <?php foreach($jumPertanyaan as $s){  $nomor =  $s->jumPertanyaan+1; } ?>
    </div>
    <div class="col-sm-6">
      <div class="d-flex flex-row-reverse bd-highlight mb-1">
            <a class="btn btn-sm btn-outline-secondary" href="<?php echo base_url('kuisioner/previewKuisioner/'.$id_kuisioner); ?>"><i class="fas fa-eye"></i> Preview</a>
            <a class="btn btn-sm btn-primary text-white "  data-toggle="modal" data-target="#modalTambahPertanyaan">Tambah Pertanyaan</a>
      </div>
    </div>
  </div>
  <!-- DataTales Example -->
  <?php foreach ($kuisioner as $u){?>
    <?php if($u->jenis_pertanyaan == '1'){?>
    <?php if($status_operator == 'operator_fakultas' || $operator_prodi == $u->id_prodi){?>
          <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-12 col-md-12 mb-2">
                <div class="card border-left-info  h-100 ">
                  <div class="card-body">
                    <div class=" no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class=" no-gutters align-items-center">
                              <div class="row profile-rows">
                                <div class="col-md-1"  style="max-width: 50px">
                                    <div class="text-gray-800 py-2" style="font-size: 1.8em;">
                                      <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                        data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" class="open-modalEditPertanyaan text-dark" href="#modalEditPertanyaan"><?= $u->nomor_pertanyaan;?></a>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-gray-800" >
                                    <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                        data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" class="open-modalEditPertanyaan text-dark" href="#modalEditPertanyaan"><?= $u->nama_pertanyaan;?></a>
                                  </div>
                                    <div class="text-gray-800" >
                                    <input type="text" class=" form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-gray-800 py-4 " style="font-size: 0.8em;"><span class="badge badge-warning"><?= $u->nama_jenis_pertanyaan; ?></span><br>
                                      <?php if($u->level_pertanyaan == 'operator_fakultas'){?>
                                        <span class="text-danger"><?= $u->level_pertanyaan; ?> </span>
                                      <?php }else{?>
                                        <span class="text-danger"><?= $u->prodi; ?> </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="text-center  py-3 align-items-right d-flex flex-row-reverse bd-highlight">
                                        <a title="hapus pertanyaan ini" class="btn btn-sm btn-danger text-white "><i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    <?php }else{?>
      <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-secondary  h-100 ">
                <div class="card-body bg-disabled">
                  <div class=" no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                            <div class="row profile-rows">
                              <div class="col-md-1"  style="max-width: 50px">
                                  <div class="text-gray-800 py-2" style="font-size: 1.8em;">
                                    <a><?= $u->nomor_pertanyaan;?></a>
                                </div>
                              </div>
                              <div class="col-md-11">
                                <div class="text-gray-800" >
                                  <a  class="text-dark" ><?= $u->nama_pertanyaan;?></a>
                                </div>
                                <div class="text-gray-800" >
                                    <input type="text" class=" form-control">
                                </div>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    <?php } ?>
  <?php } ?>

  <?php if($u->jenis_pertanyaan == '2'){?>
    <?php if($status_operator == 'operator_fakultas' || $operator_prodi == $u->id_prodi){?>
          <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-12 col-md-12 mb-2">
                <div class="card border-left-info  h-100 ">
                  <div class="card-body">
                    <div class=" no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class=" no-gutters align-items-center">
                              <div class="row profile-rows">
                                <div class="col-md-1" style="max-width: 50px">
                                    <div class="text-gray-800 py-2" style="font-size: 1.8em;"> <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                        data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" class="open-modalEditPertanyaan text-dark" href="#modalEditPertanyaan"><?= $u->nomor_pertanyaan;?></a>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-gray-800" >
                                      <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                          data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" class="open-modalEditPertanyaan text-dark" href="#modalEditPertanyaan"><?= $u->nama_pertanyaan;?></a>
                                    </div>
                                    <div class="text-gray-800" >
                                      <textarea class="form-control"  name="nama_pertanyaan" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-gray-800 py-4 " style="font-size: 0.8em;"><span class="badge badge-primary"><?= $u->nama_jenis_pertanyaan; ?></span><br>
                                      <?php if($u->level_pertanyaan == 'operator_fakultas'){?>
                                        <span class="text-danger"><?= $u->level_pertanyaan; ?> </span>
                                      <?php }else{?>
                                        <span class="text-danger"><?= $u->prodi; ?> </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="text-center  py-3 align-items-right d-flex flex-row-reverse bd-highlight">
                                        <a title="hapus pertanyaan ini" class="btn btn-sm btn-danger text-white "><i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    <?php }else{ ?>
      <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-secondary  h-100 ">
                <div class="card-body bg-disabled">
                  <div class=" no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                            <div class="row profile-rows">
                              <div class="col-md-1" style="max-width: 50px">
                                  <div class="text-gray-800 py-2" style="font-size: 1.8em;"> <a ><?= $u->nomor_pertanyaan;?></a>
                                </div>
                              </div>
                              <div class="col-md-11">
                                  <div class="text-gray-800" >
                                    <a  ><?= $u->nama_pertanyaan;?></a>
                                  </div>
                                  <div class="text-gray-800" >
                                    <textarea class="form-control"  name="nama_pertanyaan" rows="3"></textarea>
                                  </div>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    <?php } ?>
  <?php } ?>


  <?php if($u->jenis_pertanyaan == '3'){?>
    <?php if($status_operator == 'operator_fakultas' || $operator_prodi == $u->id_prodi){?>
          <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-12 col-md-12 mb-2">
                <div class="card border-left-info  h-100 ">
                  <div class="card-body">
                    <div class=" no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class=" no-gutters align-items-center">
                              <div class="row profile-rows">
                                <div class="col-md-1" style="max-width: 50px">
                                    <div class="text-gray-800 py-2" style="font-size: 1.8em;"> <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                        data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" class="open-modalEditPertanyaan text-dark" href="#modalEditPertanyaan"><?= $u->nomor_pertanyaan;?></a>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-gray-800 mb-1 h5" >
                                    <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                        data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" class="open-modalEditPertanyaan text-dark" href="#modalEditPertanyaan"><?= $u->nama_pertanyaan;?></a>
                                  </div>
                                  <?php foreach ($pilihan_jawaban as $cb){
                                    if($cb->id_pertanyaan == $u->id_pertanyaan){?>
                                    <div class="text-gray-800 ml-3" >
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                          <a style="cursor: pointer;"  data-toggle="modal" title="klik untuk mengedit atau menghapus pilihan jawaban ini" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pilihan_jawaban="<?= $cb->id_pilihan_jawaban; ?>" data-nama_pilihan_jawaban="<?= $cb->nama_pilihan_jawaban; ?>"
                                            class="open-modalEditJawabanPertanyaan text-dark" href="#modalEditJawabanPertanyaan" ><?= $cb->nama_pilihan_jawaban; ?>
                                          </a>
                                        </label>
                                      </div>
                                    </div>
                                  <?php } } ?>
                                  <a data-toggle="modal"  style="cursor: pointer; font-size:0.8em;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" data-jenis="<?= $u->jenis_pertanyaan; ?>" class="open-modalTambahPilihanJawaban text-primary ml-3" href="#modalTambahPilihanJawaban"><i class="fas fa-plus-circle"></i> tambah jawaban</a>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-gray-800 py-4 " style="font-size: 0.8em;"><span class="badge badge-info"><?= $u->nama_jenis_pertanyaan; ?></span><br>
                                      <?php if($u->level_pertanyaan == 'operator_fakultas'){?>
                                        <span class="text-danger"><?= $u->level_pertanyaan; ?> </span>
                                      <?php }else{?>
                                        <span class="text-danger"><?= $u->prodi; ?> </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="text-center  py-3 align-items-right d-flex flex-row-reverse bd-highlight">
                                        <a title="hapus pertanyaan ini" class="btn btn-sm btn-danger text-white "><i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      <?php }else{ ?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-secondary  h-100 ">
                <div class="card-body bg-disabled">
                  <div class=" no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                            <div class="row profile-rows">
                              <div class="col-md-1" style="max-width: 50px">
                                  <div class="text-gray-800 py-2" style="font-size: 1.8em;"> <a><?= $u->nomor_pertanyaan;?></a>
                                </div>
                              </div>
                              <div class="col-md-11">
                                  <div class="text-gray-800 mb-1 h5" >
                                  <a ><?= $u->nama_pertanyaan;?></a>
                                </div>
                                <?php foreach ($pilihan_jawaban as $cb){
                                  if($cb->id_pertanyaan == $u->id_pertanyaan){?>
                                  <div class="text-gray-800 ml-3" >
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                      <label class="form-check-label" for="defaultCheck1">
                                        <a ><?= $cb->nama_pilihan_jawaban; ?></a>
                                      </label>
                                    </div>
                                  </div>
                                <?php } } ?>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      <?php } ?>
  <?php } ?>

  <?php if($u->jenis_pertanyaan == '4'){?>
    <?php if($status_operator == 'operator_fakultas' || $operator_prodi == $u->id_prodi){?>
          <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-12 col-md-12 mb-2">
                <div class="card border-left-info  h-100 ">
                  <div class="card-body">
                    <div class=" no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class=" no-gutters align-items-center">
                              <div class="row profile-rows">
                                <div class="col-md-1" style="max-width: 50px">
                                    <div class="text-gray-800 py-2" style="font-size: 1.8em;"> <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                        data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" class="open-modalEditPertanyaan text-dark" href="#modalEditPertanyaan"><?= $u->nomor_pertanyaan;?></a>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-gray-800 mb-1 h5" >
                                    <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                        data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" class="open-modalEditPertanyaan text-dark" href="#modalEditPertanyaan"><?= $u->nama_pertanyaan;?></a>
                                  </div>
                                  <?php foreach ($pilihan_jawaban as $cb){
                                    if($cb->id_pertanyaan == $u->id_pertanyaan){?>
                                    <div class="text-gray-800 " >
                                      <div class="form-check" >
                                        <label class="btn btn-sm dropdown-toggle" for="defaultCheck1" style="background-color: #4b48481c">
                                          <a style="cursor: pointer;"  data-toggle="modal" title="klik untuk mengedit atau menghapus pilihan jawaban ini" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pilihan_jawaban="<?= $cb->id_pilihan_jawaban; ?>" data-nama_pilihan_jawaban="<?= $cb->nama_pilihan_jawaban; ?>"
                                            class="open-modalEditJawabanPertanyaan text-dark" href="#modalEditJawabanPertanyaan" ><?= $cb->nama_pilihan_jawaban; ?>
                                          </a>
                                        </label>
                                      </div>
                                    </div>
                                  <?php } } ?>
                                  <a data-toggle="modal"  style="cursor: pointer; font-size:0.8em;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" data-jenis="<?= $u->jenis_pertanyaan; ?>" class="ml-3 open-modalTambahPilihanJawaban text-primary" href="#modalTambahPilihanJawaban"><i class="fas fa-plus-circle"></i> tambah jawaban</a>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-gray-800 py-4 " style="font-size: 0.8em;"><span class="badge badge-kuning"><?= $u->nama_jenis_pertanyaan; ?></span><br>
                                      <?php if($u->level_pertanyaan == 'operator_fakultas'){?>
                                        <span class="text-danger"><?= $u->level_pertanyaan; ?> </span>
                                      <?php }else{?>
                                        <span class="text-danger"><?= $u->prodi; ?> </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="text-center  py-3 align-items-right d-flex flex-row-reverse bd-highlight">
                                        <a title="hapus pertanyaan ini" class="btn btn-sm btn-danger text-white "><i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    <?php }else{ ?>
      <div class="row ">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-secondary  h-100 ">
                <div class="card-body bg-disabled">
                  <div class=" no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                            <div class="row profile-rows">
                              <div class="col-md-1" style="max-width: 50px">
                                  <div class="text-gray-800 py-2" style="font-size: 1.8em;"> <a><?= $u->nomor_pertanyaan;?></a>
                                </div>
                              </div>
                              <div class="col-md-11">
                                  <div class="text-gray-800 mb-1 h5" >
                                  <a ><?= $u->nama_pertanyaan;?></a>
                                </div>
                                  <div class="text-gray-800 " >
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <?php foreach ($pilihan_jawaban as $cb){
                                            if($cb->id_pertanyaan == $u->id_pertanyaan){?>
                                            <option><?= $cb->nama_pilihan_jawaban; ?></option>
                                             <?php } } ?>
                                        </select>
                                    </div>
                                  </div>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    <?php } ?>
  <?php } ?>

  <?php if($u->jenis_pertanyaan == '5'){?>
    <?php if($status_operator == 'operator_fakultas' || $operator_prodi == $u->id_prodi){?>
          <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-12 col-md-12 mb-2">
                <div class="card border-left-info  h-100 ">
                  <div class="card-body">
                    <div class=" no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class=" no-gutters align-items-center">
                              <div class="row profile-rows">
                                <div class="col-md-1" style="max-width: 50px">
                                    <div class="text-gray-800 py-2" style="font-size: 1.8em;"> <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                        data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" class="open-modalEditPertanyaan text-dark" href="#modalEditPertanyaan"><?= $u->nomor_pertanyaan;?></a>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-gray-800 mb-1 h5" >
                                      <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                        data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" class="open-modalEditPertanyaan text-dark" href="#modalEditPertanyaan"><?= $u->nama_pertanyaan;?></a>
                                  </div>
                                  <?php foreach ($pilihan_jawaban as $cb){
                                    if($cb->id_pertanyaan == $u->id_pertanyaan){?>
                                    <div class="text-gray-800 ml-3" >
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                          <a style="cursor: pointer;"  data-toggle="modal" title="klik untuk mengedit atau menghapus pilihan jawaban ini" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pilihan_jawaban="<?= $cb->id_pilihan_jawaban; ?>" data-nama_pilihan_jawaban="<?= $cb->nama_pilihan_jawaban; ?>"
                                            class="open-modalEditJawabanPertanyaan text-dark" href="#modalEditJawabanPertanyaan" ><?= $cb->nama_pilihan_jawaban; ?>
                                          </a>
                                        </label>
                                      </div>
                                    </div>
                                  <?php } } ?>
                                  <a data-toggle="modal"  style="cursor: pointer; font-size:0.8em;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" data-jenis="<?= $u->jenis_pertanyaan; ?>" class="open-modalTambahPilihanJawaban text-primary ml-3" href="#modalTambahPilihanJawaban"><i class="fas fa-plus-circle"></i> tambah jawaban</a>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-gray-800 py-4 " style="font-size: 0.8em;"><span class="badge badge-pink"><?= $u->nama_jenis_pertanyaan; ?></span><br>
                                      <?php if($u->level_pertanyaan == 'operator_fakultas'){?>
                                        <span class="text-danger"><?= $u->level_pertanyaan; ?> </span>
                                      <?php }else{?>
                                        <span class="text-danger"><?= $u->prodi; ?> </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="text-center  py-3 align-items-right d-flex flex-row-reverse bd-highlight">
                                        <a title="hapus pertanyaan ini" class="btn btn-sm btn-danger text-white "><i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    <?php }else{?>
      <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-secondary  h-100 ">
                <div class="card-body bg-disabled">
                  <div class=" no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                            <div class="row profile-rows">
                              <div class="col-md-1" style="max-width: 50px">
                                  <div class="text-gray-800 py-2" style="font-size: 1.8em;"> <a data-toggle="modal"  style="cursor: pointer;" data-id_kuisioner="<?= $u->id_kuisioner; ?>" data-id_pertanyaan="<?= $u->id_pertanyaan; ?>" 
                                      data-nama_pertanyaan="<?= $u->nama_pertanyaan; ?>" data-nomor_pertanyaan="<?= $u->nomor_pertanyaan; ?>" ><?= $u->nomor_pertanyaan;?></a>
                                </div>
                              </div>
                              <div class="col-md-8">
                                  <div class="text-gray-800 mb-1 h5" >
                                    <a><?= $u->nama_pertanyaan;?></a>
                                </div>
                                <?php foreach ($pilihan_jawaban as $cb){
                                  if($cb->id_pertanyaan == $u->id_pertanyaan){?>
                                  <div class="text-gray-800 ml-3" >
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" value="" id="defaultCheck1">
                                      <label class="form-check-label" for="defaultCheck1">
                                        <a><?= $cb->nama_pilihan_jawaban; ?> </a>
                                      </label>
                                    </div>
                                  </div>
                                <?php } } ?>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    <?php } ?>
  <?php } ?>


  <?php } ?>


<!-- modal tambah pertanyaan -------------------------------------------------------------------------------------------------------- -->
  <div class="modal fade" id="modalTambahPertanyaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pertanyaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(). 'kuisioner/tambahPertanyaan'; ?>" method="POST">
        <div class="modal-body">
              <div class="form-group row">
                  <label class="col-md-3 col-form-label">Nama Pertanyaan</label>
                  <div class="col-md-9">
                    <textarea class="form-control"  name="nama_pertanyaan" rows="3"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label">Jenis Pertanyaan</label>
                  <div class="col-md-9"> 
                      <select name="jenis_pertanyaan" class="form-control">
                          <?php foreach ($jenis_pertanyaan as $p){?>
                          <option value="<?= $p->id_jenis_pertanyaan; ?>"><?= $p->nama_jenis_pertanyaan ?></option>
                          <?php } ?>
                      </select>
                    <input type="hidden" name="id_kuisioner"  value="<?= $id_kuisioner; ?>" class="form-control">
                    <input type="hidden" name="nomor_pertanyaan"  value="<?= $nomor; ?>" class="form-control">
                  </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- modal tambah pertanyaan -------------------------------------------------------------------------------------------------------- -->

<!-- modal tambah pilihan jawaban -------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="modalTambahPilihanJawaban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pilihan Jawaban</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(). 'kuisioner/tambahJawabanPertanyaan'; ?>" method="POST">
        <div class="modal-body">
              <div class="form-group row">
                  <label class="col-md-3 col-form-label">Pilihan Jawaban</label>
                  <div class="col-md-9">
                    <input type="hidden" name="id_kuisioner" id="id_kuisioner" value=""/>
                    <input type="hidden" name="id_pertanyaan" id="id_pertanyaan" value=""/>
                    <input type="hidden" id="jenis" name="jenis_pertanyaan" value="">
                    <input class="form-control"  name="jawaban" >
                  </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="submit" class="btn btn-primary">Tambahkan Pilihan Jawaban</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- modal tambah pertanyaan -------------------------------------------------------------------------------------------------------- -->
<!-- modal edit hapus pilihan jawaban -------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="modalEditJawabanPertanyaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Hapus Pilihan Jawaban</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(). 'kuisioner/ubahJawabanPertanyaan'; ?>" method="POST">
        <div class="modal-body">
              <div class="form-group row">
                  <label class="col-md-3 col-form-label">Pilihan Jawaban</label>
                  <div class="col-md-9">
                    <input type="hidden" name="id_kuisioner" id="id_kuisioner" value=""/>
                    <input type="hidden" name="id_pilihan_jawaban" id="id_pilihan_jawaban" value=""/>
                    <input class="form-control" id="nama_pilihan_jawaban"  name="nama_pilihan_jawaban" value="">
                  </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="submit" class="btn btn-primary">Ubah Pilihan Jawaban</button>
        </form>
        <form action="<?php echo base_url(). 'kuisioner/hapusPilihanJawaban'; ?>" method="POST">
          <div hidden class="modal-body">
            <input type="" name="id_kuisioner" id="id_kuisioner" value=""/>
            <input type="" name="id_pilihan_jawaban" id="id_pilihan_jawaban" value=""/>
          </div>
          <button  type="submit" class="btn btn-outline-danger" title="hapus pilihan jawaban ini"><i class="fas fa-trash"></i></button>
        </form>
        </div>
      </div>
    </div>
  </div>
<!-- modal tambah pertanyaan -------------------------------------------------------------------------------------------------------- -->


<div class="modal fade" id="modalEditPertanyaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Pertanyaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(). 'kuisioner/ubahPertanyaan'; ?>" method="POST">
        <div class="modal-body">
              <div class="form-group row">
                  <label class="col-md-3 col-form-label">Pertanyaan</label>
                  <div class="col-md-9">
                    <input type="hidden" name="id_kuisioner" id="id_kuisioner" value=""/>
                    <input type="hidden" name="id_pertanyaan" id="id_pertanyaan" value=""/>
                    <input class="form-control" id="nama_pertanyaan"  name="nama_pertanyaan" value="">
                  </div>
              </div>
              <div hidden class="form-group row">
                  <label class="col-md-3 col-form-label">Nomor Pertanyaan</label>
                  <div class="col-md-9">
                    <input class="form-control" id="nomor_pertanyaan"  name="nomor_pertanyaan" value="">
                  </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="submit" class="btn btn-primary">Update Pertanyaan</button>
        </form>
        </div>
      </div>
    </div>
  </div>



<script>
$(document).on("click", ".open-modalTambahPilihanJawaban", function () {
     var id_kuisioner = $(this).data('id_kuisioner');
     $(".modal-body #id_kuisioner").val( id_kuisioner );
     var id_pertanyaan = $(this).data('id_pertanyaan');
     $(".modal-body #id_pertanyaan").val( id_pertanyaan );
     var jenis = $(this).data('jenis');
     $(".modal-body #jenis").val( jenis );
});
</script>
<script>
$(document).on("click", ".open-modalEditJawabanPertanyaan", function () {
     var id_kuisioner = $(this).data('id_kuisioner');
     $(".modal-body #id_kuisioner").val( id_kuisioner );
     var id_pilihan_jawaban = $(this).data('id_pilihan_jawaban');
     $(".modal-body #id_pilihan_jawaban").val( id_pilihan_jawaban );
     var nama_pilihan_jawaban = $(this).data('nama_pilihan_jawaban');
     $(".modal-body #nama_pilihan_jawaban").val( nama_pilihan_jawaban );
});
</script>
<script>
$(document).on("click", ".open-modalEditPertanyaan", function () {
     var id_kuisioner = $(this).data('id_kuisioner');
     $(".modal-body #id_kuisioner").val( id_kuisioner );
     var id_pertanyaan = $(this).data('id_pertanyaan');
     $(".modal-body #id_pertanyaan").val( id_pertanyaan );
     var nama_pertanyaan = $(this).data('nama_pertanyaan');
     $(".modal-body #nama_pertanyaan").val( nama_pertanyaan );
     var nomor_pertanyaan = $(this).data('nomor_pertanyaan');
     $(".modal-body #nomor_pertanyaan").val( nomor_pertanyaan );
});
</script>