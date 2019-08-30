<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Paket Kuisioner</h1>
  </div>
  <div class="col-sm-6">
    
  </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
					    <th> ID Paket Kuisioner</th>
                        <th> Nama Paket Kuisioner </th>
                      </tr>
        </thead>
        <tbody>
		<?php 
                     foreach ($paket_kuisioner as $u){ 
                    ?>
                <tr>
						<td><?php echo $u->id_paket ?></td>
                        <td>
						<a  href="<?php echo site_url('operator_jurusan/kuisioner/datakuisioner/'.$u->id_paket); ?>">
						<?php echo $u->nama_paket ?>
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