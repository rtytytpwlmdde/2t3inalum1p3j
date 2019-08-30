<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Jurusan</h1>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
     <a hidden href="<?php echo base_url('admin/user/inputUser'); ?>" class="btn btn-info">Tambah Data Operator</a>
    </div>
  </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
						<th> No </th>
                        <th> ID </th>
                        <th> Nama Jurusan </th>
						<th> Aksi </th>
                      </tr>
        </thead>
        <tfoot>
          <tr>
			<th> No </th>
            <th> ID </th>
            <th> Nama Jurusan </th>
			<th> Aksi </th>
           </tr>
        </tfoot>
        <tbody>
		 <?php 
                    $no = 1;
                    foreach ($jurusan as $u){ 
                    ?>
                <tr>
						<td><?php echo $no++ ?></td>
                        <td><?php echo $u->id_jurusan ?></td>
                        <td><?php echo $u->jurusan ?></td>
						<td >
						<a href="<?php echo site_url('admin/jurusan/hapusJurusan/'.$u->id_jurusan); ?>" type="button"  rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Edit">
                        <i class="fa fa-edit"></i>
						</a>
						<a href="<?php echo site_url('admin/jurusan/hapusJurusan/'.$u->id_jurusan); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
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