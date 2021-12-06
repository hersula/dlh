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
                        <h3 class="mb-0">Data Site WWTP</h3>
                        <p class="text-sm mb-0">
                            Halaman ini untuk melihat data Site WWTP yang terdaftar dan tervalidasi.
                        </p>
                        <?= view('Myth\Auth\Views\_message_block') ?>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-add float-right mr-4">Tambah</button>

                    </div>
                    <div class="table-responsive py-4">
                        <table id="datatable" class="table table-flush" id="datatable-data-harian">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Industri </th>
                                    <th>Nama WWTP </th>
                                    <th>Alamat </th>
                                    <th>Lokasi </th>
                                    <th>Status </th>
                                    <th>Aksi</th>
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

<!-- MODAL INFORMATION PENATAAN -->
<div class="modal wwtp fade" id="modalUserWWTP" tabindex="-1" role="dialog" aria-labelledby="modalUserWWTPLabel" aria-hidden="true">
    <div class="modal-dialog wwtp modal-lg" role="document">
        <div class="modal-content wwtp">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUserWWTPLabel">Tambah Lokasi Penaatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body wwtp">
                <div class="content">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form id="pendaftaran-wwtp" action="<?= base_url("admin/add_titik_penaatan"); ?>" method="POST" enctype=multipart/form-data>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="session_token_wwtp" id="session_token_wwtp" value="<?= date('y-m-d h:m:s') ?>">
                        <div id="surat-ijin" class="table-responsive mt-5">
                            <table id="table-surat-ijin" class="table">
                                <div class="subtitle-pendaftaran row">
                                    <div class="col-lg-6">
                                        <h4>Dokumen Ijin <span class="text-danger">*</span></h4>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#tambahsuratIjinModal">Tambah Dokumen</button>
                                    </div>

                                </div>
                                <thead>
                                    <tr>
                                        <th class="text-left">Jenis Dokumen</th>
                                        <th class="text-left">No Ijin</th>
                                        <th class="text-left">Tanggal Ijin</th>
                                        <th class="text-left">Instansi yang mengeluarkan</th>
                                        <th class="text-left">Lampiran</th>
                                        <th class="text-left">Status</th>
                                        <th class="text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="target-surat-ijin">
                                    <tr id="target-remove-surat-ijin">
                                        <td colspan="9" class="text-center text-danger">Tambahkan Dokumen Ijin!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="site-penaatan" class="table-responsive mt-5">
                            <table class="table">
                                <div class="subtitle-pendaftaran row">
                                    <div class="col-lg-12">
                                        <h4>Data Titik Penataan</h4>
                                    </div>
                                </div>
                                </br>
                                <tr>
                                    <td style="width:30px"><label for="name" class="text-left">Nama Titik Penaatan <span class="text-danger">*</span> </label></td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" placeholder="Nama Titik Penaatan" id="name" name="name" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="address" class="text-left">Alamat Penaatan <span class="text-danger">*</span> </label></td>
                                    <td colspan="4">
                                        <textarea type="text" class="form-control" placeholder="Alamat Penaatan" id="address" name="address" required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="typeReportID" class="text-left">Tipe Pelaporan <span class="text-danger">*</span> </label></td>
                                    <td colspan="4">
                                        <select class="form-control" id="typeReportID" name="typeReportID" required>
                                            <?php
                                            foreach ($typeReports as $row) {
                                            ?>
                                                <option value="<?= $row['typeReportID']; ?>"><?= $row['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="debit" class="text-left">Volume / Debit Maksimum Air Limbah <span class="text-danger">*</span> </label></td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" placeholder="Volume / Debit Maksimum Air Limbah" name="debit" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-center">Titik Kordinasi Outlet (Titik Penaatan)</td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="longitude" class="text-left">Longitude <span class="text-danger">*</span> </label></td>
                                    <td>
                                        <input type="text" class="form-control longitude_outlet" placeholder="Longitude" name="longitude[]" required>
                                    </td>
                                    <td style="width:30px"><label for="latitude" class="text-left">Latitude <span class="text-danger">*</span> </label></td>
                                    <td>
                                        <input type="text" class="form-control latitude_outlet" placeholder="Latitude" name="latitude[]" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-center">Titik Kordinasi Outfall</td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="longitude" class="text-left">Longitude <span class="text-danger">*</span> </label></td>
                                    <td>
                                        <input type="text" class="form-control longitude_outfall" placeholder="Longitude" name="longitude[]" required>
                                    </td>
                                    <td style="width:30px"><label for="latitude" class="text-left">Latitude <span class="text-danger">*</span> </label></td>
                                    <td>
                                        <input type="text" class="form-control latitude_outfall" placeholder="Latitude" name="latitude[]" required>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="ipal" class="table-responsive mt-5">
                            <table id="table-ipal" class="table">
                                <div class="subtitle-pendaftaran row">
                                    <div class="col-lg-6">
                                        <h4>Jumlah IPAL / WWTP <span class="text-danger">*</span></h4>
                                    </div>

                                    <div class="col-lg-6">
                                        <a href="javascript:void(0)"><button class="btn btn-success btn-add-ipal float-right" type="button">Tambah IPAL / WWTP</button></a>
                                    </div>
                                </div>
                                <br>
                                <thead>
                                    <tr>
                                        <td class="text-left">Nama IPAL / WWTP</td>
                                        <td class="text-left">Sumber Air Limbah</td>
                                        <td class="text-left">Kapasitas IPAL / WWTP</td>
                                        <td class="text-left">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody id="target-ipal">
                                    <tr id="target-remove-ipal">
                                        <td colspan="4" class="text-center text-danger">Tambahkan Data IPAL / WWTP!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="bap" class="table-responsive mt-5">
                            <table class="table">
                                <div class="subtitle-pendaftaran row">
                                    <div class="col-lg-12">
                                        <h4>Badan Air Pembuangan</h4>
                                    </div>
                                </div>
                                </br>
                                <thead>
                                    <tr>
                                        <td style="width:30px"><label for="badan_jenis_air" class="text-left">Pilih Badan Jenis Air <span class="text-danger">*</span> </label></td>
                                        <td colspan="3">
                                            <select class="form-control" name="badan_jenis_air" required>
                                                <option value="">Pilih Badan Jenis Air</option>
                                                <?php
                                                foreach ($waters as $row) {
                                                ?>
                                                    <option data-kordinat="<?= $row["jumlah_kordinat"]; ?>" value="<?= $row["sourcesID"]; ?>"><?= $row["name"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" name="lokasi_bap" />
                                            <input type="hidden" name="kordinat_bap" />
                                        </td>
                                    </tr>
                                </thead>
                                <tbody class="target-badan_jenis_air"></tbody>
                            </table>
                        </div>
                        <div id="parameter" class="table-responsive mt-5">
                            <div class="subtitle-pendaftaran row">
                                <div class="col-lg-6">
                                    <h4>Baku Mutu Badan Air Pembuangan</h4>
                                </div>
                                <div class="col-lg-6">
                                    <a href="javascript:void(0)"><button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#tambah_parameterWWTP">Tambah Parameter</button></a>
                                </div>
                            </div>
                            <br>
                            <table id="table-parameter" class="table">
                                <thead>
                                    <tr>
                                        <td class="text-left">Nama Parameter</td>
                                        <td class="text-left">Baku Mutu Lingkungan Minimum</td>
                                        <td class="text-left">Baku Mutu Lingkungan Maximum</td>
                                        <td class="text-left">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody id="target-parameter">
                                    <tr id="target-remove-BMBAP">
                                        <td colspan="4" class="text-center text-danger">Pilih Parameter yang akan digunakan!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="BMAL" class="table-responsive mt-5">
                            <div class="subtitle-pendaftaran row">
                                <div class="col-lg-6">
                                    <h4>Baku Mutu Air Limbah</h4>
                                </div>
                                <div class="col-lg-6">
                                    <a href="javascript:void(0)"><button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#tambah_bmal">Tambah Parameter</button></a>
                                </div>
                            </div>
                            <br>
                            <table id="table-BMAL" class="table">
                                <thead>
                                    <tr>
                                        <td class="text-left">Nama Parameter</td>
                                        <td class="text-left">Baku Mutu Air Limbah Minimum</td>
                                        <td class="text-left">Baku Mutu AIr Limbah Maximum</td>
                                        <td class="text-left">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody id="target-BMAL">
                                    <tr id="target-remove-BMAL">
                                        <td colspan="4" class="text-center text-danger">Pilih Parameter yang akan digunakan!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="penanggung-jawab" class="table-responsive mt-5">
                            <table id="table-users" class="table">
                                <div class="subtitle-pendaftaran row">
                                    <div class="col-lg-6">
                                        <h4>Penanggung Jawab User WWTP</h4>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="javascript:void(0)"><button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#tambah_penanggunjawab">Tambah Penanggung Jawab WWTP</button></a>
                                    </div>
                                </div>
                                <br>
                                <thead>
                                    <tr>
                                        <th class="text-left">Nama Penanggung Jawab</th>
                                        <th class="text-left">Email</th>
                                        <th class="text-left">Status</th>
                                        <th class="text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="target-users">
                                    <tr id="target-remove-user">
                                        <td colspan="4" class="text-center text-danger">Pilih Penanggung Jawab WWTP!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="surat-spa" class="table-responsive mt-5">
                            <table id="table-surat-ijin" class="table">
                                <div class="subtitle-pendaftaran row">
                                    <div class="col-lg-6">
                                        <h4>Dokumen Sumber Pengambilan AIr</h4>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#tambahsuratSpaModal">Tambah Dokumen</button>
                                    </div>

                                </div>
                                <thead>
                                    <tr>
                                        <th class="text-left">Jenis Dokumen</th>
                                        <th class="text-left">No Ijin</th>
                                        <th class="text-left">Tanggal Ijin</th>
                                        <th class="text-left">Instansi yang mengeluarkan</th>
                                        <th class="text-left">Kordinat Air</th>
                                        <th class="text-left">Volume / Debit Max</th>
                                        <th class="text-left">Lampiran</th>
                                        <th class="text-left">Status</th>
                                        <th class="text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="target-surat-spa">
                                    <tr id="target-remove-surat-spa">
                                        <td colspan="9" class="text-center text-danger">Tambahkan Dokumen Sumber Pengambilan Air!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="surat-pendukung" class="table-responsive mt-5">
                            <table id="table-surat" class="table">
                                <div class="subtitle-pendaftaran row">
                                    <div class="col-lg-6">
                                        <h4>Dokumen Pendukung</h4>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#tambahsuratModal">Tambah Dokumen</button>
                                    </div>

                                </div>
                                <thead>
                                    <tr>
                                        <th class="text-left">Jenis Dokumen</th>
                                        <th class="text-left">No Ijin</th>
                                        <th class="text-left">Tanggal Ijin</th>
                                        <th class="text-left">Instansi yang mengeluarkan</th>
                                        <th class="text-left">Lampiran</th>
                                        <th class="text-left">Status</th>
                                        <th class="text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="target-surat-pendukung">
                                    <tr id="target-remove-surat-pendukung">
                                        <td colspan="9" class="text-center text-danger">Tambahkan Dokumen Pendukung!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            <button id="action-wwtp" class="btn btn-primary float-right mt-3 mb-3">Tambah Titik Penaatan</button>
                        </div>
                        <div style="height: 50px;"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- MODAL AKUN PENANGGUNG JAWAB WWTP -->
<div class="modal fade" id="tambah_penanggunjawab" tabindex="-1" role="dialog" aria-labelledby="tambah_penanggunjawabLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_penanggunjawabLabel">Tambah User WWTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form>
                        <table class="table">
                            <tr>
                                <td colspan="3">
                                    <h3>Akun Pengguna</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="pendaftaran-type m-4">
                                        <button class="btn btn-primary mt-3 " id="btn-pendaftaran-baru" type="button">Pendaftaran Baru</button>
                                        <button class="btn btn-warning mt-3" id="btn-pendaftaran-sebelumnya" type="button">Pendaftaran Sebelumnya</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <table class="table hidden" id="pendaftaran-baru">
                            <form method="POST" id="form-add-user">
                            <tr>
                                <td style="width:30px"><label for="nama_pengguna" class="text-left">Nama Pengguna </label></td>
                                <td><input type="text" class="form-control" placeholder="Nama Pengguna" id="nama_pengguna" name="nama_pengguna" required></td>
                            </tr>

                            <tr>
                                <td style="width:30px"><label for="jabatan" class="text-left">Jabatan</label></td>
                                <td><input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan" required></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="username" class="text-left">Username</label></td>
                                <td><input type="text" class="form-control" placeholder="Username" id="username" name="username" required></td>
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
                                <td style="width:30px"><label for="password" class="text-left">Kata Sandi</label></td>
                                <td><input type="password" class="form-control" placeholder="Kata Sandi" id="password" name="password" required></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="confirmpassword" class="text-left">Konfirmasi Kata Sandi</label></td>
                                <td><input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" id="confirmpassword" name="confirmpassword" required></td>
                            </tr>
                            <tr>
                                <td><button class="btn btn-primary" type="submit" id="btn-adduser">Tambah</button></td>
                            </tr>
                            </form>
                        </table>
                        <table class="table hidden" id="pendaftaran-sebelumnya">
                            <tr>
                                <td style="width:30px"><label for="nama_pengguna" class="text-left">Nama Pengguna </label></td>
                                <td>
                                    <select name="nama_pengguna" class="form-control">
                                        <option value="">Piih User</option>
                                        <?php
                                        foreach ($users as $row) {
                                        ?>
                                            <option value="<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" data-nama="<?= $row['name']; ?>" data-email="<?= $row['email']; ?>"><?= $row['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td><button class="btn btn-primary btn-add-users" type="button">Tambah</button></td>
                            </tr>
                        </table>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- MODAL PARAMETER WWTP -->
<div class="modal fade" id="tambah_parameterWWTP" tabindex="-1" role="dialog" aria-labelledby="tambah_parameterWWTPLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_parameterWWTPLabel">Tambah Parameter Pelaporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Parameter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($parameters as $row) {
                                ?>
                                    <tr>
                                        <td><?= $row['parameterID']; ?></td>
                                        <td><?= $row['parameter']; ?></td>
                                        <td class="BMBAP"><input type="checkbox" value="<?= $row['parameterID']; ?>" data-id="<?= $row['parameterID']; ?>" class="check-parameter" data-name="<?= $row['parameter']; ?>"></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <button type="button" id="add-parameter" class="btn btn-primary float-right">Tambah </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- MODAL BMAL WWTP -->
<div class="modal fade" id="tambah_bmal" tabindex="-1" role="dialog" aria-labelledby="tambah_bmalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_bmalLabel">Tambah Parameter Pelaporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Parameter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($parameters as $row) {
                                ?>
                                    <tr>
                                        <td><?= $row['parameterID']; ?></td>
                                        <td><?= $row['parameter']; ?></td>
                                        <td class="BMAL"><input type="checkbox" value="<?= $row['parameterID']; ?>" data-id="<?= $row['parameterID']; ?>" class="check-BMAL" data-name="<?= $row['parameter']; ?>"></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <button type="button" id="add-BMAL" class="btn btn-primary float-right">Tambah </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- MODAL SURAT IJIN -->
<div class="modal fade" id="tambahsuratIjinModal" tabindex="-1" role="dialog" aria-labelledby="tambahsuratIjinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahsuratIjinLabel">Tambah Surat Ijin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <table class="table">
                        <tr>
                            <td colspan="3">
                                <h3>Surat Ijin</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="pendaftaran-type m-4">
                                    <button class="btn btn-primary mt-3 " id="btn-pendaftaran-surat-ijin-baru" type="button">Surat Ijin Baru</button>
                                    <button class="btn btn-warning mt-3" id="btn-pendaftaran-surat-ijin-sebelumnya" type="button">Surat Ijin Sebelumnya</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <form id="form-add-surat-ijin" action="<?= base_url("admin/add_surat"); ?>" method="post" enctype="multipart/form-data">
                        <table class="table hidden" id="pendaftaran-surat-ijin-baru">
                            <tbody id="target-surat-ijin">
                                <tr>
                                    <td>
                                        <label for="jenis_surat">Jenis Surat</label>
                                    </td>
                                    <td>
                                        <select class="form-control" name="add_jenis_surat" id="add_jenis_surat">
                                            <option value="">Pilih Jenis Surat</option>
                                            <?php
                                            foreach ($ijin as $row) {
                                            ?>
                                                <option value="<?= $row["typeLetterID"]; ?>"><?= $row["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="add_no_ijin" class="text-left">No Ijin </label></td>
                                    <td><input type="text" class="form-control" placeholder="No Ijin" name="add_no_ijin"></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="add_tgl_ijin" class="text-left">Tanggal Ijin </label></td>
                                    <td><input type="text" class="form-control datepicker1" placeholder="Tanggal Ijin" name="add_tgl_ijin"></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="add_instansi" class="text-left">Instansi yang mengeluarkan </label></td>
                                    <td><input type="text" class="form-control" placeholder="Instansi yang mengeluarkan" name="add_instansi"></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="add_file" class="text-left">Lampiran </label></td>
                                    <td><input type="file" name="add_file" required></td>
                                </tr>
                                <tr>
                                    <td><button class="btn btn-primary btn-add-surat-ijin-baru" type="button">Tambah</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <table class="table hidden" id="pendaftaran-surat-ijin-sebelumnya">
                        <tr>
                            <td style="width:30px"><label for="surat_ijin_sebelumnya" class="text-left">Surat Ijin yang sudaf terdaftar </label></td>
                            <td>
                                <select name="surat_ijin_sebelumnya" class="form-control">
                                    <option value="">Piih Document</option>
                                    <?php
                                    foreach ($documents as $row) {
                                    ?>
                                        <option data-jenis_surat="<?= $row['typeLetterID']; ?>" data-id="<?= $row['supportDocumentsID']; ?>" data-no_ijin="<?= $row['no_ijin']; ?>" data-tgl_ijin="<?= date("d M Y", strtotime($row['tgl_ijin'])); ?>" data-instansi="<?= $row['instansi']; ?>"><?= $row['typeLetterID'] . " - " . $row['no_ijin']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>

                        </tr>
                        <tr>
                            <td><button id="add-surat-ijin" class="btn btn-primary" type="button">Tambah</button></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- MODAL TAMBAH SURAT SPA-->
<div class="modal fade" id="tambahsuratSpaModal" tabindex="-1" role="dialog" aria-labelledby="tambahsuratSpaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahsuratSpaModalLabel">Tambah Surat Pengambilan Air</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="jenis_surat">Jenis Surat</label>
                        <select class="form-control" name="jenis_surat_spa" id="jenis_surat" required>
                            <option value="">Pilih Jenis Surat</option>
                            <?php
                            foreach ($spa as $row) {
                            ?>
                                <option value="<?= $row["typeLetterID"]; ?>"><?= $row["name"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button id="add-surat-spa" type="button" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL TAMBAH SURAT PENDUKUNG-->
<div class="modal fade" id="tambahsuratModal" tabindex="-1" role="dialog" aria-labelledby="tambahsuratModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahsuratModalLabel">Tambah Surat Pendukung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="jenis_surat">Jenis Surat</label>
                        <select class="form-control" name="jenis_surat_pendukung" id="jenis_surat_pendukung" required>
                            <option value="">Pilih Jenis Surat</option>
                            <?php
                            foreach ($pendukung as $row) {
                            ?>
                                <option value="<?= $row["typeLetterID"]; ?>"><?= $row["name"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button id="add-surat-pendukung" type="button" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL TAMBAH SURAT -->
<script>
    $(document).ready(function() {
        $("input, select, textarea").attr("autocomplete", "off");
    });

    $("#btn-pendaftaran-baru").on('click', function() {
        $("#pendaftaran-sebelumnya").addClass('hidden');
        $("#pendaftaran-baru").toggleClass("hidden")
    })
    $("#btn-pendaftaran-sebelumnya").on('click', function() {
        $("#pendaftaran-baru").addClass('hidden');
        $("#pendaftaran-sebelumnya").toggleClass("hidden")
    })
    $("#btn-pendaftaran-surat-ijin-baru").on('click', function() {
        $("#pendaftaran-surat-ijin-sebelumnya").addClass('hidden');
        $("#pendaftaran-surat-ijin-baru").toggleClass("hidden");
    })
    $("#btn-pendaftaran-surat-ijin-sebelumnya").on('click', function() {
        $("#pendaftaran-surat-ijin-baru").addClass('hidden');
        $("#pendaftaran-surat-ijin-sebelumnya").toggleClass("hidden")
    })
</script>

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

<script>
    var di_update = false;

    var session = <?= (isset($_SESSION['data'])) ? json_encode($_SESSION['data']) : "''"; ?>;

    if (session != "") {
        set_form(session);
    }

    initDatepicker();

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
                    url: "<?= base_url('admin/get_titik_penaatan') ?>",
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
                        data: "name",
                        render: $.fn.dataTable.render.text()
                    },
                    {
                        data: "address",
                        render: $.fn.dataTable.render.text()
                    },
                    {
                        data: "geolocation",
                        render: $.fn.dataTable.render.text()
                    },
                    {
                        "render": function(data, type, row, meta) {
                            return html = `<div class='badge badge-${row.badge}'>${row.status}</div>`
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            html = `<button class="btn btn-sm btn-info btn-view"  data-id="${row.siteWWTPID }" ><i class="far fa-eye"></i> Show </button> `

                            // html += `<button class="btn btn-sm btn-warning btn-edit"  data-id="${row.siteWWTPID }"><i class="far fa-edit"></i> Edit </button> `

                            // html += `<button href="" class="btn btn-sm btn-danger btn-delete"  id="btn-delete" data-id="${row.siteWWTPID}"<i class="far fa-trash-alt"></i> Deactivated</button>`

                            return html
                        }
                    },
                ]
            })

        // table.on('order.dt search.dt', function() {
        //     table.column(0, {
        //         search: 'applied',
        //         order: 'applied'
        //     }).nodes().each(function(cell, i) {
        //         cell.innerHTML = i + 1;
        //     });
        // }).draw();

        $(".dataTables_filter input")
            .off()
            .on('keyup change', function(e) {
                if (e.keyCode == 13 || this.value == "") {
                    table.search(this.value)
                        .draw();
                }
            });

    }

    // IPAL / WWTP
    $("button.btn-add-ipal").click(function() {
        $("tr#target-remove-ipal").remove();
        _ipal();
    });

    $(document).on('click', 'button.btn-nonaktif-ipal', function() {
        if ($("tbody#target-ipal tr").length > 1) {
            $(this).closest("tr").remove();
        } else {
            alert("Harus ada IPAL / WWTP yang di daftarkan!");
        }
    });

    function _ipal(nama_ipal = "", sumber_ipal = "", kapasitas_ipal = "", disabled = "", show = "block") {
        let html = `
        <tr>
        <td><input type="text" class="form-control" placeholder="Nama IPAL / WWTP" name="nama_ipal[]" value="${nama_ipal}" AutoComplete="off" required ${disabled}></td>
        <td><input type="text" class="form-control" placeholder="Sumber Air Limbah" name="sumber_ipal[]" value="${sumber_ipal}" AutoComplete="off" required ${disabled}></td>
        <td><input type="text" class="form-control" placeholder="Kapasitas IPAL / WWTP" name="kapasitas_ipal[]" value="${kapasitas_ipal}" AutoComplete="off" required ${disabled}></td>
        <td><button type="button" class="d-${show} btn badge badge-danger btn-nonaktif-ipal">X</button></td>
        </tr>
        `;

        $("tbody#target-ipal").append(html);
    }

    // Badan Jenis Air
    $("select[name=badan_jenis_air]").change(function() {
        let value = $(this).find(":selected").val();
        let lokasi = $(this).find(":selected").text();
        let kordinat = $(this).find(":selected").data("kordinat");

        $("input[name=lokasi_bap]").val(lokasi);
        $("input[name=kordinat_bap]").val(kordinat);

        if (value != "") {
            _badan_jenis_air(lokasi, kordinat);
        }
    });

    function _badan_jenis_air(lokasi, kordinat, nama_bja = "", upstream = "", downstream = "") {

        let display = (kordinat > 1) ? "" : "none";
        let html = `
        <tr>
        <td style="width:30px"><label for="nama_bja" class="text-left">Nama ${lokasi}</label></td>
        <td colspan="3">
        <input type="text" class="form-control" placeholder="Nama ${lokasi}" name="nama_bja" value="${nama_bja}" required>
        </td>
        </tr>
        <tr>
        <td style="width:30px"><label for="kordinat" class="text-left">Titik Kordinat Upstream</label></td>
        <td colspan="3">
        <input type="text" class="form-control" placeholder="Titik Kordinat" name="upstream" value="${upstream}">
        </td>
        </tr>
        <tr class="d-${display}">
        <td style="width:30px"><label for="kordinat" class="text-left">Titik Kordinat Downstream</label></td>
        <td colspan="3">
        <input type="text" class="form-control" placeholder="Titik Kordinat" name="downstream" value="${downstream}">
        </td>
        </tr>
        `;

        $("tbody.target-badan_jenis_air").html(html);
    }

    // BMBAP
    $("button#add-parameter").click(function() {
        $("tr#target-remove-BMBAP").remove();

        $('input.check-parameter:visible').each(function(i, obj) {
            if ($(this).prop('checked') == true) {
                _BMBAP('BMBAP', $(this).data("id"), $(this).data("name"));

                $(this).hide();
            }
        });

        $("#tambah_parameterWWTP").modal("hide");
    });

    $(document).on('click', 'button.btn-nonaktif-parameter', function() {
        let id = $(this).data("id");

        if ($("tbody#target-parameter tr").length > 1) {
            $('input.check-parameter[value="' + id + '"]').prop('checked', false).show();
            $(this).closest("tr").remove();
        } else {
            alert("Harus ada Parameter yang dipilih!");
        }
    });

    function _BMBAP(asal = "BMBAP", id, name, minimum = 0, maximum = 0, disabled = "", show = "block") {
        let html = `
        <tr>
        <td>
        ${name}
        <input type="hidden" name="parameter_id[]" value="${id}" ${disabled}/>
        <input type="hidden" name="parameter_name[]" value="${name}" ${disabled}/>
        <input type="hidden" name="parameter_asal[]" value="${asal}" ${disabled}/>
        </td>
        <td><input type="text" class="form-control" placeholder="Minimum" name="minimum[]" value="${minimum}" AutoComplete="off" required ${disabled}></td>
        <td><input type="text" class="form-control" placeholder="Maximum" name="maximum[]" value="${maximum}" AutoComplete="off" required ${disabled}></td>
        <td><button type="button" class="d-${show} btn badge badge-danger btn-nonaktif-parameter" data-id="${id}">X</button></td>
        </tr>
        `;

        $("tbody#target-parameter").append(html);
    }

    // BMAL
    $("button#add-BMAL").click(function() {
        $("tr#target-remove-BMAL").remove();

        $('input.check-BMAL:visible').each(function(i, obj) {
            if ($(this).prop('checked') == true) {
                _BMAL('BMAL', $(this).data("id"), $(this).data("name"));

                $(this).hide();
            }
        });

        $("#tambah_bmal").modal("hide");
    });

    $(document).on('click', 'button.btn-nonaktif-BMAL', function() {
        let id = $(this).data("id");

        if ($("tbody#target-BMAL tr").length > 1) {
            $('input.check-BMAL[value="' + id + '"]').prop('checked', false).show();
            $(this).closest("tr").remove();
        } else {
            alert("Harus ada Parameter yang dipilih!");
        }
    });

    function _BMAL(asal = "BMAL", id, name, minimum = 0, maximum = 0, disabled = "", show = "block") {
        let html = `
        <tr>
        <td>
        ${name}
        <input type="hidden" name="parameter_id[]" value="${id}" ${disabled}/>
        <input type="hidden" name="parameter_name[]" value="${name}" ${disabled}/>
        <input type="hidden" name="parameter_asal[]" value="${asal}" ${disabled}/>
        </td>
        <td><input type="text" class="form-control" placeholder="Minimum" name="minimum[]" value="${minimum}" AutoComplete="off" required ${disabled}></td>
        <td><input type="text" class="form-control" placeholder="Maximum" name="maximum[]" value="${maximum}" AutoComplete="off" required ${disabled}></td>
        <td><button type="button" class="d-${show} btn badge badge-danger btn-nonaktif-BMAL" data-id="${id}">X</button></td>
        </tr>
        `;

        $("tbody#target-BMAL").append(html);
    }

    // Penanggung Jawab

    // ADD NEW USER
    $("button#btn-adduser").click(function(e){
        let nama_pengguna = $("#nama_pengguna").val()
        let jabatan = $("#jabatan").val()
        let email = $("#email").val()
        let username = $("#username").val()
        let no_tlpn = $("#no_tlpn").val()
        let password = $("#password").val()
        let confirmpassword = $("#confirmpassword").val()

         $.ajax({
             url:`<?= base_url('admin/add_new_userSite')?>`,
             method:"POST",
             data:{nama_pengguna: nama_pengguna,jabatan: jabatan,email: email,username: username,no_tlpn: no_tlpn,password: password,confirmpassword: confirmpassword},
             success:function(msg){
                 msg = JSON.parse(msg)
                 if(msg.status == 500) {
                     alert(JSON.stringify(msg.msg))
                 }
                 else {
                     console.log(msg.data.id)
                     console.log(msg.data.name)
                    let html = `<option value="${msg.data.id}" data-id="${msg.data.id}" data-nama="${msg.data.name}" data-email="${msg.data.email}">${msg.data.name}</option>`
                    $('select[name=nama_pengguna]').append(html)
                    alert('sukses')
                 }
             }
         })
        e.preventDefault()
    })
    // OLD USER
    $("button.btn-add-users").click(function() {
        let value = $('select[name=nama_pengguna]').find(":selected");
        let id = value.data('id');
        let email = value.data('email');
        let nama = value.data('nama');

        // Hide value yg sudah dipilih
        value.hide();
        $('select[name=nama_pengguna]').val("");

        // Remove Warning Pilih User
        $("tr#target-remove-user").remove();

        _penanggung_jawab(id, nama, email);

        $("#tambah_penanggunjawab").modal("hide");
    });

    $(document).on('click', 'button.btn-nonaktif-users', function() {
        let id = $(this).data("id");

        if ($("tbody#target-users tr").length > 1) {
            $('select[name=nama_pengguna] option[value="' + id + '"]').show();
            $(this).closest("tr").remove();
        } else {
            alert("Harus ada Penanggung Jawab yang dipilih!");
        }
    });

    function _penanggung_jawab(id, nama, email, disabled = "", show = "block") {
        let html = `
        <tr>
        <td>${nama} <input type="hidden" name="penanggung_jawab[]" value="${id}" />
        <input type="hidden" name="nama_penanggung_jawab[]" value="${nama}" ${disabled}/>
        <input type="hidden" name="email_penanggung_jawab[]" value="${email}" ${disabled}/>
        </td>
        <td>${email}</td>
        <td><span class="badge badge-success">Aktif</span></td>
        <td><button type="button" data-id="${id}" class="d-${show} btn badge badge-danger btn-nonaktif-users">X</button></td>
        </tr>
        `;

        $("tbody#target-users").append(html);
    }

    // Surat Ijin
    $("button#add-surat-ijin").click(function() {
        let input = $('select[name=surat_ijin_sebelumnya]').find(":selected");
        let jenis_surat = input.data("jenis_surat");
        let id = input.data("id");
        let no_ijin = input.data("no_ijin");
        let tgl_ijin = input.data("tgl_ijin");
        let instansi = input.data("instansi");

        // Remove Warning Surat
        $("tr#target-remove-surat-ijin").remove();

        _surat_ijin("ijin", jenis_surat, id, no_ijin, tgl_ijin, instansi, "readonly");

        initDatepicker();
        $("#tambahsuratIjinModal").modal("hide");
    });

    $(document).on('click', 'button.btn-nonaktif-surat-ijin', function() {
        let tbody = $(this).closest("tbody");

        if (tbody.find("tr").length > 1) {
            $(this).closest("tr").remove();
        } else {
            alert("Harus ada Surat Ijin!");
        }
    });

    function _surat_ijin(asal_surat, jenis_surat, id = "", no_ijin = "", tgl_ijin = "", instansi = "", disabled = "", show = "block") {
        let html = `
        <tr>
        <td><input type="hidden" name="id[]" value="${id}" ${disabled}/>
        <input type="hidden" name="asal_surat[]" value="${asal_surat}" required ${disabled} />
        <input type="text" name="jenis_surat[]" value="${jenis_surat}" class="form-control input-min-width" AutoComplete="off" required ${disabled} />
        </td>
        <td><input type="text" name="no_ijin[]" value="${no_ijin}" class="form-control input-min-width" AutoComplete="off" required ${disabled} /></td> 
        <td><input type="text" name="tgl_ijin[]" value="${tgl_ijin}" class="form-control datepicker1 input-min-width" AutoComplete="off" required ${disabled} /></td> 
        <td><input type="text" name="instansi[]" value="${instansi}" class="form-control input-min-width" AutoComplete="off" required ${disabled} /></td>
        <td><input type="file" name="file[]" class="form-control-file input-min-width" ${disabled}/></td> 
        <td><span class="badge badge-danger">Menunggu Validasi</span> </td>
        <td><button type="button" class="d-${show} btn badge badge-danger btn-nonaktif-surat-ijin">X</button></td>
        </tr>
        `;

        $("tbody#target-surat-ijin").append(html);
    }

    // Surat Pendukung
    $("button#add-surat-pendukung").click(function() {
        let jenis_surat = $('select[name=jenis_surat_pendukung]').find(":selected").val();

        // Remove Warning Surat
        $("tr#target-remove-surat-pendukung").remove();

        _surat("pendukung", jenis_surat);

        initDatepicker();
        $("#tambahsuratModal").modal("hide");
    });

    $(document).on('click', 'button.btn-nonaktif-surat', function() {
        let tbody = $(this).closest("tbody");

        if (tbody.find("tr").length > 1) {
            $(this).closest("tr").remove();
        } else {
            alert("Data surat tidak boleh kosong!");
        }
    });

    function _surat(asal_surat, jenis_surat, id = "", no_ijin = "", tgl_ijin = "", instansi = "", disabled = "", show = "block") {
        let html = `
        <tr>
        <td><input type="hidden" name="id[]" value="${id}" ${disabled}/>
        <input type="hidden" name="asal_surat[]" value="${asal_surat}" required ${disabled} />
        <input type="text" name="jenis_surat[]" value="${jenis_surat}" class="form-control input-min-width" AutoComplete="off" required ${disabled} />
        </td>
        <td><input type="text" name="no_ijin[]" value="${no_ijin}" class="form-control input-min-width" AutoComplete="off" required ${disabled} /></td> 
        <td><input type="text" name="tgl_ijin[]" value="${tgl_ijin}" class="form-control datepicker1 input-min-width" AutoComplete="off" required ${disabled} /></td> 
        <td><input type="text" name="instansi[]" value="${instansi}" class="form-control input-min-width" AutoComplete="off" required ${disabled} /></td>
        <td><input type="file" name="file[]" class="form-control-file input-min-width" ${disabled}/></td> 
        <td><span class="badge badge-danger">Menunggu Validasi</span> </td>
        <td><button type="button" class="d-${show} btn badge badge-danger btn-nonaktif-surat">X</button></td>
        </tr>
        `;

        $("tbody#target-surat-pendukung").append(html);
    }

    // Surat SPA
    $("button#add-surat-spa").click(function() {
        let jenis_surat = $('select[name=jenis_surat_spa]').find(":selected").val();

        // Remove Warning Surat
        $("tr#target-remove-surat-spa").remove();

        _surat_spa('spa', jenis_surat);

        initDatepicker();
        $("#tambahsuratSpaModal").modal("hide");
    });

    $(document).on('click', 'button.btn-nonaktif-surat-spa', function() {
        let tbody = $(this).closest("tbody");

        if (tbody.find("tr").length > 1) {
            $(this).closest("tr").remove();
        } else {
            alert("Data surat tidak boleh kosong!");
        }
    });

    function _surat_spa(asal_surat, jenis_surat, id = "", no_ijin = "", tgl_ijin = "", instansi = "", kordinat_spa = "", debit_spa = "", disabled = "", show = "block") {
        let html = `
        <tr>
        <td><input type="hidden" name="id[]" value="${id}" ${disabled}/>
        <input type="text" name="jenis_surat[]" value="${jenis_surat}" class="form-control input-min-width" AutoComplete="off" required ${disabled} />
        <input type="hidden" name="asal_surat[]" value="${asal_surat}" required ${disabled} />
        </td>
        <td><input type="text" name="no_ijin[]" value="${no_ijin}" class="form-control input-min-width" AutoComplete="off" required ${disabled} /></td> 
        <td><input type="text" name="tgl_ijin[]" value="${tgl_ijin}" class="form-control datepicker1 input-min-width" AutoComplete="off" required ${disabled} /></td> 
        <td><input type="text" name="instansi[]" value="${instansi}" class="form-control input-min-width" AutoComplete="off" required ${disabled} /></td>
        <td><input type="text" name="kordinat_spa[]" value="${kordinat_spa}" class="form-control input-min-width" AutoComplete="off" required ${disabled} /></td>
        <td><input type="text" name="debit_spa[]" value="${debit_spa}" class="form-control input-min-width" AutoComplete="off" required ${disabled} /></td>
        <td><input type="file" name="file[]" class="form-control-file input-min-width" ${disabled}/></td> 
        <td><span class="badge badge-danger">Menunggu Validasi</span> </td>
        <td><button type="button" class="d-${show} btn badge badge-danger btn-nonaktif-surat-spa">X</button></td>
        </tr>
        `;

        $("tbody#target-surat-spa").append(html);
    }

    // Tambah Surat Ijin Baru
    $("button.btn-add-surat-ijin-baru").click(function(e) {

        $.ajax({
            url: "<?= base_url("admin/add_surat") ?>",
            type: "POST",
            dataType: "json",
            data: {
                "typeLetterID": $("select[name=add_jenis_surat]").find(":selected").val(),
                'no_ijin': $("input[name=add_no_ijin]").val(),
                'tgl_ijin': $("input[name=add_tgl_ijin]").val(),
                'instansi': $("input[name=add_instansi]").val(),
                'file': $("input[name=add_file]").val(),
                'asal_surat' : "ijin",
            },
            success: function(data) {
                alert(data.reason);
                if (data.status) {
                    let html = 
                    `<option value="${data.supportDocumentsID}" ` +
                    `data-jenis_surat="`+$("select[name=add_jenis_surat]").find(":selected").val()+`" ` + 
                    `data-no_ijin="`+$("input[name=add_no_ijin]").val()+`"` +
                    `data-id="${data.supportDocumentsID}"` +
                    `data-tgl_ijin="`+$("input[name=add_tgl_ijin]").val()+`"` +
                    `data-instansi="`+$("input[name=add_instansi]").val()+`">` +
                    `${data.typeLetterID} - ${data.no_ijin}` +
                    `</option>`;

                    $("select[name=add_jenis_surat]").val("");
                    $("input[name=add_no_ijin]").val("");
                    $("input[name=add_tgl_ijin]").val("");
                    $("input[name=add_instansi]").val("");
                    $("input[name=add_file]").val("");
                    $("select[name=surat_ijin_sebelumnya] option:first").after(html);
                }
            },

        });
    });

    // show site wwtp
    $(document).on("click", "button.btn-view", function() {
        let siteWWTPID = $(this).data("id");
        get_all_titik_penaatan(siteWWTPID, true);
        
        di_update = true;
        
        $("#modalUserWWTP button").hide();
        $("#modalUserWWTP").modal("show");
    })

    // edit site wwtp
    $(document).on("click", "button.btn-edit", function() {
        let siteWWTPID = $(this).data("id");

        get_all_titik_penaatan(siteWWTPID);

        $("#action-wwtp").removeClass("btn-primary");
        $("#action-wwtp").text("Update WWTP").addClass("btn-warning");

        di_update = true;

        $("#pendaftaran-wwtp").attr('action', "<?= base_url("admin/edit_titik_penaatan"); ?>");

        $("#modalUserWWTP button").show();
        $("#modalUserWWTP").modal("show");
    })

    // add site wwtp
    $("button.btn-add").click(function() {
        let html = '';

        $('select[name=nama_pengguna] option').show();
        $('input.check-parameter').show();
        $('#pendaftaran-wwtp')[0].reset();
        $("#modalUserWWTP input").prop("readonly", false);
        $("#modalUserWWTP select").prop("disabled", false);
        $("#modalUserWWTP textarea").prop("readonly", false);
        $("#modalUserWWTP button").show();
        $("#action-wwtp").removeClass("btn-warning");
        $("#action-wwtp").text("Tambah WWTP").addClass("btn-primary");

        if (di_update) {

            html = `<tr id="target-remove-surat-ijin">
                                        <td colspan="9" class="text-center text-danger">Tambahkan Dokumen Ijin!</td>
                                    </tr>`;
            $("tbody#target-surat-ijin").empty();
            $("tbody#target-surat-ijin").html(html);

            $("tbody.target-badan_jenis_air tr").empty();

            html = `<tr id="target-remove-ipal">
                                        <td colspan="4" class="text-center text-danger">Tambahkan Data IPAL / WWTP!</td>
                                    </tr>`;
            $("tbody#target-ipal").empty();
            $("tbody#target-ipal").html(html);

            html = `<tr id="target-remove-BMBAP">
                                        <td colspan="4" class="text-center text-danger">Pilih Parameter yang akan digunakan!</td>
                                    </tr>`;
            $("tbody#target-parameter").empty();
            $("tbody#target-parameter").html(html);

            html = ` <tr id="target-remove-BMAL">
                                        <td colspan="4" class="text-center text-danger">Pilih Parameter yang akan digunakan!</td>
                                    </tr>`;
            $("tbody#target-BMAL").empty();
            $("tbody#target-BMAL").html(html);

            html = `<tr id="target-remove-user">
                                        <td colspan="4" class="text-center text-danger">Pilih Penanggung Jawab WWTP!</td>
                                    </tr>`;
            $("tbody#target-users").empty();
            $("tbody#target-users").append(html);

            html = `<tr id="target-remove-surat-spa">
                                        <td colspan="9" class="text-center text-danger">Tambahkan Dokumen Sumber Pengambilan Air!</td>
                                    </tr>`;
            $("tbody#target-surat-spa").empty();
            $("tbody#target-surat-spa").append(html);

            html = `<tr id="target-remove-surat-pendukung">
                                        <td colspan="9" class="text-center text-danger">Tambahkan Dokumen Pendukung!</td>
                                    </tr>`;
            $("tbody#target-surat-pendukung").empty();
            $("tbody#target-surat-pendukung").append(html);

            di_update = false;
        }

        $("#pendaftaran-wwtp").attr('action', "<?= base_url("admin/add_titik_penaatan"); ?>");

        $("#modalUserWWTP").modal("show");
    });

    // get titik penataan
    function get_all_titik_penaatan(siteWWTPID, stt = false) {
        let html = "";
        $.ajax({
            url: "<?= base_url("admin/get_all_titik_penaatan") ?>",
            type: "POST",
            dataType: "json",
            data: {
                "siteWWTPID": siteWWTPID,
            },
            success: function(data) {
                console.log(data);
                set_form(data);

                $("#modalUserWWTP input").prop("readonly", stt);
                $("#modalUserWWTP select").prop("disabled", stt);
                $("#modalUserWWTP textarea").prop("readonly", stt);
            },

        });
    };

    //function parse date JS
    function parse_date(date) {
        var monthNames = [
            "Jan", "Feb", "Mar",
            "Apr", "May", "Jun", "Jul",
            "August", "Sept", "Oct",
            "Nov", "Dec"
        ];
        var d = new Date(date);
        var day = d.getDate();
        var monthIndex = d.getMonth();
        var year = d.getFullYear();

        return day + ' ' + monthNames[monthIndex] + ' ' + year;
    };

    // set form
    function set_form(session) {
        $("input[name=name]").val(session['site_wwtp']['name']);
        $("textarea[name=address]").val(session['site_wwtp']['address']);
        $("select[name=typeReportID]").val(session['site_wwtp']['typeReportID']);
        $("input[name=debit]").val(session['site_wwtp']['debit']);
        $("input.latitude_outfall").val(session['site_wwtp']['latitude_outfall']);
        $("input.latitude_outlet").val(session['site_wwtp']['latitude_outlet']);
        $("input.longitude_outfall").val(session['site_wwtp']['longitude_outfall']);
        $("input.longitude_outlet").val(session['site_wwtp']['longitude_outlet']);

        let i = 0;
        //IPAL
        if (session['ipal'].length > 0) {
            $("tr#target-remove-ipal").remove();
            for (i = 0; i < session['ipal'].length; i++) {
                _ipal(session['ipal'][i]['nama_ipal'], session['ipal'][i]['sumber_ipal'], session['ipal'][i]['kapasitas_ipal']);
            }
        }

        //PENANGGUNG JAWAB
        if (session['penanggung_jawab'].length > 0) {
            $("tr#target-remove-user").remove();
            for (i = 0; i < session['penanggung_jawab'].length; i++) {
                _penanggung_jawab(session['penanggung_jawab'][i]['usersID'], session['penanggung_jawab'][i]['name'], session['penanggung_jawab'][i]['email']);
            }
        }

        // SURAT - SURAT
        if (session['surat_pendukung'].length > 0) {
            for (i = 0; i < session['surat_pendukung'].length; i++) {
                if (session['surat_pendukung'][i]['asal_surat'] == "ijin") {
                    _surat_ijin(session['surat_pendukung'][i]['asal_surat'], session['surat_pendukung'][i]['typeLetterID'], session['surat_pendukung'][i]['supportDocumentsID'], session['surat_pendukung'][i]['no_ijin'], session['surat_pendukung'][i]['tgl_ijin'], session['surat_pendukung'][i]['instansi'], "readonly", "block");
                } else if (session['surat_pendukung'][i]['asal_surat'] == "spa") {
                    _surat_spa(session['surat_pendukung'][i]['asal_surat'], session['surat_pendukung'][i]['typeLetterID'], session['surat_pendukung'][i]['supportDocumentsID'], session['surat_pendukung'][i]['no_ijin'], session['surat_pendukung'][i]['tgl_ijin'], session['surat_pendukung'][i]['instansi'], "", "", "", "block");
                } else {
                    _surat(session['surat_pendukung'][i]['asal_surat'], session['surat_pendukung'][i]['typeLetterID'], session['surat_pendukung'][i]['supportDocumentsID'], session['surat_pendukung'][i]['no_ijin'], session['surat_pendukung'][i]['tgl_ijin'], session['surat_pendukung'][i]['instansi'], "", "block");
                }

                $("#target-remove-surat-" + session['surat_pendukung'][i]['asal_surat']).remove();
            }
        }

        //BAP
        if (session['bap']) {
            for (i = 0; i < session['bap'].length; i++) {
                $("input[name=lokasi_bap]").val(session['bap'][i]['lokasi_bap']);
                $("input[name=kordinat_bap]").val(session['bap'][i]['kordinat_bap']);
                $("select[name=badan_jenis_air]").val(session['bap'][i]['badan_jenis_air']);
                _badan_jenis_air(session['bap'][i]['lokasi_bap'], session['bap'][i]['kordinat_bap'], session['bap'][i]['nama_bja'], session['bap'][i]['upstream'], session['bap'][i]['downstream']);
            }
        }

        //SPA DETAIL
        if (session['spa_detail'].length > 0) {
            for (i = 0; i < session['spa_detail'].length; i++) {
                $("tbody#target-surat-spa tr:eq(" + i + ")").find("td:eq(4) input").val(session['spa_detail'][i]['kordinat_spa']);
                $("tbody#target-surat-spa tr:eq(" + i + ")").find("td:eq(5) input").val(session['spa_detail'][i]['debit_spa']);
            }
        }

        //PARAMETER
        if (session['logger_detail'].length > 0) {
            for (i = 0; i < session['logger_detail'].length; i++) {
                if (session['logger_detail'][i]['parameter_asal'] == "BMBAP") {
                    _BMBAP(session['logger_detail'][i]['parameter_asal'], session['logger_detail'][i]['parameterID'], session['logger_detail'][i]['parameter'], session['logger_detail'][i]['min'], session['logger_detail'][i]['max']);
                } else {
                    _BMAL(session['logger_detail'][i]['parameter_asal'], session['logger_detail'][i]['parameterID'], session['logger_detail'][i]['parameter'], session['logger_detail'][i]['min'], session['logger_detail'][i]['max']);
                }

                $("tr#target-remove-" + session['logger_detail'][i]['parameter_asal']).remove();
                $("td." + session['logger_detail'][i]['parameter_asal']).find('input[data-id="' + session['logger_detail'][i]['parameterID'] + '"]').hide();
            }
        }
    }
    // Datepicker
    function initDatepicker() {
        $('.datepicker1').datepicker({
            format: 'dd M yyyy',
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
        }).on('changeDate', function(e) {
            $(this).datepicker('hide');
        });;
    }

    // DATERANGE PICKER CONTROL
    $(function() {


        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('.reportrange span').html(start.format('DD/MM/YYYY h:mm') + ' - ' + end.format('DD/MM/YYYY h:mm'));
            $(".reportrange #start_date").val(start.format('DD/MM/YYYY h:mm'))
            $(".reportrange #end_date").val(end.format('DD/MM/YYYY h:mm'))
        }

        $('.reportrange').daterangepicker({
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
        $(".btn-nonaktif").on('click', function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Apakah anda ingin menonaktifkan?',
                text: "Jika ya, mohon menunggu sebentar...",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        'Non aktif',
                        'Data berhasil di non aktifkan user ini...',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Non Aktif',
                        'Anda telah membatalkan non aktifkan user ini...',
                        'success'
                    )
                }
            })
        })
    })
</script>