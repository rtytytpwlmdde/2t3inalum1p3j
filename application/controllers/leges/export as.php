<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Export extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('m_export');
  }
  
  public function index(){
    $data['transaksi'] = $this->m_export->view();
    $this->load->view('view', $data);
  }
  
  public function export(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Transaksi")
                 ->setSubject("Transaksi")
                 ->setDescription("Laporan Data Transaksi")
                 ->setKeywords("Data Transaksi");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA TRANSAKSI"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:U1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID TRANSAKSI"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "ID PEMESAN"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "TANGGAL TRANSAKSI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "TOTAL BERAT"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "ONGKOS KIRIM"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "TOTAL HARGA"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "TOTAL PEMBAYARAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "PROVINSI"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "KOTA"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "JALAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "KODE POS"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('M3', "TANGGAL TRANSFER"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('N3', "JAM TRANSFER"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('O3', "JUMLAH TRANSFER"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('P3', "BANK "); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('Q3', "BUKTI TRANSFER"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('R3', "LAYANAN PENGIRIMAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('S3', "STATUS PESANAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('T3', "ESRIMASI PENGIRIMAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('U3', "NOMOR RESI "); // Set kolom E3 dengan tulisan "ALAMAT"
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $transaksi = $this->m_export->view();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($transaksi as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_transaksi);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->id_pemesan);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tanggal_transaksi);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->total_berat);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->ongkos_kirim);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->total_harga);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->total_pembayaran);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->provinsi);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->kota);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->jalan);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->kode_pos);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->tanggal_transfer);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->jam_transfer);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->jumlah_transfer);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->bank);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->bukti_transfer);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->layanan_pengiriman);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->status_pesanan);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->estimasi_pengiriman);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->nomor_resi);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(10); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(30); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Transaksi.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

  
	function listInvoice(){
		// Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Transaksi")
                 ->setSubject("Transaksi")
                 ->setDescription("Laporan Data Transaksi")
                 ->setKeywords("Data Transaksi");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA TRANSAKSI"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:U1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID TRANSAKSI"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "ID PEMESAN"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "TANGGAL TRANSAKSI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "TOTAL BERAT"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "ONGKOS KIRIM"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "TOTAL HARGA"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "TOTAL PEMBAYARAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "PROVINSI"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "KOTA"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "JALAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "KODE POS"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('M3', "TANGGAL TRANSFER"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('N3', "JAM TRANSFER"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('O3', "JUMLAH TRANSFER"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('P3', "BANK "); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('Q3', "BUKTI TRANSFER"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('R3', "LAYANAN PENGIRIMAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('S3', "STATUS PESANAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('T3', "ESRIMASI PENGIRIMAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('U3', "NOMOR RESI "); // Set kolom E3 dengan tulisan "ALAMAT"
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $transaksi = $this->m_export->view();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($transaksi as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_transaksi);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->id_pemesan);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tanggal_transaksi);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->total_berat);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->ongkos_kirim);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->total_harga);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->total_pembayaran);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->provinsi);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->kota);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->jalan);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->kode_pos);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->tanggal_transfer);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->jam_transfer);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->jumlah_transfer);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->bank);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->bukti_transfer);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->layanan_pengiriman);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->status_pesanan);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->estimasi_pengiriman);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->nomor_resi);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(10); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(30); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Transaksi.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
	}
}