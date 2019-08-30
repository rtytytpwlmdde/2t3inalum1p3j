<!DOCTYPE html>
<html lang="en">
<?php
        $notif = $this->session->flashdata('notif');
        if($notif != NULL){
            echo '
            <div class="alert alert-accent alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-close text-white"></i></span>
            </button>
            <i class="fa fa-info mx-2"></i>
            <strong>'.$notif.'</strong> 
            </div>
            ';
        }
    ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/images/logo-16x16.png" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Argon - Social Network</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@1.9.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/components.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
    <link href="assets/css/media.css" rel="stylesheet">
</head>

<body>
    <div class="row ht-100v flex-row-reverse no-gutters">
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="signup-form">
                <div class="auth-logo text-center mb-5">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="assets/images/ub.png" class="logo-img" alt="Logo" width="70" height="70">
                        </div>
                        <div class="col-md-10">
                            <p>Tracert Alumni</p>
                            <span>FEB UB</span>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url(). 'register/submit'; ?>" method="post" class="pt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nim" placeholder="NIM">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email Address">
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="form-group">
                                <input  list="list_jurusan" name="id_jurusan" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_jurusan">
                                    <?php foreach($jurusan as $p): ?>
                                    <option value="<?php echo $p->id_jurusan?>"><?php echo $p->id_jurusan?> - <?php echo $p->jurusan?></option>
                                    <?php endforeach ?>
                                </datalist>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="form-group">
                                <input  list="list_prodi" name="id_prodi" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_prodi">
                                    <?php foreach($prodi as $p): ?>
                                    <option value="<?php echo $p->id_prodi?>"><?php echo $p->id_prodi?> - <?php echo $p->prodi?></option>
                                    <?php endforeach ?>
                                </datalist>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="form-group">
                                <select required  name="jenjang" id="feInputState" class="form-control ">
                                    <option value="" selected>Pilih </option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
								</select>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="form-group">
                                <select required  name="angkatan" id="feInputState" class="form-control">
							<?php
								$mulai= date('Y') ;
								for($i = $mulai;$i>$mulai - 50;$i--){
								$sel = $i == date('Y') ? ' selected="selected"' : '';
								echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
								}
								?>
							</select>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="form-group">
                                 <select required  name="tahun_lulus" id="feInputState" class="form-control">
							<?php
							$mulai= date('Y') ;
							for($i = $mulai;$i>$mulai - 50;$i--){
							$sel = $i == date('Y') ? ' selected="selected"' : '';
							echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
							}
							?>
						</select>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="form-group">
                                <input type="date" class="form-control" name="tanggal_yudisium" placeholder="Tanggal Yudisium">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span class="go-login">Already a member? <a href="<?php echo base_url('auth'); ?>">Sign In</a></span>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary sign-up">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 auth-bg-image d-flex justify-content-center align-items-center">
            <div class="auth-left-content mt-5 mb-5 text-center">
                <div class="weather-small text-white">
                    <p class="current-weather"><i class='bx bx-sun'></i> <span>14&deg;</span></p>
                    <p class="weather-city">Indonesia</p>
                </div>
                <div class="text-green mt-5 mb-5">
                    <h2 class="create-account mb-3">Create Account</h2>
                    <p>Selamat Datang Silahkan untuk Melakukan Pengisian Data Diri.</p>
					<p>Jika telah Selesai Melakukan Pengisian Silahkan Cek Email Anda</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Core -->
    <script src="assets/js/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Optional -->
    <script src="assets/js/app.js"></script>
</body></html>
