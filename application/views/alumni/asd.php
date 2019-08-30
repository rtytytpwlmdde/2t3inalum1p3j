<div class="profile-posts-options  d-flex justify-content-between">
    <h6 class="text-muted timeline-title">Posts</h6>
    <div class="timeline-manage">
    <a href="<?php echo site_url('alumni/dashboard/open_donasi/'); ?>" class="btn btn-light btn-sm tmo-buttons ">
             <i class='bx bx-money'></i>Open Donasi
            </a>
            <a href="<?php echo site_url('alumni/dashboard/'); ?>" class="btn btn-light btn-sm tmo-buttons active">
            <i class='bx bx-info-circle' ></i>Info FEB
            </a>
            <a href="<?php echo site_url('alumni/dashboard/lowker'); ?>" class="btn btn-light btn-sm tmo-buttons ">
            <i class='bx bxs-briefcase' ></i>Lowongan Kerja
            </a>
    </div>
</div>
<?php 
foreach ($info_feb as $u){ 
?>
<div class="">
    <div class="post border-bottom p-3 bg-white">
        <div class="row">
            <div class="px-2">
                <div class="mt-1">
                    <span class="text-muted"><?php echo $u->keterangan ?> </span><br>
                    <span class="text-muted" style="font-size:14px;"><a target="_blank"  href="<?php echo $u->link?>">Baca Selengkapnya</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>
<br>