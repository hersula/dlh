<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Dinas Lingkungan Hidup Kabupaten Bekasi</title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('') ?>/assets/icon/icon_dlh.png" type="image/png">
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
       
    </style>
</head>

<body>
    <?= view('App\Views\auth\_navbar'); ?>
    <!-- Main content -->
    <div id="mapid"></div>
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

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL-imf29QugRQMnO6PHnrF5xmQsWhFSp8&callback=initMap"></script>

    <script>
        function initMap() {
            let greenIcon = {
                url:"http://maps.google.com/mapfiles/ms/icons/green-dot.png",
                scaledSize: new google.maps.Size(40, 40), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            let options = {
                zoom: 12,
                center: {
                    lat: -6.251142,
                    lng: 466.993103
                },
                gestureHandling: "greedy",
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            }

            let map = new google.maps.Map(document.getElementById('mapid'), options);
            let prev_infowindow = false;

            addMarker({
                kordinat: {
                    lat: -6.207456,
                    lng: 466.995335
                },
                iconImage: greenIcon,
                content: `<div id="content"><div id="siteNotice"></div><h3 id="firstHeading" class="firstHeading">PT Meares Soputan Mining</h3><div id="bodyContent"><p><b>Alamat : </b> oka Tindung Project Site</p> <p><b>Status : </b>Terkoneksi</p><p><b>Parameter : </b>pH,COD,TSS,Debit</p></div></div>`
            });
            addMarker({
                kordinat: {
                    lat: -6.232541,
                    lng: 467.018681
                },
                iconImage: greenIcon,
                content: `<div id="content"><div id="siteNotice"></div><h3 id="firstHeading" class="firstHeading">PT Meares Soputan Mining</h3><div id="bodyContent"><p><b>Alamat : </b> oka Tindung Project Site</p> <p><b>Status : </b>Terkoneksi</p><p><b>Parameter : </b>pH,COD,TSS,Debit</p></div></div>`
            });
            addMarker({
                kordinat: {
                    lat: -6.243804,
                    lng: 466.934566
                },
                iconImage: greenIcon,
                content: `<div id="content"><div id="siteNotice"></div><h3 id="firstHeading" class="firstHeading">PT Meares Soputan Mining</h3><div id="bodyContent"><p><b>Alamat : </b> oka Tindung Project Site</p> <p><b>Status : </b>Terkoneksi</p><p><b>Parameter : </b>pH,COD,TSS,Debit</p></div></div>`
            });

            function addMarker(props) {
                let marker = new google.maps.Marker({
                    position: props.kordinat,
                    map: map,
                    icon: props.iconImage
                })

                if (props.content) {
                    let infoWindow = new google.maps.InfoWindow({
                        content: props.content
                    });
                    marker.addListener('click', function() {
                        // infoWindow.open(map,marker)
                        if (prev_infowindow) {
                            prev_infowindow.close()
                        }
                        prev_infowindow = infoWindow;
                        infoWindow.open(map, marker)
                    })
                }
            }
        }
    </script>
</body>

</html>