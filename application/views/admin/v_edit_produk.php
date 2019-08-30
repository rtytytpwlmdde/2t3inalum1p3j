<div class="container">

<div class="">
    <h1 class="h4 text-gray-900 mb-4">Edit Data Produk</h1>
</div>
<div class="card o-hidden border-0 shadow-lg ">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-12">
        <div class="p-5">
        <?php foreach($produk as $u): ?>
          <form class="user" action="<?php echo base_url('produk/updateProduk'); ?>" method="post">
            <div class="form-group">
              <input type="text" hidden name="id_produk" class="form-control form-control-user" value="<?php echo $u->id_produk ?>">
                <label for="">Nama Produk</label>
              <input type="text" name="nama_produk" class="form-control form-control-user"value="<?php echo $u->nama_produk ?>">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" class="form-control form-control-user" value="<?php echo $u->harga ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
              Update Produk
            </button>
          </form>
        <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>

</div>