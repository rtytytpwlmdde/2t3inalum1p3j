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
            <h1 class="h3 mb-0 text-gray-800">Pembayaran </h1>
            <div class="timeline-manage">
                                          <a class="btn btn-sm btn-outline-primary "  href="<?php echo base_url('legalisir/export/exportInvoice/' )?>" >Rekap Invoice Excel</a>

                                          <a class="btn btn-sm btn-primary"  target="_blank" href="<?php echo base_url('legalisir/export/printInvoice/' )?>" >Print Invoice Transaksi</a>
            </div>
          </div>
          


        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class=" h-100 ">
                <div class="">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <table class="table table-bordered " style="width:100%" id="myTable">
                                                        <thead class="bg-thead text-white">
                                                            <tr class="text-center">
                                                            <th scope="col">#</th>
                                                            <th scope="col">Pilih</th>
                                                            <th scope="col">ID Transaksi</th>
                                                            <th scope="col">Alumni</th>
                                                            <th scope="col">Tanggal Transaksi</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Total Pembayaran</th>
                                                            <th scope="col">Jumlah Transfer</th>
                                                            <th scope="col">Tanggal Transfer</th>
                                                            <th scope="col">Jam Transfer</th>
                                                            <th scope="col">Bank</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if($data_transaksi =="ada"){ ?>
                                                            <?php 		
                                                            $no = 1;	
                                                            foreach ($transaksi as $u){ 
                                                                $result = 0;
                                                                if($data_invoice =="ada"){
                                                                    foreach ($invoice as $i){ 
                                                                        if($u->id_transaksi == $i->id_transaksi){
                                                                            $result = 1;
                                                                        }
                                                                    }
                                                                }
                                                                $date=date_create($u->tanggal_transaksi);
                                                                $tanggal_transfer=date_create($u->tanggal_transfer);
                                                                ?>
                                                                <tr <?php if($result == 1){?>style="background-color: rgba(50, 115, 220, 0.3);"  <?php } ?> >
                                                                    <td scope="row"><?= $no++; ?></td>
                                                                    <td class="text-center">
                                                                    <?php if($result == 1){?>
                                                                        <form action="<?php echo base_url('legalisir/export/hapusInvoice/' )?>" method="post">
                                                                            <input type="hidden" name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                                                                            <button type="submit" class="btn btn-outline-danger" title="pilih transaksi ini untuk di cetak"><i class="fas fa-trash-alt"></i></i></button>
                                                                        </form>
                                                                    <?php }else{ ?>
                                                                        <form action="<?php echo base_url('legalisir/export/tambahInvoice/' )?>" method="post">
                                                                            <input type="hidden" name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                                                                            <button type="submit" class="btn btn-outline-primary" title="pilih transaksi ini untuk di cetak"><i class="far fa-check-square"></i></button>
                                                                        </form>
                                                                    <?php } ?>
                                                                    </td>
                                                                    <td class="text-center"><?= $u->id_transaksi; ?></td>
                                                                    <td><?= $u->nama; ?></td>
                                                                    <td><?= date_format($date,"d-m-Y") ; ?></td>
                                                                    <?php if($this->session->userdata('status') == 'keuangan'){ ?>
                                                                        <td
                                                                        <?php if($u->status_pesanan == '4' || $u->status_pesanan == '5' || $u->status_pesanan == '6' || $u->status_pesanan == '7'){ ?>
                                                                            class="text-success"> <?php echo 'valid'; 
                                                                        }else if($u->status_pesanan == '3'){ ?>
                                                                            class="text-warning"> <?php echo 'pembayaran belum divalidasi oleh keuangan'; 
                                                                            } ?>
                                                                        </td>
                                                                    <?php } ?>
                                                                    <?php if($this->session->userdata('status') == 'recording'){ ?>
                                                                        <td
                                                                        <?php if($u->status_pesanan == '4'){ ?>
                                                                            class="text-dark"> <?php echo 'belum di proses oleh recording'; 
                                                                        }else if($u->status_pesanan == '5'){ ?>
                                                                            class="text-parimary"> <?php echo 'Pesanan sedang di proses'; 
                                                                        } else if($u->status_pesanan == '6'){ ?>
                                                                            class="text-warning"> <?php echo 'Pesanan telah dikirim'; 
                                                                        } else if($u->status_pesanan == '7'){ ?>
                                                                            class="text-success"> <?php echo 'Pesanan telah sampai di tujuan'; 
                                                                        } ?>
                                                                        </td>
                                                                    <?php } ?>
                                                                    <td><?= $u->total_pembayaran; ?></td>
                                                                    <td><?= $u->jumlah_transfer; ?></td>
                                                                    <td><?=  date_format($tanggal_transfer,"d-m-Y") ; ?></td>
                                                                    <td><?= $u->jam_transfer; ?></td>
                                                                    <td><?= $u->bank; ?></td>
                                                                
                                                                </tr>
                                                            <?php } ?>
                                                        <?php }else{ ?>
                                                        <td>Tidak ada data</td>
                                                        <?php }?>


                                                            
                                                        </tbody>
                                                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
</div>


