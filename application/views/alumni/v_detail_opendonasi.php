<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
	 <div class="col-sm-6">
  </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
<div class="table-responsive">
<div style="min-width: 300px">
            <div class="row">
                <div class="col ">
					<?php foreach($opendonasi as $u){ ?>
                    <div class="class=" p-0 pb-3" style="overflow-x:auto;">
                        <div class="card">
                            <div class="card-header text-sm-center">
								<p> Anda Akna melakukan donasi untuk kegiatan <p>
                                <strong class="text-sm-center"><?php echo $u->nama_kegiatan ?></strong>
                            </div>
                            <div class="card-body">
							
                                <div class="mx-auto d-block">
                                     <div class="text-sm-left"><?php echo $u->Keterangan ?></div>
									 <div class="text-sm-left ">Dengan Total Biaya : <?php echo $u->total_anggaran ?></div>
									 <div class="location text-sm-left"><i class="fa fa-map-marker"></i> <?php echo $u->lokasi ?></div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
					<?php } ?>
				</div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->
		<div class="card-header text-sm-center">
                                <strong class="text-sm-center">Deskripsi</strong>
         </div>
		<div style="min-width: 300px">
            <div class="row">
                <div class="col ">
					
                    <div class="class=" p-0 pb-3" style="overflow-x:auto;">
                        <div class="card">
                            <div class="card-body">
								<form action="<?php echo base_url(). 'alumni/opendonasi/tambah_donasi'; ?>" method="POST">
                                <div class="mx-auto d-block">
								<div class="row">
									<div class="col-md-12">
									  <div class="form-group">
										<label>Masukkan Nominal</label>
										<input type="number" class="form-control" placeholder="Nominal Uang" name="jumlah_bantuan">
									  </div>
									</div>
								  </div>
								  <div class="row">
									<div class="col-md-12">
									  <div class="form-group">
										<label>Nama</label>
										<input disabled type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $this->session->userdata('id_login'); ?>"> 
										<input hidden name="nim" type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $this->session->userdata('id_login'); ?>"> 
                    
									  </div>
									</div>
								  </div>
								  <?php foreach($opendonasi as $u): ?>
									<input type="hidden" name="id_open_donasi" value="<?php echo $u->id_opendonasi ?>">
									
									<?php endforeach ?>
									<td>
									<button type="submit" class="btn btn-fill btn-primary float-center">Kirim Data Donasi</button>
									</td>
								</div>
                                <hr>
								</form>
                            </div>
                        </div>
                    </div>
					
					
				</div><!-- .row -->
            </div><!-- .animated -->
        </div>
		
</div>

   <!-- Right Panel -->

    <!-- Scripts -->
   
</body>
</html>