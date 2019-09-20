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
        <thead class="bg-thead text-white">
          <tr>
						<th> No </th>
                        <th> ID </th>
                        <th> Nama Jurusan </th>
                        <th> Nama Progrsam Studi </th>
						<th> Aksi </th>
                      </tr>
        </thead>
        <tfoot>
          <tr>
						<th> No </th>
                        <th> ID </th>
                        <th> Nama Jurusan </th>
                        <th> Nama Progrsam Studi </th>
						<th> Aksi </th>
                      </tr>
        </tfoot>
        <tbody>
		<?php 
                    $no = 1;
                    foreach ($prodi as $u){ 
                    ?>
                <tr>
						<td><?php echo $no++ ?></td>
                        <td><?php echo $u->id_prodi ?></td>
                        <td><?php foreach ($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?></td>
                        <td><?php echo $u->prodi ?></td>
                        
						<td >
            <a  data-toggle="modal" title="Edit" data-id_prodi="<?= $u->id_prodi; ?>"  data-prodi="<?= $u->prodi; ?>" class="open-modalEditJurusan btn btn-sm btn-info" href="#modalEditJurusan" > <i class="fa fa-edit"></i></a>
						
						<a href="<?php echo site_url('admin/prodi/hapusProdi/'.$u->id_prodi); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Program Studi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(). 'admin/prodi/editProdi'; ?>" method="POST">
        <div class="modal-body">
              <div class="form-group row">
                  <label class="col-md-3 col-form-label">Nama Program Srudi</label>
                  <div class="col-md-9"> 
                    <input type="hidden" id="id_prodi" name="id_prodi" value="">
                    <input class="form-control"  id="prodi" name="prodi" value="">
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
     var id_prodi = $(this).data('id_prodi');
     $(".modal-body #id_prodi").val( id_prodi );
     var prodi = $(this).data('prodi');
     $(".modal-body #prodi").val( prodi );
});
</script>