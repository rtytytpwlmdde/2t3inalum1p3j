

<div class="container-fluid">
<?php 

$sectionid = null;
$sectionno = null;
foreach($idsection as $u){
  $sectionid = $u->id_section;
  $sectionno = $u->no_section;
}
?>
<!-- Page Heading -->
<div class="row pt-2">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Kuisioner</h1>
    <h5 class="h5 mb-2 text-gray-600"><?= $nama_kuisioner; ?></h5>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight mb-1">
    </div>
  </div>
</div>
<?php $prodi_alumni = $this->session->userdata('id_prodi');?>
<!-- DataTales Example -->
<form action="<?php echo site_url('kuisioner/kirimTanggapan/'); ?>" method="post">
<?php foreach ($kuisioner as $u){?>
<input name="id_kuisioner" hidden type="text" value="<?=$u->id_kuisioner;?>" class=" form-control">
  <?php if($u->jenis_pertanyaan == '1' && (($u->id_prodi == $prodi_alumni) || ($u->level_pertanyaan == 'fakultas'))){?>
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

<?php if($u->jenis_pertanyaan == '2' && (($u->id_prodi == $prodi_alumni) || ($u->level_pertanyaan == 'fakultas'))){?>
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


<?php if($u->jenis_pertanyaan == '3' && (($u->id_prodi == $prodi_alumni) || ($u->level_pertanyaan == 'fakultas'))){?>
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
                                <?php 
                                $cekbox=1;
                                foreach ($pilihan_jawaban as $cb){
                                  if($cb->id_pertanyaan == $u->id_pertanyaan){?>
                                  <div class="text-gray-800 ml-3" >
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="pertanyaan<?=$u->id_pertanyaan?>~<?= $cekbox?>" value="<?= $cb->nama_pilihan_jawaban; ?>"><?= $cb->nama_pilihan_jawaban; ?>
                                      </label>
                                    </div>
                                  </div>
                                <?php $cekbox++;
                                } } ?>
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

<?php if($u->jenis_pertanyaan == '4' && (($u->id_prodi == $prodi_alumni) || ($u->level_pertanyaan == 'fakultas'))){?>
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
                                            <option value="<?= $cb->id_pilihan_jawaban; ?>~<?= $cb->nama_pilihan_jawaban; ?>"><?= $cb->nama_pilihan_jawaban; ?></option>
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

<?php if($u->jenis_pertanyaan == '5' && (($u->id_prodi == $prodi_alumni) || ($u->level_pertanyaan == 'fakultas'))){?>
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
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="pertanyaan<?=$u->id_pertanyaan?>" value="<?= $cb->nama_pilihan_jawaban; ?>"><?= $cb->nama_pilihan_jawaban; ?>
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
        <input type="hidden" name="no_section" value="<?= $sectionno?>">
        <input type="hidden" name="id_kuisioner" value="<?= $id_kuisioner?>">
        <input type="hidden" name="id_section" value="<?= $sectionid?>">
        <input type="hidden" name="id_responden" value="<?= $this->session->userdata('username')?>">
<div class="d-flex flex-row-reverse bd-highlight pb-4">
          <button class="btn btn-sm btn-primary px-4" type="submit"> Submit</button>
    </div>
</div>
</form>



