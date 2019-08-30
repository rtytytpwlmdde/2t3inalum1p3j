<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
	 <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800"> Lowongan Pekerjaan</h1>
  </div>
  <div class="col-sm-12">
    <div class="d-flex flex-row-reverse bd-highlight">
     <a href="<?php echo base_url('admin/info_feb/inputinfofeb'); ?>" class="btn btn-info">Tambah Data Operator</a>
    </div>
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
 
<div style="min-width: 600px">
            <div class="row">
                <div class="col ">
					<?php foreach($info_feb as $u){ ?>
                    <div class="class=" p-0 pb-3" style="overflow-x:auto;">
                        <div class="card">
                            <div class="card-header text-sm-center">
                                <strong class="text-sm-center">Kegiatan</strong>
                            </div>
                            <div class="card-body">
							
                                <div class="mx-auto d-block">
									<h5 class="text-sm-left mt-2 mb-1"><?php echo $u->keterangan ?></h5>
									<div class="location text-sm-left"><i class="fa fa-map-marker"></i> <?php echo $u->link ?></div>
                                </div>
                                <hr>
                            </div>
							<div class="td-actions text-right">
                                    <a href="<?php echo site_url('admin/info_feb/updateInfo/'.$u->id_informasi); ?>"type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?php echo site_url('admin/info_feb/hapusInfo/'.$u->id_informasi); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                    </a>
                            </div>
                        </div>
                    </div>
					<?php } ?>
				</div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->
</div>

   <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>