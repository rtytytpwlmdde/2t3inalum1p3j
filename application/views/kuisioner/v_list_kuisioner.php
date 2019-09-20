<div class="container-fluid">

<!-- Page Heading -->
<div class="row py-2">
  <div class="col-sm-6">
    <h1 class="h3 mb-2 text-gray-800">Kuisioner</h1>
  </div>
<?php $status_operator = $this->session->userdata('status') ?>
  <div class="col-sm-6">
    <div class="d-flex flex-row-reverse bd-highlight">
            <?php if($status_operator == 'admin' || $status_operator == 'operator_fakultas' || $status_operator == 'operator_prodi'){ ?>
     <a href="<?php echo base_url('kuisioner/formTambahKuisioner'); ?>" class="btn btn-sm btn-primary">Tambah Kuisioner</a>
            <?php } ?>
    </div>
  </div>
</div>
<!-- DataTales Example -->
<div class=" ">
  <div class="">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-thead text-white">
          <tr>
            <th>No</th>
            <th>ID Kuisioner</th>
            <th>Nama Kuisioner</th>
            <?php if($status_operator == 'admin' || $status_operator == 'operator_fakultas' || $status_operator == 'operator_prodi'){ ?>
            <th>Aksi</th>
            <th>Status</th>
            <th>Report</th>
              <?php }?>
          </tr>
        </thead>
        <tbody>
        <?php 
            $no = 1;
            foreach ($kuisioner as $u){ 
            ?>
        <tr>
        <td><?php echo $no++ ?></td>
                <td><?php echo $u->id_kuisioner ?></td>
                <td><a href="<?php echo site_url('kuisioner/detailKuisioner/'.$u->id_kuisioner.'/0'); ?>"><?php echo $u->nama_kuisioner ?></a></td>
                
                <?php if($status_operator == 'admin' || $status_operator == 'operator_fakultas' || $status_operator == 'operator_prodi'){ ?>
                  <td class="sorting_1" style="">
                    <a href="<?php echo site_url('kuisioner/editKuisioner/'.$u->id_kuisioner); ?>" class="text-warning" title="Edit">
                    <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?php echo site_url('kuisioner/hapusKuisioner/'.$u->id_kuisioner); ?>" class="px-2 text-danger"  title="Hapus">
                      <i class="fa fa-trash" ></i>
                    </a>
                    </div>
                </td>
                <?php }?>
                <?php if($status_operator == 'admin' || $status_operator == 'operator_fakultas' ){ ?>
                  <td class="sorting_1" style="">
                <?php if($u->status_kuisioner == 'online' ){ ?>
                    <a href="<?php echo site_url('kuisioner/editStatusKuisioner/'.$u->id_kuisioner); ?>" class="px-2 text-success"  title="Klik Tombol ini untuk mengubah status kuisioner">
                      <i class="fas fa-globe-asia"></i> Online
                    </a>
                <?php }else{?>
                    <a href="<?php echo site_url('kuisioner/editStatusKuisioner/'.$u->id_kuisioner); ?>" class="px-2 text-secondary"  title="Klik Tombol ini untuk mengubah status kuisioner">
                      <i class="fas fa-globe-asia"></i> Hide
                    </a>
                  <?php } ?>
                </td>
                <?php }?>
                <td><a href="<?php echo site_url('report/exportReport/'.$u->id_kuisioner); ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-file-export"></i> Report</a></td>
            </tr>
        
            <?php } ?>
        
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>