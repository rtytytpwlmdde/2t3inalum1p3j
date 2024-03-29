<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

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
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('alumni/dashboard'); ?>">
            <i class="fas fa-circle-notch"></i>
          <span>Timeline</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('alumni/dashboard'); ?>">
            <i class="fas fa-comment-alt"></i>
          <span>Percakapan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('legalisir/legalisir/legalisir'); ?>">
        <i class="fas fa-file-invoice"></i>
          <span>Legalisir</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('alumni/lowker/'); ?>">
        <i class="fas fa-briefcase"></i>
          <span>Lowongan Kerja</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('alumni/profil/index/'.$this->session->userdata('id_login')); ?>">
        <i class="far fa-id-card"></i>
          <span>Data Diri</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('alumni/profil/informasilulusan/'.$this->session->userdata('id_login')); ?>">
        <i class="fas fa-graduation-cap"></i>
          <span>Data Pendidikan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('alumni/profil/riwayatpekerjaan/'.$this->session->userdata('id_login')); ?>">
        <i class="fas fa-chalkboard-teacher"></i>
          <span>Riwayat Pekerjaan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('alumni/profil/editpassword/'.$this->session->userdata('id_login')); ?>">
        <i class="fas fa-lock"></i>
          <span>Password</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('alumni/profil/editfoto/'.$this->session->userdata('id_login')); ?>">
        <i class="fas fa-camera-retro"></i>
          <span>Foto</span></a>
      </li>


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

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle text-white" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle text-white" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter ">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-200 small"><?php echo $this->session->userdata('nama_login'); ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('img/alumni_pic/'.$this->session->userdata('foto')); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
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
        <div class="post border-bottom p-3 bg-white w-shadow">
                <div class=" text-muted ">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h5 class="mb-3  page-title text-muted">ALAMAT PENGIRIMAN</h5>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group" hidden>
                                            <label for="from_province">From Province </label>
                                            <select required class="form-control" name="from_province" id="from_province">
                                                <option value="11" selected="" disabled="">- Select Province -</option>
                                                <?php $this->load->view('rajaongkir/getProvince2'); ?>
                                            </select>
                                        </div>

                                        <div class="form-group" hidden>
                                            <label for="from_city">From City </label>
                                            <select required class="form-control" name="from_city" id="origin">
                                                <option value="256" selected="" disabled="">- Select City -</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="to_province">Provinsi </label><br>    
                                            <select required class="form-control" name="to_province" id="to_province">
                                                <option value="" selected="" disabled="">- Select Province -</option>
                                                <?php $this->load->view('rajaongkir/getProvince'); ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="to_city">Kota/Kabupaten </label><br>
                                            <select required class="form-control" style="" name="destination" id="destination">
                                                <option value="" selected="" disabled="">- Select City -</option>
                                            </select>
                                        </div>

                                        <div class="form-group" hidden>
                                            <label for="courier">Courier </label>
                                            <select required class="form-control" name="courier" id="courier">
                                                <option value="jne">JNE</option>
                                            </select>
                                        </div>

                                        <div class="form-group" hidden >
                                            <label for="weight">Weight (gram)</label>
                                            <?php  foreach($keranjang as $k){ ?>
                                            <input type="text" class="form-control" name="weight" id="weight" value="<?= $k->total_berat ?>">
                                            <input type="text" class="form-control" name="id_transaksi" id="id_transaksi" value="<?= $k->id_transaksi ?>">
                                            <input type="text" class="form-control" name="total_harga" id="total_harga" value="<?= $k->total_harga ?>">
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="weight">Alamat Lengkap</label>
                                            <textarea required class="form-control" name="jalan" id="jalan" rows="2"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" onclick="tampil_data('data')" class="btn btn-primary">Simpan Alamat Pengiriman</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row bg-abu-abu">
                            <div class="col-md-12 py-2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h6 class="mb-3  page-title text-muted">Alur Transaksi</h6>
                                    </div>
                                    <div class="panel-body" style="font-size:0.8em;">
                                        <p>1. Costumer membuat pesanan <i class='text-success bx bxs-check-circle' ></i></p>
                                        <p>2. Costumer mengisi alamat pengiriman <i class='bx bx-loader' ></i></p>
                                        <p>3. Costumer melakukan pembayaran <i class='bx bxs-x-circle' ></i></i></p>
                                        <p>4. Pembayaran telah divalidasi <i class='bx bxs-x-circle' ></i></i></p>
                                        <p>5. Pesanan Di Packing <i class='bx bxs-x-circle' ></i></i></p>
                                        <p>6. Pesanan Di Kirim <i class='bx bxs-x-circle' ></i></i></p>
                                        <p>7. Pesanan Sampai Di Tujuan <i class='bx bxs-x-circle' ></i></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
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
          <a class="btn btn-primary" href="login.html">Logout</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
function tampil_data(act) {
	var w = $('#origin').val();
	var x = $('#destination').val();
	var y = $('#weight').val();
	var z = $('#courier').val();
	var a = $('#id_transaksi').val();
	var b = $('#total_harga').val();
	var c = $('#jalan').val();

	$.ajax({
			url: "legalisir/legalisir/tambahAlamatPengiriman",
			type: "GET",
			data : {origin: w, destination: x, berat: y, courier: z, id_transaksi: a, total_harga: b, jalan: c},
			success: function (ajaxData) {
                window.location.href = 'legalisir/legalisir/pembayaran/'+a;
			}
	});
};



$(document).ready(function() {
	$("#from_province").click(function() {
		$.post("<?php echo base_url(); ?>rajaongkir/getCity/"+$('#from_province').val(),function(obj) {
			$('#origin').html(obj);
		});			
	});

	$("#to_province").click(function() {
		$.post("<?php echo base_url(); ?>rajaongkir/getCity/"+$('#to_province').val(),function(obj) {
			$('#destination').html(obj);
		});			
	});
});
</script>