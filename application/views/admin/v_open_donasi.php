<div class="container-fluid">

<!-- Page Heading -->
<div class="row py-2">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Open Donasi</h1>
  </div>
   <div class="col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
  <div  style="float:right" >
    <div class="d-flex flex-row-reverse bd-highlight">
    <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
    <div class="d-flex flex-row-reverse bd-highlight">
     <a href="<?php echo base_url('admin/lowker/inputLowker'); ?>" class="btn-sm btn btn-info">Tambah Data Open Donasi</a>
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
            <th>Kegiatan</th>
            <th>Keterangan</th>
            <th>Total Anggaran</th>
            <th>Rekening</th>
            <th>Lokasi</th>
            <th>Kontak</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
                    $no = 1;
                    foreach ($opendonasi as $u){ 
                    ?>
         
            <td><?php echo $no++?></td>
          <td> <?php echo $u->nama_kegiatan?></td>
          <td><?php echo $u->Keterangan?></td>
          <td><?php echo $u->total_anggaran?></td>
          <td><?php echo $u->No_rekening?></td>  
          <td><?php echo $u->lokasi?></td>
          <td><?php echo $u->contact_person?></td>
          <td><a href="<?php echo site_url('admin/opendonasi/updateOpendonasi/'.$u->id_opendonasi); ?>" class="btn btn-success btn-sm btn-round btn-icon">
                <i class="fa fa-edit"></i>
                </a>
                <a href="<?php echo site_url('admin/opendonasi/hapusOpendonasi/'.$u->id_opendonasi); ?>" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
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