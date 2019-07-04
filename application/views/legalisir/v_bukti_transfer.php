<?php
foreach($transaksi as $u){ ?>
    <img  src="<?php echo base_url(); ?>/gambar/<?= $u->bukti_transfer; ?>" >
<?php }
?>