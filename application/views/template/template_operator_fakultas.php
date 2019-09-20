<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Alumni - FEB</title>
  <link rel="icon" href="<?php echo base_url() ?>/assets/images/ub.png">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
 
  <link href="<?php echo base_url() ?>/assets/alumni/sb-admin-2.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url() ?>/assets/alumni/alumni-style.css" rel="stylesheet" type="text/css">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-lighst sidebar sidebar-light accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand  d-flex align-items-center justify-content-center bg-biru" href="index.html">
        <div class="sidebar-brand-icon ">
          <img src="<?php echo base_url(); ?>/assets/images/ub.png" width="35" height="35" alt="">
        </div>
        <div class="sidebar-brand-text mx-3 text-light">Alumni <sup>FEB UB</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

     


      <!-- Nav Item - Tables -->
    <?php if($this->session->userdata('status') == 'recording'){ ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('legalisir/dashboard'); ?>">
            <i class="fas fa-circle-notch"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('legalisir/transaksi'); ?>">
        <i class="fas fa-handshake"></i>
          <span>Transaksi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('resi'); ?>">
        <i class="fas fa-file-signature"></i>
          <span>Cek Resi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('recording/ijazah/'); ?>">
        <i class="fas fa-file-invoice"></i>
          <span>Validasi Upload Ijazah</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('recording/alumni/'); ?>">
        <i class="fas fa-user-graduate"></i>
          <span>Alumni</span></a>
      </li>
    <?php } ?>
    <?php if($this->session->userdata('status') == 'keuangan'){ ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('legalisir/transaksi'); ?>">
        <i class="fas fa-handshake"></i>
          <span>Transaksi</span></a>
      </li>
    <?php } ?>
    <?php if($this->session->userdata('status') == 'operator_fakultas'){ ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('operator_fakultas/alumni'); ?>">
          <i class="fas fa-user-friends"></i>
          <span>Alumni</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa fa-book"></i>
          <span>Kuisioner</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users:</h6>
            <a class="collapse-item" href="<?php echo base_url('operator_fakultas/paket_kuisioner'); ?>">Kuisioner Fakultas</a>
            <a class="collapse-item" href="<?php echo base_url('#'); ?>">Kuisioner Jurusan</a>
            <a class="collapse-item" href="<?php echo base_url('#'); ?>">Kuisioner Program Studi</a>
            <a class="collapse-item" href="<?php echo base_url('#'); ?>">Review Kuisioner</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('operator_fakultas/lowker'); ?>">
          <i class="fas fa-briefcase"></i>
          <span>Lowongan Pekerjaan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('operator_fakultas/opendonasi'); ?>">
          <i class="fas fa-coins"></i>
          <span>Open Donasi</span></a>
      </li><li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('operator_fakultas/laporan'); ?>">
          <i class="fas fa-print"></i>
          <span>Print Laporan</span></a>
      </li>
		<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoMasterData" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseTwoMasterData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Data:</h6>
            <a class="collapse-item" href="<?php echo base_url('operator_fakultas/obrolan'); ?>">Forum Komunikasi</a>
            <a class="collapse-item" href="<?php echo base_url('operator_fakultas/alumni/reset_password'); ?>">Reset Password</a>
            <a class="collapse-item" href="<?php echo base_url('operator_fakultas/obrolan/reset_obrolan'); ?>">Reset Obrolan</a>
          </div>
        </div>
      </li>
    <?php } ?>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-biru topbar mb-2 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars text-light"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-200 small"><?= $this->session->userdata('status'); ?></span>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="bg-white m-2">
            <?php $this->load->view($main_view); ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer ">
        <div class="container my-auto ">
          <div class="copyright text-center my-auto ">
            <span>Copyright &copy; Alumni FEB UB</span>
            <span>2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url()?>/assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url()?>/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url()?>/assets/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url()?>/assets/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url()?>/assets/admin/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url()?>/assets/admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>
