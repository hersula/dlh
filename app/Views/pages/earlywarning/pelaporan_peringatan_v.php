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
                         <h3 class="mb-0">Data Peringatan Industri Pelaporan</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk melihat peringatan batas akhir pelaporan dari industri yang terdaftar dan tervalidasi.
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
                                 <select class="form-control" data-toggle="select">
                                     <option>Pilih Site</option>
                                     <option>Badges</option>
                                     <option>Buttons</option>
                                     <option>Cards</option>
                                     <option>Forms</option>
                                     <option>Modals</option>
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
                             <button class="btn btn-warning" id="btn-download">Download</button>
                         </div>
                     </div>
                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable-data-harian">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Quartal Periode </th>
                                     <th>Batas Tanggal Pelaporan</th>
                                     <th>Nama Industri</th>
                                     <th>Status</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>Q1</td>
                                     <td>2011/03/31 23:59</td>
                                     <td>PT INDUSTRI A</td>
                                     <td><label class="badge badge-success">Sudah melaporkan</label></td>
                                 </tr>
                                 <tr>
                                     <td>2</td>
                                     <td>Q1</td>
                                     <td>2011/03/31 23:59</td>
                                     <td>PT INDUSTRI B</td>
                                     <td><label class="badge badge-danger">Belum melaporkan</label></td>
                                 </tr>
                                 <tr>
                                     <td>3</td>
                                     <td>Q1</td>
                                     <td>2011/03/31 23:59</td>
                                     <td>PT INDUSTRI C</td>
                                     <td><label class="badge badge-success">Sudah melaporkan</label></td>
                                 </tr>
                                 <tr>
                                     <td>4</td>
                                     <td>Q1</td>
                                     <td>2011/03/31 23:59</td>
                                     <td>PT INDUSTRI D</td>
                                     <td><label class="badge badge-danger">Belum melaporkan</label></td>
                                 </tr>
                                 <tr>
                                     <td>3</td>
                                     <td>Q1</td>
                                     <td>2011/03/31 23:59</td>
                                     <td>PT INDUSTRI E</td>
                                     <td><label class="badge badge-danger">Belum melaporkan</label></td>
                                 </tr>
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
 <script>
     // DATATABLE

     var DatatableBasic = (function() {

         // Variables

         var $dtBasic = $('#datatable-data-harian');


         // Methods

         function init($this) {

             // Basic options. For more options check out the Datatables Docs:
             // https://datatables.net/manual/options

             var options = {
                 keys: !0,
                 select: {
                     style: "multi"
                 },
                 language: {
                     paginate: {
                         previous: "<i class='fas fa-angle-left'>",
                         next: "<i class='fas fa-angle-right'>"
                     }
                 },
             };

             // Init the datatable

             var table = $this.on('init.dt', function() {
                 $('div.dataTables_length select').removeClass('custom-select custom-select-sm');

             }).DataTable(options);
         }


         // Events

         if ($dtBasic.length) {
             init($dtBasic);
         }

     })();

     // DATERANGE PICKER CONTROL
     $(function() {


         var start = moment().subtract(29, 'days');
         var end = moment();

         function cb(start, end) {
             $('.reportrange_q span').html(start.format('DD/MM/YYYY h:mm') + ' - ' + end.format('DD/MM/YYYY h:mm'));
             $(".reportrange_q #start_date").val(start.format('DD/MM/YYYY h:mm'))
             $(".reportrange_q #end_date").val(end.format('DD/MM/YYYY h:mm'))
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
 </script>