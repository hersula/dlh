<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Dinas Lingkungan Hidup Kabupaten Bekasi</title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('')?>/assets/icon/icon_dlh.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('') ?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('') ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>/assets/css/argon.css?v=1.2.1" type="text/css">
    <link rel="stylesheet" href="<?= base_url('') ?>/assets/css/style.css">

    <!-- LEAFET JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Navabr -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark bg-primary ">
        <div class="container-fluid">
            <div class="row ml-2">
                <a class="navbar-brand" href="./pages/dashboards/dashboard.html">
                <img src="<?= base_url('')?>/assets/icon/icon_dlh.png">
                </a>
                <div class="text-logo mt-2">
                    <h4 class="d-md-flex d-none flex-column text-white m-0 font-weight-bold">Dinas Lingkungan Hidup
                        Kabupaten Bekasi</h4>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse" style="flex: none;">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./pages/dashboards/dashboard.html">
                                <img src="<?= base_url('') ?>/assets/img/brand/blue.png">
                            </a>

                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                        <a href="<?= base_url('pendaftaran')?>" class="nav-link">
                            <span class="nav-link-inner--text">Pendaftaran</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="<?= base_url('dashboard')?>" class="nav-link">
                            <span class="nav-link-inner--text">Masuk</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-title m-4 ">
                    <h1>PENDAFTARAN WWTP</h1>
                    <h3 class="text-center">NAMA PERUSAHAAN :<?= $nama_perusahaan; ?></h3>
                </div>
                <div class="card-body " id="pendaftaran-baru">
                    <div class="subtitle-pendaftaran">
                        <h4>INFORMASI PERUSAHAAN</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="<?= base_url('pendaftaran/confirm_pendaftaran/1') ?>">
                            <table class="table">
                                <tr>
                                    <td style="width:30px"><label for="nama_perusahaan" class="text-left">Nama Perusahaan </label></td>
                                    <td><input type="text" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" required readonly></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="alamat_perusahaan" class="text-left">Alamat Perusahaan </label></td>
                                    <td><input type="text" class="form-control" placeholder="Alamat Perusahaan" id="alamat_perusahaan" name="alamat_perusahaan" required readonly></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="email_perusahaan" class="text-left">Email Perusahaan </label></td>
                                    <td><input type="text" class="form-control" placeholder="Email Perusahaan" id="email_perusahaan" name="email_perusahaan" required readonly></td>
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
                                        <input type="text" class="form-control" placeholder="Kode Pos" name="kodePos" id="kodePos" required readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="noTlpn" class="text-left">No Telepon</label></td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="No Telepon" name="noTlpn" id="noTlpn" required readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="jenisIndustri" class="text-left">Jenis Industri</label></td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Jenis Industri" name="jenisIndustri" id="jenisIndustri" required readonly>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="subtitle-pendaftaran">
                        <h4>INFORMASI WWTP</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="<?= base_url('pendaftaran/confirm_pendaftaran/1') ?>">
                            <table class="table">
                                <tr>
                                    <td style="width:30px"><label for="nama_wwtp" class="text-left">Nama WWTP </label></td>
                                    <td><input type="text" class="form-control" placeholder="Nama WWTP" id="nama_wwtp" name="nama_wwtp" required></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="alamat_wwtp" class="text-left">Alamat WWTP </label></td>
                                    <td><textarea type="text" class="form-control" placeholder="Alamat WWTP" id="alamat_wwtp" name="alamat_wwtp" required></textarea></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="longitude_wwtp" class="text-left">Longitude WWTP </label></td>
                                    <td><input type="text" class="form-control" placeholder="Longitude  WWTP" id="longitude_wwtp" name="longitude_wwtp" required></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="latitude_wwtp" class="text-left">Latitude WWTP </label></td>
                                    <td><input type="text" class="form-control" placeholder="Latitude  WWTP" id="latitude_wwtp" name="latitude_wwtp" required></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="nama_pengguna" class="text-left">Nama Pengguna </label></td>
                                    <td><input type="text" class="form-control" placeholder="Nama Pengguna" id="nama_pengguna" name="nama_pengguna" required></td>
                                </tr>

                                <tr>
                                    <td style="width:30px"><label for="jabatan" class="text-left">Jabatan</label></td>
                                    <td><input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan" required></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="email" class="text-left">Email</label></td>
                                    <td><input type="text" class="form-control" placeholder="Email" id="email" name="email" required></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="no_tlpn" class="text-left">No Telepon</label></td>
                                    <td><input type="text" class="form-control" placeholder="No Telepon" id="no_tlpn" name="no_tlpn" required></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="penanggung_jawab" class="text-left">Penanggung Jawab</label></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="password" class="text-left">Kata Sandi</label></td>
                                    <td><input type="password" class="form-control" placeholder="Kata Sandi" id="password" name="password" required></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="confirmpassword" class="text-left">Konfirmasi Kata Sandi</label></td>
                                    <td><input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" id="confirmpassword" name="confirmpassword" required></td>
                                </tr>

                            </table>
                            <div class="table-responsive">
                                <table class="table">
                                    <div class="subtitle-pendaftaran row">
                                        <div class="col-lg-6">
                                            <h4>Surat Pendukung WWTP</h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#tambahsuratModal">+ Tambah</button>
                                        </div>

                                    </div>
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
                                        <td><span class="badge badge-danger">Menunggu Validasi</span> </td>
                                        <td><button class="btn btn-warning">Detail</button></td>
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
                                        <td><button class="btn btn-warning">Detail</button></td>
                                    </tr>
                                </table>
                            </div>
                            <button class="btn btn-primary float-right mt-5">Simpan</button>
                        </form>
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
                                <option value="PERTEK AIR LIMBAH">PERTEK AIR LIMBAH</option>
                                <option value="SLO AIR LIMBAH">SLO AIR LIMBAH</option>
                                <option value="Persetujuan Lingkungan">Persetujuan Lingkungan</option>
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
    <div style="height: 400px;"></div>
    <!-- Footer -->
    <footer class="py-5" id="footer-main">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-muted">
                        &copy;copyright 2021 <a href="#" class="font-weight-bold ml-1">Dinas Lingkungan Hidup Kabupaten Bekasi </a>

                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="<?= base_url('') ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('') ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('') ?>/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="<?= base_url('') ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?= base_url('') ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="<?= base_url('') ?>/assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <!-- Argon JS -->
    <script src="<?= base_url('') ?>/assets/js/argon.js?v=1.2.1"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="<?= base_url('') ?>/assets/js/demo.min.js"></script>
    <script>
        $("#jenis_surat").on("change",function(){
            let jenis_surat = $(this).val();
            let divContent = $(".contentSurat");
            let html;
            divContent.html('')
            if(jenis_surat == "IPLC"){
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

                <div class="form-group">
                    <label for="titik_outfall">Titik outfall</label>
                    <input class="form-control" name="titik_outfall" id="titik_outfall">
                </div>

                <div class="form-group">
                    <label for="titik_upstream">Titik upstream</label>
                    <input class="form-control" name="titik_upstream" id="titik_upstream">
                </div>

                <div class="form-group">
                    <label for="titik_downstream">Titik downstream</label>
                    <input class="form-control" name="titik_downstream" id="titik_downstream">
                </div>

                <div class="form-group">
                    <label for="bml">Baku mutu air limbah</label>
                    <input class="form-control" name="bml" id="bml">
                </div>

                <div class="form-group">
                    <label for="bap">Baku air permukaan</label>
                    <input class="form-control" name="bap" id="bap">
                </div>

                <div class="form-group">
                    <label for="lampiran">Lampiran File</label>
                    <input class="form-control" type="file" name="lampiran" id="lampiran">
                </div>
                
                `
            }
            divContent.html(html)
        })
    </script>
</body>

</html>