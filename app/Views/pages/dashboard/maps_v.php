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
                         <h3 class="mb-0">Map Industri</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk melihat map industri yang terdaftar dan tervalidasi.
                         </p>
                     </div>
                     <div class="m-3" id="mapid"></div>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- LEAFET JS -->
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
 <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
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
                zoom: 11,
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