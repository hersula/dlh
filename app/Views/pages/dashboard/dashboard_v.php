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
                 <!-- Card stats -->
                 <div class="row">
                     <div class="col-xl-6 col-md-6">
                         <div class="card card-stats">
                             <!-- Card body -->
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col">
                                         <h5 class="card-title text-uppercase text-muted mb-0">Total Industri</h5>
                                         <span class="h2 font-weight-bold mb-0">350,897</span>
                                     </div>
                                     <div class="col-auto">
                                         <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                             <i class="ni ni-active-40"></i>
                                         </div>
                                     </div>
                                 </div>
                                 <p class="mt-3 mb-0 text-sm">
                                     <span class="text-primary mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                     <span class="text-nowrap">Meningkat dalam bulan terakhir</span>
                                 </p>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-6 col-md-6">
                         <div class="card card-stats">
                             <!-- Card body -->
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col">
                                         <h5 class="card-title text-uppercase text-muted mb-0">User Baru</h5>
                                         <span class="h2 font-weight-bold mb-0">2,356</span>
                                     </div>
                                     <div class="col-auto">
                                         <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                             <i class="ni ni-chart-pie-35"></i>
                                         </div>
                                     </div>
                                 </div>
                                 <p class="mt-3 mb-0 text-sm">
                                     <span class="text-primary mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                     <span class="text-nowrap">Meningkat dalam bulan terakhir</span>
                                 </p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Page content -->
     <div class="container-fluid mt--6">
         <div class="row">
             <div class="col-xl-6 col-lg-6 col-sm-12">
                 <!--* Card header *-->
                 <!--* Card body *-->
                 <!--* Card init *-->
                 <div class="card">
                     <!-- Card header -->
                     <div class="card-header">
                         <!-- Surtitle -->
                         <h6 class="surtitle">Pelaporan Semester 1</h6>
                         <!-- Title -->
                         <h5 class="h3 mb-0">Januari - Juni </h5>
                     </div>
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="chart">
                             <!-- Chart wrapper -->
                             <canvas id="mychart-pie-q1" class="chart-canvas"></canvas>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-6 col-lg-6 col-sm-12">
                 <!--* Card header *-->
                 <!--* Card body *-->
                 <!--* Card init *-->
                 <div class="card">
                     <!-- Card header -->
                     <div class="card-header">
                         <!-- Surtitle -->
                         <h6 class="surtitle">Pelaporan Semester 2</h6>
                         <!-- Title -->
                         <h5 class="h3 mb-0">Julo - Desember </h5>
                     </div>
                     <!-- Card body -->
                     <div class="card-body">
                         <div class="chart">
                             <!-- Chart wrapper -->
                             <canvas id="mychart-pie-q2" class="chart-canvas"></canvas>
                         </div>
                     </div>
                 </div>
             </div>
             
         </div>
         <div class="row">
             <div class="col-lg-6">
                 <div class="card h-100">
                     <!-- Card header -->
                     <div class="card-header">
                         <h3 class="mb-0">Log Update</h3>
                         <p class="text-sm mb-0">
                             Table ini untuk melihat aktivitas log update pada industri yang sudah terdaftar.
                         </p>
                     </div>
                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable-basic">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Industri</th>
                                     <th>User</th>
                                     <th>Log Pesan</th>
                                     <th>Tanggal</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>PT.Industri A</td>
                                     <td>Marimas Nutrisi</td>
                                     <td>Melakukan update password</td>
                                     <td>2011/04/25</td>
                                 </tr>
                                 <tr>
                                     <td>2</td>
                                     <td>PT.Industri A</td>
                                     <td>Marimas Nutrisi</td>
                                     <td>Melakukan update IPLC Dan SIPA</td>
                                     <td>2011/04/25</td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                     <div class="card-footer">
                         <!-- Surtitle -->
                         <a href="" class="float-right"><span class="text-primary">Lihat semua</span></a>
                     </div>
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="card h-100">
                     <!-- Card header -->
                     <div class="card-header">
                         <h3 class="mb-0">Peringatan Dini</h3>
                         <p class="text-sm mb-0">
                             Table ini untuk peringatan dini bagi industri yang tidak memenuhi persyartan.
                         </p>
                     </div>
                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable-earlywarning">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Industri</th>
                                     <th>Parameter</th>
                                     <th>Nilai</th>
                                     <th>Standar BML</th>
                                     <th>Log Pesan</th>
                                     <th>Tanggal</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>PT.Industri A</td>
                                     <td>Ph</td>
                                     <td>3</td>
                                     <td>0-6</td>
                                     <td>pH kurang dari ambang batas</td>
                                     <td>2011/04/25</td>
                                 </tr>
                                 <tr>
                                     <td>1</td>
                                     <td>PT.Industri A</td>
                                     <td>Debit</td>
                                     <td>30000</td>
                                     <td>0-3500</td>
                                     <td>Debit melebihi dari ambang batas</td>
                                     <td>2011/04/25</td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                     <div class="card-footer">
                         <!-- Surtitle -->
                         <a href="" class="float-right"><span class="text-primary">Lihat semua</span></a>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row mt-3">
             <div class="col-lg-12">
                 <div class="card h-100">
                     <!-- Card header -->
                     <div class="card-header">
                         <h3 class="mb-0">Pendaftaran Baru</h3>
                         <p class="text-sm mb-0">
                             Table ini untuk melihat pendaftaran baru industri yang belum tervalidasi.
                         </p>
                     </div>
                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable-pendaftaran">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Industri</th>
                                     <th>Nama Penanggung Jawab</th>
                                     <th>Email Penanggung Jawab</th>
                                     <th>Provinsi</th>
                                     <th>Kabupaten</th>
                                     <th>Kecamatan</th>
                                     <th>Desa</th>
                                     <th>Status</th>
                                     <th>Tanggal Buat</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>PT.Industri A</td>
                                     <td>Marimas Nutrisari</td>
                                     <td>marimasnutrisaris@gmail.com</td>
                                     <td>Jawa Barat</td>
                                     <td>Kabupaten Bekasi</td>
                                     <td>Cikarang Barat</td>
                                     <td>Cikedokan</td>
                                     <td>
                                         <span class="badge badge-danger mr-4">
                                             <span class="text-primary">Menunggu Validasi</span>
                                         </span>
                                     </td>
                                     <td>2011/04/25</td>
                                 </tr>
                                 <tr>
                                     <td>2</td>
                                     <td>PT.Industri B</td>
                                     <td>Bony Sudirmara</td>
                                     <td>bonysudirmara@gmail.com</td>
                                     <td>Jawa Barat</td>
                                     <td>Kabupaten Bekasi</td>
                                     <td>Cikarang Barat</td>
                                     <td>Cikedokan</td>
                                     <td>
                                         <span class="badge badge-danger mr-4">
                                             <span class="text-primary">Menunggu Validasi</span>
                                         </span>
                                     </td>
                                     <td>2011/04/25</td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                     <div class="card-footer">
                         <!-- Surtitle -->
                         <a href="" class="float-right"><span class="text-primary">Lihat semua</span></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script>
     // Charts
     //

     'use strict';

     var Charts = (function() {

         // Variable

         var $toggle = $('[data-toggle="chart"]');
         var mode = 'light'; //(themeMode) ? themeMode : 'light';
         var fonts = {
             base: 'Open Sans'
         }

         // Colors
         var colors = {
             gray: {
                 100: '#f6f9fc',
                 200: '#e9ecef',
                 300: '#dee2e6',
                 400: '#ced4da',
                 500: '#adb5bd',
                 600: '#8898aa',
                 700: '#525f7f',
                 800: '#32325d',
                 900: '#212529'
             },
             theme: {
                 'default': '#172b4d',
                 'primary': '#5e72e4',
                 'secondary': '#f4f5f7',
                 'info': '#11cdef',
                 'success': '#2dce89',
                 'danger': '#f5365c',
                 'warning': '#fb6340'
             },
             black: '#12263F',
             white: '#FFFFFF',
             transparent: 'transparent',
         };


         // Methods

         // Chart.js global options
         function chartOptions() {

             // Options
             var options = {
                 defaults: {
                     global: {
                         responsive: true,
                         maintainAspectRatio: false,
                         defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
                         defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
                         defaultFontFamily: fonts.base,
                         defaultFontSize: 13,
                         layout: {
                             padding: 0
                         },
                         legend: {
                             display: false,
                             position: 'bottom',
                             labels: {
                                 usePointStyle: true,
                                 padding: 16
                             }
                         },
                         elements: {
                             point: {
                                 radius: 0,
                                 backgroundColor: colors.theme['primary']
                             },
                             line: {
                                 tension: .4,
                                 borderWidth: 4,
                                 borderColor: colors.theme['primary'],
                                 backgroundColor: colors.transparent,
                                 borderCapStyle: 'rounded'
                             },
                             rectangle: {
                                 backgroundColor: colors.theme['warning']
                             },
                             arc: {
                                 backgroundColor: colors.theme['primary'],
                                 borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
                                 borderWidth: 4
                             }
                         },
                         tooltips: {
                             enabled: true,
                             mode: 'index',
                             intersect: false,
                         }
                     },
                     doughnut: {
                         cutoutPercentage: 83,
                         legendCallback: function(chart) {
                             var data = chart.data;
                             var content = '';

                             data.labels.forEach(function(label, index) {
                                 var bgColor = data.datasets[0].backgroundColor[index];

                                 content += '<span class="chart-legend-item">';
                                 content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
                                 content += label;
                                 content += '</span>';
                             });

                             return content;
                         }
                     }
                 }
             }

             // yAxes
             Chart.scaleService.updateScaleDefaults('linear', {
                 gridLines: {
                     borderDash: [2],
                     borderDashOffset: [2],
                     color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
                     drawBorder: false,
                     drawTicks: false,
                     drawOnChartArea: true,
                     zeroLineWidth: 0,
                     zeroLineColor: 'rgba(0,0,0,0)',
                     zeroLineBorderDash: [2],
                     zeroLineBorderDashOffset: [2]
                 },
                 ticks: {
                     beginAtZero: true,
                     padding: 10,
                     callback: function(value) {
                         if (!(value % 10)) {
                             return value
                         }
                     }
                 }
             });

             // xAxes
             Chart.scaleService.updateScaleDefaults('category', {
                 gridLines: {
                     drawBorder: false,
                     drawOnChartArea: false,
                     drawTicks: false
                 },
                 ticks: {
                     padding: 20
                 },
                 maxBarThickness: 10
             });

             return options;

         }

         // Parse global options
         function parseOptions(parent, options) {
             for (var item in options) {
                 if (typeof options[item] !== 'object') {
                     parent[item] = options[item];
                 } else {
                     parseOptions(parent[item], options[item]);
                 }
             }
         }

         // Push options
         function pushOptions(parent, options) {
             for (var item in options) {
                 if (Array.isArray(options[item])) {
                     options[item].forEach(function(data) {
                         parent[item].push(data);
                     });
                 } else {
                     pushOptions(parent[item], options[item]);
                 }
             }
         }

         // Pop options
         function popOptions(parent, options) {
             for (var item in options) {
                 if (Array.isArray(options[item])) {
                     options[item].forEach(function(data) {
                         parent[item].pop();
                     });
                 } else {
                     popOptions(parent[item], options[item]);
                 }
             }
         }

         // Toggle options
         function toggleOptions(elem) {
             var options = elem.data('add');
             var $target = $(elem.data('target'));
             var $chart = $target.data('chart');

             if (elem.is(':checked')) {

                 // Add options
                 pushOptions($chart, options);

                 // Update chart
                 $chart.update();
             } else {

                 // Remove options
                 popOptions($chart, options);

                 // Update chart
                 $chart.update();
             }
         }

         // Update options
         function updateOptions(elem) {
             var options = elem.data('update');
             var $target = $(elem.data('target'));
             var $chart = $target.data('chart');

             // Parse options
             parseOptions($chart, options);

             // Toggle ticks
             toggleTicks(elem, $chart);

             // Update chart
             $chart.update();
         }

         // Toggle ticks
         function toggleTicks(elem, $chart) {

             if (elem.data('prefix') !== undefined || elem.data('prefix') !== undefined) {
                 var prefix = elem.data('prefix') ? elem.data('prefix') : '';
                 var suffix = elem.data('suffix') ? elem.data('suffix') : '';

                 // Update ticks
                 $chart.options.scales.yAxes[0].ticks.callback = function(value) {
                     if (!(value % 10)) {
                         return prefix + value + suffix;
                     }
                 }

                 // Update tooltips
                 $chart.options.tooltips.callbacks.label = function(item, data) {
                     var label = data.datasets[item.datasetIndex].label || '';
                     var yLabel = item.yLabel;
                     var content = '';

                     if (data.datasets.length > 1) {
                         content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                     }

                     content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
                     return content;
                 }

             }
         }


         // Events

         // Parse global options
         if (window.Chart) {
             parseOptions(Chart, chartOptions());
         }

         // Toggle options
         $toggle.on({
             'change': function() {
                 var $this = $(this);

                 if ($this.is('[data-add]')) {
                     toggleOptions($this);
                 }
             },
             'click': function() {
                 var $this = $(this);

                 if ($this.is('[data-update]')) {
                     updateOptions($this);
                 }
             }
         });


         // Return

         return {
             colors: colors,
             fonts: fonts,
             mode: mode
         };

     })();
 </script>

 <script>
     var PieChart = (function() {

         // Variables

         var $chart = $('#mychart-pie-q1');
         var $chartq2 = $('#mychart-pie-q2');
         var $chartq3 = $('#mychart-pie-q3');
         var $chartq4 = $('#mychart-pie-q4');


         // Methods

         function init($this) {
             var randomScalingFactor = function() {
                 return Math.round(Math.random() * 100);
             };

             var pieChart = new Chart($this, {
                 type: 'pie',
                 data: {
                     labels: [
                         'Perusahaan Yang Tidak Melapor',
                         'Perusahaan Yang Telah Terdaftar',
                         'Perusahaan Yang Sudah Melapor'
                     ],
                     datasets: [{
                         data: [
                             randomScalingFactor(),
                             randomScalingFactor(),
                             randomScalingFactor(),
                         ],
                         backgroundColor: [
                             Charts.colors.theme['danger'],
                             Charts.colors.theme['primary'],
                             Charts.colors.theme['success'],
                         ],
                         label: 'Dataset 1'
                     }],
                 },
                 options: {
                     responsive: true,
                     legend: {
                         position: 'top',
                     },
                     animation: {
                         animateScale: true,
                         animateRotate: true
                     }
                 }
             });

             // Save to jQuery object

             $this.data('chart', pieChart);

         };


         // Events

         if ($chart.length) {
             init($chart);
             init($chartq2);
             init($chartq3);
             init($chartq4);
         }

     })();

     // DATATABLE

     var DatatableBasic = (function() {

         // Variables

         var $dtBasic = $('#datatable-basic');
         var $dtBasic = $('#datatable-earlywarning');
         var $dtBasicPendaftaran = $('#datatable-pendaftaran');


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
             init($dtBasicPendaftaran);
         }

     })();
 </script>
 