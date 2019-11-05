<div class="container-fluid">

          <!-- Page Heading -->
    <div class="row mt-2">
        
        <div class="col-sm-6">
        <h1 class="h3 mb-2 text-gray-800">Dokumen <?= $jenis?></h1>
        </div>
        <div class="col-sm-6">
        <div class="d-flex flex-row-reverse bd-highlight">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url("alumni/ijazah/".$username."/ijazah");?>">Ijazah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("alumni/ijazah/".$username."/transkrip");?>">Transkrip</a>
                </li>
            </ul>                            
        </div>                               
        </div>                       
    </div>

    <?php foreach ($ijazah as $u){ ?>
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-2">
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-9 mb-2">
                    <div class="card mb-2" >
                        <div class="card-body">  
                            <?php if($jenis == 'ijazah'){ ?>
                                <iframe src="https://docs.google.com/viewer?url=http://www.pdf995.com/samples/pdf.pdf&embedded=true" frameborder="0" height="500px" width="100%"></iframe>
                            <?php }else{?>

                            <?php } ?>             
                        </div>
                    </div> 
                </div>
                <div class="col-lg-3 mb-2">
                    <div class="card mb-2" >
                        <div class="card-body">    
                            <?php if($jenis == 'ijazah'){ ?>
                            <?php if($u->dokumen_transkrip == null){ ?>
                            <h6 class="m-0  text-secondary">File : Tidak tersedia</h6>
                            <h6 class="m-0  text-secondary">Tgl : Tidak tersedia</h6>
                            <h6 class="mb-2  text-secondary">Status : Tidak tersedia</h6>
                                <?php }else{ ?>
                            <h6 class="m-0  text-secondary">File : <?= $u->dokumen_ijazah?></h6>
                            <h6 class="m-0  text-secondary">Tgl : <?= $u->tanggal_ijazah?></h6>
                            <h6 class="mb-2  text-secondary">Status : <?= $u->validasi_ijazah?></h6>
                                <?php }?> 
                            <?php if($u->validasi_ijazah != 'Tolak'){ ?>                           
                                <h6 class="mb-2  ">Alasan Penolakan : <?= $u->catatan_ijazah?></h6>
                            <?php } ?>
                            <?php if($u->validasi_ijazah != 'setuju' || $u->validasi_ijazah != null){ ?>                           
                                <a data-toggle="modal"  
                            data-username="<?php echo $u->username; ?>"  
                            data-tanggal_ijazah="<?php echo $u->tanggal_ijazah; ?>"  
                        class="modalEditIjazah btn btn-warning btn-sm" href="#modalEditIjazah"><h6 class="m-0 font-weight-bold ">Edit Ijazah</h6></a>
                            <?php } ?>
                            <?php }else{?>
                            
                                <?php if($u->dokumen_transkrip == null){ ?>   
                                <h6 class="m-0  text-secondary">File : Tidak tersedia</h6>
                                <a data-toggle="modal"  
                                    data-username="<?php echo $u->username; ?>"
                                class="modalEditTranskrip btn btn-warning btn-sm" href="#modalEditTranskrip"><h6 class="m-0 font-weight-bold ">Upload Transkrip</h6></a>
                            <?php }else{ ?>
                                <h6 class="m-0  text-secondary">File : <?= $u->dokumen_transkrip?></h6>
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

       
    </div>

    <?php  } ?>
</div>

<div class="modal fade" id="modalEditIjazah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header bg-thead">
    <h6 class="text-center text-white">Update Ijazah</h6>
    </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'alumni/updateIjazah'; ?>" enctype="multipart/form-data"  method="post">
        <input type="hidden"   class="form-control" name="username" id="username" value=""/>
        <div class="form-group">
            <label for="inputCity">Dokumen</label>
            <input type="file" class="form-control" name="dokumen"  value="" >
            <input type="hidden" class="form-control" name="jenis"  value="<?= $jenis ?>" >
        </div>
        <div class="form-group">
            <label for="inputCity">Tanggal Ijazah</label>
            <input type="date" class="form-control" name="tanggal_ijazah"  value="" >
        </div>
        <div class="d-flex flex-row-reverse bd-highlight py-2">
            <div class="px-1"><button type="submit" class="btn btn-primary btn-sm">Update Dokumen</button></div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
$(document).on("click", ".modalEditIjazah", function () {
     var username = $(this).data('username');
     $(".modal-body #username").val( username );
     var tanggal_ijazah = $(this).data('tanggal_ijazah');
     $(".modal-body #tanggal_ijazah").val( tanggal_ijazah );
});
</script>

<div class="modal fade" id="modalEditTranskrip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header bg-thead">
    <h6 class="text-center text-white">Update Transkrip</h6>
    </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'alumni/updateTranskrip'; ?>" enctype="multipart/form-data"  method="post">
        <input type="hidden"   class="form-control" name="username" id="username" value=""/>
        <div class="form-group">
            <label for="inputCity">Dokumen</label>
            <input type="file" class="form-control" name="dokumen"  value="" >
            <input type="hidden" class="form-control" name="jenis"  value="<?= $jenis ?>" >
        </div>
        <div class="d-flex flex-row-reverse bd-highlight py-2">
            <div class="px-1"><button type="submit" class="btn btn-primary btn-sm">Update Transkrip</button></div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
$(document).on("click", ".modalEditTranskrip", function () {
     var username = $(this).data('username');
     $(".modal-body #username").val( username );
});
</script>
       

