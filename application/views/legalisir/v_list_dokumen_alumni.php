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
<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Alumni </h1>
            <div class="timeline-manage">
            <div class="btn-group" role="group">
                  <a class="btn btn-sm btn-primary text-white"><i class="fas fa-file-import"></i></i> Import</a>                                           
                  <a data-toggle="modal"  data-target="#modalExport" class="btn btn-sm btn-success text-white"><i class="fas fa-file-excel"></i> Excel</a>
                  <div class="btn-group">
                  <a class="btn btn-sm btn-secondary dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                        <form  class="dropdown-item" action="<?php echo base_url('recording/alumni/' )?>" method="post">
                          <input type="text" name="validasi_ijazah" hidden value="tolak"><button class="btn btn-sm btn-danger text-white" type="submit">Tolak</button>
                      </form>
                      <form  class="dropdown-item" action="<?php echo base_url('recording/alumni/' )?>" method="post">
                          <input type="text" name="validasi_ijazah" hidden value="terkirim"><button class="btn btn-sm btn-warning text-white" type="submit">Terkirim</button>
                      </form>
                      <form  class="dropdown-item" action="<?php echo base_url('recording/alumni/' )?>" method="post">
                          <input type="text" name="validasi_ijazah" hidden value=""><button class="btn btn-sm btn-info text-white" type="submit">Kosong</button>
                      </form>
                      <form  class="dropdown-item" action="<?php echo base_url('recording/alumni/' )?>" method="post">
                          <input type="text" name="validasi_ijazah" hidden value="setuju"><button class="btn btn-sm btn-success text-white" type="submit">Setuju</button>
                      </form>
                  </div>
              </div>
              </div>
            </div>
          </div>
          


        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-2">
              <div class=" h-100 ">
                <div class="">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <table class="table table-bordered">
                                                        <thead class="bg-thead text-white">
                                                            <tr class="text-center">
                                                            <th scope="col">No</th>
                                                            <th scope="col">NIM</th>
                                                            <th scope="col">Nomor Ijazah</th>
                                                            <th scope="col">Tanggal Ijazah</th>
                                                            <th scope="col">Dokumen Ijazah</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Catatan</th>
                                                            <th scope="col">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
															<?php 
                                                                $no = floatval($this->uri->segment('3')) + 1;
																foreach ($alumni as $u){ 
																?>
															<tr>
															<td><?php echo $no++ ?></td>
                                                                    <td><?php echo $u->nim ?></td>
																	<td><?php echo $u->nomor_ijazah ?></td>
                                                                    <td><?= $u->tanggal_ijazah; ?></td>
                                                                    <?php if($u->dokumen_ijazah != null){ ?>
																	<td>
																	<a target="_blank" rel="noopener noreferrer" href="<?php echo base_url();?>pdf/<?php echo $u->dokumen_ijazah ?> " class="btn btn-link btn-sm"><i class="far fa-file-pdf"></i> File</a>
																	</td>
                                                                    <?php }else{ ?>
																	<td>
                                                                        <form action="<?php echo base_url('leges/upload/formUploadIjazah/');?>" method="post">
                                                                        <input name="nim" type="hidden" value="<?= $u->nim?>">
                                                                        <button class="btn btn-outline-warning btn-sm text-dark"><i class="fas fa-upload"></i> Upload</button>
                                                                        </form>
																	</td>
                                                                    <?php }?>
																	<td><?php echo $u->validasi_ijazah ?></td>
																	<td><?php echo $u->catatan_ijazah ?></td>
																	
																	<td class="sorting_1" style="">
																		<a href="<?php echo site_url('recording/validasiIjazah/'.$u->nim); ?>" class="btn btn-sm btn-primary" title="Setuju Pengajuan Upload Ijazah">
																			setuju
																		</a>
																		<a data-toggle="modal"  data-target="#modalTolakIjazah" data-nim="<?= $u->nim; ?>" class="btn btn-sm btn-danger text-white" title="Tolak Pengajuan Upload Ijazah">
																			tolak
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
            </div>
        </div>
</div>


<div class="modal fade" id="modalTolakIjazah" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alasan Penolakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?php echo base_url('leges/recording/tolakIjazah/'); ?>" method="post">
      <div class="modal-asd">
        <input type="hidden" class="id_transaksi_modal" name="nim" id="nim" value="">
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" name="catatan_penolakan" id="nomor_resi">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
$('#modalTolakIjazah').on('show.bs.modal', function (event) {
  let nim = $(event.relatedTarget).data('nim') 
  $(this).find('.modal-asd input').val(nim)
})
</script>

<div class="modal fade" id="modalExport" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLongTitle">Filter Data Yang Akan Di Export</h5>
      </div>
      <div class="modal-body text-center">
      <div class="btn-group" role="group">
            <form action="<?php echo base_url('leges/export/exportDataDokumenAlumni/' )?>" method="post">
                <input type="text" name="status" hidden value="semua"><button class="btn btn-sm btn-primary text-white" type="submit">Semua</button>
            </form> 
            <form action="<?php echo base_url('leges/export/exportDataDokumenAlumni/' )?>" method="post">
                <input type="text" name="status" hidden value="setuju"><button class="btn btn-sm btn-success text-white" type="submit">Setuju</button>
            </form> 
            <form action="<?php echo base_url('leges/export/exportDataDokumenAlumni/' )?>" method="post">
                <input type="text" name="status" hidden value="tolak"><button class="btn btn-sm btn-danger text-white" type="submit">Tolak</button>
            </form> 
            <form action="<?php echo base_url('leges/export/exportDataDokumenAlumni/' )?>" method="post">
                <input type="text" name="status" hidden value="terkirim"><button class="btn btn-sm btn-warning text-white" type="submit">Terkirim</button>
            </form>
            <form action="<?php echo base_url('leges/export/exportDataDokumenAlumni/' )?>" method="post">
                <input type="text" name="status" hidden value="kosong"><button class="btn btn-sm btn-info text-white" type="submit">Kosong</button>
            </form>
        </div>
      </div>
    
      <div class="modal-footer">
        <button  data-dismiss="modal" class="btn btn-outline-secondary btn-sm" >Cancel</button>
      </div>
    </div>
  </div>
</div>