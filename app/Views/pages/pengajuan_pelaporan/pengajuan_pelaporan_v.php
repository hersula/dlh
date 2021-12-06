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
                                 <li class="breadcrumb-item"><a href="<?= base_url('')?>"><i class="fas fa-home"></i></a></li>
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
                         <h3 class="mb-0">Pengajuan Pelaporan Industri</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk melihat mengajukan pelaporan dari industri yang terdaftar dan tervalidasi.
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
                             <div class="col-lg-2 mt-3 pr-1">
                                 <select class="form-control" data-toggle="select">
                                     <option>Pilih Site</option>
                                     <option>Badges</option>
                                     <option>Buttons</option>
                                     <option>Cards</option>
                                     <option>Forms</option>
                                     <option>Modals</option>
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
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPengajuan">Tambah Pengajuan Pelaporan</button>
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
                                     <th>Nama Industri</th>
                                     <th>Nama Industri WWTP</th>
                                     <th>Status</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <!-- <tr>
                                     <td>1</td>
                                     <td>Q1</td>
                                     <td>2011/03/31 23:59</td>
                                     <td>PT INDUSTRI A</td>
                                     <td>PT INDUSTRI A (WWTP-01)</td>
                                     <td><label class="badge badge-success">Sudah melaporkan</label></td>
                                     <td><a href="<?= base_url()?>/public/documents/pdf/tte121059.pdf" target="_blank"><button class="btn btn-primary">Cetak Lembar LTE</button></a></td>
                                 </tr>
                                 <tr>
                                     <td>2</td>
                                     <td>Q1</td>
                                     <td>2011/03/31 23:59</td>
                                     <td>PT INDUSTRI A</td>
                                     <td>PT INDUSTRI A (WWTP-02)</td>
                                     <td><label class="badge badge-warning">Menunggu Validasi</label></td>
                                     <td><button class="btn btn-primary" disabled>Cetak Lembar LTE</button></td>
                                 </tr> -->
                             </tbody>
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
                             <th class="w-30">Tanggal Hasil</th>
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
 <!-- MODAL TAMBAH Pengajuan Laporan -->
 <div class="modal fade" id="modalTambahPengajuan" tabindex="-1" role="dialog" aria-labelledby="modalTambahPengajuanLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalTambahPengajuanLabel">Tambah Pengajuan Laporan</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="table-responsive">
                     <div class="row">
                         <div class="col-lg-6">
                             <select name="" id="" class="form-control">
                                 <option value="">Pilih Industri</option>

                             </select>
                         </div>
                         <div class="col-lg-6">
                             <select name="" id="" class="form-control">
                                 <option value="">Pilih Site WWTP</option>
                             </select>
                         </div>
                     </div>

                     <form>
                         <table class="table">
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Nama Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" required readonly></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Quartal </label></td>
                                 <td>
                                 <select  class="form-control" id="quartal" name="quartal" required >
                                    <option value="">Pilih QUARTAL</option>
                                    <option value="Quartal 1">Quartal 1</option>
                                    <option value="Quartal 2">Quartal 2</option>
                                    <option value="Quartal 3">Quartal 3</option>
                                </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Data yang dilaporkan </label></td>
                                 <td>
                                     <div class="row">
                                    <div class="custom-control custom-checkbox col-lg-auto">
                                        <input type="checkbox" class="custom-control-input" id="data_harian" name="data_harian">
                                        <label class="custom-control-label" for="data_harian">Data Harian</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-lg-auto">
                                        <input type="checkbox" class="custom-control-input" id="data_analisa" name="data_analisa">
                                        <label class="custom-control-label" for="data_analisa">Data Analisa</label>
                                    </div>
                                    </div>
                                 </td>
                             </tr>
                             
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Surat Hasil Pelaporan Laboratorium </label></td>
                                 <td>
                                    <div class="dropzone dropzone-single" >
                                        <div class="fallback">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="dropzoneBasicUpload" required>
                                                <label class="custom-file-label" for="dropzoneBasicUpload">Choose file</label>
                                            </div>
                                        </div>

                                    </div>
                                 </td>
                             </tr>
                         </table>
                         <table class="table">
                             <tr>
                                 <td colspan="3"><button class="btn btn-primary float-right" type="submit">Submit</button></td>
                             </tr>
                         </table>
                        </form>
                         <div id="content-laporan"></div>
                        
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

     function myDataTable(){
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
                     url: "<?= base_url('Pengajuan_pelaporan/getDataTable') ?>",
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
                         data: "company_name",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "company_address",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "company_phone",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "email",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "name",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "position",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "crt_at",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         "render": function(data, type, row, meta) {
                             return html = `<div class='badge badge-${row.badge}'>${row.status}</div>`
                         }
                     },
                     {
                         "render": function(data, type, row, meta) {
                             html = `<button class="btn btn-sm btn-info btn-view"  data-id="${row.registration_id }" ><i class="far fa-eye"></i> Show </button> `

                             html += `<button class="btn btn-sm btn-warning btn-edit"  data-id="${row.registration_id }"><i class="far fa-edit"></i> Edit </button> `

                             html += `<button href="" class="btn btn-sm btn-danger btn-delete"  id="btn-delete" data-id="${row.registration_id}"<i class="far fa-trash-alt"></i> Deactivated</button>`

                             if (row.status == "Open") {
                                 html += `<button href="" class="btn btn-sm btn-success btn-konfirmasi"  id="btn-verive" data-id="${row.registration_id}"<i class="far fa-trash-alt"></i> Verified</button>`

                             }

                             return html
                         }
                     },
                 ]
             })

         table.on('order.dt search.dt', function() {
             table.column(0, {
                 search: 'applied',
                 order: 'applied'
             }).nodes().each(function(cell, i) {
                 cell.innerHTML = i + 1;
             });
         }).draw();

         $(".dataTables_filter input")
             .off()
             .on('keyup change', function(e) {
                 if (e.keyCode == 13 || this.value == "") {
                     table.search(this.value)
                         .draw();
                 }
             });

     }
 </script>