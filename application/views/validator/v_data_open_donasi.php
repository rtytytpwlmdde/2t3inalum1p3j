<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Open Donasi</h1>
  </div>
   <div class="col-12 col-sm-0 text-center text-sm-left mb-4 mb-sm-0">
  
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
			<th>Nama kegiatan</th>
            <th>Keterangan</th>
            <th>Daftar Donasi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
                    $no = 1;
                    foreach ($open_donasi as $u){ 
                    ?>
          <tr>
          <td><?php echo $no++ ?></td>
          
          <td><?php echo $u->nama_kegiatan ?></td>
          <<td><?php echo $u->Keterangan?></td></td>
          <td>
          <a href="<?php echo site_url('validator/opendonasi/data_donasi/'.$u->id_opendonasi); ?>"type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
					<i class="fas fa-comment">Lihat Donasi</i>
			</a>
          </a>
          </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>