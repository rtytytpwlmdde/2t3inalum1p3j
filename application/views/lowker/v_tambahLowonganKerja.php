<?php
        $gagals = $this->session->flashdata('gagal');
        if($gagals != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Gagal!</strong> '.$gagals.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
        $suksess = $this->session->flashdata('sukses');
        if($suksess != NULL){
            echo '
            <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
              <strong>Sukses! </strong> '.$suksess.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
    ?>
<div class="card-header bg-thead ">
    <h1 class="h3 mb-0 text-white">Tambah Lowongan Pekerjaan</h1>   
</div>
<div class="  ">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-12">
        <div class="p-4">
          <form class="user" action="<?php echo base_url('lowker/tambahLowker'); ?>" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="">Lowongan Pekerjaan</label>
              <input type="text" name="lowongan_jabatan" class="form-control" id="" >
              <input type="text" hidden name="tanggal_informasi" class="form-control" value="<?php echo date("Y-m-d H:i:s")?>" >
            </div>
            <div class="form-group">
                <label for="">Nama Perusahaan</label>
              <input type="text" name="nama_perusahaan" class="form-control" id="" >
            </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">No HP / Whatsapp</label>
                    <input type="text" name="contact_person" class="form-control" id="" >
                </div>
                <div class="form-group col-md-4">
                    <label for="">Email</label>
                    <input type="email" name="email_perusahaan" class="form-control" id="" >
                </div>
                <div class="form-group col-md-4">
                    <label for="">Website</label>
                    <input type="text" name="website_perusahaan" class="form-control" id="" >
                </div>
            </div>
            <div class="form-group">
                <label for="">Alamat Perusahaan</label>
                <input type="text" name="alamat_perusahaan" class="form-control" id="" >
            </div>
            <div class="form-group">
                <label for="">Syarat Pekerjaan</label>
                <textarea id="froala-editor" name="syarat_pekerjaan" >Silahkan tulis disini.</textarea>
            </div>
            <div class="form-group">
                <label for="">Logo Perusahaan</label>
                <input type="file" name="logo_perusahaan" class="form-control" id="" >
            </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                <label for="">Kisaran Gaji</label>
                <input type="kisaran_gaji" name="kisaran_gaji" class="form-control" id="" >
                </div>
                <div class="form-group col-md-6">
                <label for="">Batas Penayangan</label>
                <input type="date" name="batas_penayangan" class="form-control" id="" >
                <small class="text-info">Batas waktu penayangan informasi lowongan pekerjaan</small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
              Lanjutkan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script> new FroalaEditor('textarea#froala-editor')</script>