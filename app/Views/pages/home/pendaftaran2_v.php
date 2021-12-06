
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
    <link rel="stylesheet" href="<?= base_url('')?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('')?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url('')?>/assets/css/argon.css?v=1.2.1" type="text/css">
    <link rel="stylesheet" href="<?= base_url('')?>/assets/css/style.css">

    <!-- LEAFET JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse" style="flex: none;">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./pages/dashboards/dashboard.html">
                                <img src="<?= base_url('')?>/assets/img/brand/blue.png">
                            </a>

                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                aria-label="Toggle navigation">
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
                <h1>Konfirmasi Pendaftaran</h1>
                <h3 class="text-center">PENDAFTARAN ID :<?= $id;?></h3>
            </div>
            <div class="card-body " id="pendaftaran-baru">
                <div class="subtitle-pendaftaran">
                    <h4>INFORMASI PERUSAHAAN</h4>
                </div>
                <div class="content">
                    <form method="POST" action="<?= base_url('pendaftaran/confirm_pendaftaran/1')?>" >
                        <table class="table">
                            <tr>
                                <td style="width:30px"><label for="nama_perusahaan" class="text-left" >Nama Perusahaan </label></td>
                                <td><input type="text" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" required readonly></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="alamat_perusahaan" class="text-left" >Alamat Perusahaan </label></td>
                                <td><input type="text" class="form-control" placeholder="Alamat Perusahaan" id="alamat_perusahaan" name="alamat_perusahaan" required readonly></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="email_perusahaan" class="text-left" >Email Perusahaan </label></td>
                                <td><input type="text" class="form-control" placeholder="Email Perusahaan" id="email_perusahaan" name="email_perusahaan" required readonly></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="provinsi" class="text-left" >Provinsi </label></td>
                                <td>
                                    <select class="form-control w-100" name="provinsi" id="provinsi">
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="kabkot" class="text-left" >Kabkot </label></td>
                                <td>
                                    <select class="form-control w-100" name="kabkot" id="kabkot">
                                        <option value="">Pilih Kabkot</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="kecamatan" class="text-left" >Kecamatan </label></td>
                                <td>
                                    <select class="form-control w-100" name="kecamatan" id="kecamatan">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="desa" class="text-left" >Desa </label></td>
                                <td>
                                    <select class="form-control w-100" name="desa" id="desa">
                                        <option value="">Pilih Desa</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="kodePos" class="text-left" >Kode Pos </label></td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Kode Pos" name="kodePos" id="kodePos" required readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="noTlpn" class="text-left" >No Telepon</label></td>
                                <td>
                                    <input type="text" class="form-control" placeholder="No Telepon" name="noTlpn" id="noTlpn" required readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="jenisIndustri" class="text-left" >Jenis Industri</label></td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Jenis Industri" name="jenisIndustri" id="jenisIndustri" required readonly>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="subtitle-pendaftaran">
                    <h4>INFORMASI PENGGUNA ADMIN</h4>
                </div>
                <div class="content">
                    <form method="POST" action="<?= base_url('pendaftaran/confirm_pendaftaran/1')?>" >
                        <table class="table">
                            <tr>
                                <td style="width:30px"><label for="nama_pengguna" class="text-left" >Nama Pengguna </label></td>
                                <td><input type="text" class="form-control" placeholder="Nama Pengguna" id="nama_pengguna" name="nama_pengguna" required ></td>
                            </tr>
                           
                            <tr>
                                <td style="width:30px"><label for="jabatan" class="text-left" >Jabatan</label></td>
                                <td><input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan" required ></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="email" class="text-left" >Email</label></td>
                                <td><input type="text" class="form-control" placeholder="Email" id="email" name="email" required ></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="no_tlpn" class="text-left" >No Telepon</label></td>
                                <td><input type="text" class="form-control" placeholder="No Telepon" id="no_tlpn" name="no_tlpn" required ></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="penanggung_jawab" class="text-left" >Penanggung Jawab</label></td>
                                <td><input type="checkbox" name="" id=""></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="password" class="text-left" >Kata Sandi</label></td>
                                <td><input type="password" class="form-control" placeholder="Kata Sandi" id="password" name="password" required ></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="confirmpassword" class="text-left" >Konfirmasi Kata Sandi</label></td>
                                <td><input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" id="confirmpassword" name="confirmpassword" required ></td>
                            </tr>
                            <tr>
                                <td colspan="2"><button class="btn btn-primary float-right">Daftar</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div style="height: 400px;"></div>
    <!-- Footer -->
    <footer class="py-5" id="footer-main">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-muted">
                        &copy;copyright 2021 <a href="#" class="font-weight-bold ml-1"
                            >Dinas Lingkungan Hidup Kabupaten Bekasi </a>
                            
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
    <script src="<?= base_url('')?>/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('')?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('')?>/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="<?= base_url('')?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?= base_url('')?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="<?= base_url('')?>/assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <!-- Argon JS -->
    <script src="<?= base_url('')?>/assets/js/argon.js?v=1.2.1"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="<?= base_url('')?>/assets/js/demo.min.js"></script>
</body>

</html>