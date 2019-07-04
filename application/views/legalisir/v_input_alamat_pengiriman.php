<div class="row profile-right-side-content">
                    <div class="user-profile">
                        <div class="profile-header-background">
                            <a href="#" class="profile-cover">
                                <img src="<?php echo base_url(); ?>/assets/images/users/cover/cover1.jpg" alt="Profile Header Background">
                                <div class="cover-overlay">
                                    <a href="#" class="btn btn-update-cover"><i class='bx bxs-camera'></i> Update Cover Photo</a>
                                </div>
                            </a>
                        </div>
                        <div class="row ">
                            <div class="col-md-3">
                                <div class="profile-info-left">
                                    <div class="text-center">
                                        <div class="profile-img w-shadow">
                                            <div class="profile-img-overlay"></div>
                                            <img src="<?php echo base_url(); ?>/assets/images/users/guest.jpg" alt="Avatar" class="avatar img-circle">
                                            <div class="profile-img-caption">
                                                <label for="updateProfilePic" class="upload">
                                                    <i class='bx bxs-camera'></i> Update
                                                    <input type="file" id="updateProfilePicInput" class="text-center upload">
                                                </label>
                                            </div>
                                        </div>
                                        <p class="profile-fullname mt-3">Jisso</p>
                                        <p class="profile-username mb-3 text-muted">@pocinki</p>
                                    </div>
                                    
                                    <div class="intro mt-5 mv-hidden">
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bx-briefcase text-primary'></i> Kapolsek<a href="#">Lowokwaru</a></p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bx-map text-primary'></i> Lives in <a href="#">Pocinki, Erangel</a></p>
                                        </div>
                                    </div>
                                   
                                    <div class="intro mt-5 mv-hidden">
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted">Other Social Accounts</p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bxl-facebook-square facebook-color'></i> <a href="#" target="_blank">facebook.com/username</a></p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bxl-twitter twitter-color'></i> <a href="#" target="_blank">twitter.com/username</a></p>
                                        </div>
                                        <div class="intro-item d-flex justify-content-between align-items-center">
                                            <p class="intro-title text-muted"><i class='bx bxl-instagram instagram-color'></i> <a href="#" target="_blank">instagram.com/username</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="profile-info-right">

                                    <!-- Posts section -->
                                    <div class="row">
                                        <div class="col-md-8 profile-center">
                                            <ul class="list-inline profile-links d-flex justify-content-between w-shadow rounded">
                                                <li class="list-inline-item profile-active">
                                                    <a href="#">Timeline</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a  href="<?php echo base_url('alumni/data_alumni/'); ?>">About</a></li>
                                                
                                                <li class="list-inline-item">
                                                    <a href="#">Legalisir Online</a>
                                                </li>
                                                <li class="list-inline-item dropdown">
                                                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right profile-ql-dropdown">
                                                        <a href="#" class="dropdown-item">Activity Log</a>
                                                        <a href="#" class="dropdown-item">Videos</a>
                                                        <a href="#" class="dropdown-item">Check-Ins</a>
                                                        <a href="#" class="dropdown-item">Events</a>
                                                        <a href="#" class="dropdown-item">Likes</a>
                                                    </div>
                                                </li>
                                            </ul>
                                           
                                            <div class="post border-bottom p-3 bg-white w-shadow">
                                                <div class="media text-muted ">
                                                    <div class="content">
                                                        <div class="">
                                                            <div class="">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="panel panel-primary">
                                                                        <div class="panel-heading">
                                                                                <h3 class="panel-title">Check Delivery Payment</h3>
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
                                                                                    <label for="to_province">To Province </label>
                                                                                    <select required class="form-control" name="to_province" id="to_province">
                                                                                        <option value="" selected="" disabled="">- Select Province -</option>
                                                                                        <?php $this->load->view('rajaongkir/getProvince'); ?>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="to_city">To City </label>
                                                                                    <select required class="form-control" name="destination" id="destination">
                                                                                        <option value="" selected="" disabled="">- Select City -</option>
                                                                                    </select>
                                                                            </div>

                                                                                <div class="form-group">
                                                                                    <label for="courier">Courier </label>
                                                                                    <select required class="form-control" name="courier" id="courier">
                                                                                        <option value="jne">JNE</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="weight">Weight (gram)</label>
                                                                                    <input type="text" class="form-control" name="weight" id="weight" value="100">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                <button type="submit" onclick="tampil_data('data')" class="btn btn-success">Check In</button>
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
                                        <div class="col-md-4 profile-center"><br>
                                            <div class="post border-bottom p-3 bg-white w-shadow">
                                                <div class="media text-muted ">
                                                    <div class="content">
                                                        <div class="">
                                                            <div class="">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="panel panel-primary">
                                                                            <div class="panel-heading">
                                                                                <h6 class="panel-title">Delivery Payment List</h6>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div id="hasil"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <footer>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <p class="text-center">Copyright © <?php echo date('Y') ?> <a href="http://syabandz.blogspot.com/">Syabandz.Blogspot.Com</a></p>
                                                                        </div>
                                                                    </div>
                                                                </footer>
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
                </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
function tampil_data(act) {
	var w = $('#origin').val();
	var x = $('#destination').val();
	var y = $('#weight').val();
	var z = $('#courier').val();

	$.ajax({
			url: "rajaongkir/getCost",
			type: "GET",
			data : {origin: w, destination: x, berat: y, courier: z},
			success: function (ajaxData) {
					$("#hasil").html(ajaxData);
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