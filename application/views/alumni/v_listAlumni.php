<div class="container-fluid ">

<!-- Page Heading -->
<div class="row py-2 ">
  <div class="col-sm-6">
    <h1 class=" h3 mb-2 text-gray-800">Alumni</h1>
  </div>
<?php $status_operator = $this->session->userdata('status') ?>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
            <?php if($status_operator == 'admin' || $status_operator == 'operator_fakultas' || $status_operator == 'operator_prodi'){ ?>
     <a href="<?php echo base_url('alumni/formTambahAlumni'); ?>" class="btn btn-sm btn-primary">Tambah Alumni</a>
            <?php } ?>
    </div>
  </div>
</div>
<!-- DataTales Example -->
<div class=" ">
  <div class="">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100%">
        <thead class="bg-thead text-white">
          <tr>
          <th>No</th>
          <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Program Studi</th>
            <th>Jenjang</th>
            <th>Tahun Masuk</th>
            <th>Tahun Lulus</th>
            <th>Tanggal Yudisium</th>
            <th>NO Telephone</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
                    $no = 1;
                    foreach ($alumni as $u){ 
                    ?>
          <tr>
          <td><?php echo $no++ ?></td>
          <td>
          <a  href="<?php echo site_url('alumni/detailAlumni/'.$u->nim); ?>">
          <?php echo $u->nim ?>
          </a>
          </td>
          <td><?php echo $u->nama ?></td>
          <td><?php foreach ($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?></td>
          <td><?php foreach ($prodi as $a){if ($a->id_prodi == $u->id_prodi) :echo $a->prodi;endif;}  ?></td>
          <td><?php echo $u->jenjang?></td>
          <td><?php echo $u->angkatan?></td>
          <td><?php echo $u->tahun_lulus?></td>  
          <td><?php echo $u->tanggal_yudisium?></td>
          <td><?php echo $u->nomor_hp?></td>
          <td>
          <a href="<?php echo site_url('alumni/chatting/'.$u->nim); ?>"type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
					<i class="fas fa-comment"></i>
					</a>
	    		<a href="<?php echo site_url('alumni/updateMahasiswa/'.$u->nim); ?>"type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
					<i class="fa fa-edit"></i>
					</a>
					<a href="<?php echo site_url('alumni/hapusMahasiswa/'.$u->nim); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
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