<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
    <h6>Data produk yang akan tersedia di legalisir online</h6>
  </div>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
     <a href="<?php echo base_url('produk/tambah_produk'); ?>" class="btn btn-info">Tambah Produk</a>
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
            <th>No</th>
            <th>ID </th>
            <th>Nama </th>
            <th>Harga</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $no = 1;
            foreach ($produk as $u){ 
            ?>
        <tr>
        <td><?php echo $no++ ?></td>
                <td><?php echo $u->id_produk ?></td>
                <td><?php echo $u->nama_produk ?></td>
                <td><?php echo $u->harga_produk ?></td>
                <td><?php echo $u->berat_produk ?></td>
                <td class="sorting_1" style="">
                    <a href="<?php echo site_url('produk/editProduk/'.$u->id_produk); ?>" class="text-warning" title="Edit">
                    <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?php echo site_url('produk/hapusProduk/'.$u->id_produk); ?>" class="px-2 text-danger"  title="Hapus">
                      <i class="fa fa-trash" ></i>
                    </a>
                    </div>
                </td>
            </tr>
        
            <?php } ?>
        
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>