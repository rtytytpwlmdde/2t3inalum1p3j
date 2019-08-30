<div class="container-fluid pt-2 pb-2">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Riwayat Pekerjaan</h1>
            <div class="timeline-manage">
                
     <a href="<?php echo base_url('alumni/profil/inputPekerjaan'); ?>" class="btn btn-sm btn-info">Tambah Riwayat Pekerjaan</a>
            </div>
          </div>
          
          <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
						<th> No </th>
                        <th> Tempat Kerja</th>
                        <th> Posisi/Jabatan </th>
                        <th> Golongan PNS </th>
                        <th> Pendapatan/Gaji </th>
                        <th> Mulai Bekerja </th>
                        <th> Berhenti Bekerja </th>
                        <th> Alamat Kerja</th>
						<th> Aksi </th>
                      </tr>
        </thead>
        <tbody>
		<?php 
                    $no = 1;
                    foreach ($riwayat_pekerjaan as $u){ 
                    ?>
                <tr>
						<td><?php echo $no++ ?></td>
                        <td><?php echo $u->tempat_kerja ?></td>
                        <td><?php echo $u->posisi ?></td>
                        <td><?php echo $u->golongan_pns ?></td>
                        <td><?php echo $u->pendapatan_per_bulan ?></td>
                        <td><?php echo $u->mulai_kerja ?></td>
                        <td><?php echo $u->berhenti_kerja ?></td>
                        <td><?php echo $u->alamat_kerja ?></td>
                        <td >
						<a href="<?php echo site_url('alumni/profil/updatePekerjaan/'.$u->id_riwayat_pekerjaan); ?>" type="button"  rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon" title="Edit">
                        <i class="fa fa-edit"></i>
						</a>
						<a href="<?php echo site_url('alumni/profil/hapusPekerjaan/'.$u->id_riwayat_pekerjaan); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
                        <i class="fa fa-trash"></i>
                        </a>
						</td>
                </tr>
                <?php } ?>
        </tbody>
      </table>
    </div>
    </div>