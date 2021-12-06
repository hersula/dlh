
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

</head>

<body>
    <?= view('App\Views\auth\_navbar');?>
    <!-- Main content -->
    <div class="content">
        <div class="container">
        <div class="card">
            <div class="card-title m-4 ">
                <h1>Pendaftaran</h1>
            </div>
            <div class="pendaftaran-type m-4">
                <button class="btn btn-primary mt-3 " id="btn-pendaftaran-baru">Pendaftaran Baru</button>
                <!-- <button class="btn btn-warning mt-3" id="btn-pendaftaran-sebelumnya">Pendaftaran WWTP</button> -->
            </div>
            
            <div class="card-body hidden" id="pendaftaran-baru">
                <div class="subtitle-pendaftaran">
                    <h4>INFORMASI PERUSAHAAN</h4>
                </div>
                <div class="message-register">
                <?= view('Myth\Auth\Views\_message_block') ?>
                </div>
                <div class="content">
                    <form method="POST" action="<?= base_url('register')?>" >
                    <?= csrf_field() ?>
                        <table class="table">
                            <tr>
                                <td style="width:30px"><label for="nama_perusahaan" class="text-left" >Nama Perusahaan </label></td>
                                <td><input type="text" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" name="company_name" value="<?= old('company_name')?>" required></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="alamat_perusahaan" class="text-left" >Alamat Perusahaan </label></td>
                                <td><input type="text" class="form-control" placeholder="Alamat Perusahaan" id="alamat_perusahaan" name="company_address"value="<?= old('company_address')?>" required></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="email_perusahaan" class="text-left" >Email Perusahaan </label></td>
                                <td><input type="text" class="form-control" placeholder="Email Perusahaan" id="email_perusahaan" name="company_email" value="<?= old('company_email')?>" required></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="provinsi" class="text-left" >Provinsi </label></td>
                                <td>
                                    <select class="form-control w-100" name="provinces_id" id="provinsi" >
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach($provinsi as $row):?>
                                            <?php if($row['id'] == 32):?>
                                                <option value="<?= $row['id'] ?>" selected><?= $row['name']?></option>
                                            <?php endif?>
                                            
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="kabkot" class="text-left" >Kabkot </label></td>
                                <td>
                                    <select class="form-control w-100" name="regencies_id" id="kabkot">
                                        <option value="">Pilih Kabkot</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="kecamatan" class="text-left" >Kecamatan </label></td>
                                <td>
                                    <select class="form-control w-100" name="districts_id" id="kecamatan">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="desa" class="text-left" >Desa </label></td>
                                <td>
                                    <select class="form-control w-100" name="villages_id" id="desa">
                                        <option value="">Pilih Desa</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="kodePos" class="text-left" >Kode Pos </label></td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Kode Pos" name="post_code" id="kodePos" value="<?= old('post_code')?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="noTlpn" class="text-left" >No Telepon</label></td>
                                <td>
                                    <input type="text" class="form-control" placeholder="No Telepon" name="company_phone" id="noTlpn" value="<?= old('company_phone')?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="jenisIndustri" class="text-left" >Jenis Industri</label></td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Jenis Industri" name="type_industry" id="jenisIndustri" value="<?= old('type_industry')?>">
                                </td>
                            </tr>
                            <!-- <tr>
                                <td colspan="2"><button class="btn btn-primary float-right">Daftar</button></td>
                            </tr> -->
                        </table>
                        <div class="subtitle-pendaftaran">
                    <h4>INFORMASI PENGGUNA ADMIN</h4>
                </div>
                <div class="content">
                    <form method="POST" action="<?= base_url('pendaftaran/confirm_pendaftaran/1')?>" >
                        <table class="table">
                            <tr>
                                <td style="width:30px"><label for="nama_pengguna" class="text-left" >Nama Pengguna </label></td>
                                <td><input type="text" class="form-control" placeholder="Nama Pengguna" id="nama_pengguna" name="name" value="<?= old('name')?>" required ></td>
                            </tr>
                           
                           
                            <tr>
                                <td style="width:30px"><label for="jabatan" class="text-left" >Jabatan</label></td>
                                <td><input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="position" value="<?= old('position')?>" required ></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="username" class="text-left" >Username </label></td>
                                <td><input type="text" class="form-control" placeholder="Username" id="username" name="user_name" value="<?= old('user_name')?>" required ></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="email" class="text-left" >Email</label></td>
                                <td><input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?= old('email')?>" required ></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="no_tlpn" class="text-left" >No Telepon</label></td>
                                <td><input type="text" class="form-control" placeholder="No Telepon" id="no_tlpn" name="phone" value="<?= old('phone')?>" required ></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="penanggung_jawab" class="text-left" >Penanggung Jawab</label></td>
                                <td><input type="checkbox" name="penanggung_jawab" id="penanggung_jawab" value="<?= old('penanggung_jawab')?>1"></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="password" class="text-left" >Kata Sandi</label></td>
                                <td><input type="password" class="form-control" placeholder="Kata Sandi" id="password" name="password"  required ></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="pass_confirm" class="text-left" >Konfirmasi Kata Sandi</label></td>
                                <td><input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" id="pass_confirm" name="pass_confirm" required ></td>
                            </tr>
                            <tr>
                                <td colspan="2"><button class="btn btn-primary float-right" type="submit">Daftar</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
                    </form>
                </div>
            </div>
            <div class="card-body hidden" id="pendaftaran-sebelumnya">
                <div class="subtitle-pendaftaran">
                    <h4>Login Admin Perusahaan</h4>
                </div>
                <div class="content">
                    <form method="POST" action="<?= base_url('pendaftaran/login_adminwwtp')?>" >
                        <table class="table">
                            <tr>
                                <td style="width:30px"><label for="email" class="text-left" >Email</label></td>
                                <td><input type="text" class="form-control" placeholder="Email" id="email" name="email" required></td>
                            </tr>
                            <tr>
                                <td style="width:30px"><label for="password" class="text-left" >Password</label></td>
                                <td><input type="password" class="form-control" placeholder="Password" id="password" name="password" required></td>
                            </tr>
                            <tr>
                                <td colspan="2"><button class="btn btn-primary float-right">Login</button></td>
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
    <script>
        $("#btn-pendaftaran-baru").on('click',function(){
            $("#pendaftaran-sebelumnya").addClass('hidden');
            $("#pendaftaran-baru").toggleClass("hidden")
        })
        $("#btn-pendaftaran-sebelumnya").on('click',function(){
            $("#pendaftaran-baru").addClass('hidden');
            $("#pendaftaran-sebelumnya").toggleClass("hidden")
        })
    </script>
    <script>
        let provinsiID = $("#provinsi").val();
        let html;
        $.get( `<?= base_url('wilayah/kabkot_findById')?>/${provinsiID}`, function( data )
        {
            data = JSON.parse(data);
            $.each( data, function( key, value ) {
                if(value.id == 3216){
                    html += `<option value="${value.id}" selected>${value.name}</option>`
                }
            });
            $("#kabkot").html(html)
        });

        htmls = `<option value="">Pilih Kecamatan</option>`;
                resetOption($("#kecamatan"))
                resetOption($("#desa"))
                $.get( `<?= base_url('wilayah/kecamatan_findById')?>/${3216}`, function( data )
                {
                    data = JSON.parse(data);
                    $.each( data, function( key, value ) {
                        htmls += `<option value="${value.id}">${value.name}</option>`
                    });
                    $("#kecamatan").html(htmls)
                });

        $("#provinsi").on('change',function(){
            let provinsiID = $(this).val();
            let html;
            if(provinsiID==""){
                html = `<option value="">Pilih Kabkot</option>`;
            }
            else {
                html = `<option value="">Pilih Kabkot</option>`;
                resetOption($("#kabkot"))
                resetOption($("#kecamatan"))
                resetOption($("#desa"))

                $.get( `<?= base_url('wilayah/kabkot_findById')?>/${provinsiID}`, function( data )
                {
                    data = JSON.parse(data);
                    $.each( data, function( key, value ) {
                        html += `<option value="${value.id}">${value.name}</option>`
                    });
                    $("#kabkot").html(html)
                });
            }

        })
        $("#kabkot").on('change',function(){
            let kabkotID = $(this).val();
            let html;
            if(kabkotID ==""){
                html = `<option value="">Pilih Kecamatan</option>`;
            }
            else
            {
                html = `<option value="">Pilih Kecamatan</option>`;
                resetOption($("#kecamatan"))
                resetOption($("#desa"))
                $.get( `<?= base_url('wilayah/kecamatan_findById')?>/${kabkotID}`, function( data )
                {
                    data = JSON.parse(data);
                    $.each( data, function( key, value ) {
                        html += `<option value="${value.id}">${value.name}</option>`
                    });
                    $("#kecamatan").html(html)
                });
            }
        })
        $("#kecamatan").on('change',function(){
            let kecamatanID = $(this).val();
            let html;
            if(kecamatanID ==""){
                html = `<option value="">Pilih Desa</option>`;
            }
            else
            {
                html = `<option value="">Pilih Desa</option>`;
                resetOption($("#desa"))
                $.get( `<?= base_url('wilayah/desa_findById')?>/${kecamatanID}`, function( data )
                {
                    data = JSON.parse(data);
                    $.each( data, function( key, value ) {
                        html += `<option value="${value.id}">${value.name}</option>`
                    });
                    $("#desa").html(html)
                });
            }
        })
        

        function resetOption(option){
            option.html(`<option value="">Pilih ${option.attr('id').replace(/^\w/, (c) => c.toUpperCase())}</option>`)
        }
    </script>

    <script>
        if($('.message-register ul:first').length > 0){
            alert("Terjadi Kesalahan")
        }
    </script>
</body>

</html>