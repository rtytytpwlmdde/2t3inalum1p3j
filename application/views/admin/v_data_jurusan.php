<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Jurusan</h1>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
     <a hidden href="<?php echo base_url('admin/user/inputUser'); ?>" class="btn btn-info">Tambah Data Jurusan</a>
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
                        <td>
            <a  data-toggle="modal" title="Edit" data-id_jurusan="<?= $u->id_jurusan; ?>"  data-jurusan="<?= $u->jurusan; ?>" class="open-modalEditJurusan btn btn-sm btn-info" href="#modalEditJurusan" > <i class="fa fa-edit"></i></a>
						<a href="<?php echo site_url('admin/jurusan/hapusJurusan/'.$u->id_jurusan); ?>"    class="btn btn-danger btn-sm btn-round btn-icon" title="Hapus">
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

<div class="modal fade" id="modalEditJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(). 'admin/jurusan/editJurusan'; ?>" method="POST">
        <div class="modal-body">
              <div class="form-group row">
                  <label class="col-md-3 col-form-label">Nama Jurusan</label>
                  <div class="col-md-9"> 
                    <input type="hidden" id="id_jurusan" name="id_jurusan" value="">
                    <input class="form-control"  id="jurusan" name="jurusan" value="">
                  </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<script>
$(document).on("click", ".open-modalEditJurusan", function () {
     var id_jurusan = $(this).data('id_jurusan');
     $(".modal-body #id_jurusan").val( id_jurusan );
     var jurusan = $(this).data('jurusan');
     $(".modal-body #jurusan").val( jurusan );
});
</script>