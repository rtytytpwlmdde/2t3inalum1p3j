<div class="profile-posts-options  d-flex justify-content-between">
    <h6 class="text-muted timeline-title">Posts</h6>
    <div class="timeline-manage">
            <a href="<?php echo site_url('alumni/dashboard/'); ?>" class="btn btn-light btn-sm tmo-buttons ">
            <i class='bx bx-info-circle' ></i>Info FEB
            </a>
            <a href="<?php echo site_url('alumni/dashboard/lowker'); ?>" class="btn btn-light btn-sm tmo-buttons ">
            <i class='bx bxs-briefcase' ></i>Lowongan Kerja
            </a>
    </div>
</div>
<?php 
foreach ($opendonasi as $u){ 
?>
<div class="post border-bottom p-3 bg-white">
        <div class="row">
            <div class="col-md-8">
                <div class="mt-3">
                <h6><strong><a href=""><?php echo $u->nama_kegiatan ?></a> </strong>  </h6>
                <p><?php echo $u->file ?>   </p>
                <p class="px-4 text-muted"><i class='bx bxs-map'></i> <?php echo $u->No_rekening ?></p>
                <p class="text-muted"><?php echo $u->Keterangan ?> </p>
            </div>
            </div>
            <div class="col-md-4">
            <div class="d-block mt-3">
                <img src="<?php echo base_url(); ?>/assets/images/users/post/post-1.jpg" class="w-100 mb-3"  alt="post image">
            </div>
            </div>
        </div>
       
       
        <div class="media text-muted pt-3">
            
<a style="font-size:12px; " class="text-muted" href="<?php echo site_url('alumni/opendonasi/detail_open/'.$u->id_opendonasi); ?>">Baca Selengkapnya</a>
        </div>
        
    </div>

<?php } ?>
<br>