<div class="container">

<div class="">
    <h1 class="h4 text-gray-900 mb-4">Tambah Data Produk</h1>
</div>
<div class="card o-hidden border-0 shadow-lg ">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-12">
        <div class="p-5">
          <form class="user" action="<?php echo base_url('produk/tambahProduk'); ?>" method="post">
            <div class="form-group">
                <label for="">Nama Produk</label>
              <input type="text" name="nama_produk" class="form-control form-control-user" id="" placeholder="Nama produk">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga_produk" class="form-control form-control-user" id="" placeholder="Harga per lembar">
            </div>
            <div class="form-group">
                <label for="">Berat</label>
                <input type="text" name="berat_produk" class="form-control form-control-user" id="" placeholder="Berat per lembar dalam satuan GRAM">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
              Tambah Produk
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</div>