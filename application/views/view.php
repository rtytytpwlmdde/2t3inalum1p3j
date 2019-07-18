<h1>Data Transaksi</h1><hr>
<a href="<?php echo base_url("index.php/export/export"); ?>">Export ke Excel</a><br><br>
<table border="1" cellpadding="8">
<tr>
  <th>ID TRANSAKSI</th>
  <th>ID PEMESAN</th>
  <th>TANGGAL TRANSAKSI</th>
  <th>TOTAL BERAT</th>
  <th>ONGKOS KIRIM</th>
  <th>Alamat</th>
  <th>TOTAL HARGA</th>
  <th>TOTAL PEMBAYARAN</th>
  <th>PROVINSI</th>
  <th>KOTA</th>
  <th>JALAN</th>
  <th>KODE POS</th>
  <th>TANGGAL TRANSFER</th>
  <th>JAM TRANSFER</th>
  <th>JUMLAH TRANSFER</th>
  <th>BANK</th>
  <th>BUKTI TRANSFER</th>
  <th>LAYANAN PENGIRIMAN</th>
  <th>STATUS PEMESANAN</th>
  <th>ESTIMASI PENGIRIMAN</th>
  <th>NOMOR RESI</th>
</tr>
<?php
if( ! empty($transaksi)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($transaksi as $data){ // Lakukan looping pada variabel siswa dari controller
    echo "<tr>";
    echo "<td>".$data->id_transaksi."</td>";
    echo "<td>".$data->id_pemesan."</td>";
    echo "<td>".$data->tanggal_transaksi."</td>";
    echo "<td>".$data->total_berat."</td>";
    echo "<td>".$data->ongkos_kirim."</td>";
    echo "<td>".$data->total_harga."</td>";
    echo "<td>".$data->total_pembayaran."</td>";
    echo "<td>".$data->provinsi."</td>";
    echo "<td>".$data->kota."</td>";
    echo "<td>".$data->id_pemesan."</td>";
    echo "<td>".$data->jalan."</td>";
    echo "<td>".$data->kode_pos."</td>";
    echo "<td>".$data->tanggal_transfer."</td>";
    echo "<td>".$data->jam_transfer."</td>";
    echo "<td>".$data->jumlah_transfer."</td>";
    echo "<td>".$data->bank."</td>";
    echo "<td>".$data->bukti_transfer."</td>";
    echo "<td>".$data->layanan_pengiriman."</td>";
    echo "<td>".$data->status_pesanan."</td>";
    echo "<td>".$data->estimasi_pengiriman."</td>";
    echo "<td>".$data->nomor_resi."</td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>