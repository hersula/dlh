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
                         <h3 class="mb-0">Validasi Laporan Data Harian</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk memvalidasi laporan data harian dari industri.
                         </p>
                     </div>

                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Industri </th>
                                     <th>Nama Industri WWTP </th>
                                     <th>Quartal </th>
                                     <th>Tanggal Pelaporan</th>
                                     <th>Ph </th>
                                     <th>COD (mg/L)</th>
                                     <th>Debit (m/3)</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>PT INDUSTRI A</td>
                                     <td>Jl. Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                     <td>021-96965916</td>
                                     <td>rudi@gmail.com</td>
                                     <td>Rudi Setiawan</td>
                                     <td>Admin Industri</td>
                                     <td>2021/03/03 15:00:01</td>
                                     <td><span class="badge badge-danger">Belum divalidasi</span></td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- MODAL DETAIL INDUSTRI -->
 <div class="modal fade" id="modalDetailUserIndustri" tabindex="-1" role="dialog" aria-labelledby="modalDetailUserIndustriLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalDetailUserIndustriLabel">Detail Industri</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="content">
                     <table class="table">
                         <tr>
                             <th colspan="3">
                                 <h3 class="fw-bold"> Informasi Perusahaan</h3>
                             </th>
                         </tr>
                         <tr>
                             <td class="w-10px">Nama Perusahaan</td>
                             <td class="w-10px">:</td>
                             <td>PT INDUSTRI A</td>
                         </tr>
                         <tr>
                             <td>Alamat Perusahaan</td>
                             <td>:</td>
                             <td>Jalan Kemang Raya</td>
                         </tr>
                         <tr>
                             <td>Email Perusahaan</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Provinsi</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Kabkot</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Kecamatan</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Desa</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Kode pos</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>No Telepon</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Jenis Industri</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                     </table>
                     <br>
                     <div class="table-responsive">
                         <table class="table">
                             <tr>
                                 <th colspan="9">
                                     <h3>Informasi Akun Admin Industri </h3>
                                 </th>
                             </tr>
                         </table>
                         <table class="table">
                             <tr>
                                 <td class="w-10px">Nama Pengguna</td>
                                 <td class="w-10px">:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Jabatan</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Email</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>No Telepon</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                         </table>

                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
 <!-- END MODAL DETAIL INDUSTRI -->



 <!-- MODAL DETAIL INDUSTRI  WWTP-->
 <div class="modal fade" id="modalDetailUserWWTP" tabindex="-1" role="dialog" aria-labelledby="modalDetailUserWWTPLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalDetailUserWWTPLabel">Detail Industri WWTP</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="content">
                     <table class="table">
                         <tr>
                             <th colspan="3">
                                 <h3 class="fw-bold"> Informasi Perusahaan</h3>
                             </th>
                         </tr>
                         <tr>
                             <td class="w-10px">Nama Perusahaan</td>
                             <td class="w-10px">:</td>
                             <td>PT INDUSTRI A</td>
                         </tr>
                         <tr>
                             <td>Alamat Perusahaan</td>
                             <td>:</td>
                             <td>Jalan Kemang Raya</td>
                         </tr>
                         <tr>
                             <td>Email Perusahaan</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Provinsi</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Kabkot</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Kecamatan</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Desa</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Kode pos</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>No Telepon</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                         <tr>
                             <td>Jenis Industri</td>
                             <td>:</td>
                             <td></td>
                         </tr>
                     </table>
                     <br>
                     <div class="table-responsive">
                         <table class="table">
                             <tr>
                                 <th colspan="9">
                                     <h3>Informasi WWTP Industri </h3>
                                 </th>
                             </tr>

                         </table>
                         <table class="table">
                             <tr>
                                 <td class="w-10px">Nama WWTP</td>
                                 <td class="w-10px">:</td>
                                 <td colspan="7">WWTP-1</td>
                             </tr>
                             <tr>
                                 <td>Alamat WWTP</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Longitude WWTP</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Latitude WWTP</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Nama Pengguna</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Jabatan</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Email</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>No Telepon</td>
                                 <td>:</td>
                                 <td colspan="7">0219691912</td>
                             </tr>
                             <tr>
                                 <th colspan="9">Surat Pendukung WWTP Industri A (WWTP-1)</th>
                             </tr>
                             <!-- IPLC -->
                             <tr>
                                 <td colspan="9">
                                     <h4>IPLC</h4>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Jenis Surat</td>
                                 <td>:</td>
                                 <td colspan="7">IPLC</td>
                             </tr>
                             <tr>
                                 <td>Nomor Ijin IPLC</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Tanggal Ijin IPLC</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Instansi yang menegeluarkan ijin IPLC</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Nomor Rekomendasi IPLC</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Tanggal Rekomendasi IPLC</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Kapasitas Ipal IPLC</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Sumber Air Limbah IPLC</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Volume ijin IPLC</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Titik Penaatan</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>

                             <tr>
                                 <td>Titik outfall</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>

                             <tr>
                                 <td>Titik upstream</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>

                             <tr>
                                 <td>Titik downstream</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>

                             <tr>
                                 <td>Baku mutu air limbah</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>

                             <tr>
                                 <td>Badan air permukaan</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Lampiran</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>

                             <!-- SIPA -->
                             <tr>
                                 <td colspan="9">
                                     <h4>SIPA</h4>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Jenis Surat</td>
                                 <td>:</td>
                                 <td colspan="7">SIPA</td>
                             </tr>
                             <tr>
                                 <td>Nomor Ijin SIPA</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Tanggal Ijin SIPA</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Instansi yang menegeluarkan ijin SIPA</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Volume Pengambilan</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Titik Kordinat</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Lampiran</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>

                             <!-- NIB -->
                             <tr>
                                 <td colspan="9">
                                     <h4>NIB</h4>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Jenis Surat</td>
                                 <td>:</td>
                                 <td colspan="7">NIB</td>
                             </tr>
                             <tr>
                                 <td>Nomer KBLI</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Jenis kegiatan</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                             <tr>
                                 <td>Lampiran</td>
                                 <td>:</td>
                                 <td colspan="7"></td>
                             </tr>
                         </table>

                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
 <!-- END MODAL DETAIL INDUSTRI WWTP -->

 <script>
     var DatatableBasic = (function() {

         // Variables

         var $dtBasic = $('#datatable');


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

     // SWEETALERT UNTUK DOWNLOAD FILE
     $(function() {
         $(".btn-validasi").on('click', function() {
             const swalWithBootstrapButtons = Swal.mixin({
                 customClass: {
                     confirmButton: 'btn btn-success',
                     cancelButton: 'btn btn-danger'
                 },
                 buttonsStyling: false
             })

             swalWithBootstrapButtons.fire({
                 title: 'Apakah anda ingin setujui pendaftaran ini?',
                 text: "Jika ya, mohon menunggu sebentar...",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Setujui',
                 cancelButtonText: 'Tolak',
                 reverseButtons: true
             }).then((result) => {
                 if (result.isConfirmed) {
                     swalWithBootstrapButtons.fire(
                         'Berhasil...',
                         'Pendaftaran ini berhasil di setujui...',
                         'success'
                     )
                 } else if (
                     /* Read more about handling dismissals below */
                     result.dismiss === Swal.DismissReason.cancel
                 ) {
                     swalWithBootstrapButtons.fire({
                         title: 'Alasan pendaftaran ini ditolak ?',
                         input: 'text',
                         inputAttributes: {
                             autocapitalize: 'off'
                         },
                         showCancelButton: true,
                         confirmButtonText: 'Submit',
                         showLoaderOnConfirm: true,
                         preConfirm: (login) => {
                             return fetch(`//api.github.com/users/${login}`)
                                 .then(response => {
                                     if (!response.ok) {
                                         throw new Error(response.statusText)
                                     }
                                     return response.json()
                                 })
                                 .catch(error => {
                                     Swal.showValidationMessage(
                                         `Request failed: ${error}`
                                     )
                                 })
                         },
                         allowOutsideClick: () => !Swal.isLoading()
                     }).then((result) => {
                         if (result.isConfirmed) {
                             Swal.fire({
                                 title: `${result.value.login}'s avatar`,
                                 imageUrl: result.value.avatar_url
                             })
                         }
                     })
                 }
             })
         })
     })
 </script>