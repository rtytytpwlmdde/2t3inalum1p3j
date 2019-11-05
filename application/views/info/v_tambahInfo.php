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
    <h1 class="h3 mb-0 text-white">Tambah Info FEB UB</h1>   
</div>
<div class="  ">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-12">
        <div class="p-4">
          <form class="user" action="<?php echo base_url('info/tambahInformasi'); ?>" method="post">
            
          <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul_informasi" class="form-control" id="" >
            </div>
            <div class="form-group">
                <label for="">Informasi</label>
                <textarea id="froala-editor" name="nama_informasi" >Silahkan tulis disini.</textarea>
            </div>
            <div class="form-group">
                <label for="">Link Info</label>
                <input type="text" name="link_info" class="form-control" id="" >
            </div>
             
            <button type="submit" class="btn btn-primary btn-user btn-block">
              Simpan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script> new FroalaEditor('textarea#froala-editor')</script>