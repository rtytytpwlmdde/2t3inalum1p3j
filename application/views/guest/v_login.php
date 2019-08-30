<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/images/ub.png" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tracert Alumni FEB UB</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@1.9.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/auth.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/forms.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/media.css" rel="stylesheet">
</head>

<body>
    <div class="row ht-100v flex-row-reverse no-gutters">
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="signup-form">
                <div class="auth-logo text-center mb-5">
                    <div class="row">
                        <div class="col-md-10">
                            <p>Login Page</p>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url('auth/cek_login'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="username">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <a href="forgot-password.html">Forgot password?</a>
                        </div>
                        <div class="col-md-6">
                            <label class="custom-control material-checkbox">
                                <input type="checkbox" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <a href ="<?php echo base_url('register'); ?>" class="material-control-description">Register</a>
                            </label>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="form-group">
                                <button type="submit"  class="btn btn-primary sign-up">Sign In</button>
                            </div>
                        </div>
                       
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 auth-bg-image d-flex justify-content-center align-items-center">
            <div class="auth-left-content mt-5 mb-5 text-center">
                <div class="weather-small text-white">
                    <img src="assets/images/ub.png" class="logo-img" alt="Logo" width="120" height="120">
                </div>
                <div class="text-white mt-5 mb-5">
                    <h2 class="create-account mb-3">Tracert Alumni</h2>
                    <p>Fakultas Ekonomi dan Bisnis Universitas Brawijaya</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade fingerprint-modal" id="fingerprintModal" tabindex="-1" role="dialog" aria-labelledby="fingerprintModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 class="text-muted display-5">Place your Finger on the Device Now</h3>
                    <img src="assets/images/icons/auth-fingerprint.png" alt="Fingerprint">
                </div>
            </div>
        </div>
    </div>

    <!-- Core -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/popper/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Optional -->
    <script src="<?php echo base_url(); ?>/assets/js/app.js"></script>
</body>

</html>
