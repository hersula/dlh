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
                         <h3 class="mb-0">Data Industri</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk melihat data industri yang terdaftar dan tervalidasi.
                         </p>
                     </div>

                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable-data-harian">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Industri </th>
                                     <th>Alamat </th>
                                     <th>Nomor Kantor</th>
                                     <th>Tanggal Pendaftaran</th>
                                     <th>Status</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>PT INDUSTRI A</td>
                                     <td>Jl.Simatupang semarang</td>
                                     <td>021-96965916</td>
                                     <td>2021/03/03 15:00:01</td>
                                     <td><span class="badge badge-success">Aktif</span></td>
                                     <td><button class="btn btn-primary" data-toggle="modal" data-target="#modalEditUser">Edit</button><button class="btn btn-warning btn-detail" data-toggle="modal" data-target="#modalDetailWWTP">Detail</button></td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal ADMIN INDUSTRI-->
 <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUserLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalEditUserLabel">Edit Industri</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="content">
                     <form>
                         <table class="table">
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Nama Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" required></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="alamat_perusahaan" class="text-left">Alamat Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Alamat Perusahaan" id="alamat_perusahaan" name="alamat_perusahaan" required></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="email_perusahaan" class="text-left">Email Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Email Perusahaan" id="email_perusahaan" name="email_perusahaan" required></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="provinsi" class="text-left">Provinsi </label></td>
                                 <td>
                                     <select class="form-control w-100" name="provinsi" id="provinsi">
                                         <option value="">Pilih Provinsi</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="kabkot" class="text-left">Kabkot </label></td>
                                 <td>
                                     <select class="form-control w-100" name="kabkot" id="kabkot">
                                         <option value="">Pilih Kabkot</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="kecamatan" class="text-left">Kecamatan </label></td>
                                 <td>
                                     <select class="form-control w-100" name="kecamatan" id="kecamatan">
                                         <option value="">Pilih Kecamatan</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="desa" class="text-left">Desa </label></td>
                                 <td>
                                     <select class="form-control w-100" name="desa" id="desa">
                                         <option value="">Pilih Desa</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="kodePos" class="text-left">Kode Pos </label></td>
                                 <td>
                                     <input type="text" class="form-control" placeholder="Kode Pos" name="kodePos" id="kodePos">
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="noTlpn" class="text-left">No Telepon</label></td>
                                 <td>
                                     <input type="text" class="form-control" placeholder="No Telepon" name="noTlpn" id="noTlpn">
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="jenisIndustri" class="text-left">Jenis Industri</label></td>
                                 <td>
                                     <input type="text" class="form-control" placeholder="Jenis Industri" name="jenisIndustri" id="jenisIndustri">
                                 </td>
                             </tr>
                             
                             <tr>
                                 <td colspan="2"><button class="btn btn-primary float-right">Ubah Data</button></td>
                             </tr>
                         </table>
                     </form>
                 </div>
             </div>

         </div>
     </div>
 </div>



 <!-- MODAL DETAIL AKUN INDUSTRI AND  WWTP -->
 <div class="modal fade" id="modalDetailWWTP" tabindex="-1" role="dialog" aria-labelledby="modalDetailWWTPLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalDetailWWTPLabel">Detail Industri</h5>
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
                             <tr>
                                 <th colspan="9">
                                     <select name="industriwwtp" id="industriwwtp" class="form-control">
                                         <option value="">Pilih Industri WWTP</option>
                                         <option value="Industri A (WWTP-1)">Industri A (WWTP-1)</option>
                                         <option value="Industri A (WWTP-2)">Industri A (WWTP-2)</option>
                                     </select>
                                 </th>
                             </tr>
                         </table>
                         <div class="content-wwtp"></div>

                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
 <script>
     $(function() {
         $("#industriwwtp").on('change', function() {
             let valuewwtp = $(this).val()
             let html;
             reset_wwtp()
             if (valuewwtp == "") {
                 reset_wwtp()
             } else {
                 html = `<table class="table">`
                 html += `
                       
                        <tr>
                             <td class="w-10px">Nama WWTP</td>
                             <td class="w-10px">:</td>
                             <td colspan="7">${valuewwtp}</td>
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
                            <td colspan="9"><h4>IPLC</h4></td>
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
                            <td colspan="9"><h4>SIPA</h4></td>
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
                            <td colspan="9"><h4>NIB</h4></td>
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
                         
             `
                 html += `</table>`
             }

             $(".content-wwtp").html(html);
         })
     })

     function reset_wwtp() {
         $(".content-wwtp").html('')
     }
 </script>