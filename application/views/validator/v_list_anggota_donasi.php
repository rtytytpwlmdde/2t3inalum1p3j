 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">
    <!-- alert -->
    <?php
        $notif = $this->session->flashdata('notif');
        if($notif != NULL){
            echo '
            <div class="alert alert-accent alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-close text-white"></i></span>
            </button>
            <i class="fa fa-info mx-2"></i>
            <strong>'.$notif.'</strong> 
            </div>
            ';
        }
    ?>
   
    <!-- Page Header -->
    <div class="page-header row no-gutters py-2">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Open Donasi</span>
        </div>
        <div class="offset-sm-4 col-4 d-flex col-12 col-sm-4 d-flex text-sm-center align-items-center">
            <div style="max-width: 130px; " id="transaction-history-date-range" class="input-group input-group-sm ml-auto ">
               
            </div>
        </div>
    </div>

    <div class="row">
              <div class="col-lg-8">
                    <?php foreach($donasi as $u): ?>
                    <div class="main-content-container ">
                        <div class="table-responsive  p-4">
                        <table class="table mb-0 table-sm" id="" style="width:100%;">
                            <tbody>
                                <tr>
                                    <td scope="col" class="border-0">Nama Kegiatan </td>
                                    <td scope="col" class="border-0">: <info class="text-primary"><?php echo $u->nama_kegiatan ?></info></td>
                                </tr>
                                <tr>
                                    <td scope="col" class="border-0">Perihal </td>
                                    <td scope="col" class="border-0">: <info class="text-primary"><?php echo $u->Keterangan ?></info></td>
                                </tr>
                                <tr>
                                    <td scope="col" class="border-0">Total Anggaran </td>
                                    <td scope="col" class="border-0">: <info class="text-primary"> Rp.<?php echo $u->total_anggaran ?></info></td>
                                </tr>
                           
                            
                            </tbody>
                        </table>
                        </div>
            
                    </div>
                </div>
                <?php endforeach ?>
              <div class="card card-small mb-4">
              <div class="card card-small">
                  <div class="card-header border-bottom">
                  <div class="row  py-2">
                      <div class="col-sm-3 text-center text-sm-left mb-0">
                        <h6 class="m-0">Data Alumni</h6>
                      </div>
                      <div class="col  text-center text-sm-right mb-0">
                        <div id="export"></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row border-bottom py-2 bg-light">
                      <div class="col-sm-3 text-center text-sm-left mb-0">
                        <div id="" class=" input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                          <input id="search_inp" class="input-sm form-control"  placeholder="Search"  type="text">
                        </div>
                      </div>
                      <div class="col  text-center text-sm-right mb-0">
                        <select id="data_length" class="custom-select custom-select-sm" style="max-width: 80px;">
                          <option selected>10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                          <option value="200">200</option>
                          <option value="-1">All</option>
                        </select>
                      </div>
                    </div><br>
                   
                    <div class="main-content-container ">
                        <div class="table-responsive table-striped">
                         <table class="table mb-0 " id="pegawai" style="width:100%;">
                            <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                            <tr>
                                <th scope="col" class="border-0">No</th>
                                <th scope="col" class="border-0">Nama</th>
                                <th scope="col" class="border-0">Jumlah Nominal</th>
								<th scope="col" class="border-0">Status</th>
								<th scope="col" class="border-0">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 1;
                                foreach ($anggota_donasi as $u){ 
                                    
                                ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $u->nim ?></td>
                                <td><?php echo $u->jumlah_bantuan ?></td>
                                <td><?php echo $u->status ?></td>
								<td class="sorting_1" style="">
                                <a href="<?php echo site_url('validator/validasi/validasi_donasi/'.$u->id_detail_open.'/Setuju'); ?>"type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
					<i class="fa fa-check"></i>
					</a>
					<a href="<?php echo site_url('validator/validasivalidasi_donasi/'.$u->id_detail_open.'/Tolak'); ?>" type="button"  rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon" onclick="return deletechecked();" title="Hapus">
					 <i class="fa fa-times"></i>
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
              </div>
              </div>

</div>
    

<script type="text/javascript">


var table = $('#pegawai').DataTable({
        lengthMenu: [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "All"]
        ],
        responsive: true,
        paging: true,
        stateSave: true,
        processing: true,        
        scrollX:        true,
        scrollCollapse: true,
        dom: 'fBrtip<"clear">l',
    "columnDefs": [{
      className: "dt-right",
    }],
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                extension: ".pdf",
                filename: "Surat Tugas",
                title: "",
                orientation: 'landscape',
                customize: function (doc) {

                    doc.styles.tableHeader = {
                        color: 'black',
                        background: 'grey',
                        alignment: 'center'
                    }

                    doc.styles = {
                        subheader: {
                            fontSize: 10,
                            bold: true,
                            color: 'black'
                        },
                        tableHeader: {
                            bold: true,
                            fontSize: 10.5,
                            color: 'black'
                        },
                        lastLine: {
                            bold: true,
                            fontSize: 11,
                            color: 'blue'
                        },
                        defaultStyle: {
                            fontSize: 10,
                            color: 'black'
                        }
                    }

                    var objLayout = {};
                    objLayout['hLineWidth'] = function(i) { return .8; };
                    objLayout['vLineWidth'] = function(i) { return .5; };
                    objLayout['hLineColor'] = function(i) { return '#aaa'; };
                    objLayout['vLineColor'] = function(i) { return '#aaa'; };
                    objLayout['paddingLeft'] = function(i) { return 8; };
                    objLayout['paddingRight'] = function(i) { return 8; };
                    doc.content[0].layout = objLayout;

                    // margin: [left, top, right, bottom]

                    doc.content.splice(0, 0, {
                        text: [
                            {text: 'Texto 0', italics: true, fontSize: 12}
                        ],
                        margin: [0, 0, 0, 12],
                        alignment: 'center'
                    });

                    doc.content.splice(0, 0, {

                        table: {
                            widths: [300, '*', '*'],
                            body: [
                                [
                                    {text: 'Texto 1', bold: true, fontSize: 10}
                                    , {text: 'Texto 2', bold: true, fontSize: 10}
                                    , {text: 'Texto 3', bold: true, fontSize: 10}]
                            ]
                        },

                        margin: [0, 0, 0, 12],
                        alignment: 'center'
                    });


                    doc.content.splice(0, 0, {

                        table: {
                            widths: [300, '*'],
                            body: [
                                [
                                    {
                                        text: [
                                            {text: 'Texto 4', fontSize: 10},
                                            {
                                                text: 'Texto 5',
                                                bold: true,
                                                fontSize: 10
                                            }

                                        ]
                                    }
                                    , {
                                    text: [
                                        {
                                            text: 'Texto 6',
                                            bold: true, fontSize: 18
                                        },
                                        {
                                            text: 'Texto 7',
                                            fontSize: 10
                                        }

                                    ]
                                }]
                            ]
                        },

                        margin: [0, 0, 0, 22],
                        alignment: 'center'
                    });


                },
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                fieldSeparator: ';',
                filename: "Surat Tugas",
                fieldBoundary: '"',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-code-o"></i>',
                titleAttr: 'CSV',
                fieldSeparator: ';',
                fieldBoundary: '"',
                exportOptions: {
                    columns: ':visible'
                }
            },

            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                exportOptions: {
                    columns: ':visible',
                }
            },

            {
                extend: 'colvis',
                postfixButtons: ['colvisRestore'],
                collectionLayout: 'fixed four-column'
            }

        ]

    });
    
    
    $('.dt-button').addClass('btn btn-sm btn-outline-info mr-1 rounded  text-center p-1');
    $('.dataTables_paginate').addClass('btn rounded text-white text-center p-1');
    $(".dt-button").prependTo("#export"); 
    $('#search_inp').keyup(function(){
    table.search($(this).val()).draw() ;
    })
    $('#data_length').on('change', function(){
    table.page.len( $(this).val() ).draw();
    
});



function deletechecked()
    {
        if(confirm("Serius ingin menghapus data ini ?"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }

   function myFunction() {
    var pdf = document.getElementById("url_pdf").textContent;
    window.open(""+pdf);
}

function myFunctions() {
    alert("Alamat URL Surat Tugas Online tidak tersedia!");
}
</script>
