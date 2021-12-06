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
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPengajuan">Tambah Pengajuan Pelaporan</button>
                            <button class="btn btn-warning" id="btn-download">Download</button>
                         </div>
                     </div>
                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable-data-harian">
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
                                 <tr>
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

     $(function() {
        $("#quartal").on('change',function(){
            let val_quartal = $(this).val()
            let html_harian;
            let html_analisa;
            let content = $("#content-laporan");
            if(val_quartal == ""){
                resetContent(content)
            }
            else {

            html_harian = `
                    
                    <table class="table">
            `
            html_harian += `
                    <tr>
                        <td colspan="9"><h3>Data Harian</h3></td>
                    </tr>
                    <tr>
                        <th style="width:30px">No</th>
                        <th style="width:100px">Tanggal</th>
                        <th style="width:100px">Quartal</th>
                        <th style="width:100px">Nama Industri</th>
                        <th style="width:100px">Nama Industri WWTP</th>
                        <th style="width:100px">Nilai Ph</th>
                        <th style="width:100px">Nilai COD</th>
                        <th style="width:100px">Nilai Debit Air Limbah</th>
                        <th style="width:100px">Nilai Debit Pemakaian Air</th>
                    </tr>
            `
            for(let i=1; i<=31; i++){
                html_harian += `
                        <tr>
                            <td>${i}</td>
                            <td>2021-01-${i}</td>
                            <td>Q1</td>
                            <td>PT INDUSTRI A</td>
                            <td>PT INDUSTRI A (WWTP-01)</td>
                            <td>6</td>
                            <td>3${i}</td>
                            <td>100${i}</td>
                            <td>100${i}</td>
                        </tr>
                `
            }
            html_harian += `</table>`

            html_analisa = `
                    
                    <table class="table">
            `
            html_analisa += `
                    <tr>
                        <td colspan="8"><h3>Data Analisa</h3></td>
                    </tr>
                    <tr>
                        <th style="width:30px">No</th>
                        <th style="width:100px">Tanggal Pelaporan</th>
                        <th style="width:100px">Quartal</th>
                        <th style="width:100px">Nama Industri</th>
                        <th style="width:100px">Nama Industri WWTP</th>
                        <th style="width:100px">Lokasi Pengambilan</th>
                        <th style="width:100px">Nomer Sampling</th>
                        <th style="width:100px">Jenis Sampling</th>
                        <th style="width:100px">Tanggal Sampling</th>
                        <th style="width:100px">Tanggal Pengambilan</th>
                        <th style="width:100px">Tanggal Diterima</th>
                    </tr>
            `
            html_analisa += `
                        <tr>
                            <td>1</td>
                            <td>2021-01-01</td>
                            <td>Q1</td>
                            <td>PT INDUSTRI A</td>
                            <td>PT INDUSTRI A (WWTP-01)</td>
                            <td>INLET</td>
                            <td>31312213123</td>
                            <td>Air Limbah Kawasan Industri</td>
                            <td>2021-01-01 - 2021-02-25</td>
                            <td>2021-01-01</td>
                            <td>2021-01-01</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2021-02-01</td>
                            <td>Q1</td>
                            <td>PT INDUSTRI A</td>
                            <td>PT INDUSTRI A (WWTP-01)</td>
                            <td>OUTLET</td>
                            <td>31312213123</td>
                            <td>Air Limbah Kawasan Industri</td>
                            <td>2021-01-01 - 2021-02-25</td>
                            <td>2021-01-01</td>
                            <td>2021-01-01</td>
                        </tr>
                `
            html_analisa += `</table>`
        }

            content.html(html_harian)
            content.append(html_analisa)

        })
        function resetContent(content){
            content.html("")
        }
     })
 </script>