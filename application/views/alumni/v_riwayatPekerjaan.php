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
    <h1 class="h3 mb-2 text-gray-800">Riwayat Pekerjaan</h1>
  </div>
<?php $status_operator = $this->session->userdata('status') ?>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
        <?php if($username == $this->session->userdata('username') || 'operator_fakultas' == $this->session->userdata('status')){ ?>
     <a data-toggle="modal"  class="modalTambahPekerjaan btn btn-primary btn-sm" href="#modalTambahPekerjaan">Tambah Riwayat Pekerjaan</a>

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
            <th>Perusahaan</th>
            <th>Jabatan</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Pendapatan</th>
            <th>Golongan</th>
            <th>Alamat</th>
        <?php if($username == $this->session->userdata('username') || 'operator_fakultas' == $this->session->userdata('status')){ ?>
            <th>Aksi</th>
            <?php }?>
          </tr>
        </thead>
        <tbody>
        <?php 
            $no = 1;
            foreach ($pekerjaan as $u){ 
            ?>
        <tr>
        <td><?php echo $no++ ?></td>
                <td><?php echo $u->nama_perusahaan ?></td>
                <td><?php echo $u->jabatan ?></td>
                <td><?php echo $u->tgl_mulai ?></td>
                <td><?php echo $u->tgl_selesai ?></td>
                <td><?php echo $u->pendapatan ?></td>
                <td><?php echo $u->golongan_pns ?></td>
                <td><?php echo $u->alamat_kerja ?></td>
               
                <td class="sorting_1" style="">
                <?php if($username == $this->session->userdata('username') || 'operator_fakultas' == $this->session->userdata('status')){ ?>
                    <a data-toggle="modal"  
                            data-id_riwayat_pekerjaan="<?php echo $u->id_riwayat_pekerjaan; ?>"  
                            data-jabatan="<?php echo $u->jabatan; ?>"  
                            data-nama_perusahaan="<?php echo $u->nama_perusahaan; ?>"  
                            data-tgl_mulai="<?php echo $u->tgl_mulai; ?>"  
                            data-tgl_selesai="<?php echo $u->tgl_selesai; ?>"  
                            data-pendapatan="<?php echo $u->pendapatan; ?>"  
                            data-golongan_pns="<?php echo $u->golongan_pns; ?>"  
                            data-alamat_kerja="<?php echo $u->alamat_kerja; ?>"  
                        class="modalEditPekerjaan btn btn-warning btn-sm" href="#modalEditPekerjaan">Edit</a>
                        <form action="<?php echo base_url("alumni/hapusRiwayatPekerjaan");?>" method="post">
                            <input type="hidden" name="username" value="<?= $username ?>">
                            <input type="hidden" name="id_riwayat_pekerjaan" value="<?= $u->id_riwayat_pekerjaan ?>">
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


<div class="modal fade" id="modalTambahPekerjaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header bg-thead">
    <h6 class="text-center text-white">Tambah Riwayat Pekerjaan</h6>
    </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'alumni/tambahRiwayatPekerjaan'; ?>" method="post">
        <input type="hidden"   class="form-control" name="username" value="<?= $username?>"/>
        <div class="form-group">
            <label for="inputCity">Pekerjaan</label>
            <input type="text" class="form-control" name="jabatan" >
        </div>
        <div class="form-group">
            <label for="inputCity">Perusahan</label>
            <input type="text" class="form-control" name="nama_perusahaan" >
        </div>
        <div class="form-group">
            <label for="inputCity">Pendapatan</label>
            <input type="text" class="form-control" name="pendapatan" >
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Tgl Mulai</label>
                <input type="date" class="form-control" name="tgl_mulai">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">Tgl Selesai</label>
                <input type="date" class="form-control" name="tgl_selesai" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputCity">Golongan</label>
            <input type="text" class="form-control" name="golongan_pns" >
        </div>
        <div class="form-group">
            <label for="inputCity">Alamat Kerja</label>
            <input type="text" class="form-control" name="alamat_kerja" >
        </div>
        <div class="d-flex flex-row-reverse bd-highlight py-2">
            <div class="px-1"><button type="submit" class="btn btn-primary btn-sm">Tambah Riwayat Pekerjaan</button></div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditPekerjaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header bg-thead">
    <h6 class="text-center text-white">Edit Riwayat Pekerjaan</h6>
    </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'alumni/updateRiwayatPekerjaan'; ?>" method="post">
        <input type="hidden"   class="form-control" name="username" value="<?= $username?>"/>
        <input type="hidden"   class="form-control" name="id_riwayat_pekerjaan" id="id_riwayat_pekerjaan" value=""/>
        <div class="form-group">
            <label for="inputCity">Pekerjaan</label>
            <input type="text"id="jabatan"  class="form-control" name="jabatan"  value="" >
        </div>
        <div class="form-group">
            <label for="inputCity">Perusahan</label>
            <input type="text"id="nama_perusahaan"  class="form-control" name="nama_perusahaan"  value="" >
        </div>
        <div class="form-group">
            <label for="inputCity">Pendapatan</label>
            <input type="text" id="pendapatan" class="form-control" name="pendapatan"  value="" >
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Tgl Mulai</label>
                <input type="date"id="tgl_mulai"  class="form-control" name="tgl_mulai"  value="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">Tgl Selesai</label>
                <input type="date" id="tgl_selesai" class="form-control" name="tgl_selesai"  value="" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputCity">Golongan</label>
            <input type="text" id="golongan_pns" class="form-control" name="golongan_pns"  value="" >
        </div>
        <div class="form-group">
            <label for="inputCity">Alamat</label>
            <input type="text" id="alamat_kerja" class="form-control" name="alamat_kerja"  value="" >
        </div>
        <div class="d-flex flex-row-reverse bd-highlight py-2">
            <div class="px-1"><button type="submit" class="btn btn-primary btn-sm">Tambah Riwayat Pekerjaan</button></div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
$(document).on("click", ".modalEditPekerjaan", function () {
     var id_riwayat_pekerjaan = $(this).data('id_riwayat_pekerjaan');
     $(".modal-body #id_riwayat_pekerjaan").val( id_riwayat_pekerjaan );
     var jabatan = $(this).data('jabatan');
     $(".modal-body #jabatan").val( jabatan );
     var nama_perusahaan = $(this).data('nama_perusahaan');
     $(".modal-body #nama_perusahaan").val( nama_perusahaan );
     var pendapatan = $(this).data('pendapatan');
     $(".modal-body #pendapatan").val( pendapatan );
     var tgl_mulai = $(this).data('tgl_mulai');
     $(".modal-body #tgl_mulai").val( tgl_mulai );
     var tgl_selesai = $(this).data('tgl_selesai');
     $(".modal-body #tgl_selesai").val( tgl_selesai );
     var golongan_pns = $(this).data('golongan_pns');
     $(".modal-body #golongan_pns").val( golongan_pns );
});
</script>
