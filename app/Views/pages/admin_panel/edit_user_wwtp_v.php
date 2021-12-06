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
                         <h3 class="mb-0">Form Edit Surat WWTP : PT INDUSTRI B (WWTP-02)</h3>
                     </div>
                     <div class="table-responsive">
                         <table class="table">
                             <tr>
                                 <td colspan="10"> <button class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#tambahsuratModal">+ Tambah</button></td>
                             </tr>
                             <tr>
                                 <th>No</th>
                                 <th>Jenis Surat</th>
                                 <th>No Ijin</th>
                                 <th>Tanggal Ijin</th>
                                 <th>Instansi yang mengeluarkan</th>
                                 <th>Tanggal Penerbit</th>
                                 <th>Tanggal Berakhir</th>
                                 <th>Lampiran</th>
                                 <th>Status</th>
                                 <th>Aksi</th>
                             </tr>
                             <tr>
                                 <td>1</td>
                                 <td>Surat IPLC</td>
                                 <td>NO.I001</td>
                                 <td>2021-07-01 </td>
                                 <td>KLHK PUSAT </td>
                                 <td>2021-07-01 </td>
                                 <td>2022-03-01 </td>
                                 <td><a href="#">Download File</a> </td>
                                 <td><span class="badge badge-success">Tervalidasi</span> </td>
                                 <td><button class="btn btn-primary" data-toggle="modal" data-target="#EditsuratModal">Edit</button></td>
                             </tr>
                             <tr>
                                 <td>2</td>
                                 <td>Surat SIPA</td>
                                 <td>NO.I002</td>
                                 <td>2021-07-01 </td>
                                 <td>KLHK PUSAT </td>
                                 <td>2021-07-01 </td>
                                 <td>2022-03-01 </td>
                                 <td><a href="#">Download File</a> </td>
                                 <td><span class="badge badge-danger">Menunggu Validasi</span> </td>
                                 <td><button class="btn btn-primary" data-toggle="modal" data-target="#EditsuratModal">Edit</button></td>
                             </tr>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- MODAL TAMBAH SURAT -->
 <div class="modal fade" id="tambahsuratModal" tabindex="-1" role="dialog" aria-labelledby="tambahsuratModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="tambahsuratModalLabel">Tambah Surat Ijin</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="form-group">
                         <label for="jenis_surat">Jenis Surat</label>
                         <select class="form-control" name="jenis_surat" id="jenis_surat" required>
                             <option value="">Pilih Jenis Surat</option>
                             <option value="IPLC">IPLC</option>
                             <option value="SIPA">SIPA</option>
                             <option value="NIB">NIB</option>
                         </select>
                     </div>
                     <div class="contentSurat"></div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                 </form>
             </div>

         </div>
     </div>
 </div>
 <!-- END MODAL TAMBAH SURAT -->

 <!-- MODAL EDIT SURAT -->
 <div class="modal fade" id="EditsuratModal" tabindex="-1" role="dialog" aria-labelledby="EditsuratModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="EditsuratModalLabel">Edit Surat Ijin</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="form-group">
                         <label for="nomor_izin_iplc">Nomor Ijin IPLC</label>
                         <input class="form-control" name="nomor_izin_iplc" id="nomor_izin_iplc">
                     </div>

                     <div class="form-group">
                         <label for="tgl_izin_iplc">Tanggal Ijin IPLC</label>
                         <input class="form-control" name="tgl_izin_iplc" id="tgl_izin_iplc">
                     </div>

                     <div class="form-group">
                         <label for="instansi_yangmengeluarkan_iplc">Instansi yang menegeluarkan ijin IPLC</label>
                         <input class="form-control" name="instansi_yangmengeluarkan_iplc" id="instansi_yangmengeluarkan_iplc">
                     </div>


                     <div class="form-group">
                         <label for="nomor_rekomendasi_iplc">Nomor Rekomendasi IPLC</label>
                         <input class="form-control" name="nomor_rekomendasi_iplc" id="nomor_rekomendasi_iplc">
                     </div>

                     <div class="form-group">
                         <label for="tgl_rekomendasi">Tanggal Rekomendasi IPLC</label>
                         <input class="form-control" name="tgl_rekomendasi" id="tgl_rekomendasi">
                     </div>

                     <div class="form-group">
                         <label for="kapasitas_ipal_iplc">Kapasitas Ipal IPLC</label>
                         <input class="form-control" name="kapasitas_ipal_iplc" id="kapasitas_ipal_iplc">
                     </div>

                     <div class="form-group">
                         <label for="sumber_airlimbah_iplc">Sumber Air Limbah IPLC</label>
                         <input class="form-control" name="sumber_airlimbah_iplc" id="sumber_airlimbah_iplc">
                     </div>

                     <div class="form-group">
                         <label for="volume_ijin_iplc">Volume ijin IPLC</label>
                         <input class="form-control" name="volume_ijin_iplc" id="volume_ijin_iplc">
                     </div>

                     <div class="form-group">
                         <label for="titik_penaatan">Titik Penaatan</label>
                         <input class="form-control" name="titik_penaatan" id="titik_penaatan">
                     </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                 </form>
             </div>

         </div>
     </div>
 </div>
 <!-- END MODAL EDIT SURAT -->
 <script>
     $("#jenis_surat").on("change", function() {
         let jenis_surat = $(this).val();
         let divContent = $(".contentSurat");
         let html;
         divContent.html('')
         if (jenis_surat == "IPLC") {
             html = `
                <div class="form-group">
                    <label for="nomor_izin_iplc">Nomor Ijin IPLC</label>
                    <input class="form-control" name="nomor_izin_iplc" id="nomor_izin_iplc">
                </div>

                <div class="form-group">
                    <label for="tgl_izin_iplc">Tanggal Ijin IPLC</label>
                    <input class="form-control" name="tgl_izin_iplc" id="tgl_izin_iplc">
                </div>
                
                <div class="form-group">
                    <label for="instansi_yangmengeluarkan_iplc">Instansi yang menegeluarkan ijin IPLC</label>
                    <input class="form-control" name="instansi_yangmengeluarkan_iplc" id="instansi_yangmengeluarkan_iplc">
                </div>


                <div class="form-group">
                    <label for="nomor_rekomendasi_iplc">Nomor Rekomendasi IPLC</label>
                    <input class="form-control" name="nomor_rekomendasi_iplc" id="nomor_rekomendasi_iplc">
                </div>

                <div class="form-group">
                    <label for="tgl_rekomendasi">Tanggal Rekomendasi IPLC</label>
                    <input class="form-control" name="tgl_rekomendasi" id="tgl_rekomendasi">
                </div>

                <div class="form-group">
                    <label for="kapasitas_ipal_iplc">Kapasitas Ipal IPLC</label>
                    <input class="form-control" name="kapasitas_ipal_iplc" id="kapasitas_ipal_iplc">
                </div>

                <div class="form-group">
                    <label for="sumber_airlimbah_iplc">Sumber Air Limbah IPLC</label>
                    <input class="form-control" name="sumber_airlimbah_iplc" id="sumber_airlimbah_iplc">
                </div>

                <div class="form-group">
                    <label for="volume_ijin_iplc">Volume ijin IPLC</label>
                    <input class="form-control" name="volume_ijin_iplc" id="volume_ijin_iplc">
                </div>

                <div class="form-group">
                    <label for="titik_penaatan">Titik Penaatan</label>
                    <input class="form-control" name="titik_penaatan" id="titik_penaatan">
                </div>
                
                `
         }
         divContent.html(html)
     })
 </script>