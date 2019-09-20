<?php
        $gagals = $this->session->flashdata('gagals');
        if($gagals != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Gagal!</strong> '.$gagals.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
        $suksess = $this->session->flashdata('suksess');
        if($suksess != NULL){
            echo '
            <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
              <strong>Sukses! </strong> '.$suksess.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
    ?>
    <input  hidden type="text" id="sukses" value="<?php echo $sukses = $this->session->flashdata('sukses');?>">
<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Pesanan </h1>
            <div class="timeline-manage">
                <a href="<?php echo site_url('legalisir/pesananSaya/'); ?>" class="btn btn-light btn-sm  ">
                    <i class='bx bx-money'></i>Semua Pesanan Saya
                </a>
                <a href="<?php echo site_url('legalisir/keranjang/'); ?>" class="btn btn-light btn-sm ">
                    <i class='bx bx-info-circle' ></i>Pesanan Tertunda
                </a>
            </div>
          </div>
          
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class=" h-100 ">
                <div class="">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" no-gutters align-items-center">
                      <table class="table table-bordered">
                        <thead class="bg-thead text-white">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no= 1;
                            $total_berat = 0;
                            $total_harga = 0;
                            $harga = 0;
                            $berat = 0;
                            foreach($keranjang as $u){
                                
                            $id_transaksi = $u->id_transaksi;?>
                            <tr>
                                <td scope="row"><?= $no++; ?></td>
                                <td><?= $u->nama_produk; ?></td>
                                <td><?= $u->jumlah_produk; ?></td>
                                <td hidden ><?= $berat = $u->berat_produk_transaksi; ?></td>
                                <td><?= $harga = $u->harga_transaksi * $u->jumlah_produk; ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#modal<?=$u->id_detail_transaksi?>" class="btn btn-warning btn-sm text-white"><i class="fas fa-pencil-alt"></i></i></a>
                                    <a href="<?php echo base_url('legalisir/hapusProdukKeranjang/'.$id_transaksi."/".$u->id_detail_transaksi); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php 
                                $total_berat += $berat;
                                $total_harga += $harga;
                                } ?>
                            <tr>
                            <tr>
                            <th scope="row">#</th>
                                <td colspan="3"><strong>Total harga sementara</strong></td>
                                <td><strong>Rp <?= $total_harga ?> ,-</strong></td>
                            </tr>
                            <th scope="row">#</th>
                                <td colspan="4">*Total berat = <?= $total_berat; ?> gram</td>
                            </tr>
                            <th scope="row">#</th>
                                <td colspan="4">*Ongkos kirim belum termasuk</td>
                            </tr>

                            
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <form action="<?php echo base_url('legalisir/buatPesanan/'); ?>" method="post">
            <input hidden type="text" name="id_transaksi" value="<?= $id_transaksi; ?>">
            <input hidden type="text" name="total_harga" value="<?= $total_harga; ?>">
            <input hidden type="text" name="total_berat" value="<?= $total_berat; ?>">
            <button type="submit" class="btn btn-primary btn-sm">Selesai dan lanjut mengisi alamat pengiriman</button>
            </form>
        </div>
</div>



<?php  foreach($keranjang as $k){ 
    $tot_harga=0; ?>
<div class="modal fade" id="modal<?=$k->id_detail_transaksi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Produk Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url('legalisir/editProdukKeranjang/'); ?>" method="post">
        <div class="form-group">
            <label>Nama Produk</label>
            <input hidden type="text" name="id_detail_transaksi" class="form-control" value="<?= $k->id_detail_transaksi;?>">
            <input hidden type="text" name="id_produk" class="form-control" value="<?= $k->id_produk;?>">
            <input hidden type="text" name="id_transaksi" class="form-control" value="<?= $k->id_transaksi;?>">
            <input hidden type="text" name="berat_produk" class="form-control" value="<?= $k->berat_produk;?>">
            <input hidden type="text" name="harga_produk" class="form-control" value="<?= $k->harga_produk;?>">
            <input disabled type="nama_produk" class="form-control" value="<?= $k->nama_produk;?>">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <select required  name="jumlah_produk" id="feInputState" class="">
                <option value="5" <?php echo ($k->jumlah_produk=='5')?'selected="selected"':''; ?>>5</option>
                <option value="10" <?php echo ($k->jumlah_produk=='10')?'selected="selected"':''; ?>>10</option>
                <option value="15" <?php echo ($k->jumlah_produk=='15')?'selected="selected"':''; ?>>15</option>
                <option value="20" <?php echo ($k->jumlah_produk=='20')?'selected="selected"':''; ?>>20</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Ubah Pesanan</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php } ?>


