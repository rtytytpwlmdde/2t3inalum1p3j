<!-- Your Account Personal Information -->
<div class="container">
	<div class="row">
		<div class="col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Identitas Diri</h6>
				</div>
				<div class="ui-block-content">
		     <form class="form-horizontal" method="post" action="<?php echo base_url(). 'alumni/editMahasiswa'; ?>">
						<div class="row">

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">Nama Lengkap</label>
									<input class="form-control" name="nama" placeholder="" type="text">
								</div>

								<div class="form-group label-floating">
									<label class="control-label">Email</label>
									<input class="form-control" name="email" placeholder="" type="email" >
								</div>	</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">NIM</label>
									<input class="form-control" name="nim" placeholder="" type="text">
								</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group label-floating">
									<label class="control-label">Tempat Lahir</label>
									<input class="form-control" placeholder="" name="tempat_lahir" type="text" >
								</div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group date-time-picker label-floating">
                  <label class="control-label">Tanggal Lahir</label>
									
                  <input name="datetimepicker" />
                  <span class="input-group-addon">
                    <svg class="olymp-month-calendar-icon icon"><use xlink:href="<?php echo base_url('icons')?>/icons.svg#olymp-month-calendar-icon"></use></svg>
                  </span>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group label-floating">
                  <label class="control-label">Alamat Asal</label>
                  <input class="form-control" placeholder="" name="alamat_asal" type="text">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group label-floating">
                  <label class="control-label">Kode POS Asal</label>
                  <input class="form-control" placeholder="" name="kode_pos_asal" type="text" >
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group label-floating">
                  <label class="control-label">Nomor Telepon</label>
                  <input class="form-control" placeholder="" name="nomor_telepon" type="text">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group label-floating">
                  <label class="control-label">Nomor HP</label>
                  <input class="form-control" placeholder="" name="nomor_hp" type="text" >
                </div>
              </div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group with-icon label-floating">
                  <label class="control-label">Website</label>
                  <input class="form-control" name="website" type="text">
                  <i class="fa fa-globe c-globe" aria-hidden="true"></i>
                </div>
								<div class="form-group with-icon label-floating">
									<label class="control-label">Facebook</label>
									<input class="form-control" name="facebook" type="text" >
									<i class="fa fa-facebook c-facebook" aria-hidden="true"></i>
								</div>
								<div class="form-group with-icon label-floating">
									<label class="control-label">Twitter</label>
									<input class="form-control" name="twitter" type="text" >
									<i class="fa fa-twitter c-twitter" aria-hidden="true"></i>
								</div>
								<div class="form-group with-icon label-floating">
									<label class="control-label">Instagram</label>
									<input class="form-control" name="instagram" type="text">
									<i class="fa fa-instagram c-instagram" aria-hidden="true"></i>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<button type="submit" name="submit" value="simpan" class="btn btn-primary btn-lg full-width">Update Identitas Diri</button>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>

<!-- ... end Your Account Personal Information -->

<!-- jQuery first, then Other JS. -->
<script src="<?php echo base_url('resource')?>/js/jquery-3.2.0.min.js"></script>
<!-- Js effects for material design. + Tooltips -->
<script src="<?php echo base_url('resource')?>/js/material.min.js"></script>
<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
<script src="<?php echo base_url('resource')?>/js/theme-plugins.js"></script>
<!-- Init functions -->
<script src="<?php echo base_url('resource')?>/js/main.js"></script>

<!-- Select / Sorting script -->
<script src="<?php echo base_url('resource')?>/js/selectize.min.js"></script>

<!-- Datepicker input field script-->
<script src="<?php echo base_url('resource')?>/js/moment.min.js"></script>
<script src="<?php echo base_url('resource')?>/js/daterangepicker.min.js"></script>

<script src="<?php echo base_url('resource')?>/js/mediaelement-and-player.min.js"></script>
<script src="<?php echo base_url('resource')?>/js/mediaelement-playlist-plugin.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  $('#negara').change(function(){
    var e = document.getElementById("negara");
    var id_negara = e.options[e.selectedIndex].value;
    console.log(id_negara)
    if(id_negara != '')
    {
      $.ajax({
        url:"<?php echo site_url();?>/provinsi/get_provinsi_by_negara_js",
        method: "POST",
        data:{id_negara:id_negara},
        success:function(data)
        {
          $('#provinsi').html(data).selectpicker('refresh');
        }
      })
    }
  })
  $('#provinsi').change(function(){
    var e = document.getElementById("provinsi");
    var id_provinsi = e.options[e.selectedIndex].value;
    console.log(id_provinsi)
    if(id_provinsi != '')
    {
      $.ajax({
        url:"<?php echo site_url();?>/kota/get_kota_by_provinsi_js",
        method: "POST",
        data:{id_provinsi:id_provinsi},
        success:function(data)
        {
          $('#kota').html(data).selectpicker('refresh');
        }
      })
    }
  })
})
</script>

</body>
</html>
