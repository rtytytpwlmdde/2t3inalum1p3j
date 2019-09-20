<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Operator</h1>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
     <a href="<?php echo base_url('admin/user/inputUser'); ?>" class="btn btn-info">Tambah Data Operator</a>
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
            <th> No </th>
            <th> Username </th>
            <th> Password </th>
            <th> Status </th>
            <th> Jurusan </th>
			<th> Prodi </th>
			<th class="text-center"> Aksi </th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th> No </th>
            <th> Username </th>
            <th> Password </th>
            <th> Status </th>
            <th> Jurusan </th>
			<th> Prodi </th>
			<th class="text-center"> Aksi </th>
          </tr>
        </tfoot>
        <tbody>
		 <?php 
                    $no = 1;
                    foreach ($user as $u){ 
                    ?>
          <tr>
            <td><?php echo $no++ ?></td>
                        <td><?php echo $u->username ?></td>
                        <td><?php echo $u->password ?></td>
                        <td><?php echo $u->status?></td>
                        <td><?php foreach ($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?></td>
                        <td><?php foreach ($prodi as $a){if ($a->id_prodi == $u->id_prodi) :echo $a->prodi;endif;}  ?></td>
                        <td class="td-actions text-right">
						<a href="<?php echo site_url('admin/user/updateUser/'.$u->username); ?>"type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
						<i class="fa fa-edit"></i>
						</a>
						<a href="<?php echo site_url('admin/user/hapusUser/'.$u->username); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
                        <i class="fa fa-trash"></i>
                        </a>
						</td>
          </tr>
        </tbody>
		<?php } ?>
      </table>
    </div>
  </div>
</div>

</div>
