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
                         <h3 class="mb-0">Data Analisa Downstream</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk melihat analisa Downstream dari industri yang terdaftar dan tervalidasi.
                         </p>
                         <div class="d-none d-lg-flex d-xl-flex flex-row bd-highlight mb-3 table-responsive">
                             <div class="p-2 bd-highlight  w-30">
                                 <select class="form-control" name="districts_id" id="kecamatan">
                                     <option>Pilih Kecamatan</option>
                                     <?php
                                        if ($kecamatan) {
                                            foreach ($kecamatan as $row) {
                                        ?>
                                             <option value="<?= $row["id"]; ?>"><?= $row["name"]; ?></option>
                                     <?php
                                            }
                                        }
                                        ?>
                                 </select>
                             </div>
                             <div class="p-2 bd-highlight  w-30">
                                 <select class="form-control" name="villages_id" id="desa">
                                     <option>Pilih Desa</option>
                                 </select>
                             </div>
                             <div class="p-2 bd-highlight  w-30">
                                 <select class="form-control" name="company_id" id="company">
                                     <option value="">Pilih Industri</option>
                                     <?php
                                        foreach ($company as $row) {
                                        ?>
                                         <option value="<?= $row["company_id"]; ?>"><?= $row["company_name"]; ?></option>
                                     <?php
                                        }
                                        ?>
                                 </select>
                             </div>
                             <div class="p-2 bd-highlight  w-30">
                                 <select class="form-control" name="export_site" id="site">
                                     <option value="">Pilih Site</option>
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
                                 <div class="form-control reportrange">
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
                             <div class="col-lg-2 mt-3 pr-1 wrapper-daterange">
                                 <div class="form-control reportrange">
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
                             <button id="tambah-laporan" class="btn btn-primary">Tambah Laporan Downstream</button>
                             <button class="btn btn-warning" id="btn-download">Download</button>
                         </div>
                     </div>
                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable">
                             <thead class="thead-light thead-datatable">
                                 <tr>
                                     <th>No</th>
                                     <th>Quartal Periode </th>
                                     <th>Tanggal Pelaporan</th>
                                     <th>Tanggal Pengujian</th>
                                     <th>Nama Industri</th>
                                     <th>Industri Site WWTP</th>
                                 </tr>
                             </thead>
                             <tbody></tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="modalDownstream" tabindex="-1" role="dialog" aria-labelledby="modalDownstreamLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalDownstreamLabel">Hasil Analisa Pelaporan Downstream</h5>
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
 <!-- MODAL TAMBAH LAPORAN Downstream -->
 <div class="modal fade" id="modalTambahDownstream" tabindex="-1" role="dialog" aria-labelledby="modalTambahDownstreamLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalTambahDownstreamLabel">Tambah Laporan downstream</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="table-responsive">
                     <form id="form-laporan" method="POST" action="">
                         <div>
                             <table class="table">
                                 <tr>
                                     <td style="width:30px"><label class="text-left">Titik Penaatan</label></td>
                                     <td>
                                         <input type="hidden" name="site" id="pilih-site" value="" readonly />
                                         <input type="text" name="site_name" value="" class="form-control" readonly />
                                     </td>
                                 </tr>
                             </table>
                             <div id="content_form"></div>
                             <table class="table">
                                 <tr>
                                     <td colspan="3"><button id="btn-action" class="btn btn-primary float-right" type="submit">Submit</button></td>
                                 </tr>
                             </table>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
     $("#kecamatan").on('change', function() {
         let kecamatanID = $(this).val();
         let html;
         if (kecamatanID == "") {
             html = `<option value="">Pilih Desa</option>`;
         } else {
             html = `<option value="">Pilih Desa</option>`;
             resetOption($("#desa"))
             $.get(`<?= base_url('wilayah/desa_findById') ?>/${kecamatanID}`, function(data) {
                 data = JSON.parse(data);
                 $.each(data, function(key, value) {
                     html += `<option value="${value.id}">${value.name}</option>`
                 });
                 $("#desa").html(html)
             });
         }
     });

     function resetOption(option) {
         option.html(`<option value="">Pilih ${option.attr('id').replace(/^\w/, (c) => c.toUpperCase())}</option>`)
     }

     $("#company").on('change', function() {
         let company_id = $(this).find(":selected").val();
         let html;
         if (company_id == "") {
             html = `<option value="">Pilih Site Penaatan</option>`;
             <?php
                foreach ($site as $row) {
                ?>
                 html += `<option value = "<?= $row["siteWWTPID"]; ?>" > <?= $row["name"]; ?> </option>`;
             <?php
                }
                ?>

             $("#site").html(html);
         } else {
             html = `<option value="">Pilih Site Penaatan</option>`;
             resetOption($("#site"))
             $.get(`<?= base_url('Data_harian/get_site') ?>/${company_id}`, function(data) {
                 data = JSON.parse(data);
                 console.log(data);
                 $.each(data, function(key, value) {
                     html += `<option value="${value.siteWWTPID}">${value.name}</option>`;
                 });

                 $("#site").html(html);
             });
         }
     });

     function myDataTables(site = "", cols = "") {
         let html;
         let columns = [{
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
                     return row.tgl_start_sampling + " s/d " + row.tgl_end_sampling;
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
         ];

         let j = columns.length;
         for (let i = 0; i < cols.length; i++) {
             columns[j] = {
                 data: cols[i],
                 render: $.fn.dataTable.render.text()
             };

             j++;
         }

         columns[j] = {
             "render": function(data, type, row, meta) {
                 html = `<button class="btn btn-sm btn-info btn-view"  
                        data-downstream_id="${row.downstream_id}" 
                        data-nama_lab="${row.nama_lab}" 
                        data-nomor_akreditasi_lab="${row.nomor_akreditasi_lab}" 
                        data-nomor_sampling="${row.nomor_sampling}" 
                        data-jenis_sampling="${row.jenis_sampling}" 
                        data-tgl_start_sampling="${row.tgl_start_sampling}" 
                        data-tgl_end_sampling="${row.tgl_end_sampling}" 
                        data-tgl_pengambilan="${row.tgl_pengambilan}" 
                        data-tgl_diterima="${row.tgl_diterima}" 
                        data-titik_kordinat="${row.titik_kordinat}" 
                        data-id="${row.siteWWTPID }" ><i class="far fa-eye"></i> Show </button> `

                 html += `
                        <button class="btn btn-sm btn-warning btn-edit"  
                        data-downstream_id="${row.downstream_id}" 
                        data-nama_lab="${row.nama_lab}" 
                        data-nomor_akreditasi_lab="${row.nomor_akreditasi_lab}" 
                        data-nomor_sampling="${row.nomor_sampling}" 
                        data-jenis_sampling="${row.jenis_sampling}" 
                        data-tgl_start_sampling="${row.tgl_start_sampling}" 
                        data-tgl_end_sampling="${row.tgl_end_sampling}" 
                        data-tgl_pengambilan="${row.tgl_pengambilan}" 
                        data-tgl_diterima="${row.tgl_diterima}" 
                        data-titik_kordinat="${row.titik_kordinat}" 
                        data-id="${row.siteWWTPID }">
                        <i class="far fa-edit"></i> Edit </button> `

                 return html
             }
         };

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
                     url: "<?= base_url('get_datatable_data_downstream') ?>",
                     type: "POST",
                     data: function(d) {
                         //  d._token = "{{csrf_token()}}"
                         d.site = site
                     },

                 },
                 columns: columns,
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

     function get_columns(site) {
         let columns = false;

         $.ajax({
             url: "<?= base_url("Analisa_downstream/get_columns") ?>",
             type: "POST",
             dataType: "json",
             data: {
                 "siteWWTPID": site,
             },
             success: function(data) {
                 if (data) {
                     let html = "";
                     for (let i = 0; i < data.length; i++) {
                         html += `<th class="target-remove-datatable param">${data[i]}</th>`;
                     }

                     html += `<th class="target-remove-datatable">Aksi</th>`;

                     $(".thead-datatable th.target-remove-datatable").remove();
                     $(".thead-datatable tr").append(html);

                     myDataTables(site, data);
                 }
             },

         });

         return columns;
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
             let siteWWTPID = $("select[name=export_site]").val();

             if (siteWWTPID != '') {
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
                         window.location.href = "<?= base_url("export_data_downstream"); ?>/" + site;
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
             } else {
                 notify("Pilih Titik Penaatan Terlebih dahulu!", 'danger', 'top', 'center');
             }
         });
     })

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

         // get titik penataan
         function get_parameter_downstream(siteWWTPID) {
             let html = "";
             $.ajax({
                 url: "<?= base_url("Analisa_downstream/get_parameter_downstream") ?>",
                 type: "POST",
                 dataType: "json",
                 data: {
                     "siteWWTPID": siteWWTPID,
                 },
                 success: function(data) {
                     $("#content_form").empty();

                     let content_form = $("#content_form");
                     let html;
                     html = create_form_pelaporan();
                     for (let i = 0; i < data.length; i++) {
                         html += creat_parameter(data[i]['parameter'])
                     }

                     html += `</table>`

                     content_form.append(html)
                     initDatepicker()
                 },

             });
         };

         function creat_parameter(parameter, value = "", id = "") {
             let html = `
                        <tr>
                        <td style="width:30px"><label class="text-left">Nilai ${parameter}</label></td>
                        <td>
                        <input type="text" class="form-control" name="parameter_val[]" value="${value}" required >
                        <input type="hidden" name="parameter[]" value="${parameter}" required >
                        <input type="hidden" name="downstream_dt_id[]" value="${id}" required >
                        </td>
                        </tr>
                        `;

             return html;
         }

         function create_form_pelaporan(tgl, quartal = 'Semester', nama_lab = '', nomor_akreditasi_lab = '', nomor_sampling = '', jenis_sampling = '', tgl_start_sampling = '', tgl_end_sampling = '', tgl_pengambilan = '', tgl_diterima = '', titik_kordinat = '') {
             let html = `<table class="table">`;
             html += `
                    <tr>
                        <td style="width:30px"><label for="type_report" class="text-left">Quartal </label></td>
                        <td>${quartal}<input type="hidden" class="form-control" placeholder="Type Report" id="type_report" name="type_report" value="2" required readonly ></td>
                    </tr>
                    <tr>
                            <td style="width:30px"><label for="nama_lab" class="text-left">Nama Laboratorium</label></td>
                            <td><input type="text" class="form-control" placeholder="Nama Laboratorium" id="nama_lab" name="nama_lab" value="${nama_lab}" required ></td>
                    </tr>
                    <tr>
                            <td style="width:30px"><label for="nomor_akreditasi_lab" class="text-left">Nomer Akreditasi Lab</label></td>
                            <td><input type="text" class="form-control" placeholder="Nomer Akreditasi Lab" id="nomor_akreditasi_lab" name="nomor_akreditasi_lab" value="${nomor_akreditasi_lab}" required ></td>
                    </tr>

                    <tr>
                            <td style="width:30px"><label for="nomor_sampling" class="text-left">Nomer Sampling	</label></td>
                            <td><input type="text" class="form-control" placeholder="Nomer Sampling	" id="nomor_sampling" name="nomor_sampling" value="${nomor_sampling}" required ></td>
                    </tr>

                    <tr>
                            <td style="width:30px"><label for="jenis_sampling" class="text-left">Jenis Sampling	</label></td>
                            <td><input type="text" class="form-control" placeholder="Jenis Sampling	" id="jenis_sampling" name="jenis_sampling" value="${jenis_sampling}" required ></td>
                    </tr>
                    <tr>
                        <td style="width:30px"><label for="tgl_sampling" class="text-left">Tgl Sampling </label></td>
                            <td>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <div class='input-group date datetimepicker2' >
                                            <input type='text' class="form-control" placeholder="Dari" name="tgl_start_sampling" value="${tgl_start_sampling}" id="tgl_sampling" />
                                            <span class="input-group-addon input-group-append">
                                                <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <div class='input-group date datetimepicker2' >
                                            <input type='text' class="form-control" placeholder="Sampai" name="tgl_end_sampling" value="${tgl_end_sampling}" id="tgl_sampling" />
                                            <span class="input-group-addon input-group-append">
                                                <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                    </tr>
                    <tr>
                        <td style="width:30px"><label for="tgl_pengambilan" class="text-left">Tgl Pengambilan </label></td>
                            <td>
                                <div class="form-group">
                                    <div class='input-group date datetimepicker2' >
                                        <input type='text' class="form-control" placeholder="Tgl Pengambilan" name="tgl_pengambilan" value="${tgl_pengambilan}" id="tgl_pengambilan" />
                                        <span class="input-group-addon input-group-append">
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                    </tr>
                    <tr>
                        <td style="width:30px"><label for="tgl_diterima" class="text-left">Tgl Diterima </label></td>
                            <td>
                                <div class="form-group">
                                    <div class='input-group date datetimepicker2' >
                                        <input type='text' class="form-control" placeholder="Tgl Diterima" name="tgl_diterima" value="${tgl_diterima}" id="tgl_diterima" />
                                        <span class="input-group-addon input-group-append">
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                    </tr>
                    <tr>
                            <td style="width:30px"><label for="titik_kordinat" class="text-left">Titik Kordinat	</label></td>
                            <td><input type="text" class="form-control" placeholder="Titik Kordinat	" id="titik_kordinat" name="titik_kordinat" value="${titik_kordinat}" required ></td>
                    </tr>
                `;

             return html;
         }

         $("#tambah-laporan").click(function() {
             let siteWWTPID = $("select[name=export_site]").val();

             if (siteWWTPID != '') {
                 $("#form-laporan").attr('action', "<?= base_url("add_data_downstream"); ?>");
                 $("#btn-action").text("Submit").show();
                 $('#content_form input[type=text]').each(function() {
                     $(this).val("")
                 });
                 $("#modalTambahDownstream").modal("show");
             } else {
                 notify("Pilih Titik Penaatan Terlebih dahulu!", 'danger', 'top', 'center');
             }
         });

         $(document).on("click", ".btn-view", function() {
             $("#btn-action").hide();
             $("#content_form").empty();

             let content_form = $("#content_form");
             let selected = $(this).closest("tr");
             let siteWWTPID = $(this).data("id");
             let site_name = $(this).closest("tr").find("td:eq(1)").text();
             let tgl = $(this).closest("tr").find("td:eq(2)").text();
             let quartal = $(this).closest("tr").find("td:eq(1)").text();
             let nama_lab = $(this).data("nama_lab");
             let nomor_akreditasi_lab = $(this).data("nomor_akreditasi_lab");
             let nomor_sampling = $(this).data("nomor_sampling");
             let jenis_sampling = $(this).data("jenis_sampling");
             let tgl_start_sampling = $(this).data("tgl_start_sampling");
             let tgl_end_sampling = $(this).data("tgl_end_sampling");
             let tgl_pengambilan = $(this).data("tgl_pengambilan");
             let tgl_diterima = $(this).data("tgl_diterima");
             let titik_kordinat = $(this).data("titik_kordinat");

             $("select[name=site]").val(siteWWTPID);

             let html;
             html = create_form_pelaporan(tgl, quartal, nama_lab, nomor_akreditasi_lab, nomor_sampling, jenis_sampling, tgl_start_sampling, tgl_end_sampling, tgl_pengambilan, tgl_diterima, titik_kordinat);
             $("#datatable thead tr:eq(0)").find("th.param").each(function() {
                 html += creat_parameter($(this).text(), selected.find("td:eq(" + $(this).index() + ")").text());
             });
             html += `</table>`

             content_form.append(html)
             initDatepicker()

             $("#modalTambahDownstream").modal("show");
         });

         $(document).on("click", ".btn-edit", function() {
             $("#btn-action").text("Update").show();
             $("#form-laporan").attr('action', "<?= base_url("edit_data_downstream"); ?>");
             $("#content_form").empty();

             let content_form = $("#content_form");
             let selected = $(this).closest("tr");
             let siteWWTPID = $(this).data("id");
             let downstream_id = $(this).data("downstream_id");
             let site_name = $(this).closest("tr").find("td:eq(1)").text();
             let tgl = $(this).closest("tr").find("td:eq(2)").text();
             let quartal = $(this).closest("tr").find("td:eq(1)").text();
             let nama_lab = $(this).data("nama_lab");
             let nomor_akreditasi_lab = $(this).data("nomor_akreditasi_lab");
             let nomor_sampling = $(this).data("nomor_sampling");
             let jenis_sampling = $(this).data("jenis_sampling");
             let tgl_start_sampling = $(this).data("tgl_start_sampling");
             let tgl_end_sampling = $(this).data("tgl_end_sampling");
             let tgl_pengambilan = $(this).data("tgl_pengambilan");
             let tgl_diterima = $(this).data("tgl_diterima");
             let titik_kordinat = $(this).data("titik_kordinat");

             $("select[name=site]").val(siteWWTPID);

             let html;
             html = create_form_pelaporan(tgl, quartal, nama_lab, nomor_akreditasi_lab, nomor_sampling, jenis_sampling, tgl_start_sampling, tgl_end_sampling, tgl_pengambilan, tgl_diterima, titik_kordinat, downstream_id);
             $("#datatable thead tr:eq(0)").find("th.param").each(function() {
                 html += creat_parameter($(this).text(), selected.find("td:eq(" + $(this).index() + ")").text());
             });
             html += `</table> <div><input type="hidden" name="downstream_id" value="${downstream_id}"/></div>`;

             content_form.append(html);
             initDatepicker()

             $("#modalTambahDownstream").modal("show");
         });

         // this is the id of the form
         $("#form-laporan").submit(function(e) {

             e.preventDefault(); // avoid to execute the actual submit of the form.

             var form = $(this);
             var url = form.attr('action');
             console.log(url);
             $.ajax({
                 type: "POST",
                 url: url,
                 dataType: "json",
                 data: form.serialize(), // serializes the form's elements.
                 success: function(data) {
                     console.log(data);
                     notify(data.reason, data.status, 'top', 'center');
                     $('#datatable').DataTable().ajax.reload();
                     $("#modalTambahDownstream").modal("hide");
                 }
             });
         });

         $("select[name=site]").change(function() {
             let siteWWTPID = $(this).find(":selected").data("sitewwtpid");
             let company_name = $(this).find(":selected").data("company_name");
             $("input[name=nama_perusahaan]").val(company_name);

             get_parameter_downstream(siteWWTPID)

             parameter = "";
             $("#content_form").empty();
         });

         $("select[name=export_site]").change(function() {
             let site = $(this).find(":selected").val();
             let name = $(this).find(":selected").text();

             $("#datatable").DataTable().destroy();
             $("#datatable tbody").empty();

             if (site == "") {
                 alert("Pilih Site WWTP");
             } else {
                 $("input[name=site]").val(site);
                 $("input[name=site_name]").val(name);
                 get_parameter_downstream(site);
                 get_columns(site);
             }
         });

     });
 </script>