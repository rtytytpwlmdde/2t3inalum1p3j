
<div class="">

<!-- Page Heading -->
<div class="row">
  <div class="col-sm-6">
    <div class="py-2">
      <h5 class="">Lowongan Pekerjaan</h5>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="py-2 d-flex flex-row-reverse bd-highlight">
     <a href="<?php echo base_url('alumni/lowker/inputLowker'); ?>" class="btn btn-sm btn-info">Tambah Data Lowker</a>
    </div>
  </div>
</div>
<!-- DataTales Example -->
<div style="min-width: 600px">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="bg-white ">
                        
                        <div class="pt-0">
                        <div class=" p-0 pb-3" style="overflow-x:auto;">
                          <table class="table mb-0 " id="pegawai" >
                          <thead >
                          <td style="height:1px;"></td>
                          <td style="height:1px;"></td>
                      </thead>
                            <tbody>
                    <?php foreach($lowongankerja as $u){ ?>
                                <tr>
                                    <td class="text-center">
                                    <div class='vl' >
                                    <div class="text-center text-sm-center mb-4 mb-sm-0" style="border-left: 6px solid #4ba9e7; height: 70px; padding-left:20px;">
                                    <a  href="<?php echo site_url('admin/lowker/detail_lowker/'.$u->id_lowongan); ?>">
                                      <h3 class="page-title font-weight-bold text-primary"><?php echo $u->nama_lowongan ?> </h3>
                                      </a>
                                        <span class="text-uppercase page-subtitle text-primary"><?php echo $u->nama_perusahaan ?></span>
                                    </div>
                                    </div>
                                    </td>
                                    <td class="">
                                    <div class="">
                                        <info style="font-size:27px; color:#5a8eef;"><?php echo $u->lowongan_jabatan ?></info><br>
                                        <info><?php echo $u->nama_perusahaan ?></info><br>
							                    			<info><?php echo $u->alamat_perusahaan ?> </info>
                                    </div>
                                    </td>
                                        <td class="td-actions text-right">
                                        <?php if($u->status=="BelumValid"){ ?>
                                                          <a href="<?php echo site_url('alumni/lowker/updateLowongan/'.$u->id_lowongan); ?>"    class="btn btn-warning btn-sm  text-white"  title="Update">
                                                          <i class="bx bxs-edit"></i>
                                        
                                        <a href="<?php echo site_url('alumni/lowker/hapusLowongan/'.$u->id_lowongan); ?>"    class="btn btn-danger btn-sm "  title="Hapus">
                                                          <i class="bx bxs-trash "></i>
                                                          </a>
                                                          </a>
                                        <?php }else{?>
                                        <a href="<?php echo site_url('alumni/lowker/hapusLowongan/'.$u->id_lowongan); ?>"    class="btn btn-danger btn-sm "  title="Hapus">
                                                          <i class="bx bxs-trash "></i>
                                                          </a>
                                        <?php } ?>
                                                          </td>
                                        
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