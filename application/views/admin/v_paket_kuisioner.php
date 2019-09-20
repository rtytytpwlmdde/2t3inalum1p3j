<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Paket Kuisioner</h1>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
     <a href="<?php echo base_url('admin/paket_kuisioner/inputPaket'); ?>" class="btn btn-info">Tambah Paket Kuisioner</a>
    </div>
  </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-thead text-white">
          <tr>
					    <th> ID Paket Kuisioner</th>
                        <th> Nama Paket Kuisioner </th>
                        <th> Aksi</th>
                      </tr>
        </thead>
        <tbody>
		<?php 
                     foreach ($paket_kuisioner as $u){ 
                    ?>
                <tr>
						<td><?php echo $u->id_paket ?></td>
                        <td>
						<a  href="<?php echo site_url('admin/kuisioner/datakuisioner/'.$u->id_paket); ?>">
						<?php echo $u->nama_paket ?>
						</a>
						</td>
                        <td>
						<a href="<?php echo site_url('admin/paket_kuisioner/updatePaket/'.$u->id_paket); ?>" type="button"  rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon" title="Edit">
                        <i class="fa fa-edit"></i>
						</a>
						<a href="<?php echo site_url('admin/paket_kuisioner/hapusPaket/'.$u->id_paket); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
                        <i class="fa fa-trash"></i>
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