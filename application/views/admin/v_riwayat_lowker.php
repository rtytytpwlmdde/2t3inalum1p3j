<div class="container-fluid">

<!-- Page Heading -->
<div class="row py-2">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Lowongan Pekerjaan</h1>
  </div>
   <div class="col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
  <div  style="float:right" >
    <div class="d-flex flex-row-reverse bd-highlight">
    <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
    <div class="d-flex flex-row-reverse bd-highlight">
     <a href="<?php echo base_url('admin/lowker/inputLowker'); ?>" class="btn-sm btn btn-info">Tambah Data Lowongan Pekerjaan</a>
    </div>
    </div>
    </div>
  </div>
</div>
  </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Lowongan</th>
            <th>Jabatan</th>
            <th>Perusahaan</th>
            <th>Website</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
                    $no = 1;
                    foreach ($lowongankerja as $u){ 
                    ?>
         
            <td><?php echo $no?></td>
          <td>
          <a href="<?php echo site_url('admin/lowker/detail_lowker/'.$u->id_lowongan); ?>">
          <?php echo $u->nama_lowongan?>
					</a></td>
          <td><?php echo $u->lowongan_jabatan?></td>
          <td><?php echo $u->nama_perusahaan?></td>
          <td><?php echo $u->website_perusahaan?></td>  
          <td><?php echo $u->alamat_perusahaan?></td>
          <td><a href="<?php echo site_url('admin/lowker/updateLowongan/'.$u->id_lowongan); ?>" class="btn btn-success btn-sm btn-round btn-icon">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?php echo site_url('admin/lowker/hapusLowongan/'.$u->id_lowongan); ?>" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                    </a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>