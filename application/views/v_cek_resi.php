<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/images/logo-16x16.png" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tracert Alumni</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    <link href="<?php echo base_url(); ?>/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@1.9.2/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css' rel='stylesheet'>
    <link href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/profile.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/settings.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/forms.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/media.css" rel="stylesheet"> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body class="profile newsfeed">
    <div class=" " id="wrapper">
        <div class=" row ">
            <div class="col-md-12 " id="page-content-wrapper">
                <nav id="navbar-main" class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php $operator = $this->session->userdata('status');?>
                    <a class="navbar-brand mr-lg-5 px-4 px-4" href="<?php echo base_url('legalisir/transaksi/'); ?>"><img src="<?php echo base_url(); ?>/assets/images/ub.png" class="mr-3" alt="Logo" width="50" height="50"> Tracert Alumni FEB UB</a>
                    
                    
                    
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="main_menu">
                    <ul class="navbar-nav ">
                            <li><a class="text-secondary" href="<?php echo base_url('legalisir/legalisir/transaksi'); ?>">Transaksi</a></li>
                        </ul>
                        <ul class="navbar-nav px-4">
                            <li><a class="text-secondary" href="<?php echo base_url('resi'); ?>">Cek Resi</a></li>
                        </ul>
                        <?php if($this->session->userdata('status') == 'recording'){ ?>
                            <ul class="navbar-nav ">
                            <li><a class="text-secondary" href="<?php echo base_url('legalisir/recording/lihatValidasiIjazah'); ?>">Ijazah</a></li>
                        </ul>
                        <?php } ?>
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav mr-3">
                            
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link nav-links dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php $transaksi_baru = 0;
                                foreach($jumlah_transaksi_baru as $a){ ?>
                                    <?php if($a->jumlah_transaksi_baru != '0'){?>
                                        <i class='bx bxs-bell notification-bell' title="terdapat <?= $transaksi_baru = $a->jumlah_transaksi_baru?> transaksi baru"></i> <span class="badge badge-pill badge-primary"><?= $a->jumlah_transaksi_baru; ?> </span>
                                    <?php } else {?>
                                        <i class='bx bxs-bell notification-bell' title="tidak ada transaksi baru"></i>
                                    <?php } ?>
                                <?php } ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right ">
                                    <div class="notify-drop-title">
                                        <div class="row">
                                            <?php if($transaksi_baru != '0'){?>
                                            <div class="col-md-12 col-sm-12 col-xs-12  ">Terdapat <span class="badge badge-pill badge-primary "><?= $transaksi_baru ?></span> transaksi baru yang belum di proses
                                                <?php if($operator == 'recording'){?>
                                                <a href="<?php echo base_url('legalisir/transaksi'); ?>">Lihat semua</a>
                                                <?php } ?>
                                                <?php if($operator == 'keuangan'){?>
                                                <a href="<?php echo base_url('legalisir/transaksi'); ?>">Lihat semua</a>
                                                <?php } ?>
                                            </div>
                                            
                                            <?php }else{?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 ">Tidak ada transaksi baru</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- end notify title -->
                                    <!-- notify content -->
                                   
                                </ul>
                            </li>
                          
                            <li class="">
                                
                                <a href="#" class="nav-link nav-links dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="menu-user-image">
                                        <img src="<?php echo base_url(); ?>/assets/images/users/guest.jpg" class="menu-user-img ml-1" alt="Menu Image">
                                    </div>
                                    <span class="ml-2"><?= $operator ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right nav-drop dropdown-shadow">
                                    <a class="dropdown-item" href="<?php echo base_url('alumni/profile'); ?>"><i class='bx bx-user mr-2'></i> Profile</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>"><i class='bx bx-undo mr-2'></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
                
                <div>
								<?php
        $notif = $this->session->flashdata('gagal');
        $operator = $this->session->userdata('status');
        if($notif != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Gagal!</strong> '.$notif.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
        $notifsukses = $this->session->flashdata('sukses');
        if($notifsukses != NULL){
            echo '
            <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
              <strong>Sukses! </strong> '.$notifsukses.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
    ?>
<div class=" "> 
        <div class="">
            <div class="row ">
                <div class="col-md-12">
                    <div class="">

                        <!-- Posts section -->
                        <div class="row px-4 ">
                            <div class="col-md-12 content">
                                <br>
                                <div class="row mb-3 justify-content-md-center">
                                    <div class="col-12 col-sm-3">
                                    </div>
																		
                                    <div class="col-12 col-sm-6">
                                        <h5 class="page-title text-muted text-center">CEK RESI</h5>
                                    <div class="border-bottom p-2 bg-white w-shadow">
                                    <div class=" ">
                                        <div class="col-md-12 form-inline">
                                            <input type="text" name="no_resi" value="<?= $nomor_resi; ?>" id="no_resi" class="form-control" style="width:100%;">
                                            <button type="button" onclick="tampil_resi('data')" class="mt-2 text-center btn btn-primary " style="width:100%;">Cek Resi</button> <br>
                                        </div>
                                        <div class="content">
                                            <div class="col-md-12">
                                                <div class="panel-heading py-2"></div>
                                                <div class="panel-body">
                                                    <div class="settings-form">
                                                        <div id="hasil_resi"></div>    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                       
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
<!-- -->



                </div>
            </div>
        </div>
    </div>
		<script>
				function tampil_resi(act){
						var resi = $('#no_resi').val();

						if(resi == ""){
								alert("harap isi data dengan lengkap");
						}else{
								$.ajax({
								url: "rajaongkir/getResi",
								type: "GET",
								data : {waybill: resi},
								success: function (ajaxData){
										//$('#tombol_export').show();
										//$('#hasilReport').show();
										$("#hasil_resi").html(ajaxData);
								}
								});
						}


				};
		</script>

    <!-- Core -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/popper/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <!-- Optional -->
    <script type="text/javascript">
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(document).ready(function() {
    $(".dropdown-toggle").dropdown();
});

    </script>
    <script src="<?php echo base_url(); ?>/assets/js/components/components.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>
