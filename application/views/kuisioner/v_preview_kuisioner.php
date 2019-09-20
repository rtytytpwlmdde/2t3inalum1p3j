

<div class="container-fluid">
<?php 
?>
<!-- Page Heading -->
<div class="row pt-2">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Kuisioner</h1>
    <?php foreach($data_kuisioner as $dk){?>
    <h5 class="h5 mb-2 text-gray-600"><?= $dk->nama_kuisioner; ?></h5>
     <?php }?>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight mb-1">
    </div>
  </div>
</div>
<?php $prodi_alumni = $this->session->userdata('id_prodi');?>
<!-- DataTales Example -->
<form action="#" method="post">
<?php foreach ($kuisioner as $u){?>
<input name="id_kuisioner" hidden type="text" value="<?=$u->id_kuisioner;?>" class=" form-control">
  <?php if($u->jenis_pertanyaan == '1' ){?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-info  h-100 ">
                <div class="card-body">
                  <div class=" no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                            <div class="row profile-rows">
                              <div class="col-md-2"  style="max-width: 80px">
                                  <div class="text-gray-800 py-2" style="font-size: 1.8em;">
                                    <a><?= $u->nomor_pertanyaan;?></a>
                                </div>
                              </div>
                              <div class="col-md-11">
                                <div class="text-gray-800" >
                                  <a  class="text-dark" ><?= $u->nama_pertanyaan;?></a>
                                </div>
                                <div class="text-gray-800" >
                                    <input name="pertanyaan<?=$u->id_pertanyaan?>" type="text" class=" form-control">
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

<?php if($u->jenis_pertanyaan == '2' ){?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-info  h-100 ">
                <div class="card-body">
                  <div class=" no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                            <div class="row profile-rows">
                              <div class="col-md-1" style="max-width: 80px">
                                  <div class="text-gray-800 py-2" style="font-size: 1.8em;"> <a ><?= $u->nomor_pertanyaan;?></a>
                                </div>
                              </div>
                              <div class="col-md-11">
                                  <div class="text-gray-800" >
                                    <a  ><?= $u->nama_pertanyaan;?></a>
                                  </div>
                                  <div class="text-gray-800" >
                                    <textarea class="form-control"  name="pertanyaan<?=$u->id_pertanyaan?>" rows="3"></textarea>
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


<?php if($u->jenis_pertanyaan == '3' ){?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-info  h-100 ">
                <div class="card-body">
                  <div class=" no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                            <div class="row profile-rows">
                              <div class="col-md-1" style="max-width: 80px">
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
                                      <input class="form-check-input" value="<?= $cb->nama_pilihan_jawaban; ?>" name="pertanyaan<?=$u->id_pertanyaan?>" type="checkbox" value="" id="defaultCheck1">
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

<?php if($u->jenis_pertanyaan == '4' ){?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-info  h-100 ">
                <div class="card-body">
                  <div class=" no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                            <div class="row profile-rows">
                              <div class="col-md-1" style="max-width: 80px">
                                  <div class="text-gray-800 py-2" style="font-size: 1.8em;"> <a><?= $u->nomor_pertanyaan;?></a>
                                </div>
                              </div>
                              <div class="col-md-11">
                                  <div class="text-gray-800 mb-1 h5" >
                                  <a ><?= $u->nama_pertanyaan;?></a>
                                </div>
                                  <div class="text-gray-800 " >
                                    <div class="form-group">
                                        <select class="form-control" name="pertanyaan<?=$u->id_pertanyaan?>" id="exampleFormControlSelect1">
                                            <option value="">Pilih</option>
                                            <?php foreach ($pilihan_jawaban as $cb){
                                            if($cb->id_pertanyaan == $u->id_pertanyaan){?>
                                            <option value="<?= $cb->nama_pilihan_jawaban; ?>"><?= $cb->nama_pilihan_jawaban; ?></option>
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

<?php if($u->jenis_pertanyaan == '5' ){?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class="card border-left-info  h-100 ">
                <div class="card-body">
                  <div class=" no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                            <div class="row profile-rows">
                              <div class="col-md-1" style="max-width: 80px">
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
                                      <input class="form-check-input" <?= $cb->nama_pilihan_jawaban; ?> type="radio" name="pertanyaan<?=$u->id_pertanyaan?>" id="defaultCheck1">
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
<div class="d-flex flex-row-reverse bd-highlight pb-4">
          <button class="btn btn-sm btn-primary px-4" type="submit"> Submit</button>
    </div>
</div>
</form>



