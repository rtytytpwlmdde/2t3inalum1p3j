<div class="container-fluid">
<?php
        $gagal = $this->session->flashdata('gagal');
        if($gagal != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Gagal!</strong> '.$gagal.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
        $sukses = $this->session->flashdata('sukses');
        if($sukses != NULL){
            echo '
            <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
              <strong>Sukses! </strong> '.$sukses.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
    ?>
<!-- Page Heading -->
<div class="row py-2">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Riwayat Pendidikan</h1>
  </div>
<?php $status_operator = $this->session->userdata('status') ?>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
        <?php if($username == $this->session->userdata('username') || 'operator_fakultas' == $this->session->userdata('status')){ ?>
     <a data-toggle="modal"  class="modalTambahPendidikan btn btn-primary btn-sm" href="#modalTambahPendidikan">Tambah Riwayat Pendidikan</a>

        <?php } ?>
    </div>
  </div>
</div>
<!-- DataTales Example -->
<div class=" ">
  <div class="">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-thead text-white">
          <tr>
            <th>No</th>
            <th>Jenjang</th>
            <th>Sekolah</th>
            <th>Jurusan Pendidikan</th>
            <th>Tahun Masuk</th>
            <th>Tahun Lulus</th>
        <?php if($username == $this->session->userdata('username') || 'operator_fakultas' == $this->session->userdata('status')){ ?>
            <th>Aksi</th>
            <?php }?>
          </tr>
        </thead>
        <tbody>
        <?php 
            $no = 1;
            foreach ($pendidikan as $u){ 
            ?>
        <tr>
        <td><?php echo $no++ ?></td>
                <td><?php echo $u->jenjang_pendidikan ?></td>
                <td><?php echo $u->nama_sekolah ?></td>
                <td><?php echo $u->jurusan_pendidikan ?></td>
                <td><?php echo $u->tahun_masuk ?></td>
                <td><?php echo $u->tahun_lulus ?></td>
               
                <td class="sorting_1" style="">
                <?php if($username == $this->session->userdata('username') || 'operator_fakultas' == $this->session->userdata('status')){ ?>
                    <a data-toggle="modal"  
                            data-id_pendidikan="<?php echo $u->id_pendidikan; ?>"  
                            data-nama_sekolah="<?php echo $u->nama_sekolah; ?>"  
                            data-jurusan_pendidikan="<?php echo $u->jurusan_pendidikan; ?>"  
                            data-jenjang_pendidikan="<?php echo $u->jenjang_pendidikan; ?>"  
                            data-tahun_masuk="<?php echo $u->tahun_masuk; ?>"  
                            data-tahun_lulus="<?php echo $u->tahun_lulus; ?>" 
                        class="modalEditPendidikan btn btn-warning btn-sm" href="#modalEditPendidikan">Edit</a>
                        <form action="<?php echo base_url("alumni/hapusRiwayatPendidikan");?>" method="post">
                            <input type="hidden" name="username" value="<?= $username ?>">
                            <input type="hidden" name="id_pendidikan" value="<?= $u->id_pendidikan ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>

                <?php } ?>
                </td>
            </tr>
            <?php }?>
        
        
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>


<div class="modal fade" id="modalTambahPendidikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header bg-thead">
    <h6 class="text-center text-white">Tambah Riwayat Pendidikan</h6>
    </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'alumni/tambahRiwayatPendidikan'; ?>"  method="post">
        <input type="hidden"   class="form-control" name="username" value="<?= $username?>"/>
        <div class="form-group">
            <label for="inputCity">Jenjang</label>
            <input type="text" class="form-control" name="jenjang_pendidikan" placeholder="ex: SD SMP SMA SMK S1 S2">
        </div>
        <div class="form-group">
            <label for="inputCity">Nama Sekolah</label>
            <input type="text" class="form-control" name="nama_sekolah" >
        </div>
        <div class="form-group">
            <label for="inputCity">Jurusan</label>
            <input type="text" class="form-control" name="jurusan_pendidikan" placeholder="ex: Jurusan Akuntansi, IPA, IPS, TKJ">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Tahun Masuk</label>
                <input type="text" class="form-control" name="tahun_masuk">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">Tahun Lulus</label>
                <input type="text" class="form-control" name="tahun_lulus" >
            </div>
        </div>
        <div class="d-flex flex-row-reverse bd-highlight py-2">
            <div class="px-1"><button type="submit" class="btn btn-primary btn-sm">Tambah Riwayat Pendidikan</button></div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditPendidikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header bg-thead">
    <h6 class="text-center text-white">Edit Riwayat Pendidikan</h6>
    </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'alumni/updateRiwayatPendidikan'; ?>" method="post">
        <input type="hidden"   class="form-control" name="username" value="<?= $username?>"/>
        <input type="hidden"   class="form-control" name="id_pendidikan" id="id_pendidikan" value=""/>
        <div class="form-group">
            <label for="inputCity">Jenjang</label>
            <input type="text"id="jenjang_pendidikan"  class="form-control" name="jenjang_pendidikan"  value="" >
        </div>
        <div class="form-group">
            <label for="inputCity">Sekolah</label>
            <input type="text"id="nama_sekolah"  class="form-control" name="nama_sekolah"  value="" >
        </div>
        <div class="form-group">
            <label for="inputCity">Jurusan</label>
            <input type="text" id="jurusan_pendidikan" class="form-control" name="jurusan_pendidikan"  value="" >
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Tahun Masuk</label>
                <input type="text"id="tahun_masuk"  class="form-control" name="tahun_masuk"  value="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">Tahun Lulus</label>
                <input type="text" id="tahun_lulus" class="form-control" name="tahun_lulus"  value="" >
            </div>
        </div>
        <div class="d-flex flex-row-reverse bd-highlight py-2">
            <div class="px-1"><button type="submit" class="btn btn-primary btn-sm">Update Riwayat Pendidikan</button></div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
$(document).on("click", ".modalEditPendidikan", function () {
     var id_pendidikan = $(this).data('id_pendidikan');
     $(".modal-body #id_pendidikan").val( id_pendidikan );
     var jenjang_pendidikan = $(this).data('jenjang_pendidikan');
     $(".modal-body #jenjang_pendidikan").val( jenjang_pendidikan );
     var nama_sekolah = $(this).data('nama_sekolah');
     $(".modal-body #nama_sekolah").val( nama_sekolah );
     var jurusan_pendidikan = $(this).data('jurusan_pendidikan');
     $(".modal-body #jurusan_pendidikan").val( jurusan_pendidikan );
     var tahun_masuk = $(this).data('tahun_masuk');
     $(".modal-body #tahun_masuk").val( tahun_masuk );
     var tahun_lulus = $(this).data('tahun_lulus');
     $(".modal-body #tahun_lulus").val( tahun_lulus );
});
</script>
