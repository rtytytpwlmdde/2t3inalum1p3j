<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Forum Komunikasi</h1>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
     <a href="<?php echo base_url('admin/groupchat/inputForum'); ?>" class="btn btn-info">Tambah Data Forum Komunikasi</a>
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
					     <th> Nama Forum </th>
                        <th> Jurusan </th>
						<th> Program Studi </th>
                        <th> Angkatan </th>
                        <th> Aksi</th>
                      </tr>
        </thead>
        <tbody>
		<?php 
                     foreach ($grupchat as $u){ 
                    ?>
                <tr>
						<td><?php echo $u->nama_group ?></td>
                        <td><?php foreach ($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?></td>
                        <td><?php foreach ($prodi as $a){if ($a->id_prodi == $u->id_prodi) :echo $a->prodi;endif;}  ?></td>
                        <td><?php echo $u->angkatan ?></td>
                        <td >
						<a href="<?php echo site_url('admin/groupchat/updateForum/'.$u->id_grup); ?>" type="button"  rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon" title="Edit">
                        <i class="fa fa-edit"></i>
						</a>
						<a href="<?php echo site_url('admin/groupchat/hapusForum/'.$u->id_grup); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
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