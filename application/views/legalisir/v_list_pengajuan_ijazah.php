<?php
        $notif = $this->session->flashdata('gagal');
        if($notif != NULL){
            echo '
            <div class="alert alert-danger alert-dismissible fade show bg-danger text-white" role="alert">
              <strong>Validasi Pembayaran Tidak Berhasil! </strong> '.$notif.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
        $notifsukses = $this->session->flashdata('sukses');
        if($notifsukses != NULL){
            echo '
            <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
              <strong>Sukses! </strong> '.$notifsukses.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
        }
    ?>
<div class=" "> 
        <div class="">
            <div class="row ">
                <div class="col-md-12">
                    <div class="profile-info-right">

                        <!-- Posts section -->
                        <div class="row px-4">
                            <div class="col-md-12 profile-center">
                                <br>
                                <div class="row">
                                <div class="col-sm-6">
                                  <h5 class="mb-3  page-title text-muted">Data Pengajuan Upload Ijazah
                                  </h5>
                                </div>
                                <div class="col-sm-6">
                                  <div class="d-flex flex-row-reverse bd-highlight">
                                  <div class="btn-group" role="group">
                                            <a class="btn btn-sm btn-secondary text-white">Pengajuan</a>
                                            <a class="btn btn-sm btn-primary"><i class="fas fa-file-excel"></i> Import</a>                                           
                                            <a class="btn btn-sm btn-success"><i class="fas fa-file-excel"></i> Excel</a>
                                        </div>
                                  </div>
                                </div>
                                </div>
                                <div class=" border-bottom p-2 bg-white w-shadow">
                                    <div class=" ">
                                        <div class="content">
                                            <div class="col-md-12">
                                                <div class="panel-heading">
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr class="text-center">
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nomor Ijazah</th>
                                                            <th scope="col">Tanggal Ijazah</th>
                                                            <th scope="col">NIM</th>
                                                            <th scope="col">Dokumen Ijazah</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Catatan</th>
                                                            <th scope="col">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
															<?php 
																$no = 1;
																foreach ($ijazah as $u){ 
                                $date=date_create($u->tanggal_ijazah);
																?>
															<tr>
															<td><?php echo $no++ ?></td>
																	<td><?php echo $u->nomor_ijazah ?></td>
                                  <td><?= date_format($date,"d-m-Y") ; ?></td>
																	<td><?php echo $u->nim ?></td>
																	<td>
																	<a target="_blank" rel="noopener noreferrer" href="<?php echo base_url();?>pdf/<?php echo $u->nim ?>.pdf " class="btn btn-link btn-sm"><i class='bx bxs-file-image' ></i>Gambar</a>
																	</td>
																	<td><?php echo $u->validasi_ijazah ?></td>
																	<td><?php echo $u->catatan_ijazah ?></td>
																	
																	<td class="sorting_1" style="">
																		<a href="<?php echo site_url('recording/validasiIjazah/'.$u->nomor_ijazah.'/setuju'); ?>" class="btn btn-sm btn-primary" title="Setuju Pengajuan Upload Ijazah">
																			setuju
																		</a>
																		<a data-toggle="modal"  data-target="#exampleModal" data-nomor_ijazah="<?= $u->nomor_ijazah; ?>" class="btn btn-sm btn-danger text-white" title="Tolak Pengajuan Upload Ijazah">
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
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alasan penolakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?php echo base_url('recording/tolakIjazah/'); ?>" method="post">
      <div class="modal-asd">
        <input type="hidden" class="nomor_ijazah_modal" name="nomor_ijazah" id="nomor_ijazah" value="">
      </div>
      <div class="modal-body">
        <textarea class="form-control" name="catatan_penolakan" id="catatan_penolakan" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
  let nomor_ijazah = $(event.relatedTarget).data('nomor_ijazah') 
  $(this).find('.modal-asd input').val(nomor_ijazah)
})
</script>

