<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct(){
		parent::__construct();		  
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_kuisioner');
		$this->load->model('m_admin');
		$this->load->model('m_export');
		if($this->session->userdata('logged_in') == FALSE){
			redirect('auth/logout');
		}
    }

    function sexportReport($id_kuisioner){
            // Load plugin PHPExcel nya
        $detailKuisioner = $this->m_export->getDetailKuisioner($id_kuisioner);
        $nama_kuisioner = null;
        foreach($detailKuisioner as $u){ // Lakukan looping pada variabel siswa
            $nama_kuisioner = $u->nama_kuisioner;
        }
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
                     ->setLastModifiedBy('My Notes Code')
                     ->setTitle("Data Alumni")
                     ->setSubject("Alumni")
                     ->setDescription("Laporan Data Kuisioner")
                     ->setKeywords("Data Alumni");
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KUISIONER $nama_kuisioner"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NIM"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "DOKUMEN IJAZAH"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "DOKUMEN TRANSKRIP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "NOMOR IJAZAH"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "STATUS IJAZAH"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "CATATAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $kuisioner = $this->m_export->getDataKuisioner($id_kuisioner);
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($kuisioner as $data){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nim);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_pertanyaan);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tanggapan);
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Dokumen Kuisioner");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Laporan Kuisioner.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    function exportReport($id_kuisioner){
       	// Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Alumni")
                 ->setSubject("Alumni")
                 ->setDescription("Laporan Data Alumni")
                 ->setKeywords("Data Alumni");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA DOKUMEN ALUMNI"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $pertayaan = $this->m_export->getJumlahPertanyaan($id_kuisioner);
    $question = $this->m_export->getNamaPertanyaan($id_kuisioner);
    $jumPertanyaan = null;
    $nama_pertanyaan[] = null;
    $id_pertanyaan[] = null;
    $kolom[] = null;
    $posisi[] = null;
    $data_nama_pertanyaan[] = null;
    $data_id_pertanyaan[] = null;
    $number = 0;
    $noPertanyaan = 0;
    foreach($pertayaan as $u){ $jumPertanyaan = $u->jumPertanyaan; 
    }
    foreach($question as $a){ 
        $nama_pertanyaan[$number] = $a->nama_pertanyaan;
        $id_pertanyaan[$number] = $a->id_pertanyaan;
        $number++;
    }
    $excel->setActiveSheetIndex(0)->setCellValue('A3', 'No'); 
    $excel->setActiveSheetIndex(0)->setCellValue('B3', 'Nim'); 
    $excel->setActiveSheetIndex(0)->setCellValue('C3', 'Nama'); 
    for ($i = 'D'; $i < 'ZZ'; $i++) {
        if($noPertanyaan == $jumPertanyaan){
            break;
        }
        $kolom[$id_pertanyaan[$noPertanyaan]] = $i;
        $posisi[$noPertanyaan] = $id_pertanyaan[$noPertanyaan];
        $excel->setActiveSheetIndex(0)->setCellValue($i.'3', $nama_pertanyaan[$noPertanyaan]); 
        $excel->getActiveSheet()->getColumnDimension($i)->setWidth(30); // Set width kolom A
        $noPertanyaan++;
    }
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(30); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom A
    
    ////////////////////////
    $dataKuisioner = $this->m_export->getDataKuisioner($id_kuisioner);
    $responden[] = null;
    $alumni = 'null';
    $first = null;
    $last = 'D';
    #
    
    $cek = 0;
    $no = 0; // Untuk penomoran tabel, di awal set dengan 1
    $nomor_pertanyaan = 0; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    // foreach($dataKuisioner as $data){ // Lakukan looping pada variabel siswa
    //     $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no); // menjadi masalah karena statik
    //     $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_responden);
    //     $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
        
        foreach($question as $asd){
            $data_nama_pertanyaan[$nomor_pertanyaan] = $asd->nama_pertanyaan;
            $data_id_pertanyaan[$nomor_pertanyaan] = $asd->id_pertanyaan;
           
            $nomor_pertanyaan++;
        }
        
        foreach($dataKuisioner as $data){ // Lakukan looping pada variabel siswa
            $responden[$cek] = $data->id_responden;
            for ($a = $last; $a < 'ZZ'; $a++) {
                $first = $a;
                if($no == $jumPertanyaan){
                    break;
                }
                $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $numrow-3); // menjadi masalah karena statik
                $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_responden);
                $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama); 
                
                if($kolom[$data->id_pertanyaan] == $a){
                    $excel->setActiveSheetIndex(0)->setCellValue($a.$numrow, $data->tanggapan."-".$data->nomor_pertanyaan);
                    $no++;
                    break;
                }else{
                    $excel->setActiveSheetIndex(0)->setCellValue($a.$numrow, '--');
                    $no++;
                }
            }
            if($cek != 0 ){
                if($responden[$cek] != $responden[$cek-1]){
                    $no = 0;
                    $first = 'C';
                    $col = 1;
                    $numrow++;
                    $kolom[] = null;
                }
            }
            $last = $first;
            $last++;
            $cek++;
        }
       
   // $no++;
       // Tambah 1 setiap kali looping
      //$numrow++; // Tambah 1 setiap kali looping
    
    // Set width kolom
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Dokumen Alumni");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Dokumen Kuisioner.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
}

    function exportRepsort($id_kuisioner){ 
        $responden = 0;
        $no = 1; // Untuk 
        $nomor_pertanyaan = 0; // Untuk penomoran tabel, di awal set dengan 1
        $question = $this->m_export->getNamaPertanyaan($id_kuisioner);

        $dataKuisioner = $this->m_export->getDataKuisioner($id_kuisioner);
        foreach($dataKuisioner as $data){ // Lakukan looping pada variabel siswa
            foreach($question as $asd){ 
            // $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no); // menjadi masalah karena statik
                //$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_responden);
                // $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
                // $excel->setActiveSheetIndex(0)->setCellValue($kolom[$nomor_pertanyaan].$numrow, $data->nama_pertanyaan);
            if($data->id_pertanyaan == $asd->id_pertanyaan){
                echo $no.")".$asd->nama_pertanyaan." ------------ ".$data->tanggapan;
                echo "<br>";
                break;
            }else{
                echo $no.")".$asd->nama_pertanyaan."000000000000000000000000000000000000000000000000000000000000null";
                echo "<br>";
            }
            echo "<br>";


            $nomor_pertanyaan++; // Tambah 1 setiap kali looping
            $responden++;
            $no++;
            // Tambah 1 setiap kali looping
            //$numrow++; // Tambah 1 setiap kali looping
            }


            // foreach($dataKuisioner as $data){ // Lakukan looping pada variabel siswa
            //     $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no); // menjadi masalah karena statik
            //     $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_responden);
            //     $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, '$data->nama');
            //     $print = '---';
            //     for ($a = $last; $a < 'ZZ'; $a++) {
            //         $first = $a;
            //         if($responden == $jumPertanyaan){
            //             break;
            //         }
            //         $print = $data->tanggapan.", a: ".$a.", responden : ".$responden.", kolom :".$kolom[$responden];
            //         //$excel->setActiveSheetIndex(0)->setCellValue($a.$numrow, $data_nama_pertanyaan[$responden]);
            //         if($kolom[$responden] == $a){
            //             //$excel->setActiveSheetIndex(0)->setCellValue($a.$numrow, $kolom);
            //             $excel->setActiveSheetIndex(0)->setCellValue($a.$numrow, $print);
            //             $responden++;
            //             break;
            //         }else{
            //             $excel->setActiveSheetIndex(0)->setCellValue($a.$numrow, '--');
            //             $responden++;
            //             $last = $first;
            //             $last++;
            //         }
            //     }
            //     $last = $first;
            //     $last++;
            // }
        }
    }
}

