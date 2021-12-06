 <!-- Main content -->
 <div class="main-content" id="panel">
     <!-- Topnav -->
     <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
         <div class="container-fluid">
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <!-- Navbar links -->
                 <ul class="navbar-nav align-items-center  ml-md-auto ">
                     <li class="nav-item d-xl-none">
                         <!-- Sidenav toggler -->
                         <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                             <div class="sidenav-toggler-inner">
                                 <i class="sidenav-toggler-line"></i>
                                 <i class="sidenav-toggler-line"></i>
                                 <i class="sidenav-toggler-line"></i>
                             </div>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
     <!-- Header -->
     <!-- Header -->
     <div class="header bg-primary pb-6">
         <div class="container-fluid">
             <div class="header-body">
                 <div class="row align-items-center py-4">
                     <div class="col-lg-6 col-7">
                         <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                             <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                 <li class="breadcrumb-item"><a href="<?= base_url('') ?>"><i class="fas fa-home"></i></a></li>
                                 <li class="breadcrumb-item"><a href="<?= base_url("$menu") ?>"><?= strtoupper($menu); ?></a></li>
                                 <li class="breadcrumb-item active" aria-current="page"><?= strtoupper($submenu); ?></li>
                             </ol>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Page content -->
     <div class="container-fluid mt--6">
         <div class="row mt-3">
             <div class="col-lg-12">
                 <div class="card h-100">
                     <!-- Card header -->
                     <div class="card-header">
                         <h3 class="mb-0">Data Analisa Outfall</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk melihat analisa outfall dari industri yang terdaftar dan tervalidasi.
                         </p>
                         <div class="d-none d-lg-flex d-xl-flex flex-row bd-highlight mb-3 table-responsive">
                             <div class="p-2 bd-highlight  w-30">
                                 <select class="form-control" data-toggle="select">
                                     <option>Pilih Kecamatan</option>
                                     <option>Badges</option>
                                     <option>Buttons</option>
                                     <option>Cards</option>
                                     <option>Forms</option>
                                     <option>Modals</option>
                                 </select>
                             </div>
                             <div class="p-2 bd-highlight  w-30">
                                 <select class="form-control" data-toggle="select">
                                     <option>Pilih Desa</option>
                                     <option>Badges</option>
                                     <option>Buttons</option>
                                     <option>Cards</option>
                                     <option>Forms</option>
                                     <option>Modals</option>
                                 </select>
                             </div>
                             <div class="p-2 bd-highlight  w-30">
                                 <select class="form-control" data-toggle="select">
                                     <option>Pilih Industri</option>
                                     <option>Badges</option>
                                     <option>Buttons</option>
                                     <option>Cards</option>
                                     <option>Forms</option>
                                     <option>Modals</option>
                                 </select>
                             </div>
                             <div class="p-2 bd-highlight  w-30">
                                 <select class="form-control" name="export_site" data-toggle="select">
                                     <?php
                                        foreach ($site as $row) {
                                        ?>
                                         <option value="<?= $row["siteWWTPID"]; ?>"><?= $row["name"]; ?></option>
                                     <?php
                                        }
                                        ?>
                                 </select>
                             </div>
                             <div class="p-2 bd-highlight w-32">
                                 <div class="form-control reportrange_q">
                                     <span></span>
                                     <input type="hidden" name="start_date" id="start_date">
                                     <input type="hidden" name="end_date" id="end_date">
                                     <i class="fa fa-caret-down float-right"></i>
                                 </div>
                             </div>
                             <div class="p-2 bd-highlight">
                                 <button class="btn btn-primary">Cari</button>
                             </div>
                         </div>
                         <!-- MODE HP -->
                         <div class="row  d-lg-none">
                             <div class="col-lg-2 mt-3 pr-1">
                                 <select class="form-control" data-toggle="select">
                                     <option>Pilih Kecamatan</option>
                                     <option>Badges</option>
                                     <option>Buttons</option>
                                     <option>Cards</option>
                                     <option>Forms</option>
                                     <option>Modals</option>
                                 </select>
                             </div>
                             <div class="col-lg-2 mt-3 pr-1">
                                 <select class="form-control" data-toggle="select">
                                     <option>Pilih Desa</option>
                                     <option>Badges</option>
                                     <option>Buttons</option>
                                     <option>Cards</option>
                                     <option>Forms</option>
                                     <option>Modals</option>
                                 </select>
                             </div>
                             <div class="col-lg-2 mt-3 pr-1">
                                 <select class="form-control" data-toggle="select">
                                     <option>Pilih Industri</option>
                                     <option>Badges</option>
                                     <option>Buttons</option>
                                     <option>Cards</option>
                                     <option>Forms</option>
                                     <option>Modals</option>
                                 </select>
                             </div>
                             <div class="p-2 bd-highlight  w-30">
                                 <select class="form-control" name="export_site" data-toggle="select">
                                     <?php
                                        foreach ($site as $row) {
                                        ?>
                                         <option value="<?= $row["siteWWTPID"]; ?>"><?= $row["name"]; ?></option>
                                     <?php
                                        }
                                        ?>
                                 </select>
                             </div>
                             <div class="col-lg-2 mt-3 pr-1 wrapper-daterange">
                                 <div class="form-control reportrange_q">
                                     <span></span>
                                     <input type="hidden" name="start_date" id="start_date">
                                     <input type="hidden" name="end_date" id="end_date">
                                     <i class="fa fa-caret-down float-right"></i>
                                 </div>
                             </div>
                             <div class="col-lg-3 mt-3 pr-1">
                                 <button class="btn btn-primary">Cari</button>
                             </div>
                         </div>
                     </div>
                     <div class="d-flex flex-row-reverse bd-highlight">
                         <div class="p-2 pr-4 bd-highlight">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahOutfall">Tambah Laporan Outfall</button>
                            <button class="btn btn-warning" id="btn-download">Download</button>
                         </div>
                     </div>
                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Quartal Periode </th>
                                     <th>Tanggal Pelaporan</th>
                                     <th>Tanggal Pengujian</th>
                                     <th>Nama Industri</th>
                                     <th>Industri Site WWTP</th>
                                     <th>Hasil Analisa</th>
                                 </tr>
                             </thead>
                             <tbody>
                                
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="modalOutfall" tabindex="-1" role="dialog" aria-labelledby="modalOutfallLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalOutfallLabel">Hasil Analisa Pelaporan Outfall</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <table class="table">
                         <tr>
                             <th class="w-30">Nama Penanggung Jawab</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Nama Industri</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Alamat Industri</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Nama Laboratorium</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Nomer Akreditasi Lab</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Nomer Sampling</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Jenis Sampling</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Tanggal Sampling</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Tanggal Pengambilan</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Tanggal Diterima</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Titik Koordinat</th>
                             <th style="width:10px">:</th>
                             <td>Xxxxx</td>
                         </tr>
                         <tr>
                             <th class="w-30">Hasil Analisa</th>
                             <th style="width:10px">:</th>
                             <td><button class=" btn-primary" style="border-color: darkgreen;">Download File</button></td>
                         </tr>
                         <tr>
                             <th class="w-30">Tanggal Pelaporan</th>
                             <th style="width:10px">:</th>
                             <td>2021-08-20 11:20:00</td>
                         </tr>
                         <tr>
                             <th class="w-30">Quartal</th>
                             <th style="width:10px">:</th>
                             <td>1</td>
                         </tr>
                         <tr>
                             <th class="w-30">Divalidasi Oleh</th>
                             <th style="width:10px">:</th>
                             <td>Admin DLH Kabupaten Bekasi</td>
                         </tr>
                         <tr>
                             <th class="w-30">Tanggal Divalidasi </th>
                             <th style="width:10px">:</th>
                             <td>2021-08-20 11:20:00</td>
                         </tr>
                     </table>
                 </div>
             </div>

         </div>
     </div>
 </div>
 <!-- MODAL TAMBAH LAPORAN Outfall -->
 <div class="modal fade" id="modalTambahOutfall" tabindex="-1" role="dialog" aria-labelledby="modalTambahOutfallLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalTambahOutfallLabel">Tambah Laporan Outfall</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="table-responsive">
                     <form action="<?= base_url('add_data_outfall')?>" method="POST">
                     <div class="row">
                         <div class="col-lg-12">
                         <select name="site" id="pilih-site" class="form-control">
                                     <option data-siteWWTPID="" data-company_name="Nama Perusahaan" value="">Pilih Site WWTP</option>
                                     <?php
                                        foreach ($site as $row) {
                                        ?>
                                         <option data-siteWWTPID="<?= $row["siteWWTPID"]; ?>" data-company_name="<?= $row["company_name"]; ?>" value="<?= $row["siteWWTPID"]; ?>"><?= $row["name"]; ?></option>
                                     <?php
                                        }
                                        ?>
                                 </select>
                         </div>
                     </div>
                         <table class="table">
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Nama Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" required readonly></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Tambah Form Pelaporan </label></td>
                                 <td><button class="btn btn-warning" type="button" id="add-form-pelaporan" data-toggle="notify2" data-placement="top" data-align="right" data-type="success" data-icon="ni ni-bell-55" data-message="Tambah form berhasil ditambahkan"><i class="ni ni-fat-add"></i></button></td>

                             </tr>

                         </table>
                         <div id="content_form"></div>
                         <table class="table">
                             <tr>
                                 <td colspan="3"><button class="btn btn-primary float-right" type="submit">Submit</button></td>
                             </tr>
                         </table>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
     // DATATABLE
    myDataTables()

    function myDataTables() {
    let html;
    let table =
        $("#datatable").DataTable({
            language: {
                paginate: {
                    previous: "<i class='fas fa-angle-left'>",
                    next: "<i class='fas fa-angle-right'>"
                }
            },
            "columnDefs": [{
                    "orderable": false,
                    "targets": [0, 4]
                },
                {
                    "orderable": true,
                    "targets": [1, 2, 3]
                }
            ],
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 25, 50, 100],
                [5, 10, 25, 50, 100]
            ],
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "processing": true,
            "bServerSide": true,
            "order": [
                [1, "asc"]
            ],
            "ajax": {
                url: "<?= base_url('get_datatable_data_outfall') ?>",
                type: "POST",
                data: function(d) {
                    //  d._token = "{{csrf_token()}}"
                },

            },
            columns: [{
                    data: null,
                    "sortable": false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: "tipe_pelaporan",
                    render: $.fn.dataTable.render.text()
                },
                {
                    data: "tgl_pelaporan",
                    render: $.fn.dataTable.render.text()
                },
                {
                    render: function(data, type, row, meta) {
                        
                        return row.tgl_start_sampling+" s/d "+ row.tgl_end_sampling;
                    }
                },
                {
                    data: "nama_industri",
                    render: $.fn.dataTable.render.text()
                },
                {
                    data: "nama_wwtp",
                    render: $.fn.dataTable.render.text()
                },
                {
                    render: function(data, type, row, meta) {
                        html = `<span class="badge badge-success mr-4 status_bml" data-toggle="modal" data-target="#modalInlet">
                                             <span class="text-primary"> Detail BML </span>
                                         </span>`
                        return html;
                    }
                },
            ]
        })

        $(".dataTables_filter input")
        .off()
        .on('keyup change', function(e) {
            if (e.keyCode == 13 || this.value == "") {
                table.search(this.value)
                    .draw();
            }
        });

    }
     // DATERANGE PICKER CONTROL
     $(function() {


         var start = moment().subtract(29, 'days');
         var end = moment();

         function cb(start, end) {
             $('.reportrange_q span').html(start.format('YYYY-MM-DD h:mm') + ' - ' + end.format('YYYY-MM-DD h:mm'));
             $(".reportrange_q #start_date").val(start.format('YYYY-MM-DD h:mm'))
             $(".reportrange_q #end_date").val(end.format('YYYY-MM-DD h:mm'))
         }

         $('.reportrange_q').daterangepicker({
             startDate: start,
             endDate: end,
             timePicker: true,
             ranges: {
                 'Q1': [moment('2021-01-01T00:00:00.000').startOf('month'), moment('2021-03-01T00:00:00.000').endOf('month')],
                 'Q2': [moment('2021-04-01T00:00:00.000').startOf('month'), moment('2021-06-01T00:00:00.000').endOf('month')],
                 'Q3': [moment('2021-07-01T00:00:00.000').startOf('month'), moment('2021-09-01T00:00:00.000').endOf('month')],
                 'Q4': [moment('2021-10-01T00:00:00.000').startOf('month'), moment('2021-12-01T00:00:00.000').endOf('month')],
             }
         }, cb);

         cb(start, end);

     });
     // END DATE RANGEPICKER
     // SWEETALERT UNTUK DOWNLOAD FILE
     $(function() {
         $("#btn-download").on('click', function() {
             const swalWithBootstrapButtons = Swal.mixin({
                 customClass: {
                     confirmButton: 'btn btn-success',
                     cancelButton: 'btn btn-danger'
                 },
                 buttonsStyling: false
             })

             swalWithBootstrapButtons.fire({
                 title: 'Apakah anda ingin export data ini?',
                 text: "Jika ya, mohon menunggu sebentar...",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Excel',
                 cancelButtonText: 'PDF',
                 reverseButtons: true
             }).then((result) => {
                 if (result.isConfirmed) {
                     //Download Excel
                     let site = $("select[name=export_site]").find(":selected").val();
                     window.location.href = "<?= base_url("export_data_outfall");?>/"+site;
                     swalWithBootstrapButtons.fire(
                         'Excel',
                         'Data berhasil di download...',
                         'success'
                     )
                 } else if (
                     /* Read more about handling dismissals below */
                     result.dismiss === Swal.DismissReason.cancel
                 ) {
                     swalWithBootstrapButtons.fire(
                         'PDF',
                         'Data berhasil di download...',
                         'success'
                     )
                 }
             })
         })
     })

    $("select[name=site]").change(function() {
        let siteWWTPID = $(this).find(":selected").data("sitewwtpid");
        let company_name = $(this).find(":selected").data("company_name");
        $("input[name=nama_perusahaan]").val(company_name);

        get_parameter_harian(siteWWTPID)
    });

     $(function() {
         function initDatepicker() {
             $('.datetimepicker1').datetimepicker({
                 format: 'YYYY-MM-DD HH:mm',
                 icons: {
                     time: "fa fa-clock",
                     date: "fa fa-calendar-day",
                     up: "fa fa-chevron-up",
                     down: "fa fa-chevron-down",
                     previous: 'fa fa-chevron-left',
                     next: 'fa fa-chevron-right',
                     today: 'fa fa-screenshot',
                     clear: 'fa fa-trash',
                     close: 'fa fa-remove'
                 }
             });
             $('.datetimepicker2').datetimepicker({
                 format: 'YYYY-MM-DD',
                 icons: {
                     time: "fa fa-clock",
                     date: "fa fa-calendar-day",
                     up: "fa fa-chevron-up",
                     down: "fa fa-chevron-down",
                     previous: 'fa fa-chevron-left',
                     next: 'fa fa-chevron-right',
                     today: 'fa fa-screenshot',
                     clear: 'fa fa-trash',
                     close: 'fa fa-remove'
                 }
             });
         }
         let num = 0;

         $("#add-form-pelaporan").on('click', function() {
             let content_form = $("#content_form");
             let html;
             html = `<table class="table">`;
             html += `<h3>FORM Pendafataran Laporan Outfall</h3>`;
             html += `
            
            <tr>
                <td style="width:30px"><label for="type_report" class="text-left">Quartal </label></td>
                <td>
                    <select  class="form-control" id="type_report" name="type_report[]" required >
                        <option>Pilih Tipe Pelaporan</option>
                        <?php 
                            foreach($type_report as $type):
                        ?>
                        <option value="<?= $type['typeReportID']?>"><?= $type['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
           
            <tr>
                    <td style="width:30px"><label for="nama_lab" class="text-left">Nama Laboratorium</label></td>
                    <td><input type="text" class="form-control" placeholder="Nama Laboratorium" id="nama_lab" name="nama_lab[]" required ></td>
            </tr>
            <tr>
                    <td style="width:30px"><label for="nomor_akreditasi_lab" class="text-left">Nomer Akreditasi Lab</label></td>
                    <td><input type="text" class="form-control" placeholder="Nomer Akreditasi Lab" id="nomor_akreditasi_lab" name="nomor_akreditasi_lab[]" required ></td>
            </tr>

            <tr>
                    <td style="width:30px"><label for="nomor_sampling" class="text-left">Nomer Sampling	</label></td>
                    <td><input type="text" class="form-control" placeholder="Nomer Sampling	" id="nomor_sampling" name="nomor_sampling[]" required ></td>
            </tr>

            <tr>
                    <td style="width:30px"><label for="jenis_sampling" class="text-left">Jenis Sampling	</label></td>
                    <td><input type="text" class="form-control" placeholder="Jenis Sampling	" id="jenis_sampling" name="jenis_sampling[]" required ></td>
            </tr>

            <tr>
                <td style="width:30px"><label for="tanggal_sampling" class="text-left">Tanggal Sampling </label></td>
                    <td>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <div class='input-group date datetimepicker2' >
                                    <input type='text' class="form-control" placeholder="Dari" name="tanggal_start_sampling[]" id="tanggal_sampling" />
                                    <span class="input-group-addon input-group-append">
                                        <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <div class='input-group date datetimepicker2' >
                                    <input type='text' class="form-control" placeholder="Sampai" name="tanggal_end_sampling[]" id="tanggal_sampling" />
                                    <span class="input-group-addon input-group-append">
                                        <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>
            </tr>
            <tr>
                <td style="width:30px"><label for="tanggal_pengambilan" class="text-left">Tanggal Pengambilan </label></td>
                    <td>
                        <div class="form-group">
                            <div class='input-group date datetimepicker2' >
                                <input type='text' class="form-control" placeholder="Tanggal Pengambilan" name="tanggal_pengambilan[]" id="tanggal_pengambilan" />
                                <span class="input-group-addon input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                </span>
                            </div>
                        </div>
                    </td>
            </tr>
            <tr>
                <td style="width:30px"><label for="tanggal_diterima" class="text-left">Tanggal Diterima </label></td>
                    <td>
                        <div class="form-group">
                            <div class='input-group date datetimepicker2' >
                                <input type='text' class="form-control" placeholder="Tanggal Diterima" name="tanggal_diterima[]" id="tanggal_diterima" />
                                <span class="input-group-addon input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                </span>
                            </div>
                        </div>
                    </td>
            </tr>

            <tr>
                    <td style="width:30px"><label for="titik_kordinat" class="text-left">Titik Kordinat	</label></td>
                    <td><input type="text" class="form-control" placeholder="Titik Kordinat	" id="titik_kordinat" name="titik_kordinat[]" required ></td>
            </tr>
            
            
            
            `
             html += `</table>`

             content_form.append(html)
             initDatepicker()
         })
     });
 </script>