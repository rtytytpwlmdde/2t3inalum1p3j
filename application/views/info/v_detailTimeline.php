<div class="container-fluid">

          <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2 py-2">
        <h1 class="h3 mb-0 text-gray-800">Info FEB UB</h1>                                
    </div>

    <?php foreach ($timeline as $u){ ?>
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-2">
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-9 mb-2">
                    <div class="card mb-2" >
                        <div class="card-body">               
                            <h6 class="h4 mb-2  text-primary"><?= $u->judul_informasi?></h6>
                            <span><?= $u->nama_informasi?></span> <br><br>
                            <a class="" href="<?= $u->link_informasi?>">Baca Selengkapnya</a>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-3 mb-2">
                    <div class="card mb-2" >
                        <div class="card-body">    
                            <a href="<?php echo base_url("info/editInfo/".$u->id_informasi);?>"><h6 class="m-0 font-weight-bold ">Edit Info</h6></a>
                            <a href="<?php echo base_url("info/hapusInfo/".$u->id_informasi);?>"><h6 class="m-0 font-weight-bold ">Hapus Info</h6></a>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

    
       
    </div>
    <?php  } ?>
</div>

       

